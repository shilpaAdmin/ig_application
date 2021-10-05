@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">

<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
<link href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet"
    type="text/css">
<link rel="stylesheet" type="text/css"
    href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css">
<style>
/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
@endsection
@section('content')


@component('common-components.breadcrumb')
@slot('title') Dashboard @endslot
@slot('li_1') Dashboard @endslot
@endcomponent


<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-12">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Good Morning, {{ucwords(Auth::user()->name)}}</h5>
                            <p>IG</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <!-- <img src="assets/images/users/profile-img.png" alt="" class="img-fluid"> -->
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="assets/images/users/avatar-2.jpg" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate"></h5>
                        <!--<p class="text-muted mb-0 text-truncate">Director</p>-->
                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">
                            <!--
                            <div class="row">
                                <div class="col-5">
                                    <h5 class="font-size-15">Code</h5>
                                    <p class="text-muted mb-0">NF/00001</p>
                                </div>
                                <div class="col-7">
                                    <h5 class="font-size-15">Designation</h5>
                                    <p class="text-muted mb-0">Director</p>
                                </div>
                            </div>-->
                            <div class="mt-4">
                                <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i
                                        class="mdi mdi-arrow-right ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-8">
        <div class="row">
            {{--
            @component('common-components.index-widget')
            @slot('title') Today's Stories @endslot
            @slot('price') 723 @endslot
            @slot('icon') bx bx-archive-in font-size-24 @endslot
            @endcomponent

            @component('common-components.index-widget')
            @slot('title') Revenue @endslot
            @slot('price') Rs 35, 723 @endslot
            @slot('icon') bx bx-archive-in font-size-24 @endslot
            @endcomponent

            @component('common-components.index-widget')
            @slot('title') Average Cost @endslot
            @slot('price') Rs 16.2 @endslot
            @slot('icon') bx bx-purchase-tag-alt font-size-24 @endslot
            @endcomponent
            @component('common-components.index-widget')
            @slot('title') Average Cost @endslot
            @slot('price') Rs 16.2 @endslot
            @slot('icon') bx bx-purchase-tag-alt font-size-24 @endslot
            @endcomponent
            @component('common-components.index-widget')
            @slot('title') Average Cost @endslot
            @slot('price') Rs 16.2 @endslot
            @slot('icon') bx bx-purchase-tag-alt font-size-24 @endslot
            @endcomponent



            @component('common-components.index-widget')

            @slot('icon') bx bxs-plus-circle font-size-24 @endslot
            @endcomponent
            --}}
        </div>

    </div>
</div>

<!-- end modal -->
@endsection

@section('script')


<!-- Init js-->
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

<script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Init js-->
<script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>


<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/datepicker/datepicker.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>

<script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>

<!-- form mask -->
<script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js')}}"></script>

<!-- form mask init -->
<script src="{{ URL::asset('assets/js/pages/form-repeater.int.js')}}"></script>

<!-- form mask -->
<script src="{{ URL::asset('assets/libs/inputmask/inputmask.min.js')}}"></script>

<!-- form mask init -->
<script src="{{ URL::asset('assets/js/pages/form-mask.init.js')}}"></script>
<script>
        {{--
        
    $(document).ready(function(){
        getContactsLists(1);
    
        $( function() {
            tasklist();
            approvelist();
            userlist();
        } );
    function getContactsLists(contactListNo)
    {
        let pageid;

        if(typeof contactListNo === 'object' && contactListNo !== null)
        {
         pageid=$('select#pages option:selected').val();
        }
        else
        {
         pageid=contactListNo;
        }

           let page= ["{!! route('datatable.MyContactList') !!}","{!! route('datatable.myFavouritesList') !!}","{!! route('datatable.myColleagueList') !!}"
           ];
           let pageArrId=parseInt(pageid);
           pageArrId--;
            /*let personName='';
            let personContact='';

           if(pageArrId!=2)
           {
            personName='full_name';
            personContact='contact_number';
           }
           else
           {
            personName='name';
            personContact='primary_contact_number';
           }*/

        var table_html = '';
        var table_html_td = '';
        var i = 1;
        var dt = $('#phonebookLists').DataTable({
            destroy: true,
            processing: true,
            //serverSide: true,
            responsive: true,
            autoWidth: false,
           
            ajax:{
                url:page[pageArrId],
            } ,
            columns: [
                { data: 'icon', name: 'icon' },
                { data: 'contact', name: 'contact',enable_auto_complete: true},
                /*
                { data: personName, name: personName },// enable_auto_complete:true 
                { data: 'email', name: 'email' , searchable: false  },
                { data: personContact, name: personContact  , searchable: false },*/
            ],
            
            }); 
    }
        $('#pages').change(getContactsLists);

    function tasklist(){
        $.ajax({
                method:'GET',
                url:'{{ route('task.tasklist') }}',
                success:function(res){
                //console.log(res);
                $("#taskListsId").html(res);
                }
            });
        }
    
    function userlist(){
        $.ajax({
            method:'GET',
            url:'{{ route('user') }}',
            success:function(res){
            //console.log(res);
            $("#usersInfoId").html(res);
            }
        });
    }
    
    function approvelist(url){
        $.ajax({
            method:'GET',
            url:'{{ route('approvel.approvalList') }}',
            success:function(res){
            //console.log(res);
            $("#approvalListId").html(res);
            }
        });
    }

        $(document).on('click','.addtodobutton',function(){
                var id = $(this).attr("data-id");
                $('#taskid').val(id);
            });
            
            $(document).on('click','.edittodotask',function(e){

                e.preventDefault();
                var id = $(this).attr('id').replace('edittodotask_', '');
                var url = "{{route('task_to_do.edit', ':id')}}";            
                url = url.replace(":id", id);

                var update_url = "{{route('task_to_do.update', ':id')}}";
                update_url = update_url.replace(":id", id);
                $.ajax({
                    type: "get",
                    url: url,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        //$("#edit_assign_to").val(["2"]);
                        //$('#edit_assign_to option[value="2"]').attr("selected", "selected");

                        
                        // var assign_to = response.assign_to.split(',');
                        // console.log(response);
                        $("#edit_assign_to").val(response.assign_to.split(', ')).trigger('change.select2'); 

                        //$("#edit_assign_to").val(assign_to);
                        $('#edit_name').val(response.name);
                        $('#edit_due_date').val(response.due_date);

                        $('#edit_note').val(response.note);
                        // var values= response.assign_to;
                        // var PRESELECTED_VALUES = [
                        //     { id: '2', text: 'mohini' }
                        // ];
                        // $('#edit_assign_to').select2('data', PRESELECTED_VALUES)

                        //$('#edit_assign_to').val(values.split(', '));

                        // $.each(values.split(", "), function(i,e){
                        //     $("#edit_assign_to option[value='" + e + "']").prop("selected", true);
                        // });
                        

                        $('.edit_to_do_form').attr("action", update_url);

                        $('.edittasktodomodal').modal('show');

                        
                    },
                    error: function(data) {
                        console.log(data);


                    }
                })
                
            });

            $(document).on('submit','.edit_to_do_form',function(e){
                e.preventDefault();
                var form_cust = $('.edit_to_do_form')[0]; 
                let form1 = new FormData(form_cust);
                var form_url = $('.edit_to_do_form').attr('action');

                $.ajax({
                    type: "POST",
                    url: form_url,
                    data: form1, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        //console.log(response);
                        if(response== 'success'){
                            // location.reload();
                            $('.edittasktodomodal').modal('toggle');
                            tasklist();
                        }
                        
                    },
                    error: function(data){
                        
                        var errors = data.responseJSON;
                        $.each( errors.errors, function( key, value ) {
                            var ele = "#"+key;
                            $(ele).addClass('error');
                            $('<label class="error">'+ value +'</label>').insertAfter(ele);
                        });
                        
                    }
                })
                    
                
                return false;
            });

            $(document).on('click','.deletetodotask',function(e){
                e.preventDefault();
                if (!confirm("Do you want to delete")){
                    return false;
                }else{
                    var id = $(this).attr('id');
                    var url = "{{route('task_to_do.delete', ':id')}}";
                    url = url.replace(":id", id);
                    $.ajax({
                        type: "get",
                        url: url,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if(response== 'success'){
                                //location.reload();
                                tasklist();
                            }

                            
                        },
                        error: function(data) {
                            console.log(data);


                        }
                    })
                }
                
                
            });

            $(document).on('submit','.add_to_do_form',function(e){
                e.preventDefault();
                var form_cust = $(this)[0]; 
                let form1 = new FormData(form_cust);
                var form_url = $(this).attr('action');
                
                $.ajax({
                    type: "POST",
                    url: form_url,
                    data: form1, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        console.log(response);
                        if(response== 'success'){
                            //location.reload();
                            $('.addtodoModal').modal('toggle');
                            $('.addtodoname').val('');
                            $('.addtododate').val('');
                            $('#note').val('');
                            $('#file').val('');
                            $(".select2-multiple").val([]).trigger("change");
                            tasklist();
                        }
                        
                    },
                    error: function(data){
                        console.log(data);
                        var errors = data.responseJSON;
                        $.each( errors.errors, function( key, value ) {
                            var ele = "#"+key;
                            $(ele).css('border-color','red');
                            
                        });
                        
                    }
                })
                    
                
                return false;
            });

            $(document).on('submit','#edit_task_form',function(e){
                e.preventDefault();
                var form_cust = $('#edit_task_form')[0]; 
                let form1 = new FormData(form_cust);
                var form_url = $('#edit_task_form').attr('action');
                $.ajax({
                    type: "POST",
                    url: form_url,
                    data: form1, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        //console.log(response);
                        if(response== 'success'){
                            //location.reload();
                            tasklist();
                        }
                        
                    },
                    error: function(data){
                        
                        var errors = data.responseJSON;
                        $.each( errors.errors, function( key, value ) {
                            var ele = "."+key;
                            $(ele).css('border-color','red');
                            
                        });
                        
                    }
                })
                    
                
                return false;
            });

            $(document).on('click','.edittask',function(e){
                e.preventDefault();
                var id = $(this).attr('id');
                var url = "{{route('task.edit', ':id')}}";
                var update_url = "{{route('task.update', ':id')}}";
                url = url.replace(":id", id);
                update_url = update_url.replace(":id", id);
                $.ajax({
                    type: "get",
                    url: url,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        //console.log(response);
                        $('.name').val(response.name);
                        $('.description').val(response.description);
                        

                        $('#edit_task_form').attr("action", update_url);

                        $('.editmodal').modal('show');

                        
                    },
                    error: function(data) {
                        console.log(data);


                    }
                })
                
            });

            $(document).on('click','.deletetask',function(e){
                e.preventDefault();
                if (!confirm("Do you want to delete")){
                    return false;
                }else{
                    var id = $(this).attr('id');
                    var url = "{{route('task.delete', ':id')}}";
                    url = url.replace(":id", id);
                    $.ajax({
                        type: "get",
                        url: url,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if(response== 'success'){
                                // location.reload();
                                tasklist();
                            }

                            
                        },
                        error: function(data) {
                            console.log(data);


                        }
                    })
                }
                
                
            });
            $(document).on('click','.taskcheckbox',function(){
                
                var id = $(this).val();
                //alert($(this).attr("id")+' '+$(this).val());
                
                var url = "{{route('task.checked', ':id')}}";
                url = url.replace(":id", id);
                $.ajax({
                    type: "get",
                    url: url,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if(response== 'success'){
                            swal("Congrats!", "You have successfully set up task status!", "success");

                        }else{
                            swal("Sorry", "Only admin can complete this task :)", "error");
                        }

                        
                    }
                })

            });

            $(document).on('click','.assigntocheckbox',function(){
                var id = $(this).val();
                //alert($(this).attr("id")+' '+$(this).val());
                    
                var url = "{{route('task.assigntocheckbox', ':id')}}";
                url = url.replace(":id", id);
                
                $.ajax({
                    type: "get",
                    url: url,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        //console.log(response);
                        if(response.status== 'Success'){
                            swal("Congrats!", "You have successfully set up task status!", "success");
                            $('.change_status').text(response.msg);
                            if(response.task_status == 'Completed'){
                                //console.log($("#complete_"+id));
                                $(".complete_"+id).removeClass('badge-soft-danger').addClass('badge-soft-success').text(response.task_status);
                                
                            }else{
                                //console.log($("#complete_"+id));
                                $(".complete_"+id).removeClass('badge-soft-success').addClass('badge-soft-danger').text(response.task_status);
                            }
                            
                            

                        }else{
                            swal("Sorry", "Only "+response+" can complete this task :)", "error");
                        }

                        
                    }
                })
                
            

            });

            $(document).on('click','.taskdetail',function(){
                var id = $(this).attr('id');

                

                var form_cust = $('#edit_task_form')[0]; 
                let form1 = new FormData(form_cust);
                var form_url = $('#edit_task_form').attr('action');
                $.ajax({
                    type: "POST",
                    url: form_url,
                    data: form1, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        //console.log(response);
                        if(response== 'success'){
                            // location.reload();
                            tasklist();
                        }
                        
                    },
                    error: function(data){
                        
                        var errors = data.responseJSON;
                        $.each( errors.errors, function( key, value ) {
                            var ele = "."+key;
                            $(ele).css('border-color','red');
                            
                        });
                        
                    }
                })

            });
        
    $(document).on("click", ".delete_class", function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        swal({
            title: "Are you sure?",
            text: "You want to delete this record",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, we can Delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {              
                
                
                $.ajaxSetup({
                    headers:{'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                });

                var url = "{{route('user.delete', ':id')}}";
                url = url.replace(":id", id);
                $.ajax({
                    url:url,
                    type: 'get',
                    data:{"id":id},
                    success: function( msg ) { 
                        
                        //console.log(msg);
                        if(msg == 'success'){
                            swal("Congrats!", "You have successfully delete this data!", "success");
                            $('.user_'+id).fadeOut();
                        }
                        
                    }
                });
            } else {
                swal("Cancelled", "Don't worry your data is safe :)", "error");
            }
        });
        
        });
         
});
    --}}
   
</script>
@endsection