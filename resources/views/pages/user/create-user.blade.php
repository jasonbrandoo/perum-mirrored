@extends('layouts.app')

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
    @endif
    <form action="{{ route('users.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Staff ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="STF000{{$id}}" readonly>
                <input type="hidden" name="staff_id" value="{{$id}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Full Name</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="fullname">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Phone Number:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="phone_number">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Email:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="email">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Address:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="address">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Role:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="role_id">
                  @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                  @endforeach
                </select>
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
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Password:</label>
              <div class="col-lg-9">
                <input type="password" class="form-control" name="password">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Confirm Password:</label>
              <div class="col-lg-9">
                <input type="password" class="form-control" name="password_confirmation">
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