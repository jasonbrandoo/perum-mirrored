@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Legal</h5>
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
              <label class="col-lg-3 col-form-label">No Document:</label>
              <div class="col-lg-9">
                <input type="number" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate" >
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHGB Induk:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate" >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHGB Pecahan:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate" >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Balik Nama:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate" >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHM:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate" >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No IMB:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate" >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NOP PBB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
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
              <label class="col-lg-3 col-form-label">No Sp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
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