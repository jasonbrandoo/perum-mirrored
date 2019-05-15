@extends('layouts.app')

@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Create New Realisasi
  Wawancara</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('breadcrumb')
<a href="{{ route('transaction.realisasi.index') }}" class="breadcrumb-item">Realisasi Wawancara</a>
<a href="{{ route('transaction.realisasi.create') }}" class="breadcrumb-item">New Realisasi Wawancara</a>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Create New Realisasi Wawancara</h5>
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
  <div class="card-body">
    <form action="{{ route('transaction.realisasi.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md">
          <fieldset>
            <div id="sections">
              <div class="section">
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">No Rencana Wawancara</label>
                  <div class="col-lg-9">
                    <select data-placeholder="Type" class="form-control" name="rlw_wawancara_id[]" id="wawancara_id">
                      <option value="" disabled selected></option>
                      @foreach ($wawancaras as $wawancara)
                      <option value="{{$wawancara->id}}">RW000{{$wawancara->id}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Tanggal Realisasi</label>
                  <div class="col-lg-9">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar2"></i></span>
                      </span>
                      <input type="text" class="form-control pickadate-selectors" name="rlw_date[]">
                    </div>
                  </div>
                </div>
                <hr>
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
  $(document).ready(function() {
    $(".pickadate-selectors").datepicker({
      autoclose: true
    });

    $("#wawancara_id").on("change", function(e) {
      var id = $(this).val();
      console.log(id);
      $.ajax({
        url: "{{route('transaction.realisasi.load_wawancara')}}",
        data: {
          id: id
        },
        success: function(result) {
          console.log(result);
          $("#rlw_kpr").val(result.wawancara_kpr);
          $("#rlw_analyst").val(result.wawancara_analyst);
          $("#rlw_note").val(result.wawancara_note);
          $("#sp_id").val(result.surat.id);
          $("#sp_date").val(result.surat.sp_date);
          $("#sp_price").val(result.surat.sp_price);
          $("#sp_se").val(result.surat.sales.sales_name);
          $("#sp_customer_id").val(result.surat.customer.id);
          $("#sp_customer_name").val(result.surat.customer.customer_name);
          $("#sp_kavling").val(result.surat.kavling.kavling_cluster);
          $("#sp_rumah").val(result.surat.kavling.house.rumah_type_name);
          $("#sp_kreditur").val(result.wawancara_kreditur_id);
          $("#sp_kreditur_name").val(result.wawancara_kreditur_name);
        },
        error: function(e) {
          console.log(e);
        }
      });
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
      const asd = section.find('.pickadate-selectors').datepicker();
      console.log(asd);
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
  });
</script>
<script src="/template/global_assets/js/demo_pages/form_layouts.js"></script>
@endpush
