<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagsRequest;

use DataTables;

use App\Http\Model\TagMasterModel;
use App\Http\Model\TestimonialModel;
use Auth;

class TestmonialController extends Controller
{
    public function index(Request $request)
    {
        return view('testmonial.index');
    }

    public function testmonialdetails($id)
    {
        $testmonial_details = TestimonialModel::leftJoin('user',function ($join)
        {
            $join->on('testimonial.user_id', '=', 'user.id');
            
        })->select('testimonial.*', 'user.name as user_name')->where('testimonial.id',$id)->first()->toArray();

        return view('testmonial.testmonialdetails',compact('testmonial_details'));
    }

    public function delete($id)
    {
        $delete = TestimonialModel::where('id', $id)->update([
            'is_deleted' => 1,
        ]);

        if ($delete) {
            return redirect()->route('testmonial');
        } else {
            return redirect()->route('testmonial');
        }
    }

    public function testmonialList()
    {
        $result_obj = TestimonialModel::where('testimonial.is_deleted', '=', 0)->leftJoin('user',function ($join)
        {
            $join->on('testimonial.user_id', '=', 'user.id');
        })->select('testimonial.*','user.name as user_id')->get();

        return DataTables::of($result_obj)

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
        ->addColumn('detail',function($result_obj){

            $detail = '';
            $detail .= '<a href="javascript:;" onclick="ViewTestmonialDetail('.$result_obj['id'].')" >View Detail</a>';
            return $detail;

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
                <a href="javascript:;" onclick="deleteTestmonial('.$result_obj['id'].')" >Delete Record</a>
            </div>';

            return $command;
        })
        ->rawColumns(['user_id','detail','command'])
        ->make(true);
    }


}
