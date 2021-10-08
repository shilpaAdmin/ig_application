@extends('layouts.master') @section('title') Testimonial Add @endsection @section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" />
@endsection @section('content') @component('common-components.breadcrumb') @slot('title') Add Testimonial @endslot
@slot('li_1') Testmonial @endslot @slot('li_2') Add @endslot @endcomponent

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
                    action="{{ route('testimonial.store') }}" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required
                                    placeholder="Name" value="{{ old('name') }}" />
                                <div class="invalid-feedback">
                                    Please provide a Name.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Designation</label>
                                <input type="text" class="form-control" name="designation" id="designation" required
                                    placeholder="Designation" value="{{ old('designation') }}" />
                                <div class="invalid-feedback">
                                    Please provide a Designation.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Description</label>
                                <input type="text" class="form-control" name="description" id="description" required
                                    placeholder="Description" value="{{ old('description') }}" />
                                <div class="invalid-feedback">
                                    Please provide a Description.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
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


                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="formrow-email-input">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" name="image" id="image"
                                        accept="image/*" required>
                                    <label class="custom-file-label" for="customFile">Image</label>
                                    <div class="invalid-feedback">
                                        Please provide a Image.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <img id="imageview" width="150px" height="150px"
                                    src="{{ URL::asset('images/image-placeholder.jpg') }}" />

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formrow-email-input">Media</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" name="media" id="media"
                                        accept="image/*" required>
                                    <label class="custom-file-label" for="customFile">Media</label>
                                    <div class="invalid-feedback">
                                        Please provide a Media.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <img id="Mediaview" width="150px" height="150px"
                                    src="{{ URL::asset('images/image-placeholder.jpg') }}" />
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
                                <a href="{{ route('testimonial') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
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
                $('#imageview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#image').change(function() {
        readURL(this);
    });


    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#Mediaview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#media').change(function() {
        readURL1(this);
    });
</script>
@endsection
