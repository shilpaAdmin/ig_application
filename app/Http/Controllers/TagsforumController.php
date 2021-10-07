<?php

namespace App\Http\Controllers;

use App\Http\Model\TagForumMasterModel;
use Illuminate\Http\Request;
use App\Http\Requests\TagsRequest;
use DataTables;
use Auth;

class TagsforumController extends Controller
{
    public function index(Request $request)
    {
        return view('tags_forum.index');
    }

    public function create()
    {
        return view('tags_forum.create');
    }

    public function delete($id)
    {
        $delete = TagForumMasterModel::where('id', $id)->update([
            'status' => 'deleted',
        ]);

        if ($delete) {
            return redirect()->route('tagsforum');
        } else {
            return redirect()->route('tagsforum');
        }
    }

    public function tagsforumList()
    {
        $result_obj = TagForumMasterModel::where('status','!=','deleted')->get();
        // print_r($result_obj);
        // exit;
        return DataTables::of($result_obj)
        ->addColumn('DT_RowId', function ($result_obj)
        {
            return 'row_'.$result_obj->id;
        })
        ->addColumn('is_approve',function($result_obj)
        {
            $is_approve = '';
            if($result_obj->is_approve==1)
            $is_approve.='<span class="badge badge-pill badge-soft-success font-size-12">Approve</span>';
            else
            $is_approve.='<span class="badge badge-pill badge-soft-danger font-size-12">Disapprove</span>';
            return $is_approve;
        })
        ->addColumn('status_td',function($result_obj){
            $status = '';
            if($result_obj->status=='active')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            elseif($result_obj->status=='')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12"> Not Available </span>';
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
                <a class="dropdown-item" href=" '.route('tags.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="'.route('tags.delete',$result_obj['id']).'">Delete Record</a>
            </div>';

            return $command;
        })
        ->rawColumns(['DT_RowId','is_approve','status_td','command'])
        ->make(true);
    }

    public function store(TagsRequest $request)
    {
        $input=$request->all();

        $tags=new TagForumMasterModel;
        $tags->name=$input['name'];

        if(!empty($input['status']))
        $tags->status=$input['status'];
        else
        $tags->status='inactive';

        $tags->created_by=Auth::user()->id;
        $tags->last_updated_by=Auth::user()->id;

        if($tags->save())
        {
            return redirect( 'admin/tagsforum' )->with('success','Tags Forum has been added successfully!');
        }
        else
        {
            return redirect( 'admin/tagsforum' )->with('error','Tags Forum has not been added!');
        }
    }

    public function edit($id)
    {
        $row = TagForumMasterModel::where('id', $id)->first()->toArray();
        return view('tags_forum.edit', compact('row'));
    }

    public function update(TagsRequest $request,$id)
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

        $update=TagForumMasterModel::where('id',$id)->update(
            [
                'name'=>$input['name'],
                'status'=>$status,
                'last_updated_by'=>Auth::user()->id,
            ]);

        if($update)
        {
            return redirect()->route('tags_forum');
        }
        else
        {
            return redirect()->route('tags_forum');
        }
    }

    public function approveStatus(Request $request ,$id)
    {

        $multipleIdExplode = explode(',',$id);

        $approveData = TagForumMasterModel::whereIn('id',$multipleIdExplode)->get()->toArray();
        // dd($approveData);

        if(count($approveData) > 0)
        {
            foreach($approveData as $record)
            // dd($approveData);

            {
                $table_name = $record['is_approve'];


                if($table_name == 1)
                {

                    $update = TagForumMasterModel::where('id', '=', $record['id'])->update(['is_approve'=> 0]);


                }
                else{

                    $update = TagForumMasterModel::where('id', '=', $record['id'])->update(['is_approve'=> 1]);


                }
            }
        }
        return redirect()->back()->withSuccess('Data Approved successfully!');
    }

}
