@extends('admin.layouts.master')
@section('title', 'Edit Branch')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Branch</h5>
      <form action="{{ route('admin.branch.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
          <label for="branch_name">Branch Name</label>
          <input type="text" class="form-control @error('branch_name') is-invalid @enderror" value="{{ $branch->branch_name }}" @error('branch_name') aria-describedby="branch_name-error" @enderror id="branch_name" name="branch_name" placeholder="Enter branch name">
          @error('branch_name')
            <div id="branch_name-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="branch_code">Branch Code</label>
          <input type="text" class="form-control @error('branch_code') is-invalid @enderror" value="{{ $branch->branch_code }}" @error('branch_code') aria-describedby="branch_code-error" @enderror id="branch_code" name="branch_code" placeholder="Enter branch code">
          @error('branch_code')
            <div id="branch_code-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="branch_address">Branch Address</label>
          <input type="text" class="form-control @error('branch_address') is-invalid @enderror" value="{{ $branch->branch_address }}" @error('branch_address') aria-describedby="branch_address-error" @enderror id="branch_address" name="branch_address" placeholder="Enter branch address">
          @error('branch_address')
            <div id="branch_address-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="status">Status</label>
          <select class="form-control @error('status') is-invalid @enderror" @error('status') aria-describedby="status-error" @enderror id="status" name="status">
            <option {{ $branch->status == 'active' ? 'selected' : '' }} value="1">Active</option>
            <option {{ $branch->status != 'active' ? '' : 'selected' }} value="0">Inactive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Update Branch</button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function(){
        $(this).attr('disabled', true);
        $(this).html('Updating Branch <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush