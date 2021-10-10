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
        // if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        // {
        //     $error[] = 'RegisterId Must be Required!';
		// }
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

        // dd($imageName);


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

    public function getApplyJobList(Request $request)
    {
        
        $input=$request->all();
        
        if(!isset($input['JobID']) || empty($input['JobID']))
        {
            $error[] = 'JobID Must be Required!';
		}
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}
        
        $jobId = $input['JobID'];
    
        if(isset($jobId) && !empty($jobId)) {
            $applyForJob =JobApplyModel::select('apply_for_job.*','business.name as business_name','business.media_file_json','user.user_image','user.name as user_name')
                                ->leftJoin('user','user.id','=','apply_for_job.user_id')
                                ->leftJoin('business','business.id','=','apply_for_job.job_id')
                                ->where('apply_for_job.job_id','=',$jobId)
                                ->get();
        } else {
            $applyForJob =JobApplyModel::select('apply_for_job.*','business.name as business_name','business.media_file_json','user.user_image','user.name as user_name')
                        ->leftJoin('user','user.id','=','apply_for_job.user_id')
                        ->lejftJoin('business','business.id','=','apply_for_job.job_id')
                        ->get();
        }
        $applyForJob_Obj = $applyForJob->toArray();
        $applyForJob_count=count($applyForJob_Obj);

        $ApplyForJobArray=array();
        if($applyForJob_count > 0) {
            for($i=0;$i<$applyForJob_count;$i++)
            {
                $ApplyForJobArray[$i]['Id']=strval($applyForJob_Obj[$i]['id']);
                $ApplyForJobArray[$i]['UserId']=strval($applyForJob_Obj[$i]['id']);
                $ApplyForJobArray[$i]['UserName']=strval($applyForJob_Obj[$i]['user_name']);

                $ApplyForJobArray[$i]['CoverLetter']='';
                $ApplyForJobArray[$i]['Resume']='';

                $ApplyForJobArray[$i]['UserImage']='';
                $userImage=strval($applyForJob_Obj[$i]['user_image']);
                if( isset( $userImage)) {
                    $ApplyForJobArray[$i]['UserImage'] = URL::to('/images/user').'/'.strval($applyForJob_Obj[$i]['user_image']);
                }
               
                $cover=strval($applyForJob_Obj[$i]['cover_letter']);
                if( isset( $cover)) {
                    $ApplyForJobArray[$i]['CoverLetter'] = URL::to('/images/job_apply').'/'.strval($applyForJob_Obj[$i]['cover_letter']);
                }

                $resume=strval($applyForJob_Obj[$i]['resume']);
                if( isset( $resume)) {
                    $ApplyForJobArray[$i]['Resume'] = URL::to('/images/job_apply').'/'.strval($applyForJob_Obj[$i]['resume']);
                }

                $ApplyForJobArray[$i]['JobTitle']=strval($applyForJob_Obj[$i]['business_name']);
                $ApplyForJobArray[$i]['Name']=strval($applyForJob_Obj[$i]['full_name']);
                $ApplyForJobArray[$i]['Number']=strval($applyForJob_Obj[$i]['mobile_number']);
                $ApplyForJobArray[$i]['Email']=strval($applyForJob_Obj[$i]['email']);
                $ApplyForJobArray[$i]['Skill']=strval($applyForJob_Obj[$i]['skill']);
                $ApplyForJobArray[$i]['Subject']=strval($applyForJob_Obj[$i]['subject']);
                $ApplyForJobArray[$i]['Message']=strval($applyForJob_Obj[$i]['message']);

                $applyjob_media_arr=json_decode($applyForJob_Obj[$i]['media_file_json'],true);
                $media1='';
                if(!empty($applyjob_media_arr))
                {
                    if(isset($applyjob_media_arr[0]['Media1']) && file_exists(public_path().'/images/matrimonial/media/'.$applyjob_media_arr[0]['Media1']))
                    $media1=$applyjob_media_arr[0]['Media1'];
                }
                $ApplyForJobArray[$i]['JobImage']=!empty($media1)?URL::to('/images/business').'/'.$media1:'';
            }
            return response()->json(['Status'=>true,'StatusMessage'=>'Apply Job  List successfully !','Result'=>[$ApplyForJobArray]]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'No Data available !','Result'=>[]]);
        }
        
    }
}
