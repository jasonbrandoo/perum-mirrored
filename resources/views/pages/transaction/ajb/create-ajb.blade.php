@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New AJB</h5>
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
    <form action="{{ route('transaction.ajb.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Permohonan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="PAK000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="ajb_date">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga AJB 1:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="ajb_price_1">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga AJB 2:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="ajb_price_2">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">LT AJB 1(M2):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="ajb_lt">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">TL AJB 2(M2):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="ajb_tl">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Notaris / PPAT:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="ajb_notaris">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Keterangan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="ajb_description">
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Sp:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="ajb_sp_id" id="sp_id" >
                  @foreach ($sps as $sp)
                    <option value=""></option>
                    <option value="{{$sp->id}}">SP000{{$sp->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual Sp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_price" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Sp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_date" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">KPR Disetujui:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_kpr" readonly>
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
              <label class="col-lg-3 col-form-label">TL:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_tl" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHGB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_shgb" name="ajb_shgb">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal SHGB:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" id="sp_shgb_date" name="ajb_shgb_date">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No IMB Pecahan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_imb" name="ajb_imb">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal IMB:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" id="sp_imb_date" name="ajb_imb_date">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_sales_id" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_sales_name" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SP3K:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_sp3k" name="ajb_sp3k">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal SP3K:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" id="sp_sp3k_date" name="ajb_sp3k_date">
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
    url: '{{route('transaction.lpa.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_price').val(result.sp_price);
      $('#sp_date').val(result.sp_date);
      $('#sp_kpr').val(result.sp_kpr_plan);
      $('#sp_block').val(result.sp_house_block);
      $('#sp_number').val(result.sp_house_number);
      $('#sp_building').val(result.sp_house_building);
      $('#sp_surface').val(result.sp_house_surface);
      $('#sp_tl').val(result.sp_tl);
      // $('#sp_shgb').val(result.sp_date);
      // $('#sp_shgb_date').val(result.customer.id);
      // $('#sp_imb').val(result.sp_date);
      // $('#sp_imb_date').val(result.sales.sales_name);
      $('#sp_sales_id').val(result.customer.customer_name);
      $('#sp_sales_name').val(result.customer.id);
      // $('#sp_sp3k').val(result.sp_date);
      // $('#sp_sp3k_date').val(result.customer.id);
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