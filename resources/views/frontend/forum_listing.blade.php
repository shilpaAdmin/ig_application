@extends('frontend.layouts.master')
@section('title') Forum @endsection
@section('content')

        <div class="preloader">
            <img src="{{ URL::asset('assets/frontend/images/loader.png')}}" class="preloader__image" alt="">

        </div><!-- /.preloader -->

        <div class="page-wrapper">

            {{-- <div class="site-header__header-one-wrap clearfix">
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
            </div> --}}


            <section class="page-header backgroundimgforum">
                <div class="overlayforcontactbg"></div>
                <div class="container">
                    <h2 class="h2_oth_pgs">Forum listing</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('/')}}">Home</a></li>
                        <li><span>Forum</span></li>
                    </ul>
                </div>
            </section>

            <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
                <div class="container" id="results">
                    @include('frontend.forum.forum-list')                 
                </div>
            </section>
        </div><!-- /.page-wrapper -->

        {{-- <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

        <div class="side-menu__block">
            <div class="side-menu__block-overlay custom-cursor__overlay">
                <div class="cursor"></div>
                <div class="cursor-follower"></div>
            </div><!-- /.side-menu__block-overlay -->
            <div class="side-menu__block-inner ">
                <div class="side-menu__top justify-content-end">
                    <a href="#" class="side-menu__toggler side-menu__close-btn"><img
                            src="{{ URL::asset('assets/frontend/images/shapes/close-1-1.png')}}" alt=""></a>

                </div><!-- /.side-menu__top -->

                <nav class="mobile-nav__container">
                    <!-- content is loading via js -->
                </nav>

                <div class="side-menu__sep"></div><!-- /.side-menu__sep -->

                <div class="side-menu__content">
                    <p>
                        <a href="signup.html">Signup</a><br>
                        <a href="login.html">Login</a> <br>
                        <a href="mailto:needhelp@ig.com">needhelp@ig.com</a> <br>
                        <a href="tel:000-000-0000">000 000 0000</a>


                    </p>
                    <div class="side-menu__social">
                        <a target="blank" href="https://www.facebook.com/indiingermany"><i class="fab fa-facebook-square"></i></a>
                        <a target="blank" href="https://www.instagram.com/indingermany/"><i class="fab fa-instagram"></i></a>
                        <a target="blank" href="https://www.pinterest.com/indianingermany/"><i class="fab fa-pinterest-p"></i></a>
                        <a target="blank" href="https://www.linkedin.com/company/indiansingermany/"><i class="fab fa-linkedin"></i></a>
                        <a target="blank" href="https://twitter.com/indingermany/"><i class="fab fa-twitter"></i></a>
                        <a target="blank" href="#"> <i class="fab fa-youtube"></i> </a>
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
        </div> --}}

    
@endsection
