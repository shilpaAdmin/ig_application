
 


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

                            <li><a href="{{ route('Login') }}"><i class="fas fa-user"></i>Log in </a></li>

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
    <header class="main-nav__header-one">
        <nav class="header-navigation one stricky">
            <div class="container-box clearfix">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="main-nav__left main-nav__left_one float-left">
                    <div class="logo_one">
                        <a href="index.html" class="main-nav__logo">
                            <img src="{{ URL::asset('assets/frontend/images/resources/logo-black2.png')}}" class="main-logo" alt="Awesome Image">
                        </a>
                    </div>
                    <a href="#" class="side-menu__toggler">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>

                <div class="main-nav__main-navigation one float-left">
                    <ul class="main-nav__navigation-box">
                        <li class="current-menu-item"> <a class="" href="{{ route('/') }}">Home</a></li>
                          <li> <a href="{{ route('Faqs') }}">FAQs</a></li>
                          <li> <a href="{{ route('ForumList') }}">Forum</a></li>
                          <li> <a href="{{ route('Contact') }}">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->

                <div class="main-nav__right main-nav__right_one float-right">


                    <div class="dw_btnss float-right px-1 d-inline-block">
                        <a href="#" class=""> <img src="{{ URL::asset('assets/frontend/images/resources/appstore.png')}}"> </a>
                    </div>

                    <div class="dw_btnss float-right  px-1 d-inline-block">
                        <a href="#" class=""> <img src="{{ URL::asset('assets/frontend/images/resources/playstore.png')}}"> </a>
                    </div>

                    <div class="header_btn_1">
                        <a href="#" data-toggle="modal" data-target="#exampleModallisting" class="hvr-sweep-to-right"><span style="padding: 0 10px 0 0;"><i class="fas fa-plus"></i></span>Add listings</a>
                    </div>

                    <div class="icon-search-box">
                        <a href="#" class="main-nav__search search-popup__toggler">
                            <i class="icon-magnifying-glass"></i>
                        </a>
                    </div>
            </div>

        </div>
        </nav>

    </header>
</div>




  <!-- model -->
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
                      <a href="{{ route('Addservice') }}">  Add Service</a>
                   </div>
                   <div>
                       <a href="{{ route('Addbusiness') }}">  Add Business</a>
                   </div>
                   <div>
                      <a href="{{ route('Addadvertisement') }}"> Add Advertisement</a>
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


