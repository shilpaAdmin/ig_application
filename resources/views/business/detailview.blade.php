@extends('layouts.master')

@section('title') Business Detail @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/dashliteee8b.css')}}">
@endsection

@section('content')

{{--
@component('common-components.breadcrumb')
@slot('title') Business Detail @endslot
@slot('li_1') <a href="{{route('business')}}" class=''>Business</a> @endslot
@slot('li_2') Detail @endslot

@endcomponent
--}}

<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <br>
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Business Detail</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <button type="button" onclick="window.location='{{ url("/setting/business") }}';" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></button>
                                        </div>
                                    </div>
                                    <div id="" class="">
                                        <div class="py-3">
                                            <div class="nk-block">
                                                <div class="card card-bordered">
                                                    <div class="card-aside-wrap">
                                                        <div class="card-content box_iconmenu">
                                                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                                                <li class="nav-item"><a class="nav-link active" href="javascript:;""><em class="icon ni ni-user-circle"></em><span>Business Detail</span></a>
                                                                </li>
                                                            </ul>
                                                            <div class="card-inner">
                                                                <div class="card-inner">
                                                                    <div class="nk-block">
                                                                        <div class="nk-block-head">
                                                                            <h5 class="title">Business Information</h5>
<!--                                                                            <p>Basic info, like your name and address, that you use on Nio Platform.</p>-->
                                                                        </div>
                                                                    </div>
                                                                    @php

                                                                    $job_details=json_decode($row['job_detail_json']);
                                                                    
                                                                    @endphp
                                                                    <div class="profile-ud-list">
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">ID</span><span class="profile-ud-value">{{$row['id']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Type</span><span class="profile-ud-value">{{ucfirst($row['type'])}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Name</span><span class="profile-ud-value">{{$row['name']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">About</span><span class="profile-ud-value">{{$row['about']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Description</span><span class="profile-ud-value">{{$row['description']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Sub-Description</span><span class="profile-ud-value">{{$row['sub_descrition']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Sub-Description1</span><span class="profile-ud-value">{{$row['sub_description_1']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Actual Price</span><span class="profile-ud-value">{{strtoupper($row['actual_price_unit'])}} {{$row['actual_price']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Selling Price</span><span class="profile-ud-value">{{strtoupper($row['selling_price_unit'])}} {{$row['selling_price']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Display Hours</span><span class="profile-ud-value">{{$row['display_hours']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Job Salary</span><span class="profile-ud-value">{{$job_details->JobSalary}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Job Experiance</span><span class="profile-ud-value">{{$job_details->JobExperience}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Job Qualification</span><span class="profile-ud-value">{{$job_details->JobQualification}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Payment Mode</span><span class="profile-ud-value">{{$row['payment_mode']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Contact Person</span><span class="profile-ud-value">{{$row['contact_person_name']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Mobile Number</span><span class="profile-ud-value">{{$row['mobile_number']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Email Id</span><span class="profile-ud-value">{{$row['email_id']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Website</span><span class="profile-ud-value">{{$row['website']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Unit Option</span><span class="profile-ud-value">{{$row['unit_option']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Reference URL</span><span class="profile-ud-value">{{$row['reference_url']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Syllabus</span><span class="profile-ud-value">{{$row['syllabus']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Approve</span><span class="profile-ud-value">{{$row['is_approve']==0?'No':'Yes'}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Status</span><span class="profile-ud-value">{{$row['status']}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Created By</span><span class="profile-ud-value">{{date('d F Y, h:i A', strtotime($row['created_at']))}}</span></div>
                                                                        </div>
                                                                        <div class="profile-ud-item">
                                                                            <div class="profile-ud wider"><span class="profile-ud-label">Updated By</span><span class="profile-ud-value">{{date('d F Y, h:i A', strtotime($row['updated_at']))}}</span></div>
                                                                        </div>
@endsection