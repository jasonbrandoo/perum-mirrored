@extends('layouts.app')
@section('page-title')
<div class="mr-auto">
  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">SP</span> - {{isset($surat) ? 'Edit surat pesanan'
    : 'Create new surat pesanan'}}</h4>
  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
@if (isset($surat))
<div>
  <a href="{{isset($surat) ? route('transaction.surat-pesanan.bank.pdf', $surat->id) : ''}}"
    class="btn btn-lg btn-success"><i class="icon-printer mr-2"></i>Print (Bank)</a>
  <a href="{{isset($surat) ? route('transaction.surat-pesanan.developer.pdf', $surat->id) : ''}}"
    class="btn btn-lg btn-success"><i class="icon-printer mr-2"></i>Print (Developer)</a>
  <a href="{{isset($surat) ? route('transaction.surat-pesanan.kuitansi_pdf', $surat->id) : ''}}"
    class="btn btn-lg btn-success"><i class="icon-printer mr-2"></i>Print Kuitansi</a>
</div>
@endif
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.surat-pesanan.index') }}" class="breadcrumb-item">Surat Pesanan</a>
<a href="{{ route('transaction.surat-pesanan.create') }}"
  class="breadcrumb-item">{{isset($surat) ? 'Edit surat pesanan' : 'Create new surat pesanan'}}</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h6 class="card-title">{{isset($surat) ? 'Edit surat pesanan' : 'Create new surat pesanan'}}</h6>
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
    @endif @if (isset($surat))
    <ul class="nav nav-tabs nav-tabs-bottom">
      <li class="nav-item"><a href="#surat-pesanan" class="nav-link active" data-toggle="tab">Surat Pesanan</a></li>
      <li class="nav-item"><a href="#komisi-akad" class="nav-link" data-toggle="tab">Komisi Akad</a></li>
      <li class="nav-item"><a href="#komisi-eksternal" class="nav-link" data-toggle="tab">Komisi Eksternal</a></li>
      <li class="nav-item"><a href="#kuitansi" class="nav-link" data-toggle="tab">Kuitansi</a></li>
      <li class="nav-item"><a href="#berkas" class="nav-link" data-toggle="tab">Berkas</a></li>
      <li class="nav-item"><a href="#wawancara" class="nav-link" data-toggle="tab">Wawancara</a></li>
      <li class="nav-item"><a href="#lpa" class="nav-link" data-toggle="tab">LPA</a></li>
      <li class="nav-item"><a href="#ajb" class="nav-link" data-toggle="tab">AJB</a></li>
      <li class="nav-item"><a href="#legal" class="nav-link" data-toggle="tab">Legal</a></li>
      <li class="nav-item"><a href="#spk" class="nav-link" data-toggle="tab">SPK</a></li>
    </ul>
    @endif

    <div class="tab-content">
      <div class="tab-pane fade show active" id="surat-pesanan">
        @if (isset($surat))
        <form class="wizard-form steps-validation" action="{{ route('transaction.surat-pesanan.update') }}"
          method="POST" data-fouc>
          @method('PATCH')
          <input type="hidden" name="id" value="{{$surat->id}}"> @else
          <form class="wizard-form steps-validation" id="form_wizard"
            action="{{ route('transaction.surat-pesanan.store') }}" method="POST" data-fouc>
            @endif @csrf
            <h6>Step 1</h6>
            <fieldset>
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <fieldset>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kode Pre Book</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_prebook"
                          value="{{isset($surat) ? $surat->sp_prebook : ''}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Active</label>
                      <div class="col-lg-9">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="active" checked>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">No Surat Pesanan</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_no"
                          value="SP000{{isset($surat) ? $surat->id : $id}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Tanggal Surat Pesanan</label>
                      <div class="col-lg-9">
                        <div class="input-group">
                          <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar2"></i></span>
                          </span>
                          <input type="text" class="form-control pickadate-selectors" name="sp_date"
                            value="{{isset($surat) ? $surat->sp_date->toDateString() : ''}}" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">No PPJB</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_ppjb"
                          value="{{isset($surat) ? $surat->sp_ppjb : ''}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Tanggal PPJB</label>
                      <div class="col-lg-9">
                        <div class="input-group">
                          <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar2"></i></span>
                          </span>
                          <input type="text" class="form-control pickadate-selectors" name="sp_ppjb_date"
                            value="{{isset($surat) ? $surat->sp_ppjb_date->toDateString() : ''}}">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Customer ID</label>
                      <div class="col-lg-9">
                        <select data-placeholder="C000" class="form-control form-control-select2-customer" data-fouc
                          name="sp_customer_id" id="customer_id" required>
                          @if (isset($surat))
                          <option value="{{$surat->customer->id}}">C000{{$surat->customer->id}} -
                            {{$surat->customer->customer_name}}</option>
                          @else
                          @foreach ($customers as $customer)
                          <option></option>
                          <option value="{{$customer->id}}">C000{{$customer->id}} - {{$customer->customer_name}}
                          </option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Name</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_customer_name" id="customer_name"
                          value="{{isset($surat) ? $surat->customer->customer_name : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Perusahaan ID</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_company_id" id="customer_company"
                          value="{{isset($surat) ? $surat->company->id : ''}}" readonly>
                        {{-- <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_company_id" id="company_id"
                          required>
                        @if (isset($surat))
                          <option value="{{$surat->company->id}}">P000{{$surat->company->id}} -
                        {{$surat->company->company_name}}</option>
                        @else
                        @foreach ($companies as $company)
                        <option></option>
                        <option value="{{$company->id}}">P000{{$company->id}} - {{$company->company_name}}</option>
                        @endforeach
                        @endif
                        </select> --}}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nama Perusahaan</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_company_name" id="company_name"
                          value="{{isset($surat) ? $surat->company->company_name : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">MOU ID</label>
                      <div class="col-lg-9">
                        <select data-placeholder="Type" class="form-control form-control-select2" data-fouc
                          name="sp_mou_id" id="mou_id">
                          @if (isset($surat))
                          @if ($surat->mou === null)
                          @foreach ($mous_edit as $mou)
                          <option></option>
                          <option value="{{$mou->id}}">MOU000{{$mou->mou_coordinator}}</option>
                          @endforeach
                          @else
                          <option value="{{$surat->mou->id}}">MOU000{{$surat->mou->id}} -
                            {{$surat->mou->mou_coordinator}}</option>
                          @foreach ($mous_edit as $mou)
                          @if ($mou->id == $surat->mou->id)
                          <option></option>
                          @else
                          <option value="{{$mou->id}}">MOU000{{$mou->mou_coordinator}}</option>
                          @endif
                          @endforeach
                          @endif
                          @else
                          @foreach ($mous as $mou)
                          <option></option>
                          <option value="{{$mou->id}}">MOU000{{$mou->id}} - {{$mou->mou_coordinator}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Koordinator</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_koordinator" id="mou_supervisor"
                          value="{{isset($surat->mou) ? $surat->mou->mou_coordinator : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Sales Executives ID</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_se_id" id="sales_id"
                          value="{{isset($surat) ? $surat->sales->id : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Sales Executives name</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_se_name" id="sales_name"
                          value="{{isset($surat) ? $surat->sales->sales_name : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Supervisor ID</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_spv_id" id="supervisor_id"
                          value="{{isset($surat) ? $surat->supervisor->id : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kavling ID</label>
                      <div class="col-lg-9">
                        <select data-placeholder="BLOK" class="form-control form-control-select2-kavling" data-fouc
                          name="sp_kavling_id" id="kavling_id" required>
                          @if (isset($surat))
                          <option value="{{$surat->kavling->id}}">KAV000{{$surat->kavling->id}} - BLOK
                            {{$surat->kavling->kavling_block}} - NO {{$surat->kavling->kavling_number}} - Tipe
                            {{$surat->kavling->kavling_cluster}} -
                            {{$surat->kavling->kavling_hook === 'Active' ? 'Hook' : 'Not Hook'}}</option>
                          @else
                          @foreach ($kavlings as $kav)
                          <option></option>
                          <option value="{{$kav->id}}">KAV000{{$kav->id}} - BLOK {{$kav->kavling_block}} - NO
                            {{$kav->kavling_number}} - Tipe {{$kav->kavling_cluster}} -
                            {{$kav->kavling_hook === 'Active' ? 'Hook' : 'Not Hook'}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">House Type</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_house_type" id="house_type"
                          value="{{isset($surat) ? $surat->kavling->house->rumah_type_name : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Blok</label>
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="sp_house_block" id="house_block"
                              value="{{isset($surat) ? $surat->kavling->kavling_block : ''}}" required readonly>
                          </div>
                          <label class="col-form-label">No</label>
                          <div class="col-md-5">
                            <input type="text" class="form-control" name="sp_house_no" id="house_no"
                              value="{{isset($surat) ? $surat->kavling->id : ''}}" required readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Cluster</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_house_cluster" id="house_cluster"
                          value="{{isset($surat) ? $surat->kavling->kavling_cluster : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Luas Bangunan</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_house_building" id="house_building"
                          value="{{isset($surat) ? $surat->kavling->house->building_area_m2 : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Luas Tanah</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_house_surface" id="house_surface"
                          value="{{isset($surat) ? $surat->kavling->house->surface_area_m2 : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">TL</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="kavling_tl" name="sp_tl"
                          value="{{isset($surat) ? $surat->sp_tl : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">TT</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="kavling_tt" name="sp_tt"
                          value="{{isset($surat) ? $surat->sp_tt : ''}}" readonly>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
            </fieldset>

            <h6>Step 2</h6>
            <fieldset>
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <fieldset>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kode Harga</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="sp_price_id" id="price_id"
                          value="{{isset($surat) ? $surat->price->id : ''}}" readonly required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Harga</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_price" id="price"
                          value="{{isset($surat) ? $surat->price->price_selling : ''}}" readonly required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Total Harga TL</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_price_tl"
                          value="{{isset($surat) ? $surat->sp_price_tl : ''}}">
                      </div>
                    </div>
                    <!--<div class="form-group row">
                    <label class="col-lg-3 col-form-label">Price List</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="sp_price_list" required>
                    </div>
                  </div>-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Total Harga Jual</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_total_harga_jual"
                          value="{{isset($surat) ? $surat->sp_total_harga_jual : ''}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Harga Jual rumah</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_harga_jual_tanah"
                          value="{{isset($surat) ? $surat->sp_harga_jual_tanah : ''}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Included TL</label>
                      <div class="col-lg-9">
                        {{-- <input type="text" class="form-control" name="sp_included_tl"> --}}
                        <input type="checkbox" name="sp_included_tl">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Potongan Harga Jual (Nominal)</label>
                      <div class="col-lg">
                        <input type="text" placeholder="0" class="form-control price" name="sp_discount_nominal"
                          value="{{isset($surat) ? $surat->sp_discount : ''}}">
                      </div>
                      <label class="col-form-label">(Persen%)</label>
                      <div class="col-lg">
                        <input type="text" placeholder="0" class="form-control price" name="sp_discount"
                          value="{{isset($surat) ? $surat->sp_discount : ''}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Harga Setelah Discount</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_after_discount"
                          value="{{isset($surat) ? $surat->sp_after_discount : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Persentase Pajak (%)</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_ppn_percentage"
                          value="{{isset($surat) ? $surat->sp_ppn_percentage : ''}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nilai Pajak</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_after_ppn"
                          value="{{isset($surat) ? $surat->sp_after_ppn : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Harga Tanah dan Bangunan</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_harga_tanah_bangunan"
                          value="{{isset($surat) ? $surat->sp_harga_tanah_bangunan : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Cara Pembayaran</label>
                      <div class="col-lg-9">
                        <select data-placeholder="Type" class="form-control form-control-select2" data-fouc
                          name="sp_payment_method" required>
                          @if (isset($surat))
                          <option value="{{$surat->paymentMethod->id}}">{{$surat->paymentMethod->payment_method}}
                          </option>
                          @foreach ($payments as $pay)
                          @if ($pay->id == $surat->paymentMethod->id)
                          <option></option>
                          @else
                          <option value="{{$pay->id}}">{{$pay->payment_method}}</option>
                          @endif
                          @endforeach
                          @else
                          @foreach ($payments as $pay)
                          <option></option>
                          <option value="{{$pay->id}}">{{$pay->payment_method}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Harga jual pengikatan</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_harga_jual_pengikatan"
                          value="{{isset($surat) ? $surat->sp_harga_jual_pengikatan : ''}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Harga Jual AJB</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_ajb_price"
                          value="{{isset($surat) ? $surat->sp_ajb_price : ''}}" required>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
            </fieldset>

            <h6>Step 3</h6>
            <fieldset>
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <fieldset>
                    <hr>
                    <h2>Biaya Lain</h2>
                    <div id="sections">
                      <div class="section">
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Deskripsi</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control biayaLainDescription" name="sp_description[]">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nominal</label>
                          <div class="col-lg-3">
                            <input type="text" class="form-control" id="biayaLainNominal"
                              name="sp_description_nominal[]">
                          </div>
                          <div class="col-lg-3">
                            <select name="sp_biaya_lain_status[]" id="biayaLainStatus" class="form-control">
                              <option value="" disabled selected>Ditambah / Dikurang</option>
                              <option value="Ditambah">Ditambah</option>
                              <option value="Dikurang">Dikurang</option>
                            </select>
                          </div>
                          <div class="col-lg-3">
                            <select name="sp_biaya_lain_diperhitungkan[]" id="biayaLainDiperhitungkan"
                              class="form-control">
                              <option value="" disabled selected>Developer / Kontraktor</option>
                              <option value="Developer">Developer</option>
                              <option value="Contractor">Contractor</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="ml-auto">
                        <button type="button" class="btn btn-primary rounded-round removeRowButton">-</button>
                        <button type="button" class="btn btn-primary rounded-round addRowButton">+</button>
                        <button type="button" class="btn btn-primary rounded-round addButton">Add</button>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Subsidi</label>
                      <div class="col-lg-9">
                        <input type="checkbox" name="sp_subsidi" checked>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Tanah Lebih M2</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_tanah_lebih" id="kavling_tanah_lebih"
                          value="{{isset($surat) ? $surat->sp_tanah_lebih : ''}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Harga / M2</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_harga_m2" id="kavling_tanah_m2"
                          value="{{isset($surat) ? $surat->sp_harga_m2 : ''}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Total Harga Tanah Lebih</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_total_harga_tanah_lebih"
                          value="{{isset($surat) ? $surat->sp_total_harga_tanah_lebih : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Rencana KPR</label>
                      <div class="col-lg-3">
                        <input type="text" id="kpr_plan" class="form-control" name="sp_kpr_plan"
                          value="{{isset($surat) ? $surat->sp_kpr_plan : ''}}">
                      </div>
                      <label class="col-form-label">%</label>
                      <div class="col-lg">
                        <input type="text" class="form-control price" id="kpr_plan_percen" name="sp_kpr_plan_percentage"
                          value="{{isset($surat) ? $surat->sp_kpr_plan_percentage : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">DP</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" id="sp_dp" name="sp_dp"
                          value="{{isset($surat) ? $surat->sp_dp : ''}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">PPN Harga Lebih</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_ppn"
                          value="{{isset($surat) ? $surat->sp_ppn : ''}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Sub Total</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_sub_total"
                          value="{{isset($surat) ? $surat->sp_sub_total : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Booking Fee</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" id="sp_booking_fee" name="sp_booking_fee"
                          value="{{isset($surat) ? $surat->sp_booking_fee : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jumlah Harus Dibayar</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_total_bill"
                          value="{{isset($surat) ? $surat->sp_total_bill : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Angsuran/Bulan (Internal)</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_per_month_internal"
                          value="{{isset($surat) ? $surat->sp_per_month_internal : ''}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nilai Internal</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_internal_bill"
                          value="{{isset($surat) ? $surat->sp_internal_bill : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Angsuran/Bulan (Kreditur)</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_per_month_kreditur"
                          value="{{isset($surat) ? $surat->sp_per_month_kreditur : ''}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nilai Kreditur</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_kreditur_bill"
                          value="{{isset($surat) ? $surat->sp_kreditur_bill : ''}}" required readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Angsuran/Bulan (Kontraktor)</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_per_month_contractor"
                          value="{{isset($surat) ? $surat->sp_per_month_contractor : ''}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nilai Kontraktor</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_contractor_bill"
                          value="{{isset($surat) ? $surat->sp_contractor_bill : ''}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Total Surat Pesanan</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control price" name="sp_total"
                          value="{{isset($surat) ? $surat->sp_total : ''}}" required>
                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
            </fieldset>

            @if (isset($surat))
            <h6>Step 4</h6>
            <fieldset>
              <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a href="#piutang-internal" class="nav-link active" data-toggle="tab">Internal /
                    Developer</a></li>
                <li class="nav-item"><a href="#piutang-kreditur" class="nav-link" data-toggle="tab">Kreditur</a></li>
                <li class="nav-item"><a href="#piutang-kontraktor" class="nav-link" data-toggle="tab">Kontraktor</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="piutang-internal">
                  <table class="table table-bordered mb-5" id="result">
                    <thead>
                      <tr>
                        <th>Seq</th>
                        <th>Description</th>
                        <th>Piutang</th>
                        <th>Tgl</th>
                        <th>Tgl Pembayaran</th>
                        <th>Status</th>
                        <th><i class="icon-printer"></i></th>
                      </tr>
                    </thead>
                  </table>

                  <div class="d-flex">
                    <div class="col-3">
                      <h3>Total Lunas</h3>
                      <h3>Rp. {{$totalLunas}}</h3>
                    </div>
                    <div class="col-9">
                      <h3>Total Belum Lunas</h3>
                      <h3>Rp. {{$totalBelumLunas}}</h3>
                    </div>
                  </div>

                  <input type="hidden" name="piutang" id="piutang">
                  <input type="hidden" name="internal" id="internal">
                </div>
                <div class="tab-pane fade" id="piutang-kreditur">
                  <table class="table table-bordered mb-5" id="kreditur">
                    <thead>
                      <tr>
                        <th>Seq</th>
                        <th>Description</th>
                        <th>Piutang</th>
                        <th>Tanggal</th>
                        <th></th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="tab-pane fade" id="piutang-kontraktor">
                  <table class="table table-bordered mb-5" id="kontraktor">
                    <thead>
                      <tr>
                        <th>Seq</th>
                        <th>Description</th>
                        <th>Piutang</th>
                        <th>Tanggal</th>
                        <th>Tgl Pembayaran</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </fieldset>
            @endif

          </form>
      </div>
      <div class="tab-pane fade" id="komisi-akad">
        <table class="table datatable-select-checkbox table-bordered" id="akad-table">
          <thead>
            <tr>
              <th></th>
              <th>Request No</th>
              <th>Tanggal</th>
              <th>Nomor SP</th>
              <th>Tanggal SP</th>
              <th>Tanggal AJB</th>
              <th>Active</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tab-pane fade" id="komisi-eksternal">
        <table class="table datatable-select-checkbox table-bordered" id="eksternal-table">
          <thead>
            <tr>
              <th></th>
              <th>Request No</th>
              <th>Tanggal</th>
              <th>Nomor MOU</th>
              <th>Nomor SP</th>
              <th>Tanggal SP</th>
              <th>Tanggal AJB</th>
              <th>Active</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tab-pane fade" id="kuitansi">
        <table class="table datatable-select-checkbox table-bordered" id="kuitansi-table">
          <thead>
            <tr>
              <th></th>
              <th>No Kwitansi</th>
              <th>Tgl Kwitansi</th>
              <th>No SP</th>
              <th>Nama Staff</th>
              <th>Customer</th>
              <th>Method</th>
              <th>Active</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tab-pane fade" id="berkas">
        <table class="table datatable-select-checkbox table-bordered" id="berkas-table">
          <thead>
            <tr>
              <th></th>
              <th>No Berkas</th>
              <th>Tgl Penerimaan</th>
              <th>Penerima</th>
              <th>No SP</th>
              <th>Customer</th>
              <th>Active</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tab-pane fade" id="wawancara">
        <table class="table datatable-select-checkbox" id="wawancara-table">
          <thead>
            <tr>
              <th></th>
              <th>Plan No</th>
              <th>Tgl Plan</th>
              <th>No SP</th>
              <th>Customer</th>
              <th>Analyst</th>
              <th>Tgl Realisasi</th>
              <th>Status</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tab-pane fade" id="lpa">
        <table class="table datatable-select-checkbox" id="lpa-table">
          <thead>
            <tr>
              <th></th>
              <th>No LPA</th>
              <th>Tanggal</th>
              <th>Type</th>
              <th>No SP</th>
              <th>Customer</th>
              <th>Kavling</th>
              <th>Active</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tab-pane fade" id="ajb">
        <table class="table datatable-select-checkbox table-bordered" id="ajb-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Tgl</th>
              <th>Notaris</th>
              <th>No SP</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tab-pane fade" id="legal">
        <table class="table datatable-select-checkbox" id="legal-table">
          <thead>
            <tr>
              <th></th>
              <th>No</th>
              <th>Tanggal</th>
              <th>SHGB Induk</th>
              <th>SHGB Pecahan</th>
              <th>No SP</th>
              <th>Active</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tab-pane fade" id="spk">
        <table class="table datatable-select-checkbox" id="spk-table">
          <thead>
            <tr>
              <th></th>
              <th>No SPK</th>
              <th>Tanggal</th>
              <th>No SP</th>
              <th>Customer</th>
              <th>Active</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
    $("#customer_id").on("change", function(e) {
      var id = $(this).val();
      $.ajax({
        url: "{{route('transaction.surat-pesanan.load_customer')}}",
        data: {
          id: id
        },
        success: function(result) {
          $("#customer_name").val(result.customer_name);
          $("#sales_id").val(result.sales_executive.id);
          $("#sales_name").val(result.sales_executive.sales_name);
          $("#supervisor_id").val(result.sales_supervisor.id);
          $("#customer_company").val(result.company.id);
          $("#company_name").val(result.company.company_name);
        },
        error: function(e) {
          console.log(e);
        }
      });
    });

    $("#mou_id").on("change", function(e) {
      var id = $(this).val();
      $.ajax({
        url: "{{route('transaction.surat-pesanan.load_mou')}}",
        data: {
          id: id
        },
        success: function(result) {
          $("#mou_supervisor").val(result.mou_coordinator);
        },
        error: function(e) {
          console.log(e);
        }
      });
    });

    $("#sales_id").on("change", function(e) {
      var id = $(this).val();
      $.ajax({
        url: "{{route('transaction.surat-pesanan.load_sales')}}",
        data: {
          id: id
        },
        success: function(result) {
          $("#sales_name").val(result.sales_name);
        },
        error: function(e) {
          console.log(e);
        }
      });
    });

    $("#kavling_id").on("change", function(e) {
      var id = $(this).val();
      $.ajax({
        url: "{{route('transaction.surat-pesanan.load_kavling')}}",
        data: {
          id: id
        },
        success: function(result) {
          $("#house_type").val(result.price.house.rumah_type_name);
          $("#house_block").val(result.kavling_block);
          $("#house_cluster").val(result.kavling_cluster);
          $("#house_no").val(result.kavling_number);
          $("#house_building").val(result.price.house.building_area_m2);
          $("#house_surface").val(result.price.house.surface_area_m2);
          $("#price_id").val(`H000${result.price.id}`);
          $("#price").val($.number(result.price.price_selling));
          $("input[name=sp_total_harga_jual]").val(result.price.price_selling);
          $("#kavling_tl").val(result.kavling_tl_active);
          const tt = parseFloat(result.kavling_surface);
          $("#kavling_tt").val(tt);
          $("#kavling_tanah_lebih").val(result.kavling_tl_active);
          $("#kavling_tanah_m2").val(result.price.price_surface_m2);
          $("input[name=sp_total_harga_tanah_lebih]").val(
            result.price.price_surface_m2
          );
          $("#sp_booking_fee").val(result.price.price_booking);
        },
        error: function(e) {
          console.log(e);
        }
      });
    });

    $("#kpr_plan").change(e => {
      const ajb = parseFloat($("input[name=sp_ajb_price]").val()) || 0;
      const dp = parseFloat($("input[name=sp_dp]").val()) || 0;
      const inputVal = parseFloat(e.target.value) || 0;
      const res = $("#kpr_plan_percen").val(ajb * (inputVal / 100));
      const float = res[0].value;
      const replacer = parseFloat(float.replace(/,/g, ""));
      $("#sp_dp").val(ajb - replacer);
    });

    const price = parseFloat($("input[name=sp_price]").val()) || 0;

    $("input[name=sp_price_tl]").keyup(() => {
      const tl = parseFloat($("input[name=sp_price_tl]").val()) || 0;
      const price = parseFloat($("input[name=sp_price]").val()) || 0;
      $("input[name=sp_total_harga_jual]").val(tl + price);
    });

    $("input[name=sp_harga_jual_tanah").on(
      "keyup keydown keypress change",
      () => {
        const tanah = parseFloat($("input[name=sp_harga_jual_tanah").val()) || 0;
        $("input[name=sp_after_discount]").val(tanah);
      }
    );

    $("input[name=sp_included_tl").click(() => {
      const tl = parseFloat($("input[name=sp_price_tl]").val()) || 0;
      const price = parseFloat($("input[name=sp_price]").val()) || 0;
      const total = $("input[name=sp_total_harga_jual]").val(tl + price);
      $("input[name=sp_harga_jual_tanah]").val(price);
      if ($("input[name=sp_included_tl").prop("checked")) {
        $("input[name=sp_harga_jual_tanah]").val($.number(total.val()));
      } else {
        $("input[name=sp_harga_jual_tanah]").val(price);
      }
    });

    $("input[name=sp_discount]").keyup(() => {
      const discount = parseFloat($("input[name=sp_discount]").val()) || 0;
      const rumah = parseFloat($("input[name=sp_harga_jual_tanah]").val()) || 0;
      const afterDiscount = $("input[name=sp_after_discount]").val(
        rumah - (discount * rumah) / 100
      );
      $("input[name=sp_discount_nominal").val(0);
      $("input[name=sp_harga_tanah_bangunan]").val(afterDiscount.val());
    });

    $("input[name=sp_discount_nominal]").keyup(() => {
      const discount =
        parseFloat($("input[name=sp_discount_nominal]").val()) || 0;
      const rumah = parseFloat($("input[name=sp_harga_jual_tanah]").val()) || 0;
      $("input[name=sp_after_discount]").val(rumah - discount);
      $("input[name=sp_discount").val(0);
    });

    $("input[name=sp_ppn_percentage]").keyup(() => {
      const total = parseFloat($("input[name=sp_total_harga_jual]").val()) || 0;
      const rumah = parseFloat($("input[name=sp_harga_jual_tanah]").val()) || 0;
      const ppn = parseFloat($("input[name=sp_ppn_percentage]").val()) || 0;
      const afterDiscount =
        parseFloat($("input[name=sp_after_discount]").val()) || 0;
      const afterPpn = $("input[name=sp_after_ppn").val(
        ppn * (afterDiscount / 100)
      );
      const tanah = $("input[name=sp_harga_tanah_bangunan]").val(
        parseFloat(afterPpn.val()) + afterDiscount
      );
      $("input[name=sp_harga_jual_pengikatan]").val(tanah.val());
      $("input[name=sp_ajb_price]").val(tanah.val());
    });

    $("input[name=sp_dp], input[name=sp_ppn]").change(() => {
      const booking = parseFloat($("input[name=sp_booking_fee]").val()) || 0;
      const hargaTanahLebih =
        parseFloat($("input[name=sp_total_harga_tanah_lebih]").val()) || 0;
      const dp = parseFloat($("input[name=sp_dp]").val()) || 0;
      const ppn = parseFloat($("input[name=sp_ppn]").val()) || 0;
      const sub = $("input[name=sp_sub_total]").val(hargaTanahLebih + dp + ppn);
      const subEl = sub[0].value;
      const subTotal = parseFloat(subEl.replace(/,/g, ""));
      const total = parseFloat($("input[name=sp_total_bill]").val()) || 0;
      $("input[name=sp_total]").val(subTotal + booking);
      console.log("total", total);
      console.log("dp", dp);
      console.log("ppn", ppn);
      if (total) {
        $("input[name=sp_total_bill]").val(total + dp + ppn);
      } else {
        $("input[name=sp_total_bill]").val(dp + ppn);
      }
    });

    const template = $("#sections .section:first").clone();
    let sectionCount = 1;

    $("body").on("click", ".addRowButton", () => {
      sectionCount++;
      const section = template
        .clone(true)
        .find(":input")
        .val("")
        .each((index, element) => {
          const newId = element.id + sectionCount;
          $(element).prev();
          element.id = newId;
        })
        .end()
        .appendTo("#sections");
      return false;
    });

    $("body").on("click", ".removeRowButton", function() {
      $("#sections .section:last").fadeOut(300, function() {
        $(this).remove();
        console.log($(this));
        return false;
      });
      return false;
    });
    console.log({ total: $("input[name=sp_total_bill]").val() });
    $(".addButton").click(() => {
      console.log($('#biayaLainDiperhitungkan').val());
      if ($('#biayaLainDiperhitungkan').val() === null || $('#biayaLainStatus').val() === null) {
        swal({
          type: "error",
          text: "Please select all options",
          confirmButtonClass: "btn btn-primary"
        })
      } else {
        const totalBill = parseFloat($("input[name=sp_total_bill]").val());
        let arrayDev = [];
        let arrayCon = [];
        const diperhitungkan = $(
          'select[name="sp_biaya_lain_diperhitungkan[]"]'
        ).each(function(i, e) {
          const val = $(e).val();
          if (val === "Developer") {
            const valueEl = $('input[name="sp_description_nominal[]"]')[i];
            const nominal = parseFloat($(valueEl).val());
            arrayDev.push(nominal);
            const sum = arrayDev.reduce((acc, cur) => {
              return acc + cur;
            }, 0);
            if (totalBill) {
              $("input[name=sp_total_bill]").val(totalBill + sum);
            } else {
              $("input[name=sp_total_bill]").val(sum);
            }
          }
          if (val === "Contractor") {
            const valueEl = $('input[name="sp_description_nominal[]"]')[i];
            const nominal = parseFloat($(valueEl).val());
            arrayCon.push(nominal);
            const sum = arrayCon.reduce((acc, cur) => {
              return acc + cur;
            }, 0);
            console.log("Contractor", arrayCon);
            console.log("sum", sum);
            $("input[name=sp_contractor_bill]").val(sum);
          }
        });
      }
    });

    $("input[name=sp_per_month_internal]").change(() => {
      const totalBill = parseFloat($("input[name=sp_total_bill]").val()) || 0;
      const internal =
        parseFloat($("input[name=sp_per_month_internal]").val()) || 0;
      $("input[name=sp_internal_bill]").val(Math.round(totalBill / internal));
    });

    $("input[name=sp_per_month_kreditur]").change(() => {
      const totalBill = parseFloat($("input[name=sp_total_bill]").val()) || 0;
      const kreditur =
        parseFloat($("input[name=sp_per_month_kreditur]").val()) || 0;
      $("input[name=sp_kreditur_bill]").val(Math.round(totalBill / kreditur));
    });

    $("input[name=sp_per_month_contractor]").change(() => {
      const totalContractor = parseFloat(
        $("input[name=sp_contractor_bill]").val()
      );
      const contractor =
        parseFloat($("input[name=sp_per_month_contractor]").val()) || 0;
      $("input[name=sp_contractor_bill]").val(
        Math.round(totalContractor / contractor)
      );
    });

    const internal =
      parseFloat($("input[name=sp_per_month_internal]").val()) || 0;
    const booking = parseFloat($("input[name=sp_booking_fee]").val()) || 0;
    const subTotal = parseFloat($("input[name=sp_sub_total]").val()) || 0;
    const piutang = Math.round(booking / internal);
    console.log(internal);
    $("#internal").val(internal);
    $("#piutang").val(piutang);
  });

  var FormWizard = (function() {
    var _componentWizard = function() {
      if (!$().steps) {
        console.warn("Warning - steps.min.js is not loaded.");
        return;
      }

      if (!$().validate) {
        console.warn("Warning - validate.min.js is not loaded.");
        return;
      }

      var form = $(".steps-validation").show();

      $(".steps-validation").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        titleTemplate: '<span class="number">#index#</span> #title#',
        labels: {
          previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
          next: 'Next <i class="icon-arrow-right14 ml-2" />',
          finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
        },
        transitionEffect: "fade",
        autoFocus: true,
        onStepChanging: function(event, currentIndex, newIndex) {
          // Allways allow previous action even if the current form is not valid!
          if (currentIndex > newIndex) {
            return true;
          }

          // Needed in some cases if the user went back (clean up)
          if (currentIndex < newIndex) {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
          }

          form.validate().settings.ignore = ":disabled,:hidden";
          return form.valid();
        },
        onFinishing: function(event, currentIndex) {
          form.validate().settings.ignore = ":disabled";
          return form.valid();
        },
        onFinished: function(event, currentIndex) {
          swal({
            type: "success",
            title: "Success"
          });
          event.target.submit();
        }
      });

      $(".steps-validation").validate({
        ignore: "input[type=hidden], .select2-search__field", // ignore hidden fields
        errorClass: "validation-invalid-label",
        highlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {
          // Unstyled checkboxes, radios
          if (element.parents().hasClass("form-check")) {
            error.appendTo(element.parents(".form-check").parent());
          }

          // Input with icons and Select2
          else if (
            element.parents().hasClass("form-group-feedback") ||
            element.hasClass("select2-hidden-accessible")
          ) {
            error.appendTo(element.parent());
          }

          // Input group, styled file input
          else if (
            element.parent().is(".uniform-uploader, .uniform-select") ||
            element.parents().hasClass("input-group")
          ) {
            error.appendTo(element.parent().parent());
          }

          // Other elements
          else {
            error.insertAfter(element);
          }
        },
        rules: {
          sp_ppn_percentage: {
            max: 100
          },
          "sp_description_nominal[]": {
            number: true
          }
        }
      });
    };

    var _componentUniform = function() {
      if (!$().uniform) {
        console.warn("Warning - uniform.min.js is not loaded.");
        return;
      }

      // Initialize
      $(".form-input-styled").uniform({
        fileButtonClass: "action btn bg-blue"
      });
    };
    var _componentSelect2 = function() {
      if (!$().select2) {
        console.warn("Warning - select2.min.js is not loaded.");
        return;
      }

      // Initialize
      var $select = $(".form-control-select2-customer").select2({
        minimumResultsForSearch: Infinity,
        minimumInputLength: 4,
        width: "100%"
      });

      var $select = $(".form-control-select2-kavling").select2({
        minimumResultsForSearch: Infinity,
        minimumInputLength: 4,
        width: "100%"
      });

      var $customer = $(".form-control-select2").select2({
        minimumResultsForSearch: Infinity,
        width: "100%"
      });

      // Trigger value change when selection is made
      $select.on("change", function() {
        $(this).trigger("blur");
      });

      $customer.on("change", function() {
        $(this).trigger("blur");
      });
    };

    return {
      init: function() {
        _componentWizard();
        _componentUniform();
        _componentSelect2();
      }
    };
  })();

  document.addEventListener("DOMContentLoaded", function() {
    FormWizard.init();
  });

  var DateTimePickers = (function() {
    var _componentPickadate = function() {
      if (!$().pickadate) {
        console.warn("Warning - picker.js and/or picker.date.js is not loaded.");
        return;
      }
      $(".pickadate-selectors").datepicker({
        autoclose: true
      });
    };
    return {
      init: function() {
        _componentPickadate();
      }
    };
  })();

  document.addEventListener("DOMContentLoaded", function() {
    DateTimePickers.init();
  });
