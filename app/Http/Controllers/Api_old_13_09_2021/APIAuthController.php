<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\User;
use Hash;
use URL;
use Illuminate\Support\Facades\Auth;


class APIAuthController extends Controller
{

    public function register(Request $request)
    {
        $input=$request->all();
        if(!isset($input['Name']) || empty($input['Name']))
        {
            $error[] = 'Name Must be Required!';
		}
        if(!isset($input['Email']) || empty($input['Email']))
        {
            $error[] = 'Email Must be Required!';
		}

        if(!isset($input['Number']) || empty($input['Number']))
        {
            $error[] = 'Number Must be Required!';
		}
        if(!isset($input['Password']) || empty($input['Password']))
        {
            $error[] = 'Password Must be Required!';
		}
        if(!isset($input['DeviceType']) || empty($input['DeviceType']))
        {
            $error[] = 'DeviceType Must be Required!';
		}
        if(!isset($input['DeviceToken']) || empty($input['DeviceToken']))
        {
            $error[] = 'DeviceToken Must be Required!';
		}
        if(!isset($input['Type']) || empty($input['Type']))
        {
            $error[] = 'Type Must be Required!';
		}
        if(isset($input['Type']) && !empty($input['Type']))
        {
            if($input['Type'] == 'Social')
            {
                if(!isset($input['SocialType']) || empty($input['SocialType']))
                {
                    $error[] = 'SocialType Must be Required!';
                }
                if(!isset($input['SocialId']) || empty($input['SocialId']))
                {
                    $error[] = 'SocialId Must be Required!';
                }
            }
        }

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>$error,'Result'=>array()]);
		}
        $destinationPath = public_path().'/images/categories/';

        //echo '$request->file(logo) ::: '.$request->file('logo');
        // if ($profileImage = $request->file('UserImage'))
        // {

        //     $imageName = md5(time() . '_' . $profileImage->getClientOriginalName()) . '.' . $profileImage->getClientOriginalExtension();
        //     // echo $imageName;
        //     // exit;
        //     $profileImage->move($destinationPath, $imageName);
        // }

        $user = User::create([
            'name' => $input['Name'],
            'email' => $input['Email'],
            'mobile_number' => $input['Number'],
            'password' => bcrypt($input['Password']),
            'social_id' => isset($input['SocialId']) ? $input['SocialId'] : '',
            // 'social_type' => $input['SocialType'],
            'login_type' => $input['Type'],
            'device_id' => $input['DeviceType'],
            'device_token' => $input['DeviceToken'],
            'created_by' => 1,
            'last_updated_by' => 1,
            'status' => 'active',
        ]);
        if ($user)
        {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            return $this->loginSuccess($tokenResult, $user,'register');
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'Registeration failed.Please try after sometime.','Result'=>array()]);
        }
    }

    public function UserLogin(Request $request)
    {
        //echo "inisde if";
        $input = $request->all();
        if(!isset($input['Email']) || empty($input['Email']))
        {
            $error[] = 'Email Must be Required!';
        }
        if(!isset($input['Password']) || empty($input['Password']))
        {
            $error[] = 'Password Must be Required!';
        }
    	if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>$error,'Result'=>array()]);
        }
        if(Auth::attempt(['email' => $input['Email'], 'password' => $input['Password']]))
        {
            $user = Auth::user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            return $this->loginSuccess($tokenResult, $user,'login');

        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'login failed']);
        }
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'result' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    public function socialLogin(Request $request)
    {
        if (User::where('email', $request->email)->first() != null) {
            $user = User::where('email', $request->email)->first();
        } else {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'provider_id' => $request->provider,
                'email_verified_at' => Carbon::now()
            ]);
            $user->save();
            $customer = new User;
            $customer->user_id = $user->id;
            $customer->save();
        }
        $tokenResult = $user->createToken('Personal Access Token');
        return $this->loginSuccess($tokenResult, $user,'sociallogin');
    }

    protected function loginSuccess($tokenResult, $user ,$action)
    {
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(100);
        $token->save();
        $userArray['user']['AccessToken'] =  $tokenResult->accessToken;

        $userArray['user']['Id'] = (string)$user->id;
        $userArray['user']['Name'] = $user->name;
        // $userArray['user']['Password'] = $user->password;
        $userArray['user']['Email'] = $user->email;
        $userArray['user']['Address'] = '';
        $userArray['user']['UserImage'] = '';
        $userArray['user']['SelectedLocationID'] = '';
        $userArray['user']['SelectedLocationName'] = '';
        // $userArray['user']['UserImage'] = URL::to('public/images/categories').'/'.$user->user_image;

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

    // public function updateLocation(Request $request)
    // {
    //     $data = User::find($request->BusinessId);
    //     $data->id = !empty($request->RegisterId) ? $request->RegisterId : "";
    //     $data->location_id = !empty($request->LocationId) ? $request->LocationId : "";

    //     $location = User::where('id',$request->RegisterId)->update([
    //         'location_id' => '$request->LocationId'
    //     ]);

    //     if($location)
    //     {
    //         return response()->json(['Status'=>True,'StatusMessage'=>'Success Message','Result'=>$location]);
    //     }
    //     else
    //     {
    //         return response()->json(['Status'=>False,'StatusMessage'=>'No Data Available','Result'=>array()]);
    //     }
    // }
}
