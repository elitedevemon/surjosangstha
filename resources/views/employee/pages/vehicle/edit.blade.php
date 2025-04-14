@extends('employee.layouts.master')
@section('title', 'Edit Vehicle')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Vehicle</h5>
      <form action="{{ route('employee.vehicle.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="form-group mt-3">
          <!-- branch name -->
          <label for="branch_id">Branch Name</label>
          <select class="@error('branch_id') is_invalid @enderror form-select" id="branch_id" name="branch_id"
            aria-label="Groups" @error('branch_id') aria-describedby="branch_id-error" @enderror required>
            <option selected value="{{ auth()->user()->employee->branch->id }}">{{ auth()->user()->employee->branch->branch_name }}</option>
          </select>
          @error('branch_id')
            <div class="invalid-feedback" id="branch_id-error">{{ $message }}</div>
          @enderror
        </div>
        <!-- vehicle owner name and phone number -->
        <div class="row">
          <div class="form-group col-md-6 mt-3">
            <label for="owner_name">Owner Name</label>
            <input class="form-control @error('owner_name') is-invalid @enderror" id="owner_name"
              name="owner_name" type="text" value="{{ $vehicle->owner_name }}"
              @error('owner_name') aria-describedby="owner_name-error" @enderror placeholder="Enter owner name"
              required>
            @error('owner_name')
              <div class="invalid-feedback" id="owner_name-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6 mt-3">
            <label for="mobile_number">Phone Number</label>
            <input class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number"
              name="mobile_number" type="text" value="{{ $vehicle->mobile_number }}"
              @error('mobile_number') aria-describedby="mobile_number-error" @enderror placeholder="Enter phone number"
              required>
            @error('mobile_number')
              <div class="invalid-feedback" id="mobile_number-error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <!-- owner address -->
          <div class="form-group col-md-6 mt-3">
            <label for="address">Address</label>
            <input class="form-control @error('address') is-invalid @enderror" id="address"
              name="address" type="text" value="{{ $vehicle->address }}"
              @error('address') aria-describedby="address-error" @enderror
              placeholder="Enter address" required>
            @error('address')
              <div class="invalid-feedback" id="address-error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <button class="btn btn-primary mt-4" type="submit">Update Vehicle</button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function() {
        $(this).attr('disabled', true);
        $(this).html('Updating vehicle <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush

