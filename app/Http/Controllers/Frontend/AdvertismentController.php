<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\AdvertisementModel;
use App\Http\Model\CategoryModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Model\UserModel;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Http\Traits\UserLocationDetailTrait;


class AdvertismentController extends Controller
{
    use UserLocationDetailTrait;
    public function index(Request $request)
    {
        $user = UserModel::all('*');
        $categories =  CategoryModel::where('parent_category_id', '=', 0)
                                    ->select('name','id')
                                    ->get();
        return view('frontend.add_advertisement',compact('categories','user'));

    }

    public function store(Request $request)
    {

        $input=$request->all();
        $categoryId = $request->category_id;
        $userID = 1;


        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

        $obj=new AdvertisementModel();

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

        if($file = $request->hasFile('media'))
        {
            $file = $request->file('media') ;

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('media')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/advertisement/' ;
            $file->move($destinationPath,$fileName);
            $obj->media= $fileName;
            $obj->start_date=$start_date;
            $obj->end_date=$end_date;
        }

        $obj->name=$input['name'];
        $obj->description=$input['description'];
        $obj->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        $obj->category_id=$categoryId;
        $obj->save();

        // if($obj)
        // {
        //     return response(["status" => 200, "message" => "Add successfully "]);
        // }
        // else
        // {
        //     return response(["status" => 401, 'message' => 'Unsuccesfull']);
        // }
        return redirect('/');

    }

    public function requestOtp(Request $request)
 {
        // dd($request->all());

        $requestOtp = rand(1000,9999);
        $user = UserModel::find(1);
        $user->otp = $requestOtp;
        $user->save();
        // dd($otp);
        Log::info("otp = ".$user);
       // $user = UserModel::where('email','=',$request->email)->update(['otp' => $otp]);

        if($user){

        $mail_details = [
            // 'subject' => 'Testing Application OTP',
            'body' => 'Your OTP is : '. $user->otp
        ];

         \Mail::to($user->email)->send(new sendEmail($mail_details));

         return response(["status" => 200, "message" => "OTP sent successfully"]);
        }
        else
        {
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }


    public function verifyOtp(Request $request)
    {
// dd($request->all());
        $user  = UserModel::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
        // dd($user);
        if($user){
            // auth()->login($user, true);
            UserModel::where('email','=',$request->email)->update(['otp' => null]);

            return response(["status" => 200, "message" => "Success"]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }

}

