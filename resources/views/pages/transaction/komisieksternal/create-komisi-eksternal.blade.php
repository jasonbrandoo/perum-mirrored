@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Create New Komisi Eksternal</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.komisi-eksternal.index') }}" class="breadcrumb-item">Komisi Eksternal</a>
<a href="{{ route('transaction.komisi-eksternal.create') }}" class="breadcrumb-item">New Komisi Eksternal</a>
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
    <form action="{{ route('transaction.komisi-eksternal.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Request:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="KE000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="eksternal_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Komisi Koordinator (%):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="eksternal_coordinator">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Perusahaan:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="eksternal_company_id" id="company_id">
                  @foreach ($company_mou as $mou)
                    <option value=""></option>
                    <option value="{{$mou->id}}">PM000{{$mou->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="company_name" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor Perjanjian (MOU):</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="eksternal_mou_id" id="mou_id">
                  @foreach ($mous as $mou)
                    <option value=""></option>
                    <option value="{{$mou->id}}">MOU000{{$mou->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Mulai (MOU):</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control" id="mou_start_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Akhir (MOU):</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control" id="mou_end_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Komisi(%):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="eksternal_commision">
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
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Sp:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="eksternal_sp_id" id="sp_id">
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
                  <input type="text" class="form-control" id="sp_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal AJB:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="eksternal_ajb_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer">
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
              <label class="col-lg-3 col-form-label">Payment Type:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_payment_method">
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
      $('#sp_number').val(result.sp_no);
      $('#sp_payment_method').val(result.sp_payment_method);
      $('#sp_payment_method').val(result.sp_payment_method);

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
</script>
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush