@extends('layouts.master') @section('title') Blog Add @endsection @section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" />
@endsection @section('content') @component('common-components.breadcrumb') @slot('title') Add Blog @endslot
@slot('li_1') Blog @endslot @slot('li_2') Add @endslot @endcomponent
<style>
    .imgdisplay-blog {
        height: 200px;
        width: 200px;
    }

    @media (min-width: 993px) and (max-width: 1286px) {
        .imgdisplay-blog {
            height: 150px;
            width: 150px;
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

                <form class="needs-validation" method="post" enctype="multipart/form-data"
                    action="{{ route('blog.store') }}" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required
                                    placeholder="Name" value="{{ old('name') }}" />
                                <div class="invalid-feedback">
                                    Please provide a Question.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Description</label>
                                <input type="text" class="form-control" name="description" id="description" required
                                    placeholder="Description" value="{{ old('description') }}" />
                                <div class="invalid-feedback">
                                    Please provide a Description.
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

                        <div class="form-group col-md-4" id="categoryDiv">
                            <label for="formrow-firstname-input">Category</label>
                            <select class="form-select form-control form-control-lg txtSearchKeyword-box"
                                data-search="on" name="category_id" id="txtSearchCategory" required>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a Category.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label for="example-text-input" class="col-md-12 col-form-label">
                            <h4 class="card-title">Media Detail :</h4>
                        </label>
                    </div>
                    <div class="repeater main-repeter">
                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="row">
                                <div class="col-lg-3">
                                    <div class="small-pic">
                                        <img class="imagePreview2 mb-3 imgdisplay-blog" alt=""
                                            src="{{ URL::asset('images/image-placeholder.jpg') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <input type="file" class="custom-file-input media_file form-control"
                                        name="media_file_json" id="media_file" accept="image/*" required />
                                    <label class="custom-file-label" for="customFile">Image</label>
                                    <div class="invalid-feedback invalid-feedback-pic">
                                        Media File is required !
                                    </div>
                                    <br />
                                </div>

                                <div class="col-lg-1">
                                    <button type="button" data-repeater-delete data-toggle="tooltip"
                                        data-placement="top" title="Delete" class="btn btn-sm btn-danger mt-2">
                                        <i class="bx bx-trash d-block font-size-16"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create
                            class="btn btn-primary waves-effect btn-sm btn-label-btn-sm btn-label waves-light margin-left-btn mt-2 addbtnforall"><i
                                class="bx bx-plus label-icon"></i> Add New</button>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Tagged</label>
                                <input type="text" class="form-control" name="tagged" id="tagged" required
                                    placeholder="Tagged" value="{{ old('description') }}" />
                                <div class="invalid-feedback">
                                    Please provide a Tagged.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">URL</label>
                                <input type="text" class="form-control" name="url" id="url" required placeholder="URL"
                                    value="{{ old('url') }}" />
                                <div class="invalid-feedback">
                                    Please provide a URL.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status"
                                value="active" checked />
                            <label class="custom-control-label" for="invalidCheck">Active</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Save</button>
                                <a href="{{ route('blog') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="hdnSearchCategoryId" id="hdnSearchCategoryId">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection @section('script')

<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
<!--<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>-->
<script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
<!-- form mask init -->
<script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>



<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().parent().find(".small-pic").children().attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change", ".media_file", function() {
        readURL(this);
    });

    var str_url = '{{ route('BlogcategoryAutoComplete') }}';

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
</script>
@endsection