</script>
@if (isset($surat))
<script>
  var DatatableSelect = (function() {
    var _componentDatatableSelect = function() {
      if (!$().DataTable) {
        console.warn("Warning - datatables.min.js is not loaded.");
        return;
      }

      $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [
          {
            orderable: false,
            width: 100
          }
        ],
        dom:
          '<"datatable-header"flB><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
          search: "<span>Search:</span> _INPUT_",
          searchPlaceholder: "Type to search...",
          lengthMenu: "<span>Show:</span> _MENU_",
          paginate: {
            first: "First",
            last: "Last",
            next: $("html").attr("dir") == "rtl" ? "&larr;" : "&rarr;",
            previous: $("html").attr("dir") == "rtl" ? "&rarr;" : "&larr;"
          }
        }
      });

      $("#akad-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.akad', $surat->id) !!}",
        columns: [
          {
            data: "id",
            className: "select-checkbox",
            orderable: false,
            render: () => ""
          },
          {
            data: "id",
            render: (data, type, row) =>
              `<a href="/transaction/komisi-akad/${row.id}/edit">TBK000${
                row.id
              }</a>`
          },
          {
            data: "akad_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "akad_sp_id"
          },
          {
            data: "surat.sp_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "akad_ajb_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "active",
            className: "text-center",
            render: active =>
              active === "Active"
                ? '<span class="badge badge-primary">Active</span>'
                : '<span class="badge badge-danger">Deactive</span>'
          }
        ],
        select: {
          style: "os"
        },
        buttons: [
          {
            extend: "collection",
            text: "Select Action",
            className: "btn",
            buttons: [
              {
                text: "Deactive",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/komisi-akad/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Deactive"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              },
              {
                text: "Active",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/komisi-akad/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Active"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              }
            ]
          }
        ]
      });

      $("#eksternal-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.eksternal', $surat->id) !!}",
        columns: [
          {
            data: "id",
            className: "select-checkbox",
            orderable: false,
            render: () => ""
          },
          {
            data: "id",
            render: (data, type, row) =>
              `<a href="/transaction/komisi-eksternal/${row.id}/edit">KE000${
                row.id
              }</a>`
          },
          {
            data: "eksternal_date",
            render: date => moment(date).format("D MMMM YYYY")
          },
          {
            data: "mou.id"
          },
          {
            data: "eksternal_sp_id"
          },
          {
            data: "surat.sp_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "eksternal_ajb_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "active",
            className: "text-center",
            render: active =>
              active === "Active"
                ? '<span class="badge badge-primary">Active</span>'
                : '<span class="badge badge-danger">Deactive</span>'
          }
        ],
        select: {
          style: "os"
        },
        buttons: [
          {
            extend: "collection",
            text: "Select Action",
            className: "btn __active",
            buttons: [
              {
                text: "Deactive",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/komisi-eksternal/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Deactive"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              },
              {
                text: "Active",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/komisi-eksternal/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Active"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              }
            ]
          }
        ]
      });

      $("#kuitansi-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.kuitansi', $surat->id) !!}",
        columns: [
          {
            data: "id",
            className: "select-checkbox",
            orderable: false,
            render: () => ""
          },
          {
            data: "id",
            render: (data, type, row) =>
              `<a href="/transaction/kwitansi/${row.id}/edit">KRF000${row.id}</a>`
          },
          {
            data: "kwitansi_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "kwitansi_sp_id"
          },
          {
            data: "kwitansi_staff_name"
          },
          {
            data: "surat.customer.customer_name"
          },
          {
            data: "payment.payment_method"
          },
          {
            data: "active",
            className: "text-center",
            render: active =>
              active === "Active"
                ? '<span class="badge badge-primary">Active</span>'
                : '<span class="badge badge-danger">Deactive</span>'
          }
        ],
        select: {
          style: "os"
        },
        buttons: [
          {
            extend: "collection",
            text: "Select Action",
            className: "btn __active",
            buttons: [
              {
                text: "Deactive",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/kwitansi/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Deactive"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              },
              {
                text: "Active",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/kwitansi/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Active"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              }
            ]
          }
        ]
      });

      $("#berkas-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.berkas', $surat->id) !!}",
        columns: [
          {
            data: "id",
            className: "select-checkbox",
            orderable: false,
            render: () => ""
          },
          {
            data: "id",
            render: (data, type, row) =>
              `<a href="/transaction/berkas/${row.id}/edit">TBK000${row.id}</a>`
          },
          {
            data: "berkas_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "berkas_reciever_id",
            render: (data, type, row) => row.user.name
          },
          {
            data: "berkas_sp_id"
          },
          {
            data: "surat.customer.customer_name"
          },
          {
            data: "active",
            className: "text-center",
            render: active =>
              active === "Active"
                ? '<span class="badge badge-primary">Active</span>'
                : '<span class="badge badge-danger">Deactive</span>'
          }
        ],
        select: {
          style: "os"
        },
        buttons: [
          {
            extend: "collection",
            text: "Select Action",
            className: "btn",
            buttons: [
              {
                text: "Deactive",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/berkas/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Deactive"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              },
              {
                text: "Active",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/berkas/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Active"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              }
            ]
          }
        ]
      });

      $("#wawancara-table").DataTable({
        dom:
          '<"datatable-header"><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.wawancara', $surat->id) !!}",
        columns: [
          {
            data: "id",
            className: "select-checkbox",
            orderable: false,
            render: () => ""
          },
          {
            data: "id",
            render: id => `RW000${id}`
          },
          {
            data: "wawancara_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "wawancara_sp_id"
          },
          {
            data: "surat.customer.customer_name"
          },
          {
            data: "wawancara_analyst"
          },
          {
            data: "realisasi.rlw_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "wawancara_status"
          }
        ],
        select: {
          style: "multi"
        }
      });

      $("#lpa-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.lpa', $surat->id) !!}",
        columns: [
          {
            data: "id",
            className: "select-checkbox",
            orderable: false,
            render: () => ""
          },
          {
            data: "id",
            render: (data, type, row) =>
              `<a href="/transaction/lpa/${row.id}/edit">KRF000${row.id}</a>`
          },
          {
            data: "lpa_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "lpa_type"
          },
          {
            data: "lpa_sp_id"
          },
          {
            data: "surat.customer.customer_name"
          },
          {
            data: "surat.kavling.kavling_cluster"
          },
          {
            data: "active",
            className: "text-center",
            render: active =>
              active === "Active"
                ? '<span class="badge badge-primary">Active</span>'
                : '<span class="badge badge-danger">Deactive</span>'
          }
        ],
        select: {
          style: "os"
        },
        buttons: [
          {
            extend: "collection",
            text: "Select Action",
            className: "btn __active",
            buttons: [
              {
                text: "Deactive",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/lpa/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Deactive"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              },
              {
                text: "Active",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/lpa/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Active"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              }
            ]
          }
        ]
      });

      $("#ajb-table").DataTable({
        dom:
          '<"datatable-header"><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.ajb', $surat->id) !!}",
        columns: [
          {
            data: "id"
          },
          {
            data: "ajb_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "ajb_notaris"
          },
          {
            data: "ajb_sp_id"
          }
        ],
        select: {
          style: "multi"
        }
      });

      $("#legal-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.legal', $surat->id) !!}",
        columns: [
          {
            data: "id",
            className: "select-checkbox",
            orderable: false,
            render: () => ""
          },
          {
            data: "id",
            render: (data, type, row) =>
              `<a href="/transaction/legal/${row.id}/edit">KRF000${row.id}</a>`
          },
          {
            data: "legal_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "legal_shgb_parent_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "legal_shgb_fraction_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "surat.id"
          },
          {
            data: "active",
            className: "text-center",
            render: active =>
              active === "Active"
                ? '<span class="badge badge-primary">Active</span>'
                : '<span class="badge badge-danger">Deactive</span>'
          }
        ],
        select: {
          style: "os"
        },
        buttons: [
          {
            extend: "collection",
            text: "Select Action",
            className: "btn __active",
            buttons: [
              {
                text: "Deactive",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/legal/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Deactive"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              },
              {
                text: "Active",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/legal/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Active"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              }
            ]
          }
        ]
      });

      $("#spk-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.spk', $surat->id) !!}",
        columns: [
          {
            data: "id",
            className: "select-checkbox",
            orderable: false,
            render: () => ""
          },
          {
            data: "id",
            render: id => `<a href="/transaction/spk/${id}/edit">SPK000${id}</a>`
          },
          {
            data: "spk_date",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "spk_sp_id"
          },
          {
            data: "surat.customer.customer_name"
          },
          {
            data: "active",
            className: "text-center",
            render: active =>
              active === "Active"
                ? '<span class="badge badge-primary">Active</span>'
                : '<span class="badge badge-danger">Deactive</span>'
          }
        ],
        select: {
          style: "os"
        },
        buttons: [
          {
            extend: "collection",
            text: "Select Action",
            className: "btn",
            buttons: [
              {
                text: "Deactive",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/spk/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Deactive"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              },
              {
                text: "Active",
                className: "_active",
                action: (e, dt, type, indexes) => {
                  const { id } = dt.row({ selected: true }).data();
                  $.ajax({
                    url: `/transaction/spk/${id}/action`,
                    type: "PATCH",
                    data: {
                      id: id,
                      active: "Active"
                    },
                    success: response => {
                      swal({
                        type: "success",
                        text: "Success"
                      }).then(() => {
                        window.location.reload();
                      });
                      console.log(response);
                    },
                    error: err => {
                      swal({
                        type: "error",
                        text: "Error"
                      });
                    }
                  });
                }
              }
            ]
          }
        ]
      });

      $("#result").DataTable({
        dom:
          '<"datatable-header"><"datatable-scroll-wrap"t><"datatable-footer"ipB>',
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.cicilan', $surat->id) !!}",
        columns: [
          {
            data: "no",
            render: (data, type, row, meta) => {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            data: "description",
            render: (data, type, row) => `<span><a href="/transaction/surat-pesanan/edit_cicilan/${row.id}">${row.description}</a></span>` || console.log(row)
          },
          {
            data: "piutang",
            render: $.fn.dataTable.render.number(',', '.', 2)
          },
          {
            data: "created_at",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "status",
            className: "text-center",
            render: (data, type, row) => data === "paid" ? moment(row.updated_at).format('D MMMM YYYY') : "Belum Dibayar"
          },
          {
            data: "status",
            className: "text-center",
            render: (data) => data === "paid" ? "<span class='badge badge-success'>Lunas</span>" : "<span class='badge badge-danger'>Belum Lunas</span>"
          },
          {
            data: "id",
            render: id =>
              `<span><a href="/transaction/surat-pesanan/print_kuitansi_internal/${id}">Print</a></span>`
          }
        ],
        buttons: [
          {
            text: 'Add Cicilan',
            action: (e, dt, node, config) => {
              const id = '{{$surat->id}}';
              location.href = `/transaction/surat-pesanan/add_cicilan/${id}`
            }
          }
        ],
        select: {
          style: "os"
        }
      });

      $("#kreditur").DataTable({
        dom:
          '<"datatable-header"><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.kreditur', $surat->id) !!}",
        columns: [
          {
            data: "id",
            render: (data, type, row, meta) => {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            data: "description"
          },
          {
            data: "piutang",
            render: $.fn.dataTable.render.number(',', '.', 2)
          },
          {
            data: "created_at",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "id",
            render: id =>
              `<span><a href="/transaction/surat-pesanan/print_kuitansi_developer/${id}">Print</a></span>`
          }
        ],
        select: {
          style: "os"
        }
      });

      $("#kontraktor").DataTable({
        dom:
          '<"datatable-header"><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        processing: true,
        serverSide: true,
        ajax: "{!! route('transaction.surat-pesanan.contractor', $surat->id) !!}",
        columns: [
          {
            data: "id",
            render: (data, type, row, meta) => {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            data: "description"
          },
          {
            data: "piutang",
            render: $.fn.dataTable.render.number(',', '.', 2)
          },
          {
            data: "created_at",
            render: data => moment(data).format("D MMMM YYYY")
          },
          {
            data: "deleted_at",
            className: "text-center",
            render: (data) => data === null ? "Belum Dibayar" : "Tgl"
          },
          {
            data: "deleted_at",
            className: "text-center",
            render: (data) => data !== null ? "<span class='badge-success p-1'>Lunas</span>" : "<span class='badge-danger p-1'>Belum Lunas</span>"
          },
          {
            data: "id",
            render: id =>
              `<span><a href="/transaction/surat-pesanan/print_kuitansi_contractor/${id}">Print</a></span>`
          }
        ],
        select: {
          style: "os"
        }
      });
    };

    var _componentSelect2 = function() {
      if (!$().select2) {
        console.warn("Warning - select2.min.js is not loaded.");
        return;
      }

      $(".dataTables_length select").select2({
        minimumResultsForSearch: Infinity,
        dropdownAutoWidth: true,
        width: "auto"
      });
    };

    return {
      init: function() {
        _componentDatatableSelect();
        _componentSelect2();
      }
    };
  })();

  document.addEventListener("DOMContentLoaded", function() {
    DatatableSelect.init();
  });
</script>
@endif
@endpush
