@extends('frontend.layouts.master')
@section('title') About @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<body>

<!-- Modal location-->
<div class="modal fade" id="exampleModallocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                   <div>Berlin <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div> Hamburg <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div> Munich <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div> Cologne <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div>Stuttgart <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div> Dortmund <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div> Essen <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div>Leipzig <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div> Bremen <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
                   <div> Dresden <a href="#" class="float-right d-inline-block location_a">  Select Location</a></div>
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
<div class="modal fade" id="exampleModallisting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="add-service.html">  Add Service</a>
                 </div>
                 <div>
                     <a href="add-business.html">  Add Business</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Housing Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="housing-listing-grid.html"><i class="fas fa-angle-right"></i> House For Rent</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"> <i class="fas fa-angle-right"></i> AC Service & Repair</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Washing Machine Repairs</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Air Cooler Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Audio Visual Equipment Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Industrial Voltage Stabilizers Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Solar Water Heaters</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Fire Fighting Equipment</a> </div>

                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Washing machine dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Microwave Oven Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Firefighting Equipment Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Water Dispenser Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Modular Kitchen Dealers</a> </div>

                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Generators Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Gas Water Heater Dealers</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Sign Board Agencies</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Mixer Grinder Dealers</a> </div>



                </div>
            </div>
        </div>
    </div>


<!-- Modal taxation-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Taxation Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="taxation-listing-grid.html"><i class="fas fa-angle-right"></i> Taxation</a> </div>
                    <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> CA Services</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Accounting Bookkeeping</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Auditors</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> GST Consultants</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Company Registration</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Tax Consultants</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Tax Return Filing</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> FSSAI License</a> </div>
                    <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> ESI & PF</a> </div>
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
                        <div class="w-50 float-left"> <a class=" a_cat_color" href="education-listing-grid.html"><i class="fas fa-angle-right"></i> Education</a> </div>
                        <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Entrance Exam Coaching</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Job Training</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Overseas Education</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Corporate Training</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Computer Training</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Design Training</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Financial Training</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Language Classes</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Entrance Coaching</a> </div>
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
                        <div class="w-50 float-left"> <a class=" a_cat_color" href="job-listing-grid.html"><i class="fas fa-angle-right"></i> Jobs</a> </div>
                        <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Marketing</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Design</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Project Management</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Automotive Jobs</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Human Resource</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> IT / Computer</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Customer Service</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Health & Care</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Accounting</a> </div>
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
                        <div class="w-50 float-left"> <a class=" a_cat_color" href="tourtravel-listing-grid.html"><i class="fas fa-angle-right"></i> Travel & Transport</a> </div>
                        <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Bus Travel Agents</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Train Travel Agents</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Tour Operators</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Hotels</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Vehicle Rentals</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Transport Services</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Travel Consultants</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Cargo & Shipping</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Travel Consultants</a> </div>
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
                        <div class="w-50 float-left"> <a class=" a_cat_color" href="event-listing-grid.html"> <i class="fas fa-angle-right"></i> Event</a> </div>
                        <div class="w-50 float-left"> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Seminars</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Conferences</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Trade shows</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Themed parties</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Webinars</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Interactive performances</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Music festivals</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Food festivals</a> </div>
                        <div class="w-50 float-left "> <a class=" a_cat_color" href="#"><i class="fas fa-angle-right"></i> Street parties</a> </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">
           <div class="site-header__header-one-wrap clearfix">
            <div class="header_top_one">
                <div class="header_top_one_container">
                    <div class="header_top_one_inner clearfix">

                        <div class="header_top_one_inner_left float-left">
                            <div class="header_social_1">
                                <ul class="list-unstyled">
                                    <li><a target="blank" href="https://www.facebook.com/indiingermany"><i class="fab fa-facebook-square"></i></a></li>
                                    <li> <a target="blank"  href="https://www.instagram.com/indingermany/"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a target="blank"  href="https://www.pinterest.com/indianingermany/"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a target="blank"  href="https://www.linkedin.com/company/indiansingermany/"><i class="fab fa-linkedin"></i></a></li>
                                   <li> <a target="blank"  href="https://twitter.com/indingermany/"><i class="fab fa-twitter"></i></a></li>
                                  <li><a target="blank"  href="#"> <i class="fab fa-youtube"></i> </a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="header_top_one_inner_right float-right">
                            <div class="header_topmenu_1">
                                <ul class="list-unstyled">

                                    <li><a href="login.html"><i class="fas fa-user"></i>Log in </a></li>

                                    <li><a href="#" data-toggle="modal" data-target="#exampleModallisting">Add <i class="fas fa-plus"></i></a></li>

                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#exampleModallocation">Select Location <i class="fas fa-caret-down"></i> </a>
                                    </li>


                                    <li><a href="#">Call Embassy 000 000 000 </i> </a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section class="page-header backgroundimgconabout">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2>About</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>About</span></li>
                </ul>
            </div>

        </section>

        <section class="home-section section-bg-color" id="homesection">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <div class="mt-md-5">
                            <h4 class="home-title fw-bold">Who We Are</h4>
                            <p class="home-short-msg mt-2">The family of ‘’Indians in Germany’’ invite all the people who
                                love "Indian Culture" to join this IG platform and create a family out of it. We will
                                help you to become a part of this ever-growing community and resolve your queries
                                through it. Find your answers in this biggest expatriate. Download the app now! Lorem ipsum dolor sit amet consectetur adipisicing elit. A cumque iste modi corporis et non possimus. Expedita libero eligendi laborum laboriosam debitis, sequi facere animi, enim minus quaerat, ipsa ad.</p>

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="text-right mt-5">
                            <img src="{{ URL::asset('assets/frontend/images/img/about-big logo.png')}}" alt="mobile app" class="img-fluid float-end" width="200px" height="200px">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="video-one" style="background-image: url({{ URL::asset('assets/frontend/images/backgrounds/video-one-bg.jpg')}})">
            <div class="container">
                <div class="block-title text-center">

                    <h2>How It Works</h2>

                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="video_one_image">
                            <div class="video_one_shape-1" style="background-image: url({{ URL::asset('assets/frontend/images/shapes/video-1-shape-1.png')}})"></div>
                            <div class="video_one_shape-2 rotate-me" style="background-image: url({{ URL::asset('assets/frontend/images/shapes/video-1-shape-2.png')}})"></div>
                            <img src="{{ URL::asset('assets/frontend/images/resources/video-1-img-1.jpg')}}" alt="">
                            <a href="https://www.youtube.com/watch?v=i9E_Blai8vk" class="video-one__btn video-popup"><i class="fa fa-play"></i></a>
                            <div class="video_one_left_text">
                                <p>Watch how</p>
                            </div>
                            <div class="video_one_right_text">
                                <p>listing works</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="four_boxess">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <!--Four Boxes Single-->
                        <div class="four_boxes_single">
                            <div class="four_boxes_icon">
                                <span class="icon-selection"></span>
                            </div>
                            <h3>Choose A Category</h3>
                            <p>There many variation of pasages of lorem sum available.</p>
                            <div class="four_boxes_shape"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <!--Four Boxes Single-->
                        <div class="four_boxes_single">
                            <div class="four_boxes_icon">
                                <span class="icon-focus"></span>
                            </div>
                            <h3>Find What You Want</h3>
                            <p>There many variation of pasages of lorem sum available.</p>
                            <div class="four_boxes_shape"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <!--Four Boxes Single-->
                        <div class="four_boxes_single">
                            <div class="four_boxes_icon">
                                <span class="icon-delete"></span>
                            </div>
                            <h3>Select the Best Place</h3>
                            <p>There many variation of pasages of lorem sum available.</p>
                            <div class="four_boxes_shape"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <!--Four Boxes Single-->
                        <div class="four_boxes_single">
                            <div class="four_boxes_icon">
                                <span class="icon-exploration"></span>
                            </div>
                            <h3>Go Out &amp; Explore Now</h3>
                            <p>There many variation of pasages of lorem sum available.</p>
                            <div class="four_boxes_shape"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


