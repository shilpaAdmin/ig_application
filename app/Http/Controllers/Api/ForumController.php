<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\ForumModel;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\ForumCommentReplyLikesModel;
use App\Http\Model\BlogsCommentReplyModel;
use App\Http\Model\BlogsCommentReplyLikesModel;

use App\User;

use App\Http\Traits\UserLocationDetailTrait;
use App\Http\Traits\PdfImageNameCleanTrait;

use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File; 

class ForumController extends Controller
{
    use UserLocationDetailTrait;
    use PdfImageNameCleanTrait;

    public function storeForumData(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!isset($input['Question']) || empty($input['Question']))
        {
            $error[] = 'Question Must be Required!';
		}

        if(!isset($input['Description']) || empty($input['Description']))
        {
            $error[] = 'Description Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error)]);
		}

        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {
            $user=User::where('id',$input['RegisterId'])->first();

            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!']);
            }
        }

        if(isset($input['Id']) && !empty($input['Id']))
        {

            $forum=ForumModel::where('id',$input['Id'])->first();

            if($forum===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Forum record not exist!']);
            }
        }

        $LocationType=$cityCountryId='';

        $locationData=$this->getUserLocationDetail($input['RegisterId']);

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

        $attachmentImage='';

        if(isset($input['Attachment']) && !empty($input['Attachment']))
        {
            if(isset($input['Id']) && !empty($input['Id']))
            {
                if(isset($forum->attachment) && !empty($forum->attachment))
                {
                    $destinationPath = public_path().'/images/forum_attachments/';
                    
                    if(file_exists($destinationPath.$forum->attachment))
                    File::delete($destinationPath.$forum->attachment);
                }
            }

            $imagedestinationPath=$media_path=public_path().'/images/forum_attachments/';

            if($mediaData = $request->file('Attachment'))
            {
                $media_name='';

                if(!empty($mediaData->getClientOriginalName()))
                $media_name=$this->getPdfImageNameClean(substr($mediaData->getClientOriginalName(), 0, strrpos($mediaData->getClientOriginalName(), '.')));

                $attachmentImage = $media_name.'_' .time(). '.' . $mediaData->getClientOriginalExtension();
                $mediaData->move($imagedestinationPath, $attachmentImage);
            }
        }

        if(isset($input['Id']) && !empty($input['Id']))
        {
            $forumObject=ForumModel::find($input['Id']);

            if(isset($input['Question']) && !empty($input['Question']))
            $forumObject->question=$input['Question'];

            if(isset($input['Description']) && !empty($input['Description']))
            $forumObject->description=$input['Description'];

            if(isset($input['RegisterId']) && !empty($input['RegisterId']))
            $forumObject->user_id=$input['RegisterId'];

            if(isset($input['URL']) && !empty($input['URL']))
            $forumObject->url=!empty($input['URL'])?$input['URL']:'';

            if(isset($input['TelegramLink']) && !empty($input['TelegramLink']))
            $forumObject->telegram_link=!empty($input['TelegramLink'])?$input['TelegramLink']:'';

            $forumObject->cityid_or_countryid=$cityCountryId;
            $forumObject->type_city_or_country=$LocationType;

            if(isset($input['Attachment']) && !empty($input['Attachment']))
            {
                $forumObject->attachment=$attachmentImage;
            }

            if($forumObject->save())
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'Forum updated successfully!']);
            }
            else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Forum not updated!']);
            }
        }
        else
        {
            $forumObject=new ForumModel;
            $forumObject->question=!empty($input['Question'])?$input['Question']:'';
            $forumObject->description=!empty($input['Description'])?$input['Description']:'';
            $forumObject->user_id=!empty($input['RegisterId'])?$input['RegisterId']:'';
            $forumObject->url=!empty($input['URL'])?$input['URL']:'';
            $forumObject->telegram_link=!empty($input['TelegramLink'])?$input['TelegramLink']:'';

            $forumObject->cityid_or_countryid=$cityCountryId;
            $forumObject->type_city_or_country=$LocationType;
            
            if(isset($input['Attachment']) && !empty($input['Attachment']))
            {
                $forumObject->attachment=$attachmentImage;
            }

            if(isset($input['Question']) && !empty($input['Question']))
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $input['Question'])).'-'.Str::random(5);
            else
            $slug=null;

            $forumObject->slug=$slug;

            if($forumObject->save())
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'Forum added successfully!']);
            }
            else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Forum not added!']);
            }
        }
    }

    public function listForumData(Request $request)
    {
        $input=$request->all();

        if(!isset($input['Pagination']) )
        {
            $error[] = 'Pagination Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error)]);
		}

        $userId=!empty($input['RegisterId'])?$input['RegisterId']:'';
        $locationId=isset($input['LocationId'])?$input['LocationId']:'';
        $locationType=isset($input['LocationType'])?$input['LocationType']:'';

        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;

        if(empty($userId) && empty($locationId) && empty($locationType))
        {
            $formModelPrequery=ForumModel::with('user');
        }
        elseif(!empty($userId))
        {
            $formModelPrequery=ForumModel::with('user')->where('user_id',$userId);
        }
        elseif(!empty($locationId) && !empty($locationType) && $locationType!='country')
        {
            $formModelPrequery=ForumModel::with('user')->where('cityid_or_countryid',$locationId)->where('type_city_or_country',$locationType);
        }
        else
        {
            $formModelPrequery=ForumModel::with('user');
        }

        if($input['Pagination']!=0)
        $fetchAllForumData=$formModelPrequery->where('status','active')->where('is_approve',1)->orderBy('forum.id','DESC')->skip($skip)->take(30)->get()->toArray();
        else 
        $fetchAllForumData=$formModelPrequery->where('status','active')->where('is_approve',1)->orderBy('forum.id','DESC')->get()->toArray();

        $dataArray=array();
        $totalCount=count($fetchAllForumData);

        if($totalCount > 0)
        {
            $dataArray['TotalCount'] = strval($totalCount);

            for($i=0;$i<$totalCount;$i++)
            {
                $dataArray['List'][$i]['Id']=strval($fetchAllForumData[$i]['id']);
                $dataArray['List'][$i]['Question']=!empty($fetchAllForumData[$i]['question'])?$fetchAllForumData[$i]['question']:'';

                $username='';
                $userimage='';

                if(isset($fetchAllForumData[$i]['user']['name']) && !empty($fetchAllForumData[$i]['user']['name']))
                {
                    $username=$fetchAllForumData[$i]['user']['name'];
                }

                if(isset($fetchAllForumData[$i]['user']['user_image']) && !empty($fetchAllForumData[$i]['user']['user_image']))
                {
                    $userimage=URL::to('/images/user').'/'.$fetchAllForumData[$i]['user']['user_image'];
                }

                $dataArray['List'][$i]['ByUser']=$username;

                $dataArray['List'][$i]['ByUserImage']=$userimage;

                $forum_id=$fetchAllForumData[$i]['id'];

                $forumComment=ForumCommentReplyModel::latest()->where('forum_id',$forum_id)
                ->where('is_deleted',0)
                ->where('comment_id',0)->get()->toArray();

                $dataArray['List'][$i]['TotalComments']=strval(count($forumComment));

                $userIdArray=array();

                if(count($forumComment) > 0 && isset($forumComment) && !empty($forumComment))
                {
                    for($l=0;$l< 2; $l++)
                    {
                        if(isset($forumComment[$l]['user_id']))
                        $userIdArray[]=$forumComment[$l]['user_id'];
                    }

                    $userCommentImages=User::whereIn('id',$userIdArray)->select('user_image')->get()->toArray();

                    for($m=0;$m<2;$m++)
                    {
                        if(isset($userCommentImages[$m]['user_image']))
                        $dataArray['List'][$i]['CommentImage'.($m+1)]=URL::to('/images/user').'/'.$userCommentImages[$m]['user_image'];
                        else
                        $dataArray['List'][$i]['CommentImage'.($m+1)]='';
                    }

                    if(!empty($userIdArray) && count($userIdArray)==2 && $userIdArray[0]==$userIdArray[1])
                    {
                        $dataArray['List'][$i]['CommentImage2']=$dataArray['List'][$i]['CommentImage1'];
                    }
                }
                else
                {
                    $dataArray['List'][$i]['CommentImage1']='';
                    $dataArray['List'][$i]['CommentImage2']='';
                }

                $dataArray['List'][$i]['TelegramLink']=!empty($fetchAllForumData[$i]['telegram_link'])?$fetchAllForumData[$i]['telegram_link']:'';
                $dataArray['List'][$i]['Date']=isset($fetchAllForumData[$i]['created_at'])?date('d-m-Y',strtotime($fetchAllForumData[$i]['created_at'])):'';
                $dataArray['List'][$i]['Time']=isset($fetchAllForumData[$i]['created_at'])?date('H:i:s',strtotime($fetchAllForumData[$i]['created_at'])):'';
            }
        }
        else
        {
            $dataArray['TotalCount']="0";
            $dataArray['List'] = array();

        }


        if(!empty($dataArray['List']))
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'Forum Data Listed Successfully','Result'=>$dataArray]);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>$dataArray]);
        }
    }

    public function forumDetailData(Request $request)
    {
        $input=$request->all();

        if(!isset($input['ForumId']) || empty($input['ForumId']))
        {
            $error[] = 'ForumId Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(isset($input['ForumId']) && !empty($input['ForumId']))
        {

            $forum=ForumModel::where('id',$input['ForumId'])->first();

            if($forum===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Forum record not exist!'
                ,'Result'=>array()]);
            }
        }

        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {

            $user=User::where('id',$input['RegisterId'])->first();

            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!'
                ,'Result'=>array()]);
            }
        }

        $forumModel=ForumModel::with(['user'])->where('id',$input['ForumId'])->get()->toArray();

        $forum=ForumCommentReplyModel::with(['user','forum'])->where([
            ['forum_id',$input['ForumId']],
           // ['user_id',$input['RegisterId']]
            ])->where('comment_id',0)->where('is_deleted',0)->orderBy('id','desc')->get()->toArray();

        $total_count=count($forumModel);
        //print_r($forumModel);

        $total_forum=count($forum);

        $dataArray=array();

        if($total_count > 0)
        {
            $dataArray['RegisterId']=strval($forumModel[0]['user_id']);
            $dataArray['ForumId']=strval($forumModel[0]['id']);
            $dataArray['ByUser']=!empty($forumModel[0]['user']['name'])?$forumModel[0]['user']['name']:'';
            $dataArray['ByUserImage']=!empty($forumModel[0]['user']['user_image'])?URL::to('/images/user').'/'.$forumModel[0]['user']['user_image']:'';
            $dataArray['URL']=!empty($forumModel[0]['url'])?$forumModel[0]['url']:'';
            $dataArray['Question']=!empty($forumModel[0]['question'])?$forumModel[0]['question']:'';
            $dataArray['Description']=!empty($forumModel[0]['description'])?$forumModel[0]['description']:'';
            $dataArray['TelegramLink']=!empty($forumModel[0]['telegram_link'])?$forumModel[0]['telegram_link']:'';

            $attachment='';

            if(!empty($forumModel[0]['attachment']))
            {
                $attachment_image_path=public_path().'/images/forum_attachments/'.$forumModel[0]['attachment'];

                if(file_exists($attachment_image_path))
                $attachment=URL::to('/images/forum_attachments').'/'.$forumModel[0]['attachment'];
            }

            $dataArray['Attachment']=$attachment;
        }

        //if data found
        if($total_forum > 0)
        {
            $dataArray['TotalCommentCount']=strval($total_forum);

            // adding all comment through loop
            for($i=0;$i<$total_forum;$i++)
            {
                if($forum[$i]['comment_id']==0)
                {
                    $dataArray['Comment'][$i]['Id']=strval($forum[$i]['id']);
                    $dataArray['Comment'][$i]['Message']=!empty($forum[$i]['message'])?$forum[$i]['message']:'';
                    $dataArray['Comment'][$i]['UserId']=!empty($forum[$i]['user_id'])?strval($forum[$i]['user_id']):'';
                    $dataArray['Comment'][$i]['UserName']=!empty($forum[$i]['user']['name'])?$forum[$i]['user']['name']:'';
                    $dataArray['Comment'][$i]['UserImage']=!empty($forum[$i]['user']['user_image'])?URL::to('/images/user').'/'.$forum[$i]['user']['user_image']:'';
                    $dataArray['Comment'][$i]['Date']=date('d-m-Y',strtotime($forum[$i]['created_at']));
                    $dataArray['Comment'][$i]['Time']=date('H:i:s',strtotime($forum[$i]['created_at']));
                    $dataArray['Comment'][$i]['Media']=!empty($forum[$i]['media'])?URL::to('/images/comment_media').'/'.$forum[$i]['media']:'';

                    $total_likes=ForumCommentReplyLikesModel::where('is_like',1)->where('forum_id',$input['ForumId'])
                    ->where('comment_or_reply_id',$forum[$i]['id'])->where('is_deleted',0)->count();

                    $no_of_likes=0;
                    if($total_likes!=0)
                    {
                        $no_of_likes=$total_likes;
                    }

                    $dataArray['Comment'][$i]['LikeCount']=strval($no_of_likes);

                   // $user_like_obj=ForumCommentReplyLikesModel::where('forum_id',$input['ForumId'])
                  // ->where('comment_or_reply_id',$forum[$i]['id'])->where('user_id',$forum[$i]['user']['id'])->select('is_like')->first();

                    $userCommentId=0;
                    if(isset($input['RegisterId']) && !empty($input['RegisterId']))
                    {
                        $userCommentId=$input['RegisterId'];
                    }

                    $user_like_obj=ForumCommentReplyLikesModel::where('forum_id',$input['ForumId'])
                    ->where('comment_or_reply_id',$forum[$i]['id'])->where('user_id',$userCommentId)
                    ->where('is_deleted',0)
                    ->select('is_like')->first();

                    $is_like='';

                    if(isset($user_like_obj))
                    {
                        $flag=intval($user_like_obj->is_like);
                        if($flag==1)
                        $is_like='Yes';
                        else
                        $is_like='No';
                    }
                    else
                    {
                        $is_like='No';
                    }

                    $dataArray['Comment'][$i]['IsLike']=$is_like;

                    $replyData=ForumCommentReplyModel::with(['user'])->where('comment_id',$forum[$i]['id'])
                    ->where('comment_id','!=',0)->where('is_deleted',0)->orderBy('id','desc')->get()->toArray();

                    $totalReplyData=count($replyData);

                    if($totalReplyData > 0)
                    {
                        for($j=0;$j<$totalReplyData;$j++)
                        {
                            $dataArray['Comment'][$i]['Reply'][$j]['Id']=strval($replyData[$j]['id']);
                            $dataArray['Comment'][$i]['Reply'][$j]['Message']=!empty($replyData[$j]['message'])?$replyData[$j]['message']:'';
                            $dataArray['Comment'][$i]['Reply'][$j]['UserId']=!empty($replyData[$j]['user_id'])?strval($replyData[$j]['user_id']):'';
                            $dataArray['Comment'][$i]['Reply'][$j]['UserName']=!empty($replyData[$j]['user']['name'])?$replyData[$j]['user']['name']:'';
                            $dataArray['Comment'][$i]['Reply'][$j]['UserImage']=!empty($replyData[$j]['user']['user_image'])?URL::to('/images/user').'/'.$replyData[$j]['user']['user_image']:'';
                            $dataArray['Comment'][$i]['Reply'][$j]['Date']=date('d-m-Y',strtotime($replyData[$j]['created_at']));
                            $dataArray['Comment'][$i]['Reply'][$j]['Time']=date('H:i:s',strtotime($replyData[$j]['created_at']));
                            $dataArray['Comment'][$i]['Reply'][$j]['Media']=!empty($replyData[$j]['media'])?URL::to('/images/reply_media').'/'.$replyData[$j]['media']:'';

                            $total_likes_reply=ForumCommentReplyLikesModel::where('is_like',1)->where('forum_id',$input['ForumId'])
                            ->where('comment_or_reply_id',$replyData[$j]['id'])->where('is_deleted',0)->count();

                            $no_of_likes_reply=0;
                            if($total_likes_reply!=0)
                            {
                                $no_of_likes_reply=$total_likes_reply;
                            }
                            $dataArray['Comment'][$i]['Reply'][$j]['LikeCount']=strval($no_of_likes_reply);

                            $userReplyId=0;
                            if(isset($input['RegisterId']) && !empty($input['RegisterId']))
                            {
                                $userReplyId=$input['RegisterId'];
                            }

                            $user_like_obj=ForumCommentReplyLikesModel::where('forum_id',$input['ForumId'])
                            ->where('comment_or_reply_id',$replyData[$j]['id'])->where('is_deleted',0)
                            ->where('user_id',$userReplyId)->select('is_like')->first();

                            $is_like='';

                            if(isset($user_like_obj))
                            {
                                $flag=intval($user_like_obj->is_like);
                                if($flag==1)
                                $is_like='Yes';
                                else
                                $is_like='No';
                            }
                            else
                            {
                                $is_like='No';
                            }

                            $dataArray['Comment'][$i]['Reply'][$j]['IsLike']=$is_like;
                        }
                    }
                    else
                    {
                        $dataArray['Comment'][$i]['Reply']=array();
                    }
                }
            }

        }
        else
        {
            $dataArray['TotalCommentCount']=strval(0);
            $dataArray['Comment']=array();
        }

        return response()->json(["Status"=>true,"StatusMessage"=>"Get Forum detail successfully!"
        ,"Result"=>$dataArray]);
    }

    public function deleteForumBlogCommentReply(Request $request)
    {
        $input=$request->all();

        if(empty($input['CommentId']) && empty($input['ReplyId']))
        {
            $error[] = 'CommentId Or ReplyId Must be Required!';
		}

        if(!isset($input['Type']) || empty($input['Type']))
        {
            $error[] = 'Type Must be Required!';
		}

        if(!isset($input['Id']) || empty($input['Id']))
        {
            $error[] = 'Id Must be Required!';
		}

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $preQuery='';

        if($input['Type']=='blog')
        {
            if(isset($input['CommentId']))
            {
                $preQuery=BlogsCommentReplyModel::where('id',$input['CommentId'])->where('blog_id',$input['Id']);
            }
            else
            {
                $preQuery=BlogsCommentReplyModel::where('id',$input['ReplyId'])->where('blog_id',$input['Id']);
            }
        }
        elseif($input['Type']=='forum')
        {
            if(isset($input['CommentId']))
            {
                $preQuery=ForumCommentReplyModel::where('id',$input['CommentId'])->where('forum_id',$input['Id']);
            }
            else
            {
                $preQuery=ForumCommentReplyModel::where('id',$input['ReplyId'])->where('forum_id',$input['Id']);
            }
        }

        //$result=$preQuery->update(['is_deleted'=>1]);

        if($preQuery->update(['is_deleted'=>1]))
        {

            if($input['Type']=='blog')
            {

                if(isset($input['CommentId']))
                {
                    BlogsCommentReplyModel::where('comment_id',$input['CommentId'])->update(['is_deleted'=>1]);

                    BlogsCommentReplyLikesModel::where('comment_or_reply_id',$input['CommentId'])
                    ->where('user_id',$input['RegisterId'])
                    ->where('blog_id',$input['Id'])
                    ->update(['is_deleted'=>1]);
                }
                else
                {
                    BlogsCommentReplyLikesModel::where('comment_or_reply_id',$input['ReplyId'])
                    ->where('user_id',$input['RegisterId'])
                    ->where('blog_id',$input['Id'])
                    ->update(['is_deleted'=>1]);
                }
            }
            elseif($input['Type']=='forum')
            {
                if(isset($input['CommentId']))
                {
                    ForumCommentReplyModel::where('comment_id',$input['CommentId'])->update(['is_deleted'=>1]);

                    ForumCommentReplyLikesModel::where('comment_or_reply_id',$input['CommentId'])
                    ->where('user_id',$input['RegisterId'])
                    ->where('forum_id',$input['Id'])
                    ->update(['is_deleted'=>1]);
                }
                else
                {
                    ForumCommentReplyLikesModel::where('comment_or_reply_id',$input['ReplyId'])
                    ->where('user_id',$input['RegisterId'])
                    ->where('forum_id',$input['Id'])
                    ->update(['is_deleted'=>1]);
                }
            }

            return response()->json(['Status'=>true,'StatusMessage'=>'Record deleted successfully !','Result'=>array()]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Record not exist !','Result'=>array()]);
        }
    }
}
