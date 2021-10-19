<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\LegalPagesModel;
use DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use Auth;

class LegalPagesController extends Controller
{
    public function getLegalPagesList(Request $request)
    {
        // dd($request->all());
        $input = $request->all();

        $result_obj = LegalPagesModel::get();

        return DataTables::of($result_obj)
        
        ->addColumn('type',function($result_obj){
            $type = '';
            if(!empty($result_obj->type))
            {
                $type = ucwords(str_replace('_',' ',$result_obj->type));
            }
            return $type;
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
                <a class="dropdown-item" href=" '.route('legalpages.edit',$result_obj['id']).' ">Edit Record</a>
            </div>';
            // <a class="dropdown-item" href="'.route('category.delete',$result_obj['id']).'">Delete Record</a>


            return $command;
        })
        ->rawColumns(['type','html','command'])
        ->make(true);
    }

    public function index()
    {
        return view('legalpages.index');
    }

    public function edit($id)
    {
        $types=LegalPagesModel::pluck('type','id');
        $row = LegalPagesModel::where('id', $id)->first()->toArray();
        return view('legalpages.edit',compact('row','types'));
    }

    public function update(Request $request,$id)
    {
        $input=$request->all();
        $legal=LegalPagesModel::find($id);

         $legal->type=$input['type'];
         $legal->html=$input['body'];

        if($legal->save())
        {
            session()->flash('alert-success', 'Page has been updated successfully!');
            return redirect()->route('legalpages');
        }
        else
        {
            session()->flash('alert-danger', 'Page has not updated !');
            return redirect()->route('legalpages');
        }
    }
}