<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use HasApiTokens;

use App\User;
use App\Http\Model\NewsModel;

//advertisement
use App\Http\Model\AdvertisementModel;
use App\Http\Model\CategoryModel;

//business
use App\Http\Model\BusinessFavouriteModel;
use App\Http\Model\BusinessUserEnquiryModel;
use App\Http\Model\BusinessModel;

//forums
use App\Http\Model\ForumModel;
use App\Http\Model\ForumCommentReplyModel;
//blogs
use App\Http\Model\BlogsModel;

//faqs
use App\Http\Model\FAQModel;
use App\Http\Model\TagFAQMasterModel;

//testimonials
use App\Http\Model\TestimonialModel;

//tagmaster
use App\Http\Model\TagMasterModel;

use App\Http\Model\NotificationsModel;

use Hash;
use URL;

class DashboardController extends Controller
{
    public function getAllDashboardData(Request $request)
    {
        $input=$request->all();

        $testimonialData=TestimonialModel::skip(0)->take(10)->orderBy('id','DESC')->get()->toArray();
        $testimonial_counts=count($testimonialData);
        //print_r($testimonials);

        $tagmasterData=TagMasterModel::orderBy('id','DESC')->get()->toArray();
       // print_r($tagmasters);

        $faqsData=FAQModel::skip(0)->take(10)->orderBy('id','DESC')->get()->toArray();
        //print_r($faqs);
        $tagFAQData=TagFAQMasterModel::orderBy('id','DESC')->get()->toArray();

        $blogsData=BlogsModel::with(['user'])->skip(0)->take(10)->orderBy('id','DESC')->get();
        //print_r($blogs);

        $forumsData=ForumModel::with(['user'])->skip(0)->take(10)->orderBy('id','DESC')->get()->toArray();
        //print_r($forums);

        $advertisementsData=AdvertisementModel::skip(0)->take(10)->orderBy('id','DESC')->get()->toArray();
        $advertisements_counts=count($advertisementsData);
        //print_r($advertisements);
        
        // $categoryArray=['Housing Immobilion','Taxation','Travel & Transport','Jobs','Education & Training'
        // ,'Movie Corner','Events'];

        $categoryData=CategoryModel::where('parent_category_id',0)
        //->whereIn('name',$categoryArray)->get()->toArray();
        ->where('redirect_status',0)->get()->toArray();

        $totalCategoryData=count($categoryData);
        
        if(isset($input['RegisterId']))
        {
            $counts=NotificationsModel::where('user_id',$input['RegisterId'])->count();
            $notifications_counts=strval($counts);
        }
        else
        {
            $notifications_counts='0';
        }

        $happyUserCount=User::where('status','active')->count();

        //Testimonial Data
        $testimonialArray=[];

        if($testimonial_counts > 0)
        {
            for($i=0;$i<$testimonial_counts;$i++)
            {
                $testimonialArray[$i]['Id']=strval($testimonialData[$i]['id']);
                $testimonialArray[$i]['UserName']=!empty($testimonialData[$i]['name'])?$testimonialData[$i]['name']:'';

                $user_image_path=public_path().'/images/testimonials/user/'.$testimonialData[$i]['image'];

                $user_image='';
                
                if(isset($testimonialData[$i]['image']) && !empty($testimonialData[$i]['image']))
                {
                    if(file_exists($user_image_path))
                    $user_image=URL::to('/images/testimonials/user').'/'.$testimonialData[$i]['image'];
                }

                $testimonialArray[$i]['UserImage']=$user_image;
                $testimonialArray[$i]['Designation']=!empty($testimonialData[$i]['designation'])?$testimonialData[$i]['designation']:'';
                $testimonialArray[$i]['Description']=!empty($testimonialData[$i]['description'])?$testimonialData[$i]['description']:'';
                
                $media='';
                $media_path=public_path().'/images/testimonials/media/'.$testimonialData[$i]['media'];
                
                if(isset($testimonialData[$i]['media']) && !empty($testimonialData[$i]['media']))
                {
                    if(file_exists($media_path))
                    $media=URL::to('/images/testimonials/media').'/'.$testimonialData[$i]['media'];
                }

                $testimonialArray[$i]['Media']=$media;
                $testimonialArray[$i]['Date']=date('d-m-Y',strtotime($testimonialData[$i]['created_at']));
                $testimonialArray[$i]['Time']=date('H:i:s',strtotime($testimonialData[$i]['created_at']));
                
            }
        }

        $advertisementArray=[];
        // advertisement
        if($advertisements_counts > 0)
        {
            for($i=0;$i<$advertisements_counts;$i++)
            {
                $advertisementArray[$i]['Id']=strval($advertisementsData[$i]['id']);
                $advertisementArray[$i]['Name']=$advertisementsData[$i]['name'];

                $image='';
                if(!empty($advertisementsData[$i]['media']))
                {
                    $image_path=public_path().'/images/advertisement/'.$advertisementsData[$i]['media'];
                    if(file_exists($image_path))
                    {
                        $image=URL::to('/images/advertisement').'/'.$advertisementsData[$i]['media'];
                    }
                }

                $advertisementArray[$i]['Image']=$image;
                $advertisementArray[$i]['Link']=!empty($advertisementsData[$i]['url'])?$advertisementsData[$i]['url']:'';
                $advertisementArray[$i]['Type']=!empty($advertisementsData[$i]['type'])?$advertisementsData[$i]['type']:'';
            }
        }

        $totalblogs=count($blogsData);

        $blogsArray=array();
        $i=0;    

        if($totalblogs > 0)
        {
            foreach($blogsData as $blogs)
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
        }
        else
        {
            $blogsArray['List']=array();
        }

        $totalfaqs=count($faqsData);
        $totalfaqtags=count($tagFAQData);
        $faqsArray=[];

        if($totalfaqs > 0)
        {
            for($i=0;$i<$totalfaqs;$i++)
            {
                $faqsArray['List'][$i]['Id']=$faqsData[$i]['id'];
                $faqsArray['List'][$i]['Tags']=$faqsData[$i]['tags'];
                $faqsArray['List'][$i]['Question']=$faqsData[$i]['question'];
                $faqsArray['List'][$i]['Answer']=$faqsData[$i]['answer'];
                $faqsArray['List'][$i]['Date']=date('d-m-Y',strtotime($faqsData[$i]['created_at']));
                $faqsArray['List'][$i]['Time']=date('H:i:s',strtotime($faqsData[$i]['created_at']));
            }
        }
        else
        {
            $faqsArray['List']=array();
        }

        if($totalfaqtags > 0)
        {
            for($j=0;$j<$totalfaqtags;$j++)
            {
                $faqsArray['Tags'][$j]['Id']=$tagFAQData[$j]['id'];
                $faqsArray['Tags'][$j]['Name']=$tagFAQData[$j]['name'];
            }
        }
        else
        {
            $faqsArray['Tags']=array();
        }

        $totalforums=count($forumsData);
        $forumArray=[];

        if($totalforums > 0)
        {
            $forumArray['TotalCount']=strval($totalforums);
            for($i=0;$i<$totalforums;$i++)
            {
                $forumArray['List'][$i]['Id']=strval($forumsData[$i]['id']);
                $forumArray['List'][$i]['Question']=!empty($forumsData[$i]['question'])?$forumsData[$i]['question']:'';

                $username='';
                $userimage='';

                if(isset($forumsData[$i]['user']['name']) && !empty($forumsData[$i]['user']['name']))
                {
                    $username=$forumsData[$i]['user']['name'];
                }

                if(isset($forumsData[$i]['user']['user_image']) && !empty($forumsData[$i]['user']['user_image']))
                {
                    $userimage=URL::to('/images/user').'/'.$forumsData[$i]['user']['user_image'];
                }

                $forumArray['List'][$i]['ByUser']=$username;

                $forumArray['List'][$i]['ByUserImage']=$userimage;

                $forum_id=$forumsData[$i]['id'];

                $forumComment=ForumCommentReplyModel::latest()->where('forum_id',$forum_id)
                ->where('comment_id',0)->where('is_deleted',0)->get()->toArray();

                $forumArray['List'][$i]['TotalComments']=strval(count($forumComment));

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
                        $forumArray['List'][$i]['CommentImage'.($m+1)]=URL::to('/images/user').'/'.$userCommentImages[$m]['user_image'];
                        else
                        $forumArray['List'][$i]['CommentImage'.($m+1)]='';
                    }

                    if(!empty($userIdArray) && count($userIdArray)==2 && $userIdArray[0]==$userIdArray[1])
                    {
                        $forumArray['List'][$i]['CommentImage2']=$forumArray['List'][$i]['CommentImage1'];
                    }
                }
                else
                {
                    $forumArray['List'][$i]['CommentImage1']='';
                    $forumArray['List'][$i]['CommentImage2']='';
                }

                $forumArray['List'][$i]['TelegramLink']=!empty($forumsData[$i]['telegram_link'])?$forumsData[$i]['telegram_link']:'';
                $forumArray['List'][$i]['Date']=isset($forumsData[$i]['created_at'])?date('d-m-Y',strtotime($forumsData[$i]['created_at'])):'';
                $forumArray['List'][$i]['Time']=isset($forumsData[$i]['created_at'])?date('H:i:s',strtotime($forumsData[$i]['created_at'])):'';
            }
        }
        else
        {                    
            $forumArray['TotalCount']="0";
            $forumArray['List'] = array();
        }

        $totalTags=count($tagmasterData);
        $tagArray=[];

        if($totalTags > 0)
        {
            for($i=0;$i<$totalTags;$i++)
            {
                $tagArray[$i]['Id']=$tagmasterData[$i]['id'];
                $tagArray[$i]['Name']=$tagmasterData[$i]['name'];
            }
        }

        $fetchAllTag = TagMasterModel::where('status','active')->get()->toArray();
        
        $j = 0;
        $locationData = array();
        $tagIdArray = array();
        
        if(count($fetchAllTag) > 0)
        {
            $t = 0;
            foreach($fetchAllTag as $tagData)
            {
                $dataArray['ApprovedFeaturesOrTags'][$t]['id'] = $tagData['id'];
                $dataArray['ApprovedFeaturesOrTags'][$t]['name'] = $tagData['name'];
                $t++;
            }
        }
        else
        {
            $dataArray['ApprovedFeaturesOrTags'] = array();
        }

        $totalBusiness=0;

        if($totalCategoryData > 0)
        {
            foreach($categoryData as $catData)
            {
                $categoryId= $catData['id'];
                
                $listBusiness = BusinessModel::where('business.status','active')
                ->leftJoin('tag_master', function ($join) {
                    $join->on('tag_master.id', '=', 'business.tag_id');
                })
                ->leftJoin('category', function ($join) {
                    $join->on('category.id', '=', 'business.category_id');
                })->select('business.*','category.name as category_name')
                ->where('business.category_id',$categoryId)
                ->skip(0)->take(3)
                ->orderBy('business.id','DESC')
                ->get()->toArray();

                $total_records=count($listBusiness);

                $totalBusiness+=$total_records;

                if($total_records > 0)
                {
                    foreach($listBusiness as $businessData)
                    {
                        $finalTagData = '';
                        if(isset($businessData['tag_id']) && !empty($businessData['tag_id']))
                        {
                            if(strpos($businessData['tag_id'], ',') !== false )
                            {
                                $arr = explode(',',  $businessData['tag_id']);
                                $tagData = TagMasterModel::whereIn('id',$arr)->get()->toArray();
                            }
                            else
                            {
                                $tagData = TagMasterModel::where('id',$businessData['tag_id'])->get()->toArray();
                            }
                            $tagNameArray = array();
                            if(count($tagData) > 0)
                            {
                                foreach($tagData as $data)
                                {
                                    array_push($tagNameArray, $data['name']);
                                }
                            }
                            
                            if(count($tagNameArray) > 0)
                            {
                                $finalTagData = implode(',',$tagNameArray);
                            }
                        }
                        $finalCategoryData = '';
                        if(isset($businessData['multiple_subcategory_id']) && !empty($businessData['multiple_subcategory_id']))
                        {
                            if(strpos($businessData['multiple_subcategory_id'], ',') !== false )
                            {
                                $arr = explode(',',  $businessData['multiple_subcategory_id']);
                                $categoryData = CategoryModel::whereIn('id',$arr)->get()->toArray();
                            }
                            else
                            {
                                $categoryData = CategoryModel::where('id',$businessData['tag_id'])->get()->toArray();
                            }
                            $categoryNameArray = array();
                            if(count($categoryData) > 0)
                            {
                                foreach($categoryData as $data)
                                {
                                    array_push($categoryNameArray, $data['name']);
                                }
                            }
                            
                            if(count($categoryNameArray) > 0)
                            {
                                $finalCategoryData = implode(',',$categoryNameArray);
                            }
                        }

                        $businessFavourite = BusinessFavouriteModel::where('business_id',$businessData['id'])->where('user_id',$businessData['user_id'])->get()->toArray();
                        if(count($businessFavourite) > 0)
                        {
                            $isFavourite = 'Yes';
                        }
                        else
                        {
                            $isFavourite = 'No';
                        }
                        $mediaFileArray = $hoursArray = array();
                        
                        if(isset($businessData['hours_json']) && !empty($businessData['hours_json']))
                            $hoursArray = json_decode($businessData['hours_json'], true);
                        
                        if(isset($businessData['media_file_json']) && !empty($businessData['media_file_json']))
                            $mediaFileArray = json_decode($businessData['media_file_json'], true);
                        
                        $urlArray['URL'] = array();
                        if(count($mediaFileArray) > 0)
                        {
                            $m = 1;
                            foreach($mediaFileArray as $mediaData)
                            {
                                $urlArray['URL'][] = !empty($mediaData['Media'.$m]) ? URL::to('/images/business').'/'.$mediaData['Media'.$m] : '';
                                $m++;
                            }
                        }
                        $dataArray['List'][$j]['Id'] = (string)$businessData['id'];
                        $dataArray['List'][$j]['Name'] = $businessData['name'];
                        $dataArray['List'][$j]['FeatureorTag'] = $finalTagData;
                        $dataArray['List'][$j]['isFavourite'] = $isFavourite;
                        $dataArray['List'][$j]['Address'] = !empty($businessData['address']) ? $businessData['address'] : '';
                        $dataArray['List'][$j]['Date'] = date('d-m-Y', strtotime($businessData['created_at']));
                        $dataArray['List'][$j]['Time'] = date('H:i:s', strtotime($businessData['created_at']));
                        $dataArray['List'][$j]['ActuralPrice'] = !empty($businessData['actual_price']) ? (string)$businessData['actual_price'] : '';
                        $dataArray['List'][$j]['SellingPrice'] = !empty($businessData['selling_price']) ? (string)$businessData['selling_price'] : '';
                        $dataArray['List'][$j]['About'] = !empty($businessData['about']) ? (string)$businessData['about'] : '';
                        $dataArray['List'][$j]['ContactPersonName'] = !empty($businessData['contact_person_name']) ? $businessData['contact_person_name'] : '';
                        $dataArray['List'][$j]['MobileNumber'] =!empty($businessData['mobile_number']) ? (string)$businessData['mobile_number'] : '';
                        $dataArray['List'][$j]['UnitOption'] = !empty($businessData['unit_option']) ? (string)$businessData['unit_option'] : '';
                        $dataArray['List'][$j]['CategoryName'] = !empty($businessData['category_name']) ? $businessData['category_name'] : '';
                        $dataArray['List'][$j]['SubCategoryName'] = $finalCategoryData;
                        $dataArray['List'][$j]['DisplayHours'] = !empty($businessData['display_hours']) ? $businessData['display_hours'] : '';
                        $dataArray['List'][$j]['Hours'] = $hoursArray;
                        $dataArray['List'][$j]['Media'] = $urlArray;
                        $j++;
                    }
                }
                else
                {
                    $dataArray['List']=array();
                }
            }
        }
        else
        {
            $dataArray['List']=array();
        }   

        $newsData=NewsModel::first();
        $registerId=isset($input['RegisterId'])?$input['RegisterId']:'';

        $matrimonial_id='';

        if(!empty($registerId))
        $matrimonialObj=User::where('id',$registerId)->select('matrimonial_id')->first();

        return response()->json(['Status'=>true,'StatusMessage'=>'get Dashboard data successfully!',
        'Result'=>
        array(
        'NotificationCount'=>$notifications_counts,
        'NewsFrom'=>$newsData->news_from,
        'NewsDescription'=>$newsData->news_description,
        'MatrimonialId'=>!empty($matrimonialObj->matrimonial_id)?strval($matrimonialObj->matrimonial_id):'',
        'HappyUserCount'=>strval($happyUserCount),
        'Testimonial'=>$testimonialArray,
        'Advertisement'=>$advertisementArray,
        'Blogs'=>array($blogsArray),
        'Faqs'=>$faqsArray,
        'Forums'=>array($forumArray),
        'Tags'=>$tagArray,
        'Listing'=>$dataArray)
        ]);
    }

    public function searchGlobal(Request $request)
    {
        $input=$request->all();

        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;

        $IsFavourite = isset($request->IsFavourite) ? $request->IsFavourite : '';
        $userId = isset($request->RegisterId) ? $request->RegisterId : '';
        $SearchName = isset($request->SearchName) ? $request->SearchName : '';
        
//        if(!isset($userId) || empty($userId))
//        {
//            $error[] = 'RegisterId Must be Required!';
//        }
        
//        if(!empty($error))
//        {
//            return response()->json(['Status'=>False,'StatusMessage'=>$error,'Result'=>array()]);
//        }

        $totalCount = BusinessModel::where('status','active')->count();
        
        $preQuery = BusinessModel::where('business.status','active')
        ->leftJoin('tag_master', function ($join) {
            $join->on('tag_master.id', '=', 'business.tag_id');
        })
        ->leftJoin('category', function ($join) {
            $join->on('category.id', '=', 'business.category_id');
        })
        ->where(function($query) use ($request)
        {
            $CatagoryId = isset($request->CatagoryId) ? $request->CatagoryId : '';
            $SubcatagoryId = isset($request->SubcatagoryId) ? $request->SubcatagoryId : '';
            $PriceMax = isset($request->PriceMax) ? $request->PriceMax : '';
            $PriceMin = isset($request->PriceMin) ? $request->PriceMin : '';
            $FeatureOrTag = isset($request->FeatureOrTag) ? $request->FeatureOrTag : '';
            $SearchName = isset($request->SearchName) ? $request->SearchName : '';
            
            if(isset($PriceMax) && !empty($PriceMax) && isset($PriceMin) && !empty($PriceMin))
            {
                $query->whereBetween('business.selling_price', [$PriceMin,$PriceMax]);
            }
            elseif (isset($PriceMin) && !empty($PriceMin)) 
            {
                $query->where('business.selling_price','>=', $PriceMin);
            }
            elseif (isset($PriceMax) && !empty($PriceMax)) 
            {
                $query->where('business.selling_price','<=', $PriceMax);
            }

            if(isset($PriceMax) && !empty($PriceMax) && isset($PriceMin) && !empty($PriceMin))
            {
                $query->whereBetween('business.selling_price', [$PriceMin,$PriceMax]);
            }

            
            if(isset($CatagoryId) && !empty($CatagoryId))
            {
                $query->where('business.category_id', $CatagoryId);
            }
            if(isset($SubcatagoryId) && !empty($SubcatagoryId))
            {
                if( strpos($SubcatagoryId, ',') !== false )
                {
                    $explodeSubCategory = explode(',', $SubcatagoryId);
                    for($k =0; $k < count($explodeSubCategory); $k++)
                    {
                        if($k==0)
                        {
                            $query->whereRaw("find_in_set($explodeSubCategory[$k] ,business.multiple_subcategory_id)");
                        }
                        else
                        {
                            $query->orWhereRaw("find_in_set($explodeSubCategory[$k],business.multiple_subcategory_id)");
                        }
                    }
                }
                else
                {
                    $query->whereRaw("find_in_set($SubcatagoryId ,business.multiple_subcategory_id)");
                }
            }
            if(isset($SearchName) && !empty($SearchName))
            {
                $query->where('business.name', 'like', '%'. $SearchName.'%');
            }
            
            if(isset($FeatureOrTag) && !empty($FeatureOrTag))
            {
                if( strpos($FeatureOrTag, ',') !== false )
                {
                    $explodeFeatureOrTag = explode(',', $FeatureOrTag);
                    for($k =0; $k < count($explodeFeatureOrTag); $k++)
                    {
                        if($k==0)
                        {
                            $query->where('tag_master.name', $explodeFeatureOrTag[$k]);
                        }
                        else
                        {
                            $query->orWhere('tag_master.name', $explodeFeatureOrTag[$k]);
                        }
                    }
                }
                else
                {
                    $query->where('tag_master.name', $FeatureOrTag);
                }
            }
        })->select('business.*','category.name as category_name');
        
        if(isset($IsFavourite) && !empty($IsFavourite) && (strtolower($IsFavourite) == 'yes'))
        {
            $preQuery->join('business_favourite', 'business_favourite.user_id', '=', 'business.user_id');
        }
        
        /* fetch data*/
        $listBusiness = $preQuery->orderBy('id','DESC')->skip($skip)->take(30)->get()->toArray();
        
        /* count of all data*/
        $totalFilteredCount = count($listBusiness);
        
        $fetchAllTag = TagMasterModel::where('status','active')->get()->toArray();
        $j = 0;
        $locationData = array();
        $tagIdArray = array();
        
        $dataArray['TotalCount'] = strval($totalCount);
        $dataArray['FilteredCount'] = strval($totalFilteredCount);
        
        if(count($fetchAllTag) > 0)
        {
            $t = 0;
            foreach($fetchAllTag as $tagData)
            {
                $dataArray['ApprovedFeaturesOrTags'][$t]['id'] = strval($tagData['id']);
                $dataArray['ApprovedFeaturesOrTags'][$t]['name'] = $tagData['name'];
                $t++;
            }
        }
        else
        {
            $dataArray['ApprovedFeaturesOrTags'] = array();
        }

        if(count($listBusiness) > 0)
        {
            foreach($listBusiness as $businessData)
            {
                $finalTagData = '';
                if(isset($businessData['tag_id']) && !empty($businessData['tag_id']))
                {
                    if(strpos($businessData['tag_id'], ',') !== false )
                    {
                        $arr = explode(',',  $businessData['tag_id']);
                        $tagData = TagMasterModel::whereIn('id',$arr)->get()->toArray();
                    }
                    else
                    {
                        $tagData = TagMasterModel::where('id',$businessData['tag_id'])->get()->toArray();
                    }
                    $tagNameArray = array();
                    if(count($tagData) > 0)
                    {
                        foreach($tagData as $data)
                        {
                            array_push($tagNameArray, $data['name']);
                        }
                    }
                    
                    if(count($tagNameArray) > 0)
                    {
                        $finalTagData = implode(',',$tagNameArray);
                    }
                }
                $finalCategoryData = '';
                if(isset($businessData['multiple_subcategory_id']) && !empty($businessData['multiple_subcategory_id']))
                {
                    if(strpos($businessData['multiple_subcategory_id'], ',') !== false )
                    {
                        $arr = explode(',',  $businessData['multiple_subcategory_id']);
                        $categoryData = CategoryModel::whereIn('id',$arr)->get()->toArray();
                    }
                    else
                    {
                        $categoryData = CategoryModel::where('id',$businessData['tag_id'])->get()->toArray();
                    }
                    $categoryNameArray = array();
                    if(count($categoryData) > 0)
                    {
                        foreach($categoryData as $data)
                        {
                            array_push($categoryNameArray, $data['name']);
                        }
                    }
                    
                    if(count($categoryNameArray) > 0)
                    {
                        $finalCategoryData = implode(',',$categoryNameArray);
                    }
                }
                $businessFavourite = BusinessFavouriteModel::where('business_id',$businessData['id'])->where('user_id',$userId)->get()->toArray();
                if(count($businessFavourite) > 0)
                {
                    $isFavourite = 'Yes';
                }
                else
                {
                    $isFavourite = 'No';
                }
                $mediaFileArray = $hoursArray = array();
                
                if(isset($businessData['hours_json']) && !empty($businessData['hours_json']))
                    $hoursArray = json_decode($businessData['hours_json'], true);
                
                if(isset($businessData['media_file_json']) && !empty($businessData['media_file_json']))
                    $mediaFileArray = json_decode($businessData['media_file_json'], true);
                
                $urlArray['URL'] = array();
                if(count($mediaFileArray) > 0)
                {
                    $m = 1;
                    foreach($mediaFileArray as $mediaData)
                    {
                        $urlArray['URL'][] = !empty($mediaData['Media'.$m]) ? URL::to('/images/business').'/'.$mediaData['Media'.$m] : '';
                        $m++;
                    }
                }
                $dataArray['List'][$j]['Id'] = (string)$businessData['id'];
                $dataArray['List'][$j]['Name'] = $businessData['name'];
                $dataArray['List'][$j]['FeatureorTag'] = $finalTagData;
                $dataArray['List'][$j]['isFavourite'] = $isFavourite;
                $dataArray['List'][$j]['Address'] = !empty($businessData['address']) ? $businessData['address'] : '';
                $dataArray['List'][$j]['Date'] = date('d-m-Y', strtotime($businessData['created_at']));
                $dataArray['List'][$j]['Time'] = date('H:i:s', strtotime($businessData['created_at']));
                $dataArray['List'][$j]['ActuralPrice'] = !empty($businessData['actual_price']) ? (string)$businessData['actual_price'] : '';
                $dataArray['List'][$j]['SellingPrice'] = !empty($businessData['selling_price']) ? (string)$businessData['selling_price'] : '';
                $dataArray['List'][$j]['About'] = !empty($businessData['about']) ? (string)$businessData['about'] : '';
                $dataArray['List'][$j]['ContactPersonName'] = !empty($businessData['contact_person_name']) ? $businessData['contact_person_name'] : '';
                $dataArray['List'][$j]['MobileNumber'] =!empty($businessData['mobile_number']) ? (string)$businessData['mobile_number'] : '';
                $dataArray['List'][$j]['UnitOption'] = !empty($businessData['unit_option']) ? (string)$businessData['unit_option'] : '';
                $dataArray['List'][$j]['CategoryName'] = !empty($businessData['category_name']) ? $businessData['category_name'] : '';
                $dataArray['List'][$j]['SubCategoryName'] = $finalCategoryData;
                $dataArray['List'][$j]['DisplayHours'] = !empty($businessData['display_hours']) ? $businessData['display_hours'] : '';
                $dataArray['List'][$j]['Hours'] = $hoursArray;
                $dataArray['List'][$j]['Media'] = $urlArray;
                $j++;
            }
        }
        else
        {
            $dataArray['List'] = array();
        }

        // ---------------------------------Start FORUM --------------------------------------

        if($Pagination!=0)
        {
            $fetchAllForumData=ForumModel::with('user')->where('question','like','%'.$SearchName.'%')
            ->orderBy('forum.id','DESC')->skip($skip)->take(30)->get()->toArray();
        }
        else
        {
            $fetchAllForumData=ForumModel::with('user')
            ->orderBy('forum.id','DESC')->get()->toArray();
        }

        $forumArray=array();
        $totalCount=count($fetchAllForumData);

        if($totalCount > 0)
        {
            $forumArray['TotalCount'] = strval($totalCount);

            for($i=0;$i<$totalCount;$i++)
            {
                $forumArray['List'][$i]['Id']=strval($fetchAllForumData[$i]['id']);
                $forumArray['List'][$i]['Question']=!empty($fetchAllForumData[$i]['question'])?$fetchAllForumData[$i]['question']:'';

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

                $forumArray['List'][$i]['ByUser']=$username;

                $forumArray['List'][$i]['ByUserImage']=$userimage;

                $forum_id=$fetchAllForumData[$i]['id'];

                $forumComment=ForumCommentReplyModel::where('forum_id',$forum_id)
                ->where('is_deleted',0)
                ->where('comment_id',0)->get()->toArray();

                $forumArray['List'][$i]['TotalComments']=strval(count($forumComment));

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
                        $forumArray['List'][$i]['CommentImage'.($m+1)]=URL::to('/images/user').'/'.$userCommentImages[$m]['user_image'];
                        else
                        $forumArray['List'][$i]['CommentImage'.($m+1)]='';
                    }

                    if(!empty($userIdArray) && count($userIdArray)==2 && $userIdArray[0]==$userIdArray[1])
                    {
                        $forumArray['List'][$i]['CommentImage2']=$forumArray['List'][$i]['CommentImage1'];
                    }
                }
                else
                {
                    $forumArray['List'][$i]['CommentImage1']='';
                    $forumArray['List'][$i]['CommentImage2']='';
                }

                $forumArray['List'][$i]['TelegramLink']=!empty($fetchAllForumData[$i]['telegram_link'])?$fetchAllForumData[$i]['telegram_link']:'';
                $forumArray['List'][$i]['Date']=isset($fetchAllForumData[$i]['created_at'])?date('d-m-Y',strtotime($fetchAllForumData[$i]['created_at'])):'';
                $forumArray['List'][$i]['Time']=isset($fetchAllForumData[$i]['created_at'])?date('H:i:s',strtotime($fetchAllForumData[$i]['created_at'])):'';
            }
        }
        else
        {                    
            $forumArray['TotalCount']="0";
            $forumArray['List'] = array();
        }
        //----------------------------------End FORUM -----------------------------------------

        //-----------------------------------StartFAQ-----------------------------------------
        if($Pagination!=0)
        {
            $FAQFilter=FAQModel::where('question','like','%'.$SearchName.'%')->skip($skip)->take(30)->get()->toArray();
        }
        else
        {
            $FAQFilter=FAQModel::all()->toArray();
        }

        $tagsData=TagFAQMasterModel::all()->toArray();
        $FAQArray=array();
        if(count($FAQFilter) > 0)
        {
            $faq_count=count($FAQFilter);
            $FAQArray['TotalCounts']=strval($faq_count);
            for($i=0;$i<$faq_count;$i++)
            {
                $FAQArray['List'][$i]['Id']=strval($FAQFilter[$i]['id']);
                $FAQArray['List'][$i]['Tags']=$FAQFilter[$i]['tags'];
                $FAQArray['List'][$i]['Question']=$FAQFilter[$i]['question'];
                $FAQArray['List'][$i]['Answer']=$FAQFilter[$i]['answer'];
                $FAQArray['List'][$i]['Date']=date('d-m-Y',strtotime($FAQFilter[$i]['created_at']));
                $FAQArray['List'][$i]['Time']=date('H:i:s',strtotime($FAQFilter[$i]['created_at']));
            }
        }
        else
        {
            $FAQArray['TotalCounts']=strval(0);
            $FAQArray['List']=array();
        }

        $tag_count=count($tagsData);

        if($tag_count > 0)
        {
            for($j=0;$j<$tag_count;$j++)
            {
                $FAQArray['Tags'][$j]['Id']=strval($tagsData[$j]['id']);
                $FAQArray['Tags'][$j]['Name']=$tagsData[$j]['name'];
            }
        }
        else
        {
            $FAQArray['Tags']=array();
        }
        //-----------------------------------End FAQ-----------------------------------------

        //-----------------------------------Start BLOG--------------------------------------
        
        if($Pagination!=0)
        {
            $blogsData=BlogsModel::where('name','like','%'.$SearchName.'%')
            ->skip($skip)->take(30)->get();
        }
        else
        {
            $blogsData=BlogsModel::all();
        }

        $totalBlogs=count($blogsData);
        
            $i=0; //running variable for blogData
            if($totalBlogs > 0 )
            {

                $blogsArray['TotalCounts']=strval($totalBlogs);
                foreach($blogsData as $blogs)
                {

                    $mediaArray=json_decode($blogs->media_file_json,true);
                    
                    $mediaFiles=array();
                    
                    $totalMedias=!empty($mediaArray)?count($mediaArray):0;

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
            }
            else
            {
                $blogsArray['TotalCounts']=strval(0);
                $blogsArray['List']=array();
            }
        //-----------------------------------End BLOG--------------------------------------
        
        
        if($dataArray)
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'Global Search Data Listed Successfully',
            'Result'=>array(array('Listing'=>$dataArray,'Blogs'=>$blogsArray,'FAQ'=>$FAQArray,'Forum'=>$forumArray))]);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>array()]);
        }
    }

    public function myFavouriteList(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
        }

        if(!isset($input['CategoriesId']) || empty($input['CategoriesId']))
        {
            $error[] = 'CategoriesId Must be Required!';
        }
        
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}
        
        $listBusiness = BusinessModel::where('business.status','active')
        ->leftJoin('category', function ($join) {
            $join->on('category.id', '=', 'business.category_id');
        })
        ->join('business_favourite',function($join){
            $join->on('business_favourite.business_id','=','business.id');
        })
        ->select('business.*','category.name as category_name')
        ->where('business_favourite.user_id',$input['RegisterId'])
        ->where('business.category_id',$input['CategoriesId'])
        ->groupBy('business.id')
        ->orderBy('business.id','DESC')
        ->get()->toArray();

        
        $totalBusiness = count($listBusiness);

        if($totalBusiness > 0)
        {
            $j = 0;
            foreach($listBusiness as $businessData)
            {
                $finalTagData = '';
                if(isset($businessData['tag_id']) && !empty($businessData['tag_id']))
                {
                    if(strpos($businessData['tag_id'], ',') !== false )
                    {
                        $arr = explode(',',  $businessData['tag_id']);
                        $tagData = TagMasterModel::whereIn('id',$arr)->get()->toArray();
                    }
                    else
                    {
                        $tagData = TagMasterModel::where('id',$businessData['tag_id'])->get()->toArray();
                    }
                    $tagNameArray = array();
                    if(count($tagData) > 0)
                    {
                        foreach($tagData as $data)
                        {
                            array_push($tagNameArray, $data['name']);
                        }
                    }
                    
                    if(count($tagNameArray) > 0)
                    {
                        $finalTagData = implode(',',$tagNameArray);
                    }
                }
                $finalCategoryData = '';
                if(isset($businessData['multiple_subcategory_id']) && !empty($businessData['multiple_subcategory_id']))
                {
                    if(strpos($businessData['multiple_subcategory_id'], ',') !== false )
                    {
                        $arr = explode(',',  $businessData['multiple_subcategory_id']);
                        $categoryData = CategoryModel::whereIn('id',$arr)->get()->toArray();
                    }
                    else
                    {
                        $categoryData = CategoryModel::where('id',$businessData['tag_id'])->get()->toArray();
                    }
                    $categoryNameArray = array();
                    if(count($categoryData) > 0)
                    {
                        foreach($categoryData as $data)
                        {
                            array_push($categoryNameArray, $data['name']);
                        }
                    }
                    
                    if(count($categoryNameArray) > 0)
                    {
                        $finalCategoryData = implode(',',$categoryNameArray);
                    }
                }

                $businessFavourite = BusinessFavouriteModel::where('business_id',$businessData['id'])->where('user_id',$input['RegisterId'])->get()->toArray();
                if(count($businessFavourite) > 0)
                {
                    $isFavourite = 'Yes';
                }
                else
                {
                    $isFavourite = 'No';
                }
                $mediaFileArray = $hoursArray = array();
                
                if(isset($businessData['hours_json']) && !empty($businessData['hours_json']))
                    $hoursArray = json_decode($businessData['hours_json'], true);
                
                if(isset($businessData['media_file_json']) && !empty($businessData['media_file_json']))
                    $mediaFileArray = json_decode($businessData['media_file_json'], true);
                
                $urlArray['URL'] = array();
                if(count($mediaFileArray) > 0)
                {
                    $m = 1;
                    foreach($mediaFileArray as $mediaData)
                    {
                        $urlArray['URL'][] = !empty($mediaData['Media'.$m]) ? URL::to('/images/business').'/'.$mediaData['Media'.$m] : '';
                        $m++;
                    }
                }
                $dataArray['List'][$j]['Id'] = (string)$businessData['id'];
                $dataArray['List'][$j]['Name'] = $businessData['name'];
                $dataArray['List'][$j]['FeatureorTag'] = $finalTagData;
                $dataArray['List'][$j]['isFavourite'] = $isFavourite;
                $dataArray['List'][$j]['Address'] = !empty($businessData['address']) ? $businessData['address'] : '';
                $dataArray['List'][$j]['Date'] = date('d-m-Y', strtotime($businessData['created_at']));
                $dataArray['List'][$j]['Time'] = date('H:i:s', strtotime($businessData['created_at']));
                $dataArray['List'][$j]['ActuralPrice'] = !empty($businessData['actual_price']) ? (string)$businessData['actual_price'] : '';
                $dataArray['List'][$j]['SellingPrice'] = !empty($businessData['selling_price']) ? (string)$businessData['selling_price'] : '';
                $dataArray['List'][$j]['About'] = !empty($businessData['about']) ? (string)$businessData['about'] : '';
                $dataArray['List'][$j]['ContactPersonName'] = !empty($businessData['contact_person_name']) ? $businessData['contact_person_name'] : '';
                $dataArray['List'][$j]['MobileNumber'] =!empty($businessData['mobile_number']) ? (string)$businessData['mobile_number'] : '';
                $dataArray['List'][$j]['UnitOption'] = !empty($businessData['unit_option']) ? (string)$businessData['unit_option'] : '';
                $dataArray['List'][$j]['CategoryName'] = !empty($businessData['category_name']) ? $businessData['category_name'] : '';
                $dataArray['List'][$j]['SubCategoryName'] = $finalCategoryData;
                $dataArray['List'][$j]['DisplayHours'] = !empty($businessData['display_hours']) ? $businessData['display_hours'] : '';
                $dataArray['List'][$j]['Hours'] = $hoursArray;
                $dataArray['List'][$j]['Media'] = $urlArray;
                $j++;
            }
        }
        else
        {
            $dataArray['List']=array();
        }

        return response()->json(['Status'=>true,'StatusMessage'=>'get MyFavourite List data successfully!',
        'Result'=>
        array(
        'Listing'=>$dataArray)
        ]);
    }
}