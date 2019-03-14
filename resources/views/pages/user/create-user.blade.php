@extends('layouts.app') 
@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Users</span> - Create New Users</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection
 
@section('breadcrumb')
<a href="{{ route('users.index') }}" class="breadcrumb-item">Users</a>
<a href="{{ route('users.create') }}" class="breadcrumb-item">New Users</a>
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
    @endif @if (isset($users))
    <form action="{{ route('users.update')}}" class="form-validate-jquery" method="POST">
      @method('PATCH')
      <input type="hidden" name="id" value="{{$users->id}}"> @else
      <form action="{{ route('users.store')}}" class="form-validate-jquery" method="POST">
        @endif @csrf
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Staff ID</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" value="STF000{{ isset($users) ? $users->id : $id}}" readonly>
                  <input type="hidden" name="staff_id" value="{{ isset($users) ? $users->id : $id }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Full Name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="fullname" value="{{ isset($users) ? $users->name : '' }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Phone Number</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="phone_number" value="{{ isset($users) ? $users->phone_number : '' }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Email</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="email" value="{{ isset($users) ? $users->email : '' }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Address</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="address" value="{{ isset($users) ? $users->address : '' }}">
                </div>
              </div>
            </fieldset>
          </div>
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Role</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="role_id" required>
                  @foreach ($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                  @endforeach
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
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Password</label>
                <div class="col-lg-9">
                  <input type="password" class="form-control" name="password" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Confirm Password</label>
                <div class="col-lg-9">
                  <input type="password" class="form-control" name="password_confirmation" required>
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