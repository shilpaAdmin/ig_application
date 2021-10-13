<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use App\Http\Controllers\Controller;

use App\Http\Model\BlogsCommentReplyModel;
use App\Http\Model\BlogsModel;
use App\User;

use Illuminate\Http\Request;
use HasApiTokens;
use Hash;
use URL;

class BlogCommentReplyController extends Controller
{
    public function storeCommentReplyData(Request $request)
    {
        $input=$request->all();

        if(!isset($input['BlogId']) || empty($input['BlogId']))
        {
            $error[] = 'BlogId Must be Required!';
		}
        
        if(!isset($input['Type']) || empty($input['Type']))
        {
            $error[] = 'Type Must be Required!';
		}
        
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}


        /*if(isset($input['Media']) && !empty($input['Media']))
        {
            $mime_types_array=array('image/jpeg','image/png','image/gif','video/mp4');

            $documentfile=$input['Media'];
            
            if(!(in_array($documentfile->getClientMimeType(),$mime_types_array)))
            {
                return response()->json(['Status'=>False,'StatusMessage'=>'Only image & video media files are allowed. Please, select supported formats!','Result'=>array()]);
            }
            //var_dump($input['Image']);exit;
        }*/

        $name=$email='';

        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {   
            $user=User::where('id',$input['RegisterId'])->first();
            
            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=> []]);
            }
        }
        else
        {
            if(isset($input['Name']) && !empty($input['Name']))
            {
                $name=$input['Name'];
            }

            if(isset($input['Email']) && !empty($input['Email']))
            {
                $email=$input['Email'];
            }
        }

        if(isset($input['CommentID']) && !empty($input['CommentID']))
        {   
            $forum=BlogsCommentReplyModel::where('id',$input['CommentID'])->where('comment_id',0)->first();
            
            if($forum===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Comment not exist!','Result'=> []]);
            }
        }
        
        if(isset($input['BlogId']) && !empty($input['BlogId']))
        {   
            $blog=BlogsModel::where('id',$input['BlogId'])->first();
            
            if($blog===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Blog record not exist!','Result'=> []]);
            }
        }

        $obj=new BlogsCommentReplyModel;
        $obj->user_id=!empty($input['RegisterId'])?$input['RegisterId']:0;

        if(empty($input['RegisterId']))
        {
            $obj->name=$name;
            $obj->email=$email;
        }

        $obj->blog_id=$input['BlogId'];
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
            $destinationPath = public_path().'/images/blogs/blog_reply_media/';
        }
        else
        {
            $destinationPath = public_path().'/images/blogs/blog_comment_media/';
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
                $blogCommentObj=BlogsCommentReplyModel::with(['user'])->where('comment_id',0)->where('id',$input['CommentID'])->first();

                if(!empty($blogCommentObj->user_id) && $blogCommentObj->user_id > 0 )
                $result=app('App\Http\Controllers\Api\NotificationsController')->sendNotification($blogCommentObj->user_id,$obj->id,$user->name.' added reply on your comment.','blog_reply','','');
            }
            else
            {
                if(!empty($blog->user_id) && $blog->user_id > 0 )
                $result=app('App\Http\Controllers\Api\NotificationsController')->sendNotification($blog->user_id,$obj->id,$user->name.' added comment in your blog.','blog_comment','','');
            }
            
            return response()->json(['Status'=>true,'StatusMessage'=>$str.' added successfully!','Result'=> []]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>$str.' not added!','Result'=> []]);
        }
    }
}