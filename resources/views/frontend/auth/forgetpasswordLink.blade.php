@extends('frontend.layouts.master')
@section('title') Reset Password @endsection
@section('content')

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <section class="page-header backgroundimglogin">
        <div class="overlayforcontactbg"></div>
        <div class="container">
            <h2 class="h2_oth_pgs">Reset Password</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{route('login')}}">Home</a></li>
                <li><span>Reset Password</span></li>
            </ul>
        </div>
    </section>


    <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
        <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2 class="text-center pb-2">Reset Password</h2>
                        <div class="login_box">
                            <form action="{{route('user.reset.password.post')}}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label class="label_theme" for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="label_theme" for="exampleInputEmail1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required autofocus>
                                    @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="label_theme" for="password-confirm">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control"  aria-describedby="emailHelp" placeholder="Confirm Password" required autofocus>
                                    @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>


                                <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100 login-btn">Reset Password</button>
                            </form>
                            <div class="w-50 float-left forgot-pwd-link mb-3">
                                <a href="#">  &nbsp; </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    @section('script')

        <script>
            $(document).ready(function () {
                
            });
             
        </script>
    @endsection
@endsection

