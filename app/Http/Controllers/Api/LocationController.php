<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\CountrysModel;
use App\Http\Model\CitysModel;
use App\Http\Model\LocationModel;
use App\User;

use Carbon\Carbon;
use DataTables;


use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getAllLocationData()
    {
        $countryData = CountrysModel::where('id',  '>', '0')->where('status','active')->get()->toArray();

        $cityData = CitysModel::where('id',  '>', '0')->where('type','city')->where('status','active')->get()->toArray();
        //echo "<pre>"; print_r($cityData);
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

        $location = User::where('id',$input['RegisterId'])->update([
            'location_id' => $input['LocationId'],
            'location_type'=>$input['Type']
        ]);
        if($location)
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'Location Updated Successfully']);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available']);
        }
    }

 }
