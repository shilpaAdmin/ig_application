
@extends('layouts.master')

@section('title') Sub Category @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css')}}">
@endsection

@section('content')



<div class="row mb-3" id="">
        <div class="col-md-12">
            <div class="card text-white-50 m-0 mainhedformaster">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="card-body newheadcontanty">
                            <h5 class="m-0 textforhedermaster">Sub Category List</h5>
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
                <div class="custom_tabal_saction_part">
                {{-- <h4 class="card-title" style="text-align:right;"><a href="{{route('jobapplypplicant',$jobOpeningTitleArray[0]['id'])}}"  class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-plus label-icon"></i>ADD APPLICANT</a></h4> --}}
                <div class="table-responsive">
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
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- end row -->

<div id="custom_saction_filter">
    <button type="button"
        class="btn custom_main_saction header-item noti-icon fil_ waves-effect filterbtnmsain" onclick="openNav()">
        <i class="bx bx-filter-alt filterbtnicon"></i>
    </button>

    <div data-simplebar class="h-100">
        <div class="rightbar-title p-3">
            <a href="javascript:void(0);" class="custom_saction_filter float-right" onclick="closeNav()">
                <i class="mdi mdi-close noti-icon" style="color:#fff;"></i>
            </a>
            <h5 class="m-0 text-cutom1">Filter</h5>
        </div>
        <!-- custom_form -->
        <div class="p-3">
            <div class="form-group">
                <label class="control-label text-cutom">Status</label>
                <select class="form-control select2" id="txtStatusType" name="txtStatusType">
                    <option value="">--Select--</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <div class="input-group dategroup d-inline-flex" id="dateFilterDivId">
                    <input type="text" id="storyDate" class="form-control datearea" name="storyDate" placeholder=""
                        required="" data-provide="" data-date-autoclose="true">

                    <div class="input-group-append">
                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="button" onclick="getListData(),closeNav()"
                    class="btn btn-outline-success waves-effect waves-light">Search</button>
                <button type="button" onclick="clearListData(),closeNav()"
                    class="btn btn-outline-danger waves-effect waves-light">Clear</button>
            </div>
        </div>
    </div>

</div>

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

var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        console.log('start :: ' + start + ' end ::: ' + end);
        $('#storyDate span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'));
    }

    $(document).ready(function() {
        $('#storyDate').daterangepicker({
            startDate: start,
            endDate: end,
            locale: {
                format: 'DD/MM/YYYY'
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf(
                    'month')]
            }
        }, cb);
        cb(start, end);
    });
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
    function dataTableAjaxCall(filter='')
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
            url: "{{ route('subCategoryDataList') }}?"+filter,
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

    function getListData() {
            var search = '';
            var txtStatusType = $("#txtStatusType").val();
            var startDate = $('#storyDate').data('daterangepicker').startDate.format('YYYY/MM/DD');
            var endDate =  $('#storyDate').data('daterangepicker').endDate.format('YYYY/MM/DD');

            var str ='status='+txtStatusType+'&startDate='+startDate+'&endDate='+endDate;

            dataTableAjaxCall(str);
        }

        function clearListData()
    {

        $("#txtStatusType").val('');
        $("#locationSearch").val('');
        dataTableAjaxCall();
    }

    function openSubCategoryBusinessDetail(id)
    {

        window.location.href = "/admin/category/subCategoryList/" + id;
    }

    function openJobapplicantPopup(Id)
    {
        alert(Id);
        window.location.href = "/admin/category/subCategoryList/" + Id+"?type=job";
    }

</script>
@endsection
