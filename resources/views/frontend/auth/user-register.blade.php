@extends('frontend.layouts.master')
@section('title') SignUp @endsection
@section('content')

    <div class="preloader">
        <img src="{{URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <section class="page-header backgroundimglogin">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Signup</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('/')}}">Home</a></li>
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
                            <form action="{{route('user.register')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="label_theme" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="emailHelp" placeholder="Enter Name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label class="label_theme" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="label_theme" for="mobile_number">Contact No</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                                        aria-describedby="emailHelp" placeholder="Enter Contact No">
                                    @if ($errors->has('mobile_number'))
                                        <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="label_theme" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        aria-describedby="emailHelp" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                
                                <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Sign Up</button>

                            </form>

                            <div class="w-50 float-left forgot-pwd-link mb-3">
                                <a href="#">&nbsp; </a>
                            </div>

                            <div class="form-check w-50 float-left text-right forgot-pwd-link mb-3">
                                <a href="{{ route('login') }}"> Already have an account? Login </a>
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

    </div>
@endsection
