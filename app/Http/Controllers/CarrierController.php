<?php

namespace App\Http\Controllers;

use App\Http\Model\BlogsModel;
use App\Http\Model\BusinessModel;
use App\Http\Model\CarrierModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\UserModel;
use App\Http\Model\ForumModel;
use App\Http\Model\JobApplyModel;

use Auth;

class CarrierController extends Controller
{
    var $counter = 1;
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

        return view('carrier.create');
    }

    // public function create()
    // {
    //     $users=UserModel::where('status','!=','deleted')->pluck('name','id');

    //     return view('blog.create',compact('users'));
    // }

    public function store(Request $request)
    {
        $input=$request->all();
        // echo "<pre>";
        // print_r($input);
        //exit;

        if(isset($input['hdnCarrierId']) && !empty($input['hdnCarrierId']))
        {
            $data = CarrierModel::find($request->hdnCarrierId);
            // dd($data);
            $data->type = $request->type;
            $data->name = $request->name;
            $data->description = $request->description;
            // $data->status=$status;
            $data->save();

        }
        else{

            $data = new CarrierModel();
            $data->type = $request->type;
            $data->name = $request->name;
            $data->description = $request->description;
            // $data->status=$status;
            $data->save();
        }
        return redirect()->action('CarrierController@index');
     }

    public function carrierList(Request $request)
    {
        $input = $request->all();
        $txtStatusType = isset($request->status) ? $request->status : '';

        $preQuery = CarrierModel::where('carrier.status', '!=', 'deleted');

        if(isset($txtStatusType) && !empty($txtStatusType))
        {
            $result_obj= $preQuery->where('carrier.status',$txtStatusType);

        }
        $result_obj= $preQuery->get();

        return DataTables::of($result_obj)

        ->addColumn('id', function ($result_obj) {
            $counters = $this->counter++;
            $id = '<div><span>' . $counters . '</span></div>';
            return $id;
        })
        ->addColumn('type', function ($result_obj)
        {
            $type = '';
            $type = ucwords($result_obj->type);
            return $type;
        })
        ->addColumn('name', function ($result_obj)
        {
            $name = '';
            $name = ucwords($result_obj->name);
            return $name;
        })
        ->addColumn('description',function($result_obj){
            $description = '';
            $description = $result_obj->description;
            return $description;
        })
        ->addColumn('applicant',function($result_obj){
            $applicant = '';
            return '<a href="javascript:;" onclick="openJobDetailPopup('.$result_obj['id'].')" class="undar_line desc" id="'.$result_obj['id'].'" data-toggle="modal" data-target=".bs-example-modal-center" class="btn btn-primary waves-effect btn-label waves-light">Applicant</a>';
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
                <a class="dropdown-item" href="javascript:;" onclick="getEditData('.$result_obj['id'].')">Edit Record</a>
                <a class="dropdown-item" href="javascript:;" onclick="deleteCarrierData('.$result_obj['id'].')" >Delete Record</a>

            </div>';
            return $command;
        })
        ->rawColumns(['type','name','description','applicant','status_td','command'])
        ->make(true);
    }


    public function edit($id)
    {
        $row = CarrierModel::where('id', $id)->first()->toArray();

    //    return view('carrier.create',compact('row'));
    return response()->json($row);


    }



    public function delete($id){
        $delete = CarrierModel::where('id',$id)->update(['status'=>'deleted']);
        if($delete){
            return redirect()->route('carrierDetail');
        }else{
            return redirect()->route('carrierDetail');
        }
    }

    public function jobDetail(Request $request,$id)
    {
        $careerData = CarrierModel ::where('status','Active')->where('id',$id)->get()->toArray();
        return view('carrier.job_detail_applicant',compact('careerData'));

    }


    public function jobapplyListapplicant(Request $request)
    {

        // echo $careerDataId;
        // exit;
        $input = $request->all();
        // dd($input);

        $result_obj = JobApplyModel::where('apply_for_job.status','!=','Deleted')->where('career_id',$input['id'])->get();
        // dd($result_obj);
        // echo "<pre>";
        // print_r($result_obj);
        // exit;

        return DataTables::of($result_obj)->addColumn('command', function ($result_obj) {

            $command = '';
            $command .= '<div class="btn-group dropleft">
            <button type="button"
                class="btn dropdown-toggle dropdown-toggle-split btn-sm three_part_saction"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="javascript:;" onclick="jobAppplyDelete('.$result_obj['id'].')" >Delete Record</a>

            </div>';
            return $command;
        })->addColumn('id', function ($result_obj)
        {
            $counters = $this->counter++;
            $id = '<div><span>'.$counters.'</span></div>';
            return $id;
        })->addColumn('full_name', function ($result_obj)
        {
            $full_name = '';
            // $full_name = ucwords($result_obj->full_name);
            $full_name = ucwords($result_obj->full_name).'</br>'.ucwords($result_obj->mobile_number);
            return $full_name;
        })->addColumn('email', function ($result_obj)
        {
            $email = '';
            $email = ucwords($result_obj->email);
            return $email;
        })
        ->addColumn('resume_cv', function ($result_obj)
        {
            $resume_cv = '';
            $url=asset("images/job_apply/$result_obj->resume");
            $resume_cv .= '<embed src='.$url.' border="0" width="100" height="100"  align="center" />';
            return $resume_cv;


        })
       ->addColumn('cover_letter', function ($result_obj) {
                $cover_letter = '';
                if ($result_obj->cover_letter != '' && file_exists(public_path() . '/images/job_apply/' . $result_obj->cover_letter)) {
                        $url = asset("images/job_apply/$result_obj->cover_letter");

                        $cover_letter .= '<img src=' . $url . ' border="0" width="100" height="100" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center">';

                        return $cover_letter;
                    } else {
                        $url2 = asset("images/image-placeholder.jpg");
                        $cover_letter .= '<img src=' . $url2 . ' border="0" width="100" height="100" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
                    }
                return $cover_letter;
            })

        ->addColumn('status_td',function($result_obj){
            $status = '';
            if($result_obj->status=='active')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $status.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $status;
        })

        ->rawColumns(['full_name','email','resume_cv','cover_letter','status_td','command','id'])
        ->make(true);
    }

    public function deleteData($id){
        $delete = JobApplyModel::where('id',$id)->update(['status'=>'deleted']);
        if($delete){
            return redirect()->back();
        }
    }

}
