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
          <th>Name</th>
          <th>Create</th>
          <th>Read</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      {{-- @foreach ($permissions as $permission) --}}
      <tbody>
        <tr>
          @if ($length == 0)
          <td>{{$roles->name}}</td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="create"></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="read"></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="update"></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="delete"></td>
          @else
          <td>{{$roles->name}}</td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="create" {{array_key_exists( 'create', $permission) ? 'checked' : ''}}></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="read" {{array_key_exists( 'read', $permission) ? 'checked' : ''}}></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="update" {{array_key_exists( 'update', $permission) ? 'checked' : ''}}></td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="delete" {{array_key_exists( 'delete', $permission) ? 'checked' : ''}}></td>
          @endif
        </tr>
      </tbody>
      {{-- @endforeach --}}
    </table>
    <div class="row justify-content-end">
      {{--
      <div class="col"> --}} {{-- <input type="hidden" name="id" value="{{$roles->id}}"> --}}
        <button type="submit" id="save" class="btn btn-primary col-4 mt-3">Save</button> {{-- </div> --}}
    </div>
  </div>
</div>
@endsection
 @push('scripts')
<script>
  $(() => {
   $('#save').click((e) => {
     e.preventDefault();
    //  const id = $('input[name=id]').val();
     const c = $('input[name=create]').prop('checked') ? 'create' : '';
     const r = $('input[name=read]').prop('checked') ? 'read' : '';
     const u = $('input[name=update]').prop('checked') ? 'update' : '';
     const d = $('input[name=delete]').prop('checked') ? 'delete' : '';
     $.ajax({
       url: '{!! route('role.permission', $roles->id) !!}',
       method: 'PATCH',
       data: {
         create: c,
         read: r,
         update: u,
         delete: d
       },
       success: (result) => {
         console.log(result);
         swal({
           type: 'success',
           text: 'Success'
         });
       },
       error: (err) => {
         console.log(err);
         swal({
           type: 'error',
           text: 'Error'
         })
       }
     })
   })
 })

</script>

















@endpush