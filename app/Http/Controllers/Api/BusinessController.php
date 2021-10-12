<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\CountrysModel;
use App\Http\Model\BusinessModel;
use App\Http\Model\CategoryModel;
use App\Http\Model\TagMasterModel;
use App\Http\Model\BusinessFavouriteModel;
use App\Http\Model\ForumCommentReplyModel;
use App\Http\Model\ForumModel;
use App\Http\Model\FAQModel;
use App\Http\Model\TagFAQMasterModel;
use App\User;

use App\Http\Model\BusinessUserEnquiryModel;

use App\Http\Traits\UserLocationDetailTrait;

use Carbon\Carbon;
use DataTables;
use URL;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    use UserLocationDetailTrait;

    public function storeAllBusinessData(Request $request)
    {
        $input=$request->all();

        if(!isset($input['BuisnessType']) || empty($input['BuisnessType']))
        {
            $error[] = 'BuisnessType Must be Required!';
		}
        if(!isset($input['Name']) || empty($input['Name']))
        {
            $error[] = 'Name Must be Required!';
		}
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}
        /* media file code start here */
        $destinationPath = public_path().'/images/business/';
        $mediaFileArray = array();

        $updateMediaFlag=0;

        if(isset($input['TotalMedia']) && !empty($input['TotalMedia']))
        {
            $totalMedia = (int)$input['TotalMedia'];

            for($k = 1; $k <= $totalMedia; $k++)
            {
                if($mediaData = $request->file('Media'.$k))
                {
                    $imageName = md5(time() . '_' . $mediaData->getClientOriginalName()) . '.' . $mediaData->getClientOriginalExtension();
                    $mediaData->move($destinationPath, $imageName);

                    $mediaFileArray[] = array('Media'.$k=>$imageName);
                }
            }
        }
        if(count($mediaFileArray) > 0)
        {
            $mediaJson = json_encode($mediaFileArray,JSON_FORCE_OBJECT);
        }
        else
        {
            $mediaJson = '{}';
            $updateMediaFlag=1;
        }
        /* media file code end here */

        /*tag master start */
        $tagIdArray = array();
        if(isset($input['FeaturesOrTags']) && !empty($input['FeaturesOrTags']))
        {
            $arr = explode(',', $input['FeaturesOrTags']);
            foreach ($arr as $val)
            {
                $tagData = TagMasterModel::where('name', '=', $val)->get()->toArray();
                if(count($tagData) > 0)
                {
                    array_push($tagIdArray, $tagData[0]['id']);
                }
                else
                {
                    $obj = new TagMasterModel();
                    $obj->name = $val;
                    $obj->save();
                    array_push($tagIdArray, $obj->id);
                }
            }
        }
        /*tag master end */

        /* hours code start here */

        $updateHoursFlag=0;

        if(empty($request->DisplayMon) && empty($request->DisplayTue) && empty($request->DisplayWed) && empty($request->DisplayThur)
        && empty($request->DisplayFri) && empty($request->DisplaySat) && empty($request->DisplaySun))
        {
            $updateHoursFlag=1;
        }

        $DisplayMon = !empty($request->DisplayMon) ? $request->DisplayMon : "";
        $DisplayTue = !empty($request->DisplayTue) ? $request->DisplayTue : "";
        $DisplayWed = !empty($request->DisplayWed) ? $request->DisplayWed : "";
        $DisplayThur = !empty($request->DisplayThur) ? $request->DisplayThur : "";
        $DisplayFri = !empty($request->DisplayFri) ? $request->DisplayFri : "";
        $DisplaySat = !empty($request->DisplaySat) ? $request->DisplaySat : "";
        $DisplaySun = !empty($request->DisplaySun) ? $request->DisplaySun : "";

        $hoursJson = array("DisplayMon"=>$DisplayMon,"DisplayTue"=>$DisplayTue,"DisplayWed"=>$DisplayWed,"DisplayThur"=>$DisplayThur,"DisplayFri"=>$DisplayFri,"DisplaySat"=>$DisplaySat,"DisplaySun"=>$DisplaySun);

        if(isset($hoursJson) && !empty($hoursJson))
        {
            $jsonHoureData = json_encode($hoursJson,JSON_FORCE_OBJECT);
        }
        else
        {
            $jsonHoureData = '{}';
        }
        /* hours code end here */

        /* job code start here*/
        $JobQualification = !empty($request->JobQualification) ? $request->JobQualification : "";
        $JobSalary = !empty($request->JobSalary) ? $request->JobSalary : "";
        $JobExperience =!empty($request->JobExperience) ? $request->JobExperience : "";

        $updateJobDetailFlag=0;
        if(empty($JobQualification) && empty($JobSalary) && empty($JobExperience))
        {
            $updateJobDetailFlag=1;
        }

        $jobDetailJson = array("JobQualification"=>$JobQualification,"JobSalary"=>$JobSalary,"JobExperience"=>$JobExperience);
        if(isset($jobDetailJson) && !empty($jobDetailJson))
            $jsonJobData = json_encode($jobDetailJson,JSON_FORCE_OBJECT);
        else
            $jsonJobData = '{}';
        /* job code end here*/


        /* relatedPersonDataJson file code start here */
        $updateRelatedPersonDetailFlag=0;
        $relatedPersondestinationPath = public_path().'/images/business_related_person/';
        $relatedPersonDataArray = array();
        if(isset($input['TotalRelatedPerson']) && !empty($input['TotalRelatedPerson']))
        {
            $mediaFileArray = array();
            $totalRelatedPerson = (int)$input['TotalRelatedPerson'];
            for($k = 1; $k <= $totalRelatedPerson; $k++)
            {
                $relatedPersonImage = $relatedPersonDetail = '';
                if($relatedPersonImageMediaData = $request->file('RelatedPersonImage'.$k))
                {
                    $imageName = md5(time() . '_' . $relatedPersonImageMediaData->getClientOriginalName()) . '.' . $relatedPersonImageMediaData->getClientOriginalExtension();
                    $relatedPersonImageMediaData->move($relatedPersondestinationPath, $imageName);

                    $relatedPersonImage =$imageName;
                }

                if(isset($input['RelatedPersonDetail'.$k]) && !empty($input['RelatedPersonDetail'.$k]))
                {
                    $relatedPersonDetail = $input['RelatedPersonDetail'.$k];
                }
                $relatedPersonDataArray[] = array('RelatedPersonDetail'.$k=>$relatedPersonDetail,'RelatedPersonImage'.$k=>$relatedPersonImage);
            }

        }

        if(count($relatedPersonDataArray) > 0)
        {
            $relatedPersonDataJson = json_encode($relatedPersonDataArray,JSON_FORCE_OBJECT);
        }
        else
        {
            $relatedPersonDataJson = '{}';
            $updateRelatedPersonDetailFlag=1;
        }
        /* relatedPersonDataJson file code end here */
        try
        {
            if(isset($input['BusinessId']) && !empty($input['BusinessId']))
            {
                $data = BusinessModel::find($request->BusinessId);

                if(isset($request->RegisterId) && !empty($request->RegisterId))
                $data->user_id=$request->RegisterId;

                if(isset($tagIdArray) && !empty($tagIdArray))
                $data->tag_id=implode(',',$tagIdArray);

                if(isset($request->CatagoryID) && !empty($request->CatagoryID))
                $data->category_id=$request->CatagoryID;

                if(isset($request->BuisnessType) && !empty($request->BuisnessType))
                $data->type=$request->BuisnessType;

                if(isset($request->Name) && !empty($request->Name))
                $data->name=$request->Name;

                if(isset($request->About) && !empty($request->About))
                $data->about=$request->About;

                if(isset($request->Address) && !empty($request->Address))
                $data->address=$request->Address;

                if(isset($request->Description) && !empty($request->Description))
                $data->description=$request->Description;

                if(isset($request->SubDescription) && !empty($request->SubDescription))
                $data->sub_descrition=$request->SubDescription;

                if(isset($request->SubDescription2) && !empty($request->SubDescription2))
                $data->sub_description_1=$request->SubDescription2;

                if(isset($request->USPID) && !empty($request->USPID))
                $data->multiple_subcategory_id=$request->USPID;

                if(isset($request->ActualPrice) && !empty($request->ActualPrice))
                $data->actual_price=$request->ActualPrice;

                if(isset($request->SellingPrice) && !empty($request->SellingPrice))
                $data->selling_price=$request->SellingPrice;

                if(isset($request->DisplayHours) && !empty($request->DisplayHours))
                $data->display_hours=$request->DisplayHours;

                if(isset($request->PaymentMode) && !empty($request->PaymentMode))
                $data->payment_mode=$request->PaymentMode;

                if(isset($request->ContactPersonName) && !empty($request->ContactPersonName))
                $data->contact_person_name=$request->ContactPersonName;

                if(isset($request->MobileNumber) && !empty($request->MobileNumber))
                $data->mobile_number=$request->MobileNumber;

                if(isset($request->EmailID) && !empty($request->EmailID))
                $data->email_id=$request->EmailID;

                if(isset($request->Website) && !empty($request->Website))
                $data->website=$request->Website;

                //if(isset($mediaJson) && !empty($mediaJson))
                if($updateMediaFlag!=1)
                $data->media_file_json=$mediaJson;

                if(isset($request->UnitOption) && !empty($request->UnitOption))
                $data->unit_option=$request->UnitOption;

                //if(isset($jsonJobData) && !empty($jsonJobData))
                if($updateJobDetailFlag!=1)
                $data->job_detail_json=$jsonJobData;

                if(isset($request->ReferenceUrl) && !empty($request->ReferenceUrl))
                $data->reference_url=$request->ReferenceUrl;

                if(isset($request->Syllabus) && !empty($request->Syllabus))
                $data->syllabus=$request->Syllabus;

                //if(isset($relatedPersonDataJson) && !empty($relatedPersonDataJson))
                if($updateRelatedPersonDetailFlag!=1)
                $data->realated_person_detail_json=$relatedPersonDataJson;

                if($updateHoursFlag!=1)
                $data->hours_json =$jsonHoureData;

                $LocationType=$cityCountryId='';

                $locationData=$this->getUserLocationDetail($request->RegisterId);
    
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
                
                $data->cityid_or_countryid=$cityCountryId;
                $data->type_city_or_country=$LocationType;
                
                $data->status = 'active';

                $data->save();

                /*$data->user_id = !empty($request->RegisterId) ? $request->RegisterId : "";
                $data->tag_id = !empty($tagIdArray) ? implode(',',$tagIdArray) : "";
                $data->category_id = !empty($request->CatagoryID) ? $request->CatagoryID : "";
                $data->type = !empty($request->BuisnessType) ? $request->BuisnessType : "";
                $data->name =!empty($request->Name) ? $request->Name : "";
                $data->about =!empty($request->About) ? $request->About : "";
                $data->address = !empty($request->Address) ? $request->Address : "";
                $data->description = !empty($request->Description) ? $request->Description : "";
                $data->sub_descrition =!empty($request->SubDescription) ? $request->SubDescription : "";
                $data->sub_description_1 = !empty($request->SubDescription2) ? $request->SubDescription2 : "";
                $data->multiple_subcategory_id = !empty($request->USPID) ? $request->USPID : "";
                $data->actual_price = !empty($request->ActualPrice) ? $request->ActualPrice : "";
                //  $data->actual_price_unit = $request->actual_price_unit;
                $data->selling_price = !empty($request->SellingPrice) ? $request->SellingPrice : "";
                // $data->selling_price_unit = $request->selling_price_unit;
                $data->display_hours = !empty($request->DisplayHours) ? $request->DisplayHours : "";
                $data->hours_json =$jsonHoureData;
                $data->payment_mode =!empty($request->PaymentMode) ? $request->PaymentMode : "";
                $data->contact_person_name = !empty($request->ContactPersonName) ? $request->ContactPersonName : "";
                $data->mobile_number = !empty($request->MobileNumber) ? $request->MobileNumber : "";
                $data->email_id = !empty($request->EmailID) ? $request->EmailID : "";
                $data->website = !empty($request->Website) ? $request->Website : "";
                $data->media_file_json = !empty($mediaJson) ? $mediaJson : "";
                $data->unit_option = !empty($request->UnitOption) ? $request->UnitOption : "";
                $data->job_detail_json =!empty($jsonJobData) ? $jsonJobData : "";
                $data->reference_url = !empty($request->ReferenceUrl) ? $request->ReferenceUrl : "";
                $data->syllabus = !empty($request->Syllabus) ? $request->Syllabus : "";
                $data->realated_person_detail_json = !empty($relatedPersonDataJson) ? $relatedPersonDataJson : "";
                // $data->is_approve = $request->is_approve;
                // $data->approved_by_user_id = $request->approved_by_user_id;
                // $data->declined_by_user_id = $request->contact_person_name;
                // $data->created_by = $request->mobile_number;
                // $data->last_updated_by = $request->hours_json;
                $data->status = 'active';*/

                // $lastInsertedId = $data->id;
                return response()->json(['Status'=>True,'StatusMessage'=>'Business updated successfully']);
            }
            else
            {
            $data = new BusinessModel();
            $data->user_id = !empty($request->RegisterId) ? $request->RegisterId : "";
            $data->tag_id = !empty($tagIdArray) ? implode(',',$tagIdArray) : "";
            $data->category_id = !empty($request->CatagoryID) ? $request->CatagoryID : "";
            $data->type = !empty($request->BuisnessType) ? $request->BuisnessType : "";
            $data->name =!empty($request->Name) ? $request->Name : "";
            $data->about =!empty($request->About) ? $request->About : "";
            $data->address = !empty($request->Address) ? $request->Address : "";
            $data->description = !empty($request->Description) ? $request->Description : "";
            $data->sub_descrition =!empty($request->SubDescription) ? $request->SubDescription : "";
            $data->sub_description_1 = !empty($request->SubDescription2) ? $request->SubDescription2 : "";
            $data->multiple_subcategory_id = !empty($request->USPID) ? $request->USPID : "";
            $data->actual_price = !empty($request->ActualPrice) ? $request->ActualPrice : "";
            //  $data->actual_price_unit = $request->actual_price_unit;
            $data->selling_price = !empty($request->SellingPrice) ? $request->SellingPrice : "";
            // $data->selling_price_unit = $request->selling_price_unit;
            $data->display_hours = !empty($request->DisplayHours) ? $request->DisplayHours : "";
            $data->hours_json =$jsonHoureData;
            $data->payment_mode =!empty($request->PaymentMode) ? $request->PaymentMode : "";
            $data->contact_person_name = !empty($request->ContactPersonName) ? $request->ContactPersonName : "";
            $data->mobile_number = !empty($request->MobileNumber) ? $request->MobileNumber : "";
            $data->email_id = !empty($request->EmailID) ? $request->EmailID : "";
            $data->website = !empty($request->Website) ? $request->Website : "";
            $data->media_file_json = !empty($mediaJson) ? $mediaJson : "";
            $data->unit_option = !empty($request->UnitOption) ? $request->UnitOption : "";
            $data->job_detail_json =!empty($jsonJobData) ? $jsonJobData : "";
            $data->reference_url = !empty($request->ReferenceUrl) ? $request->ReferenceUrl : "";
            $data->syllabus = !empty($request->Syllabus) ? $request->Syllabus : "";
            $data->realated_person_detail_json = !empty($relatedPersonDataJson) ? $relatedPersonDataJson : "";
            // $data->is_approve = $request->is_approve;
            // $data->approved_by_user_id = $request->approved_by_user_id;
            // $data->declined_by_user_id = $request->contact_person_name;
            // $data->created_by = $request->mobile_number;
            // $data->last_updated_by = $request->hours_json;
            
            $LocationType=$cityCountryId='';

            $locationData=$this->getUserLocationDetail($request->RegisterId);

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
            
            $data->cityid_or_countryid=$cityCountryId;
            $data->type_city_or_country=$LocationType;

            $data->status = 'active';
            $data->save();
            $lastInsertedId = $data->id;
            //  echo "<pre>"; print_r($data);exit;
            //$businessArray = $this->getBussinessData($lastInsertedId );
            return response()->json(['Status'=>True,'StatusMessage'=>'Business add successfully']);
            }

        // echo "<pre>"; print_r($data);
        }
        catch(\Exception $e)
        {
            $error[] = $e;
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
        }
     }
    public function getBussinessData($businessId)
    {
        $BusinessData = BusinessModel::where('id', $businessId)->get()->toArray();
        $businessArray = array();
        if(count($BusinessData) > 0)
        {
            $businessArray['BuisnessType'] = $BusinessData[0]['type'];
            $businessArray['Name'] = $BusinessData[0]['name'];
            $businessArray['About'] = $BusinessData[0]['about'];
            $businessArray['Address'] = $BusinessData[0]['address'];
            $businessArray['Description'] = $BusinessData[0]['description'];
            $businessArray['SubDescription'] = $BusinessData[0]['sub_descrition'];
            $businessArray['SubDescription2'] = $BusinessData[0]['sub_description_1'];
            $businessArray['USPID'] = $BusinessData[0]['multiple_subcategory_id'];
            $businessArray['ActualPrice'] = $BusinessData[0]['actual_price'];
            $businessArray['SellingPrice'] = $BusinessData[0]['selling_price'];
            $businessArray['DisplayHours'] = $BusinessData[0]['display_hours'];
            $businessArray['PaymentMode'] = $BusinessData[0]['payment_mode'];
            $businessArray['ContactPersonName'] = $BusinessData[0]['contact_person_name'];
            $businessArray['MobileNumber'] = $BusinessData[0]['mobile_number'];
            $businessArray['EmailID'] = $BusinessData[0]['email_id'];

            $businessArray['Website'] = $BusinessData[0]['website'];
            $businessArray['UnitOption'] = $BusinessData[0]['unit_option'];
            $businessArray['ReferenceUrl'] = $BusinessData[0]['reference_url'];
            $businessArray['Syllabus'] = $BusinessData[0]['syllabus'];
            $businessArray['Status'] = $BusinessData[0]['status'];

        }
        return $businessArray;
    }

    public function listBusinessData(Request $request)
    {
        $input = $request->all();
        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;
        $IsFavourite = isset($request->IsFavourite) ? $request->IsFavourite : '';
        $userId = isset($request->RegisterId) ? $request->RegisterId : '';

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
            
            $LocationId = isset($request->LocationId) ? $request->LocationId : '';
            $LocationType = isset($request->LocationType) ? $request->LocationType : '';

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

            if(!empty($LocationId) && !empty($LocationType) && $LocationType!='country')
            {
                $query->where('business.cityid_or_countryid', $LocationId)->where('business.type_city_or_country', $LocationType);
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

        if(isset($IsFavourite) && !empty($IsFavourite) && (strtolower($IsFavourite) == 'Yes'))
        {
            $preQuery->join('business_favourite', 'business_favourite.user_id', '=', 'business.user_id');
        }
        /* count of all data*/
        $totalFilteredCount = $preQuery->count();

        /* fetch data*/

        if($Pagination==0)
        $listBusiness = $preQuery->get()->toArray();
        else
        $listBusiness = $preQuery->skip($skip)->take(30)->get()->toArray();

        $fetchAllTag = TagMasterModel::where('status','active')->get()->toArray();

        $j = 0;
        $locationData = array();
        $tagIdArray = array();

        $dataArray['TotalCount'] = $totalCount;
        $dataArray['FilteredCount'] = $totalFilteredCount;

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
        if($dataArray)
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'Business Data Listed Successfully','Result'=>$dataArray]);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>array()]);
        }
    }

    public function businessDetailData(Request $request)
    {
        $input = $request->all();
        $userId = isset($request->RegisterId) ? $request->RegisterId : '';

        if(!isset($request->ListId) || empty($request->ListId))
        {
            $error[] = 'ListId Must be Required!';
        }
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
        }
        $businessId = $request->ListId;
        $listBusiness = BusinessModel::where('business.status','active')
                ->where('business.id',$businessId)
                ->leftJoin('category', function ($join) {
                    $join->on('category.id', '=', 'business.category_id');
                })->select('business.*','category.name as category_name')->get()->toArray();

        $j = 0;
        $locationData = array();
        $tagIdArray = array();

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
                        $categoryData = CategoryModel::where('id',$businessData['multiple_subcategory_id'])->get()->toArray();
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
                $urlArray['URL'] = array();
                if(isset($businessData['media_file_json']) && !empty($businessData['media_file_json']))
                {
                    $mediaFileArray = json_decode($businessData['media_file_json'], true);
                    if(count($mediaFileArray) > 0)
                    {
                        $m = 1;
                        foreach($mediaFileArray as $mediaData)
                        {
                            $urlArray['URL'][] = !empty($mediaData['Media'.$m]) ? URL::to('/images/business').'/'.$mediaData['Media'.$m] : '';
                            $m++;
                        }
                    }
                }




                $relatedPersonUrlArray['URL'] = array();
                if(isset($businessData['realated_person_detail_json']) && !empty($businessData['realated_person_detail_json']))
                {
                    $relatedPersonDetailArray = json_decode($businessData['realated_person_detail_json'], true);
                    if(count($relatedPersonDetailArray) > 0)
                    {
                        $m = 1;
                        $r = 0;
                        foreach($relatedPersonDetailArray as $mediaData)
                        {
                            $relatedPersonUrlArray['URL'][$r]['Media'] = !empty($mediaData['RelatedPersonImage'.$m]) ? URL::to('/images/business_related_person').'/'.$mediaData['RelatedPersonImage'.$m] : '';
                            $relatedPersonUrlArray['URL'][$r]['Detail'] = !empty($mediaData['RelatedPersonDetail'.$m]) ? $mediaData['RelatedPersonDetail'.$m] : '';
                            $m++;
                            $r++;
                        }
                    }
                }

                $JobSalary = $JobExperience = $JobQualification = '';
                if(isset($businessData['job_detail_json']) && !empty($businessData['job_detail_json']))
                    $jobDetailArray = json_decode($businessData['job_detail_json'], true);
                if(count($jobDetailArray) > 0)
                {
                    $JobSalary = $jobDetailArray['JobSalary'];
                    $JobExperience = $jobDetailArray['JobExperience'];
                    $JobQualification = $jobDetailArray['JobQualification'];
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
                $dataArray['List'][$j]['About'] = !empty($businessData['about']) ? $businessData['about'] : '';
                $dataArray['List'][$j]['ContactPersonName'] = !empty($businessData['contact_person_name']) ? $businessData['contact_person_name'] : '';
                $dataArray['List'][$j]['MobileNumber'] =!empty($businessData['mobile_number']) ? (string)$businessData['mobile_number'] : '';
                $dataArray['List'][$j]['UnitOption'] = !empty($businessData['unit_option']) ? (string)$businessData['unit_option'] : '';
                $dataArray['List'][$j]['CategoryName'] = !empty($businessData['category_name']) ? $businessData['category_name'] : '';
                $dataArray['List'][$j]['SubCategoryName'] = $finalCategoryData;
                $dataArray['List'][$j]['DisplayHours'] = !empty($businessData['display_hours']) ? $businessData['display_hours'] : '';
                $dataArray['List'][$j]['Hours'] = $hoursArray;
                $dataArray['List'][$j]['Media'] = $urlArray;
                $dataArray['List'][$j]['Type'] = !empty($businessData['type']) ? $businessData['type'] : '';
                $dataArray['List'][$j]['Description'] = !empty($businessData['description']) ? $businessData['description'] : '';
                $dataArray['List'][$j]['SubDescription'] = !empty($businessData['sub_descrition']) ? $businessData['sub_descrition'] : '';
                $dataArray['List'][$j]['SubDescription1'] = !empty($businessData['sub_description_1']) ? $businessData['sub_description_1'] : '';
                $dataArray['List'][$j]['PaymentMode'] =!empty($businessData['payment_mode']) ? $businessData['payment_mode'] : '';
                $dataArray['List'][$j]['EmailId'] = !empty($businessData['email_id']) ? $businessData['email_id'] : '';
                $dataArray['List'][$j]['website'] = !empty($businessData['website']) ? $businessData['website'] : '';
                $dataArray['List'][$j]['JobSalary'] = !empty($JobSalary) ? $JobSalary : '';
                $dataArray['List'][$j]['JobExperience'] = !empty($JobExperience) ? $JobExperience : '';
                $dataArray['List'][$j]['JobQualification'] = !empty($JobQualification) ? $JobQualification : '';
                $dataArray['List'][$j]['ReferenceUrl'] =!empty($businessData['reference_url']) ? $businessData['reference_url'] : '';
                $dataArray['List'][$j]['Syllabus'] = !empty($businessData['syllabus']) ? $businessData['syllabus'] : '';
                $dataArray['List'][$j]['relatedPersonMedia'] =$relatedPersonUrlArray;
                $j++;
            }
            return response()->json(['Status'=>True,'StatusMessage'=>'Business Detail Listed Successfully','Result'=>$dataArray]);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>array()]);
        }
    }

    public function MyListings(Request $request)
    {
        $input = $request->all();
        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;
        $userId = isset($request->RegisterId) ? $request->RegisterId : '';

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
            $userId = isset($request->RegisterId) ? $request->RegisterId : '';

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
            if(isset($userId) && !empty($userId))
            {
                $query->where('business.user_id', $userId);
            }

        })->select('business.*','category.name as category_name');

        if(isset($IsFavourite) && !empty($IsFavourite) && (strtolower($IsFavourite) == 'yes'))
        {
            $preQuery->join('business_favourite', 'business_favourite.user_id', '=', 'business.user_id');
        }
        /* count of all data*/
        $totalFilteredCount = $preQuery->count();

        /* fetch data*/
        $listBusiness = $preQuery->skip($skip)->take(30)->get()->toArray();

        $fetchAllTag = TagMasterModel::where('status','active')->get()->toArray();

        $j = 0;
        $locationData = array();
        $tagIdArray = array();

        $dataArray['TotalCount'] = $totalCount;
        $dataArray['FilteredCount'] = $totalFilteredCount;

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
                $dataArray['List'][$j]['Media'] = $urlArray['URL'];
                $dataArray['List'][$j]['Address'] = !empty($businessData['address']) ? $businessData['address'] : '';
                $dataArray['List'][$j]['Date'] = date('d-m-Y', strtotime($businessData['created_at']));
                $dataArray['List'][$j]['Time'] = date('H:i:s', strtotime($businessData['created_at']));
                $dataArray['List'][$j]['ActuralPrice'] = !empty($businessData['actual_price']) ? (string)$businessData['actual_price'] : '';
                $dataArray['List'][$j]['SellingPrice'] = !empty($businessData['selling_price']) ? (string)$businessData['selling_price'] : '';
                $dataArray['List'][$j]['About'] = !empty($businessData['about']) ? (string)$businessData['about'] : '';
                $dataArray['List'][$j]['ContactPersonName'] = !empty($businessData['contact_person_name']) ? $businessData['contact_person_name'] : '';
                $dataArray['List'][$j]['MobileNumber'] =!empty($businessData['mobile_number']) ? (string)$businessData['mobile_number'] : '';
                $dataArray['List'][$j]['UnitOption'] = !empty($businessData['unit_option']) ? (string)$businessData['unit_option'] : '';

                $enquiryBusinessCounts=BusinessUserEnquiryModel::where('business_id',$businessData['id'])->where('user_id',$userId)->count();
                $dataArray['List'][$j]['EnquireCount'] =  (string)$enquiryBusinessCounts ;
                $j++;
            }
        }
        else
        {
            $dataArray['List'] = array();
        }
        if($dataArray)
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'MyListing Data Listed Successfully','Result'=>$dataArray]);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>array()]);
        }
    }

    public function userEnquireEnroll(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!isset($input['ListId']) || empty($input['ListId']))
        {
            $error[] = 'ListId Must be Required!';
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

        if(isset($input['ListId']) && !empty($input['ListId']))
        {
            $business=BusinessModel::where('id',$input['ListId'])->first();

            if($business===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Business record not exist!','Result'=>array()]);
            }
        }

        $status='';
        $statusMessage='';
        if(BusinessUserEnquiryModel::insert(['business_id'=>$input['ListId'],'user_id'=>$input['RegisterId']]))
        {
            $status=true;
            $statusMessage='User enquiry successfully !';
        }
        else
        {
            $status=false;
            $statusMessage='User enquiry not successfull !';
        }
        return response()->json(['Status'=>$status,'StatusMessage'=>$statusMessage,'Result'=>array()]);
    }


    public function getBusinessUserEnquiryList(Request $request)
    {
        $input=$request->all();

        /*
                $businessEnquiryData=BusinessUserEnquiryModel::with(['user','business'])
                ->where('business_id',$input['ListId'])->get()->toArray();*/

                /*$userBusinessEnquiryPreQuery=BusinessUserEnquiryModel::with(['user'])
                ->join('business',function($join){
                    $join->on('business_user_enquiry.business_id','=','business.id');
                });

                if(isset($input['ListId']) && !empty($input['ListId']))
                $userBusinessEnquiryPreQuery->where('business.id',$input['ListId']);

                $userBusinessEnquiryData= $userBusinessEnquiryPreQuery
                ->get()->toArray();
        */

        if(!isset($input['ListId']) || empty($input['ListId']))
        {
            $error[] = 'ListId Must be Required!';
        }

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(isset($input['ListId']) && !empty($input['ListId']))
        {
            $business=BusinessModel::where('id',$input['ListId'])->first();

            if($business===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Business record not exist!','Result'=>array()]);
            }
        }

        $userBusinessEnquiryPreQuery=BusinessUserEnquiryModel::with(['business','user'])
        ->where('business_user_enquiry.business_id',$input['ListId']);

        $businessEnquiryData=$userBusinessEnquiryPreQuery->get()->toArray();

        //print_r($businessEnquiryData);exit;

        $totalEnquiries=count($businessEnquiryData);

        $enquiryArray=array();

        if($totalEnquiries > 0)
        {
            for($i=0;$i<$totalEnquiries;$i++)
            {
                $user_image_path=public_path().'/images/user/'.$businessEnquiryData[$i]['user']['user_image'];

                if(file_exists($user_image_path))
                {
                    $userImage=URL::to('/images/user').'/'.$businessEnquiryData[$i]['user']['user_image'];
                }
                else
                {
                    $userImage='';
                }
                $enquiryArray[$i]['Id']=strval($businessEnquiryData[$i]['id']);
                $enquiryArray[$i]['Name']=!empty($businessEnquiryData[$i]['user']['name'])?$businessEnquiryData[$i]['user']['name']:'';
                $enquiryArray[$i]['UserImage']=$userImage;
                $enquiryArray[$i]['Address']=!empty($businessEnquiryData[$i]['user']['address'])?$businessEnquiryData[$i]['user']['address']:'';
                $enquiryArray[$i]['Email']=!empty($businessEnquiryData[$i]['user']['email'])?$businessEnquiryData[$i]['user']['email']:'';
                $enquiryArray[$i]['Date']=!empty($businessEnquiryData[$i]['created_at'])?date('d-m-Y',strtotime($businessEnquiryData[$i]['created_at'])):'';
                $enquiryArray[$i]['Time']=!empty($businessEnquiryData[$i]['created_at'])?date('H:i:s',strtotime($businessEnquiryData[$i]['created_at'])):'';
                $enquiryArray[$i]['ListingName']=!empty($businessEnquiryData[$i]['business']['name'])?$businessEnquiryData[$i]['business']['name']:'';

                $media_file_obj=$businessEnquiryData[$i]['business']['media_file_json'];
                $mediaArray=json_decode($media_file_obj,true);

                $businessImage='';

                if(count($mediaArray) > 0)
                {
                    $business_image_path=public_path().'/images/business/'.$mediaArray[0]['Media1'];

                    if(file_exists($business_image_path))
                    $businessImage= URL::to('/images/business').'/'.$mediaArray[0]['Media1'];
                    else
                    $businessImage='';
                }
                else
                {
                    $businessImage='';
                }

                $enquiryArray[$i]['ListingImage']=$businessImage;
            }
            return response()->json(['Status'=>true,'StatusMessage'=>'Get Business Enquiry Data successfully!','Result'=>$enquiryArray]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'No Data Available !','Result'=>array()]);
        }

    }

    public function addUserFavouriteBusiness(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
        }

        if(!isset($input['ListId']) || empty($input['ListId']))
        {
            $error[] = 'ListId Must be Required!';
        }

        if(!empty($error))
        {
            return response()->json(['Status'=>false,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {
            $user=User::where('id',$input['RegisterId'])->first();

            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
            }
        }

        if(isset($input['ListId']) && !empty($input['ListId']))
        {
            $business=BusinessModel::where('id',$input['ListId'])->first();

            if($business===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Business record not exist!','Result'=>array()]);
            }
        }

        if($business->status!='active')
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Business is inactive or deleted!','Result'=>array()]);
        }

        if($user->status!='active')
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'User is inactive or deleted!','Result'=>array()]);
        }

        if(BusinessFavouriteModel::where('user_id',$input['RegisterId'])->where('business_id',$input['ListId'])->exists())
        {
            $result=BusinessFavouriteModel::where('user_id',$input['RegisterId'])
            ->where('business_id',$input['ListId'])->delete();

            if($result)
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'User unfavourite business successfully !','Result'=>array()]);
            }
            else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'UnFavourite business changes not saved !','Result'=>array()]);
            }
        }
        else
        {
            $create=BusinessFavouriteModel::create([
                'user_id' => $input['RegisterId'],
                'business_id'=>$input['ListId'],
                'created_by'=>$input['RegisterId'],
                'last_updated_by'=>$input['RegisterId'],
                'status'=>'active'
            ]);

            if($create)
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'User added favourite business successfully !','Result'=>array()]);
            }
            else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Favourite business not added by user !','Result'=>array()]);
            }
        }
    }

    public function getBusinessProfile(Request $request)
    {
        $input=$request->all();
        
        if(!isset($input['UserId']) || empty($input['UserId']))
        {
            $error[] = 'UserId Must be Required!';
        }

        if(!empty($error))
        {
            return response()->json(['Status'=>false,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $user='';

        if(isset($input['UserId']) && !empty($input['UserId']))
        {
            $user=User::where('user.id',$input['UserId'])
            ->leftjoin('city as city','user.location_id','=','city.id')
            ->where('user.status','active')
            ->select('user.*','city.name as cityname')->first();

            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
            }
        }
        $dataArray=array();

        $dataArray['Id']=strval($user->id);
        $dataArray['Name']=!empty($user->name)?$user->name:'';
        $dataArray['MobileNumber']=!empty($user->mobile_number)?$user->mobile_number:'';
        $dataArray['Email']=!empty($user->email)?$user->email:'';

        $userImage='';
        if(!empty($user->user_image))
        {
            $userImagedestinationPath = public_path().'/images/user/'.$user->user_image;
                    
            if(file_exists($userImagedestinationPath))
            $userImage=URL::to('/images/user').'/'.$user->user_image;
        }

        $coverImage='';
        if(!empty($user->cover_image))
        {
            $coverImagedestinationPath = public_path().'/images/user/coverimage/'.$user->cover_image;
                    
            if(file_exists($coverImagedestinationPath))
            $coverImage=URL::to('/images/user/coverimage').'/'.$user->cover_image;
        }

        $dataArray['UserImage']=$userImage;
        $dataArray['CoverImage']=$coverImage;
        $dataArray['Bio']=!empty($user->bio)?$user->bio:'';
        $dataArray['Address']=!empty($user->address)?$user->address:'';

        $location='';

        if(!empty($user->location_type) && $user->location_type=='city')
        {
            $location=$user->cityname;
        }
        else
        {
            $location='Germany';
        }

        $dataArray['LocationName']=$location;

        $forumData=ForumModel::with('user')->where('user_id',$input['UserId'])->get()->toArray();
        $countForum=count($forumData);

        if($countForum > 0)
        {       
            for($i=0;$i<$countForum;$i++)
            {
                $dataArray['Forum'][$i]['Id']=strval($forumData[$i]['id']);
                $dataArray['Forum'][$i]['Id']=!empty($forumData[$i]['question'])?$forumData[$i]['question']:'';
                $dataArray['Forum'][$i]['ByUser']=!empty($forumData[$i]['user']['name'])?$forumData[$i]['user']['name']:'';

                $user_image='';
                if($forumData[$i]['user']['user_image'])
                {
                    $user_image_path=public_path().'/images/user/'.$forumData[$i]['user']['user_image'];

                    if(file_exists($user_image_path))
                    $user_image=URL::to('/images/user').'/'.$forumData[$i]['user']['user_image'];
                }
                $dataArray['Forum'][$i]['ByUserImage']=$user_image;
                
                $forum_id=$forumData[$i]['id'];

                $forumComment=ForumCommentReplyModel::latest()->where('forum_id',$forum_id)
                ->where('is_deleted',0)
                ->where('comment_id',0)->get()->toArray();

                $dataArray['Forum'][$i]['TotalComments']=strval(count($forumComment));

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
                        $dataArray['Forum'][$i]['CommentImage'.($m+1)]=URL::to('/images/user').'/'.$userCommentImages[$m]['user_image'];
                        else
                        $dataArray['Forum'][$i]['CommentImage'.($m+1)]='';
                    }

                    if(!empty($userIdArray) && count($userIdArray)==2 && $userIdArray[0]==$userIdArray[1])
                    {
                        $dataArray['Forum'][$i]['CommentImage2']=$dataArray['Forum'][$i]['CommentImage1'];
                    }
                }
                else
                {
                    $dataArray['Forum'][$i]['CommentImage1']='';
                    $dataArray['Forum'][$i]['CommentImage2']='';
                }

                $dataArray['Forum'][$i]['Date']=date('d-m-Y',strtotime($forumData[$i]['created_at']));
                $dataArray['Forum'][$i]['Time']=date('H:i:s',strtotime($forumData[$i]['created_at']));
            }
        }
        else
        {
            $dataArray['Forum']=array();
        }

        $faqData=FAQModel::where('user_id',$input['UserId'])->get()->toArray();

        
        if(count($faqData) > 0)
        {
            $faq_count=count($faqData);
            for($i=0;$i<$faq_count;$i++)
            {
                $dataArray['FAQ']['List'][$i]['Id']=$faqData[$i]['id'];
                $dataArray['FAQ']['List'][$i]['Tags']=$faqData[$i]['tags'];
                $dataArray['FAQ']['List'][$i]['Question']=$faqData[$i]['question'];
                $dataArray['FAQ']['List'][$i]['Answer']=$faqData[$i]['answer'];
                $dataArray['FAQ']['List'][$i]['Date']=date('d-m-Y',strtotime($faqData[$i]['created_at']));
                $dataArray['FAQ']['List'][$i]['Time']=date('H:i:s',strtotime($faqData[$i]['created_at']));
            }
        }
        else
        {
            $dataArray['FAQ']['List']=array();
        }

        $tagsData=TagFAQMasterModel::get()->toArray();
        
        $tag_count=count($tagsData);

        if($tag_count > 0)
        {
            for($j=0;$j<$tag_count;$j++)
            {
                $dataArray['FAQ']['Tags'][$j]['Id']=$tagsData[$j]['id'];
                $dataArray['FAQ']['Tags'][$j]['Name']=$tagsData[$j]['name'];
            }
        }
        else
        {
            $dataArray['FAQ']['Tags']=array();
        }

        $userId=$input['UserId'];

        $Pagination = isset($input['Pagination']) ? $input['Pagination'] : 1;
    	$skip = (($Pagination - 1) * 30) ;

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
            $UserId = isset($request->UserId) ? $request->UserId : '';

            if(isset($UserId) && !empty($UserId))
            {
                $query->where('business.user_id', $UserId);
            }
        })->select('business.*','category.name as category_name');
        
        $totalFilteredCount = $preQuery->count();

        /* fetch data*/

        if($Pagination==0)
        $listBusiness = $preQuery->get()->toArray();
        else
        $listBusiness = $preQuery->skip($skip)->take(30)->get()->toArray();

        $fetchAllTag = TagMasterModel::where('status','active')->get()->toArray();
        $j = 0;
        $locationData = array();
        $tagIdArray = array();

        $dataArray['Service']['TotalCount'] = $totalCount;
        $dataArray['Service']['FilteredCount'] = $totalFilteredCount;

        if(count($fetchAllTag) > 0)
        {
            $t = 0;
            foreach($fetchAllTag as $tagData)
            {
                $dataArray['Service']['ApprovedFeaturesOrTags'][$t]['id'] = $tagData['id'];
                $dataArray['Service']['ApprovedFeaturesOrTags'][$t]['name'] = $tagData['name'];
                $t++;
            }
        }
        else
        {
            $dataArray['Service']['ApprovedFeaturesOrTags'] = array();
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
                $dataArray['Service']['List'][$j]['Id'] = (string)$businessData['id'];
                $dataArray['Service']['List'][$j]['Name'] = $businessData['name'];
                $dataArray['Service']['List'][$j]['FeatureorTag'] = $finalTagData;
                $dataArray['Service']['List'][$j]['isFavourite'] = $isFavourite;
                $dataArray['Service']['List'][$j]['Address'] = !empty($businessData['address']) ? $businessData['address'] : '';
                $dataArray['Service']['List'][$j]['Date'] = date('d-m-Y', strtotime($businessData['created_at']));
                $dataArray['Service']['List'][$j]['Time'] = date('H:i:s', strtotime($businessData['created_at']));
                $dataArray['Service']['List'][$j]['ActuralPrice'] = !empty($businessData['actual_price']) ? (string)$businessData['actual_price'] : '';
                $dataArray['Service']['List'][$j]['SellingPrice'] = !empty($businessData['selling_price']) ? (string)$businessData['selling_price'] : '';
                $dataArray['Service']['List'][$j]['About'] = !empty($businessData['about']) ? (string)$businessData['about'] : '';
                $dataArray['Service']['List'][$j]['ContactPersonName'] = !empty($businessData['contact_person_name']) ? $businessData['contact_person_name'] : '';
                $dataArray['Service']['List'][$j]['MobileNumber'] =!empty($businessData['mobile_number']) ? (string)$businessData['mobile_number'] : '';
                $dataArray['Service']['List'][$j]['UnitOption'] = !empty($businessData['unit_option']) ? (string)$businessData['unit_option'] : '';
                $dataArray['Service']['List'][$j]['CategoryName'] = !empty($businessData['category_name']) ? $businessData['category_name'] : '';
                $dataArray['Service']['List'][$j]['SubCategoryName'] = $finalCategoryData;
                $dataArray['Service']['List'][$j]['DisplayHours'] = !empty($businessData['display_hours']) ? $businessData['display_hours'] : '';
                $dataArray['Service']['List'][$j]['Hours'] = $hoursArray;
                $dataArray['Service']['List'][$j]['Media'] = $urlArray;
                $j++;
            }
        }
        else
        {
            $dataArray['List'] = array();
        }

        return response()->json(['Status'=>true,'StatusMessage'=>'Get Business Profile successfully !','Result'=>$dataArray]);
    }

    public function getBusinessesCategoryWise(Request $request)
    {
        $input=$request->all();
        if(!isset($input['catagoryId']) && empty($input['catagoryId']))
        {
            $error[] = 'CategoryId Must be Required!';
        }

        if(!empty($error))
        {
            return response()->json(['Status'=>false,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $businessArr=BusinessModel::where('category_id',$input['catagoryId'])->select('id','name')->get()->toArray();
        if(count($businessArr) > 0)
        {
            return response()->json(['Status'=>true,'StatusMessage'=>'Get business categorywise successfully !','Result'=>$businessArr]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'No Data available !','Result'=>array()]);
        }
    }
    public function getCategoryWiseBusinessData(Request $request)
    {
        $categoryData=CategoryModel::where('parent_category_id',0)->where('redirect_status',0)->get()->toArray();
        $finalBusinessData = array();
        if(count($categoryData) > 0)
        {
            foreach($categoryData as $catData)
            {
                $categoryId = $catData['id'];
                $categoryName = $catData['name'];
                $categoryParamLink = $catData['param_link'];
                
                $listBusiness = BusinessModel::where('business.status','active')->select('business.*')
                ->where('business.category_id',$categoryId)
                ->skip(0)->take(10)
                ->orderBy('business.id','DESC')
                ->get()->toArray();
                
                $finalBusinessData += [$categoryName => $listBusiness]; 
            }
        }
        //echo "<pre>"; print_r($finalBusinessData);
        //s exit;
        return view('frontend.listing_structure.categoryWiseBusinessListStructure',compact('finalBusinessData'));
    }
}




























