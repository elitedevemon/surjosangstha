@extends('admin.layouts.master')
@section('title', 'Edit Designation')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Designation</h5>
      <form action="{{ route('admin.designation.update', $designation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
          <label for="designation">Designation</label>
          <input type="text" class="form-control @error('designation') is-invalid @enderror" value="{{ $designation->designation }}" @error('designation') aria-describedby="designation-error" @enderror id="designation" name="designation" placeholder="Enter designation">
          @error('designation')
            <div id="designation-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="status">Status</label>
          <select class="form-control @error('status') is-invalid @enderror" @error('status') aria-describedby="status-error" @enderror id="status" name="status">
            <option {{ $designation->status == 'active' ? 'selected' : '' }} value="active">Active</option>
            <option {{ $designation->status == 'active' ? '' : 'selected' }} value="inactive">Inactive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Update Designation</button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function(){
        $(this).attr('disabled', true);
        $(this).html('Updating Designation <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush