@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Create New Keputusan
  Wawancara</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.keputusan.index') }}" class="breadcrumb-item">Wawancara</a>
<a href="{{ route('transaction.keputusan.create') }}" class="breadcrumb-item">New Keputusan Wawancara</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Result</h5>
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
    <form action="{{ route('transaction.keputusan.store') }}" class="form-validate-jquery" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Wawancara</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc
                  name="result_realization_id" id="rlw_id" required>
                  @foreach ($rlw as $realisasi)
                  <option></option>
                  <option value="{{$realisasi->id}}">RW000{{$realisasi->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" id="rlw_date" name="result_wawancara_date"
                    readonly>
                </div>
              </div>
            </div>


            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Hasil</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="result_status"
                  required>
                  <option></option>
                  <option value="accept">Diterima</option>
                  <option value="reject">DiTolak</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Banding</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc
                  name="result_banding" required>
                  <option></option>
                  <option value="yes">Ya</option>
                  <option value="no">Tidak</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alasan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_reason">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Keputusan Diterima/Ditolak</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="KP000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Keputusan Diterima/Ditolak</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="result_date" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Expired</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="result_expired_date" required>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Sp</label>
              <div class="col-lg-9">
                <input class="form-control" id="sp_id" name="result_sp_id" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Sp</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_date" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer ID</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer Name</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer_name" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_sales" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_house_type" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kavling" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Harga Jual SP</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_price" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">KPR Dimohon</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kpr" readonly>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-12">
          <br>
          <hr>
          <br>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">KPR Disetujui</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_kpr_approve" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tambah Uang Muka</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="result_dp_plus" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jangka Waktu - Bunga(%)</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="result_waktu_bunga" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran Per Bulan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_angsuran_bulan" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Rek</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_account" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Angsuran Bulan Pertama</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_angsuran_first_month" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Provisi Bank</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_provisi" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Bi Notaris</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_bi_notaris" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Bi APHT</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_bi_apht" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Bi Penilai / Appraiser</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_appraiser" required>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Premi Asuransi Kebakaran</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_premi_kebakaran" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Premi Asuransi Jiwa</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_premi_jiwa" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Saldo Tabungan Diblokir</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_tabungan_diblokir" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Bi Administrasi</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_bi_administrasi" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sub Total</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_sub_total" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Grand Total</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_grand_total" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Catatan Penting</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="result_note" required>
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

@push('scripts')
<script>
  $(document).ready(function(){

  $('.pickadate-selectors').datepicker({
    autoclose: true
  });

  $('#rlw_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.keputusan.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#rlw_date').val(result.rlw_date);
      $('#sp_id').val(result.wawancara.surat.id);
      $('#sp_date').val(result.wawancara.surat.sp_date);
      $('#sp_customer').val(result.wawancara.surat.sp_customer_id);
      $('#sp_customer_name').val(result.wawancara.surat.customer.customer_name);
      $('#sp_sales').val(result.wawancara.surat.sales.sales_name);
      $('#sp_house_type').val(result.wawancara.surat.sp_house_type);
      $('#sp_kavling').val(result.wawancara.surat.sp_kavling_id);
      $('#sp_price').val(result.wawancara.surat.sp_price);
      $('#sp_kpr').val(result.wawancara.surat.sp_kpr_plan);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });

  $('#sp_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.keputusan.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_date').val(result.wawancara.surat.sp_date);
      $('#sp_customer').val(result.sp_customer_id);
      $('#sp_customer_name').val(result.customer.customer_name);
      $('#sp_sales').val(result.sales.sales_name);
      $('#sp_house_type').val(result.sp_house_type);
      $('#sp_kavling').val(result.sp_kavling_id);
      $('#sp_price').val(result.sp_price);
      $('#sp_kpr').val(result.sp_kpr_plan);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });
});

var FormValidation = function() {
  var _componentValidation = function() {
      if (!$().validate) {
          console.warn('Warning - validate.min.js is not loaded.');
          return;
      }

      // Initialize
      var validator = $('.form-validate-jquery').validate({
          ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
          errorClass: 'validation-invalid-label',
          successClass: 'validation-valid-label',
          validClass: 'validation-valid-label',
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
          }
      });

      // Reset form
      $('#reset').on('click', function() {
          validator.resetForm();
      });
  };

  return {
      init: function() {
          _componentValidation();
      }
  }
}();

document.addEventListener('DOMContentLoaded', function() {
    FormValidation.init();
});
</script>
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush
