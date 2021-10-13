<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Model\ForumCommentReplyLikesModel;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\ForumModel;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function index(Request $request){

         if($request->ajax()){

             $forums=ForumModel::select('forum.*','user.name','user.user_image')
                        ->with(['forumComments'])
                        ->join('user','user.id','=','forum.user_id')
                        ->paginate(6);
            $view = view("frontend.forum.forum-list",compact('forums'))->render();        
            return response()->json(['html'=>$view]);
        }   
        return view('frontend.forum.forum_listing');
    }

    public function forumDetails(Request $request,$slug) {

        $input= $request->all();
        $forum=ForumModel::select('forum.*','user.name','user.user_image')
                        ->with(['forumComments'=>function($q){
                            $q->select('forum_comment_reply.*','user.name','user.user_image')
                                ->with(['replys'=>function($q){
                                    $q->select('forum_comment_reply.*','user.name','user.user_image')
                                        ->leftJoin('user','user.id','=','forum_comment_reply.user_id');
                                },'likes'])
                                ->leftJoin('user','user.id','=','forum_comment_reply.user_id')
                                ->where('forum_comment_reply.comment_id','=',0)
                                ->orderBy('forum_comment_reply.id','desc');
                        }])
                        ->leftJoin('user','user.id','=','forum.user_id')
                        ->where('slug','=',$slug)
                        ->first();
                        
        return view('frontend.forum_detail',compact('forum'));
    }

    public function saveForumComment(Request $request) {

        // Form validation
        $this->validate($request, [
            'forum_id' => 'required',
            'type' => 'required',
            'comment_id' => 'required',
            'message'=>'required',
        ]);

        $input=$request->all();
        $user=auth()->user();
        $input['user_id'] = isset($user) ? $user->id : 1;
        $comment=ForumCommentReplyModel::create($input);

        $forum =ForumModel::find($input['forum_id']);
        return redirect()->route('forumdetail', ['slug'=>$forum->slug])->with('message', 'Comment saved sucessfully!!!');
    }

    public function saveLikeDislike(Request $request) {
        $input=$request->all();
        $userId = auth()->user() ? auth()->user()->id: 1;
        $likes=ForumCommentReplyLikesModel::where('forum_id','=',$input['forum_id'])
                                        ->where('comment_or_reply_id','=',$input['id'])
                                        ->where('user_id','=',$userId)
                                        ->first();
        if(isset($likes) && $likes) {
            ForumCommentReplyLikesModel::where('forum_id','=',$input['forum_id'])
                                    ->where('comment_or_reply_id','=',$input['id'])
                                    ->where('user_id','=',$userId)
                                    ->update(['is_like'=>1]);
        } else {
            ForumCommentReplyLikesModel::create([
                                                    'forum_id'=>$input['forum_id'],
                                                    'comment_or_reply_id'=>$input['id'],
                                                    'user_id'=>$userId,
                                                    'is_like'=>1,
                                                ]);
        }
        $totalLikes= ForumCommentReplyLikesModel::where('forum_id','=',$input['forum_id'])
                                            ->where('comment_or_reply_id','=',$input['id'])
                                            ->count();

        return response()->json(['totalLikes'=>$totalLikes]);
    }

    public function saveCommentReplys(Request $request) {

        $this->validate($request, [
            'comment_id' => 'required',
            'forum_id' => 'required',
            'type' => 'required',
            'message'=>'required',
            'user_id'=>'required',
        ]);

        $input=$request->all();
        $reply=ForumCommentReplyModel::create($input);
        
        $reply= ForumCommentReplyModel::select('forum_comment_reply.*','user.name','user.user_image')
                            ->with(['likes'])
                            ->leftJoin('user','user.id','=','forum_comment_reply.user_id')
                           ->find($reply->id);

        if($request->ajax()) {

            $view = view("frontend.forum.comment-replay",compact('reply'))->render();

            return response()->json(['html'=>$view]);
        }
    }
}
