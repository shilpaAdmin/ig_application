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

class CityController extends Controller
{

    public function index(Request $request)
    {
        return view('city.index');

    }
    public function create(Request $request)
    {
        return view('city.create');

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

        $obj=new CitysModel();
        $obj->name = $input['name'];
        $obj->type = $input['type'];
        $obj->continent = $input['continent'];
        $obj->country = $input['country'];
        $obj->country_code	 = $input['country_code'];
        $obj->postal_code = $input['postal_code'];
        $obj->capital = $input['capital'];
        $obj->population = $input['population'];
        $obj->pop_date = $input['pop_date'];
        $obj->latitude = $input['latitude'];
        $obj->longitude = $input['longitude'];
        $obj->contact_number = $input['contact_number'];
        // $obj->status = $status;
        $obj->save();

        if($obj)
        {
            return view('city.index')->with('success','city has been added successfully!');
        }
        else
        {
            return view('city.index')->with('error','city has not been added!');
        }

    }

    public function edit($id)
    {
        $row = CitysModel::where('id', $id)->first()->toArray();

        return view('city.edit', compact('row'));

    }

    public function update(Request $request,$id)
    {
        $input=$request->all();
        // if(isset($input['status']))
        // {
        //     if($input['status'] == 'on')
        //     {
        //         $status = 'active';
        //     }
        //     else
        //     {
        //         $status = 'inactive';
        //     }
        // }
        // else
        // {
        //     $status = 'inactive';
        // }

        $obj= CitysModel::find($id);
        $obj->name = $input['name'];
        $obj->type = $input['type'];
        $obj->continent = $input['continent'];
        $obj->country = $input['country'];
        $obj->country_code	 = $input['country_code'];
        $obj->postal_code = $input['postal_code'];
        $obj->capital = $input['capital'];
        $obj->population = $input['population'];
        $obj->pop_date = $input['pop_date'];
        $obj->latitude = $input['latitude'];
        $obj->longitude = $input['longitude'];
        $obj->contact_number = $input['contact_number'];
        // $obj->status = $status;
        $obj->save();

        if($obj)
        {
            return redirect()->route('city')->with('success','city has been updated successfully!');
        }
        else
        {
            return redirect()->route('city')->with('error','city has not been updated!');

        }

    }

    public function cityList()
    {
        $result_obj = CitysModel::where('city.status', '!=', 'deleted')->limit(1000)->get();

        return DataTables::of($result_obj)

        ->addColumn('name', function ($result_obj)
        {
            $name = '';
            $name = ucwords($result_obj->name);
            return $name;
        })
        ->addColumn('country', function ($result_obj)
        {
            $country = '';
            $country = ucwords($result_obj->country);
            return $country;
        })
        ->addColumn('postal_code', function ($result_obj)
        {
            $postal_code = '';
            $postal_code = ucwords($result_obj->postal_code);
            return $postal_code;
        })
        ->addColumn('population', function ($result_obj)
        {
            $population = '';
            $population = ucwords($result_obj->population);
            return $population;
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
                <a class="dropdown-item" href=" '.route('city.edit',$result_obj['id']).' ">Edit Record</a>



            </div>';
            return $command;
        })
        ->rawColumns(['name','country','postal_code','population','status_td','command'])
        ->make(true);
    }



    public function delete($id){
        $delete = CitysModel::where('id',$id)->update(['status'=>'deleted']);
        if($delete){
            return redirect()->route('city');
        }else{
            return redirect()->route('city');
        }
    }

}
