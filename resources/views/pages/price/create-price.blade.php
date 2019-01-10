@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Price</span> - Create New Price</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('price.index') }}" class="breadcrumb-item">Price</a>    
<a href="{{ route('price.create') }}" class="breadcrumb-item">New Price</a>    
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Price</h5>
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
    <form action="{{ route('price.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Harga</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="H000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Mulai:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="price_start_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Berakhir:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="price_end_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Tipe Rumah:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="price_house_id" id="house-type">
                  @foreach ($buildings as $home)
                    <option></option>
                    <option value="{{$home->id}}">{{$home->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Tipe Rumah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" readonly id="nama-tipe-rumah" name="price_house_type">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" readonly id="luas-tanah" name="price_house_surface">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" readonly id="luas-bangunan" name="price_house_building">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_selling">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Discount:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_discount">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">PPN 10%:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_ppn">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Biaya Admin:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_adm">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Netto:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_netto">
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
              <label class="col-lg-3 col-form-label">Maksimum KPR:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_max_kpr">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">DP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_dp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Diskon DP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_discount_dp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Booking fee:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_booking">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga TL / m2:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_surface_m2">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Notaris + Adm:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_notaris">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran 5 Thn:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_5_year">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran 10 Thn:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_10_year">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran 15 Thn:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_15_year">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran 20 Thn:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_20_year">
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
  $('#house-type').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('price.houses')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#nama-tipe-rumah').val(result.rumah_type_name);
      $('#luas-tanah').val(result.surface_area_m2);
      $('#luas-bangunan').val(result.surface_area_m2);
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