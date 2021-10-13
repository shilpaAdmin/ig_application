@extends('frontend.layouts.master')
@section('title')  @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<body>

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
                <h2 class="h2_oth_pgs">Terms Of Use</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Terms Of Use</span></li>
                </ul>
            </div>
        </section>

        <section class="privacy_details">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy_box">
                            <p>Version 1.0</p>
                            <p>PLEASE READ THESE TERMS OF USE AND SALE, CAREFULLY. BY USING THIS PLATFORM, YOU
INDICATE YOUR UNDERSTANDING AND ACCEPTANCE OF THESE TERMS IN FULL. IF YOU
DISAGREE TO THESE TERMS OR ANY PART OF THESE TERMS, YOU MAY NOT USE THIS
PLATFORM.</p>
                            
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> “User”, “You”, “Your” means any person who browses, views, accesses or uses
this Platform;
                                </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> “Use” or “Using” means to browse, access, view, purchase the Products or
otherwise gain benefit from using this Platform; </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> “We”, “Company”, “us” and “our” means The IG Group having its registered office at
Kantor-Reiche-Ring 37, 38162, Cremlingen; </li>
                                 <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> “Website” means https://indianingermany.de/ duly owned, operated and maintained
by Company in the territory India / Worldwide.
                                </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> “Products” shall mean and include sale of Seller’s products, including but not limited to
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
                            <p>Welcome to our Platform. If you continue to browse and use this Platform, you are agreeing to
comply with and be bound by these terms and conditions (“Terms of Use and Sale”), which together
with our privacy policy (“Privacy Policy”) govern the Company's relationship with you. </p>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 3. USER ACCOUNT </h2>
                            <p>In order access the entire Platform, you are required to register and create a User Account with
password (“User Account”). At the time of registration, you shall be required to share certain
information such as name, mobile no., address, city, state, email Id and any other information as
covered and mentioned in our Privacy Policy (“Personal Information”) with the Company. You may
cancel your account at any time. </p>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 4. DISCLAIMER </h2>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The information contained in our websites is for general information purposes only. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The information is provided by The IG Group Media and while we endeavour to keep
the information up to date and correct, we make no representations or warranties of
any kind, express or implied, about the completeness, accuracy, reliability, suitability
or availability with respect to the websites or the information, products, or services
contained on the websites for any purpose. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Our websites include links to other websites which are not under the control of The IG
Group Media nor governed by these terms and conditions. We have no control over
the nature, content and availability of those websites.</li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The inclusion of any links does not necessarily imply a recommendation or endorse the
views expressed within them. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> The IG Group Media may make available certain job listings and other job-related
contents, including links to third-party websites through The IG Group Jobs. Job listings
are created and provided by third parties over whom The IG Group Media exercises
no control. You acknowledge and understand that we have no control over job listings.
The IG Group Media does not have any obligation to screen any job listing, or to
include any job listing in its search results or other listings, and may exclude or remove
any job listing from the website for any or no reason. We cannot confirm the accuracy
or completeness of any job listing or other information submitted by any employer or
other user, including the identity of such employer or other user. The IG Group Media
assumes no responsibility, and disclaims all liability, for the content, accuracy,
completeness, legality, reliability, or availability of any job listing.</li>
<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media may make available certain property listings and other propertyrelated
contents, including links to third-party websites through The IG Group Housing.
Property listings are created and provided by third parties over whom The IG Group
Media exercises no control. You acknowledge and understand that we have no control
over property listings. The IG Group Media does not have any obligation to screen
any property listing, or to include any property listing in its search results or other
listings, and may exclude or remove any property listing from the website for any or
no reason. We cannot confirm the accuracy or completeness of any property listing or
other information submitted by any agent or other user, including the identity of such
agent or other user. The IG Group Media assumes no responsibility, and disclaims all
liability, for the content, accuracy, completeness, legality, reliability, or availability of
any property listing. </li>

<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media shall not be liable for any contents provided by or made
available by any user, including the user’s contents. In particular, The IG Group Media
does not guarantee that any such contents are true or accurate. </li>



                            </ul>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 5. COMMERCIAL USE OF MATERIALS </h2>
                            
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Information (written and audio / visual material) in this website is protected under
applicable copyrights and other proprietary laws, including but not limited to
intellectual property laws. Using, reproducing, copying or redistributing such material
without the written permission of The IG Group Media is strictly prohibited. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The logo, name, and all graphics on this website and its (online and offline)
applications are trademarks of The IG Group Media and may not be used,
reproduced, copied or redistributed without the written permission of The IG Group
Media. </li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="privacy_box">
                            <h2> 6. GENERAL RULES </h2>
                            
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> You shall not transmit to The IG Group Media or upload to its websites any harmful
code or use or misappropriate the data on its websites for your own commercial
gain. "Harmful Code" shall mean any software (sometimes referred to as "viruses,"
"worms," "trojan horses," "time bombs," "time locks," "drop dead devices," "traps,"
"access codes," "cancelbots" or "trap door devices") that: (a) is intentionally designed
to damage, disrupt, disable, harm, impair, interfere with, intercept, expropriate or
otherwise impede in any manner, any data, storage media, program, system,
equipment or communication, based on any event, including for example but not
limited to (i) exceeding a number of copies, (ii) exceeding a number of users, (iii)
passage of a period of time, (iv) advancement to a particular date or other numeral,
or (v) use of a certain feature; or (b) would enable an unauthorized person to cause
such result; or (c) would enable an unauthorized person to access another person’s
information without such other person’s knowledge and permission. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> You agree that you will not engage in any activity that interferes with or disrupts the
websites (or the servers and networks which are connected to the websites). </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> The user is forbidden to approach other users for commercial purpose of any kind.</li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> If you are a job seeker, any resume or application information that you submit through
the websites is subject to the websites' <a href="#"> Privacy Policy.</a> </li>
<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media does not conduct a background check of its users and does not
verify any statement from its users. Therefore, The IG Group Media shall not be liable
for any user’s behaviour. </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 7. COMMENTS POLICY </h2>
                            
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Comments - just like articles, reviews, photos, captions, videos etc. - containing or
linking to: <br>
a. Offensive/abusive/hateful/threatening language <br>
b. humiliation <br>
c. sexual violence <br>
d. discriminatory treatment <br>
e. commercial advertising / spam <br>
f. racism and / or homophobia <br>
g. trolling <br>
h. pornography <br>
i. gambling <br>
j. personal information of others <br>
k. political interests <br>
l. more than four links will be immediately edited or deleted.<br>


</li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> All comments are the responsibility of the commenter. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Repetitive posts and / or extensive distribution including but not limited to commercials,
emails, chain letters, messages in users' inbox of the same content is strictly prohibited. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media, administrators and / or the editor reserve the right to edit, delete,
move, or mark as spam any and all comments. They also have the right to block access
to any one or group from commenting or from the entire website. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Violation of this Comments Policy may result in blocking from future access and / or
commenting on this website. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i>If comments do not appear in a reasonable time period and these comment policies
have not been violated, please contact <a href="mailto:contact@indianingermany.de"> contact@indianingermany.de</a> </li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 8. SECURITY </h2>
                            <p>The IG Group Media seeks to use reasonable security measures to help protect against the loss,
misuse and alteration of the Personal Information under The IG Group Media’s control. No method
of transmission over the Internet, or method of electronic storage, is 100% secure. In addition,
please note that emails, messages sent via your web browser, and other similar means of
communication with other users, are not encrypted. We strongly advise you not to communicate
any confidential or sensitive information through these means. Therefore, while we strive to protect
your information, we cannot guarantee its security.</p>
                            
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 8. SECURITY </h2>
                            <p>The IG Group Media seeks to use reasonable security measures to help protect against the loss,
misuse and alteration of the Personal Information under The IG Group Media’s control. No method
of transmission over the Internet, or method of electronic storage, is 100% secure. In addition,
please note that emails, messages sent via your web browser, and other similar means of
communication with other users, are not encrypted. We strongly advise you not to communicate
any confidential or sensitive information through these means. Therefore, while we strive to protect
your information, we cannot guarantee its security.</p>
                            
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> 9. USE OF RSS FEEDS </h2>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> RSS is a free service offered by The IG Group Media for non-commercial use. Any
other uses, including without limitation the incorporation of advertising into or the
placement of advertising associated with or targeted towards the RSS Content, are
strictly prohibited. You must use the RSS feeds as provided by The IG Group Media,
and you may not edit or modify the text, content or links supplied by The IG Group
Media </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The RSS service may be used only with those platforms from which a functional link is
made available that, when accessed, takes the viewer directly to the display of the full
article on The IG Group websites. </li>

<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media retains all ownership and other rights in the RSS Content, and
any and all The IG Group.de logos and trademarks used in connection with the RSS
Service. You must provide attribution to the appropriate The IG Group Website in
connection with your use of the RSS feeds. If you provide this attribution using a
graphic, you must use the appropriate The IG Group logo. </li>

<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media reserves the right to discontinue providing any or all of the RSS
feeds at any time and to require you to cease displaying, distributing or otherwise
using any or all of the RSS feeds for any reason including, without limitation, your
violation of any provision of these Terms of Use. The IG Group Media assumes no
liability for any of your activities in connection with the RSS feeds or for your use of the
RSS feeds in connection with your website. </li>

                            </ul>
                            
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="privacy_box">
                            <h2>10. EDITING RIGHTS </h2>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Submission of materials implies that it is not being considered for publication or soon
to be submitted elsewhere. This excludes writers' personal blogs and / or websites. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Copyrighted content should not be posted without express (written) permission.
Quoting material must at least be accompanied with an attribution. </li>

<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Authors are responsible for obtaining permission to publish any material under
copyright. </li>

<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media reserves the right to edit - heavily if necessary - submitted
material. If substantial editing is required, edited material is returned back for review. </li>

                            </ul>
                            
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2>11. MEDIATION SERVICES </h2>
                            <p>The IG Group provides a platform for information as well as for the mediation of
several kinds of services. The IG Group undertakes a professional research on all
articles. Nevertheless The IG Company cannot accept any liability for the content and
for third party services on its platforms.</p>
<p>The IG Group merely provides the platform for the mediation of services, but is not
involved in the orders mediated via the platform either as a contractual party or as a
representative, vicarious agent or similar.</p>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2>12. NOTES</h2>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media retains the right to notify the proper authorities when the law has
been broken. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> The IG Group Media has the option, but not the obligation, to publish any submitted
material. The IG Group Media reserves the right to decide what material is or is not to
be published on The IG Group Websites and its social media network. </li>

<li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Every effort is made to keep the websites up and running smoothly. However, The IG
Group Media takes no responsibility for, and will not be liable for, the websites being
temporarily unavailable due to technical issues beyond our control. </li>
                            </ul>
                            
                        </div>
                    </div>







                   

                </div>
            </div>
        </section>

    </div><!-- /.page-wrapper -->

</body>
</html>
@endsection
