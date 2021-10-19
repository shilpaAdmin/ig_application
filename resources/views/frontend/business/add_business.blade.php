@extends('frontend.layouts.master')
@section('title') add business @endsection
@section('content')
    {{-- <!DOCTYPE html>
<html lang="en">

<body> --}}

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
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            CA Services</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Accounting Bookkeeping</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i>
                            Auditors</a> </div>
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

    <div class="page-wrapper">


    </div>


    <section class="page-header backgroundimgaddadv">
        <div class="overlayforcontactbg"></div>
        <div class="container">
            <h2 class="h2_oth_pgs">Add Business</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>Add Business</span></li>
            </ul>
        </div>
    </section>


    <section class="forum_padding mb-20 pt-5 mt-2 ">
        <div class="container">


                <h3 class="text-center pb-5">You are one step far from Posting a Business</h3>

                <h4 class="add_service_h4"> Business Details </h4>
                <form class="needs-validation" method="post" enctype="multipart/form-data" id='advertisement-store'
                    action="{{ route('business.save') }}" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail1">Business Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                                    placeholder="Business Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail1">About</label>
                                <input type="text" class="form-control" name="about" id="about"
                                    aria-describedby="emailHelp" placeholder="Type Something">
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


                    <div class="row">
                        <div class="col-md-1 align-self-center">
                            <h5 class="add_service_h5 text-md-right"> Monday</h5>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">From</label>
                                <select class="form-control" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" id="exampleFormControlSelect2">
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
                                <select class="form-control" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" id="exampleFormControlSelect2">
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
                                <select class="form-control" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" id="exampleFormControlSelect2">
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
                                <select class="form-control" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" id="exampleFormControlSelect2">
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
                                <select class="form-control" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" id="exampleFormControlSelect2">
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
                                <select class="form-control" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" id="exampleFormControlSelect2">
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
                                <select class="form-control" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">To</label>
                                <select class="form-control" id="exampleFormControlSelect2">
                                    @include('frontend.business.hours_data')
                                </select>
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
                                <input type="text" class="form-control" name="contact_person_name"
                                    id="contact_person_name" aria-describedby="emailHelp" placeholder="Enter Name">
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
                                <input type="file" class="form-control-file file-upload-input" name="" id="">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn thm-btn2 px-5">Click to get verification code</button>
                        </div>

                    </div>
                </form>
        </div>
    </section>

    {{-- </body>
</html> --}}
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#Businesscategory').on('change', function() {
            var businesscatID = $(this).val();
            // alert(businesscatID);
            if (businesscatID) {
                $.ajax({
                    url: '/business/sub/category/' + businesscatID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            $('#Subcategory').empty();
                            $('#Subcategory').append(
                                '<option value="">--Sub-Category--</option>');
                            $.each(data, function(key, value) {
                                $('select[name="subcategory"]').append(
                                    '<option value="' + key + '">' + value
                                    .name + '</option>');


                            });
                        } else {
                            $('#Subcategory').empty();
                        }
                    }
                });
            } else {
                $('#applicantdata').empty();
            }
        });
    });
</script>