<?php

namespace App\Http\Controllers;

use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\UserModel;
use App\Http\Model\ForumModel;
use Auth;

class ForumController extends Controller
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
        return view('forum.index');
    }

    public function create()
    {
        $users=UserModel::where('status','!=','deleted')->pluck('name','id');

        return view('forum.create',compact('users'));
    }

    public function store(Request $request)
    {
        $input=$request->all();

        if(isset($input['status']))
        {
            if($input['status'] == 'on')
            {
                $status = 'active';
            }
            else
            {
                $status = 'inactive';
            }
        }
        else
        {
            $status = 'inactive';
        }

        $userID = $request->user_id;

        $obj=new ForumModel();
        $obj->question=$input['question'];
        $obj->description=$input['description'];
        $obj->url=$input['url'];
        $obj->user_id=$userID;
        $obj->status = $status;
        $obj->save();

        if($obj)
        {
            return redirect('setting/forum')->with('success','Forum has been added successfully!');
        }
        else
        {
            return redirect( 'setting/forum/create' )->with('error','Forum has not been added!');
        }
    }

    public function advertisementList()
    {
        $result_obj = ForumModel::where('forum.status', '!=', 'deleted')->leftJoin('user',function ($join)
        {
            $join->on('forum.user_id', '=', 'user.id');

        })->select('forum.*','user.name as user_id')->get();

        return DataTables::of($result_obj)

        ->addColumn('question', function ($result_obj)
        {
            $question = '';
            $question = ucwords($result_obj->question);
            return $question;
        })
        ->addColumn('user_id',function($result_obj){
            $user_id = '';
            $user_id = $result_obj->user_id;
            return $user_id;
        })
        ->addColumn('description',function($result_obj){
            $description = '';
            $description = $result_obj->description;
            return $description;
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
                <a class="dropdown-item" href=" '.route('forum.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="javascript:;" onclick="deleteFourm('.$result_obj['id'].')" >Delete Record</a>

            </div>';
            return $command;
        })
        ->rawColumns(['question','user_id','description','url','status_td','command'])
        ->make(true);
    }


    public function edit($id)
    {
        $row = ForumModel::where('id', $id)->first()->toArray();
        $users=UserModel::where('status','!=','deleted')->pluck('name','id');

        return view('forum.edit', compact('row','users'));

    }


    public function update(Request $request,$id)
    {
        $input=$request->all();

        if(isset($input['status']))
        {
            if($input['status'] == 'on')
            {
                $status = 'active';
            }
            else
            {
                $status = 'inactive';
            }
        }
        else
        {
            $status = 'inactive';
        }

        $userID = $request->user_id;

        $obj= ForumModel::find($id);
        $obj->question=$input['question'];
        $obj->description=$input['description'];
        $obj->url=$input['url'];
        $obj->user_id=$userID;
        $obj->status = $status;
        $obj->save();

        if($obj)
        {
            return redirect('setting/forum')->with('success','Forum has been Updated successfully!');
        }
        else
        {
            return redirect( 'setting/forum/edit' )->with('error','Forum has not been Updated!');
        }
    }

    public function delete($id){
        $delete = ForumModel::where('id',$id)->update(['status'=>'deleted']);
        if($delete){
            return redirect()->route('forum');
        }else{
            return redirect()->route('forum');
        }
    }


}
