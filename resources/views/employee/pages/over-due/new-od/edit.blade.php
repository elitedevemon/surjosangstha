@extends('employee.layouts.master')
@section('title', 'Edit OD')

@section('content')
  <div class="container">
    <h2 class="mb-4">Customer Overdue Management</h2>

    <div id="message"></div>

    {{-- Overdue Form (hidden initially) --}}
    <div class="card" id="overdue_form_section">
      <div class="card-body">
        <h5 class="mb-2" id="customer_info"></h5>
        <form id="overdue_update" action="{{ route('employee.over-due.new-od.update', $overdue->id) }}" method="POST">
          @csrf
          @method('PUT')

          <input name="customer_id" type="hidden" value="{{ $overdue->customer_id }}">
          <input name="employee_id" type="hidden" value="{{ auth()->user()->employee_id }}">
          <input name="od_status" type="hidden" value="{{ $overdue->od_status }}">

          <div class="mb-3">
            <label class="form-label">Overdue Amount (৳)</label>
            <input class="form-control" name="amount" type="number" value="{{ $overdue->amount }}" required
              min="0">
          </div>

          <div class="mb-3">
            <label class="form-label">Due Paid Date</label>
            <input class="form-control" name="due_paid_date" type="date"
              value="{{ $overdue->due_paid_date ? \Carbon\Carbon::parse($overdue->due_paid_date)->format('Y-m-d') : '' }}"
              required>
          </div>

          <button class="btn btn-primary" id="submit_overdue" type="submit">Save Overdue</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function () {
      $('#overdue_update').on('submit', function (e) {
        $('#submit_overdue').html('Saving <i class="fas fa-spinner fa-spin"></i>');
        $('#submit_overdue').attr('disabled', true);
      });
    });
  </script>
@endpush
