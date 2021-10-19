<!DOCTYPE html>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <!--css styles ends-->
    <!--common jquery starts-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!--common jquery end-->

    <style>
        a,
        button,
        .btn {
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

            *,
            *:before,
            *:after {
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
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
                        <table border="0" align="center" cellpadding="0" cellspacing="0"
                            style="max-width: 600px; width: 600px; margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table border="0" cellpadding="15" cellspacing="0" align="center" width="100%"
                                            style="background-color: #434c64;">
                                            <tbody>
                                                <tr>
                                                    <td style="">
                                                        <div class="top_call" style="float: left;">
                                                            <a style="color: #fff; text-decoration: none; font-family: Montserrat;"
                                                                href="tel: +910000000000">
                                                                <img src="https://foodalios.testingbeta.in/images/email/Call.png"
                                                                    width="35" height="35" style="width: 18px;
        height: 16px; vertical-align: middle;" />+91 000 0000 000</a>
                                                        </div>
                                                        <div class="top_call" style="float: right;">
                                                            <a style="color: #fff; text-decoration: none; font-family: Montserrat;"
                                                                href="mailto: testing@gmail.com">
                                                                <img src="https://foodalios.testingbeta.in/images/email/Mail.png"
                                                                    width="35" height="35" style="width: 20px;
        height: 20px; vertical-align: middle;" />
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table width="100%" border="0" align="center" cellpadding="10" cellspacing="0"
                                            style="background-color: #dadada; padding: 15px;">
                                            <tbody>
                                                <tr>
                                                    <td align="center">
                                                        <h1
                                                            style="color: DodgerBlue; font-size: 25px; font-family:  sans-serif; margin: 0;padding-bottom: 10px;">
                                                            IG </h1>
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
                                        padding-bottom: 10px;">{{ $test_message }}</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="center"
                                                        style="border-top: solid 1px #fff; border-bottom: solid 1px #fff;">
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
                                        <table border="0" cellpadding="15" cellspacing="0" align="center" width="100%"
                                            style="background-color: #434c64;">
                                            <tbody>
                                                <tr>

                                                    <td style="">
                                                        <div class="top_call" style="float: left;">
                                                            <p style="margin: 0;">
                                                                <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;margin-right: 10px;
                                            font-size: 20px;" href="#">
                                                                    <img src="https://foodalios.testingbeta.in/images/email/FB.png"
                                                                        width="35" height="35" />
                                                                    <!--<i class="fa fa-facebook" aria-hidden="true"></i>-->
                                                                </a>
                                                                <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;margin-right: 10px;
                                            font-size: 20px;" href="#">
                                                                    <img src="https://foodalios.testingbeta.in/images/email/Linkedin.png"
                                                                        width="35" height="35" />
                                                                    <!--<i class="fa fa-linkedin" aria-hidden="true"></i>-->
                                                                </a>
                                                                <a style="color: #fff; text-decoration: none;width: 35px; height: 35px;display: inline-block;                            text-align: center;
                                            background-color: transparent; border: solid 1px #fff; line-height: 35px;
                                            border-radius: 50px;
                                            font-size: 20px;" href="#">
                                                                    <img src="https://foodalios.testingbeta.in/images/email/Twitter.png"
                                                                        width="35" height="35" />
                                                                    <!--<i class="fa fa-twitter" aria-hidden="true"></i>-->
                                                                </a>
                                                            </p>

                                                        </div>
                                                        <div class="top_call" style="float: right;">
                                                            <p
                                                                style="margin: 0; color: #fff; font-family: Montserrat; padding-top: 10px;">
                                                                © 2021 IG.</p>
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

</html>

