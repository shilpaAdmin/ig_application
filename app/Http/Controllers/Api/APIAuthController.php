<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use HasApiTokens;
use App\User;
use App\Http\Model\UserContactMessagesModel;
use App\Http\Model\ComplainReportModel;

use App\Http\Model\BusinessModel;
use App\Http\Model\BlogsModel;
use App\Http\Model\FAQModel;
use App\Http\Model\ForumModel;
use App\Http\Model\LocationModel;

use Hash;
use URL;


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
        if(!isset($input['Gender']) || empty($input['Gender']))
        {
            $error[] = 'Gender Must be Required!';
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

                if(isset($input['SocialId']) && !empty($input['SocialId']))
                {
                    $userRequested = User::where('social_id', $input['SocialId'])->get()->toArray();

                    if(count($userRequested) > 0)
                    {
                         $error[] = 'SocialId Already Exists!';
                    }
                }
            }
            else
            {
                if(!isset($input['Password']) || empty($input['Password']))
                {
                    $error[] = 'Password Must be Required!';
                }
            }
        }
        if(isset($input['Email']) && !empty($input['Email']))
        {
            $userRequested = User::where('email', $input['Email'])->get()->toArray();

            if(count($userRequested) > 0)
            {
                $error[] = 'Email Already Exists!';
            }
        }
        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
        }
        $destinationPath = public_path().'/images/categories/';

        $user = User::create([
            'name' => $input['Name'],
            'email' => $input['Email'],
            'mobile_number' => $input['Number'],
            'password' => isset($input['Password']) ? bcrypt($input['Password']) : bcrypt('123456'),
            'social_id' => isset($input['SocialId']) ? $input['SocialId'] : '',
            'social_type' => isset($input['SocialType']) ? $input['SocialType'] : '',
            'login_type' => $input['Type'],
            'device_id' => $input['DeviceType'],
            'device_token' => $input['DeviceToken'],
            'gender' => $input['Gender'],
            'created_by' => 1,
            'last_updated_by' => 1,
            'status' => 'active',
        ]);
