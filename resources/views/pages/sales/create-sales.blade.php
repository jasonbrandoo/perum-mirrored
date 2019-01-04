@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Sales</h5>
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
    <form action="{{ route('sales.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_id">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Hp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_mobile_number">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Telp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_number">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No KTP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_no_ktp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_address">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_city">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Provinsi:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_province">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_zipcode">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jabatan:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sales_position">
                  <option></option>
                    <option value="#">Sales</option>
                    <option value="#">Supervisor</option>
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
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tidak Komisi:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="sales_komisi" value="no commmision">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Target / Bulan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales_target">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Supervisor:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sales_spv">
                  <option></option>
                    <option value="#">123-Budi</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Masuk:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate" name="sales_in">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Keluar:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate" name="sales_out">
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