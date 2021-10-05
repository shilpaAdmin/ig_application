@extends('frontend.layouts.master')
@section('title') Contact @endsection
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
        <img src="{{URL::asset('assets/images/loader.png')}}" class="preloader__image" alt="">
    </div><!-- /.preloader -->
    <div class="page-wrapper">

        <section class="page-header backgroundimgcon">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Contact</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Contact</span></li>
                </ul>
            </div>
        </section>

        <section class="contact_details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <!--contact Details Single-->
                        <div class="contact_details_single">
                            <div class="contact_details_icon">
                                <span class="icon-map-location"></span>
                            </div>
                            <div class="contact_details_inner">
                                <div class="contact_details_content">
                                    <h3>Visit Us Anytime</h3>
                                    <p>Lorem ipsum dolor sit</p>
                                </div>
                                <div class="contact_details_hover_icon">
                                    <span class="icon-map-location"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--contact Details Single-->
                        <div class="contact_details_single">
                            <div class="contact_details_icon">
                                <span class="icon-email"></span>
                            </div>
                            <div class="contact_details_inner">
                                <div class="contact_details_content">
                                    <h3>Send a Email</h3>
                                    <p>Lorem ipsum dolor sit</p>
                                </div>
                                <div class="contact_details_hover_icon">
                                    <span class="icon-email"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--contact Details Single-->
                        <div class="contact_details_single">
                            <div class="contact_details_icon">
                                <span class="icon-phone"></span>
                            </div>
                            <div class="contact_details_inner">
                                <div class="contact_details_content">
                                    <h3>Call Center</h3>
                                    <p><a href="tel:+123456789">92 666 888 0000</a></p>
                                </div>
                                <div class="contact_details_hover_icon">
                                    <span class="icon-phone"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="contact_one_left">
                            <div class="block-title text-left">
                                <h4>contact us</h4>
                                <h2>How Can We Help You?</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporeum
                                    dicant partem scripserit, doctus appetere interpretaris.</p>
                            </div>
                            <div class="contact-one-left__social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="contact-one__form__wrap">
                            <form action="inc/sendemail.php" class="contact-one__form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" name="name" placeholder="Your name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="email" name="name" placeholder="Email address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" name="phone" placeholder="Phone number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" name="Subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <textarea name="message" placeholder="Write Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group contact__btn">
                                            <button type="submit" class="thm-btn contact-one__btn px-3">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</body>
</html>
@endsection

