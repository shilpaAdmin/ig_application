@extends('frontend.layouts.master')
@section('title') Homepage @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<body>

    <!-- Modal location-->
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

    <!-- Modal listing-->
    <div class="modal fade" id="exampleModallisting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Listing type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <a href="add-service.html"> Add Service</a>
                            </div>
                            <div>
                                <a href="add-business.html"> Add Business</a>
                            </div>
                            <div>
                                <a href="add-advertisement.html"> Add Advertisement</a>
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
    </div>
    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <section class="listings_three_content">
            <div class="container">


                <div class="filter_by_tags">

                    <div class="row">
                        <div class="col-xl-2 col-md-4">
                            <h3 class="filter_by_tagstitile">Filters<i class="fas fa-chevron-down filtertagicon"></i>
                            </h3>
                        </div>
                    </div>

                    <div class="filter_by_tagsall">

                        <div class="row">
                            <div class="col-xl-12">
                                <form class="listings_one_content_left_form">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <input type="text" name="listing_name"
                                                    placeholder="What are you looking for?">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select" style="width: 100%;"><select
                                                        class="selectpicker" data-width="100%" tabindex="-98">
                                                        <option selected="selected">All Categories</option>
                                                        <option>Default Sorting 1</option>
                                                        <option>Default Sorting 2</option>
                                                        <option>Default Sorting 3</option>
                                                        <option>Default Sorting 4</option>
                                                    </select>
                                                    <div class="dropdown-menu " role="combobox">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1">
                                                            <ul class="dropdown-menu inner show"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select dropup" style="width: 100%;">
                                                    <select class="selectpicker" data-width="100%" tabindex="-98">
                                                        <option selected="selected">All Location</option>
                                                        <option>Default Sorting 1</option>
                                                        <option>Default Sorting 2</option>
                                                        <option>Default Sorting 3</option>
                                                        <option>Default Sorting 4</option>
                                                    </select>
                                                    <div class="dropdown-menu" role="combobox"
                                                        style="max-height: 286px; overflow: hidden; min-height: 129px; position: absolute; will-change: transform; min-width: 570px; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);"
                                                        x-placement="top-start">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1"
                                                            style="max-height: 286px; overflow-y: auto; min-height: 129px;">
                                                            <ul class="dropdown-menu inner show">
                                                                <li class="selected active"><a role="option"
                                                                        class="dropdown-item selected active"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="true"><span
                                                                            class="text">All
                                                                            Location</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 1</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 2</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 3</span></a></li>
                                                                <li><a role="option" class="dropdown-item"
                                                                        aria-disabled="false" tabindex="0"
                                                                        aria-selected="false"><span
                                                                            class="text">Default
                                                                            Sorting 4</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input_box">
                                                <div class="dropdown bootstrap-select" style="width: 100%;"><select
                                                        class="selectpicker" data-width="100%" tabindex="-98">
                                                        <option selected="selected">All Price type</option>
                                                        <option>Default Sorting 1</option>
                                                        <option>Default Sorting 2</option>
                                                        <option>Default Sorting 3</option>
                                                        <option>Default Sorting 4</option>
                                                    </select>
                                                    <div class="dropdown-menu " role="combobox">
                                                        <div class="inner show" role="listbox"
                                                            aria-expanded="false" tabindex="-1">
                                                            <ul class="dropdown-menu inner show"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="pets-friendly" id="tag_1">
                                    <label for="tag_1"><span></span>Pets Friendly</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="plumbing" id="tag_2" checked="">
                                    <label for="tag_2"><span></span>Car Rent</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="house-cleaning" id="tag_3">
                                    <label for="tag_3"><span></span>House Cleaning</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="business-financing" id="tag_4">
                                    <label for="tag_4"><span></span>Business Financing</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="accepts-credit Cards" id="tag_5">
                                    <label for="tag_5"><span></span>Accepts Credit Cards</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="bike-parking" id="tag_6">
                                    <label for="tag_6"><span></span>Bike Parking</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="coupons" id="tag_7">
                                    <label for="tag_7"><span></span>Coupons</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="parking-street" id="tag_8">
                                    <label for="tag_8"><span></span>Parking Street</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="wireless-internet" id="tag_9">
                                    <label for="tag_9"><span></span>Wireless Internet</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="smoking-allowed" id="tag_10">
                                    <label for="tag_10"><span></span>Smoking Allowed</label>
                                </div>
                                <div class="single_tags_check__box">
                                    <input type="checkbox" name="bed-&amp;-breakfast" id="tag_11">
                                    <label for="tag_11"><span></span>Bed &amp; Breakfast</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="listings_btn">
                                    <a href="#" class="thm-btn px-3"><span
                                            class="icon-magnifying-glass"></span>Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>





        <section class="filter">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="filter_inner_content">
                            <div class="left">
                                <div class="left_icon">
                                    <a href="{{ route('MatrimoneyListgrid') }}" class="icon-grid"></a>
                                    <a href="#" class="list-icon icon-list active"></a>
                                </div>
                                <div class="left_text">
                                    <h4>Lorem ipsum dolor sit amet </h4>
                                </div>
                            </div>
                            <div class="right">
                                <div class="shorting">
                                    <div class="dropdown bootstrap-select" style="width: 100%;"><select
                                            class="selectpicker" data-width="100%" tabindex="-98">
                                            <option selected="selected">Default Sorting</option>
                                            <option>Default Sorting 1</option>
                                            <option>Default Sorting 2</option>
                                            <option>Default Sorting 3</option>
                                            <option>Default Sorting 4</option>
                                        </select>
                                        <div class="dropdown-menu " role="combobox">
                                            <div class="inner show" role="listbox" aria-expanded="false"
                                                tabindex="-1">
                                                <ul class="dropdown-menu inner show"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">

                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="matrimoney-details.html">Christopher Williams</a> </h3>
                                        <small class="text_green">Online Now</small>
                                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> New York </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <i class="fas fa-circle font_small10"></i> 26 year old, 5'7" height </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Hindu Patel </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Software Engineer </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="matrimoney-details.html">Christopher Williams</a> </h3>
                                        <small class="text_green">Online Now</small>
                                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> New York </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <i class="fas fa-circle font_small10"></i> 26 year old, 5'7" height </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Hindu Patel </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Software Engineer </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="matrimoney-details.html">Christopher Williams</a> </h3>
                                        <small>1 Day ago</small>
                                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> New York </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <i class="fas fa-circle font_small10"></i> 26 year old, 5'7" height </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Hindu Patel </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Software Engineer </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="matrimoney-details.html">Christopher Williams</a> </h3>
                                        <small>2 Days ago</small>
                                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> New York </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <i class="fas fa-circle font_small10"></i> 26 year old, 5'7" height </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Hindu Patel </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Software Engineer </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="matrimoney-details.html">Christopher Williams</a> </h3>
                                        <small class="text_green">Online Now</small>
                                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> New York </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <i class="fas fa-circle font_small10"></i> 26 year old, 5'7" height </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Hindu Patel </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Software Engineer </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="listings_two_page_content joblist_shadow">
                            <!--listings Two Page Single-->
                            <div class="listings_two_page_single overflow-y__hidden">
                                <div class="listings_two_page_img">
                                    <img src="{{ URL::asset('assets/frontend/images/listings/mat1.jpg')}}" alt="">

                                    <div class="heart_icon">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                                <div class="listings_three-page_content pt-3">
                                    <div class="title">
                                        <h3><a href="matrimoney-details.html">Christopher Williams</a> </h3>
                                        <small>1 Day ago</small>
                                        <p class="mb-0"> <i class="fas fa-map-marker-alt"></i> New York </p>
                                    </div>
                                    <ul class="list-unstyled listings_three-page_contact_info">
                                        <li> <i class="fas fa-circle font_small10"></i> 26 year old, 5'7" height </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Hindu Patel </li>
                                        <li> <i class="fas fa-circle font_small10"></i> Software Engineer </li>
                                    </ul>
                                    <div class="listings_three-page_content_bottom">
                                        <div class="left">

                                        </div>
                                        <div>
                                            <a href="#" class="enqurebtnbox hvr-shutter-in-vertical">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </section>
    </div><!-- /.page-wrapper -->

    <script>
        $(document).ready(function() {
            $(".filter_by_tagstitile").click(function() {
                $(".filter_by_tagsall").toggle();
            });
        });
    </script>


</body>

</html>
@endsection
