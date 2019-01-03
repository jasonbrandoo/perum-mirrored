@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header bg-white header-elements-inline">
    <h6 class="card-title">Create New Customer</h6>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>

  <form class="wizard-form steps-basic" action="{{ route('transaction.surat-pesanan.store') }}" method="POST" data-fouc>
    @csrf
    <h6>1</h6>
    <fieldset>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Surat:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="no_surat">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate" name="tanggal_pesanan">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pre Book:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kode_prebook">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Active:</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="active">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No PPJB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="no_ppjb">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal PPJB:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate" name="tanggal_ppjb">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_id">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Name:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">MOU ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="mou_id">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="perusahan_id">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Perusahaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="perusahaan_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Koordinator:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="koordinator">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sales">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Supervisor:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="supervisor">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling ID:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_id">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kavling_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="blok">
                  </div>
                  <label class="col-form-label">No:</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="blok_name">
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </fieldset>

    <h6>2</h6>
    <fieldset>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Price ID:</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="price_id">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="harga_jual">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Total Harga TL:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="total_harga">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Price List:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price_list">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual Tanah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="harga_jual_tanah">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Included TL:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="included_tl">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Discount:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="discout">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Setelah Discount:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="harga_setelah_discount">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Persentase Pajak:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="persentase_pajak">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nilai Pajak:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="nilai_pajak">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Tanah dan Bangunan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="harga_tanah">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Payment Method:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="payment_method">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga jual pengikatan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="harga_jual_pengikatan">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Rencana KPR:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="rencana_kpr">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual AJB:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="harga_jual_ajb">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Total Surat Pesanan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="total_surat_pesanan">
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </fieldset>

    <h6>3</h6>
    <fieldset>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jumlah Pembayaran:</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="jumlah_pembayaran">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">DP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="dp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Subsidi:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="subsidi">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanah Lebih M2:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="tanah_lebih">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga / M2:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="m2">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Total Harga Tanah Lebih:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="total_harga_tanah_lebih">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">PPN:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="ppn">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sub Total:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="sub_total">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jumlah Harus Dibayar:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="jumlah_harus_dibayar">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran/Bulan (Internal):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="angsuran">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nilai Internal:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="nilai_internal">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran/Bulan (Kreditur):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="angsuran_kreditur">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nilai Kreditur:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="nilai_kreditur">
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </fieldset>

  </form>
</div>
@endsection