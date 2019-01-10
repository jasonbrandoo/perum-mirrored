@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Rumah</span> - Create New Rumah</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('rumah.index') }}" class="breadcrumb-item">Rumah</a>    
<a href="{{ route('rumah.create') }}" class="breadcrumb-item">New Rumah</a>    
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Rumah</h5>
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
    <form action="{{ route('rumah.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">ID Rumah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="rumah_id" value="R000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Name Tipe Rumah :</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="rumah_type_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah:</label>
              <div class="col-lg-3">
                <input type="text" class="form-control" name="surface_area">
              </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Luas Bangunan:</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control" name="building_area">
                </div>
              </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="active">
                </div>
              </div>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
            </div>
          </fieldset>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection