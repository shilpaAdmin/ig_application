<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\UserModel;
use App\Http\Model\AdvertisementModel;
use Illuminate\Support\Carbon;

use App\Http\Model\CategoryModel;
use Auth;


class AdvertisementController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('advertisement.index');
    }

    public function create()
    {
        $users=UserModel::where('status','!=','deleted')->pluck('name','id');
        $continouslies = AdvertisementModel::getEnumValues('advertisement','continously');
        $Advertisment_types = AdvertisementModel::getEnumValues('advertisement','type');

        return view('advertisement.create',compact('users','continouslies','Advertisment_types'));
    }

    public function store(Request $request)
    {
        $input=$request->all();

        $categoryId= $request->category_id;
        $userID = $request->user_id;

        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');


        $obj=new AdvertisementModel();

        $obj->name=$input['name'];
        $obj->user_id=$userID;
        $obj->category_id=$categoryId;
        $obj->description=$input['description'];
        $obj->continously=$input['continously'];
        $obj->start_date=$start_date;
        $obj->end_date=$end_date;
        $obj->url=$input['url'];

        if($file = $request->hasFile('media'))
        {
            $file = $request->file('media');

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('media')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/categories/' ;
            $file->move($destinationPath,$fileName);
            $obj->media= $fileName;
        }
        $obj->type=$input['type'];

        if(!empty($input['status']))
        $obj->status=$input['status'];
        else
        $obj->status='inactive';
        $obj->save();

        if($obj)
        {
            return redirect('admin/advertisement')->with('success','Advertisment has been added successfully!');
        }
        else
        {
            return redirect( 'admin/advertisement/create' )->with('error','Advertisment has not been added!');
        }
    }

    public function advertisementList()
    {
        $result_obj = AdvertisementModel::where('advertisement.status', '!=', 'deleted')->leftJoin('user',function ($join)
        {
            $join->on('advertisement.user_id', '=', 'user.id');
        })->leftJoin('category', function ($join)
        {
            $join->on('advertisement.category_id', '=', 'category.id');
        })->select('advertisement.*','user.name as user_id','category.name as category_id')->get();

        return DataTables::of($result_obj)

        ->addColumn('name', function ($result_obj)
        {
            $name = '';
            $name = ucwords($result_obj->name);
            return $name;
        })
        ->addColumn('user_id',function($result_obj){
            $user_id = '';
            $user_id = $result_obj->user_id;
            return $user_id;
        })
        ->addColumn('category_id',function($result_obj){
            $category_id = '';
            $category_id = $result_obj->category_id;
            return $category_id;
        })
        ->addColumn('description',function($result_obj){
            $description = '';
            $description = $result_obj->description;
            return $description;
        })
        ->addColumn('continously',function($result_obj){
            $continously = '';
            $continously = $result_obj->continously;
            return $continously;
        })
        ->addColumn('start_date',function($result_obj){
            $start_date = '';
            $start_date = $result_obj->start_date. 'TO' . $result_obj->end_date;
            return $start_date;
        })
        ->addColumn('url',function($result_obj){
            $url = '';
            $url = $result_obj->url;
            return $url;
        })
        ->addColumn('image_src', function ($result_obj) {
            $media = '';
            if($result_obj->media != '' && file_exists(public_path().'/images/categories/'.$result_obj->media))
            {
                $url=asset("images/categories/$result_obj->media");
                $url2=asset("images/categories/image-placeholder.jpg");
                //$media_file .= '<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';

                $media .='<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center"
                onerror="this.onerror=null;this.src="'.$url2.'";" >';
                return $media;
            }
            else
            {
                $url2=asset("images/image-placeholder.jpg");
                $media .= '<img src='.$url2.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
            }

            return $media;
        })
        ->addColumn('type',function($result_obj){
            $type = '';
            $type = $result_obj->type;
            return $type;
        })

        ->addColumn('status_td',function($result_obj){
            $status = '';
            if($result_obj->status=='active')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $status.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $status;
        })

        ->addColumn('command',function($result_obj){
            $command = '';

            $command.='<div class="btn-group dropleft">
            <button type="button"
                class="btn dropdown-toggle dropdown-toggle-split btn-sm three_part_saction"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href=" '.route('advertisement.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="javascript:;" onclick="deleteAdvertisment('.$result_obj['id'].')" >Delete Record</a>

            </div>';
            // <a class="dropdown-item" href="'.route('category.delete',$result_obj['id']).'">Delete Record</a>


            return $command;
        })
        ->rawColumns(['name','user_id','category_id','description','continously','start_date','url','image_src','type','status_td','command'])
        ->make(true);
    }


    public function edit($id)
    {
        $row = AdvertisementModel::where('id', $id)->first()->toArray();
        $users=UserModel::where('status','!=','deleted')->pluck('name','id');
        $continouslies = AdvertisementModel::getEnumValues('advertisement','continously');
        $Advertisment_types = AdvertisementModel::getEnumValues('advertisement','type');

        $categoryData = CategoryModel::where('id',$row['category_id'])->select('id','name')->get();
        // dd($categoryData);

        return view('advertisement.edit', compact('row','users','continouslies','Advertisment_types','categoryData'));

    }


    public function advertiseCategoryAutoComplete(Request $request)
    {
        $input = $request->all();

        if (isset($input['search']) && !empty($input['search'])) {
            $category_qry = CategoryModel::where('name', 'LIKE', '%' . $input['search'] . '%');
        } else {
            $category_qry = CategoryModel::where('id', '>', 0);
        }
        $result = $category_qry->where('category.status','!=','deleted')->select('id', 'name')->get()->toArray();

        return response()->json($result);
    }

    public function update(Request $request,$id)
    {
        $input=$request->all();

        $categoryId= $request->category_id;
        $userID = $request->user_id;

        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');


        $obj=AdvertisementModel::find($id);
        $obj->name=$input['name'];
        $obj->user_id=$userID;
        $obj->category_id=$categoryId;
        $obj->description=$input['description'];
        $obj->continously=$input['continously'];
        $obj->start_date=$start_date;
        $obj->end_date=$end_date;
        $obj->url=$input['url'];

        if($file = $request->hasFile('media'))
        {
            $file = $request->file('media');

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('media')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/categories/' ;
            $file->move($destinationPath,$fileName);
            $obj->media= $fileName;
        }
        $obj->type=$input['type'];

        if(!empty($input['status']))
        $obj->status=$input['status'];
        else
        $obj->status='inactive';
        $obj->save();

        if($obj)
        {
            return redirect('admin/advertisement')->with('success','Advertisment has been Updated successfully!');
        }
        else
        {
            return redirect('admin/advertisement/edit' )->with('error','Advertisment has not been Updated!');
        }
    }

    public function delete($id){
        $delete = AdvertisementModel::where('id',$id)->update(['status'=>'deleted']);
        if($delete){
            return redirect()->route('advertisement');
        }else{
            return redirect()->route('advertisement');
        }
    }


}
