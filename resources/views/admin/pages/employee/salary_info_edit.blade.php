@extends('admin.layouts.master')
@section('title', 'Edit Salary Info')

@section('content')
  <div class="card w-32">
    <div class="card-body">
      <h5 class="card-title">Edit Salary Info</h5>
      <form action="{{ route('admin.salary-info.update', $salary_info->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
          <label for="basic_salary">Basic Salary</label>
          <input type="text" class="form-control @error('basic_salary') is-invalid @enderror" value="{{ $salary_info->basic_salary }}" @error('basic_salary') aria-describedby="basic_salary-error" @enderror id="basic_salary" name="basic_salary" placeholder="Enter basic_salary">
          @error('basic_salary')
            <div id="basic_salary-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-group mt-3">
          <label for="special_allowance">Special Allowance (Optional)</label>
          <input type="text" class="form-control @error('special_allowance') is-invalid @enderror" value="{{ $salary_info->special_allowance }}" @error('special_allowance') aria-describedby="special_allowance-error" @enderror id="special_allowance" name="special_allowance" placeholder="Enter special_allowance">
          @error('special_allowance')
            <div id="special_allowance-error" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-4">Update Salary Info</button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function(){
        $(this).attr('disabled', true);
        $(this).html('Updating Salary Info <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush