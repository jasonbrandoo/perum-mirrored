@extends('layouts.app') 
@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Sales</span> - {{ isset($sales) ? 'Update Sales'
  : 'Create New Sales' }}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection
 
@section('breadcrumb')
<a href="{{ route('sales.index') }}" class="breadcrumb-item">Sales</a>
<a href="#" class="breadcrumb-item">{{ isset($sales) ? 'Update Sales' : 'New Sales' }}</a>
@endsection
 
@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{ isset($sales) ? 'Update Sales' : 'Create New Sales' }}</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif @if (isset($sales))
    <form action="{{ route('sales.update') }}" class="form-validate-jquery" method="POST">
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $sales->id }}"> @else
      <form action="{{ route('sales.store') }}" class="form-validate-jquery" method="POST">
        @endif @csrf
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Sales ID</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" value="S000{{ isset($sales) ? $sales->id : $id }}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Sales</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sales_name" value="{{ isset($sales) ? $sales->sales_name : '' }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Hp</label>
                <div class="col-lg-9">
                  <input type="number" class="form-control" name="sales_mobile_number" value="{{ isset($sales) ? $sales->sales_mobile_number : '' }}"
                    required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Telp</label>
                <div class="col-lg-9">
                  <input type="number" class="form-control" name="sales_number" value="{{ isset($sales) ? $sales->sales_number : '' }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No KTP</label>
                <div class="col-lg-9">
                  <input type="number" class="form-control" name="sales_no_ktp" value="{{ isset($sales) ? $sales->sales_no_ktp : '' }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Alamat</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sales_address" value="{{ isset($sales) ? $sales->sales_address : '' }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kota</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sales_city" value="{{ isset($sales) ? $sales->sales_city : '' }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Provinsi</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sales_province" value="{{ isset($sales) ? $sales->sales_province : '' }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kode Pos</label>
                <div class="col-lg-9">
                  <input type="number" class="form-control" name="sales_zipcode" value="{{ isset($sales) ? $sales->sales_zipcode : '' }}" required>
                </div>
              </div>
            </fieldset>
          </div>
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jabatan</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sales_position" required>
                  @if (isset($sales))
                    @if ($sales->sales_position == 'Sales')
                      <option value="Sales">Sales</option>
                      <option value="Supervisor">Supervisor</option>
                    @endif
                    @if ($sales->sales_position == 'Supervisor')
                      <option value="Supervisor">Supervisor</option>
                      <option value="Sales">Sales</option>
                    @endif
                  @else
                    <option></option>
                    <option value="Sales">Sales</option>
                    <option value="Supervisor">Supervisor</option>
                  @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Active</label>
                <div class="col-lg-9">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="active" value="active" checked>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tidak Komisi</label>
                <div class="col-lg-9">
                  <div class="form-check">
                    @if (isset($sales)) @if ($sales->sales_komisi)
                    <input type="checkbox" class="form-check-input" name="sales_komisi" value="no commmision" checked> @endif
                    @else
                    <input type="checkbox" class="form-check-input" name="sales_komisi" value="no commmision"> @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Target / Bulan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sales_target" value="{{ isset($sales) ? $sales->sales_target : '' }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Void</label>
                <div class="col-lg-9">
                  <div class="form-check">
                    @if (isset($sales)) @if ($sales->sales_void)
                    <input type="checkbox" class="form-check-input" name="sales_void" checked> @endif @else
                    <input type="checkbox" class="form-check-input" name="sales_void"> @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Supervisor</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sales_spv">
                  @if (isset($sales))
                    @if (isset($sales->spv->sales_name))
                      <option value="{{$sales->spv->id}}">{{$sales->spv->sales_name}}</option>
                      @foreach ($supervisor_edit as $spv)
                        @if ($spv->id == $sales->spv->id)
                          <option></option>
                        @else
                          <option value="{{$spv->id}}">{{$spv->sales_name}}</option>
                        @endif
                      @endforeach
                    @else
                      <option value=""></option>
                    @endif
                  @else
                    @foreach ($supervisor as $sp)
                      <option value=""></option>
                      <option value="{{ $sp->id }}">{{$sp->sales_name}}</option>
                    @endforeach
                  @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal Masuk</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="sales_in" value="{{ isset($sales) ? $sales->sales_in->toDateString() : '' }}"
                      required>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal Keluar</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="sales_out" value="{{ isset($sales) ? $sales->sales_out->toDateString() : '' }}">
                  </div>
                </div>
              </div>
              <button class="btn btn-secondary" id="addTarget">Add Target</button>
              <div class="form-group row" id="periodeTarget">
                <label class="col-lg-3 col-form-label">Bulan</label>
                <div class="col-lg-3">
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="sales_out" value="{{ isset($sales) ? $sales->sales_out->toDateString() : '' }}">
                  </div>
                </div>
                <label class="col-form-label">Tahun</label>
                <div class="col-lg-4">
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="sales_out" value="{{ isset($sales) ? $sales->sales_out->toDateString() : '' }}">
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
  </div>
</div>
<hr> @if (isset($sales))
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Surat Pesanan</h5>
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
          <th></th>
          <th>No</th>
          <th>Kode Pre Book</th>
          <th>Tgl Surat Pesanan</th>
          <th>Customer</th>
          <th>Kavling</th>
          <th>Active</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endif
@endsection
 @push('scripts')
<script>
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

var FormValidation = function() {
  var _componentValidation = function() {
      if (!$().validate) {
          console.warn('Warning - validate.min.js is not loaded.');
          return;
      }

      // Initialize
      var validator = $('.form-validate-jquery').validate({
          ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
          errorClass: 'validation-invalid-label',
          successClass: 'validation-valid-label',
          validClass: 'validation-valid-label',
          highlight: function(element, errorClass) {
              $(element).removeClass(errorClass);
          },
          unhighlight: function(element, errorClass) {
              $(element).removeClass(errorClass);
          },

          // Different components require proper error label placement
          errorPlacement: function(error, element) {

              // Unstyled checkboxes, radios
              if (element.parents().hasClass('form-check')) {
                  error.appendTo( element.parents('.form-check').parent() );
              }

              // Input with icons and Select2
              else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                  error.appendTo( element.parent() );
              }

              // Input group, styled file input
              else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                  error.appendTo( element.parent().parent() );
              }

              // Other elements
              else {
                  error.insertAfter(element);
              }
          }
      });

      // Reset form
      $('#reset').on('click', function() {
          validator.resetForm();
      });
  };

  return {
      init: function() {
          _componentValidation();
      }
  }
}();

