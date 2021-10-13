@extends('layouts.master')

@section('title') Advertisement Update @endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css') }}">
    <style>
        .avatar-upload {
            position: relative;
            max-width: 315px;
            margin: 0;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 10px;
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
            top: 7px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 315px;
            height: 200px;
            position: relative;
            border-radius: 0;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 1px 9px 3px rgb(0 0 0 / 10%);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 10% center;

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
        @slot('title') Update Advertisement @endslot
        @slot('li_1') Advertisement @endslot
        @slot('li_2') Upadte @endslot
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

                    <form class="needs-validation" method="post" enctype="multipart/form-data"
                        action="{{ route('advertisement.update', $row['id']) }}" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div>
                                    <div class="form-group">
                                        <label for="formrow-firstname-input">Name</label>

                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                            value="{{ $row['name'] }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Name.
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4">
                                <div>
                                    <div class="form-group">
                                        <label for="formrow-firstname-input">User</label>
                                        <select class="form-select form-control" name="user_id" id="user_id" required>
                                            <option value="">Select User</option>
                                            @foreach ($users as $userid => $username)
                                                <option value="{{ $userid }}" @if ($row['user_id'] == $userid) selected @endif>
                                                    {{ ucwords($username) }}</option>
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
                                    <div class="form-group" id="categoryDiv">
                                        <label for="formrow-firstname-input">Category</label>
                                        <select class="form-select form-control form-control-lg txtSearchKeyword-box"
                                            data-search="on" name="category_id" id="txtSearchCategory" required>
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
                                        <label for="formrow-firstname-input">Description</label>

                                        <input type="text" class="form-control" name="description" id="description"
                                            placeholder="description" value="{{ $row['description'] }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a description.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div>

                                    <div class="form-group">
                                        <label for="formrow-firstname-input">Continously</label>

                                        <select class="form-select form-control" name="continously" id="continously"
                                            required>
                                            <option value="">Select Continously</option>
                                            @foreach ($continouslies as $continously)
                                                <option value="{{ $continously }}" @if ($row['continously'] == $continously) selected @endif>
                                                    {{ ucwords($continously) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a Continously.
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div>

                                    <div class="form-group">
                                        <label for="formrow-firstname-input">Start Date</label>
                                        <div>
                                            <div class="input-daterange input-group" data-date-format="dd M, yyyy"
                                                data-date-autoclose="true" data-provide="datepicker">

                                                <input style="text-align: left !important;" type="text"
                                                    placeholder="Enter Start Date" class="form-control" name="start_date"
                                                    value="{{ $row['start_date'] }}" required />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide a Start Date.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div>
                                    <div class="form-group">
                                        <label for="formrow-firstname-input">End Date</label>
                                        <div>
                                            <div class="input-daterange input-group" data-date-format="dd M, yyyy"
                                                data-date-autoclose="true" data-provide="datepicker">

                                                <input style="text-align: left !important;" type="text"
                                                    placeholder="Enter End Date" class="form-control" name="end_date"
                                                    value="{{ $row['end_date'] }}" required />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide a End Date.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div>
                                    <div class="form-group">
                                        <label for="formrow-firstname-input">Advertisement URL</label>

                                        <input type="text" class="form-control" name="url" id="url"
                                            placeholder="Advertisement URL" value="{{ $row['url'] }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a Advertisement URL.
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div>

                                    <div class="form-group">
                                        <label for="formrow-firstname-input">Advertisment Type</label>

                                        <select class="form-select form-control" name="type" id="type" required>
                                            <option value="">Select Continously</option>
                                            @foreach ($Advertisment_types as $Advertisment_type)
                                                <option value="{{ $Advertisment_type }}" @if ($row['type'] == $Advertisment_type) selected @endif>
                                                    {{ ucwords($Advertisment_type) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a Continously.
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formrow-email-input">media</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="media" id="media"
                                            accept="image/*" @if ($row['media'] == '') required @endif>
                                        <label class="custom-file-label" for="customFile">media</label>
                                        <div class="invalid-feedback">
                                            Please provide a media.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img src="@if ($row['media'] != '' && file_exists(public_path() . '/images/categories/' . $row['media'])){{ URL::asset('/images/categories/' . $row['media']) }} @endif" id="imageview" width="150px" height="150px" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--<img id="imageview" width="150px" height="150px" src="{{ URL::asset('images/image-placeholder.jpg') }}" />-->
                                    <!--<img class="avatar-md custom_img_ac" alt="200x200" id="imageview"
                                            src="../../../assets/images/logo-light.svg" data-holder-rendered="true">-->
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status"
                                    value="active" @if ($row['status'] == 'active') checked @endif>
                                <label class="custom-control-label" for="invalidCheck">Active</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <button class="btn btn-success" type="submit">Save</button>
                                    <a href="{{ route('advertisement') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="hdnSearchCategoryId" id="hdnSearchCategoryId">
                    </form>
                </div>
            </div>

        @endsection
        @section('script')

            <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
            <script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
            <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


            <!-- Plugins js -->
            <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
            <!--<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>-->

            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                @foreach ($categoryData as $categorydata)
                    var $option = $("<option selected></option>").val('{{$categorydata -> id}}').text('{{ $categorydata->name }}');
                    $('#txtSearchCategory').append($option).trigger('change');
                @endforeach
                /*
                var loadFile=function(event){
                    var image=document.getElementById('imageview');
                    image.src=URL.createObjectURL(event.target.files[0]);
                }*/

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#imageview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                var str_url = '{{ route('AdcategoryAutoComplete') }}';

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


                $('#media').change(function() {
                    readURL(this);
                });
            </script>
        @endsection
