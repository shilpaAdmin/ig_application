@extends('layouts.master')

@section('title') Advertisment @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Advertisment List @endslot
@slot('li_1') <a href="{{route('category')}}" class=''>Advertisment</a> @endslot
@slot('li_2') List @endslot

@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive custom_tabal_saction_part">
                    <h4 class="card-title" style="text-align:right;"><a href="{{route('advertisement.create')}}"
                            class="btn btn-primary waves-effect btn-label waves-light"><i
                                class="bx bx-plus label-icon"></i>ADD
                                Advertisment </a></h4>
                            <table id="AdvertismentList" class="table">
                        <thead class="thead-light">
                            <tr>

                                <th>#</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Continously</th>
                                <th>Date</th>
                                <th>URL</th>
                                <th>Media</th>
                                <th>type</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>

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

    var dt = $('#AdvertismentList').DataTable({
        destroy: true,
        processing: true,
        //serverSide: true,
        responsive: true,
        autoWidth: false,
        "order": [], //Initial no order.
        "aaSorting": [],
        rowReorder: true,
        ajax: {
            url: "{{ route('datatable.advertisementList') }}",
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
            },
            {
                data: 'user_id',
                name: 'user_id',
                orderable:true
            },
            {
                data: 'category_id',
                name: 'category_id',
                searchable: true,
                orderable:false
            },
            {
                data: 'description',
                name: 'description',
                orderable:false
            },
            {
                data: 'continously',
                name: 'continously',
                searchable: false,
                orderable:false
            },
            {
                data: 'start_date',
                name: 'start_date',
                searchable: false,
                orderable:false
            },
            {
                data: 'url',
                name: 'url',
                searchable: false,
                orderable:false
            },
            {
                data: 'image_src',
                name: 'image_src',
                searchable: false,
                orderable:false
            },
            {
                data: 'type',
                name: 'type',
                searchable: false,
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


function deleteAdvertisment(id)
{
    swal({
        title: "Are you sure?",
        text: "Delete Question Bank",
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
            window.location.href = "/setting/advertisement/delete/" + id;

        } else {
                swal("Cancelled", "Don't worry your data is safe :)", "error");
        }
    });
}
</script>

@endsection
