@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - {{isset($lpa) ? 'Edit LPA' : 'Create New LPA'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.lpa.index') }}" class="breadcrumb-item">LPA</a>
<a href="{{ route('transaction.lpa.create') }}" class="breadcrumb-item">{{isset($lpa) ? 'Edit LPA' : 'Create New LPA'}}</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{isset($lpa) ? 'Edit LPA' : 'Create New LPA'}}</h5>
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

    @if (isset($lpa))
      <form action="{{ route('transaction.lpa.update') }}" class="form-validate-jquery" method="POST">
        <input type="hidden" name="id" value="{{$lpa->id}}">
        @method('PATCH')
    @else
      <form action="{{ route('transaction.lpa.store') }}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No LPA</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="LPA000{{isset($lpa) ? $lpa->id : $id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Lpa</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                <input type="text" class="form-control pickadate-selectors" name="lpa_date" value="{{isset($lpa) ? $lpa->lpa_date : ''}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Type</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="lpa_type" required>
                  @if (isset($lpa))
                    <option value="{{$lpa->lpa_type}}">{{$lpa->lpa_type}}</option>
                    <option value="Bangunan">Bangunan</option>
                    <option value="Listrik">Listrik</option>
                    <option value="Bestek">Bestek</option>
                  @else
                    <option></option>
                    <option value="bangunan">Bangunan</option>
                    <option value="listrik">Listrik</option>
                    <option value="bestek">Bestek</option>
                  @endif
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Kavling</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_id" value="{{isset($lpa) ? $lpa->surat->sp_house_cluster : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_building" name="kavling_building" value="{{isset($lpa) ? $lpa->surat->kavling->house->building_area_m2 : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_surface" name="kalving_surface" readonly value="{{isset($lpa) ? $lpa->surat->kavling->house->surface_area_m2 : ''}}" required readonly>
              </div>
            </div>
            {{-- <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanah Lebih</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_tanah_lebih">
              </div>
            </div> --}}
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor SHGB</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_shgb" name="kavling_shgb" value="{{isset($lpa) ? $lpa->surat->kavling->kavling_shgb : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tgl SHGB</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_shgb_date" name="kavling_shgb_date" value="{{isset($lpa) ? $lpa->surat->kavling->kavling_shgb_date : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor IMB</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_imb" name="kavling_imb" value="{{isset($lpa) ? $lpa->surat->kavling->kavling_imb : ''}}" required readonly>
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
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="lpa_sp_id" id="sp_id" required>
                  @if (isset($lpa))
                    <option value="{{$lpa->surat->id}}">SP000{{$lpa->surat->id}}</option>
                    @foreach ($surat_edit as $surat)
                      @if ($surat->id == $lpa->surat->id)
                        <option></option>
                      @else
                        <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($sps as $sp)
                      <option value=""></option>
                      <option value="{{$sp->id}}">SP000{{$sp->id}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Sp</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_date" name="sp_date" value="{{isset($lpa) ? $lpa->surat->sp_date : ''}}" required readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer ID</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer_id" name="sp_customer_id" value="{{isset($lpa) ? $lpa->surat->customer->id : ''}}" required readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer Name</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_customer_name" name="sp_customer_name" value="{{isset($lpa) ? $lpa->surat->customer->customer_name : ''}}" required readonly>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_company" name="sp_company" value="{{isset($lpa) ? $lpa->surat->company->company_name : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_sales" name="sp_sales" value="{{isset($lpa) ? $lpa->surat->sales->sales_name : ''}}" required readonly>
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
    url: '{{route('transaction.lpa.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_company').val(result.company.company_name);
      $('#sp_sales').val(result.sales.sales_name);
      $('#sp_date').val(result.sp_date);
      $('#sp_customer_name').val(result.customer.customer_name);
      $('#sp_customer_id').val(`CUST000${result.customer.id}`);
      $('#kavling_id').val(`KAV000${result.kavling.id}`);
      $('#kavling_building').val(result.kavling.kavling_building);
      $('#kavling_surface').val(result.kavling.kavling_surface);
      $('#kavling_shgb').val(result.kavling.kavling_shgb);
      $('#kavling_shgb_date').val(result.kavling.kavling_shgb_date);
      $('#kavling_imb').val(result.kavling.kavling_imb);

    },
    error: function (e) {
      console.log(e);
    }
    });
  });
  $('#kavling_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.lpa.load_kavling')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#kavling_building').val(result.kavling_building);
      $('#kavling_surface').val(result.kavling_surface);
      // $('#kavling_tanah_lebih').val(result.customer.customer_name);
      $('#kavling_shgb').val(result.kavling_shgb);
      $('#kavling_shgb_date').val(result.kavling_shgb_date);
      $('#kavling_imb').val(result.kavling_imb);
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