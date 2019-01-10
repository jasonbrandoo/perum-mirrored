@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">MOU</span> - Create New MOU</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New MOU</h5>
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
    <form action="{{ route('transaction.mou.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nomer Perjanjian:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="mou_id" value="MOU000{{$id}}" readonly>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kode Perusahaan / Instansi:</label>
              <div class="col-lg-9">
                <select data-placeholder="Type" class="form-control form-control-select2" data-fouc name="mou_company_id">
                  @foreach ($companies as $company)
                    <option value="{{$company->id}}">{{$company->id}}, {{$company->company_type}}, {{$company->company_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Koordinator:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="mou_coordinator">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jabatan:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="mou_coordinator_position">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Status Perjanjian(MOU):</label>
              <div class="col-lg-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="mou_active">
                </div>
              </div>
            </div>
          </fieldset>
        </div>

        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal MOU:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="mou_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Mulai:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="mou_start_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Berakhir:</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar2"></i></span>
                  </span>
                  <input type="text" class="form-control pickadate-selectors" name="mou_end_date">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Perhitungan Komisi:</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="mou_commision">
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

var DateTimePickers = function() {
    // Pickadate picker
    var _componentPickadate = function() {
        if (!$().pickadate) {
            console.warn('Warning - picker.js and/or picker.date.js is not loaded.');
            return;
        }

        // Dropdown selectors
        $('.pickadate-selectors').pickadate({
            selectYears: true,
            selectMonths: true
        });

        // Events
        $('.pickadate-events').pickadate({
            onStart: function() {
                console.log('Hello there :)')
            },
            onRender: function() {
                console.log('Whoa.. rendered anew')
            },
            onOpen: function() {
                console.log('Opened up')
            },
            onClose: function() {
                console.log('Closed now')
            },
            onStop: function() {
                console.log('See ya.')
            },
            onSet: function(context) {
                console.log('Just set stuff:', context)
            }
        });
    };

    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentPickadate();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DateTimePickers.init();
});

</script>
@endpush