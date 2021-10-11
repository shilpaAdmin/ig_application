<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Model\UserModel;

use Carbon\Carbon;
use DataTables;


use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class UserController extends Controller
{
    var $counter = 1;


    public function index(Request $request)
    {
        return view('users.index');
    }


    public function userlist(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $txtStatusType = isset($request->status) ? $request->status : '';
        $txtlocationType = isset($request->locationSearch) ? $request->locationSearch : '';
        $txtUsername = isset($request->userName) ? $request->userName : '';


        $preQuery = UserModel::where('user.status', '!=', 'deleted')
                            ->leftJoin('city', function ($join) {
                                $join->on('user.location_id', '=', 'city.id')
                                    ->where('user.location_type','=','city');
                            })->leftJoin('country', function ($join) {
                                $join->on('user.location_id', '=', 'country.id');
                            })->select('user.*', 'city.name as city_name', 'country.name as country_name');

        if(isset($txtStatusType) && !empty($txtStatusType))
        {
            $result_obj= $preQuery->where('user.status',$txtStatusType);

        }
        if(isset($txtUsername) && !empty($txtUsername))
        {
            $result_obj= $preQuery->where('user.name',$txtUsername);

        }
        if(isset($txtlocationType) && !empty($txtlocationType))
        {
           $result_obj= $preQuery->where('city.name', 'like', '%'.$txtlocationType.'%')
                                ->orWhere('country.name', 'like', '%'.$txtlocationType.'%');
        }

        $result_obj = $preQuery->orderBy('user.created_at', 'DESC')->get();


        return DataTables::of($result_obj)
            ->addColumn('id', function ($result_obj) {
                $counters = $this->counter++;
                $id = '<div><span>' . $counters . '</span></div>';
                return $id;
            })
            ->addColumn('user_image', function ($result_obj) {
                $user_image = '';
                if ($result_obj->user_image != '' && file_exists(public_path() . '/images/user/' . $result_obj->user_image)) {
                    $url = asset("images/user/$result_obj->user_image");

                    $user_image .= '<img src=' . $url . ' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center">';

                    return $user_image;
                } else {
                    $url2 = asset("images/image-placeholder.jpg");
                    $user_image .= '<img src=' . $url2 . ' border="0" width="60" height="60" class="img-rounded loaded_image" style="object-fit: scale-down;" align="center" />';
                }

                return $user_image;
            })
            ->addColumn('location_id', function ($result_obj) {
                $location_id = '';
                $locationName = 'N/A';
                if (isset($result_obj->location_type) && !empty($result_obj->location_type)) {
                        if ($result_obj->location_type == 'city')
                            $locationName = $result_obj->city_name;
                        else if ($result_obj->location_type == 'country')
                            $locationName = $result_obj->country_name;
                    }
                $location_id = ucwords($locationName);
                return $location_id;
            })

            ->addColumn('location_type', function ($result_obj) {
                $location_type = '';
                $locationName = 'N/A';
                if (!empty($result_obj->location_type)) {
                        $location_type = ucwords($result_obj->location_type);
                    } else {
                        $location_type = ($locationName);
                    }


                return $location_type;
            })
            ->addColumn('name', function ($result_obj) {
                $name = '';
                $name = ucwords($result_obj->name) . '<br>' . ucwords($result_obj->gender);
                return $name;
            })
            ->addColumn('email', function ($result_obj) {
                $email = '';
                $email = ucwords($result_obj->email) . '<br>' . ucwords($result_obj->mobile_number);
                return $email;
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
                <a class="dropdown-item" onclick="deleteUser(' . $result_obj->id . ')">Delete Record</a>
            </div>';
                return $command;
            })
            ->rawColumns(['user_image', 'email', 'location_id', 'matrimonial_id', 'location_type', 'name', 'status_td', 'command'])
            ->make(true);
    }

    // public function userfilter()
    // {
    //     $userData = UserModel::where('status','=','active')->pluck('status','id');
    //     dd($userData);
    //     return view('users.index',compact('userData'));
    // }

    public function delete($id)
    {
        $delete = UserModel::where('id', $id)->update(['status' => 'deleted']);

        return redirect()->route('user');
    }
}
