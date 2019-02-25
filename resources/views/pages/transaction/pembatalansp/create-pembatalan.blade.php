@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - {{isset($pembatalan) ? 'Edit Pembatalan' : 'Create New Pembatalan'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.pembatalan.index') }}" class="breadcrumb-item">Pembatalan Surat Pesanan</a>
<a href="{{ route('transaction.pembatalan.create') }}" class="breadcrumb-item">{{isset($pembatalan) ? 'Edit Pembatalan' : 'Create New Pembatalan'}}</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{isset($pembatalan) ? 'Edit Pembatalan' : 'Create New Pembatalan'}}</h5>
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

  @if (isset($pembatalan))
    <form action="{{ route('transaction.pembatalan.update') }}" class="form-validate-jquery" method="POST">
      <input type="hidden" name="id" value="{{$pembatalan->id}}">
      @method('PATCH')
  @else
    <form action="{{ route('transaction.pembatalan.store') }}" class="form-validate-jquery" method="POST">
  @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Pembatalan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="PSP000{{isset($pembatalan) ? $pembatalan->id : $id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="cancel_date" value="{{isset($pembatalan) ? $pembatalan->cancel_date->toDateString() : ''}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kelompok Pembatalan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_group" value="{{isset($pembatalan) ? $pembatalan->cancel_group : ''}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alasan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_reason" value="{{isset($pembatalan) ? $pembatalan->cancel_reason : ''}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perincian Refund</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_refund" value="{{isset($pembatalan) ? $pembatalan->cancel_refund : ''}}">
              </div>
            </div>
            
            
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="cancel_status" required>
                  @if (isset($pembatalan))
                    <option value="{{$pembatalan->cancel_status}}">{{$pembatalan->cancel_status}}</option>
                  @endif
                    <option></option>
                    <option value="created">CREATED</option>
                    <option value="approve">APPROVE</option>
                    <option value="reject">REJECT</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tambahan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_tambahan" value="{{isset($pembatalan) ? $pembatalan->cancel_tambahan : ''}}" >
              </div>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Sp</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="cancel_sp_id" id="sp_id" required>
                  @if (isset($pembatalan))
                    <option value="{{$pembatalan->surat->id}}">SP000{{$pembatalan->surat->id}}</option>
                    @foreach ($surat_edit as $surat)
                      @if ($surat->id == $pembatalan->surat->id)
                        <option></option>
                      @else
                        <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($sps as $sp)
                      <option value=""></option>
                      <option value="{{$sp->id}}">SP000{{$sp->id}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal SP</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control" id="sp_date" name="sp_date" value="{{isset($pembatalan) ? $pembatalan->surat->sp_date->toDateString() : ''}}" readonly required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Konsumen</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_consumen" name="sp_consumen" value="{{isset($pembatalan) ? $pembatalan->surat->customer->customer_name : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kavling" name="sp_kavling" value="{{isset($pembatalan) ? $pembatalan->surat->kavling->kavling_cluster : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="sp_block" name="sp_block" value="{{isset($pembatalan) ? $pembatalan->surat->sp_house_block : ''}}" readonly required>
                  </div>
                  <label class="col-form-label">No</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="sp_number" name="sp_number" value="{{isset($pembatalan) ? $pembatalan->surat->sp_house_no : ''}}" readonly required>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_building" name="sp_building" value="{{isset($pembatalan) ? $pembatalan->surat->kavling->house->building_area_m2 : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_surface" name="sp_surface" value="{{isset($pembatalan) ? $pembatalan->surat->kavling->house->surface_area_m2 : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tipe Rumah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_house_type" name="sp_house_type" value="{{isset($pembatalan) ? $pembatalan->surat->kavling->house->rumah_type_name : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cluster</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_cluster" name="sp_cluster" value="{{isset($pembatalan) ? $pembatalan->surat->sp_house_cluster : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Sales Executive</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_se" name="sp_se" value="{{isset($pembatalan) ? $pembatalan->surat->supervisor->sales_name : ''}}" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perincian Pembayaran Konsume</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="cancel_consumen_bill" name="cancel_consumenbill" value="{{isset($pembatalan) ? $pembatalan->cancel_consumen_bill : ''}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jumlah</label>
              <div class="col-lg-9">    
                <input type="text" class="form-control" name="cancel_total_bill" name="cancel_total_bill" value="{{isset($pembatalan) ? $pembatalan->cancel_total_bill : ''}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Dibuat Oleh</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="cancel_make_by" required>
                  @if (isset($pembatalan))
                    <option value="{{$pembatalan->makeBy->id}}">{{$pembatalan->makeBy->name}}</option>
                    @foreach ($user_edit as $user)
                      @if ($user->id == $pembatalan->makeBy->id)
                        <option></option>
                      @else
                        <option value="{{$user->id}}">{{$user->name}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($users as $user)
                      <option value=""></option>
                      <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Disetujui oleh</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="cancel_approve_by" required>
                  @if (isset($pembatalan))
                    <option value="{{$pembatalan->approveBy->id}}">{{$pembatalan->approveBy->name}}</option>
                    @foreach ($user_edit as $user)
                      @if ($user->id == $pembatalan->approveBy->id)
                        <option></option>
                      @else
                        <option value="{{$user->id}}">{{$user->name}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($users as $user)
                      <option value=""></option>
                      <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  @endif
                </select>
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
  $('#sp_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.pembatalan.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_date').val(result.sp_date);
      $('#sp_consumen').val(result.customer.customer_name);
      $('#sp_kavling').val(result.kavling.id);
      $('#sp_block').val(result.kavling.kavling_block);
      $('#sp_number').val(result.sp_house_no);
      $('#sp_building').val(result.kavling.price.house.building_area_m2);
      $('#sp_surface').val(result.kavling.price.house.surface_area_m2);
      $('#sp_house_type').val(result.kavling.price.house.rumah_type_name);
      $('#sp_cluster').val(result.kavling.kavling_cluster);
      $('#sp_se').val(result.sales.sales_name);
    },
    error: function (e) {
      console.log(e);
    }
    });
  });
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
              else if (element.parent().is('form-control') || element.parents().hasClass('input-group')) {
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