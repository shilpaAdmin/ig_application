@extends('layouts.master')

@section('title') Applicant @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css')}}">
@endsection

@section('content')


{{-- @component('common-components.breadcrumb')
@slot('title') Job Applicant List @endslot
@slot('li_1') Applicant @endslot
@slot('li_2') List @endslot
@slot('add_btn') @endslot
@endcomponent --}}
<!--<div class="row mb-3">
    <div class="col-md-12">
       <div class="card  bg-gray-bg text-white-50 m-0">
          <div class="card-body card-body-py-3">
             <h5 class="m-0">Job Applicant</h5>
          </div>
       </div>
    </div>
 </div>-->


 <div class="row mb-3">
   <div class="col-md-12">
      <div class="card  bg-gray-bg text-white-50 m-0" style="background: #a71513;">
         <div class="card-body card-body-py-3">
            <h5 class=" m-0">Job Apply</h5>
         </div>
      </div>
   </div>
</div>


<div class="row mb-3">
<div class="col-12">
        <div class="card">
<div class="card-body">

   <div class="row label-box">
     <div class="col-5">

        <label><span>Name:</span>{{ ucwords($careerData[0]['name']) }}</label><br>
		<label><span>Type: </span>{{ ucwords(strip_tags($careerData[0]['type'])) }}</label><br>
		<label><span>Description: </span>{{ ucwords(strip_tags($careerData[0]['description'])) }}</label>


    </div>
</div>

</div>
</div>
</div>
</div>

{{-- $jobOpeningTitleArray[0]['id'] --}}

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive custom_tabal_saction_part">
                {{-- <h4 class="card-title" style="text-align:right;"><a href="{{route('jobapplypplicant',$jobOpeningTitleArray[0]['id'])}}"  class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-plus label-icon"></i>ADD APPLICANT</a></h4> --}}
                    <table id="jobApplicantDetailList" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Sequence</th>
                                <th>#</th>
                                <th>Name / Mo.No</th>
                                <th>Email</th>
                                <th>Resume / CV</th>
                                <th>Cover letter</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- end row -->
@endsection

@section('script')
<!-- Plugins js -->
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Init js-->
<script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>


<script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>

<script>
    $(function()
    {

        // var careerDataId = {{$careerData[0]['id']}}


        var table_html = '';
        var table_html_td = '';
        var i = 1;
        jQuery.extend(jQuery.fn.dataTableExt.oSort, {
        "dom-date-pre": function(a) {
            return moment(a, "DD MMMM YYYY")
        },
        "dom-date-asc": function(a, b) {
            return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },
        "dom-date-desc": function(a, b) {
            return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
        });
        dataTableAjaxCall();
    });
    function dataTableAjaxCall()
    {
        var careerDataId = {{$careerData[0]['id']}}
        var dt = $('#jobApplicantDetailList').DataTable({
        destroy: true,
        processing: true,
       // serverSide: true,
        responsive: true,
        autoWidth: false,
        "order": [], //Initial no order.
        "aaSorting": [],
        rowReorder: true,
        ajax: {
            url: "{{ route('jobapplyListapplicant') }}",
            data:{id:careerDataId},

        },
            columns: [
                {
                    data: 'id',
                    name: 'sequence',
                    orderable:false,
                    searchable: false,
                    targets: 0,
                    visible: false
                },
                {
                    data: 'id',
                    name: 'id',
                    orderable:false,
                    searchable: false,
                    targets: 1
                },
                {
                    data: 'full_name',
                    name: 'full_name',
                    orderable: true,
                    "type": "dom-date"
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable:false
                },
                {
                    data: 'resume_cv',
                    name: 'resume_cv',
                    orderable:false
                },
                {
                    data: 'cover_letter',
                    name: 'cover_letter',
                    orderable:false
                },
                {
                    data: 'status_td',
                    name: 'status_td',
                    searchable: false,
                    orderable:false
                },

                {
                    data: 'command',
                    name: 'command',
                    searchable: false,
                    orderable:false
                }
            ],
                rowReorder: {
                dataSrc: 'sequence',
            },
            columnDefs: [{
            type: 'dateNonStandard',
            targets: -1
            }]
            });
            $('.dataTables_filter input[type="search"]').css(
            {'width':'350px','display':'inline-block'});
            $('.dataTables_filter input').attr('type', 'text');
            dt.on( 'row-reordered', function ( e, diff, edit ) {
                dt.order([0, 'asc']);
            });

            dt.on('order.dt search.dt', function () {
                dt.column(1, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            });

            dt.on('row-reorder', function (e, details, edit) {
                dt.column(1).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            });
    }


    function jobAppplyDelete(id)
    {
        swal({
            title: "Are you sure?",
            text: "Delete Job Data",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm)
        {
            if (isConfirm)
            {
                window.location.href = "/admin/carrier/applicantdelete/" + id;
            }
        });
    }
</script>
@endsection
