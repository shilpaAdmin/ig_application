<?php

namespace App\Http\Controllers;

use App\Http\Model\BlogsModel;
use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\CategoryModel;
use App\Http\Model\UserModel;
use App\Http\Model\ForumModel;
use Auth;

class BlogController extends Controller
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
        return view('blog.index');
    }

    public function create()
    {
        $users=UserModel::where('status','!=','deleted')->pluck('name','id');

        return view('blog.create',compact('users'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $categoryId= $request->category_id;

        $destinationPath = public_path().'/images/blogs/';
        $multipleDataArray = array();


        foreach($input['group-a'] as $multipleData)
        {
            if(isset($multipleData['media_file_json']) && !empty($multipleData['media_file_json']))
            {
                if ($attachmentFile = $multipleData['media_file_json'])
                {
                    $attachmentName = md5(time() . '_' . $attachmentFile->getClientOriginalName()) . '.' . $attachmentFile->getClientOriginalExtension();

                    $attachmentFile->move($destinationPath, $attachmentName);

                    array_push($multipleDataArray,$attachmentName);
                }

            }

        }
        if(count($multipleDataArray) > 0)
        {
            $multipleDataJson = json_encode($multipleDataArray, JSON_FORCE_OBJECT);
        }
        else
        {
            $multipleDataJson = '{}';
        }


        $userID = $request->user_id;

        $obj=new BlogsModel();
        $obj->name=$input['name'];
        $obj->description=$input['description'];
        $obj->url=$input['url'];
        $obj->media_file_json=$multipleDataJson;
        $obj->tagged=$input['tagged'];
        $obj->user_id=$userID;
        $obj->category_id=$categoryId;
        if(!empty($input['status']))
        $obj->status=$input['status'];
        else
        $obj->status='inactive';
        // dd($obj);
        $obj->save();

        if($obj)
        {
            return redirect('admin/blog')->with('success','Forum has been added successfully!');
        }
        else
        {
            return redirect( 'admin/blog/create' )->with('error','Forum has not been added!');
        }
    }

    public function bloglist()
    {
        $result_obj = BlogsModel::where('blogs.status', '!=', 'deleted')->leftJoin('user',function ($join)
        {
            $join->on('blogs.user_id', '=', 'user.id');

        })->select('blogs.*','user.name as user_id')->get();

        return DataTables::of($result_obj)

        ->addColumn('user_id',function($result_obj){
            $user_id = '';
            $user_id = $result_obj->user_id;
            return $user_id;
        })
        ->addColumn('name', function ($result_obj)
        {
            $name = '';
            $name = ucwords($result_obj->name);
            return $name;
        })
        ->addColumn('url',function($result_obj){
            $url = '';
            $url = $result_obj->url;
            return $url;
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
                <a class="dropdown-item" href=" '.route('blog.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="javascript:;" onclick="deleteBlog('.$result_obj['id'].')" >Delete Record</a>
            </div>';
            return $command;
        })
        ->rawColumns(['user_id','name','description','media_file','tagged','url','status_td','command'])
        ->make(true);
    }


    public function edit($id)
    {
        $row = BlogsModel::where('id', $id)->first()->toArray();
        $users=UserModel::where('status','!=','deleted')->pluck('name','id');
        $categoryData = CategoryModel::where('id',$row['category_id'])->select('id','name')->get();

        return view('blog.edit', compact('row','users','categoryData'));

    }


    public function update(Request $request,$id)
    {
        $input = $request->all();

        $categoryId= $request->category_id;
        $destinationPath = public_path().'/images/blogs/';
        $multipleDataArray = array();


        foreach($input['group-a'] as $multipleData)
        // dd($multipleData);
        {
            if(isset($multipleData['media_file_json']) && !empty($multipleData['media_file_json']))
            {
                if ($attachmentFile = $multipleData['media_file_json'])
                {
                    $attachmentName = md5(time() . '_' . $attachmentFile->getClientOriginalName()) . '.' . $attachmentFile->getClientOriginalExtension();

                    $attachmentFile->move($destinationPath, $attachmentName);

                    array_push($multipleDataArray,$attachmentName);
                }

            }
            else if(isset($multipleData['media_file_json_from_db']) && !empty($multipleData['media_file_json_from_db']))
            {
                $attachmentName = $multipleData['media_file_json_from_db'];
            }
            array_push($multipleDataArray,$attachmentName);
        }
        if(count($multipleDataArray) > 0)
        {
            $multipleDataJson = json_encode($multipleDataArray, JSON_FORCE_OBJECT);
        }
        else
        {
            $multipleDataJson = '{}';
        }


        $userID = $request->user_id;

        $obj=BlogsModel::find($id);
        $obj->name=$input['name'];
        $obj->description=$input['description'];
        $obj->url=$input['url'];
        $obj->media_file_json=$multipleDataJson;
        $obj->tagged=$input['tagged'];
        $obj->user_id=$userID;
        $obj->category_id=$categoryId;
        if(!empty($input['status']))
        $obj->status=$input['status'];
        else
        $obj->status='inactive';
        // dd($obj);
        $obj->save();

        if($obj)
        {
            return redirect('admin/blog')->with('success','Forum has been added successfully!');
        }
        else
        {
            return redirect( 'admin/blog/create' )->with('error','Forum has not been added!');
        }
    }

    public function getCommentReplyList(Request $request)
    {
        $input=$request->all();
        
    }

    public function delete($id)
    {
        $delete = BlogsModel::where('id',$id)->update(['status'=>'deleted']);

        return redirect()->route('blog');

    }

    public function blogCategoryAutoComplete(Request $request)
    {
        $input = $request->all();

        if (isset($input['search']) && !empty($input['search'])) {
            $category_qry = CategoryModel::where('name', 'LIKE', '%' . $input['search'] . '%');
        } else {
            $category_qry = CategoryModel::where('id', '>', 0);
        }
        $result = $category_qry->where('parent_category_id','=',0)->select('id','name')->get()->toArray();


        return response()->json($result);
    }


}
