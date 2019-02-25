@extends('layouts.app') 
@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">SP</span> - Create New SP</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection
 
@section('breadcrumb')
<a href="{{ route('transaction.surat-pesanan.index') }}" class="breadcrumb-item">Surat Pesanan</a>
<a href="{{ route('transaction.surat-pesanan.create') }}" class="breadcrumb-item">New Surat Pesanan</a>
@endsection
 
@section('content')
<div class="card">
  <div class="card-header bg-white header-elements-inline">
    <h6 class="card-title">Create New Surat</h6>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif @if (isset($surat))
  <form class="wizard-form steps-validation" action="{{ route('transaction.surat-pesanan.update') }}" method="POST" data-fouc>
    @method('PATCH')
    <input type="hidden" name="id" value="{{$surat->id}}"> @else
    <form class="wizard-form steps-validation" id="form_wizard" action="{{ route('transaction.surat-pesanan.store') }}" method="POST" data-fouc>
      @endif @csrf
      <h6>Step 1</h6>
      <fieldset>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <fieldset>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kode Pre Book</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_prebook" value="{{isset($surat) ? $surat->sp_prebook : ''}}" required>
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
                  <input type="text" class="form-control" name="sp_no" value="{{isset($surat) ? $surat->sp_no : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal Surat Pesanan</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="sp_date" value="{{isset($surat) ? $surat->sp_date->toDateString() : ''}}"
                      required>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No PPJB</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_ppjb" value="{{isset($surat) ? $surat->sp_ppjb : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal PPJB</label>
                <div class="col-lg-9">
                  <div class="input-group">
                    <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                    </span>
                    <input type="text" class="form-control pickadate-selectors" name="sp_ppjb_date" value="{{isset($surat) ? $surat->sp_ppjb_date->toDateString() : ''}}"
                      required>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Customer ID</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_customer_id" id="customer_id"
                    required>
                  @if (isset($surat))
                    <option value="{{$surat->customer->id}}">C000{{$surat->customer->id}} - {{$surat->customer->customer_name}}</option>
                  @else
                    @foreach ($customers as $customer)
                      <option></option>
                      <option value="{{$customer->id}}">C000{{$customer->id}} - {{$customer->customer_name}}</option>
                    @endforeach
                  @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_customer_name" id="customer_name" value="{{isset($surat) ? $surat->customer->customer_name : ''}}"
                    readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Perusahaan ID</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_company_id" id="company_id"
                    required>
                  @if (isset($surat))
                    <option value="{{$surat->company->id}}">P000{{$surat->company->id}} - {{$surat->company->company_name}}</option>
                  @else
                    @foreach ($companies as $company)
                      <option></option>
                      <option value="{{$company->id}}">P000{{$company->id}} - {{$company->company_name}}</option>
                    @endforeach
                  @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Perusahaan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_company_name" id="company_name" value="{{isset($surat) ? $surat->company->company_name : ''}}"
                    readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">MOU ID</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_mou_id" id="mou_id" required>
                  @if (isset($surat))
                    <option value="{{$surat->mou->id}}">MOU000{{$surat->mou->id}} - {{$surat->mou->mou_coordinator}}</option>
                  @else
                      
                  @endif
                  @foreach ($mous as $mou)
                    <option></option>
                    <option value="{{$mou->id}}">MOU000{{$mou->id}} - {{$mou->mou_coordinator}}</option>
                  @endforeach
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Koordinator</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_koordinator" id="mou_supervisor" value="{{isset($surat) ? $surat->mou->mou_coordinator : ''}}"
                    required readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Sales Executives ID</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_se_id" id="sales_id" required>
                  @if (isset($surat))
                    <option value="{{$surat->sales->id}}">SE000{{$surat->sales->id}} - {{$surat->sales->sales_name}}</option>
                  @else
                    @foreach ($sales as $person)
                      <option></option>
                      <option value="{{$person->id}}">SE000{{$person->id}} - {{$person->sales_name}}</option>
                    @endforeach
                  @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Sales Executives name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_se_name" id="sales_name" value="{{isset($surat) ? $surat->sales->sales_name : ''}}"
                    readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Supervisor ID</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_spv_id" required>
                  @if (isset($surat))
                    <option value="{{$surat->supervisor->id}}">SP000{{$surat->supervisor->id}} - {{$surat->supervisor->sales_name}}</option>
                  @else
                      
                  @endif
                  @foreach ($spvs as $person)
                    <option></option>
                    <option value="{{$person->id}}">SP000{{$person->id}} - {{$person->sales_name}}</option>
                  @endforeach
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kavling ID</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_kavling_id" id="kavling_id" required>
                  @if (isset($surat))
                    <option value="{{$surat->kavling->id}}">KAV000{{$surat->kavling->id}} - {{$surat->kavling->kavling_cluster}} - No {{$surat->kavling->id}}</option>
                  @else
                    @foreach ($kavlings as $kav)
                      <option></option>
                      <option value="{{$kav->id}}">KAV000{{$kav->id}} - {{$kav->kavling_cluster}} - No {{$kav->id}}</option>
                    @endforeach
                  @endif
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">House Type</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_house_type" id="house_type" value="{{isset($surat) ? $surat->kavling->house->rumah_type_name : ''}}"
                    required readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Blok</label>
                <div class="col-lg-9">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="sp_house_block" id="house_block" value="{{isset($surat) ? $surat->kavling->kavling_block : ''}}"
                        required readonly>
                    </div>
                    <label class="col-form-label">No</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" name="sp_house_no" id="house_no" value="{{isset($surat) ? $surat->kavling->id : ''}}"
                        required readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Cluster</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_house_cluster" id="house_cluster" value="{{isset($surat) ? $surat->kavling->kavling_cluster : ''}}"
                    required readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Luas Bangunan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_house_building" id="house_building" value="{{isset($surat) ? $surat->kavling->house->building_area_m2 : ''}}"
                    required readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Luas Tanah</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_house_surface" id="house_surface" value="{{isset($surat) ? $surat->kavling->house->surface_area_m2 : ''}}"
                    required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">TL</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_tl" value="{{isset($surat) ? $surat->sp_tl : ''}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">TT</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_tt" value="{{isset($surat) ? $surat->sp_tt : ''}}">
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
                  {{-- <input type="text" class="form-control" name="sp_price_id" id="price_id" value="{{isset($surat) ? $surat->price->id : ''}}" readonly required> --}}
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_price_id" id="price_id" required>
                    @if (isset($surat))
                      <option value="{{$surat->price->id}}">H000{{$surat->price->id}} - {{$surat->price->price_selling}}</option>
                      @foreach ($prices as $price)
                        @if ($price->id == $surat->price->id)
                          <option></option>
                        @else
                          <option value="{{$price->id}}">H000{{$price->id}} - {{$price->price_selling}}</option>
                        @endif
                      @endforeach
                    @else
                      @foreach ($prices as $price)
                        <option></option>
                        <option value="{{$price->id}}">H000{{$price->id}} - {{$price->price_selling}}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_price" id="price" value="{{isset($surat) ? $surat->price->price_selling : ''}}" readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Total Harga TL</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_price_tl" value="{{isset($surat) ? $surat->sp_price_tl : ''}}">
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
                  <input type="text" class="form-control price" name="sp_total_harga_jual" value="{{isset($surat) ? $surat->sp_total_harga_jual : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga Jual rumah</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_harga_jual_tanah" value="{{isset($surat) ? $surat->sp_harga_jual_tanah : ''}}" required>
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
                <label class="col-lg-3 col-form-label">Potongan Harga Jual (Discount)</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_discount" value="{{isset($surat) ? $surat->sp_discount : ''}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga Setelah Discount</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_after_discount" value="{{isset($surat) ? $surat->sp_after_discount : ''}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Persentase Pajak (%)</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_ppn_percentage" value="{{isset($surat) ? $surat->sp_ppn_percentage : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nilai Pajak</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_after_ppn" value="{{isset($surat) ? $surat->sp_after_ppn : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga Tanah dan Bangunan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_harga_tanah_bangunan" value="{{isset($surat) ? $surat->sp_harga_tanah_bangunan : ''}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Cara Pembayaran</label>
                <div class="col-lg-9">
                  <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="sp_payment_method" required>
                    @if (isset($surat))
                      <option value="{{$surat->paymentMethod->id}}">{{$surat->paymentMethod->payment_method}}</option>
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
                  <input type="text" class="form-control price" name="sp_harga_jual_pengikatan" value="{{isset($surat) ? $surat->sp_harga_jual_pengikatan : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga Jual AJB</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_ajb_price" value="{{isset($surat) ? $surat->sp_ajb_price : ''}}" required>
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
              {{-- <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah Pembayaran</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="sp_bill" required>
                </div>
              </div> --}}
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Subsidi</label>
                <div class="col-lg-9">
                  <input type="checkbox" name="sp_subsidi" checked>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanah Lebih M2</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_tanah_lebih" value="{{isset($surat) ? $surat->sp_tanah_lebih : ''}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Harga / M2</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_harga_m2" value="{{isset($surat) ? $surat->sp_harga_m2 : ''}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Total Harga Tanah Lebih</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_total_harga_tanah_lebih" value="{{isset($surat) ? $surat->sp_total_harga_tanah_lebih : ''}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">DP</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_dp" value="{{isset($surat) ? $surat->sp_dp : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">PPN</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_ppn" value="{{isset($surat) ? $surat->sp_ppn : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Sub Total</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_sub_total" value="{{isset($surat) ? $surat->sp_sub_total : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Booking Fee</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_booking_fee" value="{{isset($surat) ? $surat->sp_booking_fee : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah Harus Dibayar</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_total_bill" value="{{isset($surat) ? $surat->sp_total_bill : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Angsuran/Bulan (Internal)</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_per_month_internal" value="{{isset($surat) ? $surat->sp_per_month_internal : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nilai Internal</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_internal_bill" value="{{isset($surat) ? $surat->sp_internal_bill : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Angsuran/Bulan (Kreditur)</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_per_month_kreditur" value="{{isset($surat) ? $surat->sp_per_month_kreditur : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nilai Kreditur</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_kreditur_bill" value="{{isset($surat) ? $surat->sp_kreditur_bill : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Rencana KPR</label>
                <div class="col-lg">
                  <input type="text" class="form-control price" name="sp_kpr_plan" value="{{isset($surat) ? $surat->sp_kpr_plan : ''}}" required>
                </div>
                <label class="col-form-label">%</label>
                <div class="col-lg">
                  <input type="text" class="form-control price" name="sp_kpr_plan_percentage" value="{{isset($surat) ? $surat->sp_kpr_plan_percentage : ''}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Total Surat Pesanan</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control price" name="sp_total" value="{{isset($surat) ? $surat->sp_total : ''}}" required>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
      </fieldset>

      <h6>Step 4</h6>
      <fieldset>
        <table class="table table-bordered" id="result">
          <thead>
            <tr>
              <th>Sq</th>
              <th>Description</th>
              <th>Piutang</th>
              <th>Tanggal</th>
            </tr>
          </thead>
        </table>
        <input type="hidden" name="piutang" id="piutang">
        <input type="hidden" name="internal" id="internal">
      </fieldset>

    </form>
</div>
@endsection
 @push('scripts')
<script>
  $(document).ready(function(){

  $('#customer_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.surat-pesanan.load_customer')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#customer_name').val(result.customer_name);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });

  $('#company_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.surat-pesanan.load_company')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#company_name').val(result.company_name);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });

  $('#mou_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.surat-pesanan.load_mou')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#mou_supervisor').val(result.mou_coordinator);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });

  $('#sales_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.surat-pesanan.load_sales')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sales_name').val(result.sales_name);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });

  $('#kavling_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.surat-pesanan.load_kavling')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#house_type').val(result.price.house.rumah_type_name);
      $('#house_block').val(result.kavling_block);
      $('#house_cluster').val(result.kavling_cluster);
      $('#house_no').val(result.id);
      $('#house_building').val(result.price.house.building_area_m2);
      $('#house_surface').val(result.price.house.surface_area_m2);
      $('#price_id').val($('#price_id option:first').val(result.price.id))
      $('#price').val($.number(result.price.price_selling));
      $('input[name=sp_total_harga_jual]').val(result.price.price_selling);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });

  // $('#price_id').on('change', function(e){
  //   var id = $(this).val();
  //   // console.log(id);
  //   $.ajax({
  //   url: '{{route('transaction.surat-pesanan.load_price')}}',
  //   data: {
  //     id: id
  //   },
  //   success: function (result) {
  //     // console.log(result);
  //     $('#price').val($.number(result.price_selling));
  //     $('input[name=sp_total_harga_jual]').val(result.price_selling);
  //   },
  //   error: function (e) {
  //     console.log(e);
  //   }
  //   });
  // });


  const price = parseFloat($('input[name=sp_price]').val()) || 0;
  console.log(price)
  $('input[name=sp_price_tl]').keyup(() => {
    const tl = parseFloat($('input[name=sp_price_tl]').val()) || 0;
    const price = parseFloat($('input[name=sp_price]').val()) || 0;
    $('input[name=sp_total_harga_jual]').val(tl+price);
  })

  $('input[name=sp_included_tl').click(() => {
    const tl = parseFloat($('input[name=sp_price_tl]').val()) || 0;
    const price = parseFloat($('input[name=sp_price]').val()) || 0;
    const total = $('input[name=sp_total_harga_jual]').val(tl+price);
    $('input[name=sp_harga_jual_tanah]').val(price)
    if ($('input[name=sp_included_tl').prop('checked')) {
      $('input[name=sp_harga_jual_tanah]').val($.number(total.val()));
    } else {
      $('input[name=sp_harga_jual_tanah]').val(price)
    }
  })

  $('input[name=sp_discount]').keyup(() => {
    const discount = parseFloat($('input[name=sp_discount]').val()) || 0;
    const rumah = parseFloat($('input[name=sp_harga_jual_tanah]').val()) || 0;
    // console.log(rumah)
    $('input[name=sp_after_discount]').val(rumah - (discount * rumah / 100));
  })

  $('input[name=sp_ppn_percentage]').keyup(() => {
    const total = parseFloat($('input[name=sp_total_harga_jual]').val()) || 0;
    const rumah = parseFloat($('input[name=sp_harga_jual_tanah]').val()) || 0;
    const ppn = parseFloat($('input[name=sp_ppn_percentage]').val()) || 0;
    const afterDiscount = parseFloat($('input[name=sp_after_discount]').val()) || 0;
    const afterPpn = $('input[name=sp_after_ppn').val(ppn * (afterDiscount / 100));
    // console.log(parseFloat(afterPpn.val()) + rumah )
    const tanah = $('input[name=sp_harga_tanah_bangunan]').val(parseFloat(afterPpn.val()) + rumah);
    $('input[name=sp_harga_jual_pengikatan]').val(tanah.val())
    $('input[name=sp_ajb_price]').val(total * (110 / 100));
  })

  $('input[name=sp_tanah_lebih], input[name=sp_harga_m2]').keyup(() => {
    const tanahLebih = parseFloat($('input[name=sp_tanah_lebih]').val()) || 0;
    const hargaM2 = parseFloat($('input[name=sp_harga_m2]').val()) || 0;
    console.log(tanahLebih * hargaM2)
    $('input[name=sp_total_harga_tanah_lebih]').val(tanahLebih * hargaM2);
  })

  $('input[name=sp_dp], input[name=sp_ppn]').keyup(() => {
    const hargaTanahLebih = parseFloat($('input[name=sp_total_harga_tanah_lebih]').val()) || 0;
    const dp = parseFloat($('input[name=sp_dp]').val()) || 0;
    const ppn = parseFloat($('input[name=sp_ppn]').val()) || 0;
    $('input[name=sp_sub_total]').val(hargaTanahLebih + dp + ppn);
  })

  $('input[name=sp_booking_fee]').change(() => {
    const subTotal = parseFloat($('input[name=sp_sub_total]').val()) || 0;
    const booking = parseFloat($('input[name=sp_booking_fee]').val()) || 0;
    $('input[name=sp_total_bill]').val(subTotal + booking);
  })

  $('input[name=sp_per_month_internal]').focusout(() => {
    /* Constant variable */
    const totalBill = parseFloat($('input[name=sp_total_bill]').val()) || 0;
    const internal = parseFloat($('input[name=sp_per_month_internal]').val()) || 0;
    const booking = parseFloat($('input[name=sp_booking_fee]').val()) || 0;
    const subTotal = parseFloat($('input[name=sp_sub_total]').val()) || 0;
    const dt = $('#result').DataTable({
      dom: '<"datatable-header"><"datatable-scroll-wrap"><"datatable-footer"ip>',
      paging: false
    });
    const seq = 1

    /* jQuery */
    $('input[name=sp_internal_bill]').val(Math.round(totalBill / internal));

    /* Initiate Datatables */
    dt.row.add([
      seq,
      'Booking Fee',
      $.number(booking),
      moment().format('D MMMM YYYY')
    ]).draw()

    /* Iterate Cililan */
    console.log(internal)
    for (let index = 1; index <= internal; index++) {
      dt.row.add([
        index+1,
        `Cicilan ${index}`,
        $.number(booking/internal),
        moment().format('D MMMM YYYY')
      ]).draw()
    }
  })

  $('input[name=sp_per_month_kreditur]').keyup(() => {
    const totalBill = parseFloat($('input[name=sp_total_bill]').val()) || 0;
    const kreditur = parseFloat($('input[name=sp_per_month_kreditur]').val()) || 0;
    $('input[name=sp_kreditur_bill]').val(totalBill / kreditur);
  })

  $('input[name=sp_kpr_plan]').keyup(() => {
    const kpr = parseFloat($('input[name=sp_kpr_plan]').val()) || 0;
    const total = parseFloat($('input[name=sp_total_bill]').val()) ||0;
    $('input[name=sp_total]').val(kpr+total);
  })

  const internal = parseFloat($('input[name=sp_per_month_internal]').val()) || 0;
  const booking = parseFloat($('input[name=sp_booking_fee]').val()) || 0;
  const subTotal = parseFloat($('input[name=sp_sub_total]').val()) || 0;
  const piutang = Math.round(booking/internal);
  console.log(internal);
  $('#internal').val(internal);
  $('#piutang').val(piutang);
  // $('#form_wizard').submit((e) => {
  //   for (let index = 0; index <= internal; index++) {
  //     const desc = `Description ${index}`;
  //     const piutang = Math.round(booking/internal); 
  //     $.ajax({
  //       url: '{{route('transaction.surat-pesanan.storeCicilan')}}',
  //       method: 'POST',
  //       data: {
  //         description: desc,
  //         piutang: piutang
  //       },
  //       success: (result) => {
  //         console.log(result)
  //         swal('Success')
  //       },
  //       error: (err) => {
  //         console.log(err)
  //         swal('Eror')
  //       }
  //     })
  //   }
  // })
});

var FormWizard = function() {

  var _componentWizard = function() {
      if (!$().steps) {
          console.warn('Warning - steps.min.js is not loaded.');
          return;
      }


      if (!$().validate) {
          console.warn('Warning - validate.min.js is not loaded.');
          return;
      }

      var form = $('.steps-validation').show();

      $('.steps-validation').steps({
          headerTag: 'h6',
          bodyTag: 'fieldset',
          titleTemplate: '<span class="number">#index#</span> #title#',
          labels: {
              previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
              next: 'Next <i class="icon-arrow-right14 ml-2" />',
              finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
          },
          transitionEffect: 'fade',
          autoFocus: true,
          onStepChanging: function (event, currentIndex, newIndex) {

              // Allways allow previous action even if the current form is not valid!
              if (currentIndex > newIndex) {
                  return true;
              }

              // Needed in some cases if the user went back (clean up)
              if (currentIndex < newIndex) {

                  // To remove error styles
                  form.find('.body:eq(' + newIndex + ') label.error').remove();
                  form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
              }

              form.validate().settings.ignore = ':disabled,:hidden';
              return form.valid();
          },
          onFinishing: function (event, currentIndex) {
              form.validate().settings.ignore = ':disabled';
              return form.valid();
          },
          onFinished: function (event, currentIndex) {
              swal({
              type: 'success',
              title: 'Success',
              });
              event.target.submit();
          }
      });

      $('.steps-validation').validate({
          ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
          errorClass: 'validation-invalid-label',
          highlight: function(element, errorClass) {
              $(element).removeClass(errorClass);
          },
          unhighlight: function(element, errorClass) {
              $(element).removeClass(errorClass);
          },

          // Different components require proper error label placement
          errorPlacement: function(error, element) {

              // Unstyled checkboxes, radios
              if (element.parents().hasClass('form-check')) {
                  error.appendTo( element.parents('.form-check').parent() );
              }

              // Input with icons and Select2
              else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                  error.appendTo( element.parent() );
              }

              // Input group, styled file input
              else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                  error.appendTo( element.parent().parent() );
              }

              // Other elements
              else {
                  error.insertAfter(element);
              }
          },
          rules: {
              sp_ppn_percentage: {
                  max: 100
              }
          }
      });
  };

  var _componentUniform = function() {
      if (!$().uniform) {
          console.warn('Warning - uniform.min.js is not loaded.');
          return;
      }

      // Initialize
      $('.form-input-styled').uniform({
          fileButtonClass: 'action btn bg-blue'
      });
  };
  var _componentSelect2 = function() {
      if (!$().select2) {
          console.warn('Warning - select2.min.js is not loaded.');
          return;
      }

      // Initialize
      var $select = $('.form-control-select2').select2({
          minimumResultsForSearch: Infinity,
          width: '100%'
      });

      // Trigger value change when selection is made
      $select.on('change', function() {
          $(this).trigger('blur');
      });
  };

  return {
      init: function() {
          _componentWizard();
          _componentUniform();
          _componentSelect2();
      }
  }
}();

document.addEventListener('DOMContentLoaded', function() {
  FormWizard.init();
});

var DateTimePickers = function() {
  var _componentPickadate = function() {
      if (!$().pickadate) {
          console.warn('Warning - picker.js and/or picker.date.js is not loaded.');
          return;
      }
      $('.pickadate-selectors').pickadate({
          selectYears: true,
          selectMonths: true
      });
  };
  return {
      init: function() {
          _componentPickadate();
      }
  }
}();

document.addEventListener('DOMContentLoaded', function() {
  DateTimePickers.init();
});
</script>
@endpush