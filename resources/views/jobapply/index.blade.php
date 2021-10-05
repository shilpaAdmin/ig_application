@extends('layouts.master')

@section('title') Job Apply @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Job Apply List @endslot
@slot('li_1') Job Apply @endslot
@slot('li_2') List @endslot

@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive custom_tabal_saction_part">
                    <h4 class="card-title" style="text-align:right;"><a href="{{route('jobapply.create')}}"
                            class="btn btn-primary waves-effect btn-label waves-light"><i
                                class="bx bx-plus label-icon"></i>ADD Job Apply  </a></h4>
                            <table id="jobapplyList" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Skill</th>
                                <th>Subject</th>
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
<!-- Init js-->
<script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>
<script>
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

    var dt = $('#jobapplyList').DataTable({
        destroy: true,
        processing: true,
        //serverSide: true,
        responsive: true,
        autoWidth: false,
        "order": [], //Initial no order.
        "aaSorting": [],
        rowReorder: true,
        ajax: {
            url: "{{ route('datatable.jobapplyList') }}",
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
                searchable: false,
            },
            {
                data: 'email',
                name: 'email',
                orderable:false,
            },
            {
                data: 'skill',
                name: 'skill',
                orderable:false,
                searchable: false,
            },
            {
                data: 'subject',
                name: 'subject',
                orderable:false,
                searchable: false,
            },

            {
                data: 'status_td',
                name: 'status_td',
                orderable:false,
                searchable: false,
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

});

function deleteJobApply(id)
{
    swal({
        title: "Are you sure?",
        text: "Delete Job Apply",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Delete it!",
        cancelButtonText: "No, cancel please!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm)
    {
        if (isConfirm)
        {
            window.location.href = "/job-apply/delete/" + id;

        } else {
                swal("Cancelled", "Don't worry your data is safe :)", "error");
        }
    });
}
</script>

@endsection
