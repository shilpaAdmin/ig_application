@extends('layouts.master')

@section('title') Category @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}">
@endsection

@section('content')



    <div class="row mb-3" id="">
        <div class="col-md-12">
            <div class="card  bg-gray-bg text-white-50 m-0 mainhedformaster">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="card-body newheadcontanty">
                            <h5 class="m-0 textforhedermaster">Category</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">

                        <div class="card-body newheadcontanty">
                            <h4 class="card-title addfourm" style="text-align:right;"><a
                                    href="{{ route('category.create') }}"
                                    class="btn addbtnforall2 waves-effect btn-label waves-light"><i
                                        class="bx bx-plus label-icon"></i>ADD
                                    CATEGORY </a></h4>
                        </div>



                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive custom_tabal_saction_part">



                        <table id="CategoryList" class="table">
                            <thead class="thead-light">
                                <tr>


                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>

                                </tr>
                            </thead>



                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <!-- end row -->
    <div id="custom_saction_filter">
        <button type="button"
            class="btn custom_main_saction header-item noti-icon fil_ waves-effect  filterbtnmsain" onclick="openNav()">
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
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
    <script>
        // $(function() {
        var table_html = '';
        var table_html_td = '';
        var i = 1;

        $(function() {
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

        function dataTableAjaxCall(filter = '') {
            var dt = $('#CategoryList').DataTable({
                destroy: true,
                processing: true,
                //serverSide: true,
                responsive: true,
                autoWidth: false,
                "order": [], //Initial no order.
                "aaSorting": [],
                rowReorder: true,
                ajax: {
                    url: "{{ route('datatable.categoryList') }}?"+filter,
                },

                columns: [{
                        data: 'id',
                        name: 'sequence',
                        orderable: false,
                        searchable: false,
                        targets: 0,
                        visible: false
                    },

                    {

                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        targets: 1
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'type_td',
                        name: 'type_td',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'description',
                        name: 'description',
                        searchable: false
                    },
                    {
                        data: 'image_src',
                        name: 'image_src',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'status_td',
                        name: 'status_td',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'command',
                        name: 'command',
                        searchable: false,
                        orderable: false
                    }
                ],

                columnDefs: [{
                    type: 'dateNonStandard',
                    targets: -1
                }]
            });

            $('.dataTables_filter input[type="search"]').css({
                'width': '350px',
                'display': 'inline-block'
            });
            $('.dataTables_filter input').attr('type', 'text');
            dt.on('row-reordered', function(e, diff, edit) {
                dt.order([0, 'asc']);
            });

            dt.on('order.dt search.dt', function() {
                dt.column(1, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            });

            dt.on('row-reorder', function(e, details, edit) {
                dt.column(1).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            });

        }

        function getListData() {
            var search = '';
            var txtStatusType = $("#txtStatusType").val();


            var str ='status='+txtStatusType;
            // alert(str);

            dataTableAjaxCall(str);
        }

        function clearListData()
    {

        $("#txtStatusType").val('');

        dataTableAjaxCall();
    }
    </script>

@endsection
