<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\CountrysModel;
use App\Http\Model\BusinessModel;
use App\Http\Model\CategoryModel;
use App\Http\Model\TagMasterModel;
use App\Http\Model\BusinessFavouriteModel;


use Carbon\Carbon;
use DataTables;
use URL;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
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
            return response()->json(['Status'=>False,'StatusMessage'=>$error,'Result'=>array()]);
		}
        /* media file code start here */
        $destinationPath = public_path().'/images/business/';
        $mediaFileArray = array();

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
            $mediaJson = json_encode($mediaFileArray,JSON_FORCE_OBJECT);
        else
            $mediaJson = '{}';
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
        $DisplayMon = !empty($request->DisplayMon) ? $request->DisplayMon : "";
        $DisplayTue = !empty($request->DisplayTue) ? $request->DisplayTue : "";
        $DisplayWed = !empty($request->DisplayWed) ? $request->DisplayWed : "";
        $DisplayThur = !empty($request->DisplayThur) ? $request->DisplayThur : "";
        $DisplayFri = !empty($request->DisplayFri) ? $request->DisplayFri : "";
        $DisplaySat = !empty($request->DisplaySat) ? $request->DisplaySat : "";
        $DisplaySun = !empty($request->DisplaySun) ? $request->DisplaySun : "";

        $hoursJson = array("DisplayMon"=>$DisplayMon,"DisplayTue"=>$DisplayTue,"DisplayWed"=>$DisplayWed,"DisplayThur"=>$DisplayThur,"DisplayFri"=>$DisplayFri,"DisplaySat"=>$DisplaySat,"DisplaySun"=>$DisplaySun);
        if(isset($hoursJson) && !empty($hoursJson))
            $jsonHoureData = json_encode($hoursJson,JSON_FORCE_OBJECT);
        else
            $jsonHoureData = '{}';
        /* hours code end here */

        /* job code start here*/
        $JobQualification = !empty($request->JobQualification) ? $request->JobQualification : "";
        $JobSalary = !empty($request->JobSalary) ? $request->JobSalary : "";
        $JobExperience =!empty($request->JobExperience) ? $request->JobExperience : "";

        $jobDetailJson = array("JobQualification"=>$JobQualification,"JobSalary"=>$JobSalary,"JobExperience"=>$JobExperience);
        if(isset($jobDetailJson) && !empty($jobDetailJson))
            $jsonJobData = json_encode($jobDetailJson,JSON_FORCE_OBJECT);
        else
            $jsonJobData = '{}';
        /* job code end here*/


        /* relatedPersonDataJson file code start here */
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
            $relatedPersonDataJson = json_encode($relatedPersonDataArray,JSON_FORCE_OBJECT);
        else
            $relatedPersonDataJson = '{}';
        /* relatedPersonDataJson file code end here */
        try
        {
            if(isset($input['BusinessId']) && !empty($input['BusinessId']))
            {
                $data = BusinessModel::find($request->BusinessId);
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
                $data->status = 'active';
                $data->save();
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
            return response()->json(['Status'=>False,'StatusMessage'=>$error,'Result'=>array()]);
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
                        $urlArray['URL'][] = !empty($mediaData['Media'.$m]) ? URL::to('/public/images/business').'/'.$mediaData['Media'.$m] : '';
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
            return response()->json(['Status'=>False,'StatusMessage'=>$error,'Result'=>array()]);
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
                $urlArray['URL'] = array();
                if(isset($businessData['media_file_json']) && !empty($businessData['media_file_json']))
                {
                    $mediaFileArray = json_decode($businessData['media_file_json'], true);
                    if(count($mediaFileArray) > 0)
                    {
                        $m = 1;
                        foreach($mediaFileArray as $mediaData)
                        {
                            $urlArray['URL'][] = !empty($mediaData['Media'.$m]) ? URL::to('/public/images/business').'/'.$mediaData['Media'.$m] : '';
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
                            $relatedPersonUrlArray['URL'][$r]['Media'] = !empty($mediaData['RelatedPersonDetail'.$m]) ? $mediaData['RelatedPersonDetail'.$m] : '';
                            $relatedPersonUrlArray['URL'][$r]['Detail'] = !empty($mediaData['RelatedPersonImage'.$m]) ? URL::to('/public/images/business_related_person').'/'.$mediaData['RelatedPersonImage'.$m] : '';
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
}




























