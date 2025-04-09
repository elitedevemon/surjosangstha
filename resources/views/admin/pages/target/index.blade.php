@extends('admin.layouts.master')
@section('title', 'Daily Target')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Target</h5>
      <form id="target-form">
        @csrf
        <!-- group by employee -->
        <div class="form-group mt-3">
          <label for="employee_id">Employee Name</label>
          <select class="@error('employee_id') is_invalid @enderror form-select" id="employee_id"
            name="employee_id" aria-label="Groups"
            @error('employee_id') aria-describedby="employee_id-error" @enderror required>
            <option disabled selected>--Select Employee--</option>
            @forelse ($employees as $employee)
              <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @empty
              <option disabled>No employee found</option>
            @endforelse
          </select>
          @error('employee_id')
            <div class="invalid-feedback" id="employee_id-error">{{ $message }}</div>
          @enderror
        </div>

        <!-- group by target -->
        <div class="row" id="target-fields">

        </div>
        <button class="btn btn-primary mt-4" type="submit" disabled>Add Target</button>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function() {
        $(this).attr('disabled', true);
        $(this).html('Adding Target <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });

      // update the target record
      $('#target-form').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
          url: "{{ route('admin.target.store') }}", // update this to your correct route
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          beforeSend: function() {
            $('.invalid-feedback').text(''); // Clear previous errors
            $('button[type="submit"]').attr('disabled', true);
          },
          success: function(response) {
            toastr.success(response.message);
            // Clear the form fields
            $('button[type="submit"]').attr('disabled', false);
            $('button[type="submit"]').html('Add Target');
          },
          error: function(xhr) {
            if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors;
              $.each(errors, function(key, val) {
                // Display error messages for each field
                $('#' + key).addClass('is_invalid');
                $('#' + key).attr('aria-describedby', key + '-error');
                $('#' + key + '-error').text(val[0]);
                // Display toastr error message
                toastr.error(val[0]);
              });
              
              $('button[type="submit"]').attr('disabled', false);
              $('button[type="submit"]').html('Add Target');
            } else {
              toastr.error('Something went wrong!');
              $('button[type="submit"]').attr('disabled', false);
              $('button[type="submit"]').html('Add Target');
            }
            $('button[type="submit"]').attr('disabled', false);
          }
        });
      });

      // Search the employee record
      $('#employee_id').on('change', function() {
        $('button[type="submit"]').prop('disabled', false);
        let employeeId = $(this).val();

        $.ajax({
          url: "{{ route('admin.target.check') }}",
          type: 'POST',
          data: {
            employee_id: employeeId,
            _token: '{{ csrf_token() }}'
          },
          beforeSend: function() {
            $('.card-title').html(
            'Add Target <i class="fas fa-spinner fa-spin"></i>'); // Clear previous fields
          },
          success: function(response) {
            $('#target-fields').html(response.html);
            $('.card-title').html('Add Target'); // Clear previous fields
          },
          error: function(xhr) {
            console.error(xhr);
          }
        });
      });
    });
  </script>
@endpush

@push('styles')
  <link href="{{ asset('vendor/flasher/toastr.min.css') }}" rel="stylesheet">
@endpush
