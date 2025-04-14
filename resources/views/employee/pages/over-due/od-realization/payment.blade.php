@extends('employee.layouts.master')
@section('title', 'Customer Overdue Payment')

@section('content')
  <div class="container">
    <h2 class="mb-4">Customer Overdue Payment</h2>

    {{-- Customer Details --}}
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title mb-3">Customer Details</h5>
        <p class="mb-1"><strong>Name:</strong> {{ $overdue->customer->name }}</p>
        <p class="mb-1"><strong>Phone:</strong> {{ $overdue->customer->phone }}</p>
        <p class="mb-0"><strong>Address:</strong> {{ $overdue->customer->address }}</p>
      </div>
    </div>

    {{-- Overdue Details --}}
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title mb-3">Overdue Details</h5>

        <div class="mb-3">
          <span class="fw-bold">Amount:</span>
          <span class="text-primary">৳ {{ number_format($overdue->amount, 2) }}</span>
        </div>

        <div class="mb-3">
          <span class="fw-bold">Due Paid Date:</span>
          <span>{{ \Carbon\Carbon::parse($overdue->due_paid_date)->format('d M, Y') }}</span>
        </div>

        <div class="mb-3">
          <span class="fw-bold">Paid Status:</span>
          <span
            class="badge {{ $overdue->paid_status == 'paid' ? 'bg-success' : ($overdue->paid_status == 'unpaid' ? 'bg-danger' : 'bg-warning') }}">
            {{ ucfirst($overdue->paid_status) }}
          </span>
        </div>

        <div class="mb-4">
          <span class="fw-bold">Overdue Status:</span>
          <span>{{ ucfirst($overdue->od_status) }}</span>
        </div>

        {{-- Action --}}
        @if ($overdue->paid_status != 'paid')
          <button class="btn btn-primary w-100" id="pay_now"
            href="{{ route('employee.over-due.od-realization.pay-now', $overdue->id) }}">Pay Now</button>
        @else
          <div class="text-success fw-bold text-center">Already Paid</div>
        @endif
      </div>
    </div>

    {{-- Back Button --}}
    <on class="btn btn-secondary w-100" href="{{ url()->previous() }}">Back To OD Realization</on>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#pay_now').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#pay_now').html('Please wait <i class="fas fa-spinner fa-spin"></i>');
        $.ajax({
          url: url,
          type: 'GET',
          success:function(response) {
            if (response.status == 'success') {
              $('#pay_now').html('Pay Now');
              toastr.success(response.message);
              setTimeout(function() {
                window.location.href = response.redirect_url;
              }, 2000);
            } else {
              $('#pay_now').html('Pay Now');
              toastr.error(response.message);
            }
          },
          error: function(xhr, status, error) {
            $('#pay_now').html('Pay Now');
            toastr.error('Something went wrong! Please try again.');
            console.log(xhr.responseText); // Log the error response for debugging
          }
        });
      });
    });
  </script>
@endpush

@push('styles')
  <link href="{{ asset('vendor/flasher/toastr.min.css') }}" rel="stylesheet"> 
@endpush
