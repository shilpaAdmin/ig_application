@extends('layouts.master')

@section('title') Matrimonial Edit @endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
<link href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet"
    type="text/css">
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css">
<!-- Summernote css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}">


<link rel="stylesheet" type="text/css"
   href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css">
<link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@endsection
@section('content')
@component('common-components.breadcrumb')
@slot('title') Edit Matrimonial @endslot
{{-- @slot('li_1') <a href="{{ route('jobopeninglist') }}" class=''> Question Paper </a> @endslot --}}
@slot('li_1') <a href="" class=''> Matrimonial </a> @endslot

@slot('li_2') Edit @endslot
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
                <form class="needs-validation" novalidate method="post" id="dataForm" action="{{route('matrimonial.update',$row['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter full name"  value="{{$row['full_name']}}" required>
                                <div class="invalid-feedback">
                                    Please provide a Full Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" maxlength="100" value="{{$row['city']}}" required>
                                <div class="invalid-feedback">
                                    Please provide a city.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Adress</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{$row['address']}}" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Address.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">About</label>
                                <input type="text" class="form-control" id="about	" name="about" placeholder="Enter about" maxlength="100" value="{{$row['about']}}" required>
                                <div class="invalid-feedback">
                                    Please provide a About.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Height</label>
                                <input type="text" class="form-control" id="height" name="height" placeholder="Enter Height" maxlength="100"  value="{{$row['height']}}" required>
                                <div class="invalid-feedback">
                                    Please provide a Height.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Birth Date</label>
                                <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Enter Birth Date" value="{{$row['birth_date']}}" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Birth Date.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Age</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder="Enter age" maxlength="100" value="{{$row['age']}}" readonly>
                                <div class="invalid-feedback">
                                    Please provide a Age.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Caste</label>
                                <input type="text" class="form-control" id="caste" name="caste" placeholder="Enter caste" maxlength="100" value="{{$row['caste']}}" required>
                                <div class="invalid-feedback">
                                    Please provide a Caste.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Subcaste</label>
                                <input type="text" class="form-control" id="subcaste" name="subcaste" placeholder="Enter Subcaste" value="{{$row['subcaste']}}" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Subcaste.
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" value="{{$row['designation']}}" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Designation.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Desired Religion</label>
                                <input type="text" class="form-control" id="desired_religion" name="desired_religion" placeholder="Enter Desired Religion" maxlength="100" value="{{$row['desired_religion']}}" required>
                                <div class="invalid-feedback">
                                    Please provide a Desired Religion.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Other</label>
                                <input type="text" class="form-control" id="other" name="other" placeholder="Enter other" value="{{$row['other']}}" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Other.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Annual Income</label>
                                <input type="text" class="form-control" id="annual_income" name="annual_income" placeholder="Enter Annual Income" value="{{$row['annual_income']}}" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Annual Income.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Desired Mother Tongue</label>
                                <input type="text" class="form-control" id="desired_mother_tongue" name="desired_mother_tongue" placeholder="Enter Desired Mother Tongue" value="{{$row['desired_mother_tongue']}}"  maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Desired Mother Tongue.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Desired Age</label>
                                <input type="text" class="form-control" id="desired_age" name="desired_age" value="{{$row['desired_age']}}" placeholder="Enter Desired Age" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Desired Age.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Desired Height</label>
                                <input type="text" class="form-control" id="desired_height" name="desired_height" placeholder="Enter Desired Height" value="{{$row['desired_height']}}"  maxlength="100"  required>
                                <div class="invalid-feedback">
                                    Please provide a Desired Height.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Desired Annual Income</label>
                                <input type="text" class="form-control" id="desired_annual_income" name="desired_annual_income" placeholder="Enter Desired Annual Income" value="{{$row['desired_annual_income']}}" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Desired Annual Income.
                                </div>
                            </div>
                        </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                    $desiredCountryId = $row['desired_country_id'];
                                    ?>
                                    <label for="formrow-firstname-input">Desired Country</label>
                                    <select class="form-control" name="desired_country">
                                        <option value=''>--Select Desired Country-- </option>
                                        @foreach ($countryData as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>

                                            {{-- <option @if ($value->id,'=',$desiredCountryId) selected="selected" @endif value="{{ $value->id }}">{{ $value->name }}</option> --}}

                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Desired Country.
                                    </div>
                                </div>
                            </div>




                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                $countryId = $row['country_id'];
                                ?>
                                <label for="formrow-firstname-input">Country</label>
                                <select class="form-control" name="country">
                                    <option value=''>--Select Country-- </option>
                                    @foreach ($countryData as $value)
                                        <option @if ($value->id==$countryId) selected="selected" @endif value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a Country.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">User</label>
                                <select class="form-select form-control" name="user_id" id="user_id" required disabled>
                                    <option value="">Select User</option>
                                    @foreach ($users as $userid => $username)
                                        <option value="{{ $userid }}" @if($row['user_id'] == $userid) selected @endif>{{ ucwords($username) }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                    Please provide a User.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Married</label>
                                <div class="d-flex">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="radio"  id="married_yes" name="Married" value="Yes" {{ $row['married'] == 'Yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="married_yes">
                                       Yes
                                    </label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="radio"  id="married_no" name="Married" value="No" {{ $row['married'] == 'No' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="married_no">
                                       No
                                    </label>
                                </div>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a Married.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Private</label>
                                <div class="d-flex">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="radio"  id="private_yes" name="private" value="Yes" {{ $row['private'] == 'Yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="private_yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="radio"  id="private_no" name="private"  value="No" {{ $row['private'] == 'No' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="private_no">
                                        No
                                    </label>
                                </div>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a Private.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Desired Marital Status</label>
                                <div class="d-flex">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="radio"  id="unmarried" name="desired_marital_status" value="Unmarried" {{ $row['desired_marital_status'] == 'Unmarried' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="unmarried">
                                        Unmarried
                                    </label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="radio"  id="married" name="desired_marital_status" value="Married"  {{ $row['desired_marital_status'] == 'Married' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="married">
                                        Married
                                    </label>
                                </div>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a Desired Marital Status.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <div class="row">
                            <label for="example-text-input" class="col-md-12 col-form-label">
                                <h4 class="card-title">Media Detail : </h4>
                            </label>
                        </div>
                        <div class="repeater main-repeter repeater-btn">
                            <div data-repeater-list="group-a">
                                @php
                                    if (isset($row['media_json']) && !empty($row['media_json'])) {
                                        $attachmentArray = json_decode($row['media_json'], true);
                                    } else {
                                        $attachmentArray = [];
                                    }

                                    $q = 1;
                                @endphp
                                @if (count($attachmentArray) > 0)
                                    @for ($k = 0; $k < count($attachmentArray); $k++)
                                        <div data-repeater-item class="row">
                                            <div class="col-lg-4 ">
                                                <input type="file" class="custom-file-input media_file form-control"
                                                    name="group-a[0][media_json]" id="media_file" accept="image/*" >
                                                    <input type="hidden" name="group-a[0][media_file_json_from_db]"
                                                            value="{{ $attachmentArray[$k] }}">
                                                <label class="custom-file-label" for="customFile">Image</label>
                                                <div class="invalid-feedback invalid-feedback-pic">
                                                    Media File is required !
                                                </div><br><br>
                                                <div class="small-pic">
                                                    <img class="imagePreview2" alt="" width="200" height="200"
                                                        src="{{ URL::asset('images/matrimonial_image/'.$attachmentArray[$k]) }}" />
                                                </div><br>
                                            </div>

                                            <div class="col-lg-1">
                                                <button type="button" data-repeater-delete data-toggle="tooltip"
                                                    data-placement="top" title="Delete" class="btn btn-sm btn-danger mt-2">
                                                    <i class="bx bx-trash d-block font-size-16"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @endfor
                                @endif
                            </div>
                            <button type="button" data-repeater-create
                                class="btn btn-primary waves-effect btn-sm btn-label-btn-sm btn-label waves-light addbtnforall"><i
                                    class="bx bx-plus label-icon"></i>
                                Add New</button>
                        </div>
                        <br>


                            <div class="col-md-12">
                                <div class="row">

                                    <label for="example-text-input" class="col-md-12 col-form-label pl-0">
                                        <h4 class="card-title">Education : </h4>
                                    </label>
                                    <div class="repeater form-group">
                                    <div data-repeater-list="group-c">
                                        @php
                                        if (isset($row['education_json']) && !empty($row['education_json'])) {
                                            $attachmentArray = json_decode($row['education_json'], true);

                                        } else {
                                            $attachmentArray = [];
                                        }
                                        $q = 1;
                                    @endphp
                                       @if (count($attachmentArray) > 0)
                                       @for ($k = 0; $k < count($attachmentArray); $k++)

                                        <div data-repeater-item class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    {{-- <label for="formrow-email-input">Title</label> --}}
                                                    <div class="custom-file mb-3">
                                                        <input type="text" placeholder="Enter Title"  id="title" name="title" class="form-control" value="{{ $attachmentArray[$k]['title'] }}"/>
                                                        <div class="invalid-feedback">
                                                            Please provide a Title.
                                                        </div>
                                                    </div>

                                                    <div class="custom-file">
                                                        <input type="text" placeholder="Enter Description"  id="description" name="description"  class="form-control" value="{{ $attachmentArray[$k]['description'] }}" />
                                                        <div class="invalid-feedback">
                                                            Please provide a Description.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 align-self-center">
                                                <button type="button" data-repeater-delete data-toggle="tooltip" data-placement="top"
                                                    title="Delete" class="btn btn-sm btn-danger mt-2">
                                                    <i class="bx bx-trash d-block font-size-16"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @endfor
                                        @endif
                                    </div>
                                    <button type="button" data-repeater-create class="btn btn-primary waves-effect btn-sm btn-label-btn-sm btn-label waves-light addbtnforall"><i class="bx bx-plus label-icon"></i>Add New</button>
                                </div>
                                </div>

                            </div>
                    </div>
                    <div class="form-group">
                        <div class="mainactive">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="status" name="status"  checked>
                                <label class="custom-control-label" for="invalidCheck">Active</label>
                                <div class="invalid-feedback">
                                    You must agree before Save.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <button class="btn btn-success" type="submit">Save</button>
                                <a href="{{route('category')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


@endsection
@section('script')

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/datepicker/datepicker.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>

<!-- form mask -->
<script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js')}}"></script>

<!-- form mask init -->
<script src="{{ URL::asset('assets/js/pages/form-repeater.int.js')}}"></script>

<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>

<!--tinymce js-->
<script src="{{ URL::asset('assets/libs/tinymce/tinymce.min.js')}}"></script>

<!-- Summernote js -->
<script src="{{ URL::asset('assets/libs/summernote/summernote.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/pages/form-editor.init.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/bootstrap-maxlength.min.js')}}"></script>
<script>
$( document ).ready(function()
{
    $('input#title').maxlength({
        warningClass: "badge bg-info",
        limitReachedClass: "badge bg-warning"
    });
    $('textarea#short_description').maxlength({
        warningClass: "badge bg-info",
        limitReachedClass: "badge bg-warning"
    });
    $('input[name*="attached_notes"]').maxlength({
        warningClass: "badge bg-info",
        limitReachedClass: "badge bg-warning"
    });
    $('input[name*="minimum_experience"]').maxlength({
        warningClass: "badge bg-info",
        limitReachedClass: "badge bg-warning"
    });
    $('input[name*="pay_range"]').maxlength({
        warningClass: "badge bg-info",
        limitReachedClass: "badge bg-warning"
    });
});

function readURL(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $(input).parent().find('.small-pic').children().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change','.media_file',function(){
        readURL(this);
    });

</script>
@endsection
