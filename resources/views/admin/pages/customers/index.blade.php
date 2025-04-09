@extends('admin.layouts.master')
@section('title', 'Customer List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title d-flex justify-content-between align-items-center">
        Customer Information (List)
        <a class="btn btn-sm btn-primary" id="addNewCustomer" href="{{ route('admin.customer.create') }}"
          onclick="addNewCustomer()">Add New</a>
      </h5>
      <div class="table-responsive">
        <table class="table-striped table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th class="col-si">SI</th>
              <th class="col-code">Code</th>
              <th class="col-name">Name</th>
              <th class="col-address">Address</th>
              <th class="col-group">By Group</th>
              <th class="col-employee">By Employee</th>
              <th class="col-branch">By Branch</th>
              <th class="col-status">Status</th>
              <th class="col-action">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($customers as $customer)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->code }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->group->group_name }}</td>
                <td>{{ $customer->group->employee->name }}</td>
                <td>{{ $customer->group->branch->branch_name }}</td>
                <td>
                  <div class="form-check form-switch">
                    <input class="form-check-input status-btn" data-id="{{ $customer->id }}" type="checkbox"
                      role="switch" {{ $customer->status == 'active' ? 'checked' : '' }}>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <!--Edit button -->
                    <a class="btn btn-primary me-1" href="{{ route('admin.customer.edit', $customer->id) }}"
                      title="Edit" aria-describedby="Edit customer" style="padding: 2px 5px;">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <!-- Delete button -->
                    <form action="{{ route('admin.customer.destroy', $customer->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit" title="Delete" style="padding: 2px 5px;">
                        <i class="fa-solid fa-trash-can-arrow-up"></i>
                      </button>
                    </form>
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
          url: "{{ route('admin.customer.change.status') }}",
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
    th.col-si {
      width: 3%;
    }

    th.col-code {
      width: 8%;
    }

    th.col-name {
      width: 20%;
    }

    th.col-address {
      width: 20%;
    }

    th.col-group,
    th.col-employee,
    th.col-branch {
      width: 12%;
    }

    th.col-status {
      width: 7%;
    }

    th.col-action {
      width: 6%;
    }

    .table th,
    .table td {
      padding: 5px;
      white-space: normal !important;
    }
  </style>
@endpush
