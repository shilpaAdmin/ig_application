@extends('layouts.master') @section('title') Forum Add @endsection @section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" />
@endsection @section('content') @component('common-components.breadcrumb') @slot('title') Add Forum @endslot @slot('li_1') Forum @endslot @slot('li_2') Add @endslot @endcomponent

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

                <form class="needs-validation" method="post" enctype="multipart/form-data" action="{{route('forum.store')}}" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Question</label>
                                <input type="text" class="form-control" name="question" id="question" required placeholder="Question" value="{{old('question')}}" />
                                <div class="invalid-feedback">
                                    Please provide a Question.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Description</label>
                                <input type="text" class="form-control" name="description" id="description" required placeholder="Description" value="{{old('description')}}" />
                                <div class="invalid-feedback">
                                    Please provide a Description.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">URL</label>
                                <input type="text" class="form-control" name="url" id="url" required placeholder="URL" value="{{old('url')}}" />
                                <div class="invalid-feedback">
                                    Please provide a URL.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Telegram Link</label>
                                <input type="text" class="form-control" name="telegram_link" id="telegram_link" required placeholder="Telegram Link" value="{{old('telegram_link')}}" />
                                <div class="invalid-feedback">
                                    Please provide a Telegram Link.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                        <div class="form-group">
                            <label for="formrow-firstname-input">User</label>
                            <select class="form-select form-control" name="user_id" id="user_id" required>
                                <option value="">Select User</option>
                                @foreach($users as $userid=>$username)
                                <option value="{{$userid}}">{{ucwords($username)}}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                Please provide a User.
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status" value="active" checked />
                            <label class="custom-control-label" for="invalidCheck">Active</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Save</button>
                                <a href="{{route('forum')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>
<!--<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>-->

<script>
    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
    });
</script>
@endsection
