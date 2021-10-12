@extends('layouts.master')

@section('title') Business Update @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css') }}" type="text/css">
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('title') Update Business @endslot
@slot('li_1') Business @endslot
@slot('li_2') Update @endslot
@endcomponent

<style>
    @media (max-width:768px) {
  .business-btn {
    margin-bottom: 7px !important;
  }
}
    </style>

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
                <form class="needs-validation" method="post" enctype="multipart/form-data" action="{{ route('business.update',$row['id']) }}" onsubmit="checkSubCategoriesChecked()" novalidate>
                    @csrf

                    <input type="hidden" value="{{ $row['id'] }}" name="id">

                    <div class="form-group">
                        <div class="row m-0">

                            <div class="form-check mr-2">
                                <input class="form-check-input" name="type" type="radio" id="serviceRadio" value="service" @if($row['type']=='service' ) checked @endif>
                                <label class="form-check-label" for="serviceRadio">
                                    Service
                                </label>
                            </div>

                            <div class="form-check mr-2">
                                <input class="form-check-input" type="radio" name="type" id="productRadio" value="product" @if($row['type']=='product' ) checked @endif>

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
                                    <select class="form-select form-control" name="user_id" id="user_id" disabled>
                                        <option value="">Select User</option>
                                        @foreach($users as $userid=>$username)
                                        <option @if($row['user_id']==$userid) selected @endif value="{{$userid}}">{{ucwords($username)}}</option>
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

                                <div class="form-group ">
                                    <label class="formrow-firstname-input">Tags *</label>
                                    <!-- multiple="multiple"-->
                                    <select class="form-select form-control form-control-lg" data-search="on" required name="txtSearchTag" id="txtSearchTag">
                                    </select>

                                    <div class="invalid-feedback">
                                        Tag is required !
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-4">
                            <div>

                                <div class="form-group" id="categoryDiv">
                                    <label for="formrow-firstname-input">Category</label>
                                    <select class="form-select form-control txtSearchKeyword-box" data-search="on" name="txtSearchCategory" id="txtSearchCategory" required>
                                    </select>

                                    <div class="invalid-feedback">
                                        Please provide a Category.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Business Name</label>

                                    <input type="text" class="form-control" name="name" id="name" placeholder="Business Name" value="{{$row['name']}}" required>
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

                                    <input type="text" class="form-control" name="about" value="{{$row['about']}}" id="about" placeholder="Business About" required>
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

                                    <input type="text" class="form-control" name="address" value="{{$row['address']}}" id="address" placeholder="Business Address" required>
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

                                    <input type="text" class="form-control" name="description" value="{{$row['description']}}" id="description" placeholder="Business Description" required>
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

                                    <input type="text" class="form-control" name="sub_description" value="{{$row['sub_descrition']}}" id="sub_description" placeholder="Business Sub Description" required>
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

                                    <input type="text" class="form-control" name="sub_description1" value="{{$row['sub_description_1']}}" id="sub_description1" placeholder="Business Sub Description 1" required>
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

                                    <input type="number" class="form-control" name="actual_price" value="{{$row['actual_price']}}" min="0" id="actual_price" placeholder="Actual Price" required>
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

                                    <input type="text" class="form-control" name="actual_price_unit" value="{{$row['actual_price_unit']}}" id="actual_price_unit" placeholder="Actual Price Unit" required>
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

                                    <input type="number" class="form-control" name="selling_price" value="{{$row['selling_price']}}" min="0" id="selling_price" placeholder="Selling Price" required>
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

                                    <input type="text" class="form-control" name="selling_price_unit" value="{{$row['selling_price_unit']}}" id="selling_price_unit" placeholder="Selling Price Unit" required>
                                    <div class="invalid-feedback">
                                        Please provide a Selling Price Unit.
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label for="example-text-input" class="col-md-12 col-form-label">
                            <h4 class="card-title">Hours Detail : </h4>
                        </label>
                    </div>

                    <div class="repeater">
                        <div data-repeater-list="hours_repeater">
                            @php

                            if(!empty($row['hours_detail_arr']))
                            $count_hours_detail=count($row['hours_detail_arr']);
                            else
                            $count_hours_detail=0;

                            @endphp

                            @if(!empty($row['hours_detail_arr']) && $count_hours_detail > 0)
                            @foreach($row['hours_detail_arr'] as $displayday=>$times)
                            @if(!empty($times) && isset($times))

                            <?php
                            if (!empty($times)) {
                                $time_array = explode(' To ', $times);
                                $start_time = isset($time_array[0]) ? $time_array[0] : '';
                                $end_time = isset($time_array[1]) ? $time_array[1] : '';
                            }
                            ?>

                            <div class="row">
                                <div class="form-group col-lg-3">
                                    <label for="formrow-firstname-input">Day</label>
                                    <select class="form-select form-control" name="txtDay[]" id="txtDay" required>
                                        <option value="">Select Day</option>
                                        @foreach($days as $name=>$Name)
                                        <option value={{$name}} @if ($name==$displayday) selected @endif>{{$Name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Day.
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="formrow-firstname-input">Start Time</label>
                                    <div class="input-group">
                                        <input id="timepicker" type="text" class="form-control" name="start_time[]" data-provide="timepicker" value="{{!empty($start_time)?str_replace('.','',$start_time):''}}" required>
                                        <div class="input-group-append">
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
                                        <input id="timepicker" type="text" class="form-control" name="end_time[]" data-provide="timepicker" value="{{!empty($end_time)?str_replace('.','',$end_time):''}}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                        </div>

                                        <div class="invalid-feedback">
                                            Please provide a End Time.
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-1 align-self-center">
                                    <button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top" class="btn btn-danger business-btn mt-2">
                                        <i class="bx bx-trash d-block font-size-16"></i>
                                    </button>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                        <button type="button" onclick="addHoursFunction()" class="btn btn-primary addbtnforall waves-effect btn-label waves-light">
                            <i class="bx bx-plus label-icon"></i>Add New</button>
                    </div>

                    <div class="row mt-3">
                        <label for="example-text-input" class="col-md-12 col-form-label">
                            <h4 class="card-title">Related Person Detail : </h4>
                        </label>
                    </div>

                    <div class="repeater">
                        <div data-repeater-list="related_personal_repeater">
                            @php
                            if(!empty($row['related_person_detail_arr']))
                            $count_person_detail=count($row['related_person_detail_arr']);
                            else
                            $count_person_detail=0;
                            @endphp

                            @if(!empty($row['related_person_detail_arr']) && $count_person_detail > 0)

                            @for($i=0;$i < $count_person_detail;$i++) <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <input type="file" class="custom-file-input related_person form-control" name="related_person_old_image[]" id="related_person_image" accept="image/*">
                                    <input type="hidden" name="related_person_image_files[]" value="{{$row['related_person_detail_arr'][$i]['RelatedPersonImage'.($i+1)]}}">
                                    <input type="hidden" name="related_person_image_deleted[]">
                                    <label class="custom-file-label" for="customFile">Image</label>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="formrow-firstname-input">Related Person Details</label>
                                        <textarea name="related_person_details[]" class="form-control" value="" id="related_person_details" placeholder="Related Person Details" required>{{$row['related_person_detail_arr'][$i]['RelatedPersonDetail'.($i+1)]}}</textarea>
                                        <div class="invalid-feedback">
                                            Please provide a Related Person Details.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-center">
                                    <img class="imagePreview mb-2" alt="" width="100" height="100" src="{{URL::asset('images/business_related_person/'.$row['related_person_detail_arr'][$i]['RelatedPersonImage'.($i+1)])}}" />
                                </div>
                                <div class="col-lg-1 align-self-center">
                                    <button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top" class="btn btn-danger business-btn mt-2">
                                        <i class="bx bx-trash d-block font-size-16"></i>
                                    </button>
                                </div>
                        </div>
                        @endfor
                        @endif
                    </div>
                    <button type="button" onclick="addRelatedPersonFunction()" class="btn btn-primary addbtnforall waves-effect btn-label waves-light"><i class="bx bx-plus label-icon"></i>
                        Add New</button>
            </div>

            <div class="row mt-3">
                <label for="example-text-input" class="col-md-12 col-form-label">
                    <h4 class="card-title">Media Detail : </h4>
                </label>
            </div>
            <div class="repeater">
                <div data-repeater-list="group-a">
                    @php
                    if (isset($row['media_file_json']) && !empty($row['media_file_json'])) {
                    $attachmentArray = json_decode($row['media_file_json'], true);
                    } else {
                    $attachmentArray = [];
                    }

                    $q = 1;
                    @endphp
                    @if (count($attachmentArray) > 0)

                    @for ($k = 0; $k < count($attachmentArray); $k++) <div class="row align-items-center">
                        <div class="col-lg-4">

                            <input type="file" class="custom-file-input form-control" id="attachment_files_json" name="group-a[0][media_file_json]" />

                            {{-- <input type="hidden" name="media_file_json_db" value="{{ $attachmentArray[$k] }}"> --}}
                    {{-- @dd($attachmentArray); --}}

                            <label class="custom-file-label" for="customFile">Image</label>
                        </div>
                        <div class="col-lg-2"></div>
                       <div class="col-lg-4">
                        <img class="imagePreview2 imgdisplay-blog" width="100" height="100" alt=""
                                                src=" {{ URL::asset('images/business/' . $attachmentArray[$k]['Media'.($k+1)]) }}" />
                       </div>

                        <!-- <div class="col-sm-4"></div> -->

                        <div class="col-lg-1 align-self-center">
                            <button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top" class="btn btn-danger business-btn mt-2">
                                <i class="bx bx-trash d-block font-size-16"></i>
                            </button>
                        </div>
                </div>
                @endfor
                @endif
            </div>
            {{-- <button type="button" onclick="addMediaFunction()" class="btn btn-primary addbtnforall waves-effect btn-label waves-light"><i class="bx bx-plus label-icon"></i>
                Add New</button> --}}
        </div>
            <button type="button" onclick="addMediaFunction()" class="btn btn-primary addbtnforall waves-effect btn-label waves-light"><i class="bx bx-plus label-icon"></i>
                Add New</button>
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
                    <textarea name="job_salary" class="form-control" value="" id="job_salary" placeholder="Job Salary" required>{{$job_detail_obj['JobSalary']}}</textarea>
                    <div class="invalid-feedback">
                        Please provide a Job Salary.
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="formrow-firstname-input">Job Experiance</label>
                    <input type="number" class="form-control" value="{{$job_detail_obj['JobExperience']}}" id="job_experiance" placeholder="Job Experiance" min="0" max="50" name="job_experiance" required></textarea>
                    <div class="invalid-feedback">
                        Please provide a Job Experiance.
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="formrow-firstname-input">Job Qualification</label>
                    <textarea name="job_qualification" class="form-control" value="" id="job_qualification" placeholder="Job Qualification" required>{{$job_detail_obj['JobQualification']}}</textarea>
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

                        <input type="text" class="form-control" name="contact_person_name" value="{{$row['contact_person_name']}}" id="contact_person_name" placeholder="Contact Person Name" required>
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

                        <input type="text" class="form-control" name="mobile_number" value="{{$row['mobile_number']}}" id="mobile_number" placeholder="Mobile Number" required>
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

                        <input type="text" class="form-control" name="email_id" value="{{$row['email_id']}}" id="email_id" placeholder="Email Id" required>
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

                        <input type="text" class="form-control" name="unit_option" value="{{$row['unit_option']}}" id="unit_option" placeholder="Unit Option" required>
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

                        <input type="text" class="form-control" name="reference_url" value="{{$row['reference_url']}}" id="reference_url" placeholder="Reference Url" required>
                        <div class="invalid-feedback">
                            Please provide a Reference Url.
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">

                <div>

                    <div class="form-group">
                        <label for="formrow-firstname-input">Syllabus</label>

                        <input type="text" class="form-control" name="syllabus" value="{{$row['syllabus']}}" id="syllabus" placeholder="Syllabus" required>
                        <div class="invalid-feedback">
                            Please provide a Syllabus.
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div>
                    <div class="form-group">
                        <label for="formrow-firstname-input">Website</label>

                        <input type="text" class="form-control" name="website" value="{{$row['website']}}" id="website" placeholder="Website" required>
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

                        <input type="text" class="form-control" name="payment_mode" value="{{$row['payment_mode']}}" id="payment_mode" placeholder="Payment Mode" required>
                        <div class="invalid-feedback">
                            Please provide a Payment Mode.
                        </div>
                    </div>

                </div>
            </div>


        </div>









        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status" value="Active" @if($row['status']=='active' ) checked @endif>
                <label class="custom-control-label" for="invalidCheck">Active</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <button class="btn btn-success" type="submit">Save</button>
                    <a href="{{route('business')}}" class="btn btn-danger ml-2">Cancel</a>
                </div>
            </div>
        </div>
        <input type="hidden" name="hdnSearchTagId" id="hdnSearchTagId">
        <input type="hidden" name="hdnSearchCategoryId" id="hdnSearchCategoryId" value="{{!empty($row['category_id'])?$row['category_id']:''}}">
        </form>
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
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        // @if(isset($row['tag_id']) && !empty($row['tag_id']))
        // var $option = $("<option selected></option>").val({
        //     {
        //         $tag_data - > id
        //     }
        // }).text('{{$tag_data->name}}');
        // $('#txtSearchTag').append($option).trigger('change');
        // @endif

        // @if(isset($row['category_id']) && !empty($row['category_id']))
        // var $option = $("<option selected></option>").val({
        //     {
        //         $category_data - > id
        //     }
        // }).text('{{$category_data->name}}');
        // $('#txtSearchCategory').append($option).trigger('change');
        // showSubCategory();

        // @if(isset($row['multiple_subcategory_id']) && !empty($row['multiple_subcategory_id']))
        // var sub_category_ids = [{
        //     {
        //         $row['multiple_subcategory_id']
        //     }
        // }];
        // @else
        // var sub_category_ids = [];
        // @endif

        // @endif

    var str_url = '{{route("tagAutoComplete")}}';
    console.log(str_url);

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

        $('#txtSearchTag').select2({
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
                //Add selected area id into array
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
                //Remove data from specific array
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
            showSubCategory();
        });


        /*function selectSubcategories()
        {
            alert('in sub category');

                alert('in if');

            //$("input[name='subcategory[]']").each(function(){
            //    alert($(this).val());
            //});

                //$(".subcategory").each(function(){
                //    alert($(this).val());
                //});
        }*/

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

        $(document).on('change', '.related_person', function() {

            if ($(this).attr('name') == 'related_person_old_image[]') {
                if ($(this).next().attr('value') != '') {
                    var related_old = $(this).next().val();
                    $(this).next().next().val(related_old);
                    $(this).next().attr('value', '');
                }
            }

            readURL(this);
        });

        $(document).on('change', '.media_file', function() {

            if ($(this).attr('name') == 'media_file_old[]') {
                if ($(this).next().attr('value') != '') {
                    var file_old = $(this).next().val();
                    $(this).next().next().val(file_old);
                    $(this).next().attr('value', '');
                }
            }

            readURL2(this);
        });

        function showSubCategory() {
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
                            console.log('id=' + id + 'type of id' + typeof id + 'name=' + name + '\n');

                            var checkedFlag = '';

                            if (sub_category_ids.includes(id)) {
                                checkedFlag = 'checked';
                            }

                            html += "<div class='col-sm-3'><div class='custom-control custom-checkbox'><input type='checkbox' name='subcategory[]' id='" + id + "' class='custom-control-input subcategory' value='" + id + "' onchange='showHide()' " + checkedFlag + " ><label class='custom-control-label' for=" + id + ">" + name + "</label></div></div>";

                            if (start % 4 == 0) {
                                html += '</div>';
                            }

                            start++;
                        }
                        $('#category_result').html(html);
                        $('#category_result').append('<div class="invalid-feedback" id="subcategoryError">Select atleast one subcategory !</div>');
                        console.log(html);
                    } else {
                        $('#category_result').html('<div class="formrow-firstname-input">No Sub-Categories Found!</div>');
                    }
                },
                error: function(html) {
                    console.log('in error list');
                }
            });
        }
    });

    function checkSubCategoriesChecked() {
        if ($('input[name="subcategory[]"]').length > 0) {
            // Exists.
            if ($("input[name='subcategory[]']:checked").length == 0) {
                $("[name='subcategory[]']").attr('required', true);
                $('#subcategoryError').show();
                $('html, body').animate({
                    scrollTop: 0
                }, 1200);
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

    function addHoursFunction() {
        $str = '<div data-repeater-item class="row"><div class="form-group col-lg-3"><label for="formrow-firstname-input">Day</label><select class="form-select form-control" name="txtDay" id="txtDay" required><option value="">Select Day</option>@foreach($days as $name=>$Name)<option value={{$name}}>{{$Name}}</option>@endforeach</select><div class="invalid-feedback">Please provide a Day.</div></div><div class="form-group col-lg-4"><label for="formrow-firstname-input">Start Time</label><div class="input-group"><input id="timepicker" type="text" class="form-control start_time" name="time" data-provide="timepicker"  required><div class="input-group-append"><span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span></div><div class="invalid-feedback">Please provide a Start Time.</div></div></div><div class="form-group col-lg-4"><label for="formrow-firstname-input">End Time</label><div class="input-group"><input id="timepicker" type="text" class="form-control end_time" name="time"data-provide="timepicker" required><div class="input-group-append"><span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span></div><div class="invalid-feedback">Please provide a End Time.</div></div></div><div class="col-lg-1 align-self-center"><button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top"title="Delete" class="btn btn-danger business-btn mt-2"><i class="bx bx-trash d-block font-size-16"></i></button></div></div>';
        console.log($str);
        $('div[data-repeater-list="hours_repeater"]').append($str);
    }

    // function addMediaFunction() {
    //     $str = '<div data-repeater-item class="row"><div class="col-lg-4"> <input type="file" class="custom-file-input media_file form-control" name="media_detail[]" id="media_file" accept="image/*" required=""><label class="custom-file-label" for="customFile">Image</label><div class="invalid-feedback invalid-feedback-pic">Media File is required !</div></div><div class="col-lg-3"><img class="imagePreview2" alt="" width="100" height="100" src="{{URL::asset('
    //     images / image - placeholder.jpg ')}}"></div><div class="col-sm-4"></div><div class="col-lg-1 align-self-center"><button type="button" data-repeater-delete="" data-toggle="tooltip" data-placement="top" title="" class="btn btn-danger business-btn mt-2" data-original-title="Delete"><i class="bx bx-trash d-block font-size-16"></i></button></div></div>';
    //     $('div[data-repeater-list="media_detail"]').append($str);
    // }

    // function addRelatedPersonFunction() {
    //     $str = '<div data-repeater-item class="row"><div class="col-lg-4"> <input type="file" class="custom-file-input related_person form-control" name="related_person_image[]" id="related_person_image" accept="image/*" required=""><label class="custom-file-label" for="customFile">Image</label><div class="invalid-feedback invalid-feedback-pic">Related Person Image is required !</div></div><div class="col-lg-4"><div class="form-group"><label for="formrow-firstname-input">Related Person Details</label><textarea name="related_person_details[]" class="form-control" value="" id="related_person_details" placeholder="Related Person Details" required></textarea><div class="invalid-feedback">Please provide a Related Person Details.</div></div></div><div class="col-lg-3"><img class="imagePreview" alt="" width="100" height="100" src="{{URL::asset('
    //     images / image - placeholder.jpg ')}}" /></div><div class="col-lg-1 align-self-center"><button type="button" data-repeater-delete="" data-toggle="tooltip" data-placement="top" title="" class="btn btn-danger business-btn mt-2" data-original-title="Delete"><i class="bx bx-trash d-block font-size-16"></i></button></div></div>';
    //     $('div[data-repeater-list="related_personal_repeater"]').append($str);
    // }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().next().next().children().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().next().children().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
