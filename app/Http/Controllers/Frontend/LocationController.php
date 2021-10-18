<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\CitysModel;
use App\Http\Model\CountrysModel;
use App\Http\Model\UserModel;
use App\Http\Traits\UserLocationDetailTrait;
use Illuminate\Support\Facades\Session;

class LocationController extends Controller
{
    use UserLocationDetailTrait;

    public function getAllLocationData(Request $request)
    {
        $countryData = CountrysModel::where('id',  '>', '0')->where('status','active')->get()->toArray();

        $cityData = CitysModel::where('id',  '>', '0')->where('type','city')->where('status','active')->get()->toArray();
        $j = 0;
        $locationData = array();
        if(count($countryData) > 0)
        {
            foreach($countryData as $data)
            {
                $locationData[$j]['Id']= (string)$data['id'];
                $locationData[$j]['Type']= 'country';
                $locationData[$j]['Number']= '+49 30 25795303';
                $locationData[$j]['Name']= $data['name'];
                $j++;
            }
        }
        if(count($cityData) > 0)
        {
            foreach($cityData as $data)
            {
                $locationData[$j]['Id']= (string)$data['id'];
                $locationData[$j]['Type']= $data['type'];
                $locationData[$j]['Number']= '+49 30 25795303';
                $locationData[$j]['Name']= $data['name'];
                $j++;
            }

        }
        if(count($locationData) > 0)
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'Success Message','Result'=>$locationData]);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>array()]);
        }
    }

    public function updateLocation(Request $request)
    {
        $input=$request->all();
   
        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}
        if(!isset($input['LocationId']) || empty($input['LocationId']))
        {
            $error[] = 'LocationId Must be Required!';
		}

        if(!isset($input['Type']) || empty($input['Type']))
        {
            $error[] = 'Type Must be Required!';
		}
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $location = UserModel::where('id',$input['RegisterId'])->update([
            'location_id' => $input['LocationId'],
            'location_type'=>$input['Type']
        ]);
        
        $userLocationData=$this->getUserLocationData();
        Session::put('user', $userLocationData);
        
        if ($location) {
            return response()->json(['Status'=>True,'StatusMessage'=>'Location Updated Successfully','userLocation'=> $userLocationData]);
        } else {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available']);
        }
    }
}