// echo "<pre>";
// print_r($user);
// exit;
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
            else
            {
                if(!isset($input['Email']) || empty($input['Email']))
                {
                    $error[] = 'Email Must be Required!';
                }
                if(!isset($input['Password']) || empty($input['Password']))
                {
                    $error[] = 'Password Must be Required!';
                }
            }

            if(!isset($input['DeviceToken']) || empty($input['DeviceToken']))
            {
                $error[] = 'DeviceToken Must be Required!';
            }
        }

    	if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
        }
        if($input['Type'] == 'Social')
        {
            $userData = User::where('social_id', $input['SocialId'])->first();
            if (!empty($userData))
            {
                $emailFromDB = $userData['email'];
                $passwordFromDB = $userData['password'];
                $userData->update(['password'=> bcrypt('password')]);
                if(Auth::attempt(['email' => $emailFromDB, 'password' => 'password']))
                {
                    $user = Auth::user();
                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    User::where('id', $userData['id'])->update(['password'=>$passwordFromDB,
                    'device_token'=>$input['DeviceToken']]);
                    return $this->loginSuccess($tokenResult, $user,'login');
                }
                else
                {
                    return response()->json(['Status'=>False,'StatusMessage'=>'login failed']);
                }
            }
            else
            {
                return response()->json(['Status'=>False,'StatusMessage'=>'SocialId not present']);
            }
        }
        else
        {
            if(Auth::attempt(['email' => $input['Email'], 'password' => $input['Password']]))
            {
                User::where('id', Auth::user()->id)->update(['device_token'=>$input['DeviceToken']]);
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
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
        }

        if(!isset($input['DeviceToken']) || empty($input['DeviceToken']))
        {
            $error[] = 'DeviceToken Must be Required!';
        }

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
        }

        $userdel = User::where('id',$input['RegisterId'])
        ->where('device_token',$input['DeviceToken'])->first();

        if($userdel!==null) {

            $userObj=User::find($input['RegisterId']);
            $userObj->device_token = null;

            if($userObj->save())
            {
                if (Auth::guard('api')->user())
                {
                    $token = Auth::guard('api')->user()->token();
                    $token->revoke();
                    return response()->json(['Status'=>True,'StatusMessage'=>'User is Logout']);
                }
                else
                {
                    return response()->json(['Status'=>False,'StatusMessage'=>'Unauthorised']);
                }
            }
        }
        else
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'User not exist with this token !']);
        }

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
        $userArray['user']['Gender'] = $user->gender;
        $userArray['user']['Address'] = !empty($user->address)?$user->address:'';
        $userArray['user']['UserImage'] = !empty($user->user_image)?URL::to('/images/user').'/'.$user->user_image:'';
        $userArray['user']['MatrimonialId']=!empty($user->matrimonial_id)?strval($user->matrimonial_id):'';

        if(isset($user->location_id) && !empty($user->location_id))
        {
           /* $locationData=LocationModel::where('location.id',$user->location_id)
            ->leftjoin('country as country','location.country_id','=','country.id')
            ->leftjoin('city as city','location.city_id','=','city.id')
            ->select('location.*','city.name as city_name','country.name as country_name')->first();*/

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

    public function Profile(Request $request)
    {
        $input = $request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
        }
    	if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
        }
        $userData=User::where('id',$input['RegisterId'])->first();

        if (!$userData)
         {
            return response()->json([
                'Status' => false,
                'StatusMessage' => 'Profile not exist !',
                'Result' => [],
            ]);
         }
         else
         {
            $userArray=array(
                'Id'=>strval($userData->id),
                'Name'=>$userData->name,
                'Email'=>$userData->email,
                'Number'=>!empty($userData->mobile_number)?$userData->mobile_number:'',
                'Image'=>!empty($userData->user_image)?URL::to('/images/user/'.$userData->user_image):'',
                'Address'=>!empty($userData->address)?$userData->address:'',
                'PrivacyPolicy'=>'',
                'TC-HtmlData'=>'',
                'IsRated'=>$userData->is_rated==0?'false':'true',
                'MatrimonialId'=>!empty($userData->matrimonial_id)?strval($userData->matrimonial_id):''
                );

            return response()->json([
                'Status' => true,
                'StatusMessage' => 'Profile get successfully !',
                'Result' => [$userArray],
            ]);
        }
    }

    public function UpdateProfile(Request $request)
    {
        $input = $request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
        }

    	if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
        }

        if(empty($input['Name']) && empty($input['Email']) && empty($input['Address'])
        && empty($input['Image']) && empty($input['Number']))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>'Send any one required parameter to update !','Result'=>array()]);
        }

        $userData=User::where('id',$input['RegisterId'])->first();

        if (!$userData)
         {
            return response()->json([
                'Status' => false,
                'StatusMessage' => 'Profile not exist !',
                'Result' => [],
            ]);
         }
         else
         {
            $updateArray=array();

            if(isset($input['Name']))
            $updateArray['name']=$input['Name'];

            if(isset($input['Email']))
            $updateArray['email']=$input['Email'];

            if(isset($input['Address']))
            $updateArray['address']=$input['Address'];

            if(isset($input['Image']))
            {
                $document_file=$input['Image'];
                $user_image_path=public_path().'/images/user/'.$userData->user_image;
                if(file_exists($user_image_path))
                {
                    if(!empty($userData->user_image))
                    unlink($user_image_path);

                    $nameArr=explode('.',$document_file->getClientOriginalName());
                    $extension=$document_file->getClientOriginalExtension();
                    $name=$nameArr[0];
                    $media_name= md5(time().'_'. $name). '.' . $extension;
                    $document_file->move(public_path() . '/images/user/', $media_name);
                    $updateArray['user_image']=$media_name;
                }
            }

            if(isset($input['Number']))
            $updateArray['mobile_number']=$input['Number'];

            //print_r($updateArray);
            //exit;
            $user=User::where('id',$input['RegisterId'])->update($updateArray);

            if($user)
            {
                return response()->json([
                'Status' => true,
                'StatusMessage' => 'Profile updated successfully !',
                'Result' => [],
                ]);
            }
            else
            {
                return response()->json([
                'Status' => false,
                'StatusMessage' => 'Profile not updated !',
                'Result' => [],
                ]);
            }
        }
    }

    public function SendEmailWithOTP(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}
        $user=User::where('id',$input['RegisterId'])->first();

        if($user===null)
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
        }

        $emailBody='<!DOCTYPE html>
                <html lang="en">

                <head>
                    <title>Email Template</title>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
                    <meta name="format-detection" content="telephone=no">
                    <meta name="keywords" content="">
                    <meta name="description" content="">

                    <!--css styles starts-->
                    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

                    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

                    <link rel="stylesheet" type="text/css" href="css/responsive.css">

                    <!--css styles ends-->
                    <!--common jquery starts-->
                    <script src="js/jquery-3.3.1.min.js"></script>
                    <!--common jquery end-->

                    <style>
                    a, button, .btn {
                    outline: none !important;
                    transition: all 0.5s ease-in-out 0s;
                    -moz-transition: all 0.5s ease-in-out 0s;
                    -ms-transition: all 0.5s ease-in-out 0s;
                    -o-transition: all 0.5s ease-in-out 0s;
                    -webkit-transition: all 0.5s ease-in-out 0s;
                    text-decoration: none !important;
                    /* color: # */
                }
                    .main_table td .top_call a:hover {
                        color: #fcb640 !important;
                    }
                    body {
                        margin: 0;
                    }

                    @media (max-width: 767px) {
                    *,*:before,*:after { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;}
                    }
                    /* table, thead, tbody, th, td, tr {display: block;} */
                    }

                    </style>

                </head>

                <body>
                <!----------- email template start here----------->
                <div style="">
                <table class="main_table" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>
                        <table border="0" align="center" cellpadding="0" cellspacing="0" style="max-width: 600px; width: 600px; margin: 0 auto;">
                            <tbody>
                            <tr>
                                <td align="center">
                                <table border="0" cellpadding="15" cellspacing="0" align="center" width="100%" style="background-color: #434c64;">
                                    <tbody>
                                    <tr>
                                        <td style="">
                                        <div class="top_call" style="float: left;">
                                            <a style="color: #fff; text-decoration: none; font-family: Montserrat;" href="tel: +910000000000"
                                            >
                                            <img src="https://foodalios.testingbeta.in/images/email/Call.png" width="35" height="35" style="width: 18px;
        height: 16px; vertical-align: middle;"/>+91 000 0000 000</a>
                                        </div>
                                        <div class="top_call" style="float: right;">
                                            <a style="color: #fff; text-decoration: none; font-family: Montserrat;" href="mailto: testing@gmail.com">
                                            <img src="https://foodalios.testingbeta.in/images/email/Mail.png" width="35" height="35" style="width: 20px;
        height: 20px; vertical-align: middle;"/>
                                            testing@gmail.com</a>
                                        </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" >
                                <table width="100%" border="0" align="center" cellpadding="10" cellspacing="0" style="background-color: #dadada; padding: 15px;">
                                    <tbody>
                                    <tr>
                                        <td align="center">
                                            <h1 style="color: DodgerBlue; font-size: 25px; font-family:  sans-serif; margin: 0;padding-bottom: 10px;"> IG </h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                        <h1 style="color: #000; font-size: 25px; font-family: Montserrat; margin: 0;
                                        padding-bottom: 10px;">Hello...</h1>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                        <h2 style="color: #000; font-size: 18px; font-family: sans-serif; margin: 0;
                                        padding-bottom: 15px;">Your System Generated OTP !!</h2>
                                        <p style="color: #000; font-size: 16px; font-family:  sans-serif; margin: 0;
                                        padding-bottom: 10px;">We have sent you new OTP [OTP] .</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center" style="border-top: solid 1px #fff; border-bottom: solid 1px #fff;">
                                        <p style="color: #000; font-size: 20px; font-family: sans-serif; margin: 0;
                                        text-transform: uppercase; font-weight: 600;">THANK YOU FOR CHOOSING “IG”.</p>
                                        </td>
                                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    </tbody>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                                <table border="0" cellpadding="15" cellspacing="0" align="center" width="100%" style="background-color: #434c64;">
                                    <tbody>
                                    <tr>

                                    <td style="">
                                        <div class="top_call" style="float: left;">
                                            <p style="margin: 0;">
                                            <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;margin-right: 10px;
                                            font-size: 20px;" href="#">
                                                <img src="https://foodalios.testingbeta.in/images/email/FB.png" width="35" height="35"/>
                                                <!--<i class="fa fa-facebook" aria-hidden="true"></i>-->
                                            </a>
                                            <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;margin-right: 10px;
                                            font-size: 20px;" href="#">
                                                <img src="https://foodalios.testingbeta.in/images/email/Linkedin.png" width="35" height="35"/>
                                                <!--<i class="fa fa-linkedin" aria-hidden="true"></i>-->
                                            </a>
                                            <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;
                                            font-size: 20px;" href="#">
                                                <img src="https://foodalios.testingbeta.in/images/email/Twitter.png" width="35" height="35"/>
                                                <!--<i class="fa fa-twitter" aria-hidden="true"></i>-->
                                            </a>
                                            </p>

                                        </div>
                                        <div class="top_call" style="float: right;">
                                            <p style="margin: 0; color: #fff; font-family: Montserrat; padding-top: 10px;">© 2021 IG.</p>
                                        </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                </td>
            </tr>
            </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <!----------- email template end here ----------->
        </body>

        </html>';

        $subject = "OTP - IG App";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@testingbeta.in";

        try
        {
            $to = $user->email;

            $otp=rand(1000,9999);

            $message_body = str_replace(array('[OTP]'),array($otp), $emailBody);

            if (mail($to, $subject, $message_body, $headers) !== false)
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'OTP sent on email successfully!'
                ,'OTP'=>strval($otp)]);
            }
            else
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'Something went wrong.OTP not sent on email, try again!'
                ,'OTP'=>""]);
            }

        } catch (Exception $e) {
            return response()->json(['Status'=>true,'StatusMessage'=>'Something went wrong.OTP not sent on email, try again! Error:'.$e->getMessage()
            ,'OTP'=>""]);
        }
    }

    public function userContactMessages(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!isset($input['Preferred']) || empty($input['Preferred']))
        {
            $error[] = 'Preferred Must be Required!';
		}

        if(!isset($input['Message']) || empty($input['Message']))
        {
            $error[] = 'Message Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $user=User::where('id',$input['RegisterId'])->first();

        if($user===null)
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
        }

        $preferred='';

        if($input['Preferred']=='Phone' || $input['Preferred']=='Email')
        {
            $preferred=$input['Preferred'];
        }
        else
        {
            $preferred='Phone';
        }

        $contact=new UserContactMessagesModel;
        $contact->preferred=$preferred;
        $contact->message=$input['Message'];
        $contact->user_id=$input['RegisterId'];

        if(isset($input['Name']) && !empty($input['Name']))
        $contact->name=$input['Name'];

        if(isset($input['Email']) && !empty($input['Email']))
        $contact->email=$input['Email'];

        if(isset($input['Number']) && !empty($input['Number']))
        $contact->number=$input['Number'];

        if($contact->save())
        {
            return response()->json(['Status'=>true,'StatusMessage'=>'Contact information stored successfully !','Result'=>array()]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Contact information not stored !','Result'=>array()]);
        }
    }

    public function sendMailForForgetPassword(Request $request)
    {
        $input=$request->all();

        if(!isset($input['Email']) || empty($input['Email']))
        {
            $error[] = 'Email Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        $user=User::where('email',$input['Email'])->first();

        if($user===null)
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Email not exist!','Result'=>array()]);
        }

        $emailArray=$this->getEmail(2);

        $message_body=$emailArray[0];
        $headers=$emailArray[1];
        $otp=$emailArray[2];

        $to=$user->email;
        $subject='Forget Password - IG App';

        try
        {
            $to = $user->email;

            if (mail($to, $subject, $message_body, $headers) !== false)
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'OTP sent for Forget Password on email successfully!'
                ,'OTP'=>strval($otp),'RegisterId'=>strval($user->id)]);
            }
            else
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'Something went wrong.Email not sent for forget password, try again!'
                ,'OTP'=>""]);
            }

        } catch (Exception $e) {
            return response()->json(['Status'=>true,'StatusMessage'=>'Something went wrong.Email not sent for forget password, try again! Error:'.$e->getMessage()
            ,'OTP'=>""]);
        }
    }

    public function userChangePassword(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!isset($input['Password']) || empty($input['Password']))
        {
            $error[] = 'Password Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(isset($input['RegisterId']) || !empty($input['RegisterId']))
        {
            $user=User::where('id',$input['RegisterId'])->first();

            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
            }

            if($user->status!='active')
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User is not active!','Result'=>array()]);
            }
        }

        $result=User::where('id',$input['RegisterId'])->update([
            'password'=>bcrypt($input['Password'])
        ]);

        if($result)
        {

            if (Auth::guard('api')->user())
            {
                $token = Auth::guard('api')->user()->token();
                $token->revoke();
            }

            return response()->json(['Status'=>true,'StatusMessage'=>'User password changed successfully !','Result'=>array()]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'User password not changed !','Result'=>array()]);
        }
    }

    public function storeComplainReport(Request $request)
    {
        $input=$request->all();

        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!isset($input['Type']) || empty($input['Type']))
        {
            $error[] = 'Type Must be Required!';
		}

        if(!isset($input['Id']) || empty($input['Id']))
        {
            $error[] = 'Id Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}

        if(isset($input['RegisterId']) && !empty($input['RegisterId']))
        {
            $user=User::where('id',$input['RegisterId'])->first();

            if($user===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
            }
        }

        $type=$input['Type'];

        switch($type)
        {
            case 'blog':
                $blogs=BlogsModel::where('id',$input['Id'])->first();

                if($blogs===null)
                {
                    return response()->json(['Status'=>false,'StatusMessage'=>'Blog not exist!','Result'=>array()]);
                }
            break;

            case 'forum':
                $forum=ForumModel::where('id',$input['Id'])->first();

                if($forum===null)
                {
                    return response()->json(['Status'=>false,'StatusMessage'=>'Forum not exist!','Result'=>array()]);
                }
            break;

            case 'faq':
                $faq=FAQModel::where('id',$input['Id'])->first();

                if($faq===null)
                {
                    return response()->json(['Status'=>false,'StatusMessage'=>'FAQ not exist!','Result'=>array()]);
                }
            break;

            case 'business':
                $business=BusinessModel::where('id',$input['Id'])->first();

                if($business===null)
                {
                    return response()->json(['Status'=>false,'StatusMessage'=>'Business not exist!','Result'=>array()]);
                }
            break;

            default:
                return response()->json(['Status'=>false,'StatusMessage'=>'Type not exist!','Result'=>array()]);
            break;
        }

        $complainreportObj=new ComplainReportModel;
        $complainreportObj->user_id=$input['RegisterId'];
        $complainreportObj->type=$input['Type'];
        $complainreportObj->faqid_or_blogid_or_forumid_or_businessid=$input['Id'];

        if($complainreportObj->save())
        {
            return response()->json(['Status'=>true,'StatusMessage'=>'Complain Report data saved successfully !','Result'=>array()]);
        }
        else
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Complain Report data not saved !','Result'=>array()]);
        }
    }

    protected function getEmail($choiceText)
    {
        switch($choiceText)
        {
            case 1:
            $headlineText='Your System Generated OTP !!';
            $contentText='We have sent you new OTP ';
            break;

            case 2:
            $headlineText='Your System Generated OTP for Forget Password !!';
            $contentText='We are authenticating for forget password with OTP ';
            break;
        }

        $emailBody='<!DOCTYPE html>
                <html lang="en">

                <head>
                    <title>Email Template</title>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
                    <meta name="format-detection" content="telephone=no">
                    <meta name="keywords" content="">
                    <meta name="description" content="">

                    <!--css styles starts-->
                    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

                    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

                    <link rel="stylesheet" type="text/css" href="css/responsive.css">

                    <!--css styles ends-->
                    <!--common jquery starts-->
                    <script src="js/jquery-3.3.1.min.js"></script>
                    <!--common jquery end-->

                    <style>
                    a, button, .btn {
                    outline: none !important;
                    transition: all 0.5s ease-in-out 0s;
                    -moz-transition: all 0.5s ease-in-out 0s;
                    -ms-transition: all 0.5s ease-in-out 0s;
                    -o-transition: all 0.5s ease-in-out 0s;
                    -webkit-transition: all 0.5s ease-in-out 0s;
                    text-decoration: none !important;
                    /* color: # */
                }
                    .main_table td .top_call a:hover {
                        color: #fcb640 !important;
                    }
                    body {
                        margin: 0;
                    }

                    @media (max-width: 767px) {
                    *,*:before,*:after { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;}
                    }
                    /* table, thead, tbody, th, td, tr {display: block;} */
                    }

                    </style>

                </head>

                <body>
                <!----------- email template start here----------->
                <div style="">
                <table class="main_table" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>
                        <table border="0" align="center" cellpadding="0" cellspacing="0" style="max-width: 600px; width: 600px; margin: 0 auto;">
                            <tbody>
                            <tr>
                                <td align="center">
                                <table border="0" cellpadding="15" cellspacing="0" align="center" width="100%" style="background-color: #434c64;">
                                    <tbody>
                                    <tr>
                                        <td style="">
                                        <div class="top_call" style="float: left;">
                                            <a style="color: #fff; text-decoration: none; font-family: Montserrat;" href="tel: +910000000000"
                                            >
                                            <img src="https://foodalios.testingbeta.in/images/email/Call.png" width="35" height="35" style="width: 18px;
        height: 16px; vertical-align: middle;"/>+91 000 0000 000</a>
                                        </div>
                                        <div class="top_call" style="float: right;">
                                            <a style="color: #fff; text-decoration: none; font-family: Montserrat;" href="mailto: testing@gmail.com">
                                            <img src="https://foodalios.testingbeta.in/images/email/Mail.png" width="35" height="35" style="width: 20px;
        height: 20px; vertical-align: middle;"/>
                                            testing@gmail.com</a>
                                        </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" >
                                <table width="100%" border="0" align="center" cellpadding="10" cellspacing="0" style="background-color: #dadada; padding: 15px;">
                                    <tbody>
                                    <tr>
                                        <td align="center">
                                            <h1 style="color: DodgerBlue; font-size: 25px; font-family:  sans-serif; margin: 0;padding-bottom: 10px;"> IG </h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                        <h1 style="color: #000; font-size: 25px; font-family: Montserrat; margin: 0;
                                        padding-bottom: 10px;">Hello...</h1>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                        <h2 style="color: #000; font-size: 18px; font-family: sans-serif; margin: 0;
                                        padding-bottom: 15px;">[HEADLINE_TEXT]</h2>
                                        <p style="color: #000; font-size: 16px; font-family:  sans-serif; margin: 0;
                                        padding-bottom: 10px;">[CONTENT_TEXT][OTP] .</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center" style="border-top: solid 1px #fff; border-bottom: solid 1px #fff;">
                                        <p style="color: #000; font-size: 20px; font-family: sans-serif; margin: 0;
                                        text-transform: uppercase; font-weight: 600;">THANK YOU FOR CHOOSING “IG”.</p>
                                        </td>
                                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    </tbody>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                                <table border="0" cellpadding="15" cellspacing="0" align="center" width="100%" style="background-color: #434c64;">
                                    <tbody>
                                    <tr>

                                    <td style="">
                                        <div class="top_call" style="float: left;">
                                            <p style="margin: 0;">
                                            <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;margin-right: 10px;
                                            font-size: 20px;" href="#">
                                                <img src="https://foodalios.testingbeta.in/images/email/FB.png" width="35" height="35"/>
                                                <!--<i class="fa fa-facebook" aria-hidden="true"></i>-->
                                            </a>
                                            <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;margin-right: 10px;
                                            font-size: 20px;" href="#">
                                                <img src="https://foodalios.testingbeta.in/images/email/Linkedin.png" width="35" height="35"/>
                                                <!--<i class="fa fa-linkedin" aria-hidden="true"></i>-->
                                            </a>
                                            <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;
                                            font-size: 20px;" href="#">
                                                <img src="https://foodalios.testingbeta.in/images/email/Twitter.png" width="35" height="35"/>
                                                <!--<i class="fa fa-twitter" aria-hidden="true"></i>-->
                                            </a>
                                            </p>

                                        </div>
                                        <div class="top_call" style="float: right;">
                                            <p style="margin: 0; color: #fff; font-family: Montserrat; padding-top: 10px;">© 2021 IG.</p>
                                        </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                </td>
            </tr>
            </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <!----------- email template end here ----------->
        </body>

        </html>';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@testingbeta.in";

        $otp=rand(1000,9999);

        $message_body = str_replace(array('[OTP]','[CONTENT_TEXT]','[HEADLINE_TEXT]'),array($otp,$contentText,$headlineText), $emailBody);

        return array($message_body,$headers,$otp);
    }
}
