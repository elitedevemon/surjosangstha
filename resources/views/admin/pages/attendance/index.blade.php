@extends('admin.layouts.master')
@section('title', 'Employee Attendance')

@section('content')
  <!-- Breadcrumb -->
  <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
    <div class="my-auto mb-2">
      <h2 class="mb-1">Attendance Admin</h2>
      <nav>
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item">
            <a href="index.html"><i class="ti ti-smart-home"></i></a>
          </li>
          <li class="breadcrumb-item">
            Employee
          </li>
          <li class="breadcrumb-item active" aria-current="page">Attendance Admin</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- /Breadcrumb -->

  <div class="card border-0">
    <div class="card-body">
      <div class="row align-items-center mb-4">
        <div class="col-md-5">
          <div class="mb-md-0 mb-3">
            <h4 class="mb-1">Attendance Details Today ({{ \Carbon\Carbon::now()->toFormattedDateString() }})
            </h4>
            <p>Data from the {{ $total_employees }} total no of employees</p>
          </div>
        </div>
        <div class="col-md-7">
          <div class="d-flex align-items-center justify-content-md-end">
            <h6>Total Absentees today</h6>
            <div class="avatar-list-stacked avatar-group-sm ms-4">
              <a class="avatar bg-primary avatar-rounded text-fixed-white fs-12" href="javascript:void(0);">
                +1
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="rounded border">
        <div class="row gx-0">
          <div class="col-md col-sm-4 border-end">
            <div class="p-3">
              <span class="fw-medium d-block mb-1">Present</span>
              <div class="d-flex align-items-center justify-content-between">
                <h5>250</h5>
                <span class="badge badge-success d-inline-flex align-items-center">
                  <i class="ti ti-arrow-wave-right-down me-1"></i>
                  +1%
                </span>
              </div>
            </div>
          </div>
          <div class="col-md col-sm-4 border-end">
            <div class="p-3">
              <span class="fw-medium d-block mb-1">Late Login</span>
              <div class="d-flex align-items-center justify-content-between">
                <h5>45</h5>
                <span class="badge badge-danger d-inline-flex align-items-center">
                  <i class="ti ti-arrow-wave-right-down me-1"></i>
                  -1%
                </span>
              </div>
            </div>
          </div>
          <div class="col-md col-sm-4 border-end">
            <div class="p-3">
              <span class="fw-medium d-block mb-1">Uninformed</span>
              <div class="d-flex align-items-center justify-content-between">
                <h5>15</h5>
                <span class="badge badge-danger d-inline-flex align-items-center">
                  <i class="ti ti-arrow-wave-right-down me-1"></i>
                  -12%
                </span>
              </div>
            </div>
          </div>
          <div class="col-md col-sm-4 border-end">
            <div class="p-3">
              <span class="fw-medium d-block mb-1">Permisson</span>
              <div class="d-flex align-items-center justify-content-between">
                <h5>03</h5>
                <span class="badge badge-success d-inline-flex align-items-center">
                  <i class="ti ti-arrow-wave-right-down me-1"></i>
                  +1%
                </span>
              </div>
            </div>
          </div>
          <div class="col-md col-sm-4">
            <div class="p-3">
              <span class="fw-medium d-block mb-1">Absent</span>
              <div class="d-flex align-items-center justify-content-between">
                <h5>12</h5>
                <span class="badge badge-danger d-inline-flex align-items-center">
                  <i class="ti ti-arrow-wave-right-down me-1"></i>
                  -19%
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between row-gap-3 flex-wrap">
      <h5>Admin Attendance</h5>
      <div class="d-flex my-xl-auto right-content align-items-center row-gap-3 flex-wrap">
        <div class="dropdown me-3">
          <a class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown"
            href="javascript:void(0);">
            Select Status
          </a>
          <ul class="dropdown-menu dropdown-menu-end p-3">
            <li>
              <a class="dropdown-item rounded-1" href="javascript:void(0);">Present</a>
            </li>
            <li>
              <a class="dropdown-item rounded-1" href="javascript:void(0);">Absent</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="custom-datatable-filter table-responsive">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th class="no-sort">
                <div class="form-check form-check-md">
                  <input class="form-check-input" id="select-all" type="checkbox">
                </div>
              </th>
              <th>Employee</th>
              <th>Status</th>
              <th>Check In</th>
              <th>Check Out</th>
              <th>Break</th>
              <th>Late</th>
              <th>Production Hours</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($today_attendance as $employee)
              <tr>
                <td>
                  <div class="form-check form-check-md">
                    <input class="form-check-input" type="checkbox">
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center file-name-icon">
                    <a class="avatar avatar-md avatar-rounded border" href="#">
                      <img class="img-fluid" src="{{ asset("storage/".$employee->employee->upload_file->own_photo) }}" alt="img">
                    </a>
                    <div class="ms-2">
                      <h6 class="fw-medium"><a href="#">{{ $employee->name }}</a></h6>
                      {{-- <span class="fs-12 fw-normal">UI/UX Team</span> --}}
                    </div>
                  </div>
                </td>
                @foreach ($employee->attendance as $attendance)
                  <td>
                    <span
                      class="badge badge-{{ $attendance->status === 'present' ? 'success' : 'danger' }}-transparent d-inline-flex align-items-center">
                      <i class="ti ti-point-filled me-1"></i>
                      {{ ucfirst($attendance->status) }}
                    </span>
                  </td>
                  <td>{{ \Carbon\Carbon::parse($attendance->punch_in_time)->format('h:i A') }}</td>
                  <td>
                    {{-- {{ \Carbon\Carbon::parse($attendance->punch_out_time)->format('h:i A') }} --}}
                    {{ $attendance->punch_out_time ? \Carbon\Carbon::parse($attendance->punch_out_time)->format('h:i A') : '' }}
                  </td>
                  <td>00 Min</td>
                  <td>
                    {{ number_format($attendance->late_duration, 2) }} Min
                  </td>
                  <td><span class="badge badge-success d-inline-flex align-items-center {{ $attendance->production_hours ? '' : 'd-none' }}"><i
                        class="ti ti-clock-hour-11 me-1"></i>{{ $attendance->production_hours?:'' }} Hrs</span></td>
                  <td>
                    <div class="action-icon d-inline-flex">
                      <a class="me-2" data-bs-toggle="modal" data-bs-target="#edit_attendance"
                        href="#"><i class="ti ti-edit"></i></a>
                    </div>
                  </td>
                @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Edit Attendance -->
  <div class="modal fade" id="edit_attendance">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Attendance</h4>
          <button class="btn-close custom-btn-close" data-bs-dismiss="modal" type="button"
            aria-label="Close">
            <i class="ti ti-x"></i>
          </button>
        </div>
        <form action="attendance-admin.html">
          <div class="modal-body pb-0">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <div class="input-icon position-relative w-100 me-2">
                    <input class="form-control datetimepicker ps-3" type="text" value="15 Apr 2025">
                    <span class="input-icon-addon">
                      <i class="ti ti-calendar"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Check In</label>
                  <div class="input-icon position-relative w-100">
                    <input class="form-control timepicker ps-3" type="text" value="09:00 AM">
                    <span class="input-icon-addon">
                      <i class="ti ti-clock-hour-3"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Check Out</label>
                  <div class="input-icon position-relative w-100">
                    <input class="form-control timepicker ps-3" type="text" value="06:45 PM">
                    <span class="input-icon-addon">
                      <i class="ti ti-clock-hour-3"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Break</label>
                  <input class="form-control" type="text" value="30 Min	">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Late</label>
                  <input class="form-control" type="text" value="32 Min">
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Production Hours</label>
                  <div class="input-icon position-relative w-100">
                    <input class="form-control timepicker ps-3" type="text" value="8.55 Hrs">
                    <span class="input-icon-addon">
                      <i class="ti ti-clock-hour-3"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select class="select">
                    <option>Select</option>
                    <option selected="">Present</option>
                    <option>Absent</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-light me-2" data-bs-dismiss="modal" type="button">Cancel</button>
            <button class="btn btn-primary" type="submit">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Edit Attendance -->

  <!-- Attendance Report -->
  <div class="modal fade" id="attendance_report">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Attendance</h4>
          <button class="btn-close custom-btn-close" data-bs-dismiss="modal" type="button"
            aria-label="Close">
            <i class="ti ti-x"></i>
          </button>
        </div>
        <div class="modal-body">
          <div class="card bg-transparent-light shadow-none">
            <div class="card-body pb-1">
              <div class="row align-items-center">
                <div class="col-lg-4">
                  <div class="d-flex align-items-center mb-3">
                    <span class="avatar avatar-sm avatar-rounded me-2 flex-shrink-0">
                      <img src="assets/img/profiles/avatar-02.jpg" alt="Img">
                    </span>
                    <div>
                      <h6 class="fw-medium">Anthony Lewis</h6>
                      <span>UI/UX Team</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="text-sm-end mb-3">
                        <span>Date</span>
                        <p class="text-gray-9 fw-medium">15 Apr 2025</p>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="text-sm-end mb-3">
                        <span>Punch in at</span>
                        <p class="text-gray-9 fw-medium">09:00 AM</p>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="text-sm-end mb-3">
                        <span>Punch out at</span>
                        <p class="text-gray-9 fw-medium">06:45 PM</p>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="text-sm-end mb-3">
                        <span>Status</span>
                        <p class="text-gray-9 fw-medium">Present</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-0 border shadow-none">
            <div class="card-body">
              <div class="row">
                <div class="col-xl-3">
                  <div class="mb-4">
                    <p class="d-flex align-items-center mb-1"><i
                        class="ti ti-point-filled text-dark-transparent me-1"></i>Total
                      Working hours</p>
                    <h3>12h 36m</h3>
                  </div>
                </div>
                <div class="col-xl-3">
                  <div class="mb-4">
                    <p class="d-flex align-items-center mb-1"><i
                        class="ti ti-point-filled text-success me-1"></i>Productive Hours
                    </p>
                    <h3>08h 36m</h3>
                  </div>
                </div>
                <div class="col-xl-3">
                  <div class="mb-4">
                    <p class="d-flex align-items-center mb-1"><i
                        class="ti ti-point-filled text-warning me-1"></i>Break hours</p>
                    <h3>22m 15s</h3>
                  </div>
                </div>
                <div class="col-xl-3">
                  <div class="mb-4">
                    <p class="d-flex align-items-center mb-1"><i
                        class="ti ti-point-filled text-info me-1"></i>Overtime</p>
                    <h3>02h 15m</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mx-auto">
                  <div class="progress bg-transparent-dark mb-3" style="height: 24px;">
                    <div class="progress-bar bg-success me-2 rounded" role="progressbar" style="width: 18%;">
                    </div>
                    <div class="progress-bar bg-warning me-2 rounded" role="progressbar" style="width: 5%;">
                    </div>
                    <div class="progress-bar bg-success me-2 rounded" role="progressbar" style="width: 28%;">
                    </div>
                    <div class="progress-bar bg-warning me-2 rounded" role="progressbar" style="width: 17%;">
                    </div>
                    <div class="progress-bar bg-success me-2 rounded" role="progressbar" style="width: 22%;">
                    </div>
                    <div class="progress-bar bg-warning me-2 rounded" role="progressbar" style="width: 5%;">
                    </div>
                    <div class="progress-bar bg-info me-2 rounded" role="progressbar" style="width: 3%;">
                    </div>
                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 2%;"></div>
                  </div>

                </div>
                <div class="co-md-12">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="fs-10">06:00</span>
                    <span class="fs-10">07:00</span>
                    <span class="fs-10">08:00</span>
                    <span class="fs-10">09:00</span>
                    <span class="fs-10">10:00</span>
                    <span class="fs-10">11:00</span>
                    <span class="fs-10">12:00</span>
                    <span class="fs-10">01:00</span>
                    <span class="fs-10">02:00</span>
                    <span class="fs-10">03:00</span>
                    <span class="fs-10">04:00</span>
                    <span class="fs-10">05:00</span>
                    <span class="fs-10">06:00</span>
                    <span class="fs-10">07:00</span>
                    <span class="fs-10">08:00</span>
                    <span class="fs-10">09:00</span>
                    <span class="fs-10">10:00</span>
                    <span class="fs-10">11:00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Attendance Report -->
@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
  <!-- Datatable JS -->
  <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // delete confirmation
      $('#artisanCommand').on('submit', function(e) {
        e.preventDefault();
        $('button[type=submit]').attr('disabled', true);
        const confirmed = confirm("Are you sure want to run this command.?");
        if (confirmed === true) {
          let command = $('#command').val();
          $.ajax({
            type: "post",
            url: "{{ route('admin.command.run.artisan') }}",
            data: {
              command: command,
              _token: "{{ csrf_token() }}"
            },
            success: function(response) {
              toastr.success(response.message);
              $('button[type=submit]').removeAttr('disabled');
            }
          });
        } else {
          $('button[type=submit]').removeAttr('disabled');
        }
      });
    });
  </script>
@endpush

@push('styles')
  <link href="{{ asset('vendor/flasher/toastr.min.css') }}" rel="stylesheet">
  <!-- Datatable CSS -->
  <link href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endpush
