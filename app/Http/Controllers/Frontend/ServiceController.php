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
use App\Http\Model\BusinessModel;


class BusinessController extends Controller
{
    use UserLocationDetailTrait;
    public function index(Request $request)
    {
        $user = UserModel::all('*');
        $categories =  CategoryModel::where('parent_category_id', '=', 0)
                                    ->select('name','id')
                                    ->get();
        return view('frontend.business.add_business',compact('categories','user'));

    }

    public function SubCategoryBusiness($id)
    {
        $businesscategory = CategoryModel::where('parent_category_id',$id)->get();
        return response()->json($businesscategory);
    }

    public function store(Request $request)
    {

        $input=$request->all();

        $categoryId = $request->category_id;
        $userID = Auth::id();



        $obj=new BusinessModel();

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

        if($file = $request->hasFile('media_file_json'))
        {
            $file = $request->file('media_file_json') ;

            $fileName =  \Illuminate\Support\Str::random(12) . '.' . $request->file('media_file_json')->getClientOriginalExtension();
            $destinationPath = public_path().'/images/business/' ;
            $file->move($destinationPath,$fileName);
            $obj->media_file_json= json_encode($fileName,JSON_FORCE_OBJECT);

        }

        $Hours = [
            'DisplayMon' => '', 'DisplayTue' => '', 'DisplayWed' => '',
            'DisplayThur' => '', 'DisplayFri' => '', 'DisplaySat' => '', 'DisplaySun' => ''
        ];


        $Hours['DisplayMon'] = $input['start_time'] . ' To ' . $input['end_time'];
        $Hours['DisplayTue'] = $input['start_time'] . ' To ' . $input['end_time'];
        $Hours['DisplayWed'] = $input['start_time'] . ' To ' . $input['end_time'];
        $Hours['DisplayThur'] = $input['start_time'] . ' To ' . $input['end_time'];
        $Hours['DisplayFri'] = $input['start_time'] . ' To ' . $input['end_time'];
        $Hours['DisplaySat'] = $input['start_time'] . ' To ' . $input['end_time'];
        $Hours['DisplaySun'] = $input['start_time'] . ' To ' . $input['end_time'];


        $obj->hours_json = json_encode($Hours);
        $obj->name=$input['name'];
        $obj->about=$input['about'];
        $obj->category_id=$categoryId;
        $obj->name=$input['name'];
        $obj->description=$input['description'];
        $obj->address=$input['address'];
        $obj->actual_price=$input['actual_price'];
        $obj->selling_price=$input['selling_price'];
        $obj->display_hours=$input['display_hours'];
        $obj->payment_mode=$input['payment_mode'];
        $obj->contact_person_name=$input['contact_person_name'];
        $obj->mobile_number=$input['mobile_number'];
        $obj->email_id=$input['email_id'];
        $obj->website=$input['website'];
        $obj->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        $obj->save();


        return redirect('/');

    }

    public function requestOtp(Request $request)
    {

        $requestOtp = rand(1000,9999);
        $UserId = Auth::user()->id;
        $user = UserModel::find($UserId);
        $user->otp = $requestOtp;
        $user->save();
        Log::info("otp = ".$user);
       // $user = UserModel::where('email','=',$request->email)->update(['otp' => $otp]);

        if($user){

        $mail_details = [
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
        $otpenter=$request->otp;

        $user  = UserModel::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
        if($user){
            UserModel::where('email','=',$request->email)->update(['otp' => null]);

            return response(["status" => 200, "message" => "Success"]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }

}

