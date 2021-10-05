@extends('layouts.master')

@section('title') Business Add @endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('assets/css/app.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('assets/css/icons.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('assets/css/icons.css') }}" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .container {
        max-width: 960px;
        margin: 30px auto;
        padding: 20px;
    }

    .img {
        max-width: 180px;
    }

    input[type=file] {
        padding: 10px;

    }

    h1 {
        font-size: 20px;
        text-align: center;
        margin: 20px 0 20px;
    }

    h1 small {
        display: block;
        font-size: 15px;
        padding-top: 8px;
        color: gray;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .container2 .btn {
        position: absolute;
        top: 90%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);

        color: white;
        font-size: 16px;

        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
    }
</style>
@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Add Business @endslot
@slot('li_1') Business @endslot
@slot('li_2') Add @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card mb-2">
            <div class="card-body">

                <div class="col-xl-12">
                    <div class="">
                        <div class="newnavlinks">

                            <h4 class="card-title">Business-Deails</h4>
                            <p class="card-title-desc">Example of custom tabs</p>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link  active" data-bs-toggle="tab" href="#home1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Basic</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#profile1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Business Timing</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#messages1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Related Person Detail</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link " data-bs-toggle="tab" href="#settings1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Media Detail</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link " data-bs-toggle="tab" href="#settings12" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Job Detail</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <div class="row my-3">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Basic Details</h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> User</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Tags</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Category</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Business Name</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Business About</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Business Address</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Business Description</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Business Sub-Description</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Business Sub-Description 1</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Actual Price</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Actual Price Unit</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Selling Price</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Selling Price Unit</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile1" role="tabpanel">

                                    <div class="row my-3">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Hours Detail </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2 col-md-3">
                                                    <div class="mat_detail_title"> Day</div>
                                                </div>
                                                <div class="col-xl-10 col-lg-10 col-md-9">
                                                    <div class="mat_desc"> Monday </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2 col-md-3">
                                                    <div class="mat_detail_title"> Start Time</div>
                                                </div>
                                                <div class="col-xl-10 col-lg-10 col-md-9">
                                                    <div class="mat_desc"> 10:00 AM </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2 col-md-3">
                                                    <div class="mat_detail_title"> End Time</div>
                                                </div>
                                                <div class="col-xl-10 col-lg-10 col-md-9">
                                                    <div class="mat_desc"> 5:00 PM </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane" id="messages1" role="tabpanel">
                                    <div class="row my-3">

                                        <div class="col-md-6 mb-4">
                                            <div class="reletedpersdd">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <div>
                                                            <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div>
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla asperiores perferendis laudantium ullam voluptatem aliquid, inventore obcaecati corrupti deserunt, commodi rem incidunt qui officia repudiandae non, optio nesciunt voluptatum dicta?
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="reletedpersdd">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <div>
                                                            <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div>
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla asperiores perferendis laudantium ullam voluptatem aliquid, inventore obcaecati corrupti deserunt, commodi rem incidunt qui officia repudiandae non, optio nesciunt voluptatum dicta?
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="reletedpersdd">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <div>
                                                            <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div>
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla asperiores perferendis laudantium ullam voluptatem aliquid, inventore obcaecati corrupti deserunt, commodi rem incidunt qui officia repudiandae non, optio nesciunt voluptatum dicta?
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="reletedpersdd">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-12 col-md-12">
                                                        <div>
                                                            <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-8 col-lg-12 col-md-12">
                                                        <div>
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla asperiores perferendis laudantium ullam voluptatem aliquid, inventore obcaecati corrupti deserunt, commodi rem incidunt qui officia repudiandae non, optio nesciunt voluptatum dicta?
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings1" role="tabpanel">
                                    <p class="mb-0">
                                    <div class="row my-3">
                                        <div class="col-md-3 mb-4 ">
                                            <div class="mainboxmediaimg">
                                                <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="mainboxmediaimg">
                                                <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="mainboxmediaimg">
                                                <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="mainboxmediaimg">
                                                <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-4">
                                            <div class="mainboxmediaimg">
                                                <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="mainboxmediaimg">
                                                <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="mainboxmediaimg">
                                                <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="mainboxmediaimg">
                                                <img src="../../../assets/images/welcome.png" class="imgmedia img-fluid" alt="">
                                            </div>
                                        </div>

                                    </div>
                                    </p>
                                </div>

                                <div class="tab-pane" id="settings12" role="tabpanel2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Job Salary</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Job Experiance</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Job Qualification</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Contact Person Name</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Mobile Number</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Email Id</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Unit Option</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Reference Url</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Syllabus</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title"> Website</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_detail_title">
                                                        Website
                                                        Payment Mode</div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <div class="mat_desc"> Description </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>






            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>

<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>
<!--<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>-->
<script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
<!-- form mask init -->
<script src="{{ URL::asset('assets/js/pages/form-repeater.int.js')}}"></script>
<script src="https://themesbrand.com/skote/layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    var str_url = '{{route("tagAutoComplete")}}';

    $('#txtSearchTag').select2({
        ajax: {
            //tags:true,
            url: str_url,
            dataType: "json",
            type: "POST",
            data: function(params) {
                var queryParameters = {
                    search: params.term
                }
                return queryParameters;
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data, function(tag) {
                        return {
                            text: tag.name,
                            id: tag.id,
                            result: tag
                        }
                    }),
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true,
        },
        placeholder: 'Select tags',
        minimumInputLength: 1

    }).on("select2:select", function(e) {
        var selected = e.params.data.result;
        var countryId = selected.id;
        var countryName = selected.name;
        var editHiddenVal = $("#hdnSearchTagId").val();

        if (editHiddenVal != '') //use in edit
        {
            $('#hdnSearchTagId').val(countryId);
        } else //first time adding
        {
            /*Add selected area id into array*/
            $('#hdnSearchTagId').val(countryId); //store array
        }
    });

    $('#txtSearchTag').on('select2:unselect', function(e) {
        var data = e.params.data;
        var countryId = data.id;

        var editHiddenVal = $('#hdnSearchTagId').val();
        var checkComma = editHiddenVal.includes(',');
        if (checkComma) {
            var editArray = editHiddenVal.split(',');
            /*Remove data from specific array*/
            editArray.splice(editArray.indexOf(countryId.toString()), 1);
            $('#hdnSearchTagId').val(data.id);
        } else {
            // $("#selectedTagsDivId").hide();
            $('#hdnSearchTagId').val('');
        }
    });

    var str_url = '{{route("categoryAutoComplete")}}';

    $('#txtSearchCategory').select2({
        ajax: {
            url: str_url,
            dataType: "json",
            type: "POST",
            data: function(params) {
                var queryParameters = {
                    search: params.term
                }
                return queryParameters;
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data, function(tag) {
                        return {
                            text: tag.name,
                            id: tag.id,
                            result: tag
                        }
                    }),
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true,
        },
        placeholder: 'Select category',
        minimumInputLength: 1

    }).on("select2:select", function(e) {
        var selected = e.params.data.result;
        var countryId = selected.id;
        var countryName = selected.name;
        var editHiddenVal = $("#hdnSearchCategoryId").val();

        if (editHiddenVal != '') //use in edit
        {
            $('#hdnSearchCategoryId').val(countryId);
        } else //first time adding
        {
            /*Add selected area id into array*/
            $('#hdnSearchCategoryId').val(countryId); //store array
        }

        $.ajax({
            url: "{{route('category.getSubCategories')}}",
            data: 'categoryId=' + $('#hdnSearchCategoryId').val(),
            type: 'POST',
            success: function(obj) {
                //var obj=JSON.parse(html);
                if (obj.status == true) {
                    var data = obj.data;
                    var totalElements = Object.keys(obj.data).length;

                    var html = '<label for="formrow-firstname-input">Sub-Category</label>';
                    var start = 1;
                    var start_point_array = [1];
                    var sum = 0;

                    for (var i = 1; sum < 100;) {
                        sum = i + 4;
                        start_point_array.push(sum);
                        i = sum;
                    }

                    for (var key in obj.data) {

                        if (start_point_array.find(element => element == start)) {
                            html += '<div class="row">';
                        }

                        var id = obj.data[key]['id'];
                        var name = obj.data[key]['name'];
                        console.log('id=' + id + 'name=' + name + '\n');
                        html += "<div class='col-sm-3'><div class='custom-control custom-checkbox'><input type='checkbox' name='subcategory[]' id='" + id + "' class='custom-control-input' value='" + id + "' onchange='showHide()' ><label class='custom-control-label' for=" + id + ">" + name + "</label></div></div>";

                        if (start % 4 == 0) {
                            html += '</div>';
                        }

                        start++;
                    }
                    $('#category_result').html(html);
                    $('#category_result').append('<div class="invalid-feedback" id="subcategoryError">Select atleast one subcategory is required !</div>');
                    console.log(html);
                } else {
                    $('#category_result').html('<div class="formrow-firstname-input">No Sub-Categories Found!</div>');
                }
            },
            error: function(html) {
                console.log('in error list');
            }
        });
    });

    $('#txtSearchCategory').on('select2:unselect', function(e) {
        var data = e.params.data;
        var countryId = data.id;

        var editHiddenVal = $('#hdnSearchCategoryId').val();
        var checkComma = editHiddenVal.includes(',');
        if (checkComma) {
            var editArray = editHiddenVal.split(',');
            /*Remove data from specific array*/
            editArray.splice(editArray.indexOf(countryId.toString()), 1);
            $('#hdnSearchCategoryId').val(data.id);
        } else {
            // $("#selectedTagsDivId").hide();
            $('#hdnSearchCategoryId').val('');
        }
    });

    $(document).on('change', '.custom-file-input', function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().find('.my-2').children().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().find('.small-pic').children().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change', '.media_file', function() {
        readURL2(this);
    });

    function checkSubCategoriesChecked() {
        if ($('input[name="subcategory[]"]').length > 0) {
            // Exists.
            if ($("input[name='subcategory[]']:checked").length == 0) {
                $("[name='subcategory[]']").attr('required', true);
                $('#subcategoryError').show();
                return false;
            } else {
                $("[name='subcategory[]']").attr('required', false);
                $('#subcategoryError').hide();
                return true;
            }
        }
    }

    function showHide() {
        if ($("input[name='subcategory[]']:checked").length != 0) {
            $("[name='subcategory[]']").attr('required', false);
            $('#subcategoryError').hide();
        } else {
            $("[name='subcategory[]']").attr('required', true);
            $('#subcategoryError').show();
        }
    }
</script>
@endsection