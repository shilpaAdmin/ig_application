<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagsRequest;
use App\Http\Model\UserModel;

use DataTables;
use App\Http\Traits\UserLocationDetailTrait;
use Illuminate\Support\Str;
use App\Http\Model\TagMasterModel;
use App\Http\Model\TestimonialModel;
use Auth;

class TestimonialController extends Controller
{
    use UserLocationDetailTrait;
    var $counter = 1;

    public function index(Request $request)
    {
        return view('testimonial.index');
    }

    public function create(Request $request)
    {
        $users=UserModel::where('status','!=','deleted')->pluck('name','id');

        return view('testimonial.create',compact('users'));
    }

    public function store(Request $request)
    {
        $input=$request->all();

        $userID = $request->user_id;

        $obj=new TestimonialModel();

        $LocationType=$cityCountryId='';

        if(isset($userID) && !empty($userID))
        {
            $locationData=$this->getUserLocationDetail($userID);

            if($locationData!==null)
            {
                if(isset($locationData->location_id) && !empty($locationData->location_id))
                $cityCountryId=$locationData->location_id;
                else
                $cityCountryId=1;

                if(isset($locationData->location_type) && !empty($locationData->location_type))
                $LocationType=$locationData->location_type;
                else
                $LocationType='country';
            }
        }

        $obj->cityid_or_countryid=$cityCountryId;
        $obj->type_city_or_country=$LocationType;

        $obj->name=$input['name'];
        $obj->designation=$input['designation'];
        $obj->description=$input['description'];
        $obj->user_id=$userID;
        if($file = $request->hasFile('image'))
        {
            $file = $request->file('image') ;

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/testimonials/user/' ;
            $file->move($destinationPath,$fileName);
            $obj->image= $fileName ;
        }

        if($file = $request->hasFile('media'))
        {
            $file = $request->file('media') ;

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('media')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/testimonials/media/' ;
            $file->move($destinationPath,$fileName);
            $obj->media= $fileName ;
        }

        if(!empty($input['status']))
        $obj->status=$input['status'];
        else
        $obj->status='inactive';
        $obj->save();

        if($obj)
        {
            return redirect('admin/testimonial')->with('success','Forum has been added successfully!');
        }
        else
        {
            return redirect( 'admin/testimonial/create' )->with('error','Forum has not been added!');
        }
    }



    public function testmonialdetails($id)
    {

        $testmonial_details = TestimonialModel::leftJoin('user',function ($join)
        {
            $join->on('testimonial.user_id', '=', 'user.id');

        })->select('testimonial.*', 'user.name as user_name')->where('testimonial.id',$id)->first()->toArray();

        return view('testimonial.testimonialdetails',compact('testmonial_details'));
    }

    public function delete($id)
    {
        $delete = TestimonialModel::where('id', $id)->update([
            'is_deleted' => 1,
        ]);

        if ($delete) {
            return redirect()->route('testimonial');
        } else {
            return redirect()->route('testimonial');
        }
    }

    public function testmonialList(Request $request)
    {
        $input = $request->all();
        $txtStatusType = isset($request->status) ? $request->status : '';
        $storyStartDate = isset($request->startDate) ? $request->startDate : '';
        $storyEndDate = isset($request->endDate) ? $request->endDate : '';

        $preQuery = TestimonialModel::where('testimonial.is_deleted', '=', 0)->leftJoin('user',function ($join)
        {
            $join->on('testimonial.user_id', '=', 'user.id');
        })->select('testimonial.*','user.name as user_id')->orderBy('id', 'DESC');

        if(isset($txtStatusType) && !empty($txtStatusType))
        {
            $result_obj= $preQuery->where('testimonial.status',$txtStatusType);

        }
        if(isset($storyStartDate) && !empty($storyStartDate) && isset($storyEndDate) && !empty($storyEndDate))
        {
            $result_obj= $preQuery->whereBetween('testimonial.created_at',[$storyStartDate,$storyEndDate]);

        }
        $result_obj= $preQuery->get();
        return DataTables::of($result_obj)

        ->addColumn('id', function ($result_obj) {
            $counters = $this->counter++;
            $id = '<div><span>' . $counters . '</span></div>';
            return $id;
        })
        ->addColumn('user_id',function($result_obj){
            $user_id = '';
            $user_id = $result_obj->user_id;
            return $user_id;

        })
        ->addColumn('name',function($result_obj){
            $name = '';
            $name = $result_obj->name;
            return $name;

        })
        ->addColumn('description',function($result_obj){
            $description = '';
            $description = $result_obj->description;
            return $description;

        })
        ->addColumn('image_src', function ($result_obj) {
            $image = '';
            if($result_obj->image != '' && file_exists(public_path().'/images/testimonials/user/'.$result_obj->image))
            {
                $url=asset("images/testimonials/user/$result_obj->image");

                //$media_file .= '<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';

                $image .='<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center">';

                return $image;
            }
            else
            {
                $url2=asset("images/image-placeholder.jpg");
                $image .= '<img src='.$url2.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
            }

            return $image;
        })
        ->addColumn('media_src', function ($result_obj) {
            $media = '';
            if($result_obj->media != '' && file_exists(public_path().'/images/testimonials/media/'.$result_obj->media))
            {
                $url=asset("images/testimonials/media/$result_obj->media");

                //$media_file .= '<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';

                $media .='<img src='.$url.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center">';

                return $media;
            }
            else
            {
                $url2=asset("images/image-placeholder.jpg");
                $media .= '<img src='.$url2.' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
            }

            return $media;
        })
        ->addColumn('detail',function($result_obj){

            $detail = '';
            $detail .= '<a href="javascript:;" onclick="ViewTestmonialDetail('.$result_obj['id'].')" >View Detail</a>';
            return $detail;

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
                <a class="dropdown-item" href=" '.route('testimonial.edit',$result_obj['id']).' ">Edit Record</a>
                <a class="dropdown-item" href="javascript:;" onclick="deleteTestmonial('.$result_obj['id'].')" >Delete Record</a>
            </div>';

            return $command;
        })

        ->rawColumns(['user_id','image_src','media_src','detail','status_td','command'])
        ->make(true);
    }

    public function edit($id)
    {
        $row = TestimonialModel::where('id', $id)->first()->toArray();
        $users=UserModel::where('status','!=','deleted')->pluck('name','id');

        return view('testimonial.edit', compact('row','users'));

    }

    public function update(Request $request, $id)
    {
        $input=$request->all();

        $userID = $request->user_id;

        $obj= TestimonialModel::find($id);

        $obj->name=$input['name'];
        $obj->designation=$input['designation'];
        $obj->description=$input['description'];
        $obj->user_id=$userID;
        if($file = $request->hasFile('image'))
        {
            $file = $request->file('image') ;

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/testimonials/user/' ;
            $file->move($destinationPath,$fileName);
            $obj->image= $fileName ;
        }

        if($file = $request->hasFile('media'))
        {
            $file = $request->file('media') ;

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('media')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/testimonials/media/' ;
            $file->move($destinationPath,$fileName);
            $obj->media= $fileName ;
        }

        if(!empty($input['status']))
        $obj->status=$input['status'];
        else
        $obj->status='inactive';
        $obj->save();

        if($obj)
        {
            return redirect('admin/testimonial');
        }
        else
        {
            return redirect( 'admin/testimonial/create' );
        }
    }


}
