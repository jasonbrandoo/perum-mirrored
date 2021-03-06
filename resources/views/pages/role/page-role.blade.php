@extends('layouts.app') 
@section('page-title')
<div class="mr-auto">
  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Role</span> - Page Authorization</h4>
  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
@endsection
 
@section('breadcrumb')
<a href="{{ route('role.index') }}" class="breadcrumb-item">Role</a>
<a href="#" class="breadcrumb-item">Page List</a>
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
          <th class="text-center" style="width: 50px">Name</th>
          <th class="text-center" style="width: 50px">Active</th>
        </tr>
      </thead>
      {{-- {{$roles_id}} --}}
      @foreach ($pages as $page)
      <tbody>
        <tr>
          <td class="text-center" style="width: 50px">{{$page->name}}</td>
          <td class="text-center" style="width: 50px"><input type="checkbox" name="active" id="{{$page->id}}" value="{{$page->id}}" {{in_array($page->id, $roles_id) ? 'checked' : ''}}></td>
        </tr>
      </tbody>
      @endforeach
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
    $('#save').text('Please wait ...').prop('disabled', true);
    $.each($('input[name=active]'), (index, elem) => {
      const checked = $(elem).is(':checked') ? ({ id: $(elem).val(), status: 'active' }) : ({ id: $(elem).val(), status: 'deactive' });
      $.ajax({
        url: '{!! route('role.update_page', $role_id) !!}',
        method: 'POST',
        data: {
          role: '{{ $role_id }}',
          page_id: checked.id,
          status: checked.status,
        },
        success: (result) => {
          console.log(result);
          window.location.reload();
        },
        error: (err) => {
          console.log(err);
        }
      });
    });
  });
});
</script>
@endpush