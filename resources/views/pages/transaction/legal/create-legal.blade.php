@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Create New Legal</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.legal.index') }}" class="breadcrumb-item">Legal</a>
<a href="{{ route('transaction.legal.create') }}" class="breadcrumb-item">New Legal</a>
@endsection

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
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('transaction.legal.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Permohonan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="PLK000{{$id}}" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Permohonan:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="legal_date">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No SHGB Induk:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="legal_shgb_parent">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_shgb_parent_date">
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
                    <input type="text" class="form-control" name="legal_shgb_fraction">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_shgb_fraction_date">
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
                    <input type="text" class="form-control" name="legal_name">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_name_date">
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
                    <input type="text" class="form-control" name="legal_shm">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_shm_date">
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
                    <input type="text" class="form-control" name="legal_imb">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_imb_date">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">NOP PBB:</label>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="legal_nop_pbb">
                  </div>
                  <label class="col-form-label">Tanggal:</label>
                  <div class="col-md">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="legal_nop_pbb_date">
                    </div>
                  </div>
                </div>
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
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No Sp:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="legal_sp_id" id="sp_id">
                  @foreach ($sps as $surat)
                    <option value=""></option>
                    <option value="{{$surat->id}}">SP000{{$surat->id}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perusahaan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_company" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Sales:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_sales" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kavling:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" id="sp_kavling" readonly>
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
    url: '{{route('transaction.legal.load_sp')}}',
    data: {
      id: id
    },
    success: function (result) {
      console.log(result);
      $('#sp_company').val(result.company.company_name);
      $('#sp_sales').val(result.sales.sales_name);
      $('#sp_kavling').val(result.kavling.kavling_type);
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
</script>
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush