@extends('layouts.master-without-nav')

@section('title')
Reset Passwords
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
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="login_logo">
                <img src="../assets/images/logo-dark.png">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row d-flex align-items-center">
                                <div class="col-6">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> Forgot Password</h5>
                                        <p>Re-Password with NewsFirst.</p>
                                    </div>
                                </div>
                                <div class="col-6 align-self-end mob_imiage_part">
                                    <!-- <img src="assets/images/profile-img.png" alt="" class="img-fluid"> -->
                                    <img src="../assets/images/same_mob.png" alt="" class="img-fluid">
                                </div>

                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <!-- <div>
                                <a href="{{url('index')}}">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="/assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div> -->
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" @if(old('email'))
                                            value="{{ old('email') }}" @endif id="username" placeholder="Enter Email Id"
                                            autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Send</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="{{url('login')}}" class="font-weight-medium text-primary"> Sign In
                                here</a> </p>

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