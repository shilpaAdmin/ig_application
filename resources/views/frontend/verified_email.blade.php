@extends('frontend.layouts.master')
@section('title') Verifyied Email @endsection
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body>



        <div class="preloader">
            <img src="{{ URL::asset('assets/frontend/images/loader.png') }}" class="preloader__image" alt="">
        </div><!-- /.preloader -->

        <div class="page-wrapper">

            <section class="page-header backgroundimglogin">
                <div class="overlayforcontactbg"></div>
                <div class="container">
                    <h2 class="h2_oth_pgs">Verified email</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Verified email</span></li>
                    </ul>
                </div>
            </section>


            <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
                <div class="container">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <h2 class="text-center pb-2">Verified! </h2>
                                <div class="login_box">

                                    <div class="text-center verify_img_box">
                                        <img src="{{ URL::asset('assets/frontend/images/resources/verified-email.png') }}"
                                            alt="">
                                    </div>




                                    <div class="text-center mt-3 mb-3"> Yahoo! you have Successfully verified
                                        the Advertisement </div>





                                    <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Send request for
                                        approval</button>

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
