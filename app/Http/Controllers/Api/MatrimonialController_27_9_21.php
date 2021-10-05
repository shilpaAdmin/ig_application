<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\MatrimonialModel;
use App\Http\Model\MatrimonialEducationModel;
use App\Http\Model\MatrimonialMediaModel;
use App\Http\Model\CountrysModel;

use App\User;

use URL;
use Illuminate\Http\Request;

class MatrimonialController extends Controller
{
    public function AddUpdateMatrimonial(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $status=$statusmessage='';

        if(isset($input['Id']))
        {
            $matrimonial_obj=MatrimonialModel::find($input['Id']);

            if(isset($input['RegisterId']))
            $matrimonial_obj->user_id=$input['RegisterId'];
            
            if(isset($input['FullName']))
            $matrimonial_obj->full_name=$input['FullName'];

            if(isset($input['Address']))
            $matrimonial_obj->address=$input['Address'];

            if(isset($input['About']))
            $matrimonial_obj->about=$input['About'];

            if(isset($input['Age']))
            $matrimonial_obj->age=$input['Age'];

            if(isset($input['Height']))
            $matrimonial_obj->height=$input['Height'];

            if(isset($input['Caste']))
            $matrimonial_obj->caste=$input['Caste'];

            if(isset($input['SubCaste']))
            $matrimonial_obj->subcaste=$input['SubCaste'];

            if(isset($input['Married']))
            $matrimonial_obj->married=$input['Married'];

            if(isset($input['Designation']))
            $matrimonial_obj->designation=$input['Designation'];

            if(isset($input['Other']))
            $matrimonial_obj->other=$input['Other'];

            if(isset($input['AnnualIncome']))
            $matrimonial_obj->annual_income=$input['AnnualIncome'];

            if(isset($input['Country']))
            $matrimonial_obj->country_id=$this->checkCountry($input['Country']);

            if(isset($input['LookingforAge']))
            $matrimonial_obj->desired_age=$input['LookingforAge'];

            if(isset($input['LookingforHeight']))
            $matrimonial_obj->desired_height=$input['LookingforHeight'];

            if(isset($input['LookingforMaritalStatus']))
            $matrimonial_obj->desired_marital_status=$input['LookingforMaritalStatus'];

            if(isset($input['LookingforReligion']))
            $matrimonial_obj->desired_religion=$input['LookingforReligion'];

            if(isset($input['LookingforMotherTongue']))
            $matrimonial_obj->desired_mother_tongue=$input['LookingforMotherTongue'];

            if(isset($input['LookingforCountry']))
            $matrimonial_obj->desired_country_id=$this->checkCountry($input['LookingforCountry']);

            if(isset($input['LookingforAnnualIncome']))
            $matrimonial_obj->desired_annual_income=$input['LookingforAnnualIncome'];

            if(isset($input['Private']))
            $matrimonial_obj->private=$input['Private'];

            $matrimonial_obj->save();

            if($matrimonial_obj->id)
            {
                $status=true;
                $statusmessage='Matrimonial data updated successfully !';
            }
            else
            {
                $status=false;
                $statusmessage='Matrimonial data not updated !';
            }
        }
        else
        {
            //$matrimonial_obj=new MatrimonialModel;
            $insertArray=array();
            $matrimonial_obj=new MatrimonialModel;

            if(isset($input['RegisterId']))
            $matrimonial_obj->user_id=$input['RegisterId'];
            //$insertArray[]=array('user_id'=>$input['RegisterId']);

            if(isset($input['FullName']))
            $matrimonial_obj->full_name=$input['FullName'];

            if(isset($input['City']))
            $matrimonial_obj->city=$input['City'];

            if(isset($input['Address']))
            $matrimonial_obj->address=$input['Address'];

            if(isset($input['About']))
            $matrimonial_obj->about=$input['About'];

            if(isset($input['Age']))
            $matrimonial_obj->age=$input['Age'];

            if(isset($input['Height']))
            $matrimonial_obj->height=$input['Height'];

            if(isset($input['Caste']))
            $matrimonial_obj->caste=$input['Caste'];

            if(isset($input['SubCaste']))
            $matrimonial_obj->subcaste=$input['SubCaste'];

            if(isset($input['Married']))
            $matrimonial_obj->married=$input['Married'];

            if(isset($input['Designation']))
            $matrimonial_obj->designation=$input['Designation'];

            if(isset($input['Other']))
            $matrimonial_obj->other=$input['Other'];

            if(isset($input['AnnualIncome']))
            $matrimonial_obj->annual_income=$input['AnnualIncome'];

            $matrimonial_obj->country_id=$this->checkCountry($input['Country']);

            //$matrimonial_obj->countryid=$input['Country'];
            if(isset($input['LookingforAge']))
            $matrimonial_obj->desired_age=$input['LookingforAge'];

            if(isset($input['LookingforHeight']))
            $matrimonial_obj->desired_height=$input['LookingforHeight'];

            if(isset($input['LookingforMaritalStatus']))
            $matrimonial_obj->desired_marital_status=$input['LookingforMaritalStatus'];

            if(isset($input['LookingforReligion']))
            $matrimonial_obj->desired_religion=$input['LookingforReligion'];

            if(isset($input['LookingforMotherTongue']))
            $matrimonial_obj->desired_mother_tongue=$input['LookingforMotherTongue'];

            if(isset($input['LookingforCountry']))
            $matrimonial_obj->desired_country_id=$this->checkCountry($input['LookingforCountry']);

            if(isset($input['LookingforAnnualIncome']))
            $matrimonial_obj->desired_annual_income=$input['LookingforAnnualIncome'];

            if(isset($input['Private']))
            $matrimonial_obj->private=$input['Private'];

            $matrimonial_obj->save();

            $matrimonial_id=$matrimonial_obj->id;

            if($matrimonial_obj->id)
            {
                $status=true;
                $statusmessage='Matrimonial data added successfully !';
            }
            else
            {
                $status=false;
                $statusmessage='Matrimonial data not added !';
            }
        }
        
        if(isset($input['TotalMedia']))
        {
            $totalMedia=$input['TotalMedia'];

            $mediaArray=array();

            for($i=0;$i<$totalMedia;$i++)
            {
                $imagename='';

                if($mediaData = $request->file('Media'.($i+1)))
                {
                    $destinationPath=public_path().'/images/matrimonial/media/';
                    $imageName = md5(time() . '_' . $mediaData->getClientOriginalName()) . '.' . $mediaData->getClientOriginalExtension();
                    
                    if($mediaData->move($destinationPath, $imageName))
                    {
                        array_push($mediaArray,
                        ['matrimonial_id'=>$matrimonial_id,
                        'media'=>$imageName]);
                    }
                }
            }
            MatrimonialMediaModel::insert($mediaArray);
        }

        if(isset($input['TotalEducation']))
        {
            $totalEducation=$input['TotalEducation'];
            
            $educationArray=array();

            for($i=0;$i<$totalEducation;$i++)
            {
                array_push($educationArray,
                ['matrimonial_id'=>$matrimonial_id,
                'title'=>$input['Education'.($i+1).'Title'],
                'description'=>$input['Education'.($i+1).'Description']]);
            }
            MatrimonialEducationModel::insert($educationArray);
        }

        if(isset($matrimonial_obj->id))
        {
            return response()->json(['Status'=>$status,'StatusMessage'=>$statusmessage,'Result'=>[]]);
        }
        else
        {
            return response()->json(['Status'=>$status,'StatusMessage'=>$statusmessage,'Result'=>[]]);
        }
    }

