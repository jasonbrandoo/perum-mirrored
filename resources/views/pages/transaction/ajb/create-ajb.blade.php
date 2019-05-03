@extends('layouts.app') 
@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">AJB</span> - {{isset($ajb) ? 'Edit Ajb' : 'Create
  New AJB'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection
 
@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{isset($ajb) ? 'Edit Ajb' : 'Create New AJB'}}</h5>
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
    @endif @if (isset($ajb))
    <form action="{{ route('transaction.ajb.update', $ajb->id) }}" method="post">
      @method('PATCH')
      <input type="hidden" name="id" value="{{$ajb->id}}"> @else
      <form action="{{ route('transaction.ajb.store') }}" class="form-validate-jquery" method="POST">
        @endif @csrf
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Permohonan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" value="PAK000{{isset($ajb) ? $ajb->id : $id}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="ajb_date" value="{{isset($ajb) ? $ajb->ajb_date : ''}}"
                      required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga AJB 1</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="ajb_price_1" value="{{isset($ajb) ? $ajb->ajb_price_1 : ''}}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga AJB 2</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="ajb_price_2" value="{{isset($ajb) ? $ajb->ajb_price_2 : ''}}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">LT AJB 1(M2)</label>
                <div class="col-lg-9">
                  <input type="number" class="form-control" name="ajb_lt" value="{{isset($ajb) ? $ajb->ajb_lt : ''}}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">TL AJB 2(M2)</label>
                <div class="col-lg-9">
                  <input type="number" class="form-control" name="ajb_tl" value="{{isset($ajb) ? $ajb->ajb_tl : ''}}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Notaris / PPAT</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="ajb_notaris" value="{{isset($ajb) ? $ajb->ajb_notaris : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Keterangan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="ajb_description" value="{{isset($ajb) ? $ajb->ajb_description : ''}}">
                </div>
              </div>
            </fieldset>
          </div>

          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Sp</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="ajb_sp_id" id="sp_id" required>
                    @if (isset($ajb))
                      <option value="{{$ajb->surat->id}}">SP000{{$ajb->surat->id}} - {{$ajb->surat->customer->customer_name}} - BLOK {{$ajb->surat->kavling->kavling_block}}</option>
                      @foreach ($sps_edit as $sp)
                      @if ($sp->id == $ajb->surat->id)
                        <option></option>
                      @else
                      <option value="{{$sp->id}}">SP000{{$sp->id}} - {{$sp->customer->customer_name}} - BLOK {{$sp->kavling->kavling_block}}</option>
                      @endif
                      @endforeach
                        @else
                        @foreach ($sps as $sp)
                        <option value=""></option>
                        <option value="{{$sp->id}}">SP000{{$sp->id}} - {{$sp->customer->customer_name}} - BLOK {{$sp->kavling->kavling_block}}</option>
                      @endforeach
                    @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga Jual Sp</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" id="sp_price" value="{{isset($ajb) ? $ajb->surat->sp_price : ''}}" readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal Sp</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_date" name="sp_date" value="{{isset($ajb) ? $ajb->surat->sp_date : ''}}" readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">KPR Disetujui</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_kpr" name="sp_kpr" value="{{isset($ajb) ? $ajb->surat->sp_kpr_plan : ''}}" readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Blok</label>
                <div class="col-lg-9">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="sp_block" name="sp_block" value="{{isset($ajb) ? $ajb->surat->kavling->kavling_block : ''}}" readonly
                        required>
                    </div>
                    <label class="col-form-label">No</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="sp_number" name="sp_number" value="{{isset($ajb) ? $ajb->surat->kavling->kavling_number : ''}}"
                        readonly required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Luas Bangunan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_building" name="sp_building" value="{{isset($ajb) ? $ajb->surat->kavling->house->building_area_m2 : ''}}"
                    readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Luas Tanah</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_surface" name="sp_surface" value="{{isset($ajb) ? $ajb->surat->kavling->house->surface_area_m2 : ''}}"
                    readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">TL</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_tl" name="sp_tl" value="{{isset($ajb) ? $ajb->surat->sp_tl : ''}}" readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No SHGB</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_shgb" name="ajb_shgb" value="{{isset($ajb) ? $ajb->ajb_shgb : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal SHGB</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" id="sp_shgb_date" name="ajb_shgb_date" value="{{isset($ajb) ? $ajb->ajb_shgb_date : ''}}"
                      required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No IMB Pecahan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_imb" name="ajb_imb" value="{{isset($ajb) ? $ajb->ajb_imb : ''}}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal IMB</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" id="sp_imb_date" name="ajb_imb_date" value="{{isset($ajb) ? $ajb->ajb_imb_date : ''}}"
                      required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kode Sales</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_sales_id" name="sp_sales_id" value="{{isset($ajb) ? $ajb->surat->sales->id : ''}}" readonly required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Sales</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_sales_name" name="sp_sales_name" value="{{isset($ajb) ? $ajb->surat->sales->sales_name : ''}}"
                    readonly required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No SP3K</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sp_sp3k" name="ajb_sp3k" value="{{isset($ajb) ? $ajb->ajb_sp3k : ''}}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal SP3K</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" id="sp_sp3k_date" name="ajb_sp3k_date" value="{{isset($ajb) ? $ajb->ajb_sp3k_date : ''}}"
                      required>
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

  $('.pickadate-selectors').datepicker({
    autoclose: true
  });

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
      $('#sp_number').val(result.sp_house_no);
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

// var DateTimePickers = function() {
//   var _componentPickadate = function() {
//     if (!$().pickadate) {
//       console.warn('Warning - picker.js and/or picker.date.js is not loaded.');
//       return;
//     }
//     $('.pickadate-selectors').pickadate({
//       selectYears: true,
//       selectMonths: true
//     });
//   };
//   return {
//     init: function() {
//       _componentPickadate();
//     }
//   }
// }();

// document.addEventListener('DOMContentLoaded', function() {
//   DateTimePickers.init();
// });

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