@extends('layouts.app') 
@section('page-title')
<div class="mr-auto">
  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Report</span> - Report Kavling Belum Terjual</h4>
  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
@endsection
 
@section('breadcrumb')
<a href="{{ route('transaction.report.kavling_unsold') }}" class="breadcrumb-item">Kavling Belum Terjual</a>
@endsection
 
@section('content')
@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Report Kavling Belum Terjual</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table datatable-select-checkbox table-bordered" id="penerimaan-table">
      <thead>
        <tr>
          <th>BLOK</th>
          <th>NO</th>
          <th>CLUSTER</th>
          <th>TIPE</th>
          <th>LB</th>
          <th>LT</th>
          <th>HARGA JUAL</th>
          <th>BGN</th>
          <th>STATUS</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<div id="__filter" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h6 class="modal-title">FILTER DATE</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="#" id="filter_form">
          @csrf
          <div class="form-group row justify-content-center">
            <div class="col-8">
                <label class="col-form-label">Start Date</label>
                <input type="text" class="form-control pickadate-selectors" name="start_date" placeholder="Start Date" required>
            </div>
          </div>
          <div class="form-group row justify-content-center mb-4">
            <div class="col-8">
              <label class="col-form-label">End Date</label>
                <input type="text" class="form-control pickadate-selectors" name="end_date" placeholder="End Date" required>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="button" id="submit_filter" class="btn bg-primary">Search</button>
      </div>
    </div>
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
          dom: '<"datatable-header"flB><"datatable-scroll-wrap"t><"datatable-footer"ip>',
          language: {
              search: '<span>Search:</span> _INPUT_',
              searchPlaceholder: 'Type to search...',
              lengthMenu: '<span>Show:</span> _MENU_',
              paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
          }
      });

      const table = $('#penerimaan-table').DataTable({
          order: [[0, 'desc']],
          processing: true,
          serverSide: true,
          ajax: {
              url: '{!! route('transaction.report.load_kavling_unsold') !!}',
              method: 'POST',
              data: (data) => {
                  data.start_date = $('input[name=start_date]').val();
                  data.end_date = $('input[name=end_date]').val();
              }
          },
          columns: [
              {
                  data: 'kavling_block'
              },
              {
                  data: 'kavling_number'
              },
              {
                  data: 'kavling_cluster'
              },
              {
                  data: 'house.rumah_type_name'
              },
              {
                  data: 'house.building_area_m2'
              },
              {
                  data: 'house.surface_area_m2'
              },
              {
                  data: 'price.price_selling',
                  render: (data) => $.number(data)
              },
              {
                  data: 'kavling_progress'
              },
              {
                  data: 'kavling_sell_status',
                  render: (data) => 'Belum Terjual'
              },
          ],
          buttons: [
              {
                  text: 'Export',
                  className: 'btn btn-success __import',
                  extend: 'excelHtml5'
              }
          ]
      });
      
      $('.__import').addClass('mr-3');
      $('.__filter').click(() => {
          $('#__filter').modal('show')
      })

      $('#submit_filter').click((e) => {
          e.preventDefault();
          $('#__filter').modal('hide');
          table.draw();
      })
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

var DateTimePickers = function() {
  var _componentPickadate = function() {
    if (!$().pickadate) {
      console.warn('Warning - picker.js and/or picker.date.js is not loaded.');
      return;
    }
    $('.pickadate-selectors').pickadate({
      selectYears: true,
      selectMonths: true
    });
  };

  return {
    init: function() {
      _componentPickadate();
    }
  }
}();

document.addEventListener('DOMContentLoaded', function() {
  DateTimePickers.init();
});

</script>


@endpush