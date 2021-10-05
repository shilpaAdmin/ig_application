@extends('layouts.master-without-nav')

@section('title')
Login
@endsection
@section('css')
<style>
body,
html {
    height: 100%;
}

body {
    position: relative;
}

.account-pages {
    transform: translate(-50%, -50%);
    position: absolute;
    a;
    top: 50%;
    left: 50%;
    width: 100%;
    margin: 0 !important;
}
</style>
@endsection
@section('body')

<body>
    @endsection

    @section('content')
    <!-- <div class="home-btn d-none d-sm-block">
        <a href="{{url('index')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div> -->
    <div class="account-pages my-4">
        <div class="container">
            <div class="login_logo">
                <img src="/assets/images/IG-dark.png" style="width: 100px;
    height: 70px;">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden mb-2">
                        <div class="bg-soft-primary">
                            <div class="row d-flex align-items-center">
                                <div class="col-6">
                                    <div class="text-primary p-4">
                                        <!-- <h5 class="text-primary">Welcome Back !</h5> -->
                                        <h5>Sign in to IG.</h5>
                                    </div>
                                </div>
                                <div class="col-6 align-self-end mob_imiage_part">
                                    <!-- <img src="assets/images/profile-img.png" alt="" class="img-fluid"> -->
                                    <img src="../assets/images/IG-mob.png" alt="" class="img-fluid">
                                </div>

                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="{{url('index')}}">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title bg-light">
                                            <img src="/assets/images/img_347562.png" alt="" class="" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ route('admin.authenticate') }}">
                                {{-- <form class="form-horizontal" method="POST" action="#"> --}}
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" @if(old('email'))
                                            value="{{ old('email') }}" @else value="shilpa@gmail.com" @endif
                                            id="username" placeholder="Enter username" autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            id="userpassword" value="123456" placeholder="Enter password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between">

                                        <div class="text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="forgot_pass text-right">
                                            <a href="password/reset" class="text-muted"><i
                                                    class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                    </div>


                            </div>

                            <div class="mt-3">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log
                                    In</button>
                            </div>

                            <!-- <div class="mt-4 text-center">
                                        <h5 class="font-size-14 mb-3">Sign in with</h5>

                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> -->

                            <!-- <div class="mt-4 text-center">
                                        <a href="password/reset" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                    </div> -->
                            </form>
                        </div>
                    </div>

                </div>

                <!--   <div class="text-center" style="    width: 100%;">
                  
                    <p class="mb-0">© <script>
                        document.write(new Date().getFullYear())
                        </script> NewsFirst</p>
                </div> -->

            </div>
        </div>
    </div>
    </div>
    @endsection