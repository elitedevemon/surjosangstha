@extends('employee.layouts.master')
@section('title', 'Customer List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title d-flex justify-content-between align-items-center">
        Customer Information (List)
        <a class="btn btn-sm btn-primary" id="addNewCustomer" href="{{ route('employee.customer.create') }}"
          onclick="addNewCustomer()">Add New</a>
      </h5>
      <div class="table-responsive">
        <table class="table-striped table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Due Amount</th>
              <th scope="col">By Group</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($customers as $customer)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->code }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ Number::currency($customer->block_customer_due, 'BDT') }}</td>
                <td>{{ $customer->group->group_name }}</td>
                <td>
                  <div class="form-check form-switch">
                    <input class="form-check-input status-btn" data-id="{{ $customer->id }}" type="checkbox"
                      role="switch" {{ $customer->status == 'active' ? 'checked' : '' }}>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <!--Edit button -->
                    <a class="btn btn-primary me-1" href="{{ route('employee.over-due.new-od.edit', $customer->id) }}"
                      title="Edit" aria-describedby="Edit customer" style="padding: 2px 5px;">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td class="text-center" colspan="8">No data found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      {{ $customers->links('pagination::bootstrap-5') }}
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
  <script>
    function addNewCustomer() {
      $('#addNewCustomer').html('Add new <i class="fas fa-spinner fa-spin"></i>');
    }

    $(document).ready(function() {
      // status change
      $('.status-btn').change(function() {
        const status = $(this).prop('checked');
        const id = $(this).data('id');
        $.ajax({
          type: "post",
          url: "{{ route('employee.customer.change.status') }}",
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
    .table th,
    .table td {
      white-space: normal !important;
    }
  </style>
@endpush
