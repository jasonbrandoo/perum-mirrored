@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
      <h5 class="card-title">New Company</h5>
      <div class="header-elements">
        <div class="list-icons">
          <a class="list-icons-item" data-action="collapse"></a>
          <a class="list-icons-item" data-action="reload"></a>
          <a class="list-icons-item" data-action="remove"></a>
        </div>
      </div>
    </div>

    <div class="card-body">
      <form action="#">
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Company ID:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" placeholder="Company ID">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Company Name:</label>
                <div class="col-lg-9">
                  <input type="password" class="form-control" placeholder="Company Name">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Type:</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc>
                    <option></option>
                      <option value="#">Cust</option>
                      <option value="#">MOU</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Active:</label>
                <div class="col-lg-9">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input">
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
                  <input type="text" placeholder="Alamat" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kota:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Kode Pos" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Provinsi:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Provinsi" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kode Pos:</label>
                <div class="col-lg-9">
                    <input type="text" placeholder="Kode Pos" class="form-control">
                  </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Negara:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Negara" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No Telp:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Negara" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Fax:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Fax" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Email:</label>
                <div class="col-lg-9">
                  <input type="text" placeholder="Email" class="form-control">
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