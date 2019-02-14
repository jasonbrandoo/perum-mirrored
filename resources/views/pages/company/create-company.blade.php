@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Company</span> - {{ isset($company) ? 'Edit Company' : 'Create New Company' }}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('company.index') }}" class="breadcrumb-item">Company</a>    
<a href="" class="breadcrumb-item">{{ isset($company) ? 'Edit Company' : 'New Company' }}</a>
@endsection

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
      <h5 class="card-title">{{ isset($company) ? 'Edit Company' : 'Create New Company' }}</h5>
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

      @if (isset($company))
      <form action="{{ route('company.update') }}" class="form-validate-jquery" method="POST">
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $company->id }}">
      @else
      <form action="{{ route('company.store') }}" class="form-validate-jquery" method="POST">
      @endif
        @csrf
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kode Perusahaan / Instansi</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" placeholder="Company ID" value="P000{{ isset($company) ? $company->id : $id}}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Perusahaan / Instansi</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="{{ isset($company) ? $company->company_name : '' }}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Type</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="company_type" required>
                    @if (isset($company))
                      @if ($company->company_type == 'customer')
                        <option value="customer">Customer</option>
                        <option value="mou">MOU</option>
                      @endif
                      @if ($company->company_type == 'mou')
                        <option value="mou">MOU</option>
                        <option value="customer">Customer</option>
                      @endif
                    @else
                      <option></option>
                      <option value="customer">Customer</option>
                      <option value="mou">MOU</option>
                    @endif
                  </select>
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
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Alamat</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Alamat" class="form-control" name="company_address" value="{{ isset($company) ? $company->company_address : '' }}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kota</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Kode Pos" class="form-control" name="company_city" value="{{ isset($company) ? $company->company_city : '' }}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Provinsi</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Provinsi" class="form-control" name="company_province" value="{{ isset($company) ? $company->company_province : '' }}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kode Pos</label>
                <div class="col-lg-9">
                    <input type="number" placeholder="Kode Pos" class="form-control" name="company_zipcode" value="{{ isset($company) ? $company->company_zipcode : '' }}" required>
                  </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Negara</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Negara" class="form-control" name="company_state" value="{{ isset($company) ? $company->company_state : '' }}" required>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Telp</label>
                <div class="col-lg-6">
                  <input type="number" placeholder="Telp" class="form-control" name="company_phone" value="{{ isset($company) ? $company->company_phone : '' }}" required>
                </div>
                <div class="col-lg-3">
                  <input type="number" placeholder="Ext" class="form-control" name="company_ext" value="{{ isset($company) ? $company->company_ext : '' }}">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Fax</label>
                <div class="col-lg-9">
                  <input type="number" placeholder="Fax" class="form-control" name="company_fax" value="{{ isset($company) ? $company->company_fax : '' }}">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Email</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Email" class="form-control" name="company_email" value="{{ isset($company) ? $company->company_email : '' }}" required>
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
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
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