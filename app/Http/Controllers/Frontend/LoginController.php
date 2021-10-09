<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    public function viewLogin(Request $request){
        return view('frontend.login.login');
    }

    public function loginAuthentication(Request $request){
        $input = $request->all();
        $this->validate($request, [
            'email'              => 'required|email',
            'password'           => 'required',
        ]);
        
        if(Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            
            $user = Auth::user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            return $this->loginSuccess($tokenResult, $user,'login');
        } else {
            return response()->json(['status'=>False,'statusMessage'=>'Login failed']);
        }
    }

    protected function loginSuccess($tokenResult, $user ,$action)
    {
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(100);
        $token->save();
        $userArray['user']['AccessToken'] =  $tokenResult->accessToken;

        $userArray['user']['Id'] = (string)$user->id;
        $userArray['user']['Name'] = $user->name;
        $userArray['user']['Email'] = $user->email;
        $userArray['user']['Gender'] = $user->gender;
        $userArray['user']['Address'] = !empty($user->address)?$user->address:'';
        $userArray['user']['UserImage'] = !empty($user->user_image)?URL::to('/images/user').'/'.$user->user_image:'';
        $userArray['user']['MatrimonialId']=!empty($user->matrimonial_id)?strval($user->matrimonial_id):'';

        if(isset($user->location_id) && !empty($user->location_id))
        {

            $locationData='';
            if($user->location_type=='city')
            {
                $locationData=User::where('location_id',$user->location_id)
                ->leftjoin('city as city','user.location_id','=','city.id')
                ->select('user.*','city.name as city_name','city.contact_number as contact_number')->first();
            }
            else if($user->location_type=='country')
            {
                $locationData=User::where('location_id',$user->location_id)
                ->leftjoin('country as country','user.location_id','=','country.id')
                ->select('user.*','country.name as country_name','country.contact_number as contact_number')->first();
            }

            if($locationData === null)
            {
                $userArray['user']['SelectedLocationID'] = '';
                $userArray['user']['SelectedLocationType'] ='';
                $userArray['user']['SelectedLocationName'] = '';
                $userArray['user']['SelectedContactNumber']='';
            }
            else
            {
                $userArray['user']['SelectedLocationID'] = strval($user->location_id);
                $userArray['user']['SelectedLocationType'] = isset($user->location_type)?$user->location_type:'';
                if($user->location_type=='country')
                {
                    $userArray['user']['SelectedLocationName'] = isset($locationData->country_name)?$locationData->country_name:'';
                }
                elseif($user->location_type=='city')
                {
                    $userArray['user']['SelectedLocationName'] = isset($locationData->city_name)?$locationData->city_name:'';
                }

                $userArray['user']['SelectedContactNumber'] = isset($locationData->contact_number)?$locationData->contact_number:'';

            }
        }
        else
        {
            $userArray['user']['SelectedLocationID'] = '';
            $userArray['user']['SelectedLocationType'] ='';
            $userArray['user']['SelectedLocationName'] = '';
            $userArray['user']['SelectedContactNumber']='';
        }
        // $userArray['user']['UserImage'] = URL::to('images/categories').'/'.$user->user_image;

        if($action == 'register')
        {
            return response()->json([
                'Status' => true,
                'StatusMessage' => 'Register Successfully',
                 'Result' => [$userArray],
            ]);

        }
        else {
            return response()->json([
                'Status' => true,
                'StatusMessage' => 'Successfully logged in',
                'Result' => [$userArray],
            ]);
        }
    }
}
