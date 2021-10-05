<?php

namespace App\Http\Controllers;

use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\UserModel;
use App\Http\Model\JobApplyModel;



use Auth;

class JobApplyController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('jobapply.index');
    }

    public function create()
    {
        $user=UserModel::where('status','!=','deleted')->get();

        return view('jobapply.create',compact('user'));
    }

    public function store(Request $request)
    {
        $input=$request->all();

        // echo "<pre>";
        // print_r($input);
        // exit;
        if(isset($input['status']))
        {
            if($input['status'] == 'on')
            {
                $status = 'active';
            }
            else
            {
                $status = 'inactive';
            }
        }
        else
        {
            $status = 'inactive';
        }

        $imageName = '';
        $destinationPath = public_path().'/images/job_apply/';
        if ($coverletter = $request->file('cover_letter'))
        {
            $imageName = md5(time() . '_' . $coverletter->getClientOriginalName()) . '.' . $coverletter->getClientOriginalExtension();

            $coverletter->move($destinationPath, $imageName);
        }

        // dd($imageName);

        $resumeName = '';
        $destinationPath = public_path().'/images/job_apply/';
        if ($resume = $request->file('resume'))
        {
            $resumeName = md5(time() . '_' . $resume->getClientOriginalName()) . '.' . $resume->getClientOriginalExtension();

            $resume->move($destinationPath, $resumeName);
        }

        // dd($resumeName);
        // $userID = $request->user_id;

        $obj=new JobApplyModel();
        $obj->job_id = '1';
        $obj->user_id = $input['user_id'];
        $obj->full_name = $input['full_name'];
        $obj->email = $input['email'];
        $obj->mobile_number	 = $input['mobile_number'];
        $obj->skill	 = $input['skill'];
        $obj->subject = $input['subject'];
        $obj->message = $input['message'];
        $obj->cover_letter = $imageName;
        $obj->resume = $resumeName;
        $obj->status = $status;
        $obj->save();
// dd($obj);
        if($obj)
        {
            return view('jobapply.index')->with('success','job apply has been added successfully!');
        }
        else
        {
            return view('jobapply.index')->with('error','job apply has not been added!');
        }
    }

    public function jobapplyList()
    {
        $result_obj = JobApplyModel::where('apply_for_job.status', '!=', 'deleted')->get();

        return DataTables::of($result_obj)

        ->addColumn('full_name', function ($result_obj)
        {
            $full_name = '';
            $full_name = ucwords($result_obj->full_name);
            return $full_name;
        })
        ->addColumn('email',function($result_obj){
            $email = '';
            $email = ucwords($result_obj->email);
            return $email;
        })
        ->addColumn('skill',function($result_obj){
            $skill = '';
            $skill = ucwords($result_obj->skill);
            return $skill;
        })
        ->addColumn('subject',function($result_obj){
            $subject = '';
            $subject = $result_obj->subject;
            return $subject;
        })
        ->addColumn('status_td',function($result_obj){
            $status = '';
            if($result_obj->status=='active')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $status.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $status;
        })

        ->addColumn('command',function($result_obj){
            $command = '';

            $command.='<div class="btn-group dropleft">
            <button type="button"
                class="btn dropdown-toggle dropdown-toggle-split btn-sm three_part_saction"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href=" '.route('jobapply.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="javascript:;" onclick="deleteJobApply('.$result_obj['id'].')" >Delete Record</a>

            </div>';
            return $command;
        })
        ->rawColumns(['full_name','email','skill','subject','status_td','command'])
        ->make(true);
    }


    public function edit($id)
    {
        $row = JobApplyModel::where('id', $id)->first()->toArray();

        $userData=UserModel::select('id','name')->get();

        return view('jobapply.edit', compact('row','userData'));

    }



    public function update(Request $request,$id)
    {
        $input=$request->all();
        // echo "<pre>";
        // print_r($input);
        // exit;
        if(isset($input['status']))
        {
            if($input['status'] == 'on')
            {
                $status = 'active';
            }
            else
            {
                $status = 'inactive';
            }
        }
        else
        {
            $status = 'inactive';
        }

        $imageName = '';
        $destinationPath = public_path().'/images/job_apply/';
        if ($coverletter = $request->file('cover_letter'))
        {
            $imageName = md5(time() . '_' . $coverletter->getClientOriginalName()) . '.' . $coverletter->getClientOriginalExtension();

            $coverletter->move($destinationPath, $imageName);
        }
        else{
            if(isset($input['hdnCoverLetter']) && !empty($input['hdnCoverLetter']))
                $imageName = $input['hdnCoverLetter'];
            }

        $resumeName = '';
        $destinationPath = public_path().'/images/job_apply/';
        if ($resume = $request->file('resume'))
        {
            $resumeName = md5(time() . '_' . $resume->getClientOriginalName()) . '.' . $resume->getClientOriginalExtension();

            $resume->move($destinationPath, $resumeName);
        }
        else{
                if(isset($input['hdnResume']) && !empty($input['hdnResume']))
                    $resumeName = $input['hdnResume'];
        }
        // $userID = $request->user_id;
        $obj= JobApplyModel::find($id);
        $obj->job_id = '1';
        $obj->user_id = $input['user_id'];
        $obj->full_name = $input['full_name'];
        $obj->email = $input['email'];
        $obj->mobile_number	 = $input['mobile_number'];
        $obj->skill	 = $input['skill'];
        $obj->subject = $input['subject'];
        $obj->message = $input['message'];
        $obj->cover_letter = $imageName;
        $obj->resume = $resumeName;
        $obj->status = $status;
        $obj->save();
// dd($obj);
        if($obj)
        {
            return redirect()->route('jobapply')->with('success','job apply has been added successfully!');
        }
        else
        {
            return redirect()->route('jobapply.edit')->with('error','job apply has not been added!');
        }
    }
    public function delete($id){
        $delete = JobApplyModel::where('id',$id)->update(['status'=>'deleted']);
        if($delete){
            return redirect()->route('jobapply');
        }else{
            return redirect()->route('jobapply');
        }
    }
}
