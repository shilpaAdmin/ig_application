@extends('layouts.master')

@section('title') Tags Forum @endsection

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
                            <h5 class="m-0 textforhedermaster">Tags Forum</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">

                    <div class="card-body newheadcontanty">
                    <h4 class="card-title addfourm" style="text-align:right;"><a href="{{ route('tagsforum.create') }}"
                                class="btn addbtnforall  waves-effect btn-label waves-light"><i
                                    class="bx bx-plus label-icon"></i>ADD&nbsp;Tags&nbsp;Forum </a></h4>
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
                    

                        <div class="tableAction">
                            <input type="button" id="approveStatusButton" value="Approve">
                        </div>
                        <table id="TagforumList" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    {{-- <th>Id</th> --}}
                                    <th>Name</th>
                                    <th>Approve Status</th>
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
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
    <script>
        var dt = '';
        $(function() {
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

            dt = $('#TagforumList').DataTable({
                destroy: true,
                processing: true,
                //serverSide: true,
                responsive: true,
                autoWidth: false,
                "order": [], //Initial no order.
                "aaSorting": [],
                rowReorder: true,
                ajax: {
                    url: "{{ route('datatable.tagsforumList') }}",
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
                    /*{
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        targets: 1
                    },*/
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'is_approve',
                        name: 'is_approve',
                        orderable: false,
                        searchable: false,
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
                        orderable: false
                    }
                ],
                "columnDefs": [{
                    "targets": 0,
                    "data": "id",
                    "title": "<input type='checkbox' name='select_all' value='1' id='selectAllCheckboxes'>",
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
            var data = '';
            $('#TagforumList tbody').on('click', 'tr', function() {
                var allCheckboxLength = $('input[name="id[]"]').length;
                var checkedCheckboxLen = $('input[name="id[]"]:checked').length;

                if (allCheckboxLength == checkedCheckboxLen) {
                    $('#selectAllCheckboxes').prop('checked', true);
                } else {
                    $('#selectAllCheckboxes').prop('checked', false);
                }
                $('#TagforumList tbody tr').removeClass('selected');
                /*get checked checkbox value and check full row from table*/
                $('input[name="id[]"]:checked').map(function() {
                    var checkedCheckBoxVal = $(this).val();
                    // alert("aa >> "+checkedCheckBoxVal);
                    $('#TagforumList tbody #row_' + checkedCheckBoxVal).addClass('selected');
                    //console.log();
                    data = checkedCheckBoxVal;
                });

                /* Code for edit button(action) enable/disable */
                var checkedRecordCount = $('#TagforumList .selected').length;
                // alert(" individual checkedRecordCount >> "+checkedRecordCount);

                if (checkedRecordCount > 0) {
                    $("#approveStatusButton").removeAttr("disabled");
                }
                if (checkedRecordCount == 0) {
                    $("#approveStatusButton").attr("disabled", "disabled");
                } //end here
            });
            // Handle click on "Select all" control
            $('#selectAllCheckboxes').on('click', function() {
                if ($('#selectAllCheckboxes').prop('checked')) {
                    // alert("In side if");
                    $('#TagforumList input[type="checkbox"]').prop('checked', true);
                } else {

                    $('#TagforumList input[type="checkbox"]').prop('checked', false);
                }
                $('#TagforumList tbody tr').removeClass('selected');
                $('input[name="id[]"]:checked').map(function() {
                    var checkedCheckBoxVal = $(this).val();
                    // alert("checkedCheckBoxVal :: "+checkedCheckBoxVal);
                    $('#TagforumList tbody #row_' + checkedCheckBoxVal).addClass('selected');
                });

                /* Code for edit button(action) enable/disable */
                var checkedRecordCount = $('#TagforumList .selected').length;
                // alert(" individual checkedRecordCount >> "+checkedRecordCount);

                if (checkedRecordCount > 0) {
                    $("#approveStatusButton").removeAttr("disabled");
                }
                if (checkedRecordCount == 0) {
                    $("#approveStatusButton").attr("disabled", "disabled");
                } //end here
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

        });

        $('#approveStatusButton').click(function() {


            var multipleId = getListIdList();
            var reomveId = multipleId;
            // alert('inisde');
            swal({
                    title: "Are you sure?",
                    text: "Approve Record",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Approve it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = "/admin/tagsforum/approve/" + reomveId;
                    }
                });
        });


        function getListIdList() {
            var tableDataLength = dt.rows('.selected').data().length;
            //alert("tableDataLength >> "+tableDataLength);
            var listId = "";
            for (var i = 0; i < tableDataLength; i++) {
                var id = dt.rows('.selected').data()[i]['id'];
                if (listId == "")
                    listId += id;
                else
                    listId += "," + id;
            } // for loop ends here
            // alert("listId >> "+listId);
            return listId;
        }
    </script>

@endsection
