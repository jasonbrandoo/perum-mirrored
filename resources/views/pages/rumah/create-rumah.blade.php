@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Rumah</span> - {{ isset($rumah) ? 'Update Rumah' : 'Create New Rumah' }}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('rumah.index') }}" class="breadcrumb-item">Rumah</a>    
<a href="#" class="breadcrumb-item">{{ isset($rumah) ? 'Update Rumah' : 'New Rumah' }}</a>    
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{ isset($rumah) ? 'Update Rumah' : 'Create New Rumah' }}</h5>
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

    @if (isset($rumah))
    <form action="{{ route('rumah.update') }}" class="form-validate-jquery" method="POST">
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $rumah->id }}">
    @else
    <form action="{{ route('rumah.store') }}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">ID Rumah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="rumah_id" value="R000{{ isset($rumah) ? $rumah->id : $id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Name Tipe Rumah </label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="rumah_type_name" value="{{ isset($rumah) ? $rumah->rumah_type_name : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah</label>
              <div class="col-lg-3">
                <input type="number" class="form-control" name="surface_area" value="{{ isset($rumah) ? $rumah->surface_area_m2 : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Luas Bangunan</label>
                <div class="col-lg-3">
                  <input type="number" class="form-control" name="building_area" value="{{ isset($rumah) ? $rumah->building_area_m2 : '' }}" required>
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
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Submit</i></button>
            </div>
          </fieldset>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
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
@endpush