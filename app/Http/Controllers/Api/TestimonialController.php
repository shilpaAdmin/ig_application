<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\TestimonialModel;
use App\User;

use File;
use URL;
use Illuminate\Http\Request;

use App\Http\Traits\UserLocationDetailTrait;

class TestimonialController extends Controller
{
    use UserLocationDetailTrait;

    public function getTestimonialData(Request $request)
    {
        $input=$request->all();

        $locationId=!empty($input['LocationId'])?$input['LocationId']:'';
        $locationType=!empty($input['LocationType'])?$input['LocationType']:'';

        if(!empty($locationId) && !empty($locationType) && $locationType!='country')
        $testimonialData=TestimonialModel::where('cityid_or_countryid',$locationId)->where('type_city_or_country',$locationType)->get()->toArray();
        else
        $testimonialData=TestimonialModel::all()->toArray();

        $total_count=count($testimonialData);

        if($total_count > 0)
        {
            $testimonialArray=[];
            for($i=0;$i<$total_count;$i++)
            {
                $testimonialArray[$i]['Id']=strval($testimonialData[$i]['id']);
                $testimonialArray[$i]['UserName']=!empty($testimonialData[$i]['name'])?$testimonialData[$i]['name']:'';

                $user_image_path=public_path().'/images/testimonials/user/'.$testimonialData[$i]['image'];

                $user_image='';
                
                if(!empty($testimonialData[$i]['image']))
                {
                    if(file_exists($user_image_path))
                    $user_image=URL::to('/images/testimonials/user').'/'.$testimonialData[$i]['image'];
                }

                $testimonialArray[$i]['UserImage']=$user_image;
                $testimonialArray[$i]['Designation']=!empty($testimonialData[$i]['designation'])?$testimonialData[$i]['designation']:'';
                $testimonialArray[$i]['Description']=!empty($testimonialData[$i]['description'])?$testimonialData[$i]['description']:'';
                
                $media='';
                $media_path=public_path().'/images/testimonials/media/'.$testimonialData[$i]['media'];
                
                if(!empty($testimonialData[$i]['media']))
                {
                    if(file_exists($media_path))
                    $media=URL::to('/images/testimonials/media').'/'.$testimonialData[$i]['media'];
                }

                $testimonialArray[$i]['Media']=$media;
                $testimonialArray[$i]['Date']=date('d-m-Y',strtotime($testimonialData[$i]['created_at']));
                $testimonialArray[$i]['Time']=date('H:i:s',strtotime($testimonialData[$i]['created_at']));
            }

            return response()->json(['Status'=>True,'StatusMessage'=>'Testimonial Data Listed Successfully !','Result'=>$testimonialArray]);
        }
        else
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'No Data available !','Result'=>array()]);
        }
    }

    public function storeTestimonialData(Request $request)
    {
        $input=$request->all();
        
        /*if(!isset($input['RegisterId']) && empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}
        */
        if(!isset($input['Description']) && empty($input['Description']))
        {
            $error[] = 'Description Must be Required!';
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

        $testimonials=new TestimonialModel;
        
        $imagedestinationPath=$media_path=public_path().'/images/testimonials/user/';

        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {
            $testimonials->user_id=$input['RegisterId'];
            
            $testimonials->name=$user->name;

            if(!empty($user->user_image))
            {    
                $imgArray=explode('.',$user->user_image);
                $imageName=$imgArray[1];
                $imageName=md5(time() . '_' . $user->user_image) . '.' .$imageName;

                File::copy(public_path('/images/user/'.$user->user_image),
                public_path('/images/testimonials/user/'.$imageName));

                $testimonials->image=$imageName;
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
            
            $testimonials->cityid_or_countryid=$cityCountryId;
            $testimonials->type_city_or_country=$LocationType;

        }
        else
        {
            if(isset($input['Name']) && !empty($input['Name']))
            $testimonials->name=$input['Name'];

            if($mediaData = $request->file('UserImage'))
            {
                $imageName = md5(time() . '_' . $mediaData->getClientOriginalName()) . '.' . $mediaData->getClientOriginalExtension();
                $mediaData->move($imagedestinationPath, $imageName);

                $testimonials->image=$imageName;
            }
        }   

        if(isset($input['Description']) && !empty($input['Description']))
        $testimonials->description=$input['Description'];
        
        if(isset($input['Designation']) && !empty($input['Designation']))
        $testimonials->designation=$input['Designation'];

        $mediadestinationPath=$media_path=public_path().'/images/testimonials/media/';
        
        if($mediaData = $request->file('Media'))
        {
            $imageName = md5(time() . '_' . $mediaData->getClientOriginalName()) . '.' . $mediaData->getClientOriginalExtension();
            $mediaData->move($mediadestinationPath, $imageName);

            $testimonials->media=$imageName;
        }

        if($testimonials->save())
        {
            return response()->json(['Status'=>true,'StatusMessage'=>'Testimonial data saved successfully !','Result'=>array()]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Testimonial data not saved !','Result'=>array()]);
        }
    }
}