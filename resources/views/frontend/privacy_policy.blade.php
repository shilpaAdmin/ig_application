@extends('frontend.layouts.master')
@section('title') Privacy Policy @endsection
@section('content')


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

        <section class="page-header backgroundimgprivacy">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Privacy Policy</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Privacy Policy</span></li>
                </ul>
            </div>
        </section>

        <section class="privacy_details">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy_box">
                            <p>Version 1.0</p>
                            <p> PLEASE READ THESE TERMS OF USE AND SALE, CAREFULLY. BY USING THIS PLATFORM, YOU
INDICATE YOUR UNDERSTANDING AND ACCEPTANCE OF THESE TERMS IN FULL. IF YOU
DISAGREE TO THESE TERMS OR ANY PART OF THESE TERMS, YOU MAY NOT USE THIS
PLATFORM.</p>
                            <h2> 1. DEFINITIONS </h2>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> “User”, “You”, “Your” means any person who browses, views, accesses or uses
this Platform;
                                </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> “Use” or “Using” means to browse, access, view, purchase the Products or
otherwise gain benefit from using this Platform; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> “We”, “Company”, “us” and “our” means The IG Group having its registered office at
Kantor-Reiche-Ring 37, 38162, Cremlingen; </li>
                                 <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> “Website” means <a href="https://indianingermany.de/" title="">   https://indianingermany.de/ </a> duly owned, operated and maintained
by Company in the territory India / Worldwide. </li>
                                 <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> “Products” shall mean and include sale of Seller’s products, including but not limited to
printers and related consumables and other products listed by the Sellers for selling
and distributing to the Users on the Platform. </li>
                                 <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> “Platform” includes but is not limited to the Website, sub-domains, micro-sites, mobile
application, WAP sites and other digital platforms owned, operated and maintained
by the Company; </li>
                                 <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> “Users” means the users who subscribe and register on the Platforms for purchasing
the Products; </li>             
<li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> “Sellers” shall include the individuals or the entities that offer the Products, through the
Platform. </li>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 2. INTRODUCTION </h2>
                            <p> Welcome to our Platform. If you continue to browse and use this Platform, you are agreeing to
comply with and be bound by these terms and conditions (“Terms of Use and Sale”), which together
with our privacy policy (“Privacy Policy”) govern the Company's relationship with you. This Privacy
Policy is in compliance with the EU General Data Protection Regulation (GDPR). </p>

                            <p>In order to achieve our mission of providing The IG Group community with our websites and
services, we collect certain personal information from users of The IG Group Websites (hereinafter
“Users” or “you”) for the purposes specifically described and under the conditions laid down in
this Privacy Policy.</p>

                            
                            <p>Providing personal information is optional; however, Users opting not to share such information
may not be allowed access to certain features of The IG Group Website. Users are responsible for
filling in correct and truthful information, and are thus responsible for any actual or potential
economic or legal lawsuit against The IG Group, should this occur as a consequence of their
wrongdoing or mismanagement of their profile. User accounts are for personal use and may not
be used by, assigned, or otherwise transferred to any other person or entity. Users are responsible
for the security of their password and will be solely liable for any use or unauthorized use of said
password.</p>

<p>Our users’ privacy is of paramount importance to us. We therefore strive to be transparent about
how we collect, use and share information about you. We endeavour to provide you with the
highest standards of security for any personal information you submit to us.</p>

<p>This Privacy Policy provides details about the information we collect about you when you use our
websites and services, or otherwise interact with us (for example, by attending our events), unless
a different specific policy is displayed.</p>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2>3. SSL ENCRYPTION </h2>
                            <p>To protect the security of your data during transmission, we use state-of-the-art encryption methods
(e.g. SSL) over HTTPS.</p>


                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 4. USE of SCRIPT LIBRARIES (Google Web Fonts) </h2>
                            <p>In order to present our content correctly and graphically appealing across browsers, we use script
