@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Price</span> - Price List</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('price.index') }}" class="breadcrumb-item">Price</a>
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Price List</h5>
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
                <th>Kode</th>
                <th>Tipe Rumah</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Harga Jual</th>
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
            dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        $('#role-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('price.data') !!}',
            columns: [
                {data: 'id'},
                {data: 'house.rumah_type_name'},
                {data: 'price_start_date'},
                {data: 'price_end_date'},
                {data: 'price_selling'},
                {data: 'active'},
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