@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Payment Method Detail</h5>
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
    <form action="{{ route('role.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Role ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="role_id" value="R000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Role Name:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="role_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Description:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="role_description">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="active" value="active">
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
            <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection