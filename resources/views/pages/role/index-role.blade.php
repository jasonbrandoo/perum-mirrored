@extends('layouts.app') 
@section('page-title')
<div class="mr-auto">
  <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Role</span> - Role List</h4>
  <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div>
  <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#add_role"><i class="icon-plus-circle2 mr-2"></i>Add</button>
</div>

<div id="add_role" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h6 class="modal-title">Add Role</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form method="POST" action="" id="role_form">
          @csrf
          <div class="form-group row justify-content-center">
            <div class="col-8">
              <label class="col-form-label">Role Name</label>
              <input type="text" class="form-control" name="role_name" placeholder="Role Name" required>
            </div>
          </div>
          <div class="form-group row justify-content-center mb-4">
            <div class="col-8">
              <label class="col-form-label">Description</label>
              <input type="text" class="form-control" name="role_description" placeholder="Description" required>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" id="submit_role" class="btn bg-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('breadcrumb')
<a href="{{ route('role.index') }}" class="breadcrumb-item">Role</a>
@endsection
 
@section('content') @if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Role List</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
        <a class="list-icons-item" data-action="reload"></a>
        <a class="list-icons-item" data-action="remove"></a>
      </div>
    </div>
  </div>

  <table class="table datatable-select-checkbox table-bordered" id="role-table">
    <thead>
      <tr>
        <th></th>
        <th>Role ID</th>
        <th>Role Name</th>
        <th>Access Page</th>
        <th><i class="icon-gear"></i></th>
      </tr>
    </thead>
  </table>
</div>
@endsection
 @push('scripts')
<script>
  $(() => {
    $('#submit_role').click(() => {
      const data = $('#role_form').serialize();
      $.ajax({
        url: '{{ route('role.store') }}',
        method: 'POST',
        data: data,
        success: (result) => {
          swal({
            type: 'success',
            text: 'Succesfull add new role'
          }).then(() => {
            window.location.href = '/role'
          })
        },
        error: (err) => {
          console.log(err)
          if (!$('input[name=role_name]').val()) {
            swal({
              type: 'error',
              text: 'Please fill the role name field'
            });
          } else {
            swal({
            type: 'error',
            text: err
            })
          }
          
        }
      })
    })
  })
  var DatatableSelect = function() {
    var _componentDatatableSelect = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: 100,
            }],
            dom: '<"datatable-header"flB><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                searchPlaceholder: 'Type to search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        $('#role-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('role.data') !!}',
            columns: [
                {
                    data: 'id',
                    className: 'select-checkbox',
                    width: '50px',
                    orderable: false,
                    render: () => ''
                },
                {
                    data: 'id',
                    width: '200px',
                    render: (id) => `R000${id}`
                },
                {
                    data: 'name',
                },
                {
                    data: 'id',
                    width: '50px',
                    render: (id) => `<a href="/role/${id}/page" class="icon-direction"></a>`
                },
                {
                    data: 'id',
                    width: '50px',
                    orderable: false,
                    render: (id) => `<a href="/role/${id}/show" class="icon-key"></a>`
                }
            ],
            select: {
                style: 'os'
            },
            buttons: [
                {
                    extend: 'collection',
                    text: 'Select Action',
                    className: 'btn',
                    buttons: [
                        {
                            text: 'Deactive',
                            className: '_active',
                            action: (e, dt, type, indexes) => {
                                const { id } = dt.row({selected: true}).data();
                                $.ajax({
                                    url: `/role/${id}/action`,
                                    type: 'PATCH',
                                    data: {
                                        id: id,
                                        active: 'Deactive'
                                    },
                                    success: (response) => {
                                        swal({
                                            type: 'success',
                                            text: 'Success'
                                        }).then(() => {
                                            window.location.reload();
                                        });
                                        console.log(response)
                                    },
                                    error: (err) => {
                                        swal({
                                            type: 'error',
                                            text: 'Error'
                                        })
                                    }
                                })
                            }
                        },
                        {
                            text: 'Active',
                            className: '_active',
                            action: (e, dt, type, indexes) => {
                                const { id } = dt.row({selected: true}).data();
                                $.ajax({
                                    url: `/role/${id}/action`,
                                    type: 'PATCH',
                                    data: {
                                        id: id,
                                        active: 'Active'
                                    },
                                    success: (response) => {
                                        swal({
                                            type: 'success',
                                            text: 'Success'
                                        }).then(() => {
                                            window.location.reload();
                                        });
                                        console.log(response)
                                    },
                                    error: (err) => {
                                        swal({
                                            type: 'error',
                                            text: 'Error'
                                        })
                                    }
                                })
                            }
                        }
                    ]
                }
            ]
        });
        
    };

    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };

    return {
        init: function() {
            _componentDatatableSelect();
            _componentSelect2();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
DatatableSelect.init();
});

</script>




@endpush