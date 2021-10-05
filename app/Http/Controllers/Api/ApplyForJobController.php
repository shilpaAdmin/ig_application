<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\MatrimonialModel;
use App\Http\Model\MatrimonialEducationModel;
use App\Http\Model\MatrimonialMediaModel;
use App\Http\Model\JobApplyModel;


use App\User;

use URL;
use Illuminate\Http\Request;
use Exception;

class ApplyForJobController extends Controller
{

    public function storeAllJobData(Request $request)
    {

        $input=$request->all();
        // echo "<pre>";
        // print_r($input);
        // exit;

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}
        if(!isset($input['name']) || empty($input['name']))
        {
            $error[] = 'name Must be Required!';
		}
        if(!isset($input['number']) || empty($input['number']))
        {
            $error[] = 'number Must be Required!';
		}
        if(!isset($input['email']) || empty($input['email']))
        {
            $error[] = 'email Must be Required!';
		}
        if(!isset($input['skill']) || empty($input['skill']))
        {
            $error[] = 'skill Must be Required!';
		}
        if(!isset($input['subject']) || empty($input['subject']))
        {
            $error[] = 'subject Must be Required!';
		}
        if(!isset($input['coverLetter']) || empty($input['coverLetter']))
        {
            $error[] = 'coverLetter Must be Required!';
		}

        if(!isset($input['Resume']) || empty($input['Resume']))
        {
            $error[] = 'Resume Must be Required!';
		}
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

 
        $imageName = '';
        $destinationPath = public_path().'/images/job_apply/';
        if ($coverletter = $request->file('coverLetter'))
        {
            $imageName = md5(time() . '_' . $coverletter->getClientOriginalName()) . '.' . $coverletter->getClientOriginalExtension();

            $coverletter->move($destinationPath, $imageName);
        }

        $resumeName = '';
        $destinationPath = public_path().'/images/job_apply/';
        if ($resume = $request->file('Resume'))
        {
            $resumeName = md5(time() . '_' . $resume->getClientOriginalName()) . '.' . $resume->getClientOriginalExtension();

            $resume->move($destinationPath, $resumeName);
        }
        $data = new JobApplyModel();
        $data->user_id	 =!empty($request->RegisterId) ? $request->RegisterId : "";
        $data->full_name =!empty($request->name) ? $request->name : "";
        $data->mobile_number = !empty($request->number) ? $request->number : "";

        $data->email	 =!empty($request->email) ? $request->email : "";
        $data->skill =!empty($request->skill) ? $request->skill : "";
        $data->subject = !empty($request->subject) ? $request->subject : "";

        $data->message =!empty($request->message) ? $request->message : "";
        $data->cover_letter	 =!empty($imageName) ? $imageName : "";
        $data->resume = !empty($resumeName) ? $resumeName : "";
        $data->status = 'active';
        $data->save();

        return response()->json(['Status'=>True,'StatusMessage'=>'Job Apply add successfully']);


    }


}
