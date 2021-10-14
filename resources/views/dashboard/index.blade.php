@extends('layouts.master')

@section('title') Dashboard @endsection


@section('content')

@section('css')

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


        <div class="col-lg-3 col-md-3">
            <div>

                @component('common-components.index-widget')
                    @slot('title') Total User @endslot
                    @slot('price') {{ $totalUser }} @endslot
                    @slot('icon') bx bxs-user font-size-24 @endslot
                @endcomponent

            </div>

        </div>

        <div class="col-lg-3 col-md-3">
            <div>

                @component('common-components.index-widget')
                    @slot('title') Active User @endslot
                    @slot('price') {{ $activeUser }} @endslot
                    @slot('icon') bx bx-archive-in font-size-24 @endslot
                @endcomponent

            </div>

        </div>

        <div class="col-lg-3 col-md-3">
            <div>

                @component('common-components.index-widget')
                    @slot('title') Inactive User @endslot
                    @slot('price') {{ $inActiveUser }} @endslot
                    @slot('icon') bx bx-purchase-tag-alt font-size-24 @endslot
                @endcomponent

            </div>

        </div>

        <div class="col-lg-3 col-md-3">
            <div>
                @component('common-components.index-widget')
                    @slot('title') Restricted User @endslot
                    @slot('price') {{ $deletedUser }} @endslot
                    @slot('icon') bx bx-purchase-tag-alt font-size-24 @endslot
                @endcomponent

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div>
                @component('common-components.index-widget')
                    @slot('title') Total Category @endslot
                    @slot('price') {{ $categoryCount }} @endslot
                    @slot('icon') bx bx-purchase-tag-alt font-size-24 @endslot
                @endcomponent

            </div>

        </div>
        @foreach ($totalCategory as $totalcategory)
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">

                            <div class="media-body">
                                <p class="text-muted font-weight-medium">
                                <h5>{{ $totalcategory->name }}<h5>
                                        </p>
                                        <h4 class="mb-0">{{ $totalcategory->categories->count() }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center"
                                style="flex-grow: unset;">
                                <span class="avatar-title">
                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card bg-gray-bg text-white-50 m-0 mainhedformaster">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="card-body newheadcontanty">
                            <h5 class="m-0 textforhedermaster">Forum</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-gray-bg text-white-50 m-0 mainhedformaster">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="card-body newheadcontanty">
                            <h5 class="m-0 textforhedermaster">Testimonial</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ Forum table ------>
    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive custom_tabal_saction_part ">
                        <div class="tableAction">
                            <input type="button" id="approveStatusButton" value="Approve"/>
                        </div>
                        <table id="ForumList" class="table tableneww">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>Description</th>
                                    <th>URL</th>
                                    <th>User</th>
                                    <th>Approve Status</th>

                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!----- Testimonial table ----->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive custom_tabal_saction_part">
                
                        <table id="testmonialList" class="table tableneww">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Media</th>
                                </tr>
                            </thead>


                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------- Testimonial End ----------------->

    <div class="row">
        <div class="col-md-6">
            <div class="card bg-gray-bg text-white-50 m-0 mainhedformaster">
                <div class="row">

                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="card-body newheadcontanty">
                            <h5 class="m-0 textforhedermaster">Advertisment</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------- Advertisment Table-------->

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive custom_tabal_saction_part">
                        <div class="tableAction">
                            <input type="button" id="Advertismentapprove" value="Approve"/>
                        </div>
                        <table id="AdvertismentList" class="table tableneww">
                            <thead class="thead-light">
                                <tr>
                                    {{-- <th></th> --}}
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>URL</th>
                                    <th>Approve Status</th>
                                    <th>Media</th>

                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')


    <script>
        //forum datatable start here

        var dt = "";
        var table_html = "";
        var table_html_td = "";
        var i = 1;
        $(function() {
            jQuery.extend(jQuery.fn.dataTableExt.oSort, {
                "dom-date-pre": function(a) {
                    return moment(a, "DD MMMM YYYY");
                },
                "dom-date-asc": function(a, b) {
                    return a < b ? -1 : a > b ? 1 : 0;
                },
                "dom-date-desc": function(a, b) {
                    return a < b ? 1 : a > b ? -1 : 0;
                },
            });
            dataTableAjaxCall();
        });

        function dataTableAjaxCall() {
            dt = $("#ForumList").DataTable({
                destroy: true,
                processing: true,
                //serverSide: true,
                responsive: true,
                autoWidth: false,
                order: [], //Initial no order.
                aaSorting: [],
                rowReorder: true,
                ajax: {
                    url: "{{ route('datatable.dashboardForumlist') }}",
                },

                columns: [{
                    "data": null,
                    defaultContent: ''
                },
                    {
                        data: 'id',
                        name: 'sequence',
                        orderable: false,
                        searchable: false,
                        targets: 0,
                        visible: true
                    },
                   /* {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        targets: 1
                    },*/
                    {
                        data: 'question_td',
                        name: 'question_td',
                        searchable: false,
                    },
                    {
                        data: 'description',
                        name: 'description',
                    },
                    {
                        data: 'url',
                        name: 'url',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'user_id',
                        name: 'user_id',
                        orderable: false,
                        searchable: false,
                    },
                    {
                    data: 'is_approve',
                    name: 'is_approve',
                    orderable: false,
                    searchable: false,
                },
                ],
                "columnDefs": [{
                "targets": 0,
                "data": "id",
                "title": "<input type='checkbox' name='select_all' value='1' id='selectAllForumCheckboxes'>",
                "visible": true,
                "width": "5%", //https://datatables.net/reference/option/columns.width
                "searchable": false,
                "orderable": false,
                "orderData": "",
                "className": "",
                "render": function(data, type, full, meta) {
                    return '<input type="checkbox" id="id_' + data.id +
                        '" name="id[]" value="' + data.id + '">';
                }
            }, ],
            retrieve: true
        });
        $('table [type="checkbox"]').each(function(i, chk) {
            //alert(1);
            if (chk.checked) {
                alert("Checked!", i, chk);
            } else {
                $("#approveStatusButton").attr("disabled", "disabled");
            }
        });
        var data = "";
        $("#ForumList tbody").on("click", "tr", function() {
            var allCheckboxLength = $('input[name="id[]"]').length;
            var checkedCheckboxLen = $('input[name="id[]"]:checked').length;

            if (allCheckboxLength == checkedCheckboxLen) {
                $("#selectAllForumCheckboxes").prop("checked", true);
            } else {
                $("#selectAllForumCheckboxes").prop("checked", false);
            }
            $("#ForumList tbody tr").removeClass("selected");
            /*get checked checkbox value and check full row from table*/
            $('input[name="id[]"]:checked').map(function() {
                var checkedCheckBoxVal = $(this).val();
                // alert("aa >> "+checkedCheckBoxVal);
                $("#ForumList tbody #row_" + checkedCheckBoxVal).addClass("selected");
                //console.log();
                data = checkedCheckBoxVal;
            });

            /* Code for edit button(action) enable/disable */
            var checkedRecordCount = $("#ForumList .selected").length;
            // alert(" individual checkedRecordCount >> "+checkedRecordCount);

            if (checkedRecordCount > 0) {
                $("#approveStatusButton").removeAttr("disabled");
            }
            if (checkedRecordCount == 0) {
                $("#approveStatusButton").attr("disabled", "disabled");
            } //end here
        });
        // Handle click on "Select all" control
        $("#selectAllForumCheckboxes").on("click", function() {
            if ($("#selectAllForumCheckboxes").prop("checked")) {
                // alert("In side if");
                $('#ForumList input[type="checkbox"]').prop("checked", true);
            } else {
                $('#ForumList input[type="checkbox"]').prop("checked", false);
            }
            $("#ForumList tbody tr").removeClass("selected");
            $('input[name="id[]"]:checked').map(function() {
                var checkedCheckBoxVal = $(this).val();
                // alert("checkedCheckBoxVal :: "+checkedCheckBoxVal);
                $("#ForumList tbody #row_" + checkedCheckBoxVal).addClass("selected");
            });

            /* Code for edit button(action) enable/disable */
            var checkedRecordCount = $("#ForumList .selected").length;
            // alert(" individual checkedRecordCount >> "+checkedRecordCount);

            if (checkedRecordCount > 0) {
                $("#approveStatusButton").removeAttr("disabled");
            }
            if (checkedRecordCount == 0) {
                $("#approveStatusButton").attr("disabled", "disabled");
            } //end here
        });

            // $("#ForumList_filter").hide();
            $(".dataTables_length").hide();
            $("#ForumList_paginate").hide();

            $(".dataTables_filter input").attr("type", "text");
            dt.on("row-reordered", function(e, diff,
                edit) {
                dt.order([0, "asc"]);
            });

            dt.on("order.dt search.dt", function() {
                dt.column(1, {
                        search: "applied",
                        order: "applied",
                    })
                    .nodes()
                    .each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
            });

            dt.on("row-reorder", function(e, details, edit) {
                dt.column(1)
                    .nodes()
                    .each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
            });
        }

        $("#approveStatusButton").click(function() {
        var multipleId = getListForumIdList();
        var reomveId = multipleId;
        alert(reomveId);
        swal({
                title: "Are you sure?",
                text: "Approve Record",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, Approve it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = "/admin/dashboard/forum/approve/" + reomveId;
                }
            }
        );
    });

    function getListForumIdList() {
        var tableDataLength = dt.rows(".selected").data().length;
        //alert("tableDataLength >> "+tableDataLength);
        var listId = "";
        for (var i = 0; i < tableDataLength; i++) {
            var id = dt.rows(".selected").data()[i]["id"];
            if (listId == "") listId += id;
            else listId += "," + id;
        } // for loop ends here
        // alert("listId >> "+listId);
        return listId;
    }



    </script>
@endsection
