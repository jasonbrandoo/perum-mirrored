@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - {{isset($eksternal) ? 'Edit Komisi Eksternal' : 'Create New Komisi'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.komisi-eksternal.index') }}" class="breadcrumb-item">Komisi Eksternal</a>
<a href="{{ route('transaction.komisi-eksternal.create') }}" class="breadcrumb-item">{{isset($eksternal) ? 'Edit Komisi Eksternal' : 'Create New Komisi'}}</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Komisi Eksternal</h5>
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

    @if (isset($eksternal))
      <form action="{{ route('transaction.komisi-eksternal.update') }}" class="form-validate-jquery" method="POST">
        <input type="hidden" name="id" value="{{$eksternal->id}}">
        @method('PATCH')
    @else
      <form action="{{ route('transaction.komisi-eksternal.store') }}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Request</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="KE000{{isset($eksternal) ? $eksternal->id : $id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="eksternal_date" value="{{isset($eksternal) ? $eksternal->eksternal_date : ''}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Komisi Koordinator (%)</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="eksternal_coordinator" value="{{isset($eksternal) ? $eksternal->eksternal_coordinator : ''}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Perusahaan</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="eksternal_company_id" id="company_id" required>
                  @if (isset($eksternal))
                    <option value="{{$eksternal->company->id}}">PM000{{$eksternal->company->id}} - {{$eksternal->company->company_name}}</option>
                    @foreach ($company_edit as $company)
                      @if ($company->id == $eksternal->company->id)
                        <option></option>
                      @else
                        <option value="{{$company->id}}">PM000{{$company->id}} - {{$company->company_name}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($company_mou as $mou)
                      <option value=""></option>
                      <option value="{{$mou->id}}">PM000{{$mou->id}} - {{$mou->company_name}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="company_name" value="{{isset($eksternal) ? $eksternal->company->company_name : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor Perjanjian (MOU)</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="eksternal_mou_id" id="mou_id" required>
                  @if (isset($eksternal))
                    <option value="{{$eksternal->mou->id}}">MOU000{{$eksternal->mou->id}} - {{$eksternal->mou->mou_coordinator}}</option>
                    @foreach ($mou_edit as $mou)
                      @if ($mou->id == $eksternal->mou->id)
                        <option></option>
                      @else
                        <option value="{{$mou->id}}">MOU000{{$mou->id}} - {{$mou->mou_coordinator}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($mous as $mou)
                      <option value=""></option>
                      <option value="{{$mou->id}}">MOU000{{$mou->id}} - {{$mou->mou_coordinator}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Mulai (MOU)</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control" id="mou_start_date" name="mou_start_date" value="{{isset($eksternal) ? $eksternal->mou->mou_start_date : ''}}" required readonly>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Akhir (MOU)</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control" id="mou_end_date" name="mou_end_date" value="{{isset($eksternal) ? $eksternal->mou->mou_end_date : ''}}" required readonly>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Komisi(%)</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="eksternal_commision" value="{{isset($eksternal) ? $eksternal->eksternal_commision : ''}}" required>
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
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="eksternal_sp_id" id="sp_id" required>
                  @if (isset($eksternal))
                    <option value="{{$eksternal->surat->id}}">SP00{{$eksternal->surat->id}}</option>
                    @foreach ($surat_edit as $surat)
                      @if ($surat->id == $eksternal->surat->id)
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
              <label class="col-lg-3 col-form-label">Tanggal SP</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control" id="sp_date" name="sp_date" value="{{isset($eksternal) ? $eksternal->surat->sp_date : ''}}" required readonly>
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
                  <input type="text" class="form-control pickadate-selectors" name="eksternal_ajb_date" value="{{isset($eksternal) ? $eksternal->eksternal_ajb_date : ''}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer" name="sp_customer" value="{{isset($eksternal) ? $eksternal->surat->customer->customer_name : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_house_type" name="sp_house_type" value="{{isset($eksternal) ? $eksternal->surat->kavling->house->rumah_type_name : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="sp_block" name="sp_block" value="{{isset($eksternal) ? $eksternal->surat->sp_house_block : ''}}" required readonly>
                  </div>
                  <label class="col-form-label">No</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="sp_number" name="sp_number" value="{{isset($eksternal) ? $eksternal->surat->sp_house_no : ''}}" required readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Payment Type</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_payment_method" name="sp_payment_method" value="{{isset($eksternal) ? $eksternal->surat->paymentMethod->payment_method : ''}}" required readonly>
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
    url: '{{route('transaction.komisi-eksternal.load_sp')}}',
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
  $('#mou_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.komisi-eksternal.load_mou')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#mou_start_date').val(result.mou_start_date);
      $('#mou_end_date').val(result.mou_end_date);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });
  $('#company_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.komisi-eksternal.load_company')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#company_name').val(result.company_name);
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
          rules: {
            eksternal_commision: {
              max: 100
            },
            eksternal_coordinator: {
              max: 100
            },
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