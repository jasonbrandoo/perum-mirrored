@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Create New Kwitansi</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.kwitansi.index') }}" class="breadcrumb-item">Kwitansi</a>
<a href="{{ route('transaction.kwitansi.create') }}" class="breadcrumb-item">New Kwitansi</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Kuitansi</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="card-body">
    <form action="{{ route('transaction.kwitansi.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Kuitansi:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="KRF000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kwitansi_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Surat Pesanan:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kwitansi_sp_id" id="sp_id">
                  @foreach ($surats as $surat)
                    <option value=""></option>
                    <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Faktur Penjualan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kwitansi_faktur">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sudah Terima Dari (Staff ID):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kwitansi_staff_id" value="STF000{{Auth::user()->id}}" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Staff:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kwitansi_staff_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Terbilang:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kwitansi_terbilang">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Untuk Pembayaran:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kwitansi_for_pay">
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kavling">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_house_type">
                </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="sp_block">
                  </div>
                  <label class="col-form-label">No:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="sp_number">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jumlah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kwitansi_jumlah">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cara Pembayaran:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kwitansi_payment_method">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label pickadate-selectors">Tgl Transfer:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control pickadate-selectors" name="kwitansi_transfer_date">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="active">
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
      $('#sp_kavling').val(result.kavling.id);
      $('#sp_block').val(result.kavling.kavling_block);
      $('#sp_number').val(result.sp_house_no);
      $('#sp_house_type').val(result.kavling.price.house.rumah_type_name);
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
</script>
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush