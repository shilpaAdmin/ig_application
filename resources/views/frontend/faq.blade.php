@extends('frontend.layouts.master')
@section('title') FAQs @endsection
@section('content')
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
            <img src="assets/images/loader.png" class="preloader__image" alt="">
        </div><!-- /.preloader -->

        <div class="page-wrapper">

            <div class="site-header__header-one-wrap clearfix">

                <div class="site-header__header-one-wrap clearfix">
                    <div class="header_top_one">
                        <div class="header_top_one_container">
                            <div class="header_top_one_inner clearfix">

                                <div class="header_top_one_inner_left float-left">
                                    <div class="header_social_1">
                                        <ul class="list-unstyled">
                                            <li><a target="blank" href="https://www.facebook.com/indiingermany"><i
                                                        class="fab fa-facebook-square"></i></a></li>
                                            <li> <a target="blank" href="https://www.instagram.com/indingermany/"><i
                                                        class="fab fa-instagram"></i></a></li>
                                            <li> <a target="blank" href="https://www.pinterest.com/indianingermany/"><i
                                                        class="fab fa-pinterest-p"></i></a></li>
                                            <li><a target="blank"
                                                    href="https://www.linkedin.com/company/indiansingermany/"><i
                                                        class="fab fa-linkedin"></i></a></li>
                                            <li> <a target="blank" href="https://twitter.com/indingermany/"><i
                                                        class="fab fa-twitter"></i></a></li>
                                            <li><a target="blank" href="#"> <i class="fab fa-youtube"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="header_top_one_inner_right float-right">
                                    <div class="header_topmenu_1">
                                        <ul class="list-unstyled">

                                            <li><a href="{{ route('login') }}"><i class="fas fa-user"></i>Log in </a></li>

                                            <li><a href="#" data-toggle="modal" data-target="#exampleModallisting">Add <i
                                                        class="fas fa-plus"></i></a></li>

                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#exampleModallocation">Select
                                                    Location <i class="fas fa-caret-down"></i> </a>
                                            </li>


                                            <li><a href="#">Call Embassy 000 000 000 </i> </a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="page-headerfaq backgroundimgconfaq">


                <div class="overlayforcontactbg"></div>
                <div class="container">
                    <h2>Hello, how can we help you?</h2>
                    <div class="search_box">
                        <form>
                            <div class="search_inner">
                                <input type="text" placeholder="Type the key words to find the answers">
                                <div class="search_icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </section>





            <section class="container faqd">


                <div class="row">
                    <div class="col-md-3 faq_leftt mb-3">
                        @foreach ($faqTagData as $faqTag)
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="tab_hhead active" id="v-pills-general-tab" data-toggle="pill" href="javascript:;" onclick="callFaqTagWise({{ $faqTag['id'] }})"
                                role="tab" aria-controls="v-pills-general" aria-selected="true">{{ $faqTag['name'] }}</a>
                        </div>
                    @endforeach

                    </div>


                    <div class="col-md-9 faq_rightt ">

                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel"
                                aria-labelledby="v-pills-general-tab">

                                <div class="accordion" id="accordionExample">
                                    <?php $faqDivCounter = 1; ?>
                                    @foreach($faqData as $faqdata)
                                    <div class="card card_faq" data-tagId="{{ $faqdata['tags'] }}" id="faqDiv{{ $faqDivCounter }}">
                                        <div class="card-header card_headfaq" id="headingOne{{ $faqdata['id'] }}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-linkfaq text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapseOne{{ $faqdata['id'] }}" aria-expanded="true"
                                                    aria-controls="collapseOne">{{ ucfirst($faqdata['question']) }} <span class="faq_dwarrow"><i
                                                            class="fas fa-sort-down"></i></span>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne{{ $faqdata['id'] }}" class="collapse" aria-labelledby="headingOne{{ $faqdata['id'] }}"
                                            data-parent="#accordionExample">
                                            <div class="card-body card_bodyfaq">
                                                {{ ucfirst($faqdata['answer']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $faqDivCounter++;
                                    ?>
                                    @endforeach
                                </div> <!-- accordion -->
                            </div> <!-- General -->
                        </div> <!-- tab-content -->
                    </div><!-- col-9 -->


                </div> <!-- row -->

            </section>

        </div><!-- /.page-wrapper -->

        <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

        <div class="side-menu__block">
            <div class="side-menu__block-overlay custom-cursor__overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div><!-- /.side-menu__block-overlay -->
            <div class="side-menu__block-inner ">
                <div class="side-menu__top justify-content-end">
                    <a href="#" class="side-menu__toggler side-menu__close-btn"><img
                            src="assets/images/shapes/close-1-1.png" alt=""></a>
                </div><!-- /.side-menu__top -->

                <nav class="mobile-nav__container">
                    <!-- content is loading via js -->
                </nav>

                <div class="side-menu__sep"></div><!-- /.side-menu__sep -->

                <div class="side-menu__content">
                    <p><a href="#">Add Listing</a><br>
                        <a href="#">Register</a><br>
                        <a href="#">Login</a> <br>
                        <a href="mailto:needhelp@ig.com">needhelp@ig.com</a> <br>
                        <a href="tel:000-000-0000">000 000 0000</a>


                    </p>
                    <div class="side-menu__social">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"> <i class="fab fa-youtube"></i> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-popup">
            <div class="search-popup__overlay custom-cursor__overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div><!-- /.search-popup__overlay -->
            <div class="search-popup__inner">
                <form action="#" class="search-popup__form">
                    <input type="text" name="search" placeholder="Type here to Search....">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </body>
    </html>

@section('script')
<script>
var finalCountsOfDivCounter = "{{ $faqDivCounter - 1 }}";
function callFaqTagWise(tagId)
{
    // alert(finalCountsOfDivCounter);
    if(finalCountsOfDivCounter > 0)
    {
        for(var j =1; j <= finalCountsOfDivCounter; j++)
        {
            var faqDivTagId = $("#faqDiv"+j).attr('data-tagId');
            // alert(faqDivTagId);

            var faqTagIdArray = faqDivTagId.split(',');

            // console.log(faqTagIdArray);
            if(jQuery.inArray(tagId.toString(), faqTagIdArray) != -1) {
                $("#faqDiv"+j).show();
            } else {
                $("#faqDiv"+j).hide();
            }
        }
    }
}
</script>
@endsection
@endsection
