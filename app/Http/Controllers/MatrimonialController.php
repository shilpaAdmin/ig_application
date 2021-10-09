<?php

namespace App\Http\Controllers;

use App\Http\Model\BusinessModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\UserModel;
use App\Http\Model\ForumModel;
use App\Http\Model\MatrimonialModel;
use App\Http\Model\CountrysModel;



use Auth;

class MatrimonialController extends Controller
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
        return view('matrimonial.index');
    }

    public function create()
    {

         $country=CountrysModel::where('status','!=','deleted')->get();

        return view('matrimonial.create',compact('country'));
    }

    public function store(Request $request)
    {
        $input=$request->all();

        // echo "<pre>";
        // print_r($input);
        // exit;

        $finalData = array();
        if(isset($input['group-c']) && !empty($input['group-c']))
        {
            foreach($input['group-c'] as $multipleData)
            {
                if(isset($multipleData['title']) && !empty($multipleData['title']))
                {
                    $title = $multipleData['title'];
                }

                if(isset($multipleData['description']) && !empty($multipleData['description']))
                {
                    $description = $multipleData['description'];
                }
                $finalData[] = array('title'=>$title,'description'=>$description);
            }
        }

        if(count($finalData) > 0)
        {
            $multipleDataJson = json_encode($finalData, JSON_FORCE_OBJECT);
        }
        else
        {
            $multipleDataJson = '{}';
        }

        $destinationPath = public_path().'/images/matrimonial_image/';
        $multipleDataArray = array();


        foreach($input['group-a'] as $multipleData)
        {
            if(isset($multipleData['media_file']) && !empty($multipleData['media_file']))
            {
                if ($attachmentFile = $multipleData['media_file'])
                {
                    $attachmentName = md5(time() . '_' . $attachmentFile->getClientOriginalName()) . '.' . $attachmentFile->getClientOriginalExtension();

                    $attachmentFile->move($destinationPath, $attachmentName);

                    array_push($multipleDataArray,$attachmentName);
                }

            }

        }
        if(count($multipleDataArray) > 0)
        {
            $multipleImageJson = json_encode($multipleDataArray, JSON_FORCE_OBJECT);
        }
        else
        {
            $multipleImageJson = '{}';
        }

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
        // $userID = $request->user_id;

        $obj=new MatrimonialModel();
        $obj->full_name = $input['full_name'];
        $obj->city = $input['city'];
        $obj->address = $input['address'];

        $obj->about = $input['about'];
        $obj->birth_date = $input['height'];
        $obj->age = $input['age'];

        $obj->height = $input['height'];
        $obj->caste = $input['caste'];
        $obj->subcaste = $input['subcaste'];

        $obj->married = $input['Married'];
        $obj->designation = $input['designation'];
        $obj->other = $input['other'];

        $obj->annual_income = $input['annual_income'];
        $obj->country_id = $input['country'];
        $obj->desired_age = $input['desired_age'];

        $obj->desired_height = $input['desired_height'];
        $obj->desired_marital_status = $input['desired_marital_status'];
        $obj->desired_religion = $input['desired_religion'];

        $obj->desired_mother_tongue	 = $input['desired_mother_tongue'];
        $obj->desired_country_id = $input['desired_country'];
        $obj->desired_annual_income = $input['desired_annual_income'];
        $obj->private = $input['private'];

        $obj->media_json = $multipleImageJson;
        $obj->education_json = $multipleDataJson;
        $obj->status = $status;
        $obj->save();

        // echo "<pre>";
        // print_r($obj);
        // exit;
        if($obj)
        {
            return view('matrimonial.index')->with('success','matrimonial has been added successfully!');
        }
        else
        {
            return view('matrimonial.index')->with('error','matrimonial has not been added!');
        }
    }

    public function matrimonialList()
    {
        $result_obj = MatrimonialModel::where('matrimonial.status', '!=', 'deleted')->get();

        return DataTables::of($result_obj)
        ->addColumn('DT_RowId', function ($result_obj)
        {
            return 'row_'.$result_obj->id;
        })
        ->addColumn('full_name', function ($result_obj)
        {
            $full_name = '';
            $full_name = ucwords($result_obj->full_name);
            return $full_name;
        })
        ->addColumn('city',function($result_obj){
            $city = '';
            $city = ucwords($result_obj->city);
            return $city;
        })
        ->addColumn('married',function($result_obj){
            $married = '';
            $married = ucwords($result_obj->married);
            return $married;
        })
        ->addColumn('caste',function($result_obj){
            $caste = '';
            $caste = $result_obj->caste;
            return $caste;
        })
        ->addColumn('is_approve',function($result_obj)
        {
            $is_approve = '';
            if($result_obj->is_approve==1)
            $is_approve.='<span class="badge badge-pill badge-soft-success font-size-12">Approve</span>';
            else
            $is_approve.='<span class="badge badge-pill badge-soft-danger font-size-12">Disapprove</span>';
            return $is_approve;
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
                <a class="dropdown-item" href=" '.route('matrimonial.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="javascript:;" onclick="deleteMatrimonial('.$result_obj['id'].')" >Delete Record</a>
                <a class="dropdown-item" href="'.url('admin/matrimonial-detail/'.$result_obj['id']).'">Matrimonial Detail</a>
            </div>';
            return $command;
        })
        ->rawColumns(['DT_RowId','is_approve','full_name','city','caste','married','status_td','command'])
        ->make(true);
    }


    public function approveStatus(Request $request ,$id)
    {

        $multipleIdExplode = explode(',',$id);

        $approveData = MatrimonialModel::whereIn('id',$multipleIdExplode)->get()->toArray();
        // dd($approveData);

        if(count($approveData) > 0)
        {
            foreach($approveData as $record)
            // dd($approveData);

            {
                $table_name = $record['is_approve'];


                if($table_name == 1)
                {

                    $update = MatrimonialModel::where('id', '=', $record['id'])->update(['is_approve'=> 0]);


                }
                else{

                    $update = MatrimonialModel::where('id', '=', $record['id'])->update(['is_approve'=> 1]);


                }
            }
        }
        return redirect()->back()->withSuccess('Data Approved successfully!');
    }


    public function edit($id)
    {
        $row = MatrimonialModel::where('id', $id)->first()->toArray();
        $countryData=CountrysModel::select('id','name')->get();

        return view('matrimonial.edit', compact('row','countryData'));

    }



    public function update(Request $request,$id)
    {
        $input=$request->all();

        // echo "<pre>";
        // print_r($input);
        // exit;

        $finalData = array();
        if(isset($input['group-c']) && !empty($input['group-c']))
        {
            foreach($input['group-c'] as $multipleData)
            {
                if(isset($multipleData['title']) && !empty($multipleData['title']))
                {
                    $title = $multipleData['title'];
                }

                if(isset($multipleData['description']) && !empty($multipleData['description']))
                {
                    $description = $multipleData['description'];
                }
                $finalData[] = array('title'=>$title,'description'=>$description);
            }
        }

        if(count($finalData) > 0)
        {
            $multipleDataJson = json_encode($finalData, JSON_FORCE_OBJECT);
        }
        else
        {
            $multipleDataJson = '{}';
        }

        $destinationPath = public_path().'/images/matrimonial_image/';
        $multipleDataArray = array();


        foreach($input['group-a'] as $multipleData)
        // dd($multipleData);
        {
            if(isset($multipleData['media_json']) && !empty($multipleData['media_json']))
            {
                if ($attachmentFile = $multipleData['media_json'])
                {
                    $attachmentName = md5(time() . '_' . $attachmentFile->getClientOriginalName()) . '.' . $attachmentFile->getClientOriginalExtension();

                    $attachmentFile->move($destinationPath, $attachmentName);

                    array_push($multipleDataArray,$attachmentName);
                }

            }
            else if(isset($multipleData['media_file_json_from_db']) && !empty($multipleData['media_file_json_from_db']))
            {
                $attachmentName = $multipleData['media_file_json_from_db'];
            }
            array_push($multipleDataArray,$attachmentName);
        }
        if(count($multipleDataArray) > 0)
        {
            $multipleImageJson = json_encode($multipleDataArray, JSON_FORCE_OBJECT);
        }
        else
        {
            $multipleImageJson = '{}';
        }
        //  dd($multipleImageJson);

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
        // $userID = $request->user_id;

        $obj= MatrimonialModel::find($id);
        $obj->full_name = $input['full_name'];
        $obj->city = $input['city'];
        $obj->address = $input['address'];

        $obj->about = $input['about'];
        $obj->birth_date = $input['height'];
        $obj->age = $input['age'];

        $obj->height = $input['height'];
        $obj->caste = $input['caste'];
        $obj->subcaste = $input['subcaste'];

        $obj->married = $input['Married'];
        $obj->designation = $input['designation'];
        $obj->other = $input['other'];

        $obj->annual_income = $input['annual_income'];
        $obj->country_id = $input['country'];
        $obj->desired_age = $input['desired_age'];

        $obj->desired_height = $input['desired_height'];
        $obj->desired_marital_status = $input['desired_marital_status'];
        $obj->desired_religion = $input['desired_religion'];

        $obj->desired_mother_tongue	 = $input['desired_mother_tongue'];
        $obj->desired_country_id = $input['desired_country'];
        $obj->desired_annual_income = $input['desired_annual_income'];
        $obj->private = $input['private'];

        $obj->media_json = $multipleImageJson;
        $obj->education_json = $multipleDataJson;
        $obj->status = $status;
        $obj->save();

        // echo "<pre>";
        // print_r($obj);
        // exit;
        if($obj)
        {
            return view('matrimonial.index')->with('success','matrimonial has been Updated successfully!');
        }
        else
        {
            return view('matrimonial.index')->with('error','matrimonial has not been Updated!');
        }
    }

    public function matrimonialDetail($id){

        $row = MatrimonialModel::where('id', $id)->toArray();

        return view('matrimonial-detail.create',compact('row'));
    }
    
    public function delete($id){
        $delete = MatrimonialModel::where('id',$id)->update(['status'=>'deleted']);
        if($delete){
            return redirect()->route('matrimonial');
        }else{
            return redirect()->route('matrimonial');
        }
    }




}
