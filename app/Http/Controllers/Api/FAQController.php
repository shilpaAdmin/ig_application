<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\FAQModel;
use App\Http\Model\TagFAQMasterModel;

use App\Http\Model\TagMasterModel;
use App\User;

use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Traits\UserLocationDetailTrait;

class FAQController extends Controller
{
    use UserLocationDetailTrait;

    public function listFAQData(Request $request)
    {
        $input=$request->all();
        
        $tagsData=array();
        $FAQFilter=array();
        
        $userId=!empty($input['RegisterId'])?$input['RegisterId']:'';
        $locationId=isset($input['LocationId'])?$input['LocationId']:'';
        $locationType=isset($input['LocationType'])?$input['LocationType']:'';

        $tagsId=isset($input['TagsID'])?$input['TagsID']:'';

        if(isset($tagsId) && !empty($tagsId))
        {
            if($tagsId!=0)
            {
                $tagArray=explode(',',$tagsId);
                
                $query=FAQModel::orderBy('id','desc');

                if(isset($tagsId) && !empty($tagsId))
                {
                    $tags=$tagsId;
                    if( strpos($tagsId, ',') !== false )
                    {
                        $explodeTags = explode(',', $tagsId);
                        for($k =0; $k < count($explodeTags); $k++)
                        {
                            if($k==0)
                            {
                                $query->whereRaw("find_in_set($explodeTags[$k] ,tags)");
                            }
                            else
                            {
                                $query->orWhereRaw("find_in_set($explodeTags[$k],tags)");
                            }
                        }
                    }
                    else
                    {
                        $query->whereRaw("find_in_set($tags ,tags)");
                    }
                }

                if(empty($userId) && empty($locationId) && empty($locationType))
                $FAQFilter=$query->get()->toArray();
                elseif(!empty($userId))
                $FAQFilter=$query->where('user_id',$userId)->get()->toArray();
                elseif(!empty($locationId) && !empty($locationType) && $locationType!='country')
                $FAQFilter=$query->where('cityid_or_countryid',$locationId)->where('type_city_or_country',$locationType)->get()->toArray();
                else
                $FAQFilter=$query->get()->toArray();
            }
        }
        else
        {
            
            if(empty($userId) && empty($locationId) && empty($locationType))
            $FAQFilter=FAQModel::get()->toArray();
            elseif(!empty($userId))
            $FAQFilter=FAQModel::where('user_id',$userId)->get()->toArray();
            elseif(!empty($locationId) && !empty($locationType) && $locationType!='country')
            $FAQFilter=FAQModel::where('cityid_or_countryid',$locationId)->where('type_city_or_country',$locationType)->get()->toArray();
            else
            $FAQFilter=FAQModel::get()->toArray();
        }
        
        $tagsData=TagFAQMasterModel::get()->toArray();
        $dataArray=array();

        if(count($FAQFilter) > 0)
        {
            $faq_count=count($FAQFilter);
            for($i=0;$i<$faq_count;$i++)
            {
                $dataArray['List'][$i]['Id']=$FAQFilter[$i]['id'];
                $dataArray['List'][$i]['Tags']=$FAQFilter[$i]['tags'];
                $dataArray['List'][$i]['Question']=$FAQFilter[$i]['question'];
                $dataArray['List'][$i]['Answer']=$FAQFilter[$i]['answer'];
                $dataArray['List'][$i]['Date']=date('d-m-Y',strtotime($FAQFilter[$i]['created_at']));
                $dataArray['List'][$i]['Time']=date('H:i:s',strtotime($FAQFilter[$i]['created_at']));
            }
        }
        else
        {
            $dataArray['List']=array();
        }

        $tag_count=count($tagsData);

        if($tag_count > 0)
        {
            for($j=0;$j<$tag_count;$j++)
            {
                $dataArray['Tags'][$j]['Id']=$tagsData[$j]['id'];
                $dataArray['Tags'][$j]['Name']=$tagsData[$j]['name'];
            }
        }
        else
        {
            $dataArray['Tags']=array();
        }

        if(!empty($dataArray['List']))
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'FAQ Data Listed Successfully','Result'=>$dataArray]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'No FAQ Data Available','Result'=>$dataArray]);
        }

    }

    public function storeFAQData(Request $request)
    {
        $input=$request->all();
        
        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!isset($input['TagsID']) || empty($input['TagsID']))
        {
            $error[] = 'TagsID Must be Required!';
		}
        
        if(!isset($input['Question']) || empty($input['Question']))
        {
            $error[] = 'Question Must be Required!';
		}

        if(!isset($input['Answer']) || empty($input['Answer']))
        {
            $error[] = 'Answer Must be Required!';
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

            $faqObject=new FAQModel;
            $faqObject->question=$input['Question'];
            $faqObject->answer=$input['Answer'];
            $faqObject->user_id=$input['RegisterId'];
            $faqObject->tags=$input['TagsID'];

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
            
            $faqObject->cityid_or_countryid=$cityCountryId;
            $faqObject->type_city_or_country=$LocationType;

            if(isset($input['Question']) && !empty($input['Question']))
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $input['Question'])).'-'.Str::random(5);
            else
            $slug=null;

            $faqObject->slug=$slug;

            if($faqObject->save())
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'FAQ added successfully!','Result'=>array()]);
            }
            else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'FAQ not added!','Result'=>array()]);
            }        
    }

    public function updateFAQData(Request $request)
    {
        $input=$request->all();

        if(!isset($input['FAQId']) && empty($input['FAQId']))
        {
            $error[] = 'FAQId Must be Required!';
		}

        if(!isset($input['RegisterId']) && empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(empty($input['Question']) && empty($input['Answer']) && empty($input['TagsID']))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'Give any one required parameter !','Result'=>array()]);
        }
        
        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {   
            $user=User::where('id',$input['RegisterId'])->first();
            
            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
            }
        }
        
        if(isset($input['FAQId']) && !empty($input['FAQId']))
        {   
            $faq=FAQModel::where('id',$input['FAQId'])->first();
            
            if($faq===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'FAQ record not exist!','Result'=>array()]);
            }
        }

        if(isset($input['FAQId']) && !empty($input['FAQId']))
        {   
            $faqObj=FAQModel::find($input['FAQId']);
            
            if(isset($input['Question']))
            $faqObj->question=$input['Question'];

            if(isset($input['Answer']))
            $faqObj->answer=$input['Answer'];
                
            if(isset($input['TagsID']))
            $faqObj->tags=$input['TagsID'];

            if(isset($input['RegisterId']))
            $faqObj->user_id=$input['RegisterId'];

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
            
            $faqObj->cityid_or_countryid=$cityCountryId;
            $faqObj->type_city_or_country=$LocationType;

            if($faqObj->save())
            { 
                return response()->json(['Status'=>true,'StatusMessage'=>'FAQ updated successfully!','Result'=>array()]);
            }
            else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'FAQ not updated!','Result'=>array()]);
            }
        }
    }
}