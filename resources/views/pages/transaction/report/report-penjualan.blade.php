@extends('layouts.app') 
@section('page-title')
<div class="mr-auto">
  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Report</span> - Report Penjualan</h4>
  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
@endsection
 
@section('breadcrumb')
<a href="#" class="breadcrumb-item">Report</a>
<a href="{{ route('transaction.report.penjualan') }}" class="breadcrumb-item">Penjualan</a>
@endsection
 
@section('content')
@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Report Penjualan</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table datatable-select-checkbox table-bordered" id="role-table">
      <thead>
        <tr>
          <th>NO</th>
          <th>No SP</th>
          <th>TGL SP</th>
          <th>NAMA KONSUMEN</th>
          <th>BLOK</th>
          <th>NO RUMAH</th>
          <th>TIPE</th>
          <th>HARGA JUAL</th>
          <th>PPN</th>
          <th>TOTAL HARGA JUAL</th>
          <th>KPR DIMOHON</th>
          <th>UANG MUKA</th>
          <th>TL(M2)</th>
          <th>PENINGKATAN MUTU</th>
          <th>BIAYA STRATEGIS</th>
          <th>TOTAL</th>
          <th>PERUSAHAAN</th>
          <th>NO HP KONSUMEN</th>
          <th>SALES</th>
        </tr>
      </thead>
    </table>
  </div>
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
            order: [[1, 'desc']],
            processing: true,
            serverSide: true,
            ajax: '{!! route('transaction.report.load_penjualan') !!}',
            columns: [
                {
                    data: 'id',
                },
                {
                    data: 'id'
                },
                {
                    data: 'sp_date',
                    render: (data) => moment(data).format('D MMMM YYYY')
                },
                {
                    data: 'customer.customer_name',
                    render: (data, type, row) => moment(row.sp_date).format('D MMMM YYYY')
                },
                {
                    data: 'kavling.kavling_block'
                },
                {
                    data: 'kavling.kavling_number'
                },
                {
                    data: 'kavling.kavling_cluster'
                },
                {
                    data: 'sp_price',
                    render: (data) => $.number(data)
                },
                {
                    data: 'sp_ppn',
                    render: (data) => $.number(data)
                },
                {
                    data: 'sp_total_harga_jual',
                    render: (data) => $.number(data)
                },
                {
                    data: 'sp_kpr_plan',
                    render: (data) => $.number(data)
                },
                {
                    data: 'sp_dp',
                    render: (data) => $.number(data)
                },
                {
                    data: 'sp_tl',
                    render: (data) => $.number(data)
                },
                {
                    data: 'sp_tl',
                    render: (data) => $.number(data)
                },
                {
                    data: 'sp_tl',
                    render: (data) => $.number(data)
                },
                {
                    data: 'sp_tl',
                    render: (data) => $.number(data)
                },
                {
                    data: 'company.company_name'
                },
                {
                    data: 'customer.customer_mobile_number'
                },
                {
                    data: 'sales.sales_name'
                }
            ],
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