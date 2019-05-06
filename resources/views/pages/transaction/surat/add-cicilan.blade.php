@extends('layouts.app')
@section('page-title')
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Transaction</span> - Add Cicilan</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection
@section('breadcrumb')
<a href="{{ route('transaction.surat-pesanan.index') }}" class="breadcrumb-item">Surat Pesanan</a>
<a href="{{ route('transaction.surat-pesanan.edit', ['id' => $id]) }}" class="breadcrumb-item">Edit
  Surat Pesanan</a>
@endsection
@section('content')
<div class="card">
  <div class="card-body">
    <table class="table datatable-select-checkbox table-bordered" id="role-table">
      <thead>
        <tr>
          <th class="text-center" style="width: 50px">Description</th>
          <th class="text-center" style="width: 50px">Piutang</th>
          <th class="text-center" style="width: 50px">Tanggal</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Add Cicilan</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('transaction.surat-pesanan.updateAddCicilanSp', ['id' => $id]) }}" class="form-validate-jquery" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Description</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="description[]" id="description" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Piutang</label>
              <div class="col-lg-9">
                <input type="text" class="form-control price" name="piutang[]" id="piutang" required>
              </div>
            </div>
          </fieldset>
          <div class="text-right">
            <button type="button" class="btn btn-primary adder">Add</button>
            <button type="submit" class="btn btn-primary submitter">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(() => {
    const arr = [];
    $('.adder').click(() => {
      const description = $('#description').val();
      const piutang = $('#piutang').val();
      const markup = `<tr><td>${description}</td><td>${piutang}</td><td>${moment().format("D MMMM YYYY")}</td></tr>`;
      $("table tbody").append(markup);
      const data = {
        description,
        piutang
      }
      arr.push(data);
    });
    $('.submitter').click((e) => {
      e.preventDefault();
      console.log(arr);
      $.ajax({
        url: '{{route("transaction.surat-pesanan.updateAddCicilanSp", ["id" => $id])}}',
        method: 'POST',
        data: {
          cust_id : '{{$customer_id}}',
          data: arr
        },
        success: (res) => {
          swal({
              type: 'success',
              text: 'Success',
              confirmButtonClass: 'btn btn-primary',
          }).then(() => {
              window.location.href = '/transaction/surat-pesanan/{{$id}}/edit';
          });
        },
        error: (err) => {
          console.log(err);
        }
      })
    })
  });
</script>
@endpush