    public function getMatrimonialList(Request $request)
    {
        $input=$request->all();

        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;
        // print_r($matrimonial_obj);
        // exit;

        $userId=isset($input['RegisterId'])?$input['RegisterId']:'';

        $matrimonial_obj='';

       /* if(empty($userId))
        $Matrimonial_prequery=MatrimonialModel::leftjoin('matrimonial_media','matrimonial.id','=','matrimonial_media.matrimonial_media.matrimonial_id')->get();
        else
        $Matrimonial_prequery=MatrimonialModel::leftjoin('matrimonial_media','matrimonial.id','=','matrimonial_media.matrimonial_id')->where('user_id',$userId)
        ->select('matrimonial.*','matrimonial_media.media as media')->get();*/

        if($Pagination!=0)
        {
            $matrimonial_obj=$Matrimonial_prequery->skip($skip)->take(30)->toArray();
        }
        else
        {
            $matrimonial_obj=$Matrimonial_prequery->toArray();
        }
        
        $matrimonial_count=count($matrimonial_obj);

        $matrimonialArray=array();
        if($matrimonial_count > 0)
        {
            for($i=0;$i<$matrimonial_count;$i++)
            {
                $matrimonialArray[$i]['Id']=strval($matrimonial_obj[$i]['id']);
                $matrimonialArray[$i]['FullName']=!empty($matrimonial_obj[$i]['full_name'])?$matrimonial_obj[$i]['full_name']:'';
                $matrimonialArray[$i]['City']=!empty($matrimonial_obj[$i]['city'])?$matrimonial_obj[$i]['city']:'';
                $matrimonialArray[$i]['Age']=!empty($matrimonial_obj[$i]['age'])?strval($matrimonial_obj[$i]['age']):'';
                $matrimonialArray[$i]['Height']=!empty($matrimonial_obj[$i]['height'])?strval($matrimonial_obj[$i]['height']):'';
                $matrimonialArray[$i]['Caste']=!empty($matrimonial_obj[$i]['caste'])?$matrimonial_obj[$i]['caste']:'';
                $matrimonialArray[$i]['Designation']=!empty($matrimonial_obj[$i]['designation'])?$matrimonial_obj[$i]['designation']:'';
                
                $matrimonialArray[$i]['Media1']=!empty($matrimonial_obj[$i]['media'])?URL::to('/images/matrimonial/media').'/'.$matrimonial_obj[$i]['media']:'';
                //$matrimonialArray[$i]['Media1']=!empty($matrimonial_obj[$i]['media'])?URL::to('/images/matrimonial/media').'/'.$matrimonial_obj[$i]['media']:'';
            }
            return response()->json(['Status'=>true,'StatusMessage'=>'Get Matrimonial List successfully !','Result'=>[$matrimonialArray]]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'No Data available !','Result'=>[]]);
        }

    }

    protected function checkCountry($countryName)
    {
        $countryObj=CountrysModel::where('name','like',$countryName)->select('id')->first();
                
        //echo $countryObj->id;

        if(isset($countryObj->id))
        return $countryObj->id;
        else
        return 0;
    }
}