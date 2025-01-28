@extends('admin.layouts.master')
@section('title', 'Add Branch')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Branch</h5>
      <form action="{{ route('admin.branch.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="branch_name">Branch Name</label>
          <input type="text" class="form-control @error('branch_name') is-invalid @enderror" value="{{ old('branch_name') }}" @error('branch_name') aria-describedby="branch_name-error" @enderror id="branch_name" name="branch_name" placeholder="Enter branch name">
          @error('branch_name')
            <div id="branch_name-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="branch_code">Branch Code</label>
          <input type="text" class="form-control @error('branch_code') is-invalid @enderror" value="{{ old('branch_code') }}" @error('branch_code') aria-describedby="branch_code-error" @enderror id="branch_code" name="branch_code" placeholder="Enter branch code">
          @error('branch_code')
            <div id="branch_code-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="branch_address">Branch Address</label>
          <input type="text" class="form-control @error('branch_address') is-invalid @enderror" value="{{ old('branch_address') }}" @error('branch_address') aria-describedby="branch_address-error" @enderror id="branch_address" name="branch_address" placeholder="Enter branch address">
          @error('branch_address')
            <div id="branch_address-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="status">Status</label>
          <select class="form-control @error('status') is-invalid @enderror" @error('status') aria-describedby="status-error" @enderror id="status" name="status">
            <option value="active" selected>Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Add Branch</button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function(){
        $(this).attr('disabled', true);
        $(this).html('Adding Branch <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush