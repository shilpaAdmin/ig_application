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

        $forums=ForumModel::select('forum.*','user.name','user.user_image')
                            ->with(['forumComments'])
                            ->join('user','user.id','=','forum.user_id')
                            ->get();



        return view('frontend.forum_listing',compact('forums'));
    }

    public function forumDetails(Request $request){
        $input= $request->all();
        $id=$input['id'];

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
                        ->find($id);

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

        return redirect()->route('forumdetail', ['id'=>$input['forum_id']])->with('message', 'Comment saved sucessfully!!!');
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
}
