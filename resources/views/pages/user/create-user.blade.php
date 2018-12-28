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
    <form action="#">
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Username</label>
              <div class="col-lg-9">
                <input type="number" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Password:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Staff ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Name:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Mobile No:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Address:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Role:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc>
                  <option></option>
                    <option value="#">-</option>
                    <option value="#">-</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input">
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