@extends('frontend.layouts.master')
@section('title') SignUp @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">

<body>

    <div class="preloader">
        <img src="{{URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <section class="page-header backgroundimglogin">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Signup</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Signup</span></li>
                </ul>
            </div>
        </section>


        <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2 class="text-center pb-2">Lets Create your Account</h2>
                        <div class="login_box">

                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail2">Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail2"
                                    aria-describedby="emailHelp" placeholder="Enter Name">
                            </div>


                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail3">Contact No</label>
                                <input type="email" class="form-control" id="exampleInputEmail3"
                                    aria-describedby="emailHelp" placeholder="Enter Contact No">
                            </div>

                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Password">
                            </div>


                            <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Sign Up</button>

                            <div class="w-50 float-left forgot-pwd-link mb-3">
                                <a href="#">&nbsp; </a>
                            </div>

                            <div class="form-check w-50 float-left text-right forgot-pwd-link mb-3">
                                <a href="{{ route('Login') }}"> Already have an account? Login </a>
                            </div>

                            <div class="text-center mt-3 mb-3"> OR <br> Signup with </div>
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <div class="social_login_box">
                                        <a href="#"> <img src="{{ URL::asset('assets/frontend/images/resources/google.png')}}" alt=""> </a>
                                    </div>

                                    <div class="social_login_box">
                                        <a href="#"> <img src="{{ URL::asset('assets/frontend/images/resources/fb.png')}}" alt=""> </a>
                                    </div>

                                    <div class="social_login_box">
                                        <a href="#"> <img src="{{ URL::asset('assets/frontend/images/resources/apple.png')}}" alt=""> </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>
@endsection
