@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Create New Pembatalan Surat Pesanan</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.pembatalan.index') }}" class="breadcrumb-item">Pembatalan Surat Pesanan</a>
<a href="{{ route('transaction.pembatalan.create') }}" class="breadcrumb-item">New Pembatalan Surat Pesanan</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Pembatalan SP</h5>
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
    <form action="{{ route('transaction.pembatalan.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Pembatalan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="PSP000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="cancel_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kelompok Pembatalan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_group">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alasan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_reason">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perincian Refund:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_refund">
              </div>
            </div>
            
            
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="cancel_status">
                  <option></option>
                    <option value="created">CREATED</option>
                    <option value="approve">APPROVE</option>
                    <option value="reject">REJECT</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tambahan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_tambahan">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Sp:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="cancel_sp_id" id="sp_id">
                  @foreach ($sps as $sp)
                    <option value=""></option>
                    <option value="{{$sp->id}}">SP000{{$sp->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal SP:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control" id="sp_date" readonly>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Konsumen:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_consumen" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kavling" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="sp_block" readonly>
                  </div>
                  <label class="col-form-label">No:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="sp_number" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_building" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_surface" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_house_type" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cluster:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_cluster" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Sales Executive:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_se" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perincian Pembayaran Konsume:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_consumen_bill">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jumlah:</label>
              <div class="col-lg-9">    
                <input type="text" class="form-control" name="cancel_total_bill">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Dibuat Oleh:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_make_by">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Disetujui oleh:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_approve_by">
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
    url: '{{route('transaction.pembatalan.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_date').val(result.sp_date);
      $('#sp_consumen').val(result.customer.customer_name);
      $('#sp_kavling').val(result.kavling.id);
      $('#sp_block').val(result.kavling.kavling_block);
      $('#sp_number').val(result.sp_house_no);
      $('#sp_building').val(result.kavling.price.house.building_area_m2);
      $('#sp_surface').val(result.kavling.price.house.surface_area_m2);
      $('#sp_house_type').val(result.kavling.price.house.rumah_type_name);
      $('#sp_cluster').val(result.kavling.kavling_cluster);
      $('#sp_se').val(result.sales.sales_name);
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