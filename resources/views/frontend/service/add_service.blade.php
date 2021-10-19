@extends('frontend.layouts.master')
@section('title') Add Service @endsection
@section('content')


    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png') }}" class="preloader__image" alt="" >
    </div><!-- /.preloader -->


    <section class="page-header backgroundimgaddadv" id="BusinessFormHideTitle">
        <div class="overlayforcontactbg"></div>
        <div class="container">
            <h2 class="h2_oth_pgs">Add Service</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{route('/')}}">Home</a></li>
                <li><span>Add Service</span></li>
            </ul>
        </div>
    </section>


    <section class="forum_padding mb-20 pt-5 mt-2" id="BusinessForm">
        <div class="container">


            <h3 class="text-center pb-5">You are one step far from Posting a Service</h3>

            <h4 class="add_service_h4"> Service Details </h4>

            <form class="needs-validation" method="post" enctype="multipart/form-data" id='Business-store'
                action="{{ route('business.save') }}" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label_theme" for="exampleInputEmail1">Service Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                                placeholder="Service Name">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label_theme" for="exampleInputEmail1">About</label>
                            <input type="text" class="form-control" name="about" id="about" aria-describedby="emailHelp"
                                placeholder="Type Something">
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="label_theme">Category</label>
                            <select class="form-control" name="category_id" id="Businesscategory">
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label_theme" for="exampleFormControlTextarea1">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label_theme" for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="label_theme">USP</label>
                            <select class="form-control" name="subcategory" id="Subcategory">
                                <option value="">--Select--</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label_theme" for="exampleInputEmail1">Actual Price</label>
                            <input type="email" class="form-control" name="actual_price" id="actual_price"
                                aria-describedby="emailHelp" placeholder="Enter Actual Price">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label_theme" for="exampleInputEmail1">Selling Price</label>
                            <input type="email" class="form-control" name="selling_price" id="selling_price"
                                aria-describedby="emailHelp" placeholder="Enter Selling Price">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12"> <label class="label_theme">Hours of operation</label> </div>
                    <div class="col-md-12">
                        <div class="form-check ">
                            <input class="form-check-input theme-check-form" type="radio" name="display_hours"
                                id="inlineRadio1" value="no">
                            <label class="form-check-label theme-check-label" for="inlineRadio1">Do not Display Hours
                                of Operation</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="display_hours"
                                id="inlineRadio2" value="yes">
                            <label class="form-check-label theme-check-label" for="inlineRadio2">Display Hours of
                                Operation</label>
                        </div>
                    </div>
                </div>

                <div data-repeater-list="hours_detail">
                    <div class="row">
                        <div class="col-md-1 align-self-center">
                            <h5 class="add_service_h5 text-md-right"> Monday</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">From</label>
                                <select class="form-control" name="start_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" name="end_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 align-self-center">
                            <h5 class="add_service_h5 text-md-right"> Tuesday</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">From</label>
                                <select class="form-control" name="start_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" name="end_time" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-1 align-self-center">
                            <h5 class="add_service_h5 text-md-right"> Wednesday</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">From</label>
                                <select class="form-control" name="start_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" name="end_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 align-self-center">
                            <h5 class="add_service_h5 text-md-right"> Thursday</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">From</label>
                                <select class="form-control" name="start_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" name="end_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 align-self-center">
                            <h5 class="add_service_h5 text-md-right"> Friday</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">From</label>
                                <select class="form-control" name="start_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" name="end_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-1 align-self-center">
                            <h5 class="add_service_h5  text-md-right"> Saturday</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">From</label>
                                <select class="form-control" name="start_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" name="end_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 align-self-center">
                            <h5 class="add_service_h5 text-md-right"> Sunday</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">From</label>
                                <select class="form-control" name="start_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" name="end_time" id="">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12"> <label class="label_theme">Payment mode accepted by you</label>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="form-check ">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio3" value="cash">
                            <label class="form-check-label theme-check-label" for="inlineRadio3">Cash</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio4" value="debit_card">
                            <label class="form-check-label theme-check-label" for="inlineRadio4">Debit Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio5" value="credit_card">
                            <label class="form-check-label theme-check-label" for="inlineRadio5">Credit Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio6" value="master_card">
                            <label class="form-check-label theme-check-label" for="inlineRadio6">Master Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio7" value="cash_on_delivery">
                            <label class="form-check-label theme-check-label" for="inlineRadio7">Cash on
                                Delivery</label>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <div class="form-check ">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio13" value="upi">
                            <label class="form-check-label theme-check-label" for="inlineRadio13">UPI</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio14" value="phone_pe">
                            <label class="form-check-label theme-check-label" for="inlineRadio14">Phone pe</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio15" value="google_pay">
                            <label class="form-check-label theme-check-label" for="inlineRadio15">Google pay</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio16" value="paytam">
                            <label class="form-check-label theme-check-label" for="inlineRadio16">Paytm</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input theme-check-form" type="radio" name="payment_mode"
                                id="inlineRadio17" value="amazon_pay">
                            <label class="form-check-label theme-check-label" for="inlineRadio17">Amazon pay</label>
                        </div>
                    </div>
                </div>

                <h4 class="add_service_h4 mt-5"> Contact Details </h4>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label_theme" for="exampleInputEmail1">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person_name" id="contact_person_name"
                                aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label_theme" for="exampleInputEmail1">Mobile Num</label>
                            <input type="number" class="form-control" name="mobile_number" id="mobile_number"
                                aria-describedby="emailHelp" placeholder="Enter number">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label_theme" for="exampleInputEmail1">Email ID</label>
                            <input type="email" class="form-control" name="email_id" id="email_id"
                                aria-describedby="emailHelp" placeholder="Enter email ID">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label_theme" for="exampleInputEmail1">Website</label>
                            <input type="email" class="form-control" name="website" id="website"
                                aria-describedby="emailHelp" placeholder="Enter URL">
                        </div>
                    </div>

                </div>

                <h4 class="add_service_h4 mt-5"> Upload Media </h4>

                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <div class="label_theme mb-2"> Upload Your File </div>
                            <label class="label_theme uploadfile_label" for="exampleFormControlFile1"> Drag and drop or
                                Browse </label>
                            <input type="file" class="form-control-file file-upload-input" name="media_file_json"
                                id="exampleFormControlFile1">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 mt-2">
                        <a href="#" id="Getotp" class="btn thm-btn2 px-5">Click to get verification code</a>
                        {{-- <button type="submit" class="btn thm-btn2 px-5">Click to get verification code</button> --}}
                    </div>

                </div>
            </form>
        </div>
    </section>

    {{-- Verifying your email --}}
    <div class="page-wrapper" id="verifyform" style="display: none">
        <section class="page-header backgroundimglogin">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Verifying your email</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('/') }}">Home</a></li>
                    <li><span>Verifying your email</span></li>
                </ul>
            </div>
        </section>


        <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
            <div class="container">
                <form action="">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <h2 class="text-center pb-2">Verifying your email</h2>
                            <div class="login_box">

                                <div class="text-center verify_img_box">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/verify-email.png') }}"
                                        alt="">
                                </div>

                                <div class="text-center mt-3 mb-3"> Please Enter the 4 digit code sent to
                                    <Br /> {{ $user[0]['email'] }}
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="firstbox" id="firstbox"
                                                maxlength="1" aria-describedby="emailHelp" autofocus>
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="secondbox"
                                                maxlength="1" id="secondbox" aria-describedby="emailHelp" autofocus>
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="thirdbox" id="thirdbox"
                                                maxlength="1" aria-describedby="emailHelp" autofocus>
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="fourthbox"
                                                maxlength="1" id="fourthbox" aria-describedby="emailHelp" autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-3 mb-3"> <a href="#"> Resend Code </a> </div>

                                {{-- <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100" onClick="verifyOTP();">Confirm</button> --}}
                                <a href="#" id="verifyOtp" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Confirm</a>
                                <input type="hidden" name="verifyemail" id="verifyemail"
                                    value="{{ $user[0]['email'] }}" />

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div><!-- /.page-wrapper -->

    {{-- Verified! html --}}
    <div class="page-wrapper" id="verifiedEmailForm" style="display: none">

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


                                {{-- <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Send request for
                                approval</button> --}}
                                <a href="#" id="submitData" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Send request
                                    for
                                    approval</a>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div><!-- /.page-wrapper -->

@endsection


@section('script')
    @include('frontend.business.otp_send_js')
@endsection
