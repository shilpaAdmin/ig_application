@extends('layouts.master')

@section('title') City Edit @endsection @section('css') {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" /> --}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" />
<link href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css" />
<!-- Summernote css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}" />

<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css" />
<link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

@endsection @section('content') @component('common-components.breadcrumb') @slot('title') Edit City @endslot {{-- @slot('li_1') <a href="{{ route('jobopeninglist') }}" class=""> Question Paper </a> @endslot --}} @slot('li_1')
<a href="" class=""> City </a> @endslot @slot('li_2') Edit @endslot @endcomponent

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

                <form class="needs-validation" novalidate method="post" id="dataForm" action="{{route('city.update',$row['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{$row['name']}}" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Type</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Enter Type"  value="{{$row['type']}}" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Type.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Continent</label>
                                <input type="text" class="form-control" id="continent" name="continent"  value="{{$row['continent']}}" placeholder="Enter Continent" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Continent.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Country</label>
                                <input type="text" class="form-control" id="country	" name="country" value="{{$row['country']}}" placeholder="Enter Country" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Country.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Country Code</label>
                                <input type="text" class="form-control" id="country_code" name="country_code" value="{{$row['country_code']}}" placeholder="Enter Country Code" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Country Code.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Capital</label>
                                <input type="text" class="form-control" id="capital	" name="capital" value="{{$row['capital']}}" placeholder="Enter Postal Code" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Postal Code.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Population</label>
                                <input type="text" class="form-control" id="population" name="population" value="{{$row['population']}}" placeholder="Enter Population" maxlength="100"  />
                                <div class="invalid-feedback">
                                    Please provide a Population.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Pop Date</label>
                                <input type="text" class="form-control" id="pop_date" name="pop_date" value="{{$row['pop_date']}}" placeholder="Enter Pop Date" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Pop Date.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{$row['latitude']}}" placeholder="Enter Latitude" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Latitude.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{$row['longitude']}}" placeholder="Enter Longitude" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Longitude.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{$row['contact_number']}}" placeholder="Enter Contact Number" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Contact Number.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{$row['postal_code']}}" placeholder="Enter Postal Code Number" maxlength="100" required />
                                <div class="invalid-feedback">
                                    Please provide a Postal Code.
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="mainactive">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="status" name="status" checked />
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
                                <a href="{{route('city')}}" class="btn btn-danger">Cancel</a>
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

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>

<!-- form mask -->
<script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js')}}"></script>

<!-- form mask init -->
<script src="{{ URL::asset('assets/js/pages/form-repeater.int.js')}}"></script>
<script src="{{ URL::asset('assets/libs/datepicker/datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script>
    $(document).ready(function () {

    });

</script>
@endsection
