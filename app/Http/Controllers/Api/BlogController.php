<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use App\Http\Controllers\Controller;

use App\Http\Model\BlogsModel;
use App\Http\Model\BlogsCommentReplyModel;
use App\Http\Model\BlogsCommentReplyLikesModel;
use App\User;

use Illuminate\Http\Request;
use HasApiTokens;
use Hash;
use URL;
use App\Http\Traits\UserLocationDetailTrait;

class BlogController extends Controller
{
    use UserLocationDetailTrait;

    public function listBlogData(Request $request)
    {
        $input=$request->all();
        $blogs=BlogsModel::all()->toArray();
        
        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;

        $userId=!empty($input['RegisterId'])?$input['RegisterId']:'';
        $locationId=isset($input['LocationId'])?$input['LocationId']:'';
        $locationType=isset($input['LocationType'])?$input['LocationType']:'';
        
        if(empty($userId))
        $blogsPrequery=BlogsModel::with(['user']);
        else
        $blogsPrequery=BlogsModel::with(['user'])->where('user_id',$userId);

        
        if(empty($userId) && empty($locationId) && empty($locationType))
        $blogsPrequery=BlogsModel::with(['user']);
        elseif(!empty($userId))
        $blogsPrequery=BlogsModel::with(['user'])->where('user_id',$userId);
        elseif(!empty($locationId) && !empty($locationType) && $locationType!='country')
        $blogsPrequery=BlogsModel::with(['user'])->where('cityid_or_countryid',$locationId)->where('type_city_or_country',$locationType);
        else
        $blogsPrequery=BlogsModel::with(['user']);

        if($Pagination!=0)
        {
            $listBlogData = $blogsPrequery->skip($skip)->take(30)->get();
        }
        else
        {
            $listBlogData = $blogsPrequery->get();
        }
        //print_r($listBlogData->toArray());exit;

        $totalblogs=count($listBlogData);

        $blogsArray=array();
        $i=0;

        $status=$status_message='';

        if($totalblogs > 0)
        {
            $blogsArray['TotalCounts']=strval($totalblogs);
            foreach($listBlogData as $blogs)
            {

                $mediaArray=json_decode($blogs->media_file_json,true);
                //print_r($mediaArray);
                
                $mediaFiles=array();
                
                if(!empty($mediaArray))
                $totalMedias=count($mediaArray);
                else
                $totalMedias=0;

                if($totalMedias > 0)
                {
                    $m=1;
                    for($j=0;$j<$totalMedias;$j++)
                    {    
                        $media_path=public_path().'/images/blogs/'.$mediaArray[$j];

                        if(file_exists($media_path))
                        {
                            array_push($mediaFiles,URL::to('/images/blogs').'/'.$mediaArray[$j]);
                        }
                        $m++;
                    }
                }

                $blogsArray['List'][$i]['Id']=strval($blogs->id);
                $blogsArray['List'][$i]['Name']=!empty($blogs->name)?$blogs->name:'';
                $blogsArray['List'][$i]['Description']=!empty($blogs->description)?$blogs->description:'';
                $blogsArray['List'][$i]['BlogBy']=!empty($blogs->user['name'])?$blogs->user['name']:'';
                $blogsArray['List'][$i]['MediaURL']=$mediaFiles;
                $blogsArray['List'][$i]['Date']=!empty($blogs->created_at)?date('d-m-Y',strtotime($blogs->created_at)):'';
                $blogsArray['List'][$i]['Time']=!empty($blogs->created_at)?date('H:i:s',strtotime($blogs->created_at)):'';
                $i++;
            }

            $status=true;
            $status_message='Blogs Data Listed Successfully !';
        }
        else
        {
            $status=false;
            $status_message='Blogs not exist !';
        }
        //print_r($blogsArray);exit;
        return response()->json(['Status'=>$status,'StatusMessage'=>$status_message,'Result'=>$blogsArray]);
    }

