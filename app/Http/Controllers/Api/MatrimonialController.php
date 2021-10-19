<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\MatrimonialModel;
use App\Http\Model\MatrimonialEducationModel;
use App\Http\Model\MatrimonialMediaModel;
use App\Http\Model\CountrysModel;
use App\Http\Model\ConnectNowModel;
use App\User;

use App\Http\Traits\UserLocationDetailTrait;
use App\Http\Traits\PdfImageNameCleanTrait;

use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

use Exception;

class MatrimonialController extends Controller
{
    use UserLocationDetailTrait;
    use PdfImageNameCleanTrait;

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
        
        try
        {   
            if(isset($input['Id']))
            {
                $matrimonial_obj=MatrimonialModel::find($input['Id']);

                if(isset($input['RegisterId']))
                $matrimonial_obj->user_id=$input['RegisterId'];
                
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
    
                    if(isset($input['TotalMedia']))
                    {
                        $totalMedia=$input['TotalMedia'];

                        $mediaArray=array();

                        for($i=0;$i<$totalMedia;$i++)
                        {
                            $imagename='';

                            if($mediaData = $request->file('Media'.($i+1)))
                            {
                                if(isset($input['Media'.($i+1)]) && !empty($input['Media'.($i+1)]))
                                {       
                                    $destinationPath=public_path().'/images/matrimonial/media/';
                                    //$imageName = md5(time() . '_' . $mediaData->getClientOriginalName()) . '.' . $mediaData->getClientOriginalExtension();
                                    $media_name='';

                                    if(!empty($mediaData->getClientOriginalName()))
                                    $media_name=$this->getPdfImageNameClean(substr($mediaData->getClientOriginalName(), 0, strrpos($mediaData->getClientOriginalName(), '.')));
                                    $imageName = $media_name . '_' .time(). '.' . $mediaData->getClientOriginalExtension();

                                    if($mediaData->move($destinationPath, $imageName))
                                    {
                                        array_push($mediaArray,
                                        ['Media'.($i+1)=>$imageName]);
                                    }
                                }
                            }
                        }
                        //MatrimonialMediaModel::insert($mediaArray);
                        $mediaJson='';

                        if(count($mediaArray) > 0)
                        {
                            $mediaJson = json_encode($mediaArray,JSON_FORCE_OBJECT);
                        }
                        
                        $matrimonial_obj->media_json=$mediaJson;
                    }

                if(isset($input['TotalEducation']))
                {
                    $totalEducation=$input['TotalEducation'];
                    
                    $educationArray=array();

                    for($i=0;$i<$totalEducation;$i++)
                    {
                        array_push($educationArray,
                        ['Education'.($i+1).'Title'=>$input['Education'.($i+1).'Title'],
                        'Education'.($i+1).'Description'=>$input['Education'.($i+1).'Description']]);
                    }
                    //MatrimonialEducationModel::insert($educationArray);
                    $educationJson='';
                    if(count($educationArray) > 0)
                    {
                        $educationJson = json_encode($educationArray,JSON_FORCE_OBJECT);
                    }
                    
                    $matrimonial_obj->education_json=$educationJson;
                }
                
                if(isset($input['RegisterId']))
                {
                    $locationDetail=$this->getUserLocationDetail($input['RegisterId']);

                    if(isset($locationDetail->location_id))
                    $matrimonial_obj->cityid_or_countryid=$locationDetail->location_id;
                    else
                    $matrimonial_obj->cityid_or_countryid=1;

                    if(isset($locationDetail->location_type))
                    $matrimonial_obj->type_city_or_country=$locationDetail->location_type;
                    else
                    $matrimonial_obj->type_city_or_country='country';
                }
                else
                {
                    $matrimonial_obj->cityid_or_countryid=1;
                    $matrimonial_obj->type_city_or_country='country';
                }

                if($matrimonial_obj->save())
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
                $matrimonial_obj=new MatrimonialModel;

                if(isset($input['RegisterId']))
                $matrimonial_obj->user_id=$input['RegisterId'];

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
                            //$imageName = md5(time() . '_' . $mediaData->getClientOriginalName()) . '.' . $mediaData->getClientOriginalExtension();
                            $media_name='';

                            if(!empty($mediaData->getClientOriginalName()))
                            $media_name=$this->getPdfImageNameClean(substr($mediaData->getClientOriginalName(), 0, strrpos($mediaData->getClientOriginalName(), '.')));
                            $imageName = $media_name . '_' .time(). '.' . $mediaData->getClientOriginalExtension();
                            
                            if($mediaData->move($destinationPath, $imageName))
                            {
                                array_push($mediaArray,
                                ['Media'.($i+1)=>$imageName]);
                            }
                        }
                    }
                    
