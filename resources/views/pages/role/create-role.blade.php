@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Role</span> - {{ isset($role) ? 'Update Role' : 'Create New Role' }}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('role.index') }}" class="breadcrumb-item">Role</a>    
<a href="#" class="breadcrumb-item">{{ isset($role) ? 'Update Role' : 'Create New Role' }}</a>    
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{ isset($role) ? 'Update Role' : 'Create New Role' }}</h5>
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

    @if (isset($role))
    <form action="{{ route('role.update') }}" class="form-validate-jquery" method="POST">
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $role->id }}">
    @else
    <form action="{{ route('role.store')}}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Role ID</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="role_id" value="R000{{ isset($role) ? $role->id : $id }}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Role Name</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="role_name" value="{{ isset($role) ? $role->role_name : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Description</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="role_description" value="{{ isset($role) ? $role->role_description : '' }}" >
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="active" value="active" checked>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row justify-content-center">
              <div class="col-lg-6">
                <label>Menu</label>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="role_function" value="not_selected">not selected
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="role_function" value="selected">selected
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="role_function" value="indeterminate">indeterminate
                </div>
              </div>
            </div>
          </fieldset>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
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
@endpush