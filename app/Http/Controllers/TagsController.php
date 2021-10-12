<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagsRequest;

use DataTables;

use App\Http\Model\TagMasterModel;
use Auth;

class TagsController extends Controller
{
    var $counter = 1;
    public function index(Request $request)
    {
        return view('tags.index');
    }

    public function create()
    {
        return view('tags.create');
    }

    public function delete($id)
    {
        $delete = TagMasterModel::where('id', $id)->update([
            'status' => 'deleted',
        ]);

        if ($delete) {
            return redirect()->route('tags');
        } else {
            return redirect()->route('tags');
        }
    }

    public function tagsList(Request $request)
    {
        $input=$request->all();

        $txtStatusType = isset($request->txtStatusType) ? $request->txtStatusType : '';
        $txtApproveStatus = isset($request->txtApproveStatus) ? $request->txtApproveStatus : '';
        $storyStartDate = isset($request->startDate) ? $request->startDate : '';
        $storyEndDate = isset($request->endDate) ? $request->endDate : '';

        $preQuery = TagMasterModel::where('status','!=','deleted');

        if(isset($txtStatusType) && !empty($txtStatusType))
        {
            $result_obj= $preQuery->where('tag_master.status',$txtStatusType);

        }
        if(isset($txtApproveStatus) && !empty($txtApproveStatus))
        {
            $result_obj= $preQuery->where('tag_master.is_approve',$txtApproveStatus);

        }
        if(isset($storyStartDate) && !empty($storyStartDate) && isset($storyEndDate) && !empty($storyEndDate))
        {
            $result_obj= $preQuery->whereBetween('tag_master.created_at',[$storyStartDate,$storyEndDate]);

        }
        $result_obj= $preQuery->get();

        return DataTables::of($result_obj)
        ->addColumn('DT_RowId', function ($result_obj)
        {
            return 'row_'.$result_obj->id;
        })
        ->addColumn('is_approve',function($result_obj)
        {
            $is_approve = '';
            if($result_obj->is_approve==1)
            $is_approve.='<span class="badge badge-pill badge-soft-success  font-size-12">Approve</span>';
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

        $tags=new TagMasterModel;
        $tags->name=$input['name'];

        if(!empty($input['status']))
        $tags->status=$input['status'];
        else
        $tags->status='inactive';

        $tags->created_by=Auth::user()->id;
        $tags->last_updated_by=Auth::user()->id;

        if($tags->save())
        {
            return redirect( 'setting/tags' )->with('success','Tags has been added successfully!');
        }
        else
        {
            return redirect( 'setting/tags' )->with('error','Tags has not been added!');
        }
    }

    public function edit($id)
    {
        $row = TagMasterModel::where('id', $id)->first()->toArray();
        return view('tags.edit', compact('row'));
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

        $update=TagMasterModel::where('id',$id)->update(
            [
                'name'=>$input['name'],
                'status'=>$status,
                'last_updated_by'=>Auth::user()->id,
            ]);

        if($update)
        {
            return redirect()->route('tags');
        }
        else
        {
            return redirect()->route('tags');
        }
    }

    public function approveStatus(Request $request ,$id)
    {

        $multipleIdExplode = explode(',',$id);

        $approveData = TagMasterModel::whereIn('id',$multipleIdExplode)->get()->toArray();
        // dd($approveData);

        if(count($approveData) > 0)
        {
            foreach($approveData as $record)
            // dd($approveData);

            {
                $table_name = $record['is_approve'];


                if($table_name == 1)
                {

                    $update = TagMasterModel::where('id', '=', $record['id'])->update(['is_approve'=> 0]);


                }
                else{

                    $update = TagMasterModel::where('id', '=', $record['id'])->update(['is_approve'=> 1]);


                }
            }
        }
        return redirect()->back()->withSuccess('Data Approved successfully!');
    }


}
