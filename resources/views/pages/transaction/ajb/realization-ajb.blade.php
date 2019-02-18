@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title"></h5>
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
    <form action="{{ route('transaction.ajb.store-realization')}}" class="form-validate-jquery" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Realisasi Akad:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="RAK000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Permohonan</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="realization_ajb_id" required>
                  @foreach ($ajbs as $ajb)
                    <option value=""></option>
                    <option value="{{$ajb->id}}">PAK000{{$ajb->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Max KPR:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" name="realization_max_kpr" required>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Dana Ditahan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_money_hold" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">IMB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_imb" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">STF:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_stf" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Listrik:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_listrik" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Bestek:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_bestek" required>
              </div>
            </div>            
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">PRJB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_prjb" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">PRJB 2:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_prbj_2" required>
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No STF 1:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_stf_1" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal STF 1:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="realization_stf_date_1" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No STF 2</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_stf_2" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal STF 2:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="realization_stf_2_date" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Kredit:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_kredit" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Aplikasi:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_application" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NPWP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_npwp" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NOP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="realization_nop" required>
              </div>
            </div>
          </fieldset>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Realisasi <i class="icon-paperplane ml-2"></i></button>
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