    public function blogDetailData(Request $request)
    {
        $input=$request->all();
        
        if(!isset($input['BlogId']) || empty($input['BlogId']))
        {
            $error[] = 'BlogId Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(isset($input['BlogId']) && !empty($input['BlogId']))
        {
            
            $blogs=BlogsModel::where('id',$input['BlogId'])->first();
            
            if($blogs===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Blog record not exist!'
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
        
        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;

        $dataArray=array();

        $blogURL=[];
        $mediaArray=json_decode($blogs->media_file_json,true);


        if(!empty($mediaArray))
        $totalMedias=count($mediaArray);
        else
        $totalMedias=0;

        if($totalMedias > 0)
        {
            $m=1;
            
            for($j=0;$j<$totalMedias;$j++)
            {    
                $media_path=public_path().'/images/blogs/'.$mediaArray[$j];

                if(file_exists($media_path))
                {
                    array_push($blogURL,URL::to('/images/blogs').'/'.$mediaArray[$j]);
                }
                $m++;
            }
        }

        $blog_comments=BlogsCommentReplyModel::with(['user','blog'])
        ->where('blog_id',$input['BlogId'])->where('is_deleted',0)
        ->where('comment_id',0)->skip($skip)->take(30)->get()->toArray();;
        

        $dataArray['Id']=strval($blogs->id);
        $dataArray['Name']=!empty($blogs->name)?$blogs->name:'';
        $dataArray['BlogBy']=!empty($blogs->user['name'])?$blogs->user['name']:'';
        $dataArray['Description']=!empty($blogs->description)?$blogs->description:'';
        $dataArray['Tagged']=!empty($blogs->tagged)?$blogs->tagged:'';
        $dataArray['URL']=!empty($blogs->url)?$blogs->url:'';
        $dataArray['MediaURL']=$blogURL;
        $dataArray['Date']=date('d-m-Y',strtotime($blogs->created_at));
        $dataArray['Time']=date('H:i:s',strtotime($blogs->created_at));

        //print_r($blog_comments);

        $total_blog_comments=count($blog_comments);

        if($total_blog_comments > 0)
        {
            $dataArray['TotalComments']=strval($total_blog_comments);

            for($i=0;$i<$total_blog_comments;$i++)
            {
                if($blog_comments[$i]['comment_id']==0)
                {
                    $dataArray['Comment'][$i]['Id']=$blog_comments[$i]['id'];
                    $dataArray['Comment'][$i]['Message']=!empty($blog_comments[$i]['message'])?$blog_comments[$i]['message']:'';

                    if(!empty($blog_comments[$i]['user_id']))
                    $dataArray['Comment'][$i]['UserName']=!empty($blog_comments[$i]['user']['name'])?$blog_comments[$i]['user']['name']:'';
                    else
                    $dataArray['Comment'][$i]['UserName']=!empty($blog_comments[$i]['name'])?$blog_comments[$i]['name']:'';

                    $user_image='';

                    if(!empty($blog_comments[$i]['user']['user_image']))
                    {
                        $user_image_path=public_path().'/images/user/'.$blog_comments[$i]['user']['user_image'];
                
                        if(file_exists($user_image_path))
                        $user_image=URL::to('/images/user').'/'.$blog_comments[$i]['user']['user_image'];
                    }

                    $dataArray['Comment'][$i]['UserImage']=$user_image;

                    $media_image='';

                    if(!empty($blog_comments[$i]['media']))
                    {
                        $media_path=public_path().'/images/blogs/blog_comment_media/'.$blog_comments[$i]['media'];
                
                        if(file_exists($media_path))
                        $media_image=URL::to('/images/blogs/blog_comment_media').'/'.$blog_comments[$i]['media'];

                    }
                    $dataArray['Comment'][$i]['Date']=!empty($blog_comments[$i]['created_at'])?date('d-m-Y',strtotime($blog_comments[$i]['created_at'])):'';
                    $dataArray['Comment'][$i]['Time']=!empty($blog_comments[$i]['created_at'])?date('H:i:s',strtotime($blog_comments[$i]['created_at'])):'';
                    $dataArray['Comment'][$i]['Media']=$media_image;

                    $total_likes=BlogsCommentReplyLikesModel::where('is_like',1)->where('blog_id',$input['BlogId'])
                    ->where('comment_or_reply_id',$blog_comments[$i]['id'])->where('is_deleted',0)->count();

                    $no_of_likes=0;
                    if($total_likes!=0)
                    {
                        $no_of_likes=$total_likes;
                    }

                    $dataArray['Comment'][$i]['LikeCount']=strval($no_of_likes);
                    
                    $userCommentId=0;
                    if(isset($input['RegisterId']) && !empty($input['RegisterId']))
                    {
                        $userCommentId=$input['RegisterId'];
                    }

                    $user_like_obj=BlogsCommentReplyLikesModel::where('blog_id',$input['BlogId'])
                            ->where('comment_or_reply_id',$blog_comments[$i]['id'])
                            ->where('is_deleted',0)->where('user_id',$userCommentId)->select('is_like')->first();
                            
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

                    //$dataArray['Comment'][$i]['LikeCount']=!empty($blog_comments[$i]['media'])?$blog_comments[$i]['media']:'';
                    //$dataArray['Comment'][$i]['IsLike']=!empty($blog_comments[$i]['media'])?$blog_comments[$i]['media']:'';
                    
                    $replyData=BlogsCommentReplyModel::with(['user'])->where('comment_id',$blog_comments[$i]['id'])
                    ->where('comment_id','!=',0)->where('is_deleted',0)->get()->toArray();
                    
                    $totalReplyData=count($replyData);
                    
                    if($totalReplyData > 0)
                    {
                        for($j=0;$j<$totalReplyData;$j++)
                        {
                            $dataArray['Comment'][$i]['Reply'][$j]['Id']=strval($replyData[$j]['id']);
                            $dataArray['Comment'][$i]['Reply'][$j]['Message']=$replyData[$j]['message'];
                            
                            if(!empty($replyData[$j]['user_id']))
                            $dataArray['Comment'][$i]['Reply'][$j]['UserName']=!empty($replyData[$j]['user']['name'])?$replyData[$j]['user']['name']:'';
                            else
                            $dataArray['Comment'][$i]['Reply'][$j]['UserName']=!empty($replyData[$j]['name'])?$replyData[$j]['name']:'';

                            $user_image='';

                            if(!empty($replyData[$j]['user']['user_image']))
                            {
                                $user_image_path=public_path().'/images/user/'.$replyData[$j]['user']['user_image'];
                
                                if(file_exists($user_image_path))
                                $user_image=URL::to('/images/user').'/'.$replyData[$j]['user']['user_image'];
                            }

                            $dataArray['Comment'][$i]['Reply'][$j]['UserImage']=$user_image;
                            $dataArray['Comment'][$i]['Reply'][$j]['Date']=date('d-m-Y',strtotime($replyData[$j]['created_at']));
                            $dataArray['Comment'][$i]['Reply'][$j]['Time']=date('H:i:s',strtotime($replyData[$j]['created_at']));
                            $dataArray['Comment'][$i]['Reply'][$j]['Media']=!empty($replyData[$j]['media'])?URL::to('/images/blogs/blog_reply_media').'/'.$replyData[$j]['media']:'';
                            
                            $total_likes_reply=BlogsCommentReplyLikesModel::where('is_like',1)->where('blog_id',$input['BlogId'])
                            ->where('comment_or_reply_id',$replyData[$j]['id'])->where('is_deleted',0)
                            ->count();

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

                            $user_like_obj=BlogsCommentReplyLikesModel::where('blog_id',$input['BlogId'])->where('is_deleted',0)
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
            $dataArray['TotalComments']=strval(0);
            $dataArray['Comment']=array();
        }
        
        return response()->json(["Status"=>true,"StatusMessage"=>"Get Blog detail successfully!"
        ,"Result"=>$dataArray]);
    }
}