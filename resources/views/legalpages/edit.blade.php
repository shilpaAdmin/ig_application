@extends('layouts.master')

@section('title') Legal Pages Edit @endsection

@section('css')

<!-- Summernote css -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Edit Legal Pages @endslot
@slot('li_1') <a href="" class=''> Legal Pages </a> @endslot

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
                <form class="needs-validation" novalidate method="post" id="dataForm" action="{{route('matrimonial.update',$row['id'])}}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Type</label>
                                <select name="type" id="type" class="form-control">
                                    @foreach($types as $typeid=>$typename)
                                        @if($row['type']==$typename)
                                            <option value='{{$typename}}'>{{ucwords(str_replace('_',' ',$typename))}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a Type.
                        </div>
                        <br>
                        <div class="col-lg-12 tiny_box">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Body</label>
                                <textarea class="form-control col-md-7 col-xs-12" id="body" placeholder="Add Content">{{$row['html']}}</textarea>
                                <div class="invalid-feedback">
                                    Please provide a Body.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <button class="btn btn-success" type="submit">Save</button>
                                <a href="{{route('legalpages')}}" class="btn btn-danger">Cancel</a>
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
<script src="{{ URL::asset('assets/js/pages/tinymce.min.js')}}"></script>
<script>
    $(function(){
        tinymce.init(
        {
            selector: 'textarea#body',
            menubar:false,
            plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste imagetools wordcount'
                    ],
            forced_root_block : false,
            automatic_uploads: true,
            file_picker_types: 'image',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px ',
            automatic_uploads: false,
            file_picker_types: 'image',
            width: 1000,
            height: 1000,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',

        });
        tinymce.activeEditor.execCommand('mceMedia');
        tinymce.activeEditor.execCommand('mcePrint');
        tinymce.activeEditor.execCommand('SearchReplace');
    });
</script>
@endsection