libraries and font libraries such as. B. Google Web fonts (https://www.google.com/webfonts/)
Google web fonts are transferred to your browser's cache to avoid multiple loading. If the browser
does not support Google Web Fonts or prevents access, the content is displayed in a standard
font.</p>

<p>Calling up script libraries or font libraries automatically triggers a connection to the library
operator. It is theoretically possible - but currently also unclear whether and, if so, for what
purposes - that operators of such libraries collect data.
</p>

<p>You can find the privacy policy of the library operator Google
here: <a href="https://www.google.com/policies/privacy/"> https://www.google.com/policies/privacy/ </a> </p>


                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 5. USER INFORMATION THAT WE COLLECT</h2>
                             
                            <h3>1) THE IG Group Account Information</h3>
                            <p>In order to provide our services, we collect information about you when you register for
an account through The IG Group Websites, as well as when you update or modify your
profile. We keep track of your profile and settings selections within The IG
Group Websites.</p>

                            <p>Specifically, in order to register for an account, you will need to submit the following information:</p>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Email address; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Year of Birth; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Country of Origin;</li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Login credentials. </li>
                            </ul>    
                            <br>
                            <p>Further to the above, you can submit additional profile information via “My Account”. This
additional optional information may include:</p>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> First and last name; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Current Location; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Your current employer (company or organisation);</li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Profile photo; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> LinkedIn URL; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Twitter username; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Facebook profile URL; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> A short bio; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Your CV. </li>
                            </ul>    
                            <br>
                            <p>You can select to register for an The IG Group account, log in or enhance your profile via
your Facebook profile. By doing so, you are asking Facebook to send us registration
information from your Facebook profile. We treat that information as we do any other
information you give us when you register or log in.</p>

<p>When using specific features on the website, such as The IG Group “Find a Job” feature
(hereinafter “The IG Group Jobs”) and The IG Group Housing feature, you may be asked
to submit additional information. This information is necessary for you to be able to apply
for a job vacancy or make an enquiry for a property (see Section 4 below in detail). In
such cases, as well as when participating in competitions running on The IG
Group Websites, or when wishing to contact authors of website content, you will
specifically be asked to submit additional information through separate online forms.</p>

<h3>2) The IG Group Websites usage Information</h3>
<p>We collect information about your activity on our services, for example, the date and time
you registered, date and time you logged in, your favourite jobs and favourite properties,
jobs and properties that you have applied for or enquired about, and forms that you have
filled in across the website.</p>

<h3>3) Device and Connection Information</h3>
<p>We collect information about the device(s) with which you access The IG Group Websites
and services. This device information includes your connection type and settings when you
access The IG Group Websites or use our services. We may also collect information
through your device(s) about your operating system, browser type, IP address, URLs of
referring/exit pages, device identifiers, and crash data.</p>

<h3>4) Cookies</h3>
<p>The IG Group Websites uses cookies and similar technologies to provide functionality and
to recognise you across different services and devices. For more information, please see
our Cookies Policy, which includes information on what cookies are, how you can control
your cookie settings or opt out.</p>

