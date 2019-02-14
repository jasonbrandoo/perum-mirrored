@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - {{isset($berkas) ? 'Edit Berkas' : 'Create New Berkas'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.berkas.index') }}" class="breadcrumb-item">Berkas</a>
<a href="{{ route('transaction.berkas.create') }}" class="breadcrumb-item">{{isset($berkas) ? 'Edit Berkas' : 'New Berkas'}}</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Berkas</h5>
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

    @if (isset($berkas))
      <form action="{{ route('transaction.berkas.update') }}" class="form-validate-jquery" method="POST">
        @method('PATCH')
        <input type="hidden" name="id" value="{{$berkas->id}}">
    @else
      <form action="{{ route('transaction.berkas.store') }}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Terima Berkas:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="TBK000{{isset($berkas) ? $berkas->id : $id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="berkas_date" value="{{isset($berkas) ? $berkas->berkas_date : ''}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Diserahkan Oleh:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="berkas_giver_id" required>
                  @if (isset($berkas))
                    <option value="{{$berkas->customer->id}}">{{$berkas->customer->customer_name}}</option>
                    @foreach ($customer_edit as $cust)
                      @if ($cust->id == $berkas->customer->id)
                        <option></option>
                      @else
                        <option></option>
                        <option value="{{$cust->id}}">{{$cust->customer_name}}<c/option>    
                      @endif
                    @endforeach  
                  @else
                    @foreach ($customer as $cust)
                      <option></option>
                      <option value="{{$cust->id}}">{{$cust->customer_name}}<c/option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">ID Penerima:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="berkas_reciever_id" value="{{Auth::user()->id}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Catatan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="berkas_note" value="{{isset($berkas) ? $berkas->berkas_note : ''}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active:</label>
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
              <label class="col-lg-3 col-form-label">No Sp:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="berkas_sp_id" id="sp_id" required>
                  @if (isset($berkas))
                    <option value="{{$berkas->surat->id}}">SP000{{$berkas->surat->id}}</option>
                    @foreach ($surat_edit as $surat)
                      @if ($surat->id == $berkas->surat->id)
                        <option></option>
                      @else
                        <option value=""></option>
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
              <label class="col-lg-3 col-form-label">Tanggal Sp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_date" value="{{isset($berkas) ? $berkas->surat->sp_date : ''}}" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer" value="{{isset($berkas) ? $berkas->surat->customer->customer_name : ''}}" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_sales" value="{{isset($berkas) ? $berkas->surat->sales->sales_name : ''}}" readonly>
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_house_type" value="{{isset($berkas) ? $berkas->surat->kavling->house->rumah_type_name : ''}}" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kavling" value="{{isset($berkas) ? $berkas->surat->kavling->kavling_cluster : ''}}" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cara Pembayaran:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_payment_method" value="{{isset($berkas) ? $berkas->surat->paymentMethod->payment_method : ''}}" readonly>
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
    url: '{{route('transaction.berkas.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_date').val(result.sp_date);
      $('#sp_customer').val(result.customer.customer_name);
      $('#sp_sales').val(result.sales.sales_name);
      $('#sp_house_type').val(result.kavling.price.house.rumah_type_name);
      $('#sp_kavling').val(result.kavling.kavling_cluster);
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