@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Kavling</span> - {{isset($kavling) ? 'Edit Kavling' : 'Create New Kavling'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('kavling.index') }}" class="breadcrumb-item">Kavling</a>    
<a href="{{ route('kavling.create') }}" class="breadcrumb-item">{{isset($kavling) ? 'Edit Kavling' : 'New Kavling'}}</a>    
@endsection

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

    @if (isset($kavling))
      <form action="{{ route('kavling.update') }}" class="form-validate-jquery" method="POST">
        @method('PATCH')
        <input type="hidden" name="id" value="{{$kavling->id}}">
    @else
      <form action="{{ route('kavling.store') }}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Kavling</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_id" id="kavling_id" value="KAV000{{ isset($kavling) ? $kavling->id : $id}}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Kavling</label>
              <div class="col-lg-9">
                <select select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kavling_type_id" id="kavling_type" required>
                  @if (isset($kavling))
                    <option value="{{$houseTypeId->house->id}}">R000{{$houseTypeId->house->id}} - {{$houseTypeId->house->rumah_type_name}}</option>
                    @foreach ($houseType_edit as $house)
                      @if ($house->id == $houseTypeId->id)
                        <option></option>
                      @else
                        <option value="{{$house->id}}">R000{{$house->id}} - {{$house->rumah_type_name}}</option>
                      @endif
                    @endforeach  
                  @else
                    @foreach ($houseType as $house)
                      <option></option>
                      <option value="{{$house->id}}">R000{{$house->id}} - {{$house->rumah_type_name}}</option>
                    @endforeach
                  @endif
                </select>
                {{-- <input type="text" class="form-control" name="kavling_type" value="{{ isset($kavling) ? $kavling->kavling_type : '' }}"> --}}
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_building" value="{{ isset($kavling) ? $houseTypeId->house->surface_area_m2 : '' }}" id="kavling_building" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_surface" value="{{ isset($kavling) ? $houseTypeId->house->building_area_m2 : '' }}" id="kavling_surface" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_block" value="{{ isset($kavling) ? $kavling->kavling_block : '' }}" required>
              </div>
            </div>
            @if (isset($kavling))
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No</label>
                <div class="col-lg-2">
                  <input type="text" class="form-control" name="kavling_number" value="{{ isset($kavling) ? $kavling->kavling_number : '' }}" required>
                </div>
              </div>
            @else
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No</label>
                <div class="col-lg-2">
                  <input type="number" class="form-control" name="kavling_number" value="{{ isset($kavling) ? $kavling->kavling_number : '' }}" required>
                </div>
                <label class="col-lg-1 col-form-label">s/d</label>
                <div class="col-lg-2">
                  <input type="number" class="form-control" name="kavling_s_d" value="{{ isset($kavling) ? $kavling->kavling_s_d : '' }}" required>
                </div>
              </div>
            @endif
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cluster</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_cluster" value="{{ isset($kavling) ? $kavling->kavling_cluster : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Ukuran</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_ukuran" value="{{ isset($kavling) ? $kavling->kavling_ukuran : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Hook</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="kavling_hook" checked>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="active" checked>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No. TL</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_tl" value="{{ isset($kavling) ? $kavling->kavling_tl : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">TL Aktif</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="kavling_tl_active" value="{{ isset($kavling) ? $kavling->kavling_tl_active : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">TL Lama</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="kavling_tl_old" value="{{ isset($kavling) ? $kavling->kavling_tl_old : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Harga</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kavling_price_id" id="kavling_price_code" required>
                  @if (isset($kavling))
                    <option value="{{$priceId->price->id}}">H000{{$priceId->price->id}} - {{$priceId->price->price_selling}}</option>
                    @foreach ($prices as $price)
                      @if ($price->id == $priceId->price->id)
                        <option value=""></option>
                      @else
                        <option value=""></option>
                        <option value="{{$price->id}}">H000{{$price->id}} - {{$price->price_selling}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($prices as $price)
                      <option></option>
                      <option value="{{$price->id}}">H000{{$price->id}} - {{$price->price_selling}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" readonly id="kavling_price_selling" name="kavling_price_selling" value="{{ isset($kavling) ? $priceId->price->price_selling : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga TL/M2</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" readonly id="kavling_price_tl_m2" name="kavling_price_tl_m2" value="{{ isset($kavling) ? $priceId->price->price_surface_m2 : '' }}" required>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Discount Uang Muka (%)</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="kavling_discount_dp" value="{{ isset($kavling) ? $kavling->kavling_discount_dp : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Penjualan Kavling</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kavling_sell_status" required>
                  @if (isset($kavling))
                    @if ($kavling->kavling_sell_status == 'terjual')
                      <option value="terjual">Sudah Terjual</option>
                      <option value="jual">Belum Terjual</option>    
                    @endif
                    @if ($kavling->kavling_sell_status == 'jual')
                      <option value="jual">Belum Terjual</option>    
                      <option value="terjual">Sudah Terjual</option>
                    @endif
                  @else
                    <option></option>
                    <option value="terjual">Sudah Terjual</option>
                    <option value="jual">Belum Terjual</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling Boleh Dipasarkan</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="kavling_market_status" checked>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Pembangunan %</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="kavling_build_status" required>
                  @if (isset($kavling))
                    @if ($kavling->kavling_build_status == 'finish')
                      <option value="finish">Selesai Dibangun</option>
                      <option value="proccess">Sedang Dibangun</option>
                      <option value="pending">Belum Dibangun</option>
                    @endif
                    @if ($kavling->kavling_build_status == 'proccess')
                      <option value="proccess">Sedang Dibangun</option>
                      <option value="finish">Selesai Dibangun</option>
                      <option value="pending">Belum Dibangun</option>
                    @endif
                    @if ($kavling->kavling_build_status == 'pending')
                      <option value="pending">Belum Dibangun</option>
                      <option value="finish">Selesai Dibangun</option>
                      <option value="proccess">Sedang Dibangun</option>
                    @endif
                  @else
                    <option></option>
                    <option value="finish">Selesai Dibangun</option>
                    <option value="proccess">Sedang Dibangun</option>
                    <option value="pending">Belum Dibangun</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Mulai Dibangun Tgl.</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kavling_start_date" value="{{ isset($kavling) ? $kavling->kavling_start_date->toDateString() : '' }}">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Progress Pembangunan (%)</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="kavling_progress" value="{{ isset($kavling) ? $kavling->kavling_progress : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Selesai Dibangun Tgl.</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kavling_end_date" value="{{ isset($kavling) ? $kavling->kavling_end_date->toDateString() : '' }}" >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No. SHGB Induk</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_shgb" value="{{ isset($kavling) ? $kavling->kavling_shgb : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tgl. SHGB Induk</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kavling_shgb_date" value="{{ isset($kavling) ? $kavling->kavling_shgb_date->toDateString() : '' }}" >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No. IMB Pecahan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_imb" value="{{ isset($kavling) ? $kavling->kavling_imb : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tgl. IMB Pecahan</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="kavling_imb_date" value="{{ isset($kavling) ? $kavling->kavling_imb_date->toDateString() : '' }}" >
                </div>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
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

  $('#kavling_type').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('kavling.type')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#kavling_building').val(result.building_area_m2);
      $('#kavling_surface').val(result.surface_area_m2);
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

var FormValidation = function() {
  var _componentValidation = function() {
      if (!$().validate) {
          console.warn('Warning - validate.min.js is not loaded.');
          return;
      }

      // Initialize
      var validator = $('.form-validate-jquery').validate({
          ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
          errorClass: 'validation-invalid-label',
          successClass: 'validation-valid-label',
          validClass: 'validation-valid-label',
          highlight: function(element, errorClass) {
              $(element).removeClass(errorClass);
          },
          unhighlight: function(element, errorClass) {
              $(element).removeClass(errorClass);
          },
          rules: {
            // kavling_block : {
            //   number: true
            // },
            // kavling_number : {
            //   number: true
            // },
            kavling_s_d : {
              number: true
            },
            // kavling_tl : {
            //   number: true
            // },
            kavling_tl_active : {
              number: true
            },
            kavling_tl_old : {
              number: true
            },
            kavling_discount_dp : {
              number: true
            },
            // kavling_shgb : {
            //   number: true
            // },
            // kavling_imb : {
            //   number: true
            // },
          },
          // Different components require proper error label placement
          errorPlacement: function(error, element) {

              // Unstyled checkboxes, radios
              if (element.parents().hasClass('form-check')) {
                  error.appendTo( element.parents('.form-check').parent() );
              }

              // Input with icons and Select2
              else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                  error.appendTo( element.parent() );
              }

              // Input group, styled file input
              else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                  error.appendTo( element.parent().parent() );
              }

              // Other elements
              else {
                  error.insertAfter(element);
              }
          }
      });

      // Reset form
      $('#reset').on('click', function() {
          validator.resetForm();
      });
  };

  return {
      init: function() {
          _componentValidation();
      }
  }
}();

document.addEventListener('DOMContentLoaded', function() {
    FormValidation.init();
});
</script>
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush