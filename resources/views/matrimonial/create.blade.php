@extends('layouts.master') @section('title') Matrimonial Add @endsection @section('css') {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" /> --}}
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" />
<link href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css') }}" type="text/css" />
<!-- Summernote css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css') }}" />

<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css') }}" type="text/css" />
<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

@endsection @section('content') @component('common-components.breadcrumb') @slot('title') Add Matrimonial @endslot
{{-- @slot('li_1') <a href="{{ route('jobopeninglist') }}" class=""> Question Paper </a> @endslot --}} @slot('li_1')
    <a href="" class=""> Matrimonial </a> @endslot @slot('li_2') Add @endslot @endcomponent

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

                    <form class="needs-validation" novalidate method="post" id="dataForm"
                        action="{{ route('matrimonial.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                        placeholder="Enter full name" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Full Name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter city"
                                        maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a city.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Adress</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address" maxlength="100" required />
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
                                    <input type="text" class="form-control" id="about	" name="about"
                                        placeholder="Enter about" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a About.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Height</label>
                                    <input type="text" class="form-control" id="height" name="height"
                                        placeholder="Enter Height" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Height.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Birth Date</label>
                                    <div>
                                        <div class="input-daterange input-group" data-date-format="dd-mm-yyyy"
                                            data-date-autoclose="true" data-provide="datepicker">
                                            <input style="text-align: left !important;" type="text" onchange="agefinddata()"
                                                placeholder="Enter Birth Date" class="form-control" name="birth_date"
                                                id="birth_date" required />
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Age</label>
                                    <input type="text" class="form-control" id="age" name="age" placeholder="Enter age"
                                        maxlength="100" readonly />
                                    <div class="invalid-feedback">
                                        Please provide a Age.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Caste</label>
                                    <input type="text" class="form-control" id="caste" name="caste"
                                        placeholder="Enter caste" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Caste.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Subcaste</label>
                                    <input type="text" class="form-control" id="subcaste" name="subcaste"
                                        placeholder="Enter Subcaste" maxlength="100" required />
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
                                    <input type="text" class="form-control" id="designation" name="designation"
                                        placeholder="Enter Designation" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Designation.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Desired Religion</label>
                                    <input type="text" class="form-control" id="desired_religion" name="desired_religion"
                                        placeholder="Enter Desired Religion" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Desired Religion.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Other</label>
                                    <input type="text" class="form-control" id="other" name="other"
                                        placeholder="Enter other" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Other.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Annual Income</label>
                                    <input type="text" class="form-control" id="annual_income" name="annual_income"
                                        placeholder="Enter Annual Income" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Annual Income.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Desired Mother Tongue</label>
                                    <input type="text" class="form-control" id="desired_mother_tongue"
                                        name="desired_mother_tongue" placeholder="Enter Desired Mother Tongue"
                                        maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Desired Mother Tongue.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Desired Age</label>
                                    <input type="text" class="form-control" id="desired_age" name="desired_age"
                                        placeholder="Enter Desired Age" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Desired Age.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Desired Height</label>
                                    <input type="text" class="form-control" id="desired_height" name="desired_height"
                                        placeholder="Enter Desired Height" maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Desired Height.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Desired Annual Income</label>
                                    <input type="text" class="form-control" id="desired_annual_income"
                                        name="desired_annual_income" placeholder="Enter Desired Annual Income"
                                        maxlength="100" required />
                                    <div class="invalid-feedback">
                                        Please provide a Desired Annual Income.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Desired Country</label>
                                    <select class="form-control" name="desired_country">
                                        <option value="">--Select Country-- </option>
                                        @foreach ($country as $countrys)
                                            <option value="{{ $countrys->id }}">{{ $countrys->name }}</option>
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
                                    <label for="formrow-firstname-input">Country</label>
                                    <select class="form-control" name="country">
                                        <option value="">--Select Country-- </option>
                                        @foreach ($country as $countrys)
                                            <option value="{{ $countrys->id }}">{{ $countrys->name }}</option>
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
                                    <select class="form-select form-control" name="user_id" id="user_id" required>
                                        <option value="">Select User</option>
                                        @foreach ($users as $userid => $username)
                                            <option value="{{ $userid }}">{{ ucwords($username) }}</option>
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
                                            <input class="form-check-input" type="radio" id="married_yes" name="Married"
                                                value="Yes" required />
                                            <label class="form-check-label" for="married_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" id="married_no" name="Married"
                                                value="No" required />
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
                                            <input class="form-check-input" type="radio" id="private_yes" name="private"
                                                value="Yes" required />
                                            <label class="form-check-label" for="private_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" id="private_no" name="private"
                                                value="No" required />
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
                                            <input class="form-check-input" type="radio" id="unmarried"
                                                name="desired_marital_status" value="Unmarried" required />
                                            <label class="form-check-label" for="unmarried">
                                                Unmarried
                                            </label>

                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input" type="radio" id="married"
                                                name="desired_marital_status" value="Married" required />
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
                                    <h4 class="card-title">Media Detail :</h4>
                                </label>
                            </div>
                            <div class="repeater main-repeter">
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item class="row">
                                        <div class="col-lg-2 col-md-4">
                                            <div class="small-pic">
                                                <img class="imagePreview2 imgdisplay" alt="" width="100" height="100"
                                                    src="{{ URL::asset('images/image-placeholder.jpg') }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <input type="file" class="custom-file-input media_file form-control"
                                                    name="media_file" id="media_file" accept="image/*" required />
                                                <label class="custom-file-label" for="customFile">Image</label>
                                                <div class="invalid-feedback">
                                                    Media File is required !
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-2">
                                            <button type="button" data-repeater-delete data-toggle="tooltip"
                                                data-placement="top" title="Delete"
                                                class="btn btn-sm btn-danger margin-10 mt-2">
                                                <i class="bx bx-trash d-block font-size-16"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" data-repeater-create
                                    class="btn btn-primary addbtnforall waves-effect btn-sm btn-label-btn-sm btn-label waves-light margin-left-btn"><i
                                        class="bx bx-plus label-icon"></i> Add New</button>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <label for="example-text-input" class="col-md-12 col-form-label pl-0">
                                        <h4 class="card-title">Education :</h4>
                                    </label>
                                </div>
                                <div class="repeater form-group mb-0">
                                    <div data-repeater-list="group-c">
                                        <div data-repeater-item class="row">
                                            <div class="col-lg-4 pl-0">
                                                <div class="form-group email-form-margin">
                                                    {{-- <label for="formrow-email-input">Title</label> --}}
                                                    <div class="custom-file">
                                                        <input type="text" placeholder="Enter Title" id="title" name="title"
                                                            class="form-control" required />
                                                        <div class="invalid-feedback">
                                                            Please provide a Title.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 email-form-margin pl-0">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="text" placeholder="Enter Description" id="description"
                                                            name="description" class="form-control" required />
                                                        <div class="invalid-feedback">
                                                            Please provide a Description.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 align-self-center">
                                                <button type="button" data-repeater-delete data-toggle="tooltip"
                                                    data-placement="top" title="Delete" class="btn btn-sm btn-danger m-15">
                                                    <i class="bx bx-trash d-block font-size-16"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="button" data-repeater-create
                                        class="btn btn-primary addbtnforall waves-effect btn-sm btn-label-btn-sm btn-label waves-light"><i
                                            class="bx bx-plus label-icon"></i>Add New</button>


                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mainactive">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status"
                                        checked />
                                    <label class="custom-control-label" for="invalidCheck">Active</label>
                                    <div class="invalid-feedback">
                                        You must agree before Save.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Save</button>
                                    <a href="{{ route('category') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    @endsection @section('script')

    <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>

    <!-- form mask -->
    <script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>

    <!-- form mask init -->
    <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // $('input#title').maxlength({
            //     warningClass: "badge bg-info",
            //     limitReachedClass: "badge bg-warning"
            // });
            // $('textarea#short_description').maxlength({
            //     warningClass: "badge bg-info",
            //     limitReachedClass: "badge bg-warning"
            // });
            // $('input[name*="attached_notes"]').maxlength({
            //     warningClass: "badge bg-info",
            //     limitReachedClass: "badge bg-warning"
            // });
            // $('input[name*="minimum_experience"]').maxlength({
            //     warningClass: "badge bg-info",
            //     limitReachedClass: "badge bg-warning"
            // });
            // $('input[name*="pay_range"]').maxlength({
            //     warningClass: "badge bg-info",
            //     limitReachedClass: "badge bg-warning"
            // });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(input).parent().parent().prev().find(".imagePreview2 ").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on("change", ".media_file", function() {
            readURL(this);
        });

        function agefinddata() {
            var mdate = $("#birth_date").val().toString();
            console.log(mdate);

            var yearThen = parseInt(mdate.substring(0, 4), 10);
            var monthThen = parseInt(mdate.substring(5, 7), 10);
            var dayThen = parseInt(mdate.substring(8, 10), 10);

            console.log("yearThen ::: " + yearThen);
            console.log("monthThen ::: " + monthThen);
            console.log("dayThen ::: " + dayThen);

            var today = new Date();
            var birthday = new Date(yearThen, monthThen - 1, dayThen);

            var differenceInMilisecond = today.valueOf() - birthday.valueOf();

            var year_age = Math.floor(differenceInMilisecond / 31536000000);
            var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);

            if (today.getMonth() == birthday.getMonth() && today.getDate() == birthday.getDate()) {
                alert("Happy B'day!!!");
            }

            var month_age = Math.floor(day_age / 30);

            day_age = day_age % 30;
            console.log("year_age :::: " + year_age);

            if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
                $("#age").text("Invalid birthday - Please try again!");
            } else {
                console.log("year_age :::: " + year_age);
                console.log("month_age :::: " + month_age);
                console.log("day_age :::: " + day_age);

                $("#age").html('You are<br/><span id="age">' + year_age + " years " + month_age + " months " + day_age +
                    " days</span> old");
            }
        }
    </script>
@endsection
