@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Customer</span> - {{isset($customer) ? 'Edit Customer' : 'Create New Customer'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('customer.index') }}" class="breadcrumb-item">Customer</a>    
<a href="{{ route('customer.create') }}" class="breadcrumb-item">{{isset($customer) ? 'Edit Customer' : 'Create New Customer'}}</a>    
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

  @if (isset($customer))
  <form class="wizard-form steps-validation" action="{{ route('customer.update') }}" method="POST" data-fouc>        
    @method('PATCH')
    <input type="hidden" name="id" value="{{ $customer->id }}">
  @else
  <form class="wizard-form steps-validation" action="{{ route('customer.store') }}" method="POST" data-fouc>
  @endif
    @csrf
    <h6>Personal data</h6>
    <fieldset>
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">ID Konsumen</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="C000{{ isset($customer) ? $customer->id : $id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Name Lengkap</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ isset($customer) ? $customer->customer_name : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor KTP</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="customer_ktp" value="{{ isset($customer) ? $customer->customer_ktp : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Berlaku KTP sampai</label>
              <div class="col-lg-9">
                <input type="text" class="form-control pickadate-selectors" name="customer_ktp_expired" value="{{ isset($customer) ? $customer->customer_ktp_expired : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Rumah (Sesuai KTP)</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_ktp_address" value="{{ isset($customer) ? $customer->customer_ktp_address : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_city" value="{{ isset($customer) ? $customer->customer_city : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_zipcode" value="{{ isset($customer) ? $customer->customer_zipcode : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Tempat Tinggal (Sekarang)</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_current_address" value="{{ isset($customer) ? $customer->customer_current_address : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_current_city" value="{{ isset($customer) ? $customer->customer_current_city : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="customer_current_zipcode" value="{{ isset($customer) ? $customer->customer_current_zipcode : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Telp</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="customer_telp" value="{{ isset($customer) ? $customer->customer_telp : '' }}">
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No HP</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="customer_mobile_number" value="{{ isset($customer) ? $customer->customer_mobile_number : '' }}" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Rumah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_house_status" value="{{ isset($customer) ? $customer->customer_house_status : '' }}" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Lama Tinggal</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="customer_length_of_stay" value="{{ isset($customer) ? $customer->customer_length_of_stay : '' }}" required>
                  </div>
                  <label class="col-form-label">Tahun</label>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tempat Lahir</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control" name="customer_birth_place" value="{{ isset($customer) ? $customer->customer_birth_place : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tgl Lahir</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control pickadate-selectors" name="customer_birthdate" value="{{ isset($customer) ? $customer->customer_birthdate : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Perkawinan</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="customer_maternal_status" required>
                  @if (isset($customer))
                    <option value="{{$customer->customer_maternal_status}}">{{$customer->customer_maternal_status}}</option>
                  @else
                    <option></option>
                    <option value="single">Single</option>
                    <option value="menikah">Menikah</option>
                    <option value="janda_duda">Janda / Duda</option>
                  @endif
                  </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggungan</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="customer_tanggungan" value="{{ isset($customer) ? $customer->customer_tanggungan : '' }}" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor NPWP</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_npwp" value="{{ isset($customer) ? $customer->customer_npwp : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Agama</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_religion" value="{{ isset($customer) ? $customer->customer_religion : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jenis Kelamin</label>
              <div class="col-lg-9">
                <select data-placeholder="Jenis Kelamin" class="form-control form-control-select2" data-fouc id="reference_id" name="customer_gender" required>
                  @if (isset($customer))
                    <option value="{{$customer->customer_gender}}">Laki-Laki</option>                      
                  @else
                    <option></option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Ibu Kandung</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_mother" value="{{ isset($customer) ? $customer->customer_mother : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Surat Menyurat</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_address_mail" value="{{ isset($customer) ? $customer->customer_address_mail : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Referensi</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc id="reference_id" name="customer_reference_id" required>
                  @if (isset($customer))
                    <option value="{{$customer->reference->id}}">RSP000{{$customer->reference->id}} - {{$customer->reference->reference_description}}</option>
                    @foreach ($references as $reference)
                      @if ($reference->id == $customer->reference->id)
                        <option></option>
                      @else
                        <option></option>
                        <option value="{{$reference->id}}">RSP000{{$reference->id}} - {{$reference->reference_description}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($references as $reference)
                      <option></option>
                      <option value="{{$reference->id}}">RSP000{{$reference->id}} - {{$reference->reference_description}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales Executives</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc id="sales_executive_id" name="customer_executive_id" required>
                  @if (isset($customer))
                    <option value="{{$customer->sales_executive->id}}">SE000{{$customer->sales_executive->id}} - {{$customer->sales_executive->sales_name}}</option>
                    @foreach ($sales_executives as $se)
                      @if ($se->id == $customer->sales_executive->id)
                        <option></option>
                      @else
                        <option></option>
                        <option value="{{$se->id}}">SE000{{$se->id}} - {{$se->sales_name}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($sales_executives as $se)
                      <option></option>
                      <option value="{{$se->id}}">SE000{{$se->id}} - {{$se->sales_name}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales Supervisor</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc id="sales_supervisor_id" name="customer_supervisor_id" required>
                  @if (isset($customer))
                    <option value="{{$customer->sales_supervisor->id}}">SPV000{{$customer->sales_supervisor->id}} - {{$customer->sales_supervisor->sales_name}}</option>
                    @foreach ($sales_supervisor as $spv)
                      @if ($spv->id == $customer->sales_supervisor->id)
                          <option></option>
                      @else
                        <option></option>
                        <option value="{{$spv->id}}">SPV000{{$spv->id}} - {{$spv->sales_name}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($sales_supervisor as $spv)
                      <option></option>
                      <option value="{{$spv->id}}">SPV000{{$spv->id}} - {{$spv->sales_name}}</option>
                    @endforeach
                  @endif
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
              <label class="col-lg-3 col-form-label">Jenis Pekerjaan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_job_name" value="{{ isset($customer) ? $customer->customer_job_name : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NIP / NRP</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="customer_nip" value="{{ isset($customer) ? $customer->customer_nip : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Pangkat / Jabatan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_job_title" value="{{ isset($customer) ? $customer->customer_job_title : '' }}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Masa Kerja</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="customer_job_duration" value="{{ isset($customer) ? $customer->customer_job_duration : '' }}" required>
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
              <label class="col-lg-3 col-form-label">Nama Perusahaan</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc id="company" name="customer_office_id" required>
                  @if (isset($customer))
                    <option value="{{$customer->company->id}}">P000{{$customer->company->id}} - {{$customer->company->company_name}}</option>
                    @foreach ($companies as $company)
                      @if ($company->id == $customer->company->id)
                        <option></option>
                      @else
                        <option></option>
                        <option value="{{$company->id}}">P000{{$company->id}} - {{$company->company_name}}</option>    
                      @endif
                    @endforeach
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
              <label class="col-lg-3 col-form-label">Alamat Perusahaan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_address" id="customer_office_address" value="{{ isset($customer) ? $customer->company->company_address : ''}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kota</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_city" id="customer_office_city" value="{{ isset($customer) ? $customer->company->company_city : ''}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Pos</label>
              <div class="col-lg-9">
                <input type="number" class="form-control" name="customer_office_zipcode" id="customer_office_zipcode" value="{{ isset($customer) ? $customer->company->company_zipcode : ''}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Telp</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_phone" id="customer_office_phone" value="{{ isset($customer) ? $customer->company->company_phone : ''}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Fax</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_fax" id="customer_office_fax" value="{{ isset($customer) ? $customer->company->company_fax : ''}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Email</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="customer_office_email" value="{{ isset($customer) ? $customer->company->company_email : ''}}" required>
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
              <label class="col-lg-3 col-form-label">Penghasilan Pemohon</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="customer_income" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Penghasilan Tambahan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="customer_additional_income" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Penghasilan Suami/Istri</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="customer_family_income" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Total</label>
              <div class="col-lg-9">
                  <input type="text" class="form-control price" name="customer_total_income" required readonly>
                </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Pengeluaran Rutin</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="customer_routine_expenses" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sisa Penghasilan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="customer_residual_income" required readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kemampuan Angsuran</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="customer_installment_ability" required>
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
  
  const total = $('input[name=customer_income], input[name=customer_additional_income], input[name=customer_family_income], input[name=customer_routine_expenses]').keyup(() => {
    const a = parseFloat($('input[name=customer_income]').val()) || 0;
    const b = parseFloat($('input[name=customer_additional_income').val()) || 0;
    const c = parseFloat($('input[name=customer_family_income').val()) || 0;
    // const d = parseFloat($('input[name=customer_total_income').val(a + b + c)) || 0;
    const d = parseFloat($('input[name=customer_routine_expenses]').val()) || 0;
    $('input[name=customer_total_income').val(a + b + c);
    $('input[name=customer_residual_income]').val((a + b + c) - d);
  });

  console.log(total);

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
            email: {
                email: true
            }
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