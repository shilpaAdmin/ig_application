@extends('layouts.master')

@section('title') Career @endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css') }}">
@endsection
<!-- @section('content')
        @component('common-components.breadcrumb')
                @slot('title') Carrier @endslot
                @slot('li_1') Carrier @endslot
                @slot('li_2') Add @endslot
        @endcomponent -->
@section('content')




    <div class="row mb-3" id="">
        <div class="col-md-12">
            <div class="card  bg-gray-bg text-white-50 m-0 mainhedformaster">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="card-body newheadcontanty">
                            <h5 class="m-0 textforhedermaster">Career List</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">

                        <div class="card-body newheadcontanty">
                            <h4 class="card-title addfourm" style="text-align:right; padding:0px"><a
                                    href="javascript:void(0);" id="addnewsFeedBtn"
                                    class="btn addbtnforall waves-effect btn-label waves-light resetFrom"><i
                                        class="bx bx-plus label-icon"></i>ADD Career</a></h4>
                        </div>



                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Form start here-->
            <div class="form-group" id="addUpdateFormDivId" style="display: none;">
                <form class="needs-validation" id="restFrom" action="{{ route('carrierStore') }}" method="post"
                    novalidate="novalidate">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-success success_box" style="display:none;">
                            </div>
                            <!--<div class="form-row">-->
                            <div class="">
                                <div class=" row">
                                <div class="col-md-8 col-lg-9">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">

                                            <label for="formrow-firstname-input">Type</label>
                                            <input type="text" name="type" class="form-control" id="type"
                                                placeholder="Type" required>
                                            <div class="invalid-feedback">
                                                Please provide a Type.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="formrow-firstname-input">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Name" required>
                                            <div class="invalid-feedback">
                                                Please provide a Name.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="formrow-firstname-input">Description</label>
                                            <input type="text" id="description" name="description"
                                                class="form-control input-mask countryCodeClass" required
                                                placeholder="Description">
                                            <div class="invalid-feedback">
                                                Please provide a Description.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="invalidCheck" name="status"
                                    value="active" checked>
                                <label class="custom-control-label" for="invalidCheck">Active</label>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="btn_set" style="margin-bottom: 10px;">
                                    <input type="hidden" id="hdnCarrierId" name="hdnCarrierId">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                    {{-- <a href="{{route('identity_card')}}" class="btn btn-danger waves-effect waves-light">CANCEL</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <!-- Form end here-->


        <!-- listing start here-->
        <div class="card">

            <div class="card-body custom_tab_part">
                <div class="table-responsive custom_tabal_saction_part">

                    <table id="carrierCardList" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>#</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Applicant</th>
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
        <!-- listing end here-->
    </div>
    </div>

    <div id="custom_saction_filter">
        <button type="button"
            class="btn custom_main_saction header-item noti-icon fil_ waves-effect  filterbtnmsain " onclick="openNav()">
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

    <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
    <!--<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>-->
    <script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <!-- form mask init -->
    <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js') }}"></script>

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

        var assignAspectRatio = 1;
        var imageCallTypeForCrop = '';
        var addOrEditMode = 'add';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });


        $(document).on("click", "#addnewsFeedBtn", function() {
            $("#addUpdateFormDivId").css('display', 'block');

            $(window).scrollTop(0);
            $("#hdnCarrierId").val('');


        });
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


        var table_html = '';
        var table_html_td = '';
        var i = 1;

        function dataTableAjaxCall(filter = '') {
            var dt = $('#carrierCardList').DataTable({
                destroy: true,
                processing: true,
                //serverSide: true,
                responsive: true,
                autoWidth: false,
                "order": [], //Initial no order.
                "aaSorting": [],
                ajax: {
                    url: "{{ url('/admin/carrier/carrierList') }}?"+filter,
                },
                columns: [{
                        data: 'id',
                        name: 'sequence',
                        orderable: false,
                        searchable: false,
                        targets: 0,
                        visible: false
                    }, {
                        class: 'id',
                        data: 'id',
                        name: 'id',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'type',
                        name: 'type',
                        orderable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: false,
                    },
                    {
                        data: 'description',
                        name: 'description',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'applicant',
                        name: 'applicant',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'status_td',
                        name: 'status_td',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'command',
                        name: 'command',
                        searchable: false,
                        orderable: false,
                    },
                ],
                "createdRow": function(row, data, index) {
                    if (data.card_expiry_date === "expired")
                        $(row).css({
                            'background-color': '#b3c6e5'
                        });
                    else if (data.card_expiry_date === "expiring_soon")
                        $(row).css({
                            'background-color': '#fde1e1'
                        });
                    else if (data.card_expiry_date === "not_expiring_soon")
                        $(row).css({
                            'background-color': '#fcf0db'
                        });
                },
                rowReorder: {
                    dataSrc: 'sequence',
                },
                columnDefs: [{
                    type: 'dateNonStandard',
                    targets: -1
                }]
            });
            $('.dataTables_filter input[type="search"]').css({
                'width': '350px',
                'display': 'inline-block'
            });

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
            var startDate = $('#storyDate').data('daterangepicker').startDate.format('YYYY/MM/DD');
            var endDate =  $('#storyDate').data('daterangepicker').endDate.format('YYYY/MM/DD');


            var str ='status='+txtStatusType+'&startDate='+startDate+'&endDate='+endDate;

            dataTableAjaxCall(str);
        }

        function clearListData()
    {

        $("#txtStatusType").val('');
        dataTableAjaxCall();
    }


        function getEditData(id) {
            var url = "{{ route('carrieEdit', ':id') }}";
            $("#hdnCarrierId").val(id);

            url = url.replace(":id", id);
            // alert(url);

            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response) {
                    // console.log(response);
                    var fetchedId = response.id;
                    // alert(fetchedId);
                    var type = response.type;
                    var name = response.name;
                    var description = response.description;

                    $('#type').val(type);
                    $('#name').val(name);
                    $('#description').val(description);

                    $(window).scrollTop(0);
                    $("#addUpdateFormDivId").show();
                    // $("#hdnCarrierId").val(fetchedId);

                },
                error: function(data) {
                    // console.log(data);
                }
            })
        }

        function deleteCarrierData(id) {
            swal({
                    title: "Are you sure?",
                    text: "Delete Carrier Data",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = "/admin/carrier/delete/" + id;
                    }
                });
        }


        $(document).ready(function() {
            $(".resetFrom").click(function() {
                // $("#userIdentityCardFormId")[0].reset()
                $("#restFrom").trigger("reset");



            });
        });



        function openJobDetailPopup(id) {
            window.location.href = "/admin/carrier/detail/" + id;
        }
    </script>
@endsection
