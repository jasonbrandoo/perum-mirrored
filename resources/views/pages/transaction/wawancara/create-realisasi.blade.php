@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span></span>SP</span> - Create New Realisasi Wawancara</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.realisasi.index') }}" class="breadcrumb-item">Realisasi Wawancara</a>    
<a href="{{ route('transaction.realisasi.create') }}" class="breadcrumb-item">New Realisasi Wawancara</a>    
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Realisasi Wawancara</h5>
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
    <form action="{{ route('transaction.realisasi.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Wawancara:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="RLW000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Rencana Wawancara:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="rlw_wawancara_id" id="wawancara_id">
                  @foreach ($wawancaras as $wawancara)
                    <option></option>
                    <option value="{{$wawancara->id}}">RW000{{$wawancara->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="rlw_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="wawancara_price">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">KPR Dimohon:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="wawancara_kpr">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Analis:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="rlw_analyst">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Catatan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="rlw_note">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomer SP:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="rlw_sp_id" id="sp_id">
                  @foreach ($sps as $sp)
                    <option></option>
                    <option value="{{$sp->id}}">SP000{{$sp->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal SP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_date">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_se">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer_id">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer Name:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kavling">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_rumah">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Kreditur:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kreditur" name="rlw_kreditur_id">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Kreditur:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kreditur_name" name="rlw_kreditur_name">
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
    url: '{{route('transaction.wawancara.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_date').val(result.sp_date);
      $('#sp_se').val(result.sales.sales_name);
      $('#sp_customer_id').val(result.sp_customer_id);
      $('#sp_customer_name').val(result.customer.customer_name);
      $('#sp_kavling').val(result.sp_kavling_id);
      $('#sp_rumah').val(result.kavling.price.house.rumah_type_name);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });
  $('#wawancara_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.realisasi.load_wawancara')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#wawancara_price').val(result.wawancara_price);
      $('#wawancara_kpr').val(result.wawancara_kpr);
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
@endpush