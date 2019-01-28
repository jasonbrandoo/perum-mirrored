@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Sales</span> - {{ isset($sales) ? 'Update Sales' : 'Create New Sales' }}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('sales.index') }}" class="breadcrumb-item">Sales</a>    
<a href="#" class="breadcrumb-item">{{ isset($sales) ? 'Update Sales' : 'New Sales' }}</a>    
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{ isset($sales) ? 'Update Sales' : 'Create New Sales' }}</h5>
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

    @if (isset($sales))
    <form action="{{ route('sales.update') }}" method="POST">
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $sales->id }}">
    @else
    <form action="{{ route('sales.store') }}" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="S000{{ isset($sales) ? $sales->id : $id }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_name" value="{{ isset($sales) ? $sales->sales_name : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Hp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_mobile_number" value="{{ isset($sales) ? $sales->sales_mobile_number : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Telp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_number" value="{{ isset($sales) ? $sales->sales_number : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No KTP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_no_ktp" value="{{ isset($sales) ? $sales->sales_no_ktp : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_address" value="{{ isset($sales) ? $sales->sales_address : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_city" value="{{ isset($sales) ? $sales->sales_city : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Provinsi:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_province" value="{{ isset($sales) ? $sales->sales_province : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_zipcode" value="{{ isset($sales) ? $sales->sales_zipcode : '' }}">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jabatan:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sales_position">
                  <option></option>
                    <option value="Sales">Sales</option>
                    <option value="Supervisor">Supervisor</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="active" value="active">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tidak Komisi:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="sales_komisi" value="no commmision">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Target / Bulan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_target">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Void:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="sales_void">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Supervisor:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sales_spv">
                  <option></option>
                    <option value="#">123-Budi</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Masuk:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="sales_in">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Keluar:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="sales_out">
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