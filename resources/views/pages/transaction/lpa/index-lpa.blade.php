@extends('layouts.app')

@section('page-title')
<div class="mr-auto">
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - LPA List</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div>
    @can('create')
    <a href="{{ route ('transaction.lpa.create') }}" class="btn btn-lg btn-primary"><i class="icon-plus-circle2 mr-2"></i>Add</a>
    @endcan
</div>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.lpa.index') }}" class="breadcrumb-item">LPA</a>
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">LPA List</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table datatable-select-checkbox" id="role-table">
        <thead>
            <tr>
                <th></th>
                <th>No LPA</th>
                <th>Tanggal</th>
                <th>Type</th>
                <th>No SP</th>
                <th>Customer</th>
                <th>Kavling</th>
                <th>Active</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@push('scripts')
<script>
var DatatableSelect = function() {
    var _componentDatatableSelect = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: 100,
            }],
            dom: '<"datatable-header"flB><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                searchPlaceholder: 'Type to Search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        $('#role-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('transaction.lpa.data') !!}',
            columns: [
                {
                    data: 'id',
                    className: 'select-checkbox',
                    orderable: false,
                    render: () => ''
                },
                {
                    data: 'id',
                    render: (data, type, row) => `<a href="/transaction/lpa/${row.id}/edit">KRF000${row.id}</a>`                    
                },
                {
                    data: 'lpa_date',
                    render: (data) => moment(data).format('D MMMM YYYY')
                },
                {
                    data: 'lpa_type'
                },
                {
                    data: 'lpa_sp_id'
                },
                {
                    data: 'surat.customer.customer_name'
                },
                {
                    data: 'surat.kavling.kavling_cluster'
                },
                {
                    data: 'active',
                    className: 'text-center',
                    render: (active) => active === 'Active' ? '<span class="badge badge-primary">Active</span>' : '<span class="badge badge-danger">Deactive</span>'
                },
            ],
            select: {
                style: 'multi'
            },
            buttons: [
                {
                    extend: 'collection',
                    text: 'Select Action',
                    className: 'btn __active',
                    buttons: [
                        {
                            text: 'Deactive',
                            className: '_active',
                            action: (e, dt, type, indexes) => {
                                const data = dt.rows({selected: true}).data();
                                data.each((e) => {
                                    const id = e.id;
                                    $.ajax({
                                        url: `/transaction/lpa/${id}/action`,
                                        type: 'PATCH',
                                        data: {
                                            id: id,
                                            active: 'Deactive'
                                        },
                                        success: (response) => {
                                            swal({
                                                type: 'success',
                                                text: 'Success'
                                            }).then(() => {
                                                window.location.reload();
                                            });
                                            console.log(response)
                                        },
                                        error: (err) => {
                                            swal({
                                                type: 'error',
                                                text: 'Error'
                                            })
                                        }
                                    })
                                })
                            }
                        },
                        {
                            text: 'Active',
                            className: '_active',
                            action: (e, dt, type, indexes) => {
                                const data = dt.rows({selected: true}).data();
                                data.each((e) => {
                                    const id = e.id;
                                    $.ajax({
                                        url: `/transaction/lpa/${id}/action`,
                                        type: 'PATCH',
                                        data: {
                                            id: id,
                                            active: 'Active'
                                        },
                                        success: (response) => {
                                            swal({
                                                type: 'success',
                                                text: 'Success'
                                            }).then(() => {
                                                window.location.reload();
                                            });
                                            console.log(response)
                                        },
                                        error: (err) => {
                                            swal({
                                                type: 'error',
                                                text: 'Error'
                                            })
                                        }
                                    })
                                })
                            }
                        }
                    ]
                }
            ]
        });
        
    };

    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };

    return {
        init: function() {
            _componentDatatableSelect();
            _componentSelect2();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
DatatableSelect.init();
});
</script>
    
@endpush