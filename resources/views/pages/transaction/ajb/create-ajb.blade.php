@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New AJB</h5>
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
              <label class="col-lg-3 col-form-label">No Request:</label>
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
              <label class="col-lg-3 col-form-label">Notaris / PPAT:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Keterangan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga AJB 1:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga AJB 2:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">LT AJB 1(M2):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">LT AJB 2(M2):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHGB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal SHGB:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No IMB Pecahan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal IMB:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SP3K:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal SP3K:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Wawancara:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Wawancara:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
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
              <label class="col-lg-3 col-form-label">Tanggal Sp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual Sp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">KPR Disetujui:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control">
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer:</label>
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

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cluster:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control">
                  </div>
                  <label class="col-form-label">No:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">TL:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kreditur:</label>
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
          </fieldset>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
      </div>
    </form>
  </div>
</div>
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title"></h5>
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
              <label class="col-lg-3 col-form-label">No STF 1:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No STF 2</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Kredit:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Aplikasi:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NPWP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NOP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">PRJB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">PRJB 2:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal STF 1:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal STF 2:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Max KPR:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control">
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Dana Ditahan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">IMB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">STF:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Listrik:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Bestek:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
          </fieldset>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="btn btn-primary">Realisasi <i class="icon-paperplane ml-2"></i></button>
      </div>
    </form>
  </div>
</div>
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title"></h5>
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
              <label class="col-lg-3 col-form-label">No Pencairan Dana:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal:</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate">
                  </div>
                </div>
              </div>
            
          </fieldset>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Pencarian <i class="icon-search4 ml-2"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection