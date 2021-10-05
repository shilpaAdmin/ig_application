@extends('layouts.master')

@section('title') Category Add @endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
<style>

.avatar-upload {
    position: relative;
    max-width: 315px;
    margin:0;
}
   .avatar-upload .avatar-edit {
   position: absolute;
   right: 10px;
   z-index: 1;
   top: 10px;
   }
   .avatar-upload .avatar-edit input {
   display: none;
   }
   .avatar-upload .avatar-edit input + label {
   display: inline-block;
   width: 34px;
   height: 34px;
   margin-bottom: 0;
   border-radius: 100%;
   background: #FFFFFF;
   border: 1px solid transparent;
   box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
   cursor: pointer;
   font-weight: normal;
   transition: all 0.2s ease-in-out;
   }
   .avatar-upload .avatar-edit input + label:hover {
   background: #f1f1f1;
   border-color: #d6d6d6;
   }
   .avatar-upload .avatar-edit input + label:after {
   content: "\f040";
   font-family: 'FontAwesome';
   color: #757575;
   position: absolute;
   top: 7px;
   left: 0;
   right: 0;
   text-align: center;
   margin: auto;
   }
   .avatar-upload .avatar-preview {
   width: 315px;
   height: 200px;
   position: relative;
   border-radius: 0;
   border: 6px solid #F8F8F8;
   box-shadow: 0px 1px 9px 3px rgb(0 0 0 / 10%);
   }
   .avatar-upload .avatar-preview > div {
   width: 100%;
   height: 100%;
   border-radius: 12px;
   background-size: cover;
   background-repeat: no-repeat;
   background-position: 10% center;

   }
   
   .container2 .btn {
   position: absolute;
   top: 90%;
   left: 50%;
   transform: translate(-50%, -50%);
   -ms-transform: translate(-50%, -50%);
   color: white;
   font-size: 16px;
   border: none;
   cursor: pointer;
   border-radius: 5px;
   text-align: center;
   }
</style>
@endsection
@section('content')
@component('common-components.breadcrumb')
@slot('title') Add Category @endslot
@slot('li_1') Category @endslot
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
                    
                    <form class="needs-validation" method="post" enctype="multipart/form-data"
                        action="{{route('category.store')}}" novalidate>
                        @csrf
                        <div class="form-group">
                            <div class="row m-0">

                                <div class="form-check mr-2">
                                    <input class="form-check-input" name="type" type="radio" id="categoryRadio" value="category" checked>
                                    <label class="form-check-label" for="categoryRadio">
                                        Category
                                    </label>
                                </div>


                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="radio" name="type" id="subcategoryRadio" value="sub-category" >

                                    <label class="form-check-label" for="subcategoryRadio">
                                        Sub-Category
                                    </label>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Please provide a Carry Forward.
                            </div>
                        </div>
                        <div class="form-group" id="categoryDiv" style="display:none;">
                            <label for="formrow-firstname-input">Category</label>
                            <select class="form-select form-control form-control-lg txtSearchKeyword-box" data-search="on"  name="txtSearchCategory" id="txtSearchCategory" >
                            </select>

                            <div class="invalid-feedback">
                                Please provide a Category.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formrow-firstname-input">Category Name</label>

                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Category Name" value="{{old('category_name')}}" required>
                            <div class="invalid-feedback">
                                Please provide a Category Name.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="formrow-firstname-input">Category Description</label>

                            <input type="text" class="form-control" name="description" value="{{old('description')}}"
                                id="description" placeholder="Category Description" required>
                            <div class="invalid-feedback">
                                Please provide a Category Description.
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-email-input">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="media_file" id="media_file"
                                           accept="image/*" required>
                                        <label class="custom-file-label" for="customFile">Image</label>
                                        <div class="invalid-feedback">
                                            Please provide a Logo.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <img id="imageview" width="150px" height="150px" src="{{URL::asset('images/image-placeholder.jpg')}}" />
                                    
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--<img id="imageview" width="150px" height="150px" src="{{URL::asset('images/image-placeholder.jpg')}}" />-->
                                    <!--<img class="avatar-md custom_img_ac" alt="200x200" id="imageview"
                                        src="../../../assets/images/logo-light.svg" data-holder-rendered="true">-->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status" value="Active" >
                                <label class="custom-control-label" for="invalidCheck">Active</label>
                            </div>
                        </div>

<!--                        <div class="form-group ">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" id="status" class="custom-control-input" value="Active"
                                id="invalidCheck" >
                                
                                <label class="custom-control-label" for="invalidCheck">Active</label>
                            </div>
                        </div>
-->                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <button class="btn btn-success" type="submit">Save</button>
                                    <a href="{{route('category')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="hdnSearchCategoryId" id="hdnSearchCategoryId">
                    </form> 
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
        headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });
    /*
    var loadFile=function(event){
        var image=document.getElementById('imageview');
        image.src=URL.createObjectURL(event.target.files[0]);
    }*/

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imageview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    var str_url = '{{route("categoryAutoComplete")}}';

    $('#txtSearchCategory').select2({
    ajax: {
        url: str_url,
        dataType: "json",
        type: "POST",
        data: function (params) {
            var queryParameters = {
                search: params.term
            }
            return queryParameters;
        },
        processResults: function (data, params) {
            params.page = params.page || 1;
            return {
                results: $.map(data, function (tag) {
                    return {
                        text: tag.name,
                        id: tag.id,
                        result:tag
                    }
                }),
                pagination: {
                    more: (params.page * 30) < data.total_count
                }
            };
        },
        cache: true,
    },
    placeholder: 'Select category',
    minimumInputLength: 1

}).on("select2:select", function (e)
{
    var selected = e.params.data.result;
    var countryId = selected.id;
    var countryName = selected.name;
    var editHiddenVal = $("#hdnSearchCategoryId").val();

    if(editHiddenVal != '') //use in edit
    {
        $('#hdnSearchCategoryId').val(countryId);
    }
    else //first time adding
    {
        /*Add selected area id into array*/
        $('#hdnSearchCategoryId').val(countryId); //store array
    }
});
$('#txtSearchCategory').on('select2:unselect', function (e) {
    var data = e.params.data;
    var countryId = data.id;

    var editHiddenVal = $('#hdnSearchCategoryId').val();
    var checkComma = editHiddenVal.includes(',');
    if(checkComma)
    {
        var editArray = editHiddenVal.split(',');
        /*Remove data from specific array*/
        editArray.splice(editArray.indexOf(countryId.toString()), 1);
        $('#hdnSearchCategoryId').val(data.id);
    }
    else
    {
       // $("#selectedTagsDivId").hide();
        $('#hdnSearchCategoryId').val('');
    }
});

    $('#subcategoryRadio').on('change',function(){
        
        if($('#subcategoryRadio').is(':checked'))
        {
            $('#categoryDiv').show();
            $('#txtSearchCategory').attr('required',true);
        }
    });

    $('#categoryRadio').on('change',function(){
        
        if($('#categoryRadio').is(':checked'))
        {
            $('#categoryDiv').hide();
            $('#txtSearchCategory').attr('required',false);
            $('#hdnSearchCategoryId').attr('value','');
            $('#txtSearchCategory').children('option').remove();
        }
    });

    $('#media_file').change(function(){
        readURL(this);
    });

</script>
@endsection