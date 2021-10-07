<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BusinessRequest;
use DataTables;

use App\Http\Model\BusinessModel;
use App\Http\Model\UserModel;
use App\Http\Model\TagMasterModel;
use App\Http\Model\CategoryModel;

use Auth;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        return view('business.index');
    }

    public function create()
    {
        $days=array('DisplayMon'=>'Monday','DisplayTue'=>'Tuesday','DisplayWed'=>'Wednesday',
        'DisplayThur'=>'Thursday','DisplayFri'=>'Friday','DisplaySat'=>'Saturday','DisplaySun'=>'Sunday');
        $users=UserModel::pluck('name','id');
        // echo '<pre>';
        // print_r($users);
        // exit;
        return view('business.create',compact('days','users'));
    }

    public function delete($id)
    {
        $delete = BusinessModel::where('id', $id)->update([
            'status' => 'deleted',
        ]);

        if ($delete) {
            return redirect()->route('business');
        } else {
            return redirect()->route('business');
        }
    }

    public function businessList()
    {
        $result_obj = BusinessModel::where('status','!=','deleted')
        ->with('categories')->orderBy('id','DESC')->get();
        return DataTables::of($result_obj)
        ->addColumn('DT_RowId', function ($result_obj)
        {
            return 'row_'.$result_obj->id;
        })
        ->addColumn('description_td',function($result_obj){
            $description = '';
            if($result_obj->description=='')
            $description.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $description.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $description;
        })
        ->addColumn('type_td',function($result_obj){
            $type_td = '';
            if($result_obj->type=='product')
            $type_td.='<span class="badge badge-pill badge-soft-success font-size-12"> Product</span>';
            else
            $type_td.='<span class="badge badge-pill badge-soft-warning font-size-12"> Service </span>';
            return $type_td;
        })
        ->addColumn('category_td',function($result_obj){
            $category_td = '';
            if(!empty($result_obj->categories['name']))
            $category_td=$result_obj->categories['name'];
            else
            $category_td='N/A';
            return $category_td;
        })
        ->addColumn('is_approve',function($result_obj)
        {
            $is_approve = '';
            if($result_obj->is_approve==1)
            $is_approve.='<span class="badge badge-pill badge-soft-success font-size-12">Approve</span>';
            else
            $is_approve.='<span class="badge badge-pill badge-soft-danger font-size-12">Disapprove</span>';
            return $is_approve;
            //$is_approve = $result_obj->is_approve;
            //return $is_approve;
        })
        ->addColumn('status_td',function($result_obj){
            $status = '';
            if($result_obj->status=='active')
            $status.='<span class="badge badge-pill badge-soft-success font-size-12">'.ucwords($result_obj->status).'</span>';
            else
            $status.='<span class="badge badge-pill badge-soft-danger font-size-12">'.ucwords($result_obj->status).'</span>';
            return $status;
        })->addColumn('command',function($result_obj){
            $command = '';

            $command.='<div class="btn-group dropleft">
            <button type="button"
                class="btn dropdown-toggle dropdown-toggle-split btn-sm three_part_saction"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href=" '.route('business.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="'.route('business.delete',$result_obj['id']).'">Delete Record</a>
                <a class="dropdown-item" href="'.url('admin/business/detail/'.$result_obj['id']).'">Business Detail</a>

            </div>';

            return $command;
        })->addColumn('name_td',function($result_obj){
            $name = '';

            $name.='<td><a href=" '.route('business.detailview',$result_obj['id']).' " >'.$result_obj['name'].'</a></td>';

            return $name;
        })
        ->rawColumns(['DT_RowId','status_td','command','image_src','type_td','name_td','is_approve'])
        ->make(true);
    }

    public function tagAutoComplete(Request $request)
    {
        $input = $request->all();


        if (isset($input['search']) && !empty($input['search'])) {
            $tags_qry = TagMasterModel::where('name', 'LIKE', '%' . $input['search'] . '%');
        } else {
            $tags_qry = TagMasterModel::where('id', '>', 0);
        }
        $result = $tags_qry->select('id', 'name')->get()->toArray();

        return response()->json($result);
    }

    public function BusinessCategoryAutoComplete(Request $request)
    {
        $input = $request->all();

        if (isset($input['search']) && !empty($input['search'])) {
            $category_qry = CategoryModel::where('name', 'LIKE', '%' . $input['search'] . '%');
        } else {
            $category_qry = CategoryModel::where('id', '>', 0);
        }
        $result = $category_qry->where('category.status','!=','deleted')->select('id', 'name')->get()->toArray();

        return response()->json($result);
    }

  /*  public function tagAutoComplete(Request $request)
    {
        $input = $request->all();

        if (isset($input['search']) && !empty($input['search'])) {
            $tag_qry = TagMasterModel::where('name', 'LIKE', '%' . $input['search'] . '%');
        } else {
            $tag_qry = TagMasterModel::where('id', '>', 0);
        }
        $result = $tag_qry->select('id', 'name')->get()->toArray();


        // if (count($result) == 0 && isset($input['flag']) && $input['flag'] == 'add') {
        //     $arr = explode(',', $input['search']);
        //     $id = '';
        //     foreach ($arr as $val) {
        //         if (!is_numeric($val)) {
        //             if (!TagMasterModel::where('name', '=', $val)->exists()) {
        //                 $obj = new TagMasterModel();
        //                 $obj->name = $val;
        //                 $input['flag'] = '';
        //                 $obj->save();
        //                 $id = $obj->id;
        //             }
        //         }
        //     }
        //     if (!empty($id))
        //         $arr = ['data' => $id, 'status' => 'success'];
        //     else
        //         $arr = ['status' => 'success'];

        //     return response()->json($arr);
        // }
        return response()->json($result);
    }*/


    public function store(Request $request)
    {
        $input=$request->all();
        //  echo '<pre>';
        //  print_r($input);
        //  exit;

        $business=new BusinessModel;

        if(!empty($input['user_id']))
        $business->user_id=$input['user_id'];

        if(!empty($input['txtSearchTag']))
        $business->tag_id=$input['txtSearchTag'];

        if(count($input['hours_detail']) > 0)
        $business->display_hours='yes';
        else
        $business->display_hours='no';

        $business->category_id=$input['hdnSearchCategoryId'];
        $business->type=!empty($input['type'])?$input['type']:'';
        $business->name=!empty($input['name'])?$input['name']:'';
        $business->about=!empty($input['about'])?$input['about']:'';
        $business->address=!empty($input['address'])?$input['address']:'';
        $business->description=!empty($input['description'])?$input['description']:'';
        $business->sub_descrition=!empty($input['sub_description'])?$input['sub_description']:'';
        $business->sub_description_1=!empty($input['sub_description1'])?$input['sub_description1']:'';
        $business->actual_price=!empty($input['actual_price'])?$input['actual_price']:'';
        $business->actual_price_unit=!empty($input['actual_price_unit'])?$input['actual_price_unit']:'';
        $business->selling_price=!empty($input['selling_price'])?$input['selling_price']:'';
        $business->selling_price_unit=!empty($input['selling_price_unit'])?$input['selling_price_unit']:'';

        $business->contact_person_name=!empty($input['contact_person_name'])?$input['contact_person_name']:'';
        $business->mobile_number=!empty($input['mobile_number'])?$input['mobile_number']:'';
        $business->email_id=!empty($input['email_id'])?$input['email_id']:'';
        $business->unit_option=!empty($input['unit_option'])?$input['unit_option']:'';
        $business->reference_url=!empty($input['reference_url'])?$input['reference_url']:'';
        $business->syllabus=!empty($input['syllabus'])?$input['syllabus']:'';

        if(!empty($input['subcategory']))
        $business->multiple_subcategory_id=implode(',',$input['subcategory']);

        $Hours=['DisplayMon'=>'','DisplayTue'=>'','DisplayWed'=>'',
        'DisplayThur'=>'','DisplayFri'=>'','DisplaySat'=>'','DisplaySun'=>''];

        foreach($input['hours_detail'] as $hours)
        {
            switch($hours['txtDay'])
            {
                case 'DisplayMon':
                $Hours['DisplayMon']=$hours['start_time'].' To '.$hours['end_time'];
                break;

                case 'DisplayTue':
                $Hours['DisplayTue']=$hours['start_time'].' To '.$hours['end_time'];
                break;

                case 'DisplayWed':
                $Hours['DisplayWed']=$hours['start_time'].' To '.$hours['end_time'];
                break;

                case 'DisplayThur':
                $Hours['DisplayThur']=$hours['start_time'].' To '.$hours['end_time'];
                break;

                case 'DisplayFri':
                $Hours['DisplayFri']=$hours['start_time'].' To '.$hours['end_time'];
                break;

                case 'DisplaySat':
                $Hours['DisplaySat']=$hours['start_time'].' To '.$hours['end_time'];
                break;

                case 'DisplaySun':
                $Hours['DisplaySun']=$hours['start_time'].' To '.$hours['end_time'];
                break;
            }
        }
        // print_r(json_encode($Hours));

        $business->hours_json=json_encode($Hours);

        $count=1;
        $Related_Person_details=[];

        $count_related_personal_detail=count($input['related_personal_detail']);

        if($count_related_personal_detail > 0)
        {
            for($k=0;$k < $count_related_personal_detail;$k++)
            {
                $Related_Person_details[$k]['RelatedPersonDetail'.$count]=$input['related_personal_detail'][$k]['related_person_details'];

                if ($document_file = $input['related_personal_detail'][$k]['related_person_image'])
                {
                    $nameArr=explode('.',$document_file->getClientOriginalName());
                    $extension=$document_file->getClientOriginalExtension();
                    $name=$nameArr[0];
                    $photo_name=  md5(time().'_'. $name).'.' . $extension;
                    $document_file->move(public_path() . '/images/business_related_person/', $photo_name);
                }
                $Related_Person_details[$k]['RelatedPersonImage'.$count]=$photo_name;
                $count++;
            }
            /*foreach($input['related_personal_detail'] as $related_personal_detail)
            {
                $Related_Person_details['RelatedPersonDetail'.$count]=$related_personal_detail['related_person_details'];

                if ($document_file = $related_personal_detail['related_person_image'])
                {
                    $nameArr=explode('.',$document_file->getClientOriginalName());
                    $extension=$document_file->getClientOriginalExtension();
                    $name=$nameArr[0];
                    $photo_name=  md5(time().'_'. $name). '_' . '.' . $extension;
                    $document_file->move(public_path() . '/images/business_related_person/', $photo_name);
                }
                $Related_Person_details['RelatedPersonImage'.$count]=$photo_name;
                $count++;
            }*/

            $business->realated_person_detail_json=json_encode($Related_Person_details,JSON_FORCE_OBJECT);
            // print_r(json_encode($Related_Person_details,JSON_FORCE_OBJECT));
        }

        $count2=1;
        $Media_Details=[];

        $count_mediadetail=count($input['media_detail']);

        if($count_mediadetail > 0)
        {
            for($j=0;$j < $count_mediadetail;$j++)
            {
                if ($document_file = $input['media_detail'][$j]['media_file'])
                {
                    $nameArr=explode('.',$document_file->getClientOriginalName());
                    $extension=$document_file->getClientOriginalExtension();
                    $name=$nameArr[0];
                    $media_name= md5(time().'_'. $name). '.' . $extension;
                    $document_file->move(public_path() . '/images/business/', $media_name);
                }
                $Media_Details[$j]['Media'.$count2]=$media_name;
                $count2++;
            }

            /*foreach($input['media_detail'] as $media_detail)
            {
                if ($document_file = $media_detail['media_file'])
                {
                    $nameArr=explode('.',$document_file->getClientOriginalName());
                    $extension=$document_file->getClientOriginalExtension();
                    $name=$nameArr[0];
                    $media_name= md5(time().'_'. $name). '.' . $extension;
                    $document_file->move(public_path() . '/images/business/', $media_name);
                }
                $Media_Details['Media'.$count2]=$media_name;
            }*/
            // print_r(json_encode($Media_Details,JSON_FORCE_OBJECT));
            $business->media_file_json=json_encode($Media_Details,JSON_FORCE_OBJECT);
        }

        $business->job_detail_json=json_encode(array('JobSalary'=>$input['job_salary'],
        'JobExperience'=>$input['job_experiance'],'JobQualification'=>$input['job_qualification']));
        // print_r($business->job_detail_json);
        // $business->created_by=Auth::user()->id;
        // $business->last_updated_by=Auth::user()->id;
        $business->payment_mode=$input['payment_mode'];
        $business->website=$input['website'];

        if(!empty($input['status']) && 'active'== strtolower($input['status']))
        {
            $business->status=strtolower($input['status']);
        }
        else
        {
            $business->status='inactive';
        }

        if($business->save())
        {
            return redirect('admin/business');
        }
        else
        {
            return redirect('admin/business');
        }
    }


    public function edit($id)
    {
        $row = BusinessModel::where('id', $id)->first()->toArray();
        // dd($row);

        $days=array('DisplayMon'=>'Monday','DisplayTue'=>'Tuesday','DisplayWed'=>'Wednesday',
        'DisplayThur'=>'Thursday','DisplayFri'=>'Friday','DisplaySat'=>'Saturday','DisplaySun'=>'Sunday');

        if(!empty($row['tag_id']))
        $tag_data = TagMasterModel::where('id',$row['tag_id'])->select('id','name')->first();
        else
        $tag_data='';

        if(!empty($row['category_id']))
        $category_data=CategoryModel::where('id',$row['category_id'])->select('id','name')->first();
        else
        $category_data='';

        $users=UserModel::pluck('name','id');

        if(!empty($row['media_file_json']))
        $row['media_file_arr']=json_decode($row['media_file_json'],true);
        else
        $row['media_file_arr']='';

        if(!empty($row['realated_person_detail_json']))
        $row['related_person_detail_arr']=json_decode($row['realated_person_detail_json'],true);
        else
        $row['related_person_detail_arr']='';

        if(!empty($row['hours_json']))
        $row['hours_detail_arr']=json_decode($row['hours_json'],true);
        else
        $row['hours_detail_arr']='';

        $count_hours_detail=count($row['hours_detail_arr']);

        // echo '<pre>';
        // print_r($row);
        // exit;

        //job detail
        $job_detail_obj=json_decode($row['job_detail_json'],true);

        return view('business.edit', compact('row','days','users','tag_data','category_data','job_detail_obj'));
    }


    public function update(Request $request,$id)
    {
    $input=$request->all();
    // dd($input);

    $destinationPath = public_path().'/images/library/';
    $multipleDataArray = array();

    foreach($input['group-a'] as $multipleData)
    {
        if(isset($multipleData['media_file_json']) && !empty($multipleData['media_file_json']))
        {
            if ($attachmentFile = $multipleData['media_file_json'])
            {
                $attachmentName = md5(time() . '_' . $attachmentFile->getClientOriginalName()) . '.' . $attachmentFile->getClientOriginalExtension();

                $attachmentFile->move($destinationPath, $attachmentName);
            }

        }
        else if(isset($multipleData['media_file_json_db']) && !empty($multipleData['media_file_json_db']))
        {
            $attachmentName = $multipleData['media_file_json_db'];
        }
        array_push($multipleDataArray,$attachmentName);
    }
    if(count($multipleDataArray) > 0)
    {
        $multipleDataJson = json_encode($multipleDataArray, JSON_FORCE_OBJECT);
    }
    else
    {
        $multipleDataJson = '{}';
    }

    $business=BusinessModel::find($id);

    if(!empty($input['user_id']))
    $business->user_id=$input['user_id'];

    if(!empty($input['txtSearchTag']))
    $business->tag_id=$input['txtSearchTag'];

    // if(count($input['hours_detail']) > 0)
    // $business->display_hours='yes';
    // else
    // $business->display_hours='no';

    $business->category_id=$input['hdnSearchCategoryId'];
    $business->type=!empty($input['type'])?$input['type']:'';
    $business->name=!empty($input['name'])?$input['name']:'';
    $business->about=!empty($input['about'])?$input['about']:'';
    $business->address=!empty($input['address'])?$input['address']:'';
    $business->description=!empty($input['description'])?$input['description']:'';
    $business->sub_descrition=!empty($input['sub_description'])?$input['sub_description']:'';
    $business->sub_description_1=!empty($input['sub_description1'])?$input['sub_description1']:'';
    $business->actual_price=!empty($input['actual_price'])?$input['actual_price']:'';
    $business->actual_price_unit=!empty($input['actual_price_unit'])?$input['actual_price_unit']:'';
    $business->selling_price=!empty($input['selling_price'])?$input['selling_price']:'';
    $business->selling_price_unit=!empty($input['selling_price_unit'])?$input['selling_price_unit']:'';

    $business->contact_person_name=!empty($input['contact_person_name'])?$input['contact_person_name']:'';
    $business->mobile_number=!empty($input['mobile_number'])?$input['mobile_number']:'';
    $business->email_id=!empty($input['email_id'])?$input['email_id']:'';
    $business->unit_option=!empty($input['unit_option'])?$input['unit_option']:'';
    $business->reference_url=!empty($input['reference_url'])?$input['reference_url']:'';
    $business->syllabus=!empty($input['syllabus'])?$input['syllabus']:'';
    $business->media_file_json = !empty($multipleDataJson) ? $multipleDataJson:'';

    if(!empty($input['subcategory']))
    $business->multiple_subcategory_id=implode(',',$input['subcategory']);

    $Hours=['DisplayMon'=>'','DisplayTue'=>'','DisplayWed'=>'',
    'DisplayThur'=>'','DisplayFri'=>'','DisplaySat'=>'','DisplaySun'=>''];

    // foreach($input['hours_detail'] as $hours)
    // {
    //     switch($hours['txtDay'])
    //     {
    //         case 'DisplayMon':
    //         $Hours['DisplayMon']=$hours['start_time'].' To '.$hours['end_time'];
    //         break;

    //         case 'DisplayTue':
    //         $Hours['DisplayTue']=$hours['start_time'].' To '.$hours['end_time'];
    //         break;

    //         case 'DisplayWed':
    //         $Hours['DisplayWed']=$hours['start_time'].' To '.$hours['end_time'];
    //         break;

    //         case 'DisplayThur':
    //         $Hours['DisplayThur']=$hours['start_time'].' To '.$hours['end_time'];
    //         break;

    //         case 'DisplayFri':
    //         $Hours['DisplayFri']=$hours['start_time'].' To '.$hours['end_time'];
    //         break;

    //         case 'DisplaySat':
    //         $Hours['DisplaySat']=$hours['start_time'].' To '.$hours['end_time'];
    //         break;

    //         case 'DisplaySun':
    //         $Hours['DisplaySun']=$hours['start_time'].' To '.$hours['end_time'];
    //         break;
    //     }
    // }
    // // print_r(json_encode($Hours));

    // $business->hours_json=json_encode($Hours);

    // $count=1;
    // $Related_Person_details=[];

    // $count_related_personal_detail=count($input['related_personal_detail']);

    // if($count_related_personal_detail > 0)
    // {
    //     for($k=0;$k < $count_related_personal_detail;$k++)
    //     {
    //         $Related_Person_details[$k]['RelatedPersonDetail'.$count]=$input['related_personal_detail'][$k]['related_person_details'];

    //         if ($document_file = $input['related_personal_detail'][$k]['related_person_image'])
    //         {
    //             $nameArr=explode('.',$document_file->getClientOriginalName());
    //             $extension=$document_file->getClientOriginalExtension();
    //             $name=$nameArr[0];
    //             $photo_name=  md5(time().'_'. $name).'.' . $extension;
    //             $document_file->move(public_path() . '/images/business_related_person/', $photo_name);
    //         }
    //         $Related_Person_details[$k]['RelatedPersonImage'.$count]=$photo_name;
    //         $count++;
    //     }
    //     /*foreach($input['related_personal_detail'] as $related_personal_detail)
    //     {
    //         $Related_Person_details['RelatedPersonDetail'.$count]=$related_personal_detail['related_person_details'];

    //         if ($document_file = $related_personal_detail['related_person_image'])
    //         {
    //             $nameArr=explode('.',$document_file->getClientOriginalName());
    //             $extension=$document_file->getClientOriginalExtension();
    //             $name=$nameArr[0];
    //             $photo_name=  md5(time().'_'. $name). '_' . '.' . $extension;
    //             $document_file->move(public_path() . '/images/business_related_person/', $photo_name);
    //         }
    //         $Related_Person_details['RelatedPersonImage'.$count]=$photo_name;
    //         $count++;
    //     }*/

    //     $business->realated_person_detail_json=json_encode($Related_Person_details,JSON_FORCE_OBJECT);
    //     // print_r(json_encode($Related_Person_details,JSON_FORCE_OBJECT));
    // }

    // $count2=1;
    // $Media_Details=[];

    // $count_mediadetail=count($input['media_detail']);

    // if($count_mediadetail > 0)
    // {
    //     for($j=0;$j < $count_mediadetail;$j++)
    //     {
    //         if ($document_file = $input['media_detail'][$j]['media_file'])
    //         {
    //             $nameArr=explode('.',$document_file->getClientOriginalName());
    //             $extension=$document_file->getClientOriginalExtension();
    //             $name=$nameArr[0];
    //             $media_name= md5(time().'_'. $name). '.' . $extension;
    //             $document_file->move(public_path() . '/images/business/', $media_name);
    //         }
    //         $Media_Details[$j]['Media'.$count2]=$media_name;
    //         $count2++;
    //     }

    //     /*foreach($input['media_detail'] as $media_detail)
    //     {
    //         if ($document_file = $media_detail['media_file'])
    //         {
    //             $nameArr=explode('.',$document_file->getClientOriginalName());
    //             $extension=$document_file->getClientOriginalExtension();
    //             $name=$nameArr[0];
    //             $media_name= md5(time().'_'. $name). '.' . $extension;
    //             $document_file->move(public_path() . '/images/business/', $media_name);
    //         }
    //         $Media_Details['Media'.$count2]=$media_name;
    //     }*/
    //     // print_r(json_encode($Media_Details,JSON_FORCE_OBJECT));
    //     $business->media_file_json=json_encode($Media_Details,JSON_FORCE_OBJECT);
    // }

    $business->job_detail_json=json_encode(array('JobSalary'=>$input['job_salary'],
    'JobExperience'=>$input['job_experiance'],'JobQualification'=>$input['job_qualification']));
    // print_r($business->job_detail_json);
    $business->created_by=Auth::user()->id;
    $business->last_updated_by=Auth::user()->id;
    $business->payment_mode=$input['payment_mode'];
    $business->website=$input['website'];

    if(!empty($input['status']) && 'active'== strtolower($input['status']))
    {
        $business->status=strtolower($input['status']);
    }
    else
    {
        $business->status='inactive';
    }

    if($business->save())
    {
        return redirect('admin/business');
    }
    else
    {
        return redirect('admin/business');
    }

}
    public function detailview($id)
    {
        $row = BusinessModel::where('id', $id)->first()->toArray();
        return view('business.detailview',compact('row'));
    }


    public function businessdetail($id)
    {

        $business_details = BusinessModel::where('business.status', '!=', 'deleted')->leftJoin('user',function ($join)
        {
            $join->on('business.user_id', '=', 'user.id');
        }) ->leftJoin('tag_master', function ($join)
        {
            $join->on('business.tag_id', '=', 'tag_master.id');
        })->leftJoin('category', function ($join)
        {
            $join->on('business.category_id', '=', 'category.id');
        })->select('business.*','user.name as user_name','tag_master.name as tag_name','category.name as category_name')
        ->where('business.id',$id)->first()->toArray();
        // dd($business_details);


        return view('business.businessdetail',compact('business_details'));
    }


    public function approveStatus(Request $request ,$id)
    {

        $multipleIdExplode = explode(',',$id);

        $approveData = BusinessModel::whereIn('id',$multipleIdExplode)->get()->toArray();
        // dd($approveData);

        if(count($approveData) > 0)
        {
            foreach($approveData as $record)
            // dd($approveData);

            {
                $table_name = $record['is_approve'];


                if($table_name == 1)
                {

                    $update = BusinessModel::where('id', '=', $record['id'])->update(['is_approve'=> 0]);


                }
                else{

                    $update = BusinessModel::where('id', '=', $record['id'])->update(['is_approve'=> 1]);


                }
            }
        }
        return redirect()->back()->withSuccess('Data recovered successfully!');
    }
}
