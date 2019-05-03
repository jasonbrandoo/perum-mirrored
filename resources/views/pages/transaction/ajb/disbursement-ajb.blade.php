@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Pencairan Dana</h5>
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
    <form action="{{ route('transaction.ajb.store-disbursement') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Pencairan Dana:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="disbursement_realization_id" >
                  @foreach ($realizations as $realization)
                    <option value=""></option>
                    <option value="{{$realization->id}}">PAK000{{$realization->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal:</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="disbursement_realization_date">
                  </div>
                </div>
              </div>
            
          </fieldset>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Pencarian <i class="icon-paperplane ml-2"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
$(() => {
  $('.pickadate-selectors').datepicker({
    autoclose: true
  });
})
</script>
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush