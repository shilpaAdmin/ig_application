<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use DataTables;
use App\Http\Model\UserModel;
use App\Http\Model\FAQModel;
use App\Http\Model\TagMasterModel;
use Illuminate\Support\Str;
use Auth;

use App\Http\Traits\UserLocationDetailTrait;

class FaqController extends Controller
{
    use UserLocationDetailTrait;

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
        return view('faq.index');
    }

    public function create()
    {
        $users = UserModel::where('status', '!=', 'deleted')->pluck('name', 'id');

        return view('faq.create', compact('users'));
    }

    public function store(Request $request)
    {
        $input = $request->all();


        $userID = $request->user_id;

        $obj = new FAQModel();

        if (!empty($input['txtSearchTag']))
            $obj->tags = $input['txtSearchTag'];

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

        $obj->question = $input['question'];
        $obj->answer = $input['answer'];
        $obj->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->question)).'-'.Str::random(5);
        $obj->user_id = $userID;
        if (!empty($input['status']))
            $obj->status = $input['status'];
        else
            $obj->status = 'inactive';
        $obj->save();

        if ($obj) {
                return redirect('admin/faq')->with('success', 'Forum has been added successfully!');
            } else {
                return redirect('admin/faq/create')->with('error', 'Forum has not been added!');
            }
    }


    public function tagAutoComplete(Request $request)
    {
        $input = $request->all();

        if (isset($input['search']) && !empty($input['search'])) {
            $category_qry = TagMasterModel::where('name', 'LIKE', '%' . $input['search'] . '%');
        } else {
            $category_qry = TagMasterModel::where('id', '>', 0);
        }
        $result = $category_qry->select('id', 'name')->get()->toArray();

        return response()->json($result);
    }

    public function faqlist(Request $request)
    {
// dd($request->all());
        $input = $request->all();
        $txtStatusType = isset($request->status) ? $request->status : '';

        $preQuery = FAQModel::where('faq.status', '!=', 'deleted')->leftJoin('user', function ($join) {
            $join->on('faq.user_id', '=', 'user.id');
        })->leftjoin('tag_master', function ($join) {

            $join->on('faq.tags', '=', 'tag_master.id');
        })->select('faq.*','user.name as user_id', 'tag_master.name as tags');

        if(isset($txtStatusType) && !empty($txtStatusType))
        {
            $result_obj= $preQuery->where('faq.status',$txtStatusType);

        }
        $result_obj= $preQuery->get();

        return DataTables::of($result_obj)

            ->addColumn('id', function ($result_obj) {
                $counters = $this->counter++;
                $id = '<div><span>' . $counters . '</span></div>';
                return $id;
            })
            ->addColumn('user_id', function ($result_obj) {
                $user_id = '';
                $user_id = ucwords($result_obj->user_id);
                return $user_id;
            })
            ->addColumn('question', function ($result_obj) {
                $question = '';
                $question = ucwords($result_obj->question);
                return $question;
            })
            ->addColumn('answer', function ($result_obj) {
                $answer = '';
                $answer = $result_obj->answer;
                return $answer;
            })
            ->addColumn('tags', function ($result_obj) {
                $tags = '';
                $tags = $result_obj->tags;
                return $tags;
            })
            ->addColumn('status_td', function ($result_obj) {
                $status = '';
                if ($result_obj->status == 'active')
                    $status .= '<span class="badge badge-pill badge-soft-success font-size-12">' . ucwords($result_obj->status) . '</span>';
                else
                    $status .= '<span class="badge badge-pill badge-soft-danger font-size-12">' . ucwords($result_obj->status) . '</span>';
                return $status;
            })
            ->addColumn('command', function ($result_obj) {
                $command = '';

                $command .= '<div class="btn-group dropleft">
            <button type="button"
                class="btn dropdown-toggle dropdown-toggle-split btn-sm three_part_saction"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href=" ' . route('faq.edit', $result_obj['id']) . ' ">Edit Record</a>
                <a class="dropdown-item" href="javascript:;" onclick="deleteFaq(' . $result_obj['id'] . ')" >Delete Record</a>

            </div>';
                return $command;
            })
            ->rawColumns(['id', 'user_id', 'question', 'answer', 'tags', 'status_td', 'command'])
            ->make(true);
    }


    public function edit($id)
    {
        $row = FAQModel::where('id', $id)->first()->toArray();

        // if(!empty($row['tags']))
        // $tag_data = TagMasterModel::where('id',$row['tags'])->select('id','name')->first();
        // else
        // $tag_data='';
        $tagsData = TagMasterModel::where('id', $row['tags'])->select('id', 'name')->get();


        $users = UserModel::where('status', '!=', 'deleted')->pluck('name', 'id');

        return view('faq.edit', compact('row', 'users', 'tagsData'));
    }


    public function update(Request $request, $id)
    {

        $input = $request->all();

        $userID = $request->user_id;

        $obj = FAQModel::find($id);

        if (!empty($input['txtSearchTag']))
            $obj->tags = $input['txtSearchTag'];

        $obj->question = $input['question'];
        $obj->answer = $input['answer'];
        $obj->user_id = $userID;
        if (!empty($input['status']))
            $obj->status = $input['status'];
        else
            $obj->status = 'inactive';
        $obj->save();

        if ($obj) {
                return redirect('admin/faq')->with('success', 'Forum has been updated successfully!');
            } else {
                return redirect('admin/faq/create')->with('error', 'Forum has not been UPDATE!');
            }
    }

    public function delete($id)
    {
        $delete = FAQModel::where('id', $id)->update(['status' => 'deleted']);
        if ($delete) {
            return redirect()->route('faq');
        } else {
            return redirect()->route('faq');
        }
    }
}
