@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Create New Komisi Akad</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.komisi-akad.index') }}" class="breadcrumb-item">Komisi Akad</a>
<a href="{{ route('transaction.komisi-akad.create') }}" class="breadcrumb-item">New Komisi Akad</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Akad</h5>
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

    @if (isset($akad))
      <form action="{{ route('transaction.komisi-akad.update') }}" class="form-validate-jquery" method="POST">
        @method('PATCH')
        <input type="hidden" name="id" value="{{$akad->id}}">
    @else
      <form action="{{ route('transaction.komisi-akad.store') }}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Request</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="KA000{{isset($akad) ? $akad->id : $id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="akad_date" value="{{isset($akad) ? $akad->akad_date : ''}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Komisi Sales (%)</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="akad_sales_commision" value="{{isset($akad) ? $akad->akad_sales_commision : ''}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Komisi SPV (%)</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="akad_spv_commision" value="{{isset($akad) ? $akad->akad_spv_commision : ''}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Koordinator</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="akad_coordinator" value="{{isset($akad) ? $akad->akad_coordinator : ''}}" required>
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
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="akad_sp_id" id="sp_id" required>
                  @if (isset($akad))
                    <option value="{{$akad->surat->id}}">SP000{{$akad->surat->id}}</option>
                    @foreach ($surat as $sp)
                      @if ($sp->id == $akad->surat->id)
                        <option></option>
                      @else
                        <option value=""></option>
                        <option value="{{$sp->id}}">SP000{{$sp->id}}</option>
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
              <label class="col-lg-3 col-form-label">Tanggal SP</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate" id="sp_date" value="{{isset($akad) ? $akad->surat->sp_date : ''}}" required readonly>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal AJB</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="akad_ajb_date" value="{{isset($akad) ? $akad->akad_ajb_date : ''}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer" name="sp_customer" value="{{isset($akad) ? $akad->surat->customer->customer_name : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_house_type" name="sp_house_type" value="{{isset($akad) ? $akad->surat->kavling->house->rumah_type_name : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="sp_block" name="sp_block" value="{{isset($akad) ? $akad->surat->kavling->kavling_block : ''}}" required readonly>
                  </div>
                  <label class="col-form-label">No</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="sp_number" name="sp_number" value="{{isset($akad) ? $akad->surat->kavling->kavling_number : ''}}" required readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Payment Type</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_payment_method" name="sp_payment_method" value="{{isset($akad) ? $akad->surat->paymentMethod->payment_method : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="akad_company_id" required>
                  @if (isset($akad))
                    <option value="{{$akad->company->id}}">P000{{$akad->company->id}}</option>
                    @foreach ($mou_edit as $company)
                      @if ($company->id == $akad->company->id)
                        <option></option>
                      @else
                        <option></option>
                        <option value="{{$company->id}}">P000{{$company->id}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($mou as $m)
                      <option value=""></option>
                      <option value="{{$m->id}}">{{$m->company_name}}</option>
                    @endforeach
                  @endif
                </select>
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
    url: '{{route('transaction.komisi-akad.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_date').val(result.sp_date);
      $('#sp_customer').val(result.customer.customer_name);
      $('#sp_house_type').val(result.kavling.price.house.rumah_type_name);
      $('#sp_block').val(result.kavling.kavling_block);
      $('#sp_number').val(result.kavling.id);
      $('#sp_payment_method').val(result.payment_method.payment_method);
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