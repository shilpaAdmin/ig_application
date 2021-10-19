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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="needs-validation" method="post" enctype="multipart/form-data" action="{{route('business.store')}}" onsubmit="checkSubCategoriesChecked()" novalidate>
                    @csrf
                    <div class="form-group">
                        <div class="row m-0">

                            <div class="form-check mr-2">
                                <input class="form-check-input" name="type" type="radio" id="serviceRadio" value="service" checked>
                                <label class="form-check-label" for="serviceRadio">
                                    Service
                                </label>
                            </div>

                            <div class="form-check mr-2">
                                <input class="form-check-input" type="radio" name="type" id="productRadio" value="product">

                                <label class="form-check-label" for="productRadio">
                                    Product
                                </label>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Please provide a Carry Forward.
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">User</label>
                                    <select class="form-select form-control" name="user_id" id="user_id" required>
                                        <option value="">Select User</option>
                                        @foreach($users as $userid=>$username)
                                        <option value="{{$userid}}">{{ucwords($username)}}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        Please provide a User.
                                    </div>
                                </div>



                            </div>

                        </div>


                        <div class="col-md-4">

                            <div>


                                <div class="form-group">
                                    <label for="formrow-firstname-input">Tags</label>
                                    <!--<select class="form-select form-control form-control-lg txtSearchKeyword-box" data-search="on"
                             name="txtSearchTag" id="txtSearchTag" multiple="multiple" required>
                            </select>-->
                                    <select class="form-select form-control form-control-lg" data-search="on" multiple="multiple" name="txtSearchTag" id="txtSearchTag" required>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Tag.
                                    </div>
                                </div>



                            </div>


                        </div>


                        <div class="col-md-4">

                            <div>

                                <div class="form-group" id="categoryDiv">
                                    <label for="formrow-firstname-input">Category</label>
                                    <select class="form-select form-control form-control-lg txtSearchKeyword-box" data-search="on" name="txtSearchCategory" id="txtSearchCategory" required>
                                    </select>

                                    <div class="invalid-feedback">
                                        Please provide a Category.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="category_result">
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Business Name</label>

                                    <input type="text" class="form-control" name="name" id="name" placeholder="Business Name" value="{{old('name')}}" required>
                                    <div class="invalid-feedback">
                                        Please provide a Business Name.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Business About</label>

                                    <input type="text" class="form-control" name="about" value="{{old('about')}}" id="about" placeholder="Business About" required>
                                    <div class="invalid-feedback">
                                        Please provide a Business About.
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Business Address</label>

                                    <input type="text" class="form-control" name="address" value="{{old('address')}}" id="address" placeholder="Business Address" required>
                                    <div class="invalid-feedback">
                                        Please provide a Business Address.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Business Description</label>

                                    <input type="text" class="form-control" name="description" value="{{old('description')}}" id="description" placeholder="Business Description" required>
                                    <div class="invalid-feedback">
                                        Please provide a Business Description.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">



                            <div>
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Business Sub-Description</label>

                                    <input type="text" class="form-control" name="sub_description" value="{{old('sub_description')}}" id="sub_description" placeholder="Business Sub Description" required>
                                    <div class="invalid-feedback">
                                        Please provide a Business Sub-Description.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Business Sub-Description 1</label>

                                    <input type="text" class="form-control" name="sub_description1" value="{{old('sub_description1')}}" id="sub_description1" placeholder="Business Sub Description 1" required>
                                    <div class="invalid-feedback">
                                        Please provide a Business Sub-Description 1.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Actual Price</label>

                                    <input type="number" class="form-control" name="actual_price" value="{{old('actual_price')}}" min="0" id="actual_price" placeholder="Actual Price" required>
                                    <div class="invalid-feedback">
                                        Please provide a Actual Price.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Actual Price Unit</label>

                                    <input type="text" class="form-control" name="actual_price_unit" value="{{old('actual_price_unit')}}" id="actual_price_unit" placeholder="Actual Price Unit" required>
                                    <div class="invalid-feedback">
                                        Please provide a Actual Price Unit.
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-4">

                            <div>


                                <div class="form-group">
                                    <label for="formrow-firstname-input">Selling Price</label>

                                    <input type="number" class="form-control" name="selling_price" value="{{old('selling_price')}}" min="0" id="selling_price" placeholder="Selling Price" required>
                                    <div class="invalid-feedback">
                                        Please provide a Selling Price.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Selling Price Unit</label>

                                    <input type="text" class="form-control" name="selling_price_unit" value="{{old('selling_price_unit')}}" id="selling_price_unit" placeholder="Selling Price Unit" required>
                                    <div class="invalid-feedback">
                                        Please provide a Selling Price Unit.
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>







                    <!-- <div id="category_result" class="form-group"></div> -->














                    <div class="row">
                        <label for="example-text-input" class="col-md-12 col-form-label">
                            <h4 class="card-title">Hours Detail : </h4>
                        </label>
                    </div>
                    <div class="repeater">
                        <div data-repeater-list="hours_detail">
                            <div data-repeater-item class="row">
                                <div class="form-group col-lg-3">
                                    <label for="formrow-firstname-input">Day</label>
                                    <select class="form-select form-control" name="txtDay" id="txtDay" required>
                                        <option value="">Select Day</option>
                                        @foreach($days as $name=>$Name)
                                        <option value={{$name}}>{{$Name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Day.
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="formrow-firstname-input">Start Time</label>
                                    <div class="input-group">
                                        <input id="timepicker" type="text" class="form-control " name="start_time" data-provide="timepicker" required>
                                        <div class="input-group-append input-group-appendclock">
                                            <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a Start Time.
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="formrow-firstname-input">End Time</label>
                                    <div class="input-group">
                                        <input id="timepicker" type="text" class="form-control " name="end_time" data-provide="timepicker" required>
                                        <div class="input-group-append input-group-appendclock">
                                            <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                        </div>

                                        <div class="invalid-feedback">
                                            Please provide a End Time.
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-1 align-self-center">
                                    <button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm  btn-danger mt-2">
                                        <i class="bx bx-trash d-block font-size-16"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create class="btn btn-primary addbtnforall waves-effect btn-sm btn-label-btn-sm btn-label waves-light margin-left-btnew addbtnforall"><i class="bx bx-plus label-icon"></i>
                            Add New</button>
                    </div>

                    <div class="row mt-3">
                        <label for="example-text-input" class="col-md-12 col-form-label">
                            <h4 class="card-title">Related Person Detail :</h4>
                        </label>
                    </div>

                    <div class="repeater main-repeter imagmaineditb">
                        <div data-repeater-list="related_personal_detail">


                            <div data-repeater-item class="row">

                                <div class="col-md-2">

                                    <div>

                                        <div class=""> <img class="imagePreview imagepreivewnew" alt="" width="80" height="80" src="{{URL::asset('images/image-placeholder.jpg')}}" /></div>
                                    </div>

                                </div>



                                <div class="col-lg-4 form-group">

                                    <label for="formrow-firstname-input">Related Person Image</label>

                                    <div class="input-group">

                                        {{--<input type="file" class="custom-file-input related_person_file form-control top-img-call" name="related_person_image" id="related_person_image" accept="image/*" required>

                                        <label class="custom-file-label" for="customFile">Image</label>
                                        <div class="invalid-feedback invalid-feedback-pic">
                                            Related Person Image is required !
                                        </div>--}}
                                        
                                        <input type="file" class="custom-file-input related_person_file form-control" name="related_person_image" id="related_person_image" accept="image/*" required>
                                        <label class="custom-file-label" for="customFile">Image</label>
                                        <div class="invalid-feedback invalid-feedback-pic">
                                            Media File is required !
                                        </div>


                                    </div>

                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="formrow-firstname-input">Related Person Details</label>
                                        <textarea name="related_person_details" class="form-control" value="{{old('related_person_details')}}" id="related_person_details" placeholder="Related Person Details" required></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a Related Person Details.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-danger top-img-call">
                                        <i class="bx bx-trash d-block font-size-16"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create class="btn btn-primary waves-effect addbtnforall btn-sm btn-label-btn-sm btn-label waves-light margin-left-btn margin-left-btnew"><i class="bx bx-plus label-icon"></i>
                            Add New</button>
                    </div>


                    <div class="row mt-3">
                        <label for="example-text-input" class="col-md-12 col-form-label">
                            <h4 class="card-title">Media Detail : </h4>
                        </label>
                    </div>
                    <div class="repeater main-repete imagmaineditb">
                        <div data-repeater-list="media_detail">
                            <div data-repeater-item class="row">


                                <div class="col-md-2">

                                    <div class="small-pic">
                                        <img class="imagePreview2 imagepreivewnew" alt="" width="100" height="100" src="{{URL::asset('images/image-placeholder.jpg')}}" />
                                    </div>

                                </div>
                                <div class="col-lg-4 form-group">

                                    <label for="formrow-firstname-input">Media Image</label>

                                    <div class="input-group">

                                        <input type="file" class="custom-file-input media_file form-control" name="media_file" id="media_file" accept="image/*" required>
                                        <label class="custom-file-label" for="customFile">Image</label>
                                        <div class="invalid-feedback invalid-feedback-pic">
                                            Media File is required !
                                        </div>


                                    </div>

                                </div>



                                <div class="col-lg-1">
                                    <button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-danger top-img-call">
                                        <i class="bx bx-trash d-block font-size-16"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create class="btn btn-primary waves-effect btn-sm btn-label-btn-sm btn-label waves-light margin-left-btn margin-left-btnew addbtnforall"><i class="bx bx-plus label-icon"></i>
                            Add New</button>
                    </div>
                    <div class='row mt-3'>
                        <label for="example-text-input" class="col-md-12 col-form-label">
                            <h4 class="card-title">Syllabus Detail: </h4>
                        </label>
                    </div>
                    {{--<div class="repeater main-repete imagmaineditb">
                        <div data-repeater-list="syllabus_detail">
                            <div data-repeater-item class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group justify-content-end">
                                                <button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-danger">
                                                    <i class="bx bx-trash d-block font-size-16"></i>
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <label for="topic">Topic</label>
                                                <input type="text" name="topic" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    Topic is required !
                                                </div>
                                            </div>
                                            <div class="inner-repeater">
                                                <label>Syllabus</label>
                                                <div class="form-group">
                                                    <input type="text" name="syllabus" class="form-control" required>
                                                    <div class="invalid-feedback">
                                                        Syllabus is required !
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create class="btn btn-primary waves-effect btn-sm btn-label-btn-sm btn-label waves-light margin-left-btn margin-left-btnew"><i class="bx bx-plus label-icon"></i>
                            Add New</button>
                    </div>--}}
                    
                    <div class="main_repeater">
                        <div data-repeater-list="outer-list">
                            <div data-repeater-item>
                                <label>Topic</label>
                                <input type="text" class="form-control" name="topic" />    

                                <!-- innner repeater -->
                                <div class="inner-repeater">
                                <div data-repeater-list="inner-list">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <label>Syllabus</label>
                                                <input type="text" class="form-control" name="syllabus" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input data-repeater-delete type="button" class="btn btn-danger" value="-"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-primary" value="+"/>
                                </div>

                            </div>
                            </div>
                        <input data-repeater-create type="button" class="btn btn-primary" value="+"/>
                    </div>

                    <div class="row mt-3">
                        <label for="example-text-input" class="col-md-12 col-form-label">
                            <h4 class="card-title">Job Detail : </h4>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Job Salary</label>
                                <textarea name="job_salary" class="form-control" value="{{old('job_salary')}}" id="job_salary" placeholder="Job Salary" required></textarea>
                                <div class="invalid-feedback">
                                    Please provide a Job Salary.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Job Experiance</label>
                                <input type="number" class="form-control" value="{{old('job_experiance')}}" id="job_experiance" placeholder="Job Experiance" min="0" max="50" name="job_experiance" required>
                                </textarea>
                                <div class="invalid-feedback">
                                    Please provide a Job Experiance.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Job Qualification</label>
                                <textarea name="job_qualification" class="form-control" value="{{old('job_qualification')}}" id="job_qualification" placeholder="Job Qualification" required></textarea>
                                <div class="invalid-feedback">
                                    Please provide a Job Qualification.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Contact Person Name</label>

                                    <input type="text" class="form-control" name="contact_person_name" value="{{old('contact_person_name')}}" id="contact_person_name" placeholder="Contact Person Name" required>
                                    <div class="invalid-feedback">
                                        Please provide a Contact Person Name.
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Mobile Number</label>

                                    <input type="text" class="form-control" name="mobile_number" value="{{old('mobile_number')}}" id="mobile_number" placeholder="Mobile Number" required>
                                    <div class="invalid-feedback">
                                        Please provide a Mobile Number.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Email Id</label>

                                    <input type="text" class="form-control" name="email_id" value="{{old('email_id')}}" id="email_id" placeholder="Email Id" required>
                                    <div class="invalid-feedback">
                                        Please provide a Email Id.
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="col-md-4">


                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Unit Option</label>

                                    <input type="text" class="form-control" name="unit_option" value="{{old('unit_option')}}" id="unit_option" placeholder="Unit Option" required>
                                    <div class="invalid-feedback">
                                        Please provide a Unit Option.
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Reference Url</label>

                                    <input type="text" class="form-control" name="reference_url" value="{{old('reference_url')}}" id="reference_url" placeholder="Reference Url" required>
                                    <div class="invalid-feedback">
                                        Please provide a Reference Url.
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--
                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Syllabus</label>

                                    <input type="text" class="form-control" name="syllabus" value="{{old('syllabus')}}" id="syllabus" placeholder="Syllabus" required>
                                    <div class="invalid-feedback">
                                        Please provide a Syllabus.
                                    </div>
                                </div>

                            </div>
                        </div>
                        --}}

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Website</label>

                                    <input type="text" class="form-control" name="website" value="{{old('website')}}" id="website" placeholder="Website" required>
                                    <div class="invalid-feedback">
                                        Please provide a Website.
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Payment Mode</label>

                                    <input type="text" class="form-control" name="payment_mode" value="{{old('payment_mode')}}" id="payment_mode" placeholder="Payment Mode" required>
                                    <div class="invalid-feedback">
                                        Please provide a Payment Mode.
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                        <div>

                        </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status" value="active">
                            <label class="custom-control-label" for="invalidCheck">Active</label>
                        </div>
                    </div>

                    <!--                        <div class="form-group ">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" id="status" class="custom-control-input" value="Active"
                                id="invalidCheck" >

                                <label class="custom-control-label" for="invalidCheck">Active</label>
                            </div>
                        </div>
-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <button class="btn btn-success" type="submit">Save</button>
                                <a href="{{route('business')}}" class="btn btn-danger ml-2">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="hdnSearchTagId" id="hdnSearchTagId">
                    <input type="hidden" name="hdnSearchCategoryId" id="hdnSearchCategoryId">
                </form>
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

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $('.main_repeater').repeater({
            // (Required if there is a nested repeater)
            // Specify the configuration of the nested repeaters.
            // Nested configuration follows the same format as the base configuration,
            // supporting options "defaultValues", "show", "hide", etc.
            // Nested repeaters additionally require a "selector" field.
            repeaters: [{
                // (Required)
                // Specify the jQuery selector for this nested repeater
                selector: '.inner-repeater'
            }]
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

    var str_url = '{{route("BusinesscategoryAutoComplete")}}';

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

    $(document).on('change', '.related_person_file', function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().parent().prev().find('.imagePreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().parent().prev().find('.small-pic').children().attr('src', e.target.result);
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
