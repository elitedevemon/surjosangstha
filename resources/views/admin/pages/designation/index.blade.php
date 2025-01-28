@extends('admin.layouts.master')
@section('title', 'Designation List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title d-flex justify-content-between align-items-center">
        Designation Information (List)
        <a class="btn btn-sm btn-primary" id="addNewDesignation" href="{{ route('admin.designation.create') }}"
          onclick="addNewDesignation()">Add New</a>
      </h5>
      <div class="table-responsive">
        <table class="table-striped table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Designation</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($designations as $designation)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $designation->designation }}</td>
                <td>
                  <div class="form-check form-switch">
                    <input class="form-check-input status-btn" data-id="{{ $designation->id }}" type="checkbox"
                      role="switch" {{ $designation->status == 'active' ? 'checked' : '' }}>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <!--Edit button -->
                    <a class="btn btn-primary me-1" href="{{ route('admin.designation.edit', $designation->id) }}"
                      title="Edit" aria-describedby="Edit Designation" style="padding: 2px 5px;">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('admin.designation.destroy', $designation->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit" title="Delete" style="padding: 2px 5px;"
                        onclick="deleteDesignationRecord()">
                        <i class="fa-solid fa-trash-can-arrow-up"></i>
                      </button>
                    </form>
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
@endpush
