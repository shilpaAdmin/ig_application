<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Model\AdvertisementModel;
use App\Http\Model\CategoryModel;
use App\User;

use App\Http\Traits\UserLocationDetailTrait;

use URL;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    use UserLocationDetailTrait;
    
    public function AddAds(Request $request)
    {
        $input=$request->all();
        $ads=null;

        if(!isset($input['Name']) || empty($input['Name']))
        {
            $error[] = 'Name Must be Required!';
		}
        
        if(!isset($input['CategoryId']) || empty($input['CategoryId']))
        {
            $error[] = 'CategoryId Must be Required!';
		}
        
        if(!isset($input['RegisterId']) || empty($input['RegisterId']))
        {
            $error[] = 'RegisterId Must be Required!';
		}

        if(!empty($error))
        {
            return response()->json(['Status'=>False,'StatusMessage'=>implode(',',$error),'Result'=>array()]);
		}
		 
		 if(isset($input['AdsID']) && !empty($input['AdsID']))
        {
            $ads=AdvertisementModel::where('id',$input['AdsID'])->first();
            
            if($ads===null)
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Ad record not exist!','Result'=>array()]);
            }
        }

        $user=User::where('id',$input['RegisterId'])->first();

        if($user===null)
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'User record not exist!','Result'=>array()]);
        }

        $category=CategoryModel::where('id',$input['CategoryId'])->first();

        if($category===null)
        {
            return response()->json(['Status'=>false,'StatusMessage'=>'Category not exist!','Result'=>array()]);
        }
            
        $destinationPath = public_path().'/images/advertisement/';

        if($mediaData = $request->file('Media'))
        {
            $imageName = md5(time() . '_' . $mediaData->getClientOriginalName()) . '.' . $mediaData->getClientOriginalExtension();
            if($mediaData->move($destinationPath, $imageName))
            {
                if(isset($ads))
                {
                    if(!empty($ads->media))
                    {
                        if(file_exists(public_path().'/images/advertisement/'.$ads->media))
                        unlink(public_path().'/images/advertisement/'.$ads->media);
                    }
                }
            }
        }

        if(isset($input['AdsID']) && !empty($input['AdsID']))
        {
            $ads=AdvertisementModel::find($input['AdsID']);
            $ads->name=$input['Name'];
            $ads->user_id=$input['RegisterId'];
            $ads->category_id=$input['CategoryId'];
            
            if(isset($input['Description']) && !empty($input['Description']))
            $ads->description=$input['Description'];
            
            if(isset($input['StartDate']) && !empty($input['StartDate']))
            $ads->start_date=date('Y-m-d',strtotime($input['StartDate']));

            if(isset($input['EndDate']) && !empty($input['EndDate']))
            $ads->end_date=date('Y-m-d',strtotime($input['EndDate']));

            if(isset($input['URL']) && !empty($input['URL']))
            $ads->url=$input['URL'];
            
            if(isset($input['Continously']) && !empty($input['Continously']))
            $ads->continously=$input['Continously'];
            
            if(isset($input['Media']))
            $ads->media=$imageName;

            $result=$ads->save();

            if($result)
            return response()->json(['Status'=>true,'StatusMessage'=>'Ads updated successfully!','OTP'=>"",'Result'=>[]]);
            else
            return response()->json(['Status'=>false,'StatusMessage'=>'Ads not updated!','OTP'=>"",'Result'=>[]]);
        }
        else
        {
            
            $result=AdvertisementModel::create([
            'name'=>$input['Name'],
            'user_id'=>$input['RegisterId'],
            'category_id'=>$input['CategoryId'],
            'description'=>!empty($input['Description'])?$input['Description']:NULL,
            'start_date'=>!empty($input['StartDate'])?date('Y-m-d',strtotime($input['StartDate'])):NULL,
            'end_date'=>!empty($input['EndDate'])?date('Y-m-d',strtotime($input['EndDate'])):NULL,
            'url'=>!empty($input['URL'])?$input['URL']:NULL,
            'media'=>!empty($imageName)?$imageName:NULL,
            'continously'=>!empty($input['Continously'])?$input['Continously']:NULL
            ]);
            
                /*$emailBody='<!DOCTYPE html>
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
*/                

            if($result)
            {
                /*$otp=rand(1000,9999);
                $message_body = str_replace(array('[OTP]'),array($otp), $emailBody);
                try   
                {
                    $to = $user->email;

                    mail($to, $subject, $message_body, $headers);
                } catch (Exception $e) {
                    echo 'Message: ' . $e->getMessage();
                }
                
                
                return response()->json(['Status'=>true,'Message'=>'Ads added successfully!'
                ,'OTP'=>strval($otp),'Result'=>[$record]]);
                */
                
                $record=['id'=>strval($result->id)];
                
                return response()->json(['Status'=>true,'StatusMessage'=>'Ads added successfully!'
                ,'OTP'=>'','Result'=>[$record]]);
            }
            else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'Ads not added!','OTP'=>"",'Result'=>[]]);
            }
        }

    }
    public function getUserAdvertisementList(Request $request)
    {
        $input=$request->all();

        $userId=isset($input['RegisterId'])?$input['RegisterId']:'';

        $advertisementData=AdvertisementModel::with(['user','categories'])
        ->where('user_id',$userId)->get()->toArray();
        
        $advertisementArray=array();

        $total_counts=count($advertisementData);
        for($i=0;$i<$total_counts;$i++)
        {
            //!empty($forum[$i]['user']['user_image'])?URL::to('/images/user').'/'.$forum[$i]['user']['user_image']:'';

            $advertisementArray[$i]['Id']=strval($advertisementData[$i]['id']);
            $advertisementArray[$i]['Name']=!empty($advertisementData[$i]['name'])?$advertisementData[$i]['name']:'';
            $advertisementArray[$i]['UserName']=!empty($advertisementData[$i]['user']['name'])?$advertisementData[$i]['user']['name']:'';
            $advertisementArray[$i]['CategoryName']=!empty($advertisementData[$i]['categories']['name'])?$advertisementData[$i]['categories']['name']:'';
            $advertisementArray[$i]['Description']=!empty($advertisementData[$i]['description'])?$advertisementData[$i]['description']:'';
            $advertisementArray[$i]['Continously']=!empty($advertisementData[$i]['continously'])?$advertisementData[$i]['continously']:'';
            $advertisementArray[$i]['StartDate']=!empty($advertisementData[$i]['start_date'])?$advertisementData[$i]['start_date']:'';
            $advertisementArray[$i]['EndDate']=!empty($advertisementData[$i]['end_date'])?$advertisementData[$i]['end_date']:'';
            $advertisementArray[$i]['URL']=!empty($advertisementData[$i]['url'])?$advertisementData[$i]['url']:'';
            
            $media_path=public_path().'/images/advertisement/'.$advertisementData[$i]['media'];
            $media='';
            if(!empty($advertisementData[$i]['media']))
            {    
                if(file_exists($media_path))
                {
                    $media=URL::to('/images/advertisement/').'/'.$advertisementData[$i]['media'];
                }
            }

            $advertisementArray[$i]['Media']=$media;
            $advertisementArray[$i]['Type']=!empty($advertisementData[$i]['type'])?$advertisementData[$i]['type']:'';
            $advertisementArray[$i]['Status']=!empty($advertisementData[$i]['status'])?$advertisementData[$i]['status']:'';
            $advertisementArray[$i]['Date']=!empty($advertisementData[$i]['created_at'])?date('d-m-Y',strtotime($advertisementData[$i]['created_at'])):'';
            $advertisementArray[$i]['Time']=!empty($advertisementData[$i]['created_at'])?date('H:i:s',strtotime($advertisementData[$i]['created_at'])):'';
        }

            if($total_counts > 0)
            {
                return response()->json(['Status'=>true,'StatusMessage'=>'Get My Advertisement List successfully!'
                ,'Result'=>$advertisementArray]);
            }
            else
            {
                return response()->json(['Status'=>false,'StatusMessage'=>'No Data Available!','Result'=>[]]);
            }
    }
}