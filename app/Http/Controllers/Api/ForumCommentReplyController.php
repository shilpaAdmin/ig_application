<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\User;
use App\Http\Model\ForumCommentReplyModel;
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
            $forum=ForumCommentReplyModel::where('id',$input['CommentID'])->first();
            
            if($forum===null)
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
            $forum=ForumCommentReplyModel::where('id',$input['CommentOrReplyId'])->first();
            
            if($forum===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Comment not exist!','Result'=>array()]);
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


        if($likesObj===null)
        {
            if($input['Type']=='forum')
            {
                ForumCommentReplyLikesModel::insert(
                ['user_id'=>$input['RegisterId'],'comment_or_reply_id'=>$input['CommentOrReplyId'],
                'forum_id'=>$input['Id'],'is_like'=>1]);
            }
            elseif($input['Type']=='blog')
            {
                BlogsCommentReplyLikesModel::insert(
                ['user_id'=>$input['RegisterId'],'comment_or_reply_id'=>$input['CommentOrReplyId'],
                'blog_id'=>$input['Id'],'is_like'=>1]);
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
                ->where('user_id',$input['RegisterId'])->where('forum_id',$input['Id'])
                ->update(['is_like'=>$newValue]);
            }
            elseif($input['Type']=='blog')
            {
                $result=BlogsCommentReplyLikesModel::where('comment_or_reply_id',$input['CommentOrReplyId'])
                ->where('user_id',$input['RegisterId'])->where('blog_id',$input['Id'])
                ->update(['is_like'=>$newValue]);
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