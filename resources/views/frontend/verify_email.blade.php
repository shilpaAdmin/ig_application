@extends('frontend.layouts.master')
@section('title') Verifying Email @endsection
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body>


        <div class="preloader">
            <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
        </div><!-- /.preloader -->

        <div class="page-wrapper">
            <section class="page-header backgroundimglogin">
                <div class="overlayforcontactbg"></div>
                <div class="container">
                    <h2 class="h2_oth_pgs">Verifying your email</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Verifying your email</span></li>
                    </ul>
                </div>
            </section>


            <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
                <div class="container">
                    <form action="verified-email.html">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <h2 class="text-center pb-2">Verifying your email</h2>
                                <div class="login_box">

                                    <div class="text-center verify_img_box">
                                        <img src="{{ URL::asset('assets/frontend/images/resources/verify-email.png')}}" alt="">
                                    </div>

                                    <div class="text-center mt-3 mb-3"> Please Enter the 4 digit code sent to
                                        <Br /> Arielle77@yahoo.com
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="verify_email_box">
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>

                                            <div class="verify_email_box">
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>

                                            <div class="verify_email_box">
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>

                                            <div class="verify_email_box">
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="text-center mt-3 mb-3"> <a href="#"> Resend Code </a> </div>





                                    <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Confirm</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div><!-- /.page-wrapper -->

    </body>
    </html>
    @endsection