                    $mediaJson='';

                    if(count($mediaArray) > 0)
                    {
                        $mediaJson = json_encode($mediaArray,JSON_FORCE_OBJECT);
                    }
                    
                    $matrimonial_obj->media_json=$mediaJson;
                }

                if(isset($input['TotalEducation']))
                {
                    $totalEducation=$input['TotalEducation'];
                    
                    $educationArray=array();

                    for($i=0;$i<$totalEducation;$i++)
                    {
                        array_push($educationArray,
                        ['Education'.($i+1).'Title'=>$input['Education'.($i+1).'Title'],
                        'Education'.($i+1).'Description'=>$input['Education'.($i+1).'Description']]);
                    }
                    //MatrimonialEducationModel::insert($educationArray);
                    $educationJson='';
                    if(count($educationArray) > 0)
                    {
                        $educationJson = json_encode($educationArray,JSON_FORCE_OBJECT);
                    }
                    
                    $matrimonial_obj->education_json=$educationJson;
                }

                if(isset($input['RegisterId']))
                {
                    $locationDetail=$this->getUserLocationDetail($input['RegisterId']);

                    if(isset($locationDetail->location_id))
                    $matrimonial_obj->cityid_or_countryid=$locationDetail->location_id;
                    else
                    $matrimonial_obj->cityid_or_countryid=1;

                    if(isset($locationDetail->location_type))
                    $matrimonial_obj->type_city_or_country=$locationDetail->location_type;
                    else
                    $matrimonial_obj->type_city_or_country='country';
                }
                else
                {
                    $matrimonial_obj->cityid_or_countryid=1;
                    $matrimonial_obj->type_city_or_country='country';
                }
                
                if(isset($input['FullName']) && !empty($input['FullName']))
                $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $input['FullName'])).'-'.Str::random(5);
                else
                $slug=null;

                $matrimonial_obj->slug=$slug;

                if($matrimonial_obj->save())
                {
                    User::where('id',$input['RegisterId'])->Update(['matrimonial_id'=>$matrimonial_obj->id]);
                    $status=true;
                    $statusmessage='Matrimonial data added successfully !';
                }
                else
                {
                    $status=false;
                    $statusmessage='Matrimonial data not added !';
                }
            }
        }
        catch(Throwable $e)
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'File not uploaded!','Result'=>array()]);
        }

        return response()->json(['Status'=>$status,'StatusMessage'=>$statusmessage,'Result'=>[]]);
    }

    public function getMatrimonialList(Request $request)
    {
        $input=$request->all();

        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;

        $userId = isset($input['RegisterId']) ? $input['RegisterId'] : '';
        $status = isset($input['Status']) ? $input['Status'] : '';
        $location_id=isset($input['LocationId']) ? $input['LocationId'] : '';
        $location_type=isset($input['LocationType']) ? $input['LocationType'] : '';

        $matrimonial_obj='';
        
        //1 query
        /*if(isset($userId) && !empty($userId))
        {
            $connectPrequery = ConnectNowModel::whereNotIn('status',['connection-reject','private-reject'])->where('user_id',$userId);
        }
        else
        {
            $connectPrequery = ConnectNowModel::whereNotIn('status',['connection-reject','private-reject']);
        }
        
        if(isset($status) && !empty($status))
        {
            $connectNowObj=$connectPrequery->where('status',$status)->select('connection_matrimonial_id')->get()->toArray();
        }
        else
        {
            $connectNowObj=$connectPrequery->select('connection_matrimonial_id')->get()->toArray();
        }   

        $ids = array();
        if(count($connectNowObj) > 0)
        {
            $ids = array_column($connectNowObj, 'connection_matrimonial_id');
        }

        if((isset($userId) && !empty($userId)) || (isset($status) && !empty($status)) )
        {
            $Matrimonial_prequery1 = MatrimonialModel::leftjoin('connect_now','matrimonial.id','=','connect_now.connection_matrimonial_id');
            
            if(isset($userId) && !empty($userId))
            {
                $Matrimonial_prequery1->where('connect_now.user_id',$userId);
            }
            elseif(!empty($location_id) && !empty($location_type) && $location_type!='country')
            {
                $Matrimonial_prequery1->where('matrimonial.cityid_or_countryid',$location_id)->where('matrimonial.type_city_or_country',$location_type);
            }

            $Matrimonial_prequery=$Matrimonial_prequery1->whereIn('matrimonial.id',$ids)
            ->select('matrimonial.*','connect_now.status as connect_status')
            ->whereNotIn('connect_now.status',['connection-reject','private-reject']);
        }
        else
        {
            $Matrimonial_prequery = MatrimonialModel::leftjoin('connect_now','matrimonial.id','=','connect_now.connection_matrimonial_id')
            ->select('matrimonial.*','connect_now.status as connect_status')
            ->whereNotIn('connect_now.status',['connection-reject','private-reject']);
        }*/
       
        // 2 query

        $matrimonialConnectionArray=array();
        $matrimonialArray=array();
        $matrimonial_connection_count=$matrimonial_count=0;

        if(empty($userId) || !isset($userId))
        {
            if($Pagination==0)
            $matrimonial_obj=MatrimonialModel::get()->toArray();
            else
            $matrimonial_obj=MatrimonialModel::skip($skip)->take(30)->get()->toArray();

            $matrimonial_count=count($matrimonial_obj);

            if(isset($matrimonial_obj) && !empty($matrimonial_obj) && $matrimonial_count > 0)
            {   
                for($i=0;$i < $matrimonial_count;$i++)
                {
                    $matrimonialArray[$i]['Id']=strval($matrimonial_obj[$i]['id']);
                    $matrimonialArray[$i]['ConnectionRegisterId']=!empty($matrimonial_obj[$i]['user_id'])?strval($matrimonial_obj[$i]['user_id']):'';
                    $matrimonialArray[$i]['FullName']=!empty($matrimonial_obj[$i]['full_name'])?$matrimonial_obj[$i]['full_name']:'';
                    $matrimonialArray[$i]['City']=!empty($matrimonial_obj[$i]['city'])?$matrimonial_obj[$i]['city']:'';
                    $matrimonialArray[$i]['Age']=!empty($matrimonial_obj[$i]['age'])?strval($matrimonial_obj[$i]['age']):'';
                    $matrimonialArray[$i]['Height']=!empty($matrimonial_obj[$i]['height'])?strval($matrimonial_obj[$i]['height']):'';
                    $matrimonialArray[$i]['Caste']=!empty($matrimonial_obj[$i]['caste'])?$matrimonial_obj[$i]['caste']:'';
                    $matrimonialArray[$i]['Designation']=!empty($matrimonial_obj[$i]['designation'])?$matrimonial_obj[$i]['designation']:'';
                    $matrimonial_media_arr=json_decode($matrimonial_obj[$i]['media_json'],true);
                    $media1='';

                    if(!empty($matrimonial_media_arr))
                    {
                        if(isset($matrimonial_media_arr[0]['Media1']) && file_exists(public_path().'/images/matrimonial/media/'.$matrimonial_media_arr[0]['Media1']))
                        $media1=$matrimonial_media_arr[0]['Media1'];
                    }

                    $matrimonialArray[$i]['Media1']=!empty($media1)?URL::to('/images/matrimonial/media').'/'.$media1:'';
                    //$matrimonialArray[$i]['Media1']=!empty($matrimonial_obj[$i]['media'])?URL::to('/images/matrimonial/media').'/'.$matrimonial_obj[$i]['media']:'';
                    $matrimonialArray[$i]['Status']='';
                }
            }
        }
        else
        {
            $Matrimonial_prequery1=ConnectNowModel::join('matrimonial','connect_now.connection_matrimonial_id','=','matrimonial.id')
            ->where('matrimonial.status','active')->where('matrimonial.is_approve',1)
            ->whereNotIn('connect_now.status',['connection-reject','private-reject']);

            if(isset($userId) && !empty($userId)) 
            $Matrimonial_prequery1->where('connect_now.user_id',$userId);
            elseif(!empty($location_id) && !empty($location_type) && $location_type!='country')
            $Matrimonial_prequery1->where('matrimonial.cityid_or_countryid',$location_id)->where('matrimonial.type_city_or_country',$location_type);

            if(isset($status) && !empty($status))
            $Matrimonial_prequery1->where('connect_now.status',$status)->select('matrimonial.*','connect_now.status as connect_status');
            else
            $Matrimonial_prequery1->select('matrimonial.*','connect_now.status as connect_status');

            if($Pagination != 0)
            $matrimonial_obj=$Matrimonial_prequery1->skip($skip)->take(30)->get()->toArray();
            else
            $matrimonial_obj=$Matrimonial_prequery1->get()->toArray();

            $matrimonial_count=count($matrimonial_obj);

            if($matrimonial_count > 0)
            {
                for($i=0;$i<$matrimonial_count;$i++)
                {
                    $matrimonialArray[$i]['Id']=strval($matrimonial_obj[$i]['id']);
                    $matrimonialArray[$i]['ConnectionRegisterId']=!empty($matrimonial_obj[$i]['user_id'])?strval($matrimonial_obj[$i]['user_id']):'';
                    $matrimonialArray[$i]['FullName']=!empty($matrimonial_obj[$i]['full_name'])?$matrimonial_obj[$i]['full_name']:'';
                    $matrimonialArray[$i]['City']=!empty($matrimonial_obj[$i]['city'])?$matrimonial_obj[$i]['city']:'';
                    $matrimonialArray[$i]['Age']=!empty($matrimonial_obj[$i]['age'])?strval($matrimonial_obj[$i]['age']):'';
                    $matrimonialArray[$i]['Height']=!empty($matrimonial_obj[$i]['height'])?strval($matrimonial_obj[$i]['height']):'';
                    $matrimonialArray[$i]['Caste']=!empty($matrimonial_obj[$i]['caste'])?$matrimonial_obj[$i]['caste']:'';
                    $matrimonialArray[$i]['Designation']=!empty($matrimonial_obj[$i]['designation'])?$matrimonial_obj[$i]['designation']:'';

                    $matrimonial_media_arr=json_decode($matrimonial_obj[$i]['media_json'],true);
                    $media1='';

                    if(!empty($matrimonial_media_arr))
                    {
                        if(isset($matrimonial_media_arr[0]['Media1']) && file_exists(public_path().'/images/matrimonial/media/'.$matrimonial_media_arr[0]['Media1']))
                        $media1=$matrimonial_media_arr[0]['Media1'];
                    }

                    $matrimonialArray[$i]['Media1']=!empty($media1)?URL::to('/images/matrimonial/media').'/'.$media1:'';
                    //$matrimonialArray[$i]['Media1']=!empty($matrimonial_obj[$i]['media'])?URL::to('/images/matrimonial/media').'/'.$matrimonial_obj[$i]['media']:'';
                    $matrimonialArray[$i]['Status']=!empty($matrimonial_obj[$i]['connect_status'])?$matrimonial_obj[$i]['connect_status']:'';
                }
            }
            else
            {
                $matrimonialArray=array();
            }

            if((isset($userId) && !empty($userId)) || (isset($status) && !empty($status)) )
            {
                $Matrimonial_connections_prequery1=ConnectNowModel::join('matrimonial','connect_now.matrimonial_id','matrimonial.id')
                ->where('matrimonial.status','active')->where('matrimonial.is_approve',1);
                
                if(isset($status) && !empty($status))
                {
                    $Matrimonial_connections_prequery1->where('connect_now.status',$status);
                }

                if(isset($userId) && !empty($userId))
                {
                    $Matrimonial_connections_prequery1->where('connect_now.connection_register_id',$userId);
                }
                elseif(!empty($location_id) && !empty($location_type) && $location_type!='country')
                {
                    $Matrimonial_connections_prequery1->where('matrimonial.cityid_or_countryid',$location_id)->where('matrimonial.type_city_or_country',$location_type);
                }

                $Matrimonial_connections_prequery1->select('matrimonial.*','connect_now.status as connect_status');
                
                if($Pagination != 0)
                $matrimonial_connection_obj=$Matrimonial_connections_prequery1->skip($skip)->take(30)->get()->toArray();
                else
                $matrimonial_connection_obj=$Matrimonial_connections_prequery1->get()->toArray();

                $matrimonial_connection_count=count($matrimonial_connection_obj);
            }

            if($matrimonial_connection_count > 0)
            {
                for($i=0;$i<$matrimonial_connection_count;$i++)
                {
                    $matrimonialConnectionArray[$i]['Id']=strval($matrimonial_connection_obj[$i]['id']);
                    $matrimonialConnectionArray[$i]['ConnectionRegisterId']=!empty($matrimonial_connection_obj[$i]['user_id'])?strval($matrimonial_connection_obj[$i]['user_id']):'';
                    $matrimonialConnectionArray[$i]['FullName']=!empty($matrimonial_connection_obj[$i]['full_name'])?$matrimonial_connection_obj[$i]['full_name']:'';
                    $matrimonialConnectionArray[$i]['City']=!empty($matrimonial_connection_obj[$i]['city'])?$matrimonial_connection_obj[$i]['city']:'';
                    $matrimonialConnectionArray[$i]['Age']=!empty($matrimonial_connection_obj[$i]['age'])?strval($matrimonial_connection_obj[$i]['age']):'';
                    $matrimonialConnectionArray[$i]['Height']=!empty($matrimonial_connection_obj[$i]['height'])?strval($matrimonial_connection_obj[$i]['height']):'';
                    $matrimonialConnectionArray[$i]['Caste']=!empty($matrimonial_connection_obj[$i]['caste'])?$matrimonial_connection_obj[$i]['caste']:'';
                    $matrimonialConnectionArray[$i]['Designation']=!empty($matrimonial_connection_obj[$i]['designation'])?$matrimonial_connection_obj[$i]['designation']:'';

                    $matrimonial_media_arr=json_decode($matrimonial_connection_obj[$i]['media_json'],true);
                    $media1='';

                    if(!empty($matrimonial_media_arr))
                    {
                        if(isset($matrimonial_media_arr[0]['Media1']) && file_exists(public_path().'/images/matrimonial/media/'.$matrimonial_media_arr[0]['Media1']))
                        $media1=$matrimonial_media_arr[0]['Media1'];
                    }

                    $matrimonialConnectionArray[$i]['Media1']=!empty($media1)?URL::to('/images/matrimonial/media').'/'.$media1:'';
                    //$matrimonialArray[$i]['Media1']=!empty($matrimonial_connection_obj[$i]['media'])?URL::to('/images/matrimonial/media').'/'.$matrimonial_connection_obj[$i]['media']:'';
                    $matrimonialConnectionArray[$i]['Status']=!empty($matrimonial_connection_obj[$i]['connect_status'])?$matrimonial_connection_obj[$i]['connect_status']:'';
                }
            }
            else
            {
                $matrimonialConnectionArray=array();
            }

        }

        
        if($matrimonial_connection_count > 0 || $matrimonial_count > 0)
        {
            return response()->json(['Status'=>true,'StatusMessage'=>'Get Matrimonial List successfully !','Result'=>['UserAcceptedList'=>$matrimonialArray,'UserConnectionStatusList'=>$matrimonialConnectionArray]]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'No Data available !','Result'=>['UserAcceptedList'=>$matrimonialArray,'UserConnectionStatusList'=>$matrimonialConnectionArray]]);
        }
    }

    public function getMatrimonialDetail(Request $request)
    {
        $input=$request->all();

        if(!isset($input['ConnectId']) || empty($input['ConnectId']))
        {
            $error[] = 'ConnectId Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $userId=isset($input['RegisterId'])?$input['RegisterId']:'';
        $connectId=isset($input['ConnectId'])?$input['ConnectId']:'';

        $matrimonialObject=MatrimonialModel::with(['country','desiredcountry','user'])
        ->where('id',$connectId)->first();

        $connect_now_obj=null;
        DB::connection()->enableQueryLog();
        
        //$queries = DB::getQueryLog();
        if(isset($userId) && isset($matrimonialObject->id))
        {
            $connect_now_obj=ConnectNowModel::where('user_id',$userId)
            ->where('connection_matrimonial_id',$matrimonialObject->id)
            ->whereNotIn('status',['connection-reject','private-reject'])->orWhere('connection_register_id',$userId)
            ->where('matrimonial_id',$matrimonialObject->id)->first();
        }
        
        $status='';

        if($connect_now_obj!==null)
        {
            $user_status='';
            if($connect_now_obj->user_id==$userId)
            {
                $user_status=$connect_now_obj->user_id;
                $status='user_accept';
            }
            elseif($connect_now_obj->connection_register_id==$userId)
            {
                $connect_now_obj->connection_register_id;
                $status='user_connect';
            }
        }

        $matrimonialArray=array();
        
        if($matrimonialObject !== null )
        {   
            $matrimonialArray['Id']=strval($matrimonialObject->id);
            $matrimonialArray['RegisterUser']=!empty($matrimonialObject->user['name'])?$matrimonialObject->user['name']:'';
            $matrimonialArray['RegisterMobile']=!empty($matrimonialObject->user['mobile_number'])?$matrimonialObject->user['mobile_number']:'';
            $matrimonialArray['RegisterEmail']=!empty($matrimonialObject->user['email'])?$matrimonialObject->user['email']:'';
            $matrimonialArray['FullName']=!empty($matrimonialObject->full_name)?$matrimonialObject->full_name:'';
            $matrimonialArray['City']=!empty($matrimonialObject->city)?$matrimonialObject->city:'';
            $matrimonialArray['Address']=!empty($matrimonialObject->address)?$matrimonialObject->address:'';
            $matrimonialArray['About']=!empty($matrimonialObject->about)?$matrimonialObject->about:'';
            $matrimonialArray['Age']=!empty($matrimonialObject->age)?strval($matrimonialObject->age):'';
            $matrimonialArray['Height']=!empty($matrimonialObject->height)?strval($matrimonialObject->height):'';
            $matrimonialArray['Caste']=!empty($matrimonialObject->caste)?$matrimonialObject->caste:'';
            $matrimonialArray['SubCaste']=!empty($matrimonialObject->subcaste)?$matrimonialObject->subcaste:'';
            $matrimonialArray['Married']=!empty($matrimonialObject->married)?$matrimonialObject->married:'';
            $matrimonialArray['Designation']=!empty($matrimonialObject->designation)?$matrimonialObject->designation:'';
            $matrimonialArray['Other']=!empty($matrimonialObject->other)?$matrimonialObject->other:'';
            $matrimonialArray['Country']=!empty($matrimonialObject->country['name'])?$matrimonialObject->country['name']:'';
            $matrimonialArray['AnnualIncome']=!empty($matrimonialObject->annual_income)?strval($matrimonialObject->annual_income):'';
            $matrimonialArray['LookingforDesiredAge']=!empty($matrimonialObject->desired_age)?strval($matrimonialObject->desired_age):'';
            $matrimonialArray['LookingforDesiredHeight']=!empty($matrimonialObject->desired_height)?strval($matrimonialObject->desired_height):'';
            $matrimonialArray['LookingforDesiredMaritalStatus']=!empty($matrimonialObject->desired_marital_status)?$matrimonialObject->desired_marital_status:'';
            $matrimonialArray['LookingforReligion']=!empty($matrimonialObject->desired_religion)?$matrimonialObject->desired_religion:'';
            $matrimonialArray['LookingforMotherTongue']=!empty($matrimonialObject->desired_mother_tongue)?$matrimonialObject->desired_mother_tongue:'';
            $matrimonialArray['LookingforAnnualIncome']=!empty($matrimonialObject->desired_annual_income)?strval($matrimonialObject->desired_annual_income):'';
            $matrimonialArray['LookingforCountry']=!empty($matrimonialObject->desiredcountry['name'])?$matrimonialObject->desiredcountry['name']:'';
            $matrimonialArray['Private']=!empty($matrimonialObject->private)?$matrimonialObject->private:'';
            $matrimonialArray['ConnectStatus']=!empty($connect_now_obj)?$connect_now_obj->status:'';
            $matrimonialArray['Type']=$status;

            $educationDetail=json_decode($matrimonialObject->education_json,true);
            $mediaDetail=json_decode($matrimonialObject->media_json,true);

            $totalEducationCount=!empty($educationDetail)?count($educationDetail):0;
            $totalMediaCount=!empty($mediaDetail)?count($mediaDetail):0;

            $educationArray=array();

            if($totalEducationCount > 0)
            {
                for($i=0;$i < $totalEducationCount;$i++)
                {
                    // $matrimonialArray['Education'.($i+1).'Title']=!empty($educationDetail[$i]['Education'.($i+1).'Title'])?$educationDetail[$i]['Education'.($i+1).'Title']:'';
                    // $matrimonialArray['Education'.($i+1).'Description']=!empty($educationDetail[$i]['Education'.($i+1).'Description'])?$educationDetail[$i]['Education'.($i+1).'Description']:'';
                    $matrimonialArray['Education'][$i]['Title']=!empty($educationDetail[$i]['Education'.($i+1).'Title'])?$educationDetail[$i]['Education'.($i+1).'Title']:'';
                    $matrimonialArray['Education'][$i]['Description']=!empty($educationDetail[$i]['Education'.($i+1).'Description'])?$educationDetail[$i]['Education'.($i+1).'Description']:'';
                }
            }
            else
            {
                $matrimonialArray['Education']=array();
            }

            if($totalMediaCount > 0)
            {
                for($i=0;$i < $totalMediaCount;$i++)
                {
                    if(file_exists(public_path().'/images/matrimonial/media/'.$mediaDetail[$i]['Media'.($i+1)]))
                    $matrimonialArray['Media']['URL'][$i]=URL::to('/images/matrimonial/media').'/'.$mediaDetail[$i]['Media'.($i+1)];
                    else
                    $matrimonialArray['Media']['URL'][$i]='';
                }   
            }
            else
            {
                $matrimonialArray['Media']['URL']=array();
            }
            
            return response()->json(['Status'=>true,'StatusMessage'=>'Get MatrimonialDetail successfully !','Result'=>$matrimonialArray]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'No Data available!','Result'=>array()]);
        }
    }

    public function connectNow(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) && empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
        }

        if(!isset($input['MatrimonialId']) && empty($input['MatrimonialId']))
        {
            $error[] = 'MatrimonialId Must be Required!';
        }

        if(!isset($input['ConnectionRegisterId']) && empty($input['ConnectionRegisterId']))
        {
            $error[] = 'ConnectionRegisterId Must be Required!';
        }

        if(!isset($input['ConnectionMatrimonialId']) && empty($input['ConnectionMatrimonialId']))
        {
            $error[] = 'ConnectionMatrimonialId Must be Required!';
        }

        if(!isset($input['Status']) || empty($input['Status']))
        {
            $error[] = 'Status Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>false,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $user_arr=User::whereIn('id',[$input['RegisterId'],$input['ConnectionRegisterId']])->get()->toArray();

        $matrimonial_arr=MatrimonialModel::whereIn('id',[$input['MatrimonialId'],$input['ConnectionMatrimonialId']])->get()->toArray();

        $usercounts=count($user_arr);
        $matrimonialcounts=count($matrimonial_arr);

        if($usercounts > 2 || $usercounts < 2)
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'User Ids not found !','Result'=>array()]);
        }

        if($matrimonialcounts > 2 || $matrimonialcounts < 2)
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Matrimonial Ids not found !','Result'=>array()]);
        }

        $connect_obj=ConnectNowModel::where('user_id',$input['RegisterId'])
        ->where('matrimonial_id',$input['MatrimonialId'])
        ->where('connection_register_id',$input['ConnectionRegisterId'])
        ->where('connection_matrimonial_id',$input['ConnectionMatrimonialId'])->first();

        $message='';

        if($connect_obj===null)
        {
            $message='Connect now detail stored!';
            $result=ConnectNowModel::create(['user_id'=>$input['RegisterId'],'matrimonial_id'=>$input['MatrimonialId'],'connection_register_id'=>$input['ConnectionRegisterId'],'connection_matrimonial_id'=>$input['ConnectionMatrimonialId'],'status'=>$input['Status']]);
        }
        else
        {
            $message='Connect now detail status updated!';
            $result=ConnectNowModel::where('user_id',$input['RegisterId'])->where('matrimonial_id',$input['MatrimonialId'])->where('connection_register_id',$input['ConnectionRegisterId'])->where('connection_matrimonial_id',$input['ConnectionMatrimonialId'])->update(['status'=>$input['Status']]);
        }

        if($result)
        {
            return response()->json(['Status'=>true,'StatusMessage'=>$message,'Result'=>array()]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Connect now detail not stored!','Result'=>array()]);
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