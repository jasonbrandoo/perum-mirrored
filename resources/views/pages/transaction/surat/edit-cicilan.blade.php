@extends('layouts.app') 
@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Edit Cicilan</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection
 
@section('breadcrumb')
<a href="{{ route('transaction.surat-pesanan.index') }}" class="breadcrumb-item">Surat Pesanan</a>
<a href="{{ route('transaction.surat-pesanan.edit', ['id' => $cicilan->cicilan_sp_id]) }}" class="breadcrumb-item">Edit Surat Pesanan</a>
@endsection
 
@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Update Cicilan</h5>
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
    <form action="{{ route('transaction.surat-pesanan.updateCicilanSp', ['id' => $cicilan->id]) }}" class="form-validate-jquery" method="POST">
    @method('PATCH')
      <input type="hidden" name="sp_id" value="{{$cicilan->cicilan_sp_id}}"> 
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Description</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="description" value="{{$cicilan->description}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Piutang</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="piutang" value="{{$cicilan->piutang}}" required>
              </div>
            </div>
          </fieldset>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection