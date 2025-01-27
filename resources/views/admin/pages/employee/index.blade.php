@extends('admin.layouts.master')
@section('title', 'Employee List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Information (List)</h5>
      <div class="table-responsive">
        <table class="table-striped table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Designation</th>
              <th scope="col">Branch</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('styles')
  {{-- DataTable CDN --}}
  <link href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" rel="stylesheet" />

  {{-- DataTable CSS --}}
  <style>
    table.table.dataTable>tbody>tr td {
      padding: 5px 10px;
    }

    .table tbody tr td {
      font-size: 12px;
    }

    table.table.dataTable>thead>tr th {
      font-size: 12px;
      padding: 6px 20px;
    }

    table.dataTable thead>tr>th.dt-orderable-asc span.dt-column-order,
    table.dataTable thead>tr>th.dt-orderable-desc span.dt-column-order,
    table.dataTable thead>tr>th.dt-ordering-asc span.dt-column-order,
    table.dataTable thead>tr>th.dt-ordering-desc span.dt-column-order,
    table.dataTable thead>tr>td.dt-orderable-asc span.dt-column-order,
    table.dataTable thead>tr>td.dt-orderable-desc span.dt-column-order,
    table.dataTable thead>tr>td.dt-ordering-asc span.dt-column-order,
    table.dataTable thead>tr>td.dt-ordering-desc span.dt-column-order {
      right: 0px;
    }

    .btn.btn-sm {
      font-size: 12px;
    }

    .form-switch .form-check-input {
      width: 2em;
      margin-left: -1.5em;
      cursor: pointer;
    }
  </style>
@endpush

@push('scripts')
  {{-- DataTable CDN --}}
  <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

  {{-- Initializing DataTable --}}
  <script>
    $(document).ready(function() {
      $('#employeeTable').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
          url: "{{ route('admin.employee.list') }}",
          complete: function() {
            $('.employee_status').bootstrapToggle();
          }
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
          },
          {
            data: 'employee_code',
            name: 'employee_code'
          },
          {
            data: 'name',
            name: 'name'
          },
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'contact.own_phone',
            name: 'contact.own_phone'
          },
          {
            data: 'employee_designation.designation',
            name: 'employee_designation.designation'
          },
          {
            data: 'branch.branch_name',
            name: 'branch.branch_name'
          },
          {
            data: 'status',
            name: 'status',
            orderable: false,
            searchable: false

          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
          }
        ],

      });

      // $('.employee_status').bootstrapToggle();
    });
  </script>
@endpush
