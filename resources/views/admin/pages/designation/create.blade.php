@extends('admin.layouts.master')
@section('title', 'Add Designation')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Designation</h5>
      <form action="{{ route('admin.designation.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
          <label for="designation">Designation Name</label>
          <input type="text" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation') }}" @error('designation') aria-describedby="designation-error" @enderror id="designation" name="designation" placeholder="Enter designation">
          @error('designation')
            <div id="designation-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="status">Status</label>
          <select class="form-control @error('status') is-invalid @enderror" @error('status') aria-describedby="status-error" @enderror id="status" name="status">
            <option value="active" selected>Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Add Designation</button>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function(){
        $(this).attr('disabled', true);
        $(this).html('Adding Designation <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush