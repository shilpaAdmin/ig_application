<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\CarrierModel;
use App\Http\Model\JobApplyModel;
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

    public function applyForCareer(Request $request)
    {
        $input=$request->all();
        
        if(!isset($input['Name']) || empty($input['Name']))
        {
            $error[] = 'Name Must be Required!';
        }

        if(!isset($input['Number']) || empty($input['Number']))
        {
            $error[] = 'Number Must be Required!';
        }

        if(!isset($input['Email']) || empty($input['Email']))
        {
            $error[] = 'Email Must be Required!';
        }
        
        if(!isset($input['Skill']) || empty($input['Skill']))
        {
            $error[] = 'Skill Must be Required!';
        }

        if(!isset($input['Subject']) || empty($input['Subject']))
        {
            $error[] = 'Subject Must be Required!';
        }

        if(!isset($input['Message']) || empty($input['Message']))
        {
            $error[] = 'Message Must be Required!';
        }

        if(!isset($input['CoverLetter']) || empty($input['CoverLetter']))
        {
            $error[] = 'CoverLetter Must be Required!';
        }

        if(!isset($input['Resume']) || empty($input['Resume']))
        {
            $error[] = 'Resume Must be Required!';
        }
        
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        //$obj=new CarrierModel;
        $obj=new JobApplyModel;

        if(isset($input['Name']))
        $obj->full_name=$input['Name'];

        if(isset($input['Number']))
        $obj->mobile_number=$input['Number'];

        if(isset($input['Email']))
        $obj->email=$input['Email'];
        
        if(isset($input['Skill']))
        $obj->skill=$input['Skill'];

        if(isset($input['Subject']))
        $obj->subject=$input['Subject'];

        if(isset($input['Message']))
        $obj->message=$input['Message'];

        if(isset($input['CareerId']))
        $obj->career_id=$input['CareerId'];
        
        if(isset($input['RegisterId']))
        $obj->user_id=$input['RegisterId'];

        $imageName = '';
        $destinationPath = public_path().'/images/job_apply/';

        if ($coverletter = $request->file('CoverLetter'))
        {
            $imageName = md5(time() . '_' . $coverletter->getClientOriginalName()) . '.' . $coverletter->getClientOriginalExtension();

            $coverletter->move($destinationPath, $imageName);
            $obj->cover_letter=$imageName;
        }

        $resumeName = '';
        if ($resume = $request->file('Resume'))
        {
            $resumeName = md5(time() . '_' . $resume->getClientOriginalName()) . '.' . $resume->getClientOriginalExtension();

            $resume->move($destinationPath, $resumeName);
            $obj->resume=$resumeName;
        }

        if($obj->save())
        {
            return response()->json(['Status'=>true,'StatusMessage'=>'Career applied successfully !','Result'=>array()]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Career not applied !','Result'=>array()]);
        }
    }
}

