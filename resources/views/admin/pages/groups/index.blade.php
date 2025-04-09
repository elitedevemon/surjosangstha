@extends('admin.layouts.master')
@section('title', 'Group List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title d-flex justify-content-between align-items-center">
        Group Information (List)
        <a class="btn btn-sm btn-primary" id="addNewGroup" href="{{ route('admin.group.create') }}"
          onclick="addNewGroup()">Add New</a>
      </h5>
      <div class="table-responsive">
        <table class="table-striped table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">By Employee</th>
              <th scope="col">By Branch</th>
              <th scope="col">Total Customer</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($groups as $group)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $group->group_code }}</td>
                <td>{{ $group->group_name }}</td>
                <td>{{ $group->group_address }}</td>
                <td>{{ $group->employee->name }}</td>
                <td>{{ $group->branch->branch_name }}</td>
                <td>{{ count($group->customer) ?? 0 }}</td>
                <td>
                  <div class="form-check form-switch">
                    <input class="form-check-input status-btn" data-id="{{ $group->id }}" type="checkbox"
                      role="switch" {{ $group->status == 'active' ? 'checked' : '' }}>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <!--Edit button -->
                    <a class="btn btn-primary me-1" href="{{ route('admin.group.edit', $group->id) }}"
                      title="Edit" aria-describedby="Edit group" style="padding: 2px 5px;">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <!-- Delete button -->
                    <form action="{{ route('admin.group.destroy', $group->id) }}" method="post">
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
                <td class="text-center" colspan="9">No data found</td>
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
    function addNewGroup() {
      $('#addNewGroup').html('Add new <i class="fas fa-spinner fa-spin"></i>');
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
          url: "{{ route('admin.group.change.status') }}",
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
