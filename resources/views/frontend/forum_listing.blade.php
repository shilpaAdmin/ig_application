@extends('frontend.layouts.master')
@section('title') Forum @endsection
@section('content')

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
           <div class="container">
                <!-- forum box -->

                @foreach ($forums as $forum)
                      <div class="row forum__box">
                        <div class="col-lg-1  for_profile">
                            {{-- <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_left')}}"> --}}
                            <img src="{{ URL::asset('images/user/'.$forum->user_image)}}" class="f__img_left')}}">
                        </div>

                        <div class="col-lg-9 ">
                            {{-- <a href="{{route('forumdetail')}}?id={{$forum->id}}" class="for__title">{{ ucwords($forum->question)}}</a> --}}
                            <a href="{{route('forumdetail',['slug'=>$forum->slug])}}" class="for__title">{{ ucwords($forum->question)}}</a>

                            <p class="for_desc">
                                <span> <a href="javascript:void(0);"> {{ucwords($forum->name)}}</a></span>
                                <span> <a href="javascript:void(0);">  {{$forum->created_at->diffForHumans()}}</a></span>
                                <span> <a href="javascript:void(0);">  {{$forum->forumComments->count()}} replies </a></span>
                            </p>
                        </div>

                        <div class="col-lg-2 for__user">
                            <img src="{{ URL::asset('assets/frontend/images/img/d2.jpg')}}" class="f__img_left">

                            <img src="{{ URL::asset('assets/frontend/images /img/d3.jpg')}}" class="f__img_left margin_minus">

                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

                        </div>
                 </div>
                @endforeach
                 {{-- <div class="row forum__box">
                        <div class="col-lg-1  for_profile">
                            <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_left')}}">
                        </div>

                        <div class="col-lg-9 ">
                            <a href="forum-detail.html" class="for__title">Sed sollicitudin tortor diam, in lobortis arcu porttitor eu. Aenean tempus quam dui. Mauris id scelerisque nibh, eu mollis est. Nulla rutrum tempus tristique?</a>

                            <p class="for_desc">
                            <span> <a href="#"> Stokes Mollie</a></span>
                                <span>  <a href="#">     3 hours ago</a></span>
                                <span>   <a href="#">    26 replies </a></span>
                            </p>
                        </div>

                        <div class="col-lg-2 for__user">
                            <img src="{{ URL::asset('assets/frontend/images/img/d2.jpg')}}" class="f__img_left">

                            <img src="{{ URL::asset('assets/frontend/images /img/d3.jpg')}}" class="f__img_left margin_minus">

                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

                        </div>
                 </div>


                 <div class="row forum__box">
                        <div class="col-lg-1  for_profile">
                            <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_left">

                        </div>

                             <div class="col-lg-9 ">
                                 <a href="forum-detail.html" class="for__title">Sed sollicitudin tortor diam, in lobortis arcu porttitor eu. Aenean tempus quam dui. Mauris id scelerisque nibh, eu mollis est. Nulla rutrum tempus tristique?</a>

                                 <p class="for_desc">
                                    <span> <a href="#"> Stokes Mollie</a></span>
                                      <span>  <a href="#">     3 hours ago</a></span>
                                      <span>   <a href="#">    26 replies </a></span>
                                 </p>
                             </div>

                        <div class="col-lg-2 for__user">
                            <img src="{{ URL::asset('assets/frontend/images/img/d2.jpg')}}" class="f__img_left">

                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

                        </div>
                 </div>

                 <div class="row forum__box">
                        <div class="col-lg-1  for_profile">
                            <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_left">

                        </div>

                             <div class="col-lg-9 ">
                                 <a href="forum-detail.html" class="for__title">Sed sollicitudin tortor diam, in lobortis arcu porttitor eu. Aenean tempus quam dui. Mauris id scelerisque nibh, eu mollis est. Nulla rutrum tempus tristique?</a>

                                 <p class="for_desc">
                                    <span> <a href="#"> Stokes Mollie</a></span>
                                      <span>  <a href="#">     3 hours ago</a></span>
                                      <span>   <a href="#">    26 replies </a></span>
                                 </p>
                             </div>

                        <div class="col-lg-2 for__user">
                            <img src="{{ URL::asset('assets/frontend/images/img/d2.jpg')}}" class="f__img_left">

                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

                        </div>
                 </div>

                 <div class="row forum__box">
                        <div class="col-lg-1  for_profile">
                            <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_left">

                        </div>

                             <div class="col-lg-9 ">
                                 <a href="forum-detail.html" class="for__title">Sed sollicitudin tortor diam, in lobortis arcu porttitor eu. Aenean tempus quam dui. Mauris id scelerisque nibh, eu mollis est. Nulla rutrum tempus tristique?</a>

                                 <p class="for_desc">
                                    <span> <a href="#"> Stokes Mollie</a></span>
                                      <span>  <a href="#">     3 hours ago</a></span>
                                      <span>   <a href="#">    26 replies </a></span>
                                 </p>
                             </div>

                        <div class="col-lg-2 for__user">
                            <img src="{{ URL::asset('assets/frontend/images/img/d2.jpg')}}" class="f__img_left">

                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

                        </div>
                 </div>

                 <div class="row forum__box">
                        <div class="col-lg-1  for_profile">
                            <img src="{{ URL::asset('assets/frontend/images/img/d1.jpg')}}" class="f__img_left">

                        </div>

                             <div class="col-lg-9 ">
                                 <a href="forum-detail.html" class="for__title">Sed sollicitudin tortor diam, in lobortis arcu porttitor eu. Aenean tempus quam dui. Mauris id scelerisque nibh, eu mollis est. Nulla rutrum tempus tristique?</a>

                                 <p class="for_desc">
                                    <span> <a href="#"> Stokes Mollie</a></span>
                                      <span>  <a href="#">  3 hours ago</a></span>
                                      <span>   <a href="#">  26 replies </a></span>
                                 </p>
                             </div>

                        <div class="col-lg-2 for__user">
                            <img src="{{ URL::asset('assets/frontend/images/img/d2.jpg')}}" class="f__img_left">

                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

                            <img src="{{ URL::asset('assets/frontend/images/img/d3.jpg')}}" class="f__img_left margin_minus">

                        </div>
                 </div> --}}
            </div>
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
        </div>

    </body>
    </html>
@endsection
