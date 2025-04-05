@extends('admin.layouts.master')
@section('title', 'Employee Attendance')

@section('content')
  <div class="container mt-4">
    <h3 class="mb-4">Attendance Settings</h3>
    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>There were some problems with your input:</strong>
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
      </div>
    @endif
    <form action="{{ route('admin.attendance.settings.update') }}" method="POST">
      @csrf
      @method('PUT')

      <div class="card">
        <div class="card-header bg-primary text-white">General Settings</div>
        <div class="card-body">

          <div class="form-check form-switch mb-3">
            <input class="form-check-input" id="enable_attendance" name="enable_attendance" type="checkbox"
              {{ old('enable_attendance', $settings->enable_attendance) ? 'checked' : '' }}>
            <label class="form-check-label" for="enable_attendance">Enable Attendance System</label>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="office_start">Office Start Time</label>
              <input class="form-control" name="office_start" type="time"
                value="{{ old('office_start', $settings->office_start) }}">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label" for="office_end">Office End Time</label>
              <input class="form-control" name="office_end" type="time"
                value="{{ old('office_end', $settings->office_end) }}">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="punch_in_earliest">Earliest Punch In Time</label>
              <input class="form-control" name="punch_in_earliest" type="time"
                value="{{ old('punch_in_earliest', $settings->punch_in_earliest) }}">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label" for="punch_in_latest">Latest Punch In Time</label>
              <input class="form-control" name="punch_in_latest" type="time"
                value="{{ old('punch_in_latest', $settings->punch_in_latest) }}">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="grace_period">Grace Period (minutes)</label>
            <input class="form-control" name="grace_period" type="number"
              value="{{ old('grace_period', $settings->grace_period) }}">
          </div>

          <div class="mb-3">
            <label class="form-label" for="half_day_after_hours">Half-Day Marking After (Hours)</label>
            <input class="form-control" name="half_day_after_hours" type="number"
              value="{{ old('half_day_after_hours', $settings->half_day_after_hours) }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Auto Mark Attendance</label>
            <select class="form-select" name="auto_attendance">
              <option value="1"
                {{ old('auto_attendance', $settings->auto_attendance) == 1 ? 'selected' : '' }}>Yes</option>
              <option value="0"
                {{ old('auto_attendance', $settings->auto_attendance) == 0 ? 'selected' : '' }}>No</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Working Days</label><br>
            @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="working_days[]" type="checkbox"
                  value="{{ $day }}"
                  {{ in_array($day, old('working_days', $settings->working_days ?? [])) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $day }}</label>
              </div>
            @endforeach
          </div>

          <div class="mb-3">
            <label class="form-label">Weekend Days</label><br>
            @foreach (['Sat', 'Sun'] as $day)
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="weekend_days[]" type="checkbox"
                  value="{{ $day }}"
                  {{ in_array($day, old('weekend_days', $settings->weekend_days ?? [])) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $day }}</label>
              </div>
            @endforeach
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" value="1" id="disable_on_holidays" name="disable_on_holidays" type="checkbox"
              {{ old('disable_on_holidays', $settings->disable_on_holidays) ? 'checked' : '' }}>
            <label class="form-check-label" for="disable_on_holidays">
              Disable attendance on public holidays
            </label>
          </div>

          <div class="text-end">
            <button class="btn btn-success" type="submit">Save Settings</button>
          </div>

        </div>
      </div>
    </form>
  </div>
@endsection
