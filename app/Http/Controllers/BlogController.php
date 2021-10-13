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
use App\Http\Traits\UserLocationDetailTrait;
use Illuminate\Support\Str;
use Auth;
use App\Http\Model\BlogsCommentReplyModel;

class BlogController extends Controller
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

        $obj->name=$input['name'];
        $obj->description=$input['description'];
        $obj->url=$input['url'];
        $obj->media_file_json=$multipleDataJson;
        $obj->tagged=$input['tagged'];
        $obj->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
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

    public function bloglist(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $txtStatusType = isset($request->status) ? $request->status : '';
        $storyStartDate = isset($request->startDate) ? $request->startDate : '';
        $storyEndDate = isset($request->endDate) ? $request->endDate : '';

        $preQuery = BlogsModel::where('blogs.status', '!=', 'deleted')->leftJoin('user',function ($join)
        {
            $join->on('blogs.user_id', '=', 'user.id');

        })->select('blogs.*','user.name as user_id');

        if(isset($txtStatusType) && !empty($txtStatusType))
        {
            $result_obj= $preQuery->where('blogs.status',$txtStatusType);

        }
        if(isset($storyStartDate) && !empty($storyStartDate) && isset($storyEndDate) && !empty($storyEndDate))
        {
            $result_obj= $preQuery->whereBetween('blogs.created_at',[$storyStartDate,$storyEndDate]);
        }
      
        $result_obj= $preQuery->get();

        return DataTables::of($result_obj)

        ->addColumn('id', function ($result_obj) {
            $counters = $this->counter++;
            $id = '<div><span>' . $counters . '</span></div>';
            return $id;
        })
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
                <a class="dropdown-item" href=" '.route('blog.getCommentReplyList',$result_obj['id']).' ">View Comment</a>

            </div>';
            return $command;
        })
        ->rawColumns(['id','user_id','name','description','media_file','tagged','url','status_td','command'])
        ->make(true);
    }


    public function getCommentReplyList(Request $request, $id)
    {
        $input = $request->all();
        $blog_id=$id;

        $blogDetail=BlogsModel::with(['user'])->where('id',$blog_id)->first();
        // dd($blogDetail);
        $recordsPerPage = isset($input['recordsPerPage']) ? $input['recordsPerPage'] : 5;
        $pageNumber = isset($input['pageNumber']) ? $input['pageNumber'] : 1;

        $skip = (($pageNumber - 1) * $recordsPerPage);

        $commentData = BlogsCommentReplyModel::where('blogs_comment_reply.blog_id',$blog_id)
        ->where('blogs_comment_reply.comment_id',0)
        ->leftJoin('user','blogs_comment_reply.user_id','user.id')
        ->select('blogs_comment_reply.id','blogs_comment_reply.message','blogs_comment_reply.media','blogs_comment_reply.created_at',
        'user.name as username','user.user_image as userimage')
        ->where('blogs_comment_reply.is_deleted',0)->paginate(10);
        //->skip($skip)->take(5)
        //->get()->toArray();
        // echo '<pre>';
        // print_r($commentData);
        // exit;
        $commentReplyArray = array();
        foreach ($commentData as $comment)
        {
            $commentId = $comment->id;
            $replyData =BlogsCommentReplyModel::where('blogs_comment_reply.comment_id',$commentId)
            ->where('blogs_comment_reply.comment_id','!=',0)
            ->leftJoin('user','blogs_comment_reply.user_id','user.id')
            ->select('blogs_comment_reply.*','user.name as username','user.user_image as userimage')
            ->where('blogs_comment_reply.is_deleted',0)
            ->orderBy('blogs_comment_reply.id','desc')->get()->toArray();

            $commentReplyArray[$commentId]['id'] = $commentId;
            $commentReplyArray[$commentId]['comment'] = $comment->message;
            $commentReplyArray[$commentId]['media'] = $comment->media;
            $commentReplyArray[$commentId]['username'] = $comment->username;
            $commentReplyArray[$commentId]['userimage'] = $comment->userimage;
            $commentReplyArray[$commentId]['created_at'] = $comment->created_at;

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

        // dd($commentReplyArray);
        return view('blog.comment_reply_structure', compact('commentReplyArray','recordsPerPage','blogDetail','commentData'));
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

    public function deleteReply(Request $request)
    {
        $input=$request->all();

        $form=BlogsCommentReplyModel::find($input['ReplyId']);
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

        $result1=BlogsCommentReplyModel::where('id',$input['CommentId'])->update(['is_deleted'=>1]);
        $result2=BlogsCommentReplyModel::where('comment_id',$input['CommentId'])->update(['is_deleted'=>1]);
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
