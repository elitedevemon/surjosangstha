@extends('admin.layouts.master')
@section('title', 'Employee DPS List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title d-flex justify-content-between align-items-center">
        Employee DPS Information (List)
        <a class="btn btn-sm btn-primary" id="addNewDPS" href="{{ route('admin.dps.create') }}"
          onclick="addNewDPS()">Add New</a>
      </h5>
      <div class="table-responsive">
        <table class="table-striped table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Name</th>
              <th scope="col">Employee Code</th>
              <th scope="col">Amount</th>
              <th scope="col">Rate</th>
              <th scope="col">Validity</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($employees as $employee)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->employee->name }}</td>
                <td>{{ $employee->employee->employee_code }}</td>
                <td>{{ $employee->amount }} tk</td>
                <td>{{ $employee->rate }}%</td>
                <td>{{ $employee->validity }} Years</td>
                <td><span class="badge {{ $employee->status == 'active' ? 'bg-primary' : ($employee->status == 'inactive' ? 'bg-secondary' : ($employee->status == 'due' ? 'bg-danger' : ($employee->status == 'completed' ? 'bg-success' : 'bg-warning'))) }}">{{ $employee->status }}</span></td>
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
    function addNewDPS() {
      $('#addNewDPS').html('Add new <i class="fas fa-spinner fa-spin"></i>');
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
@endpush
