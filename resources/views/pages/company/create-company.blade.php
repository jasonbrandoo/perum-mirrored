@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
      <h5 class="card-title">Create New Company</h5>
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
      <form action="{{ route('company.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kode Perusahaan / Instansi:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" placeholder="Company ID" value="P000{{$id}}" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Perusahaan / Instansi:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" placeholder="Company Name" name="company_name">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Type:</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="company_type">
                    <option></option>
                      <option value="customer">Customer</option>
                      <option value="mou">MOU</option>
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
            </fieldset>
          </div>

          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Alamat:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Alamat" class="form-control" name="company_address">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kota:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Kode Pos" class="form-control" name="company_city">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Provinsi:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Provinsi" class="form-control" name="company_province">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kode Pos:</label>
                <div class="col-lg-9">
                    <input type="text" placeholder="Kode Pos" class="form-control" name="company_zipcode">
                  </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Negara:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Negara" class="form-control" name="company_state">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Telp:</label>
                <div class="col-lg-6">
                  <input type="text" placeholder="Telp" class="form-control" name="company_phone">
                </div>
                <div class="col-lg-3">
                  <input type="text" placeholder="Ext" class="form-control" name="company_ext">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Fax:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Fax" class="form-control" name="company_fax">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Email:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Email" class="form-control" name="company_email">
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