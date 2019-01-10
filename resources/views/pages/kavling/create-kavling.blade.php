@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Kavling</h5>
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
    <form action="{{ route('kavling.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Kavling</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_id" id="kavling_id" value="KAV{{$id}}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Kavling</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_type">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_block">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_number">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">S/D</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_s_d">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cluster</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_cluster">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Hook:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="kavling_hook">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No. TL</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_tl">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_building">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_surface">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">TL Aktif</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_tl_active">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">TL Lama</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_tl_old">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Harga:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kavling_price_id" id="kavling_price_code">
                  @foreach ($prices as $price)
                    <option></option>
                    <option value="{{$price->id}}">H{{$price->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" readonly id="kavling_price_selling" name="kavling_price_selling">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga TL/M2:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" readonly id="kavling_price_tl_m2" name="kavling_price_tl_m2">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Discount Uang Muka:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_discount_dp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Penjualan Kavling:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kavling_sell_status">
                    <option></option>
                    <option value="terjual">Sudah Terjual</option>
                    <option value="jual">Belum Terjual</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling Boleh Dipasarkan:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="kavling_market_status">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Pembangunan %:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kavling_build_status">
                    <option></option>
                    <option value="finish">Selesai Dibangun</option>
                    <option value="proccess">Sedang Dibangun</option>
                    <option value="pending">Belum Dibangun</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Mulai Dibangun Tgl.:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kavling_start_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Progress Pembangunan (%):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_progress">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Selesai Dibangun Tgl.:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kavling_end_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No. SHGB Induk:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_shgb">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tgl. SHGB Induk:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kavling_shgb_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No. IMB Pecahan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_imb">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tgl. IMB Pecahan:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kavling_imb_date">
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
  $('#kavling_price_code').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('kavling.prices')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#kavling_price_selling').val(result.price_selling);
      $('#kavling_price_tl_m2').val(result.price_surface_m2);
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