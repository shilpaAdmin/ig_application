@extends('layouts.master')

@section('title') Country Edit @endsection
@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}"> --}}

<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css">
<link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@endsection
@section('content')
@component('common-components.breadcrumb')
@slot('title') Edit Country @endslot
{{-- @slot('li_1') <a href="{{ route('jobopeninglist') }}" class=''> Question Paper </a> @endslot --}}
@slot('li_1') <a href="" class=''> Country </a> @endslot

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

                <form class="needs-validation" novalidate method="post" id="dataForm" action="{{route('country.update',$row['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"  value="{{$row['name']}}" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a  Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Contact Number</label>
                                <input type="number" class="form-control" id="contact_number" name="contact_number"  value="{{$row['contact_number']}}" placeholder="Enter Contact Number" maxlength="100" required>
                                <div class="invalid-feedback">
                                    Please provide a Contact Number.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding-top:1%;">
                           <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" name="status" value="Active" class="custom-control-input" id="invalidCheck" >
                                 <label class="custom-control-label" for="invalidCheck">Active</label>
                                 <div class="invalid-feedback">
                                    You must agree before Save.
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <button class="btn btn-success" type="submit">Save</button>
                                <a href="{{route('country')}}" class="btn btn-danger">Cancel</a>
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
<script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>
<!--<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>-->


<script>
$( document ).ready(function()
{

});

</script>
@endsection
