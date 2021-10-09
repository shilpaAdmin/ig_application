
@extends('layouts.master')

@section('title') Sub Category @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css')}}">
@endsection

@section('content')


 <div class="row mb-3">
   <div class="col-md-12">
      <div class="card  bg-gray-bg text-white-50 m-0" style="background: #a71513;">
         <div class="card-body card-body-py-3">
            <h5 class=" m-0">Sub Category List</h5>
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
                    <table id="subCategoryList" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Sequence</th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Images</th>
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
    var subCategoryDataId = {{$subCategoryData[0]['id']}}

        var dt = $('#subCategoryList').DataTable({
        destroy: true,
        processing: true,
       // serverSide: true,
        responsive: true,
        autoWidth: false,
        "order": [], //Initial no order.
        "aaSorting": [],
        rowReorder: true,
        ajax: {
            url: "{{ route('subCategoryDataList') }}",
            data:{id:subCategoryDataId},

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
                    data: 'name',
                    name: 'name',
                    orderable: true,
                    "type": "dom-date"
                },
                {
                    data: 'description',
                    name: 'description',
                    orderable:false
                },
                {
                    data: 'media_file',
                    name: 'media_file',
                    orderable:false
                },
                {
                    data: 'status_td',
                    name: 'status_td',
                    searchable: false,
                    orderable:false
                },

                {
                    data: 'applicant',
                    name: 'applicant',
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

</script>
@endsection
