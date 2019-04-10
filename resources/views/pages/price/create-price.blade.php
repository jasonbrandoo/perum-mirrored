@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Price</span> - {{ isset($price) ? 'Edit Price' : 'Create New Price' }}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('price.index') }}" class="breadcrumb-item">Price</a>    
<a href="#" class="breadcrumb-item">{{ isset($price) ? 'Edit Price' : 'New Price' }}</a>    
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{ isset($price) ? 'Edit Price' : 'Create New Price' }}</h5>
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

    @if (isset($price))
    <form action="{{ route('price.update') }}" class="form-validate-jquery" method="POST">
      @method('PATCH')
      <input type="hidden" name="id" value="{{$price->id}}">
    @endif
    <form action="{{ route('price.store') }}" class="form-validate-jquery" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Harga</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="H000{{ isset($price) ? $price->id : $id }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Mulai</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors-start" name="price_start_date" value="{{ isset($price) ? $price->price_start_date->toDateString() : '' }}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Berakhir</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors-end" name="price_end_date" value="{{ isset($price) ? $price->price_end_date->toDateString() : '' }}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Tipe Rumah</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="price_house_id" id="house-type" required>
                  @if (isset($price))
                      <option value="{{$house->house->id}}">R000{{$house->house->id}} - {{$house->house->rumah_type_name}} - {{$house->house->building_area_m2}}/{{$house->house->surface_area_m2}}</option>
                    @foreach ($buildings_edit as $home)
                      @if ($home->id == $house->house->id)
                        <option></option>
                      @else
                        <option value="{{$home->id}}">R000{{$home->id}} - {{$home->rumah_type_name}} - {{$home->building_area_m2}}/{{$home->surface_area_m2}}</option>
                      @endif
                    @endforeach  
                  @else
                    @foreach ($buildings as $home)
                      <option></option>
                      <option value="{{$home->id}}">R000{{$home->id}} - {{$home->rumah_type_name}} - {{$home->building_area_m2}}/{{$home->surface_area_m2}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Tipe Rumah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" readonly id="nama-tipe-rumah" name="price_house_type" value="{{ isset($price) ? $house->house->rumah_type_name : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" readonly id="luas-tanah" name="price_house_surface" value="{{ isset($price) ? $house->house->surface_area_m2 : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" readonly id="luas-bangunan" name="price_house_building" value="{{ isset($price) ? $house->house->building_area_m2 : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_selling" value="{{ isset($price) ? $price->price_selling : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Discount</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_discount" value="{{ isset($price) ? $price->price_discount : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">PPN 10%</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_ppn" value="{{ isset($price) ? $price->price_ppn : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Biaya Admin</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_adm" value="{{ isset($price) ? $price->price_adm : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Netto</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_netto" value="{{ isset($price) ? $price->price_netto : '' }}" readonly required>
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
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Maksimum KPR</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_max_kpr" value="{{ isset($price) ? $price->price_max_kpr : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">DP</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_dp" value="{{ isset($price) ? $price->price_dp : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Diskon DP</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_discount_dp" value="{{ isset($price) ? $price->price_discount_dp : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Booking fee</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_booking" value="{{ isset($price) ? $price->price_booking : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga TL / m2</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_surface_m2" value="{{ isset($price) ? $price->price_surface_m2 : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Notaris + Adm</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_notaris" value="{{ isset($price) ? $price->price_notaris : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran 5 Thn</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_5_year" value="{{ isset($price) ? $price->price_5_year : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran 10 Thn</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_10_year" value="{{ isset($price) ? $price->price_10_year : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran 15 Thn</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_15_year" value="{{ isset($price) ? $price->price_15_year : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran 20 Thn</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="price_20_year" value="{{ isset($price) ? $price->price_20_year : '' }}" required>
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
  const startDate = $('.pickadate-selectors-start').datepicker({
    changeMonth: true,
    changeYear: true,
  });

  startDate.change((e) => {
    console.log(e.target.value);
    $('.pickadate-selectors-end').datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: new Date(e.target.value),
    });
  })
  
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

  const total = $('input[name=price_selling], input[name=price_discount], input[name=price_ppn], input[name=price_adm]').keyup(() => {
    const a = parseFloat($('input[name=price_selling]').val()) || 0;
    const b = parseFloat($('input[name=price_discount').val()) || 0;
    const c = parseFloat($('input[name=price_ppn').val()) || 0;
    const d = parseFloat($('input[name=price_adm]').val()) || 0;
    $('input[name=price_netto').val((a - b) + c + d);
  });
});

/* var DateTimePickers = function() {
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
}); */

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
            price_selling: {
              number: true
            },
            price_discount: {
              number: true
            },
            price_ppn: {
              number: true
            },
            price_adm: {
              number: true
            },
            price_max_kpr: {
              number: true
            },
            price_dp: {
              number: true
            },
            price_discount: {
              number: true
            },
            price_booking: {
              number: true
            },
            price_surface_m2: {
              number: true
            },
            price_notaris: {
              number: true
            },
            price_5_year: {
              number: true
            },
            price_10_year: {
              number: true
            },
            price_15_year: {
              number: true
            },
            price_20_year: {
              number: true
            }
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