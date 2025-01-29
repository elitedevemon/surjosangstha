@extends('admin.layouts.master')
@section('title', 'Employee Salary List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title d-flex justify-content-between align-items-center">
        Employee Salary Information (List)
      </h5>
      <div class="table-responsive">
        <table class="table-striped table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Employee Code</th>
              <th scope="col">Name</th>
              <th scope="col">Basic</th>
              <th scope="col">House Rent</th>
              <th scope="col">Medical Allowance</th>
              <th scope="col">Route Allowance</th>
              <th scope="col">Phone Bill</th>
              <th scope="col">Festival Bonus</th>
              <th scope="col">Special Allowance</th>
              <th scope="col">Total Salary</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($employees as $employee)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->employee_code }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->salary?->basic_salary }}</td>
                <td>{{ $employee->salary?->house_rent }}</td>
                <td>{{ $employee->salary?->medical_allowance }}</td>
                <td>{{ $employee->salary?->route_allowance }}</td>
                <td>{{ $employee->salary?->phone_bill }}</td>
                <td>{{ $employee->salary?->festival_bonus }}</td>
                <td>{{ $employee->salary?->special_allowance }}</td>
                <td>{{ $employee->salary?->total_salary }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <!--Edit button -->
                    <a class="btn btn-primary me-1" href="{{ route('admin.salary-info.edit', $employee->salary->id) }}" title="Edit"
                      aria-describedby="Edit Designation" style="padding: 2px 5px;">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td class="text-center" colspan="6">No data found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
  <script>
    function addNewDesignation() {
      $('#addNewDesignation').html('Add new <i class="fas fa-spinner fa-spin"></i>');
    }

    $(document).ready(function() {
      // delete confirmation
      $('button[type=submit]').click(function(e) {
        e.preventDefault();
        $(this).attr('disabled', true);
        const confirmed = confirm("Are you sure want to delete this.?");
        if (confirmed === true) {
          $(this).closest('form').submit();
        } else {
          $(this).removeAttr('disabled');
        }
      });

      // status change
      $('.status-btn').change(function() {
        const status = $(this).prop('checked');
        const id = $(this).data('id');
        $.ajax({
          type: "post",
          url: "{{ route('admin.designation.change.status') }}",
          data: {
            status: status,
            id: id,
            _token: "{{ csrf_token() }}"
          },
          success: function(response) {
            toastr.success(response.message);
          }
        });
      })
    });
  </script>
@endpush

@push('styles')
  <link href="{{ asset('vendor/flasher/toastr.min.css') }}" rel="stylesheet">
  <style>
    .table thead tr th {
      font-size: 12px;
    }

    .table th,
    .table td {
      padding: 5px 5px;
    }

    .table tbody tr td {
      font-size: 12px;
    }

    .btn {
      font-size: 10px;
      padding: 1px 2px;
    }
  </style>
@endpush
