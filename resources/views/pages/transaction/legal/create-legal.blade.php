@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - {{isset($legal) ? 'Edit Legal' : 'Create New Legal'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.legal.index') }}" class="breadcrumb-item">Legal</a>
<a href="{{ route('transaction.legal.create') }}" class="breadcrumb-item">{{isset($legal) ? 'Edit Legal' : 'Create New Legal'}}</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{isset($legal) ? 'Edit Legal' : 'Create New Legal'}}</h5>
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
    @endif

    @if (isset($legal))
      <form action="{{ route('transaction.legal.update') }}" class="form-validate-jquery" method="POST">
        <input type="hidden" name="id" value="{{$legal->id}}">
        @method('PATCH')
    @else
      <form action="{{ route('transaction.legal.store') }}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Permohonan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="PLK000{{isset($legal) ? $legal->id : $id}}" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Permohonan</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="legal_date" value="{{isset($legal) ? $legal->legal_date->toDateString() : ''}}" required>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHGB Induk</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="legal_shgb_parent" value="{{isset($legal) ? $legal->legal_shgb_parent : ''}}" required>
                  </div>
                  <label class="col-form-label">Tanggal</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_shgb_parent_date" value="{{isset($legal) ? $legal->legal_shgb_parent_date->toDateString() : ''}}" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHGB Pecahan</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="legal_shgb_fraction" value="{{isset($legal) ? $legal->legal_shgb_fraction : ''}}" required>
                  </div>
                  <label class="col-form-label">Tanggal</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_shgb_fraction_date" value="{{isset($legal) ? $legal->legal_shgb_fraction_date->toDateString() : ''}}" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Balik Nama</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="legal_name" value="{{isset($legal) ? $legal->legal_name: ''}}" required>
                  </div>
                  <label class="col-form-label">Tanggal</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_name_date" value="{{isset($legal) ? $legal->legal_name_date->toDateString() : ''}}" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHM</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="legal_shm" value="{{isset($legal) ? $legal->legal_shm : ''}}" required>
                  </div>
                  <label class="col-form-label">Tanggal</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_shm_date" value="{{isset($legal) ? $legal->legal_shm_date->toDateString() : ''}}" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No IMB</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="legal_imb" value="{{isset($legal) ? $legal->legal_imb : ''}}" required>
                  </div>
                  <label class="col-form-label">Tanggal</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_imb_date" value="{{isset($legal) ? $legal->legal_imb_date->toDateString() : ''}}" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NOP PBB</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="legal_nop_pbb" value="{{isset($legal) ? $legal->legal_nop_pbb : ''}}" required>
                  </div>
                  <label class="col-form-label">Tanggal</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_nop_pbb_date" value="{{isset($legal) ? $legal->legal_nop_pbb_date->toDateString() : ''}}" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="active" checked>
                </div>
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Sp</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="legal_sp_id" id="sp_id">
                  @if (isset($legal))
                    <option value="{{$legal->surat->id}}">SP000{{$legal->surat->id}}</option>
                    @foreach ($surat_edit as $surat)
                      @if ($surat->id == $legal->surat->id)
                        <option></option>
                      @else
                        <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($sps as $surat)
                      <option value=""></option>
                      <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_company" value="{{isset($legal) ? $legal->surat->company->company_name : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_sales" name="sp_sales" value="{{isset($legal) ? $legal->surat->sales->sales_name : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kavling" name="sp_kavling" value="{{isset($legal) ? $legal->surat->sp_house_cluster : ''}}" readonly required>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function(){
  $('#sp_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.legal.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_company').val(result.company.company_name);
      $('#sp_sales').val(result.sales.sales_name);
      $('#sp_kavling').val(result.sp_house_cluster);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });
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
</script>
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush