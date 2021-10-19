@extends('frontend.layouts.master')
@section('title') Add Advertisment @endsection
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-light" rel="stylesheet" type="text/css" />

@section('content')


    {{-- <!-- Modal location-->
    <div class="modal fade" id="exampleModallocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="select_location">
                                <div>Berlin <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Hamburg <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Munich <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Cologne <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div>Stuttgart <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Dortmund <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Essen <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div>Leipzig <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Bremen <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                                <div> Dresden <a href="#" class="float-right d-inline-block location_a"> Select
                                        Location</a></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary background_green" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal location-->


    <!-- Modal housing-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Housing Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="housing-listing-grid.html"><i
                                class="fas fa-angle-right"></i> House For Rent</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"> <i class="fas fa-angle-right"></i>
                            AC Service & Repair</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Washing Machine Repairs</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Air Cooler Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Audio Visual Equipment Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Industrial Voltage Stabilizers Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Solar Water Heaters</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Fire Fighting Equipment</a> </div>

                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Washing machine dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Microwave Oven Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Firefighting Equipment Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Water Dispenser Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Modular Kitchen Dealers</a> </div>

                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Generators Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Gas Water Heater Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Sign Board Agencies</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Mixer Grinder Dealers</a> </div>



                </div>
            </div>
        </div>
    </div>


    <!-- Modal taxation-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Taxation Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="taxation-listing-grid.html"><i
                                class="fas fa-angle-right"></i> Taxation</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> CA Services</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Accounting Bookkeeping</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Auditors</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> GST Consultants</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Company Registration</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Tax Consultants</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Tax Return Filing</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> FSSAI License</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> ESI & PF</a> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Education-->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Education Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="education-listing-grid.html"><i
                                class="fas fa-angle-right"></i> Education</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Entrance Exam Coaching</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Job Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Overseas Education</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Corporate Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Computer Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Design Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Financial Training</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Language Classes</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Entrance Coaching</a> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Jobs-->
    <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="job-listing-grid.html"><i
                                class="fas fa-angle-right"></i> Jobs</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Marketing</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Design</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Project Management</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Automotive Jobs</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Human Resource</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> IT / Computer</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Customer Service</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Health & Care</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Accounting</a> </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal travel-->
    <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Travel & Transport Categories
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="tourtravel-listing-grid.html"><i
                                class="fas fa-angle-right"></i> Travel & Transport</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Bus Travel Agents</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Train Travel Agents</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Tour Operators</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Hotels</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Vehicle Rentals</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Transport Services</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Travel Consultants</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Cargo & Shipping</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Travel Consultants</a> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal event-->
    <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="event-listing-grid.html"> <i
                                class="fas fa-angle-right"></i> Event</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Seminars</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Conferences</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Trade shows</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Themed parties</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Webinars</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Interactive performances</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Music festivals</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Food festivals</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i
                                class="fas fa-angle-right"></i> Street parties</a> </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png') }}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper" id="AdvertismentFormHideTitle">

        <section class="page-header backgroundimgaddadv">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Add Advertisement</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Add Advertisement</span></li>
                </ul>
            </div>
        </section>


        <section class="forum_padding mb-20 pt-5 mt-2" id="AdvertismentForm">
            <div class="container">


                <h3 class="text-center pb-5">You are one step far from Posting a Free Advertisement</h3>
                <form class="needs-validation" method="post" enctype="multipart/form-data" id='advertisement-store'
                    action="{{ route('advertisements.save') }}" novalidate >
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter adv title" required>
                                <div class="invalid-feedback">
                                    Please provide a Title.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">Select Category</label>
                                <select class="form-control" name="category_id" id="exampleFormControlSelect2" required>
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Please provide a Select Category.
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                    rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Please provide a Description.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12"> <label class="label_theme">Duration</label> </div>
                        <div class="col-md-12">
                            <div class="form-check ">
                                <input class="form-check-input theme-check-form" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio1" value="Yes" required>
                                <label class="form-check-label theme-check-label" for="inlineRadio1">Run this
                                    advertisement continuously</label>


                            </div>
                            <div class="form-check">
                                <input class="form-check-input theme-check-form" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="No" required>
                                <label class="form-check-label theme-check-label" for="inlineRadio2">Choose when this
                                    ad will end</label>
                                <div class="invalid-feedback">
                                    Please provide a Duration.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail3">Start Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail3"
                                    aria-describedby="emailHelp" placeholder="Enter adv title" required>
                                <div class="invalid-feedback">
                                    Please provide a Start Date.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail4">End Date</label>
                                <input type="date" class="form-control disable" id="exampleInputEmail4"
                                    aria-describedby="emailHelp" placeholder="Enter adv title" required>
                                <div class="invalid-feedback">
                                    Please provide a End Date.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <div class="label_theme mb-2"> Upload Your File </div>
                                <label class="label_theme uploadfile_label" for="exampleFormControlFile1"> Drag and
                                    drop or Browse </label>
                                <input type="file" class="form-control-file file-upload-input" name="media"
                                    id="exampleFormControlFile1" required>
                                <div class="invalid-feedback">
                                    Please Upload Your File.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <input type="hidden" name="action" id="action" value="email" />
                            {{-- <input type="hidden" name="email" id="email" value="{{ $user[0]['email'] }}" /> --}}
                            {{-- <button type="submit" class="btn thm-btn2 px-5">Click to get verification code</button> --}}
                            <a href="#" id="Getotp" class="btn thm-btn2 px-5">Click to get verification code</a>
                        </div>

                    </div>
                </form>
            </div>
        </section>

    </div><!-- /.page-wrapper -->

    {{-- Verifying your email --}}
    <div class="page-wrapper" id="verifyform" style="display: none">
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
                                                aria-describedby="emailHelp">
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="secondbox"
                                                id="secondbox" aria-describedby="emailHelp">
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="thirdbox" id="thirdbox"
                                                aria-describedby="emailHelp">
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="fourthbox"
                                                id="fourthbox" aria-describedby="emailHelp">
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
                                <a href="#" id="submitData" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Send request for
                                    approval</a>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div><!-- /.page-wrapper -->


@endsection

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="{{ URL::asset('assets/js/pages/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();


    $(document).ready(function() {
        $("body").on('click', '#Getotp', function(event) {

            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('requestOtp') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {

                },
                success: function(data) {

                    $('#AdvertismentForm').hide();
                    $('#AdvertismentFormHideTitle').hide();
                    $('#verifiedEmailForm').hide();
                    $('#verifyform').show();

                }
            })
        });


        //verify otp

        $("body").on('click', '#verifyOtp', function(event) {

            firstbox = $("#firstbox").val();
            secondbox = $("#secondbox").val();
            thirdbox = $("#thirdbox").val();
            fourthbox = $("#fourthbox").val();

            verifyemail = $("#verifyemail").val();


            var str = firstbox + secondbox + thirdbox + fourthbox;


            $.ajax({
                url: "{{ route('otpverify') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    'otp': str,
                    'email': verifyemail
                },
                success: function(response) {

                    $('#verifiedEmailForm').show();
                    $('#verifyform').hide();

                }
            });
        });


        //verified email
        $("body").on('click', '#submitData', function(event) {

            event.preventDefault();
            $('#advertisement-store').submit();
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': "{{ csrf_token() }}"
            //     }
            // });

            // $.ajax({
            //     url: "{{ route('advertisement.store') }}",
            //     type: 'POST',
            //     dataType: "json",
            //     data: $('form#submitData').serialize(),
            //     success: function(response) {

            //       alert('hiii');

            //     }
            // });
        });

    });
</script>
