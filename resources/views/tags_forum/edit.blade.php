@extends('layouts.master')

@section('title') Tags Forum Update @endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
@endsection
@section('content')
@component('common-components.breadcrumb')
@slot('title') Update Tags Forum @endslot
@slot('li_1') Tags Forum @endslot
@slot('li_2') Update @endslot
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
                        action="{{ route('tagsforum.update',$row['id']) }}" novalidate>
                        @csrf
                        <input type="hidden" value="{{ $row['id'] }}" name="id">

                        <div class="form-group">
                            <label for="formrow-firstname-input">Tags Name</label>

                            <input type="text" class="form-control" name="name" id="name"
                            required  placeholder="Tag Name" value="{{$row['name']}}">
                            <div class="invalid-feedback">
                                Please provide a Tag Name.
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status" value="active"
                                @if($row['status']=='active' ) checked @endif>
                                <label class="custom-control-label" for="invalidCheck">Active</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <button class="btn btn-success" type="submit">Save</button>
                                    <a href="{{route('tagsforum')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>

<script>
    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });
</script>
@endsection
