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
use Auth;

class CarrierController extends Controller
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

    public function carrierList()
    {
        $result_obj = CarrierModel::where('carrier.status', '!=', 'deleted')->get();

        return DataTables::of($result_obj)

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
        ->rawColumns(['type','name','description','status_td','command'])
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


}