document.addEventListener('DOMContentLoaded', function() {
  FormValidation.init();
});

if ('{{isset($sales)}}') {
  
}
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

        $('#role-table').DataTable({
            order: [[1, 'desc']],
            processing: true,
            serverSide: true,
            ajax: '{!! isset($sales) ? route('sales.surat', $sales->id) : "" !!}',
            columns: [
                {
                    data: 'id',
                    className: 'select-checkbox',
                    orderable: false,
                    render: () => ''
                },
                {
                    data: 'id',
                    render: (data, type, row) => `<a href="surat-pesanan/${row.id}/edit">SP000${row.id}</a>`
                },
                {
                    data: 'sp_prebook'
                },
                {
                    data: 'sp_date',
                    render: (data, type, row) => moment(row.sp_date).format('D MMMM YYYY')
                },
                {
                    data: 'customer.customer_name'
                },
                {
                    data: 'kavling.kavling_cluster'
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
                    className: 'btn',
                    buttons: [
                        {
                            text: 'Deactive',
                            className: '_active',
                            action: (e, dt, type, indexes) => {
                                const data = dt.rows({selected: true}).data();
                                data.each((e) => {
                                    const id = e.id;
                                    $.ajax({
                                        url: `surat-pesanan/${id}/action`,
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
                                        url: `surat-pesanan/${id}/action`,
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
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush