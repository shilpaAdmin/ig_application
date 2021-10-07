@extends('layouts.master')

@section('title') Dashboard @endsection

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
@endsection



@section('content')

{{-- @component('common-components.breadcrumb')
@slot('title') Add Business @endslot
@slot('li_1') Business @endslot
@slot('li_2') Add @endslot
@endcomponent --}}

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
@endsection
