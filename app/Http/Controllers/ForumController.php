<?php

namespace App\Http\Controllers;

use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\UserModel;
use App\Http\Model\ForumModel;
use App\Http\Model\ForumCommentReplyModel;
use Illuminate\Support\Str;
use App\Http\Traits\UserLocationDetailTrait;
use Carbon\Carbon;

use Auth;

class ForumController extends Controller
{
    use UserLocationDetailTrait;

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



        $userID = $request->user_id;

        $obj=new ForumModel();
        $LocationType=$cityCountryId='';

        if(isset($userID) && !empty($userID))
        {
            $locationData=$this->getUserLocationDetail($userID);

            if($locationData!==null)
            {
                if(isset($locationData->location_id) && !empty($locationData->location_id))
                $cityCountryId=$locationData->location_id;
                else
                $cityCountryId=1;

                if(isset($locationData->location_type) && !empty($locationData->location_type))
                $LocationType=$locationData->location_type;
                else
                $LocationType='country';
            }
        }

        $obj->cityid_or_countryid=$cityCountryId;
        $obj->type_city_or_country=$LocationType;

        $obj->question=$input['question'];
        $obj->description=$input['description'];
        $obj->url=$input['url'];
        $obj->telegram_link=$input['telegram_link'];
        $obj->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->question)).'-'.Str::random(5);
        $obj->user_id=$userID;

        if(!empty($input['status']))
        $obj->status=$input['status'];
        else
        $obj->status='inactive';
        $obj->save();

        if($obj)
        {
            return redirect('admin/forum')->with('success','Forum has been added successfully!');
        }
        else
        {
            return redirect( 'admin/forum/create' )->with('error','Forum has not been added!');
        }
    }

    public function forumList(Request $request)
    {
        // dd($request->all());
        $input=$request->all();

        $txtStatusType = isset($request->status) ? $request->status : '';
        $txtApproveStatus = isset($request->approved) ? $request->approved : '';
        $storyStartDate = isset($request->startDate) ? $request->startDate : '';
        $storyEndDate = isset($request->endDate) ? $request->endDate : '';
        // dd($storyStartDate,$storyEndDate);

        $preQuery = ForumModel::where('forum.status', '!=', 'deleted')->leftJoin('user',function ($join)
        {
            $join->on('forum.user_id', '=', 'user.id');

        })->select('forum.*','user.name as user_id');

        if(isset($txtStatusType) && !empty($txtStatusType))
        {
            $result_obj= $preQuery->where('forum.status',$txtStatusType);

        }
        if(isset($txtApproveStatus) && !empty($txtApproveStatus))
        {
            $result_obj= $preQuery->where('forum.is_approve',$txtApproveStatus);
        }
        if(isset($storyStartDate) && !empty($storyStartDate)  && isset($storyEndDate) && !empty($storyEndDate))
        {
            $result_obj= $preQuery->whereBetween('forum.created_at',[$storyStartDate,$storyEndDate]);
            // $result_obj = $preQuery->where('forum.created_at','<=',$storyStartDate.'00:00:00.000000')
            //                     ->where('forum.created_at','>=',$storyEndDate.'23:59:59.976999');
        }
        $result_obj = $preQuery->get();

        return DataTables::of($result_obj)
        ->addColumn('DT_RowId', function ($result_obj)
        {
            return 'row_'.$result_obj->id;
        })
        ->addColumn('question_td', function ($result_obj)
        {
            $question_td = '';
            if(!empty($result_obj->question))
            $question_td='<a href=" '.route('forum.getCommentReplyList',$result_obj->id).' " >'.ucwords($result_obj->question.$result_obj->id).'</a>';
            //$question_td = '<a href="'.route('forum.getCommentReplyList')">'.ucwords($result_obj->question).'</a>';

            return $question_td;
        })
        ->addColumn('user_id',function($result_obj){
            $user_id = '';
            $user_id = ucwords($result_obj->user_id);
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
        ->addColumn('is_approve',function($result_obj)
        {
            $is_approve = '';
            if($result_obj->is_approve==1)
            $is_approve.='<span class="badge badge-pill badge-soft-success font-size-12">Approve</span>';
            else
            $is_approve.='<span class="badge badge-pill badge-soft-danger font-size-12">Disapprove</span>';
            return $is_approve;
            //$is_approve = $result_obj->is_approve;
            //return $is_approve;
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
        ->rawColumns(['DT_RowId','question_td','user_id','description','url','status_td','command','is_approve'])
        ->make(true);
    }

    public function getCommentReplyList(Request $request, $id)
    {
        $input = $request->all();
        $forum_id=$id;

        $forumDetail=ForumModel::with(['user'])->where('id',$forum_id)->first();

        $sortBy = isset($input['sort_by']) ? $input['sort_by'] : 'DESC';
        $recordsPerPage = isset($input['recordsPerPage']) ? $input['recordsPerPage'] : 5;
        $pageNumber = isset($input['pageNumber']) ? $input['pageNumber'] : 1;

        $skip = (($pageNumber - 1) * $recordsPerPage);

        $commentData = ForumCommentReplyModel::where('forum_comment_reply.forum_id',$forum_id)
        ->where('forum_comment_reply.comment_id',0)
        ->leftJoin('user','forum_comment_reply.user_id','user.id')
        ->select('forum_comment_reply.id','forum_comment_reply.message','forum_comment_reply.media','forum_comment_reply.created_at',
        'user.name as username','user.user_image as userimage')
        ->where('forum_comment_reply.is_deleted',0)->paginate(10);
        //->skip($skip)->take(5)
        //->get()->toArray();
        // echo '<pre>';
        // print_r($commentData);
        // exit;
        $commentReplyArray = array();
        foreach ($commentData as $comment)
        {
            $commentId = $comment->id;
            $replyData =ForumCommentReplyModel::where('forum_comment_reply.comment_id',$commentId)
            ->where('forum_comment_reply.comment_id','!=',0)
            ->leftJoin('user','forum_comment_reply.user_id','user.id')
            ->select('forum_comment_reply.*','user.name as username','user.user_image as userimage')
            ->where('forum_comment_reply.is_deleted',0)
            ->orderBy('forum_comment_reply.id','desc')->get()->toArray();

            $commentReplyArray[$commentId]['id'] = $commentId;
            $commentReplyArray[$commentId]['comment'] = $comment->message;
            $commentReplyArray[$commentId]['media'] = $comment->media;
            $commentReplyArray[$commentId]['username'] = $comment->username;
            $commentReplyArray[$commentId]['userimage'] = $comment->userimage;
            $commentReplyArray[$commentId]['created_at'] = $comment->created_at;
            /*$commentId = $comment['id'];
            $replyData =ForumCommentReplyModel::where('forum_comment_reply.comment_id',$commentId)
            ->where('forum_comment_reply.comment_id','!=',0)
            ->leftJoin('user','forum_comment_reply.user_id','user.id')
            ->select('forum_comment_reply.*','user.name as username','user.user_image as userimage')
            ->where('forum_comment_reply.is_deleted',0)
            ->orderBy('forum_comment_reply.id','desc')->get()->toArray();

            $commentReplyArray[$commentId]['id'] = $commentId;
            $commentReplyArray[$commentId]['comment'] = $comment['message'];
            $commentReplyArray[$commentId]['media'] = $comment['media'];
            $commentReplyArray[$commentId]['username'] = $comment['username'];
            $commentReplyArray[$commentId]['userimage'] = $comment['userimage'];
            $commentReplyArray[$commentId]['created_at'] = $comment['created_at'];*/
            if(count($replyData) > 0)
            {
                $j = 0;
                foreach($replyData as $reply)
                {
                    $replyId = $reply['id'];
                    $replyMessage = $reply['message'];
                    $replyMedia = $reply['media'];
                    $replyUsername = $reply['username'];
                    $replyUserimage = $reply['userimage'];
                    $replyCreatedAt = $reply['created_at'];

                    $commentReplyArray[$commentId]['reply'][$j]['id'] = $replyId;
                    $commentReplyArray[$commentId]['reply'][$j]['comment'] = $replyMessage;
                    $commentReplyArray[$commentId]['reply'][$j]['media'] = $replyMedia;
                    $commentReplyArray[$commentId]['reply'][$j]['username'] = $replyUsername;
                    $commentReplyArray[$commentId]['reply'][$j]['userimage'] = $replyUserimage;
                    $commentReplyArray[$commentId]['reply'][$j]['created_at'] = $replyCreatedAt;
                    $j++;
                }
            }
        }
        // echo '<pre>';
        // print_r($commentReplyArray);exit;
        return view('forum.comment_reply_structure', compact('commentReplyArray','recordsPerPage','forumDetail','commentData'));
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

        $userID = $request->user_id;

        $obj= ForumModel::find($id);
        $obj->question=$input['question'];
        $obj->description=$input['description'];
        $obj->url=$input['url'];
        $obj->telegram_link=$input['telegram_link'];
        $obj->user_id=$userID;

        if(!empty($input['status']))
        $obj->status=$input['status'];
        else
        $obj->status='inactive';
        $obj->save();

        if($obj)
        {
            return redirect('admin/forum')->with('success','Forum has been Updated successfully!');
        }
        else
        {
            return redirect( 'admin/forum/edit' )->with('error','Forum has not been Updated!');
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


    public function approveStatus(Request $request ,$id)
    {

        $multipleIdExplode = explode(',',$id);

        $approveData = ForumModel::whereIn('id',$multipleIdExplode)->get()->toArray();
        // dd($approveData);

        if(count($approveData) > 0)
        {
            foreach($approveData as $record)
            // dd($approveData);

            {
                $table_name = $record['is_approve'];


                if($table_name == 1)
                {

                    $update = ForumModel::where('id', '=', $record['id'])->update(['is_approve'=> 0]);


                }
                else{

                    $update = ForumModel::where('id', '=', $record['id'])->update(['is_approve'=> 1]);


                }
            }
        }
        return redirect()->back()->withSuccess('Data recovered successfully!');
    }

    public function deleteReply(Request $request)
    {
        $input=$request->all();

        $form=ForumCommentReplyModel::find($input['ReplyId']);
        $form->is_deleted=1;
        $result=$form->save();

        if($result)
        {
            echo json_encode(array('status'=>true,'message'=>'Reply Deleted Successfully'));
        }
        else
        {
            echo json_encode(array('status'=>false,'message'=>'Reply not Deleted'));
        }
    }

    public function deleteComment(Request $request)
    {
        $input=$request->all();

        $result1=ForumCommentReplyModel::where('id',$input['CommentId'])->update(['is_deleted'=>1]);
        $result2=ForumCommentReplyModel::where('comment_id',$input['CommentId'])->update(['is_deleted'=>1]);
        if($result1 || $result2)
        {
            echo json_encode(array('status'=>true,'message'=>'Comment Deleted Successfully'));
        }
        else
        {
            echo json_encode(array('status'=>false,'message'=>'Comment not Deleted'));
        }
    }
}

