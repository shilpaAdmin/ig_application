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

    <script>
        var token = $.cookie('token');
        var userObj=$.cookie('user');
        var user=null;
        if (typeof userObj === "undefined") {
            user=null;
        } else {
            user =JSON.parse( $.cookie('user') );
            console.log( "script" );
            console.log( token );
            console.log( user );
            console.log(user['SelectedLocationID']);
            console.log(user['Email']);
            console.log(user['Name']);
        }
     
           
            $(document).ready(function () {
                setUserData(user,token);
                loadLocation(user,token);  
                $(document).on('click','.location_a',function(e) {
                    e.preventDefault();
                    var userId= $(this).data('userid');
                    var locationId= $(this).data('locationid');
                    var type= $(this).data('type');
                  
                  
                    alert("dfdf" );
                    console.log(userId);
                    console.log(locationId);
                    console.log(type);


                    var url ="{{url('/')}}"+"/api/UpdateLocation";
                    $.ajax({
                        type: 'post',
                        url: url,
                        dataType: 'json',
                        headers: {"Authorization": 'Bearer '+token },
                        data:{
                            'RegisterId': userId,
                            'LocationId' : locationId,
                            'Type' : type
                        },
                        async: true,
                        beforeSend: function() {
                            $('#loader').show(); // Show loader
                        },
                        success: function(data) {
                            console.log(data);
                            $('#exampleModallocation').modal('toggle');
                        },
                        error: function(XMLHttpRequest, errorStatus, errorThrown) {
                            console.log("XHR :: " + JSON.stringify(XMLHttpRequest));
                            console.log("Status :: " + errorStatus);
                            console.log("error :: " + errorThrown);
                        },
                        complete: function() {
                        },
                    });
                });
            });

            function setUserData($user,$token){
                var setLocationName='';
                var userName='';
                if( $token && typeof userObj != "undefined") {
                    userName='<li><a href="javascript:void(0);"><i class="fas fa-user"></i>'+user['Name']+'</a></li>';
                    setLocationName='<a href="#" data-toggle="modal" data-target="#exampleModallocation">'+user['SelectedLocationName']+' <i class="fas fa-caret-down"></i> </a>';
                } else {
                    var loginUrl ="{{ route('login') }}";
                    userName='<li><a href="'+loginUrl+'"><i class="fas fa-user"></i>Log in </a></li>';
                    setLocationName='<a href="#" data-toggle="modal" data-target="#exampleModallocation"> Select Location <i class="fas fa-caret-down"></i> </a>';
                }
                $("#userName").html(userName);
                $("#setLocationName").html(setLocationName);

            }
            function loadLocation($user,$token)
            {
                var url ="{{url('/')}}"+"/api/LocationData";
                $.ajax({
                        type: 'get',
                        url: url,
                        dataType: 'json',
                        async: true,
                        beforeSend: function() {
                            $('#loader').show(); // Show loader
                        },
                        success: function(data)
                        {
                            
                            console.log(data.Result);
                            var html='';
                            $.each(data.Result, function (i){
                                var id = data.Result[i]['Id'];
                                var name = data.Result[i]['Name'];
                                var type = data.Result[i]['Type'];
                                var number = data.Result[i]['Number'];
                                if(typeof userObj != "undefined"){
                                    if($user && $user['SelectedLocationID']==id){
                                        html+='<div>'+ name +'</div>';
                                    }else {
                                        html+='<div>'+ name +'<a href="#" class="float-right d-inline-block location_a" data-userid="'+$user['Id']+'" data-locationid="'+id+'" data-type="'+type+'"> Select Location </a>  </div>';
                                    } 
                                } else{

                                    html+='<div>'+ name +'<a href="#" class="float-right d-inline-block location_a" > Select Location </a>  </div>';
                                }
                            });
                            $('.select_location').html(html);

                        },
                        error: function(XMLHttpRequest, errorStatus, errorThrown) {
                            console.log("XHR :: " + JSON.stringify(XMLHttpRequest));
                            console.log("Status :: " + errorStatus);
                            console.log("error :: " + errorThrown);
                            $("#fullImageDivError").text(
                                'There is something wrong. Please try again');
                            $("#fullImageDivError").show();
                        },
                        complete: function() {
                            setTimeout(() => {
                                $('#loader').hide();
                            }, 1000);
                        },
                    });
            }
           
    </script>
</body>

</html>
