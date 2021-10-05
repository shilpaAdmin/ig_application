@extends('layouts.master')

@section('title') Job Apply Edit @endsection
@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}"> --}}
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
@slot('title') Edit Job Apply @endslot
{{-- @slot('li_1') <a href="{{ route('jobopeninglist') }}" class=''> Question Paper </a> @endslot --}}
@slot('li_1') <a href="" class=''> Job Apply </a> @endslot

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

                <form class="needs-validation" novalidate method="post" id="dataForm" action="{{route('jobapply.update',$row['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                $userId = $row['user_id'];
                                ?>
                                <label for="formrow-firstname-input">User</label>
                                <select class="form-control" name="user_id">
                                    <option value=''>--Select User-- </option>
                                    @foreach ($userData as $users)
                                        <option @if ($users->id == $userId) selected="selected" @endif value="{{ $users->id }}">{{ $users->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a Desired User.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter full name" value="{{$row['full_name']}}" maxlength="100">
                                <div class="invalid-feedback">
                                    Please provide a Full Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Mobile</label>
                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile" value="{{$row['mobile_number']}}" maxlength="100" >
                                <div class="invalid-feedback">
                                    Please provide a Mobile.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Skill</label>
                                <input type="text" class="form-control" id="skill" name="skill" placeholder="Enter Skill" value="{{$row['skill']}}" maxlength="100"  >
                                <div class="invalid-feedback">
                                    Please provide a Skill.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" value="{{$row['subject']}}" maxlength="100" >
                                <div class="invalid-feedback">
                                    Please provide a Subject.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$row['email']}}"  maxlength="100">
                                <div class="invalid-feedback">
                                    Please provide a Email.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Message</label>
                                <input type="text" class="form-control" id="message" name="message" placeholder="Enter Message"  value="{{$row['message']}}" maxlength="100">
                                <div class="invalid-feedback">
                                    Please provide a Message.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Cover Letter</label>
                                <input type="file" class="form-control" id="cover_letter" name="cover_letter" placeholder="Enter Cover Letter" value="{{$row['cover_letter']}}"  maxlength="100" >
                                {{-- <span style="color:black">{{$row['cover_letter']}}</span> --}}
                                <div class="invalid-feedback">
                                    Please provide a Cover Letter.
                                </div>

                            </div>
                            <div class="form-group">
                                <img src="@if($row['cover_letter']!='' && file_exists(public_path().'/images/job_apply/'.$row['cover_letter'])){{ URL::asset('/images/job_apply/'.$row['cover_letter']) }} @endif" id="imageview" width="150px" height="150px" />

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Resume</label>
                                <input type="file" class="form-control" id="resume" name="resume" placeholder="Enter Resume" value="{{$row['resume']}}" maxlength="100">
                                {{-- <span style="color:black">{{$row['resume']}}</span> --}}
                                <div class="invalid-feedback">
                                    Please provide a Resume.
                                </div>
                            </div>
                            <div class="form-group">
                                <embed  src="@if($row['resume']!='' && file_exists(public_path().'/images/job_apply/'.$row['resume'])){{ URL::asset('/images/job_apply/'.$row['resume']) }} @endif" id="imageview" width="150px" height="150px" />
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
                                <a href="{{route('jobapply')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="hdnCoverLetter" value="{{$row['cover_letter']}}">
                    <input type="hidden" name="hdnResume" value="{{$row['resume']}}">
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
