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
    <form action="{{ route('role.update') }}" method="POST">
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $role->id }}">
    @else
    <form action="{{ route('role.store')}}" method="POST">
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
                <input type="text" class="form-control" name="role_name" value="{{ isset($role) ? $role->role_name : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Description</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="role_description" value="{{ isset($role) ? $role->role_description : '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active</label>
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
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection