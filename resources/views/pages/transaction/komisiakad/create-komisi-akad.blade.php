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
    <form action="{{ route('transaction.komisi-akad.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Request:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="KA000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="akad_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Komisi Sales (%):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="akad_sales_commision">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Komisi SPV (%):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="akad_spv_commision">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Koordinator:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="akad_coordinator">
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
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="akad_sp_id" id="sp_id">
                  @foreach ($sps as $surat)
                    <option value=""></option>
                    <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
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
                  <input type="text" class="form-control pickadate" id="sp_date">
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
                  <input type="text" class="form-control pickadate-selectors" name="akad_ajb_date">
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
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="akad_company_id">
                  @foreach ($mou as $m)
                    <option value=""></option>
                    <option value="{{$m->id}}">{{$m->company_name}}</option>
                  @endforeach
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
      $('#sp_number').val(result.sp_no);
      $('#sp_payment_method').val(result.sp_payment_method);
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