@extends('layouts.app') 
@section('page-title')
<div class="mr-auto">
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Company</span> - Company List</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div>
    <a href="{{ route ('company.create') }}" class="btn btn-lg btn-primary"><i class="icon-plus-circle2 mr-2"></i>Add</a>
</div>
@endsection
 
@section('breadcrumb')
<a href="{{ route('company.index') }}" class="breadcrumb-item">Company</a>
@endsection
 
@section('content') @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Company</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table datatable-select-checkbox table-bordered" id="role-table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Company Name</th>
                <th>Provinsi</th>
                <th>Type</th>
                <th>Active</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
 @push('scripts')
<script>
    const DatatableSelect = function() {
    const _componentDatatableSelect = function() {
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
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            },
        });

        $('#role-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('company.data') }}',
            columns: [
                {
                    data: 'id', 
                    className: 'select-checkbox',
                    orderable: false,
                    render: () => '',
                    width: '10px'
                },
                {
                    data: 'id', 
                    width: '100px',
                    render: (id) => `P000${id}`
                },
                {
                    data: 'company_name',
                    width: '100px',
                    render: (data, type, row) => `<a href="/company/${row.id}/edit">${row.company_name}</a>`
                },
                {
                    data: 'company_province',
                    width: '100px',
                },
                {
                    data: 'company_type',
                    width: '100px'
                },
                {
                    data: 'active',
                    width: '50px',
                    className: 'text-center',
                    render: (active) => active === 'Active' ? '<span class="badge badge-primary">Active</span>' : '<span class="badge badge-danger">Deactive</span>'
                }
            ],
            select: {
                style: 'os',
            },
            buttons: [
                {
                    extend: 'collection',
                    text: 'Select Action',
                    className: 'btn',
                    buttons: [
                        {
                            text: 'Deactive',
                            className: '_active',
                            action: (e, dt, type, indexes) => {
                                const { id } = dt.row({selected: true}).data();
                                $.ajax({
                                    url: `/company/${id}/action`,
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
                            }
                        },
                        {
                            text: 'Active',
                            className: '_active',
                            action: (e, dt, type, indexes) => {
                                const { id } = dt.row({selected: true}).data();
                                $.ajax({
                                    url: `/company/${id}/action`,
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
                            }
                        }
                    ]
                }
            ]
        });

        // asd.on('select.dt', function(e, dt, type, indexes){
        //     console.log( dt.row({selected: true}).data() )
        // })
    };

    const _edit = function(){
        $('._active').click(function(e){
            console.log(e)
        })
    }

    const _componentSelect2 = function() {
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
            _edit();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
DatatableSelect.init();
});

</script>






@endpush