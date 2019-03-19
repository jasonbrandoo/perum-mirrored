@extends('layouts.app') 
@section('page-title')
<div class="mr-auto">
  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - {{isset($kwitansi) ? 'Edit
    Kwitansi' : 'Create New Kwitansi'}}</h4>
  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div>
  <a href="{{isset($kwitansi) ? route('transaction.kwitansi.generatePdf', $kwitansi->id) : ''}}" class="btn btn-lg btn-success"><i class="icon-printer mr-2"></i>Print</a>
</div>
@endsection
 
@section('breadcrumb')
<a href="{{ route('transaction.kwitansi.index') }}" class="breadcrumb-item">Kwitansi</a>
<a href="{{ route('transaction.kwitansi.create') }}" class="breadcrumb-item">{{isset($kwitansi) ? 'Edit Kwitansi' : 'Create New Kwitansi'}}</a>
@endsection
 
@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{isset($kwitansi) ? 'Edit Kwitansi' : 'Create New Kwitansi'}}</h5>
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
    @endif @if (isset($kwitansi))
    <form action="{{ route('transaction.kwitansi.update') }}" class="form-validate-jquery" method="POST">
      <input type="hidden" name="id" value="{{$kwitansi->id}}"> @method('PATCH') @else
      <form action="{{ route('transaction.kwitansi.store') }}" class="form-validate-jquery" method="POST">
        @endif @csrf
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Kuitansi</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" value="KRF000{{isset($kwitansi) ? $kwitansi->id : $id}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="kwitansi_date" value="{{isset($kwitansi) ? $kwitansi->kwitansi_date->toDateString() : ''}}"
                      required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Faktur Penjualan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kwitansi_faktur" value="{{isset($kwitansi) ? $kwitansi->kwitansi_faktur : ''}}"
                    required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Sudah Terima Dari</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kwitansi_reciever">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Staff</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kwitansi_staff_name" value="{{isset($kwitansi) ? $kwitansi->kwitansi_staff_name : ''}}"
                    required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Terbilang</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kwitansi_terbilang" value="{{isset($kwitansi) ? $kwitansi->kwitansi_terbilang : ''}}"
                    required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Untuk Pembayaran</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kwitansi_for_pay" value="{{isset($kwitansi) ? $kwitansi->kwitansi_for_pay : ''}}"
                    required>
                </div>
              </div>
            </fieldset>
          </div>

          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Surat Pesanan</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kwitansi_sp_id" id="sp_id">
                  @if (isset($kwitansi))
                    <option value="{{$kwitansi->surat->id}}">SP000{{$kwitansi->surat->id}}</option>
                    @foreach ($surat_edit as $surat)
                      @if ($surat->id == $kwitansi->surat->id)
                        <option></option>
                      @else
                        <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($surats as $surat)
                      <option value=""></option>
                      <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
                    @endforeach
                  @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kavling</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_kavling" value="{{isset($kwitansi) ? $kwitansi->surat->sp_house_cluster : ''}}"
                    readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tipe Rumah</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_house_type" name="sp_house_type" value="{{isset($kwitansi) ? $kwitansi->surat->kavling->house->rumah_type_name : ''}}"
                    readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Blok</label>
                <div class="col-lg-9">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="sp_block" name="sp_block" value="{{isset($kwitansi) ? $kwitansi->surat->sp_house_block : ''}}"
                        readonly required>
                    </div>
                    <label class="col-form-label">No</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="sp_number" name="sp_number" value="{{isset($kwitansi) ? $kwitansi->surat->sp_house_no : ''}}"
                        readonly required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="kwitansi_jumlah" value="{{isset($kwitansi) ? $kwitansi->kwitansi_jumlah : ''}}"
                    required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Cara Pembayaran</label>
                <div class="col-lg-9">
                  {{-- <input type="text" class="form-control" name="kwitansi_payment_method" value="{{isset($kwitansi) ? $kwitansi->kwitansi_payment_method : ''}}"
                    required> --}}
                  <select data-placeholder="Type" name="kwitansi_payment_method_id" class="form-control form-control-select2" required>
                  @if (isset($kwitansi))
                    <option value="{{$kwitansi->payment->id}}">{{$kwitansi->payment->payment_method}}</option>
                    @foreach ($payment_edit as $payment)
                      @if ($payment->id == $kwitansi->payment->id)
                        <option></option>
                      @else
                        <option value="{{$payment->id}}">{{$payment->payment_method}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($payments as $payment)
                      <option value=""></option>
                      <option value="{{$payment->id}}">{{$payment->payment_method}}</option>
                    @endforeach
                  @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label pickadate-selectors">Tgl Transfer</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="kwitansi_transfer_date" value="{{isset($kwitansi) ? $kwitansi->kwitansi_transfer_date->toDateString() : ''}}"
                      required>
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
    url: '{{route('transaction.kwitansi.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_kavling').val(result.kavling.kavling_cluster);
      $('#sp_block').val(result.kavling.kavling_block);
      $('#sp_number').val(result.kavling.id);
      $('#sp_house_type').val(result.kavling.house.rumah_type_name);
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