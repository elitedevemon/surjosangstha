@extends('admin.layouts.master')
@section('title', 'Add Customer')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Customer</h5>
      <form action="{{ route('admin.customer.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
          <!-- group name -->
          <label for="group_id">Group Name</label>
          <select class="@error('group_id') is_invalid @enderror form-select" id="group_id" name="group_id"
            aria-label="Groups" @error('group_id') aria-describedby="group_id-error" @enderror required>
            <option disabled selected>--Select Group--</option>
            @forelse ($groups as $group)
              <option value="{{ $group->id }}">{{ $group->group_name }}</option>
            @empty
              <option disabled>No groups found</option>
            @endforelse
          </select>
          @error('group_id')
            <div class="invalid-feedback" id="group_id-error">{{ $message }}</div>
          @enderror
        </div>
        <!-- customer code & customer name -->
        <div class="row">
          <div class="form-group col-md-6 mt-3">
            <label for="code">Customer Code</label>
            <input class="form-control @error('code') is-invalid @enderror" id="code" name="code"
              type="text" value="{{ old('code') }}" @error('code') aria-describedby="code-error" @enderror
              placeholder="Enter customer code" required>
            @error('code')
              <div class="invalid-feedback" id="code-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6 mt-3">
            <label for="name">Customer Name</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
              type="text" value="{{ old('name') }}" @error('name') aria-describedby="name-error" @enderror
              placeholder="Enter customer name" required>
            @error('name')
              <div class="invalid-feedback" id="name-error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <!-- customer address -->
        <div class="form-group mt-3">
          <label for="address">Customer Address</label>
          <input class="form-control @error('address') is-invalid @enderror" id="address" name="address"
            type="text" value="{{ old('address') }}"
            @error('address') aria-describedby="address-error" @enderror placeholder="Enter customer address"
            required>
          @error('address')
            <div class="invalid-feedback" id="address-error">{{ $message }}</div>
          @enderror
        </div>
        <!-- customer phone -->
        <div class="form-group mt-3">
          <label for="phone">Customer Phone Number</label>
          <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
            type="text" value="{{ old('phone') }}"
            @error('phone') aria-describedby="phone-error" @enderror placeholder="Enter customer phone number"
            required>
          @error('phone')
            <div class="invalid-feedback" id="phone-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="status">Status</label>
          <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
            @error('status') aria-describedby="status-error" @enderror required>
            <option value="active" selected>Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
        <button class="btn btn-primary mt-4" type="submit">Add Customer</button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function() {
        $(this).attr('disabled', true);
        $(this).html('Adding Customer <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush
