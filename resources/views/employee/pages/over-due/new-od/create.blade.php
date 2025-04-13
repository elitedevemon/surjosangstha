@extends('employee.layouts.master')
@section('title', 'Create New OD')

@section('content')
  <div class="container">
    <h2 class="mb-4">Customer Overdue Management</h2>

    <div id="message"></div>

    {{-- Customer ID Search --}}
    <div class="mb-4">
      <label class="form-label" for="customer_id">Enter Customer ID</label>
      <input class="form-control" id="customer_id_input" type="text" placeholder="Type Customer ID">
      <button class="btn btn-info mt-2" id="search_customer_btn">Search Customer</button>
    </div>

    {{-- Overdue Form (hidden initially) --}}
    <div class="card" id="overdue_form_section" style="display: none;">
      <div class="card-body">
        <h5 id="customer_info" class="mb-2"></h5>
        <form id="overdue_form">
          @csrf

          <input id="customer_id_field" name="customer_id" type="hidden">
          <input type="hidden" name="employee_id" value="{{ auth()->user()->employee_id }}">

          <div class="mb-3">
            <label class="form-label">Overdue Amount (৳)</label>
            <input class="form-control" name="amount" type="number" required min="0">
          </div>

          <div class="mb-3">
            <label class="form-label">Due Paid Date</label>
            <input class="form-control" name="due_paid_date" type="date" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Overdue Status</label>
            <select class="form-select" name="od_status" required>
              <option value="">-- Select Status --</option>
              <option value="new">New</option>
              <option value="block">Block Customer</option>
            </select>
          </div>

          <button class="btn btn-primary" type="submit" id="submit_overdue">Save Overdue</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('#search_customer_btn').click(function() {
      $('#search_customer_btn').html('Searching <i class="fas fa-spinner fa-spin"></i>');
      let customerId = $('#customer_id_input').val();
      if (!customerId) {
        alert('Please enter a Customer ID');
        return;
      }

      $.ajax({
        url: "{{ route('employee.over-due.new-od.check-customer') }}",
        data: {
          customer_code: customerId
        },
        method: 'GET',
        success: function(response) {
          if (response.status === 'success') {
            $('#overdue_form_section').show();
            $('#customer_info').html(
              `Customer: <strong>${response.data.name}</strong> (ID: ${response.data.code})` +
              `<br>Address: ${response.data.address}`);
            $('#customer_id_field').val(response.data.id);
            $('#message').html('');
            $('#search_customer_btn').html('Search Customer');
          } else {
            $('#overdue_form_section').hide();
            $('#message').html(`<div class="alert alert-danger">${response.message}</div>`);
            $('#search_customer_btn').html('Search Customer');
          }
        }
      });
    });

    $('#overdue_form').submit(function(e) {
      e.preventDefault();
      $('#submit_overdue').html('Please wait <i class="fas fa-spinner fa-spin"></i>');

      $.ajax({
        url: "{{ route('employee.over-due.new-od.store') }}",
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          if (response.status === 'success') {
            $('#message').html(`<div class="alert alert-success">${response.message}</div>`);
            $('#overdue_form')[0].reset();
            $('#overdue_form_section').hide();
            $('#customer_id_input').val('');
            $('#submit_overdue').html('Save Overdue');
          }
        },
        error: function(xhr) {
          let errors = xhr.responseJSON.errors;
          let errorMessage = '<div class="alert alert-danger"><ul>';
          $.each(errors, function(key, value) {
            errorMessage += `<li>${value[0]}</li>`;
          });
          errorMessage += '</ul></div>';
          $('#message').html(errorMessage);
          $('#submit_overdue').html('Save Overdue');
        }
      });
    });
  </script>
@endpush
