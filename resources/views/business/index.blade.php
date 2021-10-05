@extends('layouts.master')

@section('title') Business @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('title') Business List @endslot
@slot('li_1') <a href="{{route('business')}}" class=''>Business</a> @endslot
@slot('li_2') List @endslot

@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive custom_tabal_saction_part">
                    <h4 class="card-title" style="text-align:right;"><a href="{{route('business.create')}}"
                            class="btn btn-primary waves-effect btn-label waves-light"><i
                                class="bx bx-plus label-icon"></i>ADD
                            Business </a></h4>
                            <table id="BusinessList" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Sequence</th>
                                <th>#</th>
                                <!--
                                <th>Type</th>
                                <th>Category</th>-->
                                <th>Name</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>About</th>
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

    var dt = $('#BusinessList').DataTable({
        destroy: true,
        processing: true,
        //serverSide: true,
        responsive: true,
        autoWidth: false,
        "order": [], //Initial no order.
        "aaSorting": [],
        rowReorder: true,
        ajax: {
            url: "{{ route('datatable.businessList') }}",
        },

        columns: [
            { 
                data: 'id',
                name: 'sequence',
                orderable:false,
                searchable: false,
                targets: 0,
                visible: false
            }
            /*{
                data: 'id',
                name: 'id'
            }*/,
            {
                data: 'id',
                name: 'id',
                orderable:false,
                searchable: false,
                targets: 1
            },
            {
                data: 'name_td',
                name: 'name_td',
                orderable: false,
            },
            {
                data:'category_td',
                name:'category_td',
                searchable: false,
                orderable:false
            },
            {
                data: 'type_td',
                name: 'type_td'
            },
            {
                data: 'about',
                name: 'about',
            },
            /*{
                data: 'address',
                name: 'address',
            },
            {
                data: 'description',
                name: 'description',
            },
            {
                data: 'sub_descrition',
                name: 'sub_descrition',
            },
            {
                data: 'sub_description_1',
                name: 'sub_description_1',
            },*/
            {
                data: 'status_td',
                name: 'status_td'
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
</script>

@endsection
