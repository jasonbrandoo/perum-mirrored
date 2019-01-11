@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Customer</span> - Create New Customer</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('customer.create') }}" class="breadcrumb-item">New Customer</a>    
@endsection

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
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form class="wizard-form steps-async" action="{{ route('customer.store') }}" method="POST" data-fouc>
    @csrf
    <h6>Personal data</h6>
    <fieldset>
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">ID Konsumen:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="C000{{$id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Name Lengkap:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor KTP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_ktp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Berlaku KTP sampai:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_ktp_expired">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Rumah (Sesuai KTP):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_ktp_address">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_city">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_zipcode">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Tempat Tinggal (Sekarang):</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_current_address">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_current_city">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_current_zipcode">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Telp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_telp">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No HP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_mobile_number">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Rumah:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_house_status">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Lama Tinggal:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_length_of_stay">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tempat Lahir:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" name="customer_birth_place">
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tgl Lahir:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control pickadate-selectors" name="customer_birthdate">
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Perkawinan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_maternal_status">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggungan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_tanggungan">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor NPWP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_npwp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Agama:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_religion">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jenis Kelamin:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_gender">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Ibu Kandung:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_mother">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Surat Menyurat:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_address_mail">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Referensi:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc id="reference_id" name="customer_reference_id">
                  @foreach ($references as $reference)
                    <option></option>
                    <option value="{{$reference->id}}">RSP000{{$reference->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales Executives:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc id="sales_executive_id" name="customer_executive_id">
                  @foreach ($sales_executives as $se)
                    <option></option>
                    <option value="{{$se->id}}">{{$se->sales_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales Supervisor:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc id="sales_supervisor_id" name="customer_supervisor_id">
                  @foreach ($sales_supervisor as $spv)
                    <option></option>
                    <option value="{{$spv->id}}">{{$spv->sales_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </fieldset>

    <h6>Job</h6>
    <fieldset>
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jenis Pekerjaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_job_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NIP / NRP:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_nip">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Pangkat / Jabatan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_job_title">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Masa Kerja:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="customer_job_duration">
                  </div>
                  <label class="col-form-label">Tahun</label>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Perusahaan:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc id="company" name="customer_office_id">
                  @foreach ($companies as $company)
                    <option></option>
                    <option value="{{$company->id}}">{{$company->company_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Perusahaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_address" id="customer_office_address" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_city" id="customer_office_city" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_zipcode" id="customer_office_zipcode" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Telp:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_phone" id="customer_office_phone" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Fax:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_fax" id="customer_office_fax" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Email:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_email">
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </fieldset>

    <h6>Data Penghasilan</h6>
    <fieldset>
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Penghasilan Pemohon:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_income">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Penghasilan Tambahan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_additional_income">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Penghasilan Suami/Istri:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_family_income">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Total:</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" name="customer_total_income">
                </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Pengeluaran Rutin:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_routine_expenses">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sisa Penghasilan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_residual_income">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kemampuan Angsuran:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_installment_ability">
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </fieldset>
  </form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function(){
  $('#company').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('customer.company')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#customer_office_address').val(result.company_address);
      $('#customer_office_city').val(result.company_city);
      $('#customer_office_zipcode').val(result.company_zipcode);
      $('#customer_office_phone').val(result.company_phone);
      $('#customer_office_fax').val(result.company_fax);

    },
    error: function (e) {
      console.log(e);
    }
    });
  });
});
var FormWizard = function() {
  var _componentWizard = function() {
    if (!$().steps) {
      console.warn('Warning - steps.min.js is not loaded.');
      return;
    }
    $('.steps-async').steps({
        headerTag: 'h6',
        bodyTag: 'fieldset',
        transitionEffect: 'fade',
        titleTemplate: '<span class="number">#index#</span> #title#',
        loadingTemplate: '<div class="card-body text-center"><i class="icon-spinner2 spinner mr-2"></i>  #text#</div>',
        labels: {
            previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
            next: 'Next <i class="icon-arrow-right14 ml-2" />',
            finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
        },
        onContentLoaded: function (event, currentIndex) {
            $(this).find('.card-body').addClass('hide');

            // Re-initialize components
            _componentSelect2();
            _componentUniform();
        },
        onFinished: function (event, currentIndex) {
            alert('Form submitted2.');
            event.target.submit();
        }
    });
  };

  // Uniform 
  var _componentUniform = function() {
    if (!$().uniform) {
      console.warn('Warning - uniform.min.js is not loaded.');
      return;
    }
    $('.form-input-styled').uniform({
      fileButtonClass: 'action btn bg-blue'
    });
  };

  // Select2 select
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