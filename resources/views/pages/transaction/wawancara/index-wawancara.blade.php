@extends('layouts.app') 
@section('page-title')
<div class="mr-auto">
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Wawancara List</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div>
    @can('create')
    <a href="{{ route ('transaction.wawancara.create') }}" class="btn btn-lg btn-primary"><i class="icon-plus-circle2 mr-2"></i>Add</a>
    @endcan
</div>
@endsection
 
@section('breadcrumb')
<a href="{{ route('transaction.wawancara.index') }}" class="breadcrumb-item">Wawancara</a>
@endsection
 
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Wawancara List</h5>
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
                <th>Plan No</th>
                <th>Tgl Plan</th>
                <th>No SP</th>
                <th>Customer</th>
                <th>Analyst</th>
                <th>Tgl Realisasi</th>
                <th>Status</th>
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
            dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                searchPlaceholder: 'Type to search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        $('#role-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('transaction.wawancara.data') !!}',
            columns: [
                {
                    data: 'id', className: 'select-checkbox', orderable: false, render: () => ''
                },
                {
                    data: 'id', render: (id) => `RW000${id}`,
                    render: (id) => `<a href="wawancara/${id}/edit">RW000${id}</a>`
                },
                {
                    data: 'wawancara_date',
                    render: (data) => moment(data).format('D MMMM YYYY')
                },
                {
                    data: 'wawancara_sp_id'
                },
                {
                    data: 'surat.customer.customer_name'
                },
                {
                    data: 'wawancara_analyst'
                },
                {
                    data: 'realisasi.rlw_date',
                    render: (data) => moment(data).format('D MMMM YYYY')
                },
                {
                    data: 'wawancara_status'
                },
            ],
            select: {
                style: 'multi'
            }
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