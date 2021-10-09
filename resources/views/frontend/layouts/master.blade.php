<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | IG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/logo32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/logo16.png">
    @include('frontend.layouts.head')
</head>

@section('body')
@show

<body data-sidebar="dark">
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('frontend.layouts.topbar')
        {{-- @include('frontend.layouts.sidebar') --}}
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content" style="padding-bottom: 0px !important;">
                <!-- <div class="container-fluid"> -->
                    @yield('content')

               <!--  </div> -->
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('frontend.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    {{--@include('frontend.layouts.right-sidebar')--}}
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    @include('frontend.layouts.footer-script')
</body>

</html>
