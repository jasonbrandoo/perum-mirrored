@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Payment</span> - Create New Payment</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('payment.create') }}" class="breadcrumb-item">New Payment Method</a>    
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Payment Method</h5>
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
    <form action="{{ route('payment.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cara Pembayaran:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="payment_method">
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
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection