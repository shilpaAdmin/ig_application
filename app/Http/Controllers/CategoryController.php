<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;

use App\Http\Model\CategoryModel;
use App\Http\Model\BusinessModel;

use Auth;

class CategoryController extends Controller
{
    var $counter = 1;


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
        return view('category.index');
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $input=$request->all();

        $category=new CategoryModel;

        if($input['type']=='category')
        {
            $parent_category_id=0;
            $display_order=CategoryModel::max('display_order');
            $category->display_order=$display_order+1;
        }
        else
        {
            $parent_category_id=$input['hdnSearchCategoryId'];
        }

        $category->parent_category_id=$parent_category_id;
        $category->name=$input['name'];
        $category->description=$input['description'];

        if(!empty($input['status']))
        $category->status=$input['status'];
        else
        $category->status='inactive';

        if($file = $request->hasFile('media_file'))
        {
            $file = $request->file('media_file') ;

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('media_file')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/categories/' ;
            $file->move($destinationPath,$fileName);
            $category->media_file= $fileName ;
        }
        $category->created_by=Auth::user()->id;
        $category->last_updated_by=Auth::user()->id;
        if($category->save())
        {
            return redirect( 'setting/category' )->with('success','Category has been added successfully!');
        }
        else
        {
            return redirect( 'setting/category' )->with('error','Category has not been added!');
        }
    }

    public function categoryAutoComplete(Request $request)
    {
        $input = $request->all();

        if (isset($input['search']) && !empty($input['search'])) {
            $category_qry = CategoryModel::where('name', 'LIKE', '%' . $input['search'] . '%');
        } else {
            $category_qry = CategoryModel::where('id', '>', 0);
        }
        $result = $category_qry->select('id', 'name')->where('parent_category_id',0)->get()->toArray();

        return response()->json($result);
    }

    public function categoryList()
    {
        $result_obj = CategoryModel::where('status','!=','deleted')->get();
        return DataTables::of($result_obj)
        ->addColumn('description_td',function($result_obj){
            $status = '';
            if($result_obj->description=='')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $status.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $status;
        })
        ->addColumn('type_td',function($result_obj){
            $type_td = '';
            if($result_obj->parent_category_id==0)
            $type_td.='<span class="badge badge-pill badge-soft-success font-size-12"> Parent </span>';
            else
            $type_td.='<span class="badge badge-pill badge-soft-warning font-size-12"> Child </span>';
            return $type_td;
        })
        ->addColumn('status_td',function($result_obj){
            $status = '';
            if($result_obj->status=='active')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $status.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $status;
        })
        ->addColumn('image_src', function ($result_obj) {
            $media_file = '';
            if($result_obj->media_file != '' && file_exists(public_path().'/images/categories/'.$result_obj->media_file))
            {
                $url=asset("images/categories/$result_obj->media_file");
                $url2=asset("images/categories/image-placeholder.jpg");
                //$media_file .= '<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';

                $media_file .='<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center"
                onerror="this.onerror=null;this.src="'.$url2.'";" >';
                return $media_file;
            }
            else
            {
                $url2=asset("images/image-placeholder.jpg");
                $media_file .= '<img src='.$url2.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
            }

            return $media_file;
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
                <a class="dropdown-item" href=" '.route('category.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="'.route('category.delete',$result_obj['id']).'">Delete Record</a>
            </div>';

            return $command;
        })
        ->rawColumns(['id','status_td','command','image_src','type_td'])
        ->make(true);
    }

    public function delete($id)
    {
       // $delete = $this->CountryModel->where('id', $id)->delete();
        $delete = CategoryModel::where('id', $id)->update([
            'status' => 'deleted',
        ]);

        if ($delete) {
            return redirect()->route('category');
        } else {
            return redirect()->route('category');
        }
    }

    public function edit($id)
    {
        $row = CategoryModel::where('id', $id)->first()->toArray();
        if($row['parent_category_id']!=0)
        {
            $sub_category_data=CategoryModel::where('id',$row['parent_category_id'])->select('id','name')->first();
            return view('category.edit', compact('row','sub_category_data'));
        }
        else
        {
            return view('category.edit', compact('row'));
        }
    }

    public function update(CategoryRequest $request,$id)
    {
        $input=$request->all();

        if(isset($input['status']) && $input['status']=='active')
        {
            $status='active';
        }
        else
        {
            $status='inactive';
        }

        $updateArray=[
            'name'=>$input['name'],
            'description'=>$input['description'],
            'status'=>$status,
        ];

        if($input['type']=='category')
        {
            $display_order=CategoryModel::max('display_order');
            $updateArray['display_order']=$display_order+1;
            $updateArray['parent_category_id']=0;
        }
        else
        {
            $updateArray['parent_category_id']=$input['hdnSearchCategoryId'];
        }

        if($file = $request->hasFile('media_file'))
        {
            $file = $request->file('media_file') ;

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('media_file')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/categories/' ;
            $file->move($destinationPath,$fileName);
            $updateArray['media_file']= $fileName ;
        }

        $updateArray['last_updated_by']=Auth::user()->id;
        // print_r($updateArray);
        // exit;
        $create = CategoryModel::where('id',$id)->update(
            $updateArray
        );

        if($create)
        {
            return redirect()->route('category');
        }
        else
        {
            return redirect()->route('category');
        }
        //return view('category.edit',compact('row','CountryModel','StateModel','CityModel','ZipModel'));
    }

    public function getSubCategories(Request $request)
    {
        $input=$request->all();
        $sub_category_data=CategoryModel::where('parent_category_id',$input['categoryId'])->select('id','name')->get()->toArray();

        if(count($sub_category_data) > 0 && !empty($sub_category_data))
        {
            return response()->json([
                'status' => true,
                'data' => $sub_category_data,
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'data' => [],
            ]);
        }
    }


    public function subCategoryData($id)
    {
       $subCategoryData=CategoryModel::where('id',$id)->get();
    //    dd($subCategoryData);

        return view('category.sub_category_list',compact('subCategoryData'));
    }


    public function subCategoryDataList(Request $request)
    {

        $input = $request->all();
        $txtStatusType = isset($request->status) ? $request->status : '';

        
        $preQuery = CategoryModel::where('category.status','!=','Deleted')->where('parent_category_id',$input['id']);

        if(isset($txtStatusType) && !empty($txtStatusType))
        {
            $result_obj= $preQuery->where('category.status',$txtStatusType);

        }
        $result_obj = $preQuery->get();

        return DataTables::of($result_obj)->addColumn('applicant',function($result_obj){
            $applicant = '';
            return '<a href="javascript:;" onclick="openSubCategoryBusinessDetail('.$result_obj['id'].')" class="undar_line desc" id="'.$result_obj['id'].'" data-toggle="modal" data-target=".bs-example-modal-center" class="btn btn-primary waves-effect btn-label waves-light">Business Details</a>';
        })
        ->addColumn('id', function ($result_obj)
        {
            $counters = $this->counter++;
            $id = '<div><span>'.$counters.'</span></div>';
            return $id;
        })->addColumn('name', function ($result_obj)
        {
            $name = '';
            // $full_name = ucwords($result_obj->full_name);
            $name = ucwords($result_obj->name);
            return $name;
        })->addColumn('description', function ($result_obj)
        {
            $description = '';
            $description = ucwords($result_obj->description);
            return $description;
        })
       ->addColumn('media_file', function ($result_obj) {
                $media_file = '';
                if ($result_obj->media_file != '' && file_exists(public_path() . '/images/categories/' . $result_obj->media_file)) {
                        $url = asset("images/categories/$result_obj->media_file");

                        $media_file .= '<img src=' . $url . ' border="0" width="40" height="40" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center">';

                        return $media_file;
                    } else {
                        $url2 = asset("images/image-placeholder.jpg");
                        $media_file .= '<img src=' . $url2 . ' border="0" width="40" height="40" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
                    }
                return $media_file;
            })

        ->addColumn('status_td',function($result_obj){
            $status = '';
            if($result_obj->status=='active')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $status.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $status;
        })


        ->rawColumns(['name','description','resume_cv','media_file','status_td','applicant','id'])
        ->make(true);
    }

    public function subCategoryList(Request $request,$id)
    {
        $subCategoryData = CategoryModel ::where('status','Active')->where('id',$id)->get()->toArray();
        // dd($subCategoryData);

        return view('category.subcategory_detail_applicant',compact('subCategoryData'));

    }

    public function businessListapplicant(Request $request)
    {
        $input = $request->all();
        $result_obj = BusinessModel::where('status','!=','deleted')->where('category_id',$input['id'])
        ->with('categories')->orderBy('id','DESC')->get();
        return DataTables::of($result_obj)

        ->addColumn('DT_RowId', function ($result_obj)
        {
            return 'row_'.$result_obj->id;
        })
        ->addColumn('description_td',function($result_obj){
            $description = '';
            if($result_obj->description=='')
            $description.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $description.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $description;
        })
        ->addColumn('type_td',function($result_obj){
            $type_td = '';
            if($result_obj->type=='product')
            $type_td.='<span class="badge badge-pill badge-soft-success font-size-12"> Product</span>';
            else
            $type_td.='<span class="badge badge-pill badge-soft-warning font-size-12"> Service </span>';
            return $type_td;
        })
        ->addColumn('category_td',function($result_obj){
            $category_td = '';
            if(!empty($result_obj->categories['name']))
            $category_td=$result_obj->categories['name'];
            else
            $category_td='N/A';
            return $category_td;
        })
        ->addColumn('status_td',function($result_obj){
            $status = '';
            if($result_obj->status=='active')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $status.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $status;
        })->addColumn('command',function($result_obj){
            $command = '';

            $command.='<div class="btn-group dropleft">
            <button type="button"
                class="btn dropdown-toggle dropdown-toggle-split btn-sm three_part_saction"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href=" '.route('business.edit',$result_obj['id']).' ">Edit Record</a>

                <a class="dropdown-item" href="'.route('business.delete',$result_obj['id']).'">Delete Record</a>
                <a class="dropdown-item" href="'.url('admin/business/detail/'.$result_obj['id']).'">Detail</a>
            </div>';

            return $command;
        })->addColumn('name_td',function($result_obj){
            $name = '';

            $name.='<td><a href=" '.route('business.detailview',$result_obj['id']).' " >'.$result_obj['name'].'</a></td>';

            return $name;
        })
        ->rawColumns(['DT_RowId','status_td','command','image_src','type_td','name_td'])
        ->make(true);
    }



}
