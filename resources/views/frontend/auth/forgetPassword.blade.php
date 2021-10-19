@extends('frontend.layouts.master')
@section('title') Forgot Password @endsection
@section('content')
    <div class="preloader">
        <img src="{{URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <section class="page-header backgroundimglogin">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Forgot Password</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('login')}}">Home</a></li>
                    <li><span>Forgot Password</span></li>
                </ul>
            </div>
        </section>


        <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2 class="text-center pb-2">Forgot Password ?</h2>
                        <div class="login_box">

                            @if (session()->has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="text-center">
                                Enter your registered email below to receive password reset instruction
                            </div>
                           
                            <form action="{{route('user.forget.password.post')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="label_theme" for="exampleInputEmail1" nae>Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}"
                                        aria-describedby="emailHelp" placeholder="Enter email" required>
                                    @if($errors->has('email'))
                                        <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Send</button>
                            </form>
                            <div class="form-check text-center forgot-pwd-link my-3">
                                <a href="{{ route('login') }}"> Back to Login </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      </div><!-- /.page-wrapper -->
@endsection
