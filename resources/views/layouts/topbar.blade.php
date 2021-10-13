<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <!--<img src="../../../assets/images/logo.svg" alt="" height="22">-->
                        <img src="../../../assets/images/IG.svg" alt="" height="5">
                    </span>
                    <span class="logo-lg">
                        <!--<img src="../../../assets/images/logo-dark.png" alt="" height="17">-->
                        <img src="../../../assets/images/IG-dark.png" alt="" height="17">
                    </span>
                </a>

                <a href="{{ route('home')}}" class="logo logo-light">
                    <span class="logo-sm logo-sm-header">
                        <!--<img src="../../../assets/images/logo-light.svg" alt="" height="22">-->
                        <img src="../../../assets/images/newiground.svg" alt="" width="30">
                    </span>
                    <span class="logo-lg logo-lg-header">
                        <!--<img src="../../../assets/images/logo-light.png" alt="" height="19">-->
                        <img src="../../../assets/images/newigadmin.svg" alt="" width="100%" >
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            {{--
            <div class="position-relative pt-top-main">
                <div class="bor-top-main" style="color: #000; font-weight: 700;">
                    <span class="d-none d-xl-inline-block ml-1">{{ucwords(Auth::user()->name)}}</span></br>
                    <span class="d-none d-xl-inline-block ml-1">{{ucwords(Auth::user()->username)}}</span>
               </div>
            </div>

            <div class="position-relative pt-top-main">
                <span class="d-none d-xl-inline-block ml-1" style="border-bottom: 0.5px solid #556ee5; color: #000; font-weight: 600;">
                    Working From Office
                <div class="spinner-grow text-success m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div></span>
											</br>
                <span class="d-none d-xl-inline-block ml-1">Working From Outside Office

                <!--<div class="spinner-grow text-secondary m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>-->
                </span>
            </div>--}}
            <!-- App Search-->
<!--            <form class="app-search d-none d-lg-block" style="width:25%;">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search . . .">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>-->


<!--            <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false"
                    aria-expanded="false">
                    Mega Menu
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);"> <i
                                                    class="bx bxs-news"></i> News Room</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('sales/customerlist') }}"> <i class="bx bxs-briefcase"></i>
                                                Sales
                                                Operations</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('marketingpromotion/myapppromotionlist') }}"> <i
                                                    class="bx bxs-megaphone"></i>
                                                Marketing &
                                                Promotions</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('hradmin/employeelist') }}"> <i
                                                    class="bx bxs-user-plus"></i> HR &
                                                Admin</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('accountsvender/vendorlist') }}"> <i
                                                    class="bx bxs-user"></i>
                                                Accounts &
                                                Vender</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-message-rounded-dots"></i>
                                                Social Media Centre</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-file-plus"></i> Document
                                                Centre</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-contact"></i> Smart Contact
                                                List</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-home-circle"></i> Work From
                                                Home</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-calendar-check"></i> Online
                                                Interview</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-book"></i> Subscription
                                                Management</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bx-world"></i> Website
                                                Management</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-buoy"></i> Story Pool</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-help-circle"></i> Quick
                                                Guide</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('setting') }}"> <i class="bx bxs-cog"></i> Setting</a>
                                        </li>

                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>-->
<!--            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect">
                    <i class="bx bxs-keyboard"></i>
                </button>
            </div>-->
        </div>



        <div class="d-flex">
            {{--
            <div class="time_and_date">
                <div class="wather">
                    <div class="singal_wathar">
                        <p style="margin-bottom: 3px;">Ahmedabad</p>
                        <h4>30°C <img src="../../../assets/images/Weather-05.png"
                                style="max-width:25px;    position: relative;    top: -7px;"></h4>
                    </div>
                    <div id="showcountry" style="    display: flex;
                    align-items: center;
                    height: 100%;">
                    </div>


                </div>
            </div>
            --}}

                <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false"
                    aria-expanded="false">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-unstyled megamenu-list">

                                        <li>
                                            <a href="{{ url('hradmin/employeelist') }}"> <i
                                                    class="bx bxs-user-plus"></i> HR &
                                                Admin</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('setting/category') }}"> <i
                                                    class="bx bxs-book"></i> Categories</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('setting/tags') }}"> <i
                                                    class="bx bxs-file-plus"></i> Tags</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('setting/business') }}"> <i
                                                    class="bx bxs-briefcase"></i> Business</a>
                                        </li>
                                        {{--
                                        <li>
                                            <a href="{{ url('newsroom-justIn/justInTimeline_justin') }}"> <i class="bx bxs-news"></i> News Room</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('sales/customerlist') }}"> <i class="bx bxs-briefcase"></i>
                                                Sales
                                                Operations</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('marketingpromotion/myapppromotionlist') }}"> <i
                                                    class="bx bxs-megaphone"></i>
                                                Marketing &
                                                Promotions</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('hradmin/employeelist') }}"> <i
                                                    class="bx bxs-user-plus"></i> HR &
                                                Admin</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('accountsvender/vendorlist') }}"> <i
                                                    class="bx bxs-user"></i>
                                                Accounts &
                                                Vender</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-message-rounded-dots"></i>
                                                Social Media Centre</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-file-plus"></i> Document
                                                Centre</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-contact"></i> Smart Contact
                                                List</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-home-circle"></i> Work From
                                                Home</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-calendar-check"></i> Online
                                                Interview</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-book"></i> Subscription
                                                Management</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bx-world"></i> Website
                                                Management</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-buoy"></i> Story Pool</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"> <i class="bx bxs-help-circle"></i> Quick
                                                Guide</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('setting') }}"> <i class="bx bxs-cog"></i> Setting</a>
                                        </li>
                                        --}}
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="dropdown d-inline-block d-lg-none ml-2">
                {{--
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                --}}
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search . . ."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bxs-keyboard"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search . . ."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            {{--
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="modal"
                    data-target="#CountryListData" data-backdrop='static' data-keyboard='false'>
                    <i class="bx bx-time-five"></i>
                </button>

            </div>
            --}}


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge badge-danger badge-pill"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div>
                        </div>
                    </div>

                    <div data-simplebar style="max-height: 230px;">

                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> View More..
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item header-item-bl waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="../../../assets/images/users/avatar-2.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ucwords(Auth::user()->name)}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="contacts-profile"><i
                            class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i
                            class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="get" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <!-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div> -->

        </div>
    </div>


</header>
