@extends('layouts.app') 
@section('page-title')
<div class="mr-auto">
  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Role</span> - Permission List</h4>
  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
@endsection
 
@section('breadcrumb')
<a href="{{ route('role.index') }}" class="breadcrumb-item">Role</a>
<a href="#" class="breadcrumb-item">Permission List</a>
@endsection
 
@section('content') @if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Permission List</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>

  <div class="card-body">
    <table class="table datatable-select-checkbox table-bordered" id="role-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Create</th>
          <th>Read</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      @foreach ($permissions as $permission)
      <tbody>
        <tr>
          <td>{{$permission->id}}</td>
          <td>{{$permission->name}}</td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="create" {{$permission->create == 0 ? '' : 'checked'}}></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="create" {{$permission->read == 0 ? '' : 'checked'}}></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="create" {{$permission->update == 0 ? '' : 'checked'}}></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="create" {{$permission->delete == 0 ? '' : 'checked'}}></td>
        </tr>
      </tbody>
      @endforeach
    </table>
    <div class="row justify-content-end">
      {{-- <div class="col"> --}}
        <button type="submit" class="btn btn-primary col-4 mt-3">Save</button>
      {{-- </div> --}}
    </div>
  </div>
</div>
@endsection
 @push('scripts') 
@endpush