@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Create New LPA</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.legal.index') }}" class="breadcrumb-item">LPA</a>
<a href="{{ route('transaction.legal.create') }}" class="breadcrumb-item">New LPA</a>
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
    <form action="{{ route('transaction.lpa.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No LPA:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="LPA000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Lpa:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="lpa_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Type:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="lpa_type">
                  <option></option>
                    <option value="bangunan">Bangunan</option>
                    <option value="listrik">Listrik</option>
                    <option value="bestek">Bestek</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Kavling:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="lpa_kavling_id" id="kavling_id">
                  @foreach ($kavling as $kav)
                    <option value=""></option>
                    <option value="{{$kav->id}}">KAV000{{$kav->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_building" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_surface" readonly>
              </div>
            </div>
            {{-- <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanah Lebih:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_tanah_lebih">
              </div>
            </div> --}}
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor SHGB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_shgb" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tgl SHGB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_shgb_date" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor IMB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="kavling_imb" readonly>
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
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="lpa_sp_id" id="sp_id">
                  @foreach ($sps as $sp)
                    <option value=""></option>
                    <option value="{{$sp->id}}">SP000{{$sp->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Sp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_date" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer_id" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer Name:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_customer_name" readonly>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_company" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_sales" readonly>
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
      $('#sp_customer_name').val(result.customer.customer_name);
      $('#sp_customer_id').val(result.customer.id);
      $('#sp_date').val(result.sp_date);

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
</script>
@endpush