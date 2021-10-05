@extends('frontend.layouts.master')
@section('title') GDRP Notice @endsection
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
                <h2 class="h2_oth_pgs">GDPR Notice</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>GDPR Notice</span></li>
                </ul>
            </div>
        </section>

        <section class="privacy_details">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy_box">
                            <p>We are committed to protecting the privacy and confidentiality of all Personal
                                Information that you may share as a user of Media In furtherance thereof, we have this
                                policy to demonstrate our good faith.</p>
                            <p>Personal Information will be kept confidential and will be used for our research,
                                marketing, and strategic client analysis objectives and other internal business purposes
                                only. We do not sell or rent Personal Information except that in case you are a customer
                                of our search services through any of the Media, your Personal Information shall be
                                shared with our subscribers/advertisers and you shall be deemed to have given consent to
                                the same. Further, the subscribers / advertisers who are listed with us, may call you,
                                based on the query or enquiry that you make with us, enquiring about any</p>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Product / Service or
                                </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Product / Service of
                                    any subscriber / advertiser or </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Product / Service
                                    of any particular subscriber / advertiser. </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h2> Privacy Notice: </h2>
                            <p> We are committed to protecting the privacy and confidentiality of all Personal
                                Information that you may share as a user of Media. In furtherance thereof, we have this
                                policy to demonstrate our good faith. </p>
                            <p>This Privacy Policy is incorporated into and is subject to the our Terms of Service. Your
                                use of the Site, Our Software and Service and any personal information you provide
                                remains subject to the terms of this Privacy Policy and our Terms of Service.</p>

                            <h6>What Does This Privacy Policy Cover ?</h6>
                            <p>This Privacy Policy is part of our Terms of Service and covers the treatment of user
                                information, including personally identifying information, obtained by us, including
                                information obtained when you access the Site, use the Service or any other software
                                provided by us.</p>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h3> The Information Justdial Collects </h3>
                            <p>We may obtain the following types of information from or concerning you or your mobile
                                phone device, which may include information that can be used to identify you as
                                specified below ("Personally Identifying Information") : </p>

                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> You provide certain
                                    Personally Identifiable Information, such as your mobile phone number, and mobile
                                    device information to us when choosing to participate in various uses of the
                                    Justdial Service, such as registering as a user, and viewing ratings of contacts in
                                    your address book. In order to provide the our Service, we will periodically access
                                    your address book or contact list on your mobile phone to locate the mobile phone
                                    numbers that have been used to avail our services and to provide ratings of
                                    establishments we have received from users of these mobile numbers. We may access
                                    your location information to provide search results based on your geo location. This
                                    allows the software to provide relevant search results. Location data gathered from
                                    a mobile phone is used only to provide search results and is not used in any other
                                    manner whatsoever. </li>

                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> For some of the service
                                    offerings, a user may have to part with financial data which is required to execute
                                    a particular service request for example booking a flight ticket, bus & train
                                    ticketing, UPI payments, Send payment to vendors, Bill pay and recharge etc. A user
                                    may not part with the information for which the service offering won't be available.
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="privacy_box">
                            <h3> Third-party Advertisers, Links to Other Sites</h3>
                            <p> IG is currently ad-free and we hope to keep it that way forever. We have no intention to
                                introduce advertisement into the product, but if we ever do, we will update this
                                section. </p>
                            <h4>Our Commitment to Data Security:</h4>
                            <p>Justdial uses commercially reasonable physical, managerial, and technical safeguards to
                                preserve the integrity and security of your personal information. We cannot, however,
                                ensure or warrant the security of any information you transmit to Justdial and you do so
                                at your own risk.</p>

                            <h4>Consent To Push Notification</h4>
                            <p>You agree and confirm that any review, rating and comments, including any other content
                                or data therein, that you submit/post on IG platforms viz. WEB, WAP, APP & Phone etc.
                                such details as per Just Dial's discretion will be shared with your Tagged Friends who
                                are the users of Just Dial's services.</p>

                        </div>
                    </div>


                    <div class="col-12">
                        <div class="privacy_box">
                            <h5> Lorem ipsum dolor sit amet heading five </h5>
                            <p> Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Quaerat fugit ut vitae et
                                unde in vel, nihil, quia esse blanditiis excepturi quo quas aut dolorem cupiditate
                                officia a nemo animi! </p>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum dolor sit
                                    amet. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum dolor sit
                                    amet, consectetur, adipisicing elit. Adipisci, natus? Lorem ipsum dolor sit amet,
                                    consectetur, </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Lorem ipsum dolor
                                    sit, amet consectetur adipisicing elit. Perspiciatis pariatur aliquid cupiditate
                                    perferendis rem, molestiae. Lorem ipsum dolor sit.</li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum dolor sit
                                    amet, consectetur, adipisicing elit. Adipisci, natus? Lorem ipsum dolor sit amet,
                                    consectetur, </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Lorem ipsum dolor
                                    sit, amet consectetur adipisicing elit. Perspiciatis pariatur aliquid cupiditate
                                    perferendis rem, molestiae. Lorem ipsum dolor sit.</li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="privacy_box">
                            <h6> Lorem ipsum dolor sit amet heading six </h6>
                            <p> Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Quaerat fugit ut vitae et
                                unde in vel, nihil, quia esse blanditiis excepturi quo quas aut dolorem cupiditate
                                officia a nemo animi! </p>
                            <ul class="list-unstyled">
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum dolor sit
                                    amet. </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum dolor sit
                                    amet, consectetur, adipisicing elit. Adipisci, natus? Lorem ipsum dolor sit amet,
                                    consectetur, </li>
                                <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Lorem ipsum dolor
                                    sit, amet consectetur adipisicing elit. Perspiciatis pariatur aliquid cupiditate
                                    perferendis rem, molestiae. Lorem ipsum dolor sit. Lorem ipsum dolor sit, amet
                                    consectetur adipisicing elit. Perspiciatis pariatur aliquid cupiditate perferendis
                                    rem, molestiae. Lorem ipsum dolor sit</li>
                            </ul>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="privacy_box">
                                    <h3> Lorem ipsum dolor sit amet heading three </h3>
                                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Quaerat fugit ut
                                        vitae et unde in vel, nihil, quia esse blanditiis excepturi quo quas aut dolorem
                                        cupiditate officia a nemo animi! </p>
                                    <ul class="list-unstyled">
                                        <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum
                                            dolor sit amet. </li>
                                        <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum
                                            dolor sit amet, consectetur, adipisicing elit. Adipisci, natus? Lorem ipsum
                                            dolor sit amet, consectetur, </li>
                                        <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Lorem ipsum
                                            dolor sit, amet consectetur adipisicing elit. Perspiciatis pariatur aliquid
                                            cupiditate perferendis rem, molestiae. Lorem ipsum dolor sit.</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="privacy_box">
                                    <h3> Lorem ipsum dolor sit amet heading three </h3>
                                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Quaerat fugit ut
                                        vitae et unde in vel, nihil, quia esse blanditiis excepturi quo quas aut dolorem
                                        cupiditate officia a nemo animi! </p>
                                    <ul class="list-unstyled">
                                        <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum
                                            dolor sit amet. </li>
                                        <li> <i class="fas fa-circle font_small10 text_green pr-3"></i> Lorem ipsum
                                            dolor sit amet, consectetur, adipisicing elit. Adipisci, natus? Lorem ipsum
                                            dolor sit amet, consectetur, </li>
                                        <li> <i class="fas fa-circle font_small10 text_green pr-3"></i></i> Lorem ipsum
                                            dolor sit, amet consectetur adipisicing elit. Perspiciatis pariatur aliquid
                                            cupiditate perferendis rem, molestiae. Lorem ipsum dolor sit.</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div><!-- /.page-wrapper -->

</body>

</html>
@endsection
