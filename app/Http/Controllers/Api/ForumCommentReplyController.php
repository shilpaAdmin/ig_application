<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\User;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\BlogsCommentReplyModel;
use App\Http\Model\ForumModel;
use App\Http\Model\BlogsModel;
use App\Http\Model\ForumCommentReplyLikesModel;
use App\Http\Model\BlogsCommentReplyLikesModel;
use URL;
use Illuminate\Http\Request;

class ForumCommentReplyController extends Controller
{
    public function storeCommentReplyData(Request $request)
    {   
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!isset($input['ForumId']) || empty($input['ForumId']))
        {
            $error[] = 'ForumId Must be Required!';
		}
        
        if(!isset($input['Type']) || empty($input['Type']))
        {
            $error[] = 'Type Must be Required!';
		}

        if(!isset($input['Message']) || empty($input['Message']))
        {
            $error[] = 'Message Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {   
            $user=User::where('id',$input['RegisterId'])->first();
            
            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!']);
            }
        }

        if(isset($input['CommentID']) && !empty($input['CommentID']))
        {   
            $forumComment=ForumCommentReplyModel::where('id',$input['CommentID'])->where('comment_id',0)->first();
            
            if($forumComment===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Comment not exist!']);
            }
        }
        
        if(isset($input['ForumId']) && !empty($input['ForumId']))
        {   
            $forum=ForumModel::where('id',$input['ForumId'])->first();
            
            if($forum===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Forum record not exist!']);
            }
        }

        $obj=new ForumCommentReplyModel;
        $obj->user_id=$input['RegisterId'];
        $obj->forum_id=$input['ForumId'];
        $obj->type=$input['Type'];

        if(isset($input['CommentID']))
        $obj->comment_id=$input['CommentID'];
        else
        $obj->comment_id=0;
        //$obj->reply_id=$input['ReplyId'];
        $obj->message=$input['Message'];

        $destination_path='';
        $imageName='';

        if(isset($input['CommentID']) && !empty($input['CommentID']))
        {
            $destinationPath = public_path().'/images/reply_media/';
        }
        else
        {
            $destinationPath = public_path().'/images/comment_media/';
        }

        if($mediaData = $request->file('Media'))
        {
            $imageName = md5(time() . '_' . $mediaData->getClientOriginalName()) . '.' . $mediaData->getClientOriginalExtension();
            $mediaData->move($destinationPath, $imageName);
            
            $obj->media=$imageName;
        }

        $str='';
        if(empty($input['CommentID']))
        {
            $str='Comment';
        }
        else
        {
            $str='Reply';
        }

        if($obj->save())
        {
            if(isset($input['CommentID']) && !empty($input['CommentID']))
            {
                if(!empty($forumComment->user_id) && $forumComment->user_id > 0 )
                app('App\Http\Controllers\Api\NotificationsController')->sendNotification($forumComment->user_id,$input['ForumId'],$user->name.' added reply on your comment.','forum_reply','','forum reply');
            }
            else
            {
                if(!empty($forum->user_id) && $forum->user_id > 0 )
                app('App\Http\Controllers\Api\NotificationsController')->sendNotification($forum->user_id,$input['ForumId'],$user->name.' added comment in your forum.','forum_comment','','forum comment');
            }

            return response()->json(['Status'=>true,'StatusMessage'=>$str.' added successfully!']);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>$str.' not added!']);
        }
    }
    
    public function userLikeUnlike(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}
        
        if(!isset($input['CommentOrReplyId']) || empty($input['CommentOrReplyId']))
        {
            $error[] = 'CommentOrReplyId Must be Required!';
        }
        
        if(!isset($input['Type']) || empty($input['Type']))
        {
            $error[] = 'Type Must be Required!';
        }

        if(empty($input['Id']) && empty($input['Id']))
        {
            $error[] = 'Id Must be Required!';
        }

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        
        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {   
            $user=User::where('id',$input['RegisterId'])->first();
            
            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
            }
        }

        if(isset($input['CommentOrReplyId']) && !empty($input['CommentOrReplyId']))
        {   
            if($input['Type']=='forum')
            {   
                $forum_comment_reply=ForumCommentReplyModel::where('id',$input['CommentOrReplyId'])->first();
            
                if($forum_comment_reply===null)
                {
                    return response()->json(['Status'=>false,'StatusMessage'=>'Forum comment or reply not exist!','Result'=>array()]);
                }
            }
            else
            {
                $blog_comment_reply=BlogsCommentReplyModel::where('id',$input['CommentOrReplyId'])->first();
            
                if($blog_comment_reply===null)
                {
                    return response()->json(['Status'=>false,'StatusMessage'=>'Blog comment or reply not exist!','Result'=>array()]);
                }
            }
        }
        
        if(isset($input['Id']) && !empty($input['Id']))
        {
            if($input['Type']=='blog')
            {   
                $Blogs=BlogsModel::where('id',$input['Id'])->first();
                
                if($Blogs===null)
                {
                    return response()->json(['Status'=>false,'StatusMessage'=>'Blog record not exist!','Result'=>array()]);
                }

            }
            elseif($input['Type']=='forum')
            {
                $forum=ForumModel::where('id',$input['Id'])->first();
                
                if($forum===null)
                {
                    return response()->json(['Status'=>false,'StatusMessage'=>'Forum record not exist!','Result'=>array()]);
                }
            }
        }

        if($input['Type']=='forum')
        {
            $likesObj=ForumCommentReplyLikesModel::where('user_id',$input['RegisterId'])
            ->where('comment_or_reply_id',$input['CommentOrReplyId'])->first();
        }
        elseif($input['Type']=='blog')
        {
            $likesObj=BlogsCommentReplyLikesModel::where('user_id',$input['RegisterId'])
            ->where('comment_or_reply_id',$input['CommentOrReplyId'])->first();
        }

        $stringcommentreplyinfo='';
        // check forum or blog contains comment or reply
        if($input['Type']=='forum')
        {
            if(!empty($forum_comment_reply))
            {
                if($forum_comment_reply->comment_id==0)
                {
                    $stringcommentreplyinfo='forum comment';
                }
                else
                {
                    $stringcommentreplyinfo='forum reply';
                }
            }
        }
        else
        {
            if(!empty($blog_comment_reply))
            {
                if($blog_comment_reply->comment_id==0)
                {
                    $stringcommentreplyinfo='blog comment';
                }
                else
                {
                    $stringcommentreplyinfo='blog reply';
                }
            }
        }

        $user_name='';
        if(!empty($user->name))
        $user_name=$user->name;

        if($likesObj===null)
        {
            if($input['Type']=='forum')
            {
                ForumCommentReplyLikesModel::insert(
                ['user_id'=>$input['RegisterId'],'comment_or_reply_id'=>$input['CommentOrReplyId'],
                'forum_id'=>$input['Id'],'is_like'=>1]);
                
                if(!empty($user_name) && !empty($forum_comment_reply->user_id) && $forum_comment_reply->user_id!=0 )
                $result=app('App\Http\Controllers\Api\NotificationsController')->sendNotification($forum_comment_reply->user_id,$input['Id'],$user_name.' likes your '.$stringcommentreplyinfo,'forum like','',$stringcommentreplyinfo.' like');
            }
            elseif($input['Type']=='blog')
            {
                BlogsCommentReplyLikesModel::insert(
                ['user_id'=>$input['RegisterId'],'comment_or_reply_id'=>$input['CommentOrReplyId'],
                'blog_id'=>$input['Id'],'is_like'=>1]);
                
                if(!empty($user_name) && !empty($blog_comment_reply->user_id) && $blog_comment_reply->user_id!=0 )
                $result=app('App\Http\Controllers\Api\NotificationsController')->sendNotification($blog_comment_reply->user_id,$input['Id'],$user_name.' likes your '.$stringcommentreplyinfo,'blog like','',$stringcommentreplyinfo.' like');
            }

            return response()->json(['Status'=>true,'StatusMessage'=>'Status stored!','Result'=>array()]);
        }
        else
        {
            $newValue=0;

            $flag=intval($likesObj->is_like);
            if($flag==1)
            {
                $newValue=0;
            }
            else
            {
                $newValue=1;
            }

            $result='';
            if($input['Type']=='forum')
            {
                $result=ForumCommentReplyLikesModel::where('comment_or_reply_id',$input['CommentOrReplyId'])
                ->where('user_id',$input['RegisterId'])->where('forum_id',$input['Id'])->first();
                
                $result->update(['is_like'=>$newValue]);

                if($newValue==1)
                {
                    if(!empty($user_name) && !empty($forum_comment_reply->user_id) && $forum_comment_reply->user_id!=0 )
                    app('App\Http\Controllers\Api\NotificationsController')->sendNotification($forum_comment_reply->user_id,$input['Id'],$user_name.' likes your '.$stringcommentreplyinfo,'forum','',$stringcommentreplyinfo.' like');
                }
            }
            elseif($input['Type']=='blog')
            {
                $result=BlogsCommentReplyLikesModel::where('comment_or_reply_id',$input['CommentOrReplyId'])
                ->where('user_id',$input['RegisterId'])->where('blog_id',$input['Id'])->first();
                
                $result->update(['is_like'=>$newValue]);
                
                if($newValue==1)
                {
                    if(!empty($user_name) && !empty($blog_comment_reply->user_id) && $blog_comment_reply->user_id!=0 )
                    app('App\Http\Controllers\Api\NotificationsController')->sendNotification($blog_comment_reply->user_id,$input['Id'],$user_name.' likes your '.$stringcommentreplyinfo,'blog','',$stringcommentreplyinfo.' like');
                }

            }

            if($result)
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'Status updated!','Result'=>array()]);
            }
            else
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'Status not updated!','Result'=>array()]);
            }
        }
    }   
}