<h3>5) Facebook visitor action pixels</h3>
<p>We use the “visitor action pixels” from Facebook Inc on our websites. This tool allows us to
understand and deliver ads and make them more relevant to you. The data collected in
this way is anonymous to us, i.e., we do not see the personal data of individual users.
However, this data is stored and processed by Facebook. Facebook may link this
information to your Facebook account and also use it for its own promotional purposes, in
accordance with <a href="#"> Facebook`s Data Usage Policy.</a> You can allow Facebook and its partners
to place ads on and off Facebook. A cookie may also be stored on your computer for these
purposes.</p>

<p>You can object to the collection of your data by Facebook pixel, or to the use of your data
for the purpose of displaying Facebook ads <a href="#"> here.</a></p>



                        </div>
                    </div>


                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 6. HOW WE USE THE INFORMATION WE COLLECT </h2>
                            <p> We collect and use your information in order to be able to deliver and improve our services.
Additionally, we use your information to help keep you safe from fraud and to provide you with
localised (but not personalised) advertising that may be of interest to you. </p>
<p>More specifically, we use the information we collect for the following:</p>

<h3>1) Administering your account and providing our services to you:</h3>
<p>We use information about you to provide our services to you, including authenticating you
when you log in, providing customer support, and operating and maintaining our
services.</p>

<h3>2) Research and development:</h3>
<p>We are always looking for ways to make our websites and services better, smarter, more
efficient, more secure and more useful to our Users. We use collective learnings about how
Users use our websites and services, and feedback provided directly to us, to troubleshoot
and identify trends, usage, activity patterns and areas for improvement. We may
occasionally conduct research and analysis of Users’ behaviour to improve our websites
content and services.</p>     

<h3>3) Communication with you about our services:</h3>
<p>We use your contact information to send communications via email and within our services,
including our Newsletter. These communications are aimed at driving engagement and
maximizing what you get out of the services and may include information about new
features, survey requests, newsletters, and events. We may also communicate with you
about new product offers, promotions and contests. You may opt out of these
communications by using the “Unsubscribe” option that can be found within the
communication itself.</p>

<h3>4) Safety and security:</h3>
<p>We use information about you and your service use to verify accounts and activity, to
monitor suspicious or fraudulent activity and to identify violations of The IG Group
Websites Terms of Use and other policies.</p>

<h3>5) Ensuring Legal Compliances:</h3>
<p>Where required by law or where we believe it is necessary to protect our legal rights,
interests and the interests of others, we use information about you in connection with legal
claims, compliance, regulatory requirements and disclosures in connection with the
acquisition, merger or sale of a business.</p>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="privacy_box">
                            <h2>7. LEGAL GROUNDS FOR PROCESSING</h2>
                            <p> To process your information as described above, we rely on the following legal grounds: </p>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> We need it for you to be able to fully access The IG Group Websites and services,
including operating and protecting the safety and security of the services; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> You give us your fully explicit, informed, specific, and unambiguous consent to do so
for the specific purposes described in this Privacy Policy; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> It satisfies a legitimate interest (which is not overridden by your data protection
interests), such as for research and development, to market and promote our services,
and to protect our legal rights and interests;</li>
<li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> We need to process your data to comply with a legal obligation.</li>

                            </ul>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="privacy_box">
                            <h2>8. WITH WHOM AND HOW WE SHARE THE COLLECTED INFORMATION</h2>
                            <p> Use of certain services requires sharing particular information about you with third parties. </p>
                            <p> Specifically, we will share your information with third parties on the following occasions: </p>

<h3>1) Jobs</h3>
<p>In order to be able to use The IG Group Jobs and apply for a job vacancy on an The IG
Group Website, you will be required to submit the following information:</p>


                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> First and last name; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Email address; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> CV;</li>
<li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Cover letter (optional);</li>
<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> LinkedIn profile URL (optional); </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Message to the responsible recruiter (optional).</li>
                            </ul>
<p>This information will be submitted securely directly to the responsible recruiter strictly for
the purpose of applying for the job vacancy.</p>

<p>When applying for a job vacancy, you also have an option to share your CV with an
independent CV consultant who will provide you with feedback. Should you opt to do so,
your first and last name, email address and CV will be shared directly and securely with
the CV consultant.</p>

<h3>2) Housing</h3>
<p>In order to use The IG Group Housing and apply for one of the properties displayed on the relevant
The IG Group Website, you will be required to submit the following information:</p>
<ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> First and last name; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Email address; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Telephone number (optional);</li>
<li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Message to the property owner/manager (optional).</li>

                            </ul>
<br>
 <p>This information will be submitted securely directly to the property owner/manager, who may be
an individual or an entity (e.g., a property management agency), strictly for the purpose of the
property enquiry.</p>

<h3>3) Competitions</h3>
<p>From time to time, The IG Group Media will run competitions for its users through its websites,
either on its own or in cooperation with business partners. In order to participate in such
competitions, you will be asked to submit the following personal data:</p>

<ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> First and last name; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Email address; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Telephone number (optional);</li>
<li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Message to the competition owner/business partner.</li>

                            </ul>
<br>
<p>When a competition is run in cooperation with a business partner (e.g. a languages institute
offering a language course), your information will be submitted securely directly to the business
partner strictly for the purpose of participating in the competition.</p>


                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div><!-- /.page-wrapper -->
@endsection
