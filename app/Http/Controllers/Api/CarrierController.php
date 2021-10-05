<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\CarrierModel;
use App\User;
use URL;
use Illuminate\Http\Request;
use Exception;

class CarrierController extends Controller
{

    public function CarrierList(Request $request)
    {
        $carrierListData = CarrierModel::where('status','!=', 'deleted')->select('id','type','name','description')->get()->toArray();
        // echo "<pre>";
        // print_r($carrierListData);
        // exit;

        if(count($carrierListData) > 0)
        {
            return response()->json(['Status'=>True,'StatusMessage'=>'Success Message','Result'=>$carrierListData]);
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>array()]);
        }
    }
}