<section class="faq_one background__grey mb-5">
<div class="container">
        <div class="block-title text-center">
            <h2>Meet Our Team</h2>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                        <div class="top_authors_single">
                            <div class="top_authors_single_inner">
                                <div class="top_authors_image">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/top-authors-img-1.jpg')}}" alt="">
                                </div>
                                <div class="top_authors_content">
                                    <h3>Mike Hardson</h3>
                                    <h4>Designation</h4>
                                    <div class="about_team_social">

                                        <ul class="list-unstyled">
                                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                           <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                          <li><a href="#"> <i class="fab fa-youtube"></i> </a></li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-xl-6 col-lg-6">
                        <div class="top_authors_single">
                            <div class="top_authors_single_inner">
                                <div class="top_authors_image">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/top-authors-img-2.jpg')}}" alt="">
                                </div>
                                <div class="top_authors_content">
                                    <h3>Jessica Brown</h3>
                                    <h4>Designation</h4>
                                   <div class="about_team_social">

                                        <ul class="list-unstyled">
                                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                           <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                          <li><a href="#"> <i class="fab fa-youtube"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="top_authors_single">
                            <div class="top_authors_single_inner">
                                <div class="top_authors_image">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/top-authors-img-3.jpg')}}" alt="">
                                </div>
                                <div class="top_authors_content">
                                    <h3>Christine Eve</h3>
                                    <h4>Designation</h4>
                                    <div class="about_team_social">

                                        <ul class="list-unstyled">
                                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                           <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                          <li><a href="#"> <i class="fab fa-youtube"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="top_authors_single">
                            <div class="top_authors_single_inner">
                                <div class="top_authors_image">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/top-authors-img-4.jpg')}}" alt="">
                                </div>
                                <div class="top_authors_content">
                                    <h3>Kevin Martin</h3>
                                    <h4>Designation</h4>
                                    <div class="about_team_social">

                                        <ul class="list-unstyled">
                                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                           <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                          <li><a href="#"> <i class="fab fa-youtube"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="top_authors_single">
                            <div class="top_authors_single_inner">
                                <div class="top_authors_image">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/top-authors-img-2.jpg')}}" alt="">
                                </div>
                                <div class="top_authors_content">
                                    <h3>Mike Hardson</h3>
                                    <h4>Designation</h4>
                                    <div class="about_team_social">

                                        <ul class="list-unstyled">
                                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                           <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                          <li><a href="#"> <i class="fab fa-youtube"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="top_authors_single">
                            <div class="top_authors_single_inner">
                                <div class="top_authors_image">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/top-authors-img-3.jpg')}}" alt="">
                                </div>
                                <div class="top_authors_content">
                                    <h3>Sarah Albert</h3>
                                    <h4>Designation</h4>
                                    <div class="about_team_social">

                                        <ul class="list-unstyled">
                                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                           <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                          <li><a href="#"> <i class="fab fa-youtube"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


            </div>
        </div>
</section>



<section class="vision_mission_sec">

 <div class="container">
     <div class="block-title text-center">
        <h2>Our Vision & Mission</h2>
     </div>

        <div class="row">
                <div class="col-xl-4 col-lg-4 text-center">
                    <img class="img-fluid" src="{{ URL::asset('assets/frontend/images/backgrounds/mission.jpg')}}">
                </div>

                 <div class="col-xl-8 col-lg-8 ">

                     <div class="mb-5">
                         Lorem ipsum dolor sit amet consectetur adipisicing, elit. Quasi, numquam quaerat libero totam dolor obcaecati reiciendis doloremque quidem optio, id laudantium sunt, doloribus eaque, corrupti cupiditate. Impedit fugiat adipisci dignissimos.
                     </div>


                     <div class="row">

                        <div class="col-lg-6">
                            <div class="vision_main">
                                <h2 class="vision_h2"> Vision </h2>
                                <p class="vision_p"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur cumque a tenetur et atque aliquid.</p>

                                <div> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur cumque a tenetur et atque aliquid voluptas ea, non reiciendis ipsam recusandae optio eveniet perspiciatis voluptate fugiat quisquam neque repudiandae quibusdam. </div>

                            </div>
                        </div>

                        <div class="col-lg-6">
                             <div class="vision_main mission_light_bg">
                                <h2 class="vision_h2 color_black"> Mission </h2>
                                <p class="vision_p"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur cumque a tenetur et atque aliquid. </p>

                                <div> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur cumque a tenetur et atque aliquid voluptas ea, non reiciendis ipsam recusandae optio eveniet perspiciatis voluptate fugiat quisquam neque repudiandae quibusdam. </div>

                            </div>
                        </div>

                     </div>

                 </div>
        </div>
</div>
</section>


        <section class="download" style="background-image: url({{ URL::asset('assets/frontend/images/backgrounds/download-bg.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="download_textabout">
                            <h2>Download Our IG App</h2>
                            <h6>Our goal is to create a community to help you feel like home. So, download the app now and get connected to the life of your dreams in Germany.</h6>
                            <div class="download_2-btn">
                                <div class="download_btn-1">
                                    <a href="#">
                                        <img src="{{ URL::asset('assets/frontend/images/img/googleplaystore.png')}}" width="30">
                                        <p>GET IT ON<br>Google Play</p>
                                    </a>
                                </div>
                                <div class="download_btn-1 two">
                                    <a href="#">
                                        <i class="fab fa-apple"></i>
                                        <p>Download on the<br>App store</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="download_screen wow slideInRight animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: slideInRight;">
                            <div class="download_screen_image">
                                <img src="{{ URL::asset('assets/frontend/images/resources/download-screen-img.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>
@endsection
