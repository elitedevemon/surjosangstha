@extends('employee.layouts.master')
@section('title', 'Edit Group')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Group</h5>
      <form action="{{ route('employee.group.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
          <!-- branch name -->
          <label for="branch_id">Branch Name</label>
          <select class="@error('branch_id') is_invalid @enderror form-select" id="branch_id" name="branch_id"
            aria-label="Groups" @error('branch_id') aria-describedby="branch_id-error" @enderror required>
              <option selected value="{{ $group->branch_id }}">{{ $group->branch->branch_name }}</option>
          </select>
          @error('branch_id')
            <div class="invalid-feedback" id="branch_id-error">{{ $message }}</div>
          @enderror
        </div>
        <!-- group code & group name -->
        <div class="row">
          <div class="form-group col-md-6 mt-3">
            <label for="group_code">Group Code</label>
            <input class="form-control @error('group_code') is-invalid @enderror" id="group_code"
              name="group_code" type="text" value="{{ $group->group_code }}"
              @error('group_code') aria-describedby="group_code-error" @enderror placeholder="Enter group code"
              required>
            @error('group_code')
              <div class="invalid-feedback" id="group_code-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6 mt-3">
            <label for="group_name">Group Name</label>
            <input class="form-control @error('group_name') is-invalid @enderror" id="group_name"
              name="group_name" type="text" value="{{ $group->group_name }}"
              @error('group_name') aria-describedby="group_name-error" @enderror placeholder="Enter group name"
              required>
            @error('group_name')
              <div class="invalid-feedback" id="group_name-error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <!-- group address -->
          <div class="form-group col-md-6 mt-3">
            <label for="group_address">Group Address</label>
            <input class="form-control @error('group_address') is-invalid @enderror" id="group_address"
              name="group_address" type="text" value="{{ $group->group_address }}"
              @error('group_address') aria-describedby="group_address-error" @enderror
              placeholder="Enter group name" required>
            @error('group_address')
              <div class="invalid-feedback" id="group_address-error">{{ $message }}</div>
            @enderror
          </div>
          <!-- group by employee -->
          <div class="form-group col-md-6 mt-3">
            <label for="employee_id">Employee Name</label>
            <select class="@error('employee_id') is_invalid @enderror form-select" id="employee_id"
              name="employee_id" aria-label="Groups"
              @error('employee_id') aria-describedby="employee_id-error" @enderror required>
                <option selected value="{{ auth()->user()->employee_id }}">{{ auth()->user()->name }}</option>
            </select>
            @error('employee_id')
              <div class="invalid-feedback" id="employee_id-error">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mt-3">
          <label for="status">Status</label>
          <select class="form-control @error('status') is-invalid @enderror" id="status" name="status"
            @error('status') aria-describedby="status-error" @enderror required>
            <option {{ $group->status === 'active' ? 'selected' : '' }} value="active">Active</option>
            <option {{ $group->status === 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
          </select>
        </div>
        <button class="btn btn-primary mt-4" type="submit">Update Group</button>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('button[type=submit]').click(function() {
        $(this).attr('disabled', true);
        $(this).html('Updating Group <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush

