@extends('frontend.layouts.master')
@section('title') Login @endsection
@section('content')

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <section class="page-header backgroundimglogin">
        <div class="overlayforcontactbg"></div>
        <div class="container">
            <h2 class="h2_oth_pgs">Login</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>Login</span></li>
            </ul>
        </div>
    </section>


    <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
        <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2 class="text-center pb-2">Welcome Back</h2>
                       
                        <div class="login_box">
                            <form action="{{route('user.authenticate')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="label_theme" for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label class="label_theme" for="exampleInputEmail1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                                </div>

                                <div class="form-check w-50 float-left">
                                    <input type="checkbox" class="form-check-input theme-check-form" id="rememberme" name='rememberme' value="1">
                                    <label class="form-check-label theme-check-label" for="rememberme">Remember Me</label>
                                </div>
                                
                                <div class="form-check w-50 float-left text-right forgot-pwd-link">
                                    <a href="{{ route('user.forget.password.get') }}"> Forgot Password? </a>
                                </div>

                                <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100 login-btn">Login</button>
                            </form>
                            <div class="w-50 float-left forgot-pwd-link mb-3">
                                <a href="#">  &nbsp; </a>
                            </div>

                            <div class="form-check w-50 float-left text-right forgot-pwd-link mb-3">
                                <a href="{{ route('Signup')}}"> Don't have an account? Sign Up</a>
                            </div>



                            <div class="text-center mt-3 mb-3"> OR <Br/>  Login with  </div>
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
    
    @section('script')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script>
            $(document).ready(function () {
                
                // $(document).on('click','.login-btn',function(e) {
                //     e.preventDefault();
                //     var url="{{route('api.login')}}";
                //     var email=$('input[name="email"').val();
                //     var password=$('input[name="password"').val();
                    
                //     console.log(url);
                //     console.log(email);
                //     console.log(password);

                //     $.ajax({
                //         type:'POST',
                //         url:url,
                //         dataType:'json',
                //         data:{
                //             'email':email,
                //             'password':password
                //         },
                //         async:true,
                //         beforeSend : function()
                //         {
                //             $(".preloader").show();	// Show loader
                //         },
                //         success:function(data)
                //         {
                //             console.log("sucess");
                //             console.log(data.Result[0]);
                //             console.log(data.Result[0].user['AccessToken']);
                //             // $.cookie('token');
                //            var token =data.Result[0].user['AccessToken'];
                //             // $.cookie("token", token);
                          
                //             $.cookie("token", token, { expires: 30 / 1440, path: '/' });
                //             $.cookie("user", JSON.stringify(data.Result[0].user), { expires: 30 / 1440, path: '/' });
                //             // $.removeCookie('token', { path: '/' });
                //             // $.cookie("token", null, { expires: -1,path: '/' });
                //             // $(".preloader").hide();
                //             var redirectUrl="{{route('/')}}";
                //             location.assign(redirectUrl);
                           
                           
                //         },
                //         error:function(XMLHttpRequest, errorStatus, errorThrown)
                //         {
                //             console.log("XHR :: "+JSON.stringify(XMLHttpRequest));
                //             console.log("Status :: "+errorStatus);
                //             console.log("error :: "+errorThrown);
                //             $("#fullImageDivError").text('There is something wrong. Please try again');
                //             $("#fullImageDivError").show();
                //             $(".preloader").hide();
                //         }
                //     });
                // });


              



            });

                

             
        </script>
    @endsection
@endsection

