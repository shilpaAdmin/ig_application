@php
    
    $user = auth()->user();
    $userData = session()->get('user');
    // dd($user,$userData);
@endphp

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | IG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/logo32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/logo16.png"> -->

    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('assets/frontend/images/favicons/logo32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/frontend/images/favicons/logo16.png')}}">
    
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
        var user = JSON.parse('{!! json_encode(session()->get('user')) !!}');
       
        console.log("user details");
        console.log(user);
           
            $(document).ready(function () {
               
                // user location update
                $(document).on('click','.location_a',function(e) {
                    e.preventDefault();
                    var userId= $(this).data('userid');
                    var locationId= $(this).data('locationid');
                    var type= $(this).data('type');

                    console.log("update....")
                    console.log(userId);
                    console.log(locationId);
                    console.log(type);

                    var url ="{{ route('users.updatelocation')}}";
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        }
                    });

                    $.ajax({
                        type: 'post',
                        url: url,
                        dataType: 'json',
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
                            console.log("data update")
                            console.log(data)
                            console.log(data.userLocation['user']);
                            user =data.userLocation;
                            $('#exampleModallocation').modal('toggle');
                            setTimeout(function(){
                                $('#exampleModallocation').modal('hide');
                            }, 1500);
                            $('#locationname').text(data.userLocation['user']['SelectedLocationName']);
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

                // load all location 
                $("body").on('click','#loadLocation',function(e){
                    e.preventDefault();
                    loadLocation();
                })
            });
            
            // load location function
            function loadLocation() {
                var url = "{{route('users.getalllocation')}}";
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
                        console.log("sdfdf");
                        console.log(user);
                        // user=data.Result['user']
                        var html='';
                        $.each(data.Result, function (i){
                            var id = data.Result[i]['Id'];
                            var name = data.Result[i]['Name'];
                            var type = data.Result[i]['Type'];
                            var number = data.Result[i]['Number'];
                            console.log("result");
                            console.log(id)
                            console.log(name)
                            console.log(type)
                            console.log(number)
                            if(typeof user != "undefined"){
                                if(user && user['user']['SelectedLocationID']==id){
                                    html+='<div>'+ name +'</div>';
                                }else {
                                    html+='<div>'+ name +'<a href="#" class="float-right d-inline-block location_a" data-userid="'+ user['user']['Id'] +'" data-locationid="'+id+'" data-type="'+type+'"> Select Location </a>  </div>';
                                } 
                            } else{

                                html+='<div>'+ name +'<a href="#" class="float-right d-inline-block location_a" > Select Location </a>  </div>';
                            }
                        });
                        $('.select_location').html(html);

                        $('#exampleModallocation').modal('toggle');

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
