@extends('layouts.master')

@section('title') FAQ Add @endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
@endsection
@section('content')
@component('common-components.breadcrumb')
@slot('title') Add FAQ @endslot
@slot('li_1') FAQ @endslot
@slot('li_2') Add @endslot
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

                <form class="needs-validation" method="post" enctype="multipart/form-data" action="{{route('faq.update',$row['id'])}}" novalidate>
                    @csrf

                    <div class="row">
                        <div class="col-md-4">

                            <div>
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Question</label>
                                    <input type="text" class="form-control" name="question" id="question" required placeholder="Question" value="{{$row['question']}}">
                                    <div class="invalid-feedback">
                                        Please provide a Question.
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Answer</label>
                                    <input type="text" class="form-control" name="answer" id="Answer" required placeholder="Answer" value="{{$row['answer']}}">
                                    <div class="invalid-feedback">
                                        Please provide a Answer.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div>
                                <div class="form-group">
                                    <label for="formrow-firstname-input">User</label>
                                    <select class="form-select form-control" name="user_id" id="user_id" required disabled>
                                        <option value="">Select User</option>
                                        @foreach($users as $userid=>$username)
                                        <option value="{{$userid}}" @if($row['user_id']==$userid) selected @endif>{{ucwords($username)}}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        Please provide a User.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div>

                                <div class="form-group">
                                    <label for="formrow-firstname-input">Tags</label>
                                    <!--<select class="form-select form-control form-control-lg txtSearchKeyword-box" data-search="on"
                             name="txtSearchTag" id="txtSearchTag" multiple="multiple" required>
                            </select>-->
                                    <select class="form-select form-control form-control-lg" data-search="on" multiple="multiple" name="txtSearchTag" id="txtSearchTag" required>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Tag.
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>









                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status" value="active" @if($row['status']=='active' ) checked @endif>
                            <label class="custom-control-label" for="invalidCheck">Active</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <button class="btn btn-success" type="submit">Save</button>
                                <a href="{{route('faq')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                        <input type="hidden" name="hdnSearchTagId" id="hdnSearchTagId">
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
<!--<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>-->

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    @foreach($tagsData as $tagdata)

    var $option = $("<option selected></option>").val('{{$tagdata->id}}').text('{{$tagdata->name}}');
    $('#txtSearchTag').append($option).trigger('change');
    @endforeach

    var str_url = '{{route("faqtagAutoComplete")}}';

    $('#txtSearchTag').select2({
        ajax: {
            //tags:true,
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
        placeholder: 'Select tags',
        minimumInputLength: 1

    }).on("select2:select", function(e) {
        var selected = e.params.data.result;
        var countryId = selected.id;
        var countryName = selected.name;
        var editHiddenVal = $("#hdnSearchTagId").val();

        if (editHiddenVal != '') //use in edit
        {
            $('#hdnSearchTagId').val(countryId);
        } else //first time adding
        {
            /*Add selected area id into array*/
            $('#hdnSearchTagId').val(countryId); //store array
        }
    });

    $('#txtSearchTag').on('select2:unselect', function(e) {
        var data = e.params.data;
        var countryId = data.id;

        var editHiddenVal = $('#hdnSearchTagId').val();
        var checkComma = editHiddenVal.includes(',');
        if (checkComma) {
            var editArray = editHiddenVal.split(',');
            /*Remove data from specific array*/
            editArray.splice(editArray.indexOf(countryId.toString()), 1);
            $('#hdnSearchTagId').val(data.id);
        } else {
            // $("#selectedTagsDivId").hide();
            $('#hdnSearchTagId').val('');
        }
    });
</script>
@endsection
