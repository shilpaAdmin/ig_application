<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Model\CountrysModel;
use App\Http\Model\CitysModel;
use App\Http\Model\LocationModel;
use App\User;

use Carbon\Carbon;
use DataTables;


use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index(Request $request)
    {
        return view('country.index');

    }
    public function create(Request $request)
    {
        return view('country.create');

    }
    public function store(Request $request)
    {
        $input=$request->all();
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


        $obj=new CountrysModel();
        $obj->name = $input['name'];
        $obj->contact_number = $input['contact_number'];
        $obj->status = $status;
        $obj->save();

        if($obj)
        {
            return view('country.index')->with('success','country has been added successfully!');
        }
        else
        {
            return view('country.index')->with('error','country has not been added!');
        }

    }

    public function edit($id)
    {
        $row = CountrysModel::where('id', $id)->first()->toArray();

        return view('country.edit', compact('row'));

    }

    public function update(Request $request,$id)
    {
        $input=$request->all();
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



        $obj= CountrysModel::find($id);

        $obj->name = $input['name'];
        $obj->contact_number = $input['contact_number'];
        $obj->status = $status;
        $obj->save();

        if($obj)
        {
            return view('country.index')->with('success','country updated successfully!');
        }
        else
        {
            return view('country.index')->with('error','country has not been update!');
        }
    }

    public function countryList()
    {
        $result_obj = CountrysModel::where('country.status', '!=', 'deleted')->get();

        return DataTables::of($result_obj)

        ->addColumn('name', function ($result_obj)
        {
            $name = '';
            $name = ucwords($result_obj->name);
            return $name;
        })
        ->addColumn('contact_number',function($result_obj){
            $contact_number = '';
            $contact_number = ucwords($result_obj->contact_number);
            return $contact_number;
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
                <a class="dropdown-item" href=" '.route('country.edit',$result_obj['id']).' ">Edit Record</a>


            </div>';
            return $command;
        })
        ->rawColumns(['name','contact_number','status_td','command'])
        ->make(true);
    }

}
