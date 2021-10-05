<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | IG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/IG.svg')}}">
    @include('layouts.head')
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
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content" style="padding-bottom: 0px !important;">
                <div class="container-fluid">
                    @yield('content')
             {{--       
            <!-- passcode Modal Starts -->
            <div class="modal Pass_codebox" id="passcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-sm-pass" role="document">
                  <div class="modal-content">
               <div class="Vcode_title">
                   <a class="badge badge-lg rounded-pill badge-soft-primary right_passcode" id="correctPasswordHrefId" href=""><img src="../../../assets/images/popup-lock.png" style=""></a>
                   <a class="badge badge-lg rounded-pill badge-soft-danger wrong_passcode" id="wrongPasswordHrefId" style="display:none" href=""><img src="../../../assets/images/popup-lock.png"></a>
                  <h4>Authentication Required <br>Enter Your 6 Digit Passcode to Proceed</h4>
               </div>  
               <div class="row"> 
               <div class="col-md-12 code_InputBox">
                <ul class="code_listing">
                <li>
                    <input type="password" maxlength=1 id="txtFirst" autofocus onkeyup="moveOnMax(this,'txtSecond','')" />
                    <input type="password" maxlength=1 id="txtSecond" onkeyup="moveOnMax(this,'txtThird','txtFirst')" />
                    <input type="password" maxlength=1 id="txtThird" onkeyup="moveOnMax(this,'txtFourth','txtSecond')" />
                </li>
                <li>
                    <input type="password" maxlength=1 id="txtFourth" onkeyup="moveOnMax(this,'txtFifth','txtThird')" />
                    <input type="password" maxlength=1 id="txtFifth" onkeyup="moveOnMax(this,'txtSixth','txtFourth')" />
                    <input type="password" maxlength=1 id="txtSixth" onkeyup="moveOnMax(this,'','txtFifth')" />
                </li>
                </ul>
               </div>
               </div>
                <div class="row keybord_box">
                    <div class="col-md-12 numbers">
                        <ul class="keybord_list">
                            <li>
                                <button id="b1" onclick="reply_click(this)">1</button>
                                <button id="b2" onclick="reply_click(this)">2</button>
                                <button id="b3" onclick="reply_click(this)">3</button>
                            </li>
                            <li>
                                <button id="b4" onclick="reply_click(this)">4</button>
                                <button id="b5" onclick="reply_click(this)">5</button>
                                <button id="b6" onclick="reply_click(this)">6</button>
                            </li>
                            <li>
                                <button id="b7" onclick="reply_click(this)">7</button>
                                <button id="b8" onclick="reply_click(this)">8</button>
                                <button id="b9" onclick="reply_click(this)">9</button>
                            </li>
                            <li>
                                <button id="b0" onclick="reply_click(this)">0</button>
                                <button id="bb" onclick="reply_click(this)">Back</button>
                            </li>
                        </ul>
                    </div>
                    </div>
                  </div>
               </div>
            </div>
            <!--passcode Modal Ends -->
            --}}
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.right-sidebar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    @include('layouts.footer-script')
</body>

</html>