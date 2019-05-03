@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - {{isset($spk) ? 'Edit Spk' : 'Create New Spk'}}</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.spk.index') }}" class="breadcrumb-item">SPK</a>
<a href="{{ route('transaction.spk.create') }}" class="breadcrumb-item">{{isset($spk) ? 'Edit Spk' : 'Create New Spk'}}</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">{{isset($spk) ? 'Edit Spk' : 'Create New Spk'}}</h5>
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

    @if (isset($spk))
      <form action="{{ route('transaction.spk.update')}}" class="form-validate-jquery" method="POST">
        <input type="hidden" name="id" value="{{$spk->id}}">
        @method('PATCH')
    @else
      <form action="{{ route('transaction.spk.store')}}" class="form-validate-jquery" method="POST">
    @endif
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SPK</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="SPK000{{isset($spk) ? $spk->id : $id}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal SPK</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="spk_date" value="{{isset($spk) ? $spk->spk_date->toDateString() : ''}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nilai SPK</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="spk_price" value="{{isset($spk) ? $spk->spk_price : ''}}" required>
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
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomor SP</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="spk_sp_id" id="sp_id" required>
                  @if (isset($spk))
                    <option value="{{$spk->surat->id}}">SP000{{$spk->surat->id}} - {{$spk->surat->customer->customer_name}} - BLOK {{$spk->surat->kavling->kavling_block}}</option>
                    @foreach ($surat_edit as $surat)
                      @if ($surat->id == $spk->surat->id)
                        <option></option>
                      @else
                        <option value="{{$surat->id}}}">SP000{{$surat->id}} - {{$surat->customer->customer_name}} - BLOK {{$surat->kavling->kavling_block}}</option>
                      @endif
                    @endforeach
                  @else
                    @foreach ($sps as $sp)
                      <option value=""></option>
                      <option value="{{$sp->id}}">SP000{{$sp->id}} - {{$sp->customer->customer_name}} - BLOK {{$sp->kavling->kavling_block}}</option>
                    @endforeach
                  @endif
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
                  <input type="text" class="form-control pickadate" id="sp_date" name="sp_date" value="{{isset($spk) ? $spk->surat->sp_date->toDateString() : ''}}" required readonly>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Customer</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_customer" name="sp_customer" value="{{isset($spk) ? $spk->surat->customer->customer_name : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Blok</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="sp_block" name="sp_block" value="{{isset($spk) ? $spk->surat->kavling->kavling_block : ''}}" required readonly>
                  </div>
                  <label class="col-form-label">No</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" id="sp_no" name="sp_no" value="{{isset($spk) ? $spk->surat->kavling->id : ''}}" required readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Bangunan</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_building" name="sp_building" value="{{isset($spk) ? $spk->surat->kavling->house->building_area_m2 : ''}}" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Luas Tanah</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_surface" name="sp_surface" value="{{isset($spk) ? $spk->surat->kavling->house->surface_area_m2 : ''}}" required readonly>
              </div>
            </div>
            {{-- <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanah Lebih</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" >
              </div>
            </div> --}}
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Cluster</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_cluster" name="sp_cluster" value="{{isset($spk) ? $spk->surat->kavling->kavling_cluster : ''}}" required readonly>
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
  $('#sp_id').on('change', function(e){
    var id = $(this).val();
    console.log(id);
    $.ajax({
    url: '{{route('transaction.spk.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_date').val(result.sp_date);
      $('#sp_customer').val(result.customer.customer_name);
      $('#sp_block').val(result.sp_house_block);
      $('#sp_no').val(result.sp_no);
      $('#sp_building').val(result.sp_house_building);
      $('#sp_surface').val(result.sp_house_surface);
      $('#sp_cluster').val(result.sp_house_cluster);

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