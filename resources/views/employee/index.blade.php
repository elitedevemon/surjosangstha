@extends('employee.layouts.master')
@section('content')
  <div class="alert bg-secondary-transparent alert-dismissible fade show mb-4">
    Your Leave Request on“24th April 2024”has been Approved!!!
    <button class="btn-close fs-14" data-bs-dismiss="alert" type="button" aria-label="Close">
      <i class="ti ti-x"></i></button>
  </div>

  <div class="row">
    <!-- punch in and out -->
    <div class="col-xl-4 d-flex">
      <div class="card flex-fill border-primary attendance-bg">
        <div class="card-body">
          <div class="mb-4 text-center">
            <h6 class="fw-medium text-gray-5 mb-1">Attendance</h6>
            {{-- <h4>08:35 AM, 11 Mar 2025</h4> --}}
            {{-- <h4>{{ \Illuminate\Support\Carbon::now()->format('h:i A, d M Y') }}</h4> --}}
            <h4><span id="current-time"></span> | {{ \Illuminate\Support\Carbon::now()->format('d M Y') }}</h4>
          </div>
          <div class="attendance-circle-progress attendance-progress mx-auto mb-3" data-value='65'>
            <span class="progress-left">
              <span class="progress-bar border-success"></span>
            </span>
            <span class="progress-right">
              <span class="progress-bar border-success"></span>
            </span>
            <div class="total-work-hours w-100 text-center">
              <span class="fs-13 d-block mb-1">Total Hours</span>
              <h6><span id="total-hours">0:00:00</span></h6>
            </div>
          </div>
          <div class="text-center">
            <div class="badge badge-dark badge-md mb-3">Production :
              @if ($attendance)
                <span id="production-hours">{{ $attendance->production_hours }}</span> hrs
              @else
                <span id="production-hours">0.00</span> hrs
              @endif
            </div>
            <h6 class="fw-medium d-flex align-items-center justify-content-center mb-4">
              <i class="ti ti-fingerprint text-primary me-1"></i>
              Punch In at:
              @if ($attendance)
                <span id="punch-in-time">&nbsp;{{ $attendance->created_at->format('h:i:s A') }}</span>
              @else
                <span id="punch-in-time">&nbsp;Not Punched In</span>
              @endif
            </h6>
            {{-- <a class="btn btn-primary w-100" href="#">Punch Out</a> --}}
            <button class="btn btn-success w-100 {{ $attendance ? 'd-none' : '' }}" id="punch-in-btn"
              onmousedown="startPress()" onmouseup="cancelPress()" onmouseleave="cancelPress()"
              ontouchstart="startPress()" ontouchend="cancelPress()" ontouchcancel="cancelPress()">
              Punch In
              <span id="press-animation"></span>
            </button>
            <button class="btn btn-danger {{ $attendance ? '' : 'd-none' }} w-100" id="punch-out-btn">Punch
              Out</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 d-flex" id="task_location_section">
      <div class="card flex-fill border-primary attendance-bg">
        <div class="card-body">
          <h2 class="mb-4">Post Your Current Task & Location</h2>
          <form id="locationForm" method="POST" action="{{ route('employee.location.store') }}">
            @csrf
            <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
            <div class="mb-3">
              <label class="form-label" for="task">Current Task</label>
              <input class="form-control" id="task" name="task" type="text"
                placeholder="e.g., কিস্তি তুলতে, বকেয়া আদায়" required>
            </div>

            <div class="mb-3">
              <label class="form-label" for="location">Your Current Location</label>
              <input class="form-control" id="location" name="location" type="text"
                placeholder="e.g., Kandabari, Mazgram" required>
            </div>

            <!-- Optional: Auto-fetch location -->
            <button class="btn btn-secondary mb-3" type="button" onclick="getLocation()">Auto Detect
              Location</button>

            <div class="mb-3" id="autoLocationInfo"></div>

            <button class="btn btn-primary" id="location_submit_button" type="submit">Post Update</button>
          </form>
        </div>
      </div>
    </div>

    <!-- total working hours -->
    <div class="col-xl-8 d-flex">
      <div class="row flex-fill">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-xl-3">
                  <div class="mb-4">
                    <p class="d-flex align-items-center mb-1"><i
                        class="ti ti-point-filled text-dark-transparent me-1"></i>Total Working hours</p>
                    <h3>12h 36m</h3>
                  </div>
                </div>
                <div class="col-xl-3">
                  <div class="mb-4">
                    <p class="d-flex align-items-center mb-1"><i
                        class="ti ti-point-filled text-success me-1"></i>Productive Hours</p>
                    <h3>08h 36m</h3>
                  </div>
                </div>
                <div class="col-xl-3">
                  <div class="mb-4">
                    <p class="d-flex align-items-center mb-1"><i
                        class="ti ti-point-filled text-warning me-1"></i>Break
                      hours</p>
                    <h3>22m 15s</h3>
                  </div>
                </div>
                <div class="col-xl-3">
                  <div class="mb-4">
                    <p class="d-flex align-items-center mb-1"><i
                        class="ti ti-point-filled text-info me-1"></i>Overtime
                    </p>
                    <h3>02h 15m</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="progress bg-transparent-dark mb-3" style="height: 24px;">
                    <div class="progress-bar rounded bg-white" role="progressbar" style="width: 18%;"></div>
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
                    <div class="progress-bar rounded bg-white" role="progressbar" style="width: 18%;"></div>
                  </div>

                </div>
                <div class="co-md-12">
                  <div class="d-flex align-items-center justify-content-between row-gap-2 flex-wrap">
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
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="border-bottom mb-3 pb-2">
                <span class="avatar avatar-sm bg-primary mb-2"><i class="ti ti-clock-stop"></i></span>
                <h2 class="mb-2">8.36 / <span class="fs-20 text-gray-5"> 9</span></h2>
                <p class="fw-medium text-truncate">Total Hours Today</p>
              </div>
              <div>
                <p class="d-flex align-items-center fs-13">
                  <span class="avatar avatar-xs rounded-circle bg-success me-2 flex-shrink-0">
                    <i class="ti ti-arrow-up fs-12"></i>
                  </span>
                  <span>5% This Week</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="border-bottom mb-3 pb-2">
                <span class="avatar avatar-sm bg-dark mb-2"><i class="ti ti-clock-up"></i></span>
                <h2 class="mb-2">10 / <span class="fs-20 text-gray-5"> 40</span></h2>
                <p class="fw-medium text-truncate">Total Hours Week</p>
              </div>
              <div>
                <p class="d-flex align-items-center fs-13">
                  <span class="avatar avatar-xs rounded-circle bg-success me-2 flex-shrink-0">
                    <i class="ti ti-arrow-up fs-12"></i>
                  </span>
                  <span>7% Last Week</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="border-bottom mb-3 pb-2">
                <span class="avatar avatar-sm bg-info mb-2"><i class="ti ti-calendar-up"></i></span>
                <h2 class="mb-2">75 / <span class="fs-20 text-gray-5"> 98</span></h2>
                <p class="fw-medium text-truncate">Total Hours Month</p>
              </div>
              <div>
                <p class="d-flex align-items-center fs-13 text-truncate">
                  <span class="avatar avatar-xs rounded-circle bg-danger me-2 flex-shrink-0">
                    <i class="ti ti-arrow-down fs-12"></i>
                  </span>
                  <span>8% Last Month</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="border-bottom mb-3 pb-2">
                <span class="avatar avatar-sm bg-pink mb-2"><i class="ti ti-calendar-star"></i></span>
                <h2 class="mb-2">16 / <span class="fs-20 text-gray-5"> 28</span></h2>
                <p class="fw-medium text-truncate">Overtime this Month</p>
              </div>
              <div>
                <p class="d-flex align-items-center fs-13 text-truncate">
                  <span class="avatar avatar-xs rounded-circle bg-danger me-2 flex-shrink-0">
                    <i class="ti ti-arrow-down fs-12"></i>
                  </span>
                  <span>6% Last Month</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="border-bottom mb-3 pb-2">
                <span class="avatar avatar-sm bg-pink mb-2"><i class="ti ti-calendar-star"></i></span>
                <h2 class="mb-2">16 / <span class="fs-20 text-gray-5"> 28</span></h2>
                <p class="fw-medium text-truncate">Duetime this Month</p>
              </div>
              <div>
                <p class="d-flex align-items-center fs-13 text-truncate">
                  <span class="avatar avatar-xs rounded-circle bg-danger me-2 flex-shrink-0">
                    <i class="ti ti-arrow-down fs-12"></i>
                  </span>
                  <span>6% Last Month</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- employee details -->
    <div class="col-xl-4 d-flex">
      <div class="card position-relative flex-fill">
        <div class="card-header bg-dark">
          <div class="d-flex align-items-center">
            <span class="avatar avatar-lg avatar-rounded me-2 flex-shrink-0 border-2 border-white">
              <img src="assets/img/users/user-01.jpg" alt="Img">
            </span>
            <div>
              <h5 class="mb-1 text-white">Stephan Peralt</h5>
              <div class="d-flex align-items-center">
                <p class="fs-12 mb-0 text-white">Senior Product Designer</p>
                <span class="mx-1"><i class="ti ti-point-filled text-primary"></i></span>
                <p class="fs-12">UI/UX Design</p>
              </div>
            </div>
          </div>
          <a class="btn btn-icon btn-sm rounded-circle edit-top text-white" href="#"><i
              class="ti ti-edit"></i></a>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <span class="d-block fs-13 mb-1">Phone Number</span>
            <p class="text-gray-9">+1 324 3453 545</p>
          </div>
          <div class="mb-3">
            <span class="d-block fs-13 mb-1">Email Address</span>
            <p class="text-gray-9"><a class="__cf_email__"
                data-cfemail="4e1d3a2b3e2b3c2a2b7f7c7a0e2b362f233e222b602d2123"
                href="/cdn-cgi/l/email-protection">[email&#160;protected]</a></p>
          </div>
          <div class="mb-3">
            <span class="d-block fs-13 mb-1">Report Office</span>
            <p class="text-gray-9">Doglas Martini</p>
          </div>
          <div>
            <span class="d-block fs-13 mb-1">Joined on</span>
            <p class="text-gray-9">15 Jan 2024</p>
          </div>
        </div>
      </div>
    </div>

    <!-- leave details in graph -->
    <div class="col-xl-5 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between row-gap-2 flex-wrap">
            <h5>Leave Details</h5>
            <div class="dropdown">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>2024
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2024</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2023</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2022</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="mb-3">
                <div class="mb-3">
                  <p class="d-flex align-items-center"><i class="ti ti-circle-filled fs-8 text-dark me-1"></i>
                    <span class="text-gray-9 fw-semibold me-1">1254</span>
                    on time
                  </p>
                </div>
                <div class="mb-3">
                  <p class="d-flex align-items-center"><i
                      class="ti ti-circle-filled fs-8 text-success me-1"></i>
                    <span class="text-gray-9 fw-semibold me-1">32</span>
                    Late Attendance
                  </p>
                </div>
                <div class="mb-3">
                  <p class="d-flex align-items-center"><i
                      class="ti ti-circle-filled fs-8 text-primary me-1"></i>
                    <span class="text-gray-9 fw-semibold me-1">658</span>
                    Work From Home
                  </p>
                </div>
                <div class="mb-3">
                  <p class="d-flex align-items-center"><i
                      class="ti ti-circle-filled fs-8 text-danger me-1"></i>
                    <span class="text-gray-9 fw-semibold me-1">14</span>
                    Absent
                  </p>
                </div>
                <div>
                  <p class="d-flex align-items-center"><i
                      class="ti ti-circle-filled fs-8 text-warning me-1"></i>
                    <span class="text-gray-9 fw-semibold me-1">68</span>
                    Sick Leave
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end mb-3">
                <div id="leaves_chart"></div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-check mt-2">
                <input class="form-check-input" id="todo1" type="checkbox">
                <label class="form-check-label" for="todo1">Better than <span
                    class="text-gray-9">85%</span>
                  of Employees</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- leave details in number -->
    <div class="col-xl-3 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between row-gap-2 flex-wrap">
            <h5>Leave Details</h5>
            <div class="dropdown">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>2024
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2024</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2023</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2022</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-sm-6">
              <div class="mb-4">
                <span class="d-block mb-1">Total Leaves</span>
                <h4>16</h4>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-4">
                <span class="d-block mb-1">Taken</span>
                <h4>10</h4>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-4">
                <span class="d-block mb-1">Absent</span>
                <h4>2</h4>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-4">
                <span class="d-block mb-1">Request</span>
                <h4>0</h4>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-4">
                <span class="d-block mb-1">Worked Days</span>
                <h4>240</h4>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-4">
                <span class="d-block mb-1">Loss of Pay</span>
                <h4>2</h4>
              </div>
            </div>
            <div class="col-sm-12">
              <div>
                <a class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#add_leaves"
                  href="#">Apply New
                  Leave</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-6 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between row-gap-2 flex-wrap">
            <h5>Projects</h5>
            <div class="dropdown">
              <a class="btn btn-white dropdown-toggle btn-sm d-inline-flex align-items-center border border-0"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                Ongoing Projects
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">All Projects</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Ongoing Projects</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="card mb-md-0 mb-4 shadow-none">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6>Office Management</h6>
                    <div class="dropdown">
                      <a class="d-inline-flex align-items-center" data-bs-toggle="dropdown"
                        href="javascript:void(0);">
                        <i class="ti ti-dots-vertical"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end p-3">
                        <li>
                          <a class="dropdown-item rounded-1" data-bs-toggle="modal"
                            data-bs-target="#edit_task" href="javascript:void(0);"><i
                              class="ti ti-edit me-2"></i>Edit</a>
                        </li>
                        <li>
                          <a class="dropdown-item rounded-1" data-bs-toggle="modal"
                            data-bs-target="#delete_modal" href="javascript:void(0);"><i
                              class="ti ti-trash me-2"></i>Delete</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex align-items-center mb-3">
                      <a class="avatar" href="javascript:void(0);">
                        <img class="img-fluid rounded-circle" src="assets/img/users/user-32.jpg"
                          alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-normal"><a href="javascript:void(0);">Anthony Lewis</a></h6>
                        <span class="fs-13 d-block">Project Leader</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                      <a class="avatar bg-soft-primary rounded-circle" href="javascript:void(0);">
                        <i class="ti ti-calendar text-primary fs-16"></i>
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-normal">14 Jan 2024</h6>
                        <span class="fs-13 d-block">Deadline</span>
                      </div>
                    </div>
                    <div
                      class="d-flex align-items-center justify-content-between bg-transparent-light mb-3 rounded border border-dashed p-2">
                      <div class="d-flex align-items-center">
                        <span class="avatar avatar-sm bg-success-transparent rounded-circle me-1"><i
                            class="ti ti-checklist fs-16"></i></span>
                        <p>Tasks : <span class="text-gray-9">6 </span> /10</p>
                      </div>
                      <div class="avatar-list-stacked avatar-group-sm">
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-06.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-07.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-08.jpg"
                            alt="img">
                        </span>
                        <a class="avatar bg-primary avatar-rounded text-fixed-white fs-12 fw-medium"
                          href="javascript:void(0);">
                          +2
                        </a>
                      </div>
                    </div>
                    <div
                      class="bg-soft-secondary d-flex align-items-center justify-content-between rounded p-2">
                      <p class="text-secondary text-truncate mb-0">Time Spent</p>
                      <h5 class="text-secondary text-truncate">65/120 <span class="fs-14 fw-normal">Hrs</span>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card mb-0 shadow-none">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6>Office Management</h6>
                    <div class="dropdown">
                      <a class="d-inline-flex align-items-center" data-bs-toggle="dropdown"
                        href="javascript:void(0);">
                        <i class="ti ti-dots-vertical"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end p-3">
                        <li>
                          <a class="dropdown-item rounded-1" data-bs-toggle="modal"
                            data-bs-target="#edit_task" href="javascript:void(0);"><i
                              class="ti ti-edit me-2"></i>Edit</a>
                        </li>
                        <li>
                          <a class="dropdown-item rounded-1" data-bs-toggle="modal"
                            data-bs-target="#delete_modal" href="javascript:void(0);"><i
                              class="ti ti-trash me-2"></i>Delete</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex align-items-center mb-3">
                      <a class="avatar" href="javascript:void(0);">
                        <img class="img-fluid rounded-circle" src="assets/img/users/user-33.jpg"
                          alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-normal"><a href="javascript:void(0);">Anthony Lewis</a></h6>
                        <span class="fs-13 d-block">Project Leader</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                      <a class="avatar bg-soft-primary rounded-circle" href="javascript:void(0);">
                        <i class="ti ti-calendar text-primary fs-16"></i>
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-normal">14 Jan 2024</h6>
                        <span class="fs-13 d-block">Deadline</span>
                      </div>
                    </div>
                    <div
                      class="d-flex align-items-center justify-content-between bg-transparent-light mb-3 rounded border border-dashed p-2">
                      <div class="d-flex align-items-center">
                        <span class="avatar avatar-sm bg-success-transparent rounded-circle me-1"><i
                            class="ti ti-checklist fs-16"></i></span>
                        <p>Tasks : <span class="text-gray-9">6 </span> /10</p>
                      </div>
                      <div class="avatar-list-stacked avatar-group-sm">
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-06.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-07.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-08.jpg"
                            alt="img">
                        </span>
                        <a class="avatar bg-primary avatar-rounded text-fixed-white fs-12 fw-medium"
                          href="javascript:void(0);">
                          +2
                        </a>
                      </div>
                    </div>
                    <div
                      class="bg-soft-secondary d-flex align-items-center justify-content-between rounded p-2">
                      <p class="text-secondary text-truncate mb-0">Time Spent</p>
                      <h5 class="text-secondary text-truncate">65/120 <span class="fs-14 fw-normal">Hrs</span>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between row-gap-2 flex-wrap">
            <h5>Tasks</h5>
            <div class="dropdown">
              <a class="btn btn-white dropdown-toggle btn-sm d-inline-flex align-items-center border border-0"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                All Projects
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">All Projects</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Ongoing Projects</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            <div class="list-group-item mb-3 rounded border p-2">
              <div class="row align-items-center row-gap-3">
                <div class="col-md-8">
                  <div class="todo-inbox-check d-flex align-items-center">
                    <span><i class="ti ti-grid-dots me-2"></i></span>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                    </div>
                    <span class="d-flex align-items-center rating-select me-2"><i
                        class="ti ti-star-filled filled"></i></span>
                    <div class="strike-info">
                      <h4 class="fs-14 text-truncate">Patient appointment booking</h4>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex align-items-center justify-content-md-end row-gap-3 flex-wrap">
                    <span class="badge bg-soft-pink d-inline-flex align-items-center me-2"><i
                        class="fas fa-circle fs-6 me-1"></i>Onhold</span>
                    <div class="d-flex align-items-center">
                      <div class="avatar-list-stacked avatar-group-sm">
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-13.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-14.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-15.jpg"
                            alt="img">
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="list-group-item mb-3 rounded border p-2">
              <div class="row align-items-center row-gap-3">
                <div class="col-md-8">
                  <div class="todo-inbox-check d-flex align-items-center">
                    <span><i class="ti ti-grid-dots me-2"></i></span>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                    </div>
                    <span class="rating-select d-flex align-items-center me-2"><i
                        class="ti ti-star"></i></span>
                    <div class="strike-info">
                      <h4 class="fs-14 text-truncate">Appointment booking with payment</h4>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex align-items-center justify-content-md-end row-gap-3 flex-wrap">
                    <span class="badge bg-transparent-purple d-flex align-items-center me-2"><i
                        class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                    <div class="d-flex align-items-center">
                      <div class="avatar-list-stacked avatar-group-sm">
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-20.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-21.jpg"
                            alt="img">
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="list-group-item mb-3 rounded border p-2">
              <div class="row align-items-center row-gap-3">
                <div class="col-md-8">
                  <div class="todo-inbox-check d-flex align-items-center">
                    <span><i class="ti ti-grid-dots me-2"></i></span>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                    </div>
                    <span class="rating-select d-flex align-items-center me-2"><i
                        class="ti ti-star"></i></span>
                    <div class="strike-info">
                      <h4 class="fs-14 text-truncate">Patient and Doctor video conferencing</h4>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex align-items-center justify-content-md-end row-gap-3 flex-wrap">
                    <span class="badge badge-soft-success align-items-center me-2"><i
                        class="fas fa-circle fs-6 me-1"></i>Completed</span>
                    <div class="d-flex align-items-center">
                      <div class="avatar-list-stacked avatar-group-sm">
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-28.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-29.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-24.jpg"
                            alt="img">
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="list-group-item mb-3 rounded border p-2">
              <div class="row align-items-center row-gap-3">
                <div class="col-md-8">
                  <div class="todo-inbox-check d-flex align-items-center todo-strike-content">
                    <span><i class="ti ti-grid-dots me-2"></i></span>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" checked="">
                    </div>
                    <span class="rating-select d-flex align-items-center me-2"><i
                        class="ti ti-star"></i></span>
                    <div class="strike-info">
                      <h4 class="fs-14 text-truncate">Private chat module</h4>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex align-items-center justify-content-md-end row-gap-3 flex-wrap">
                    <span class="badge badge-secondary-transparent d-flex align-items-center me-2"><i
                        class="fas fa-circle fs-6 me-1"></i>Pending</span>
                    <div class="d-flex align-items-center">
                      <div class="avatar-list-stacked avatar-group-sm">
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-23.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-24.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-25.jpg"
                            alt="img">
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="list-group-item rounded border p-2">
              <div class="row align-items-center row-gap-3">
                <div class="col-md-8">
                  <div class="todo-inbox-check d-flex align-items-center">
                    <span><i class="ti ti-grid-dots me-2"></i></span>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                    </div>
                    <span class="rating-select d-flex align-items-center me-2"><i
                        class="ti ti-star"></i></span>
                    <div class="strike-info">
                      <h4 class="fs-14 text-truncate">Go-Live and Post-Implementation Support</h4>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex align-items-center justify-content-md-end row-gap-3 flex-wrap">
                    <span class="badge bg-transparent-purple d-flex align-items-center me-2"><i
                        class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                    <div class="d-flex align-items-center">
                      <div class="avatar-list-stacked avatar-group-sm">
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-28.jpg"
                            alt="img">
                        </span>
                        <span class="avatar avatar-rounded">
                          <img class="border border-white" src="assets/img/profiles/avatar-29.jpg"
                            alt="img">
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-5 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between row-gap-2 flex-wrap">
            <h5>Performance</h5>
            <div class="dropdown">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>2024
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2024</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2023</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2022</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div>
            <div class="bg-light d-flex align-items-center rounded p-2">
              <h3 class="me-2">98%</h3>
              <span class="badge badge-outline-success bg-success-transparent rounded-pill me-1">12%</span>
              <span>vs last years</span>
            </div>
            <div id="performance_chart2"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between row-gap-2 flex-wrap">
            <h5>My Skills</h5>
            <div class="dropdown">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>2024
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2024</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2023</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">2022</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div>
            <div class="bg-transparent-light mb-2 rounded border border-dashed p-2">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <span class="d-block border-primary rounded-5 me-2 h-12 border border-2"></span>
                  <div>
                    <h6 class="fw-medium mb-1">Figma</h6>
                    <p>Updated : 15 May 2025</p>
                  </div>
                </div>
                <div class="circle-progress circle-progress-md" data-value='95'>
                  <span class="progress-left">
                    <span class="progress-bar border-primary"></span>
                  </span>
                  <span class="progress-right">
                    <span class="progress-bar border-primary"></span>
                  </span>
                  <div class="progress-value">95%</div>
                </div>
              </div>
            </div>
            <div class="bg-transparent-light mb-2 rounded border border-dashed p-2">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <span class="d-block border-success rounded-5 me-2 h-12 border border-2"></span>
                  <div>
                    <h6 class="fw-medium mb-1">HTML</h6>
                    <p>Updated : 12 May 2025</p>
                  </div>
                </div>
                <div class="circle-progress circle-progress-md" data-value='85'>
                  <span class="progress-left">
                    <span class="progress-bar border-success"></span>
                  </span>
                  <span class="progress-right">
                    <span class="progress-bar border-success"></span>
                  </span>
                  <div class="progress-value">85%</div>
                </div>
              </div>
            </div>
            <div class="bg-transparent-light mb-2 rounded border border-dashed p-2">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <span class="d-block border-purple rounded-5 me-2 h-12 border border-2"></span>
                  <div>
                    <h6 class="fw-medium mb-1">CSS</h6>
                    <p>Updated : 12 May 2025</p>
                  </div>
                </div>
                <div class="circle-progress circle-progress-md" data-value='70'>
                  <span class="progress-left">
                    <span class="progress-bar border-purple"></span>
                  </span>
                  <span class="progress-right">
                    <span class="progress-bar border-purple"></span>
                  </span>
                  <div class="progress-value">70%</div>
                </div>
              </div>
            </div>
            <div class="bg-transparent-light mb-2 rounded border border-dashed p-2">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <span class="d-block border-info rounded-5 me-2 h-12 border border-2"></span>
                  <div>
                    <h6 class="fw-medium mb-1">Wordpress</h6>
                    <p>Updated : 15 May 2025</p>
                  </div>
                </div>
                <div class="circle-progress circle-progress-md" data-value='61'>
                  <span class="progress-left">
                    <span class="progress-bar border-info"></span>
                  </span>
                  <span class="progress-right">
                    <span class="progress-bar border-info"></span>
                  </span>
                  <div class="progress-value">61%</div>
                </div>
              </div>
            </div>
            <div class="bg-transparent-light rounded border border-dashed p-2">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <span class="d-block border-dark rounded-5 me-2 h-12 border border-2"></span>
                  <div>
                    <h6 class="fw-medium mb-1">Javascript</h6>
                    <p>Updated : 13 May 2025</p>
                  </div>
                </div>
                <div class="circle-progress circle-progress-md" data-value='58'>
                  <span class="progress-left">
                    <span class="progress-bar border-dark"></span>
                  </span>
                  <span class="progress-right">
                    <span class="progress-bar border-dark"></span>
                  </span>
                  <div class="progress-value">58%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 d-flex">
      <div class="flex-fill">
        <div class="card card-bg-5 bg-dark mb-3">
          <div class="card-body">
            <div class="text-center">
              <h5 class="mb-4 text-white">Team Birthday</h5>
              <span class="avatar avatar-xl avatar-rounded mb-2">
                <img src="assets/img/users/user-35.jpg" alt="Img">
              </span>
              <div class="mb-3">
                <h6 class="fw-medium mb-1 text-white">Andrew Jermia</h6>
                <p>IOS Developer</p>
              </div>
              <a class="btn btn-sm btn-primary" href="#">Send Wishes</a>
            </div>
          </div>
        </div>
        <div class="card bg-secondary mb-3">
          <div class="card-body d-flex align-items-center justify-content-between p-3">
            <div>
              <h5 class="mb-1 text-white">Leave Policy</h5>
              <p class="text-white">Last Updated : Today</p>
            </div>
            <a class="btn btn-white btn-sm px-3" href="#">View All</a>
          </div>
        </div>
        <div class="card bg-warning">
          <div class="card-body d-flex align-items-center justify-content-between p-3">
            <div>
              <h5 class="mb-1">Next Holiday</h5>
              <p class="text-gray-9">Diwali, 15 Sep 2025</p>
            </div>
            <a class="btn btn-white btn-sm px-3" href="holidays.html">View All</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-4 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h5>Team Members</h5>
            <div>
              <a class="btn btn-light btn-sm" href="#">View All</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
              <a class="avatar flex-shrink-0" href="javascript:void(0);">
                <img class="rounded-circle border border-2" src="assets/img/users/user-27.jpg"
                  alt="img">
              </a>
              <div class="ms-2">
                <h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Alexander Jermai</a></h6>
                <p class="fs-13">UI/UX Designer</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-phone fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-mail-bolt fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm" href="#"><i
                  class="ti ti-brand-hipchat fs-16"></i></a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
              <a class="avatar flex-shrink-0" href="javascript:void(0);">
                <img class="rounded-circle border border-2" src="assets/img/users/user-42.jpg"
                  alt="img">
              </a>
              <div class="ms-2">
                <h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Doglas Martini</a></h6>
                <p class="fs-13">Product Designer</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-phone fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-mail-bolt fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm" href="#"><i
                  class="ti ti-brand-hipchat fs-16"></i></a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
              <a class="avatar flex-shrink-0" href="javascript:void(0);">
                <img class="rounded-circle border border-2" src="assets/img/users/user-43.jpg"
                  alt="img">
              </a>
              <div class="ms-2">
                <h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Daniel Esbella</a></h6>
                <p class="fs-13">Project Manager</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-phone fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-mail-bolt fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm" href="#"><i
                  class="ti ti-brand-hipchat fs-16"></i></a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
              <a class="avatar flex-shrink-0" href="javascript:void(0);">
                <img class="rounded-circle border border-2" src="assets/img/users/user-11.jpg"
                  alt="img">
              </a>
              <div class="ms-2">
                <h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Daniel Esbella</a></h6>
                <p class="fs-13">Team Lead</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-phone fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-mail-bolt fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm" href="#"><i
                  class="ti ti-brand-hipchat fs-16"></i></a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
              <a class="avatar flex-shrink-0" href="javascript:void(0);">
                <img class="rounded-circle border border-2" src="assets/img/users/user-44.jpg"
                  alt="img">
              </a>
              <div class="ms-2">
                <h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Stephan Peralt</a></h6>
                <p class="fs-13">Team Lead</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-phone fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-mail-bolt fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm" href="#"><i
                  class="ti ti-brand-hipchat fs-16"></i></a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
              <a class="avatar flex-shrink-0" href="javascript:void(0);">
                <img class="rounded-circle border border-2" src="assets/img/users/user-54.jpg"
                  alt="img">
              </a>
              <div class="ms-2">
                <h6 class="fs-14 fw-medium text-truncate mb-1"><a href="#">Andrew Jermia</a></h6>
                <p class="fs-13">Project Lead</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-phone fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm me-2" href="#"><i
                  class="ti ti-mail-bolt fs-16"></i></a>
              <a class="btn btn-light btn-icon btn-sm" href="#"><i
                  class="ti ti-brand-hipchat fs-16"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between flex-wrap">
            <h5>Notifications</h5>
            <div>
              <a class="btn btn-light btn-sm" href="#">View All</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-start mb-4">
            <a class="avatar flex-shrink-0" href="javascript:void(0);">
              <img class="rounded-circle border border-2" src="assets/img/users/user-27.jpg" alt="img">
            </a>
            <div class="ms-2">
              <h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
              <p class="fs-13 mb-2">Today at 9:42 AM</p>
              <div class="d-flex align-items-center">
                <a class="avatar avatar-sm me-2 flex-shrink-0 border" href="#"><img
                    class="h-auto w-auto" src="assets/img/social/pdf-icon.svg" alt="Img"></a>
                <h6 class="fw-normal"><a href="#">EY_review.pdf</a></h6>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-start mb-4">
            <a class="avatar flex-shrink-0" href="javascript:void(0);">
              <img class="rounded-circle border border-2" src="assets/img/users/user-28.jpg" alt="img">
            </a>
            <div class="ms-2">
              <h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
              <p class="fs-13 mb-0">Today at 10:00 AM</p>
            </div>
          </div>
          <div class="d-flex align-items-start mb-4">
            <a class="avatar flex-shrink-0" href="javascript:void(0);">
              <img class="rounded-circle border border-2" src="assets/img/users/user-29.jpg" alt="img">
            </a>
            <div class="ms-2">
              <h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
              <p class="fs-13 mb-2">Today at 10:50 AM</p>
              <div class="d-flex align-items-center">
                <a class="btn btn-primary btn-sm me-2" href="#">Approve</a>
                <a class="btn btn-outline-primary btn-sm" href="#">Decline</a>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-start mb-4">
            <a class="avatar flex-shrink-0" href="javascript:void(0);">
              <img class="rounded-circle border border-2" src="assets/img/users/user-30.jpg" alt="img">
            </a>
            <div class="ms-2">
              <h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
              <p class="fs-13 mb-0">Today at 12:00 PM</p>
            </div>
          </div>
          <div class="d-flex align-items-start">
            <a class="avatar flex-shrink-0" href="javascript:void(0);">
              <img class="rounded-circle border border-2" src="assets/img/users/user-33.jpg" alt="img">
            </a>
            <div class="ms-2">
              <h6 class="fs-14 fw-medium text-truncate mb-1">Lex Murphy requested access to UNIX </h6>
              <p class="fs-13 mb-0">Today at 05:00 PM</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between row-gap-2 flex-wrap">
            <h5>Meetings Schedule</h5>
            <div class="dropdown">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>Today
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Today</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Month</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Year</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body schedule-timeline">
          <div class="d-flex align-items-start">
            <div class="d-flex align-items-center active-time">
              <span>09:25 AM</span>
              <span><i class="ti ti-point-filled text-primary fs-20"></i></span>
            </div>
            <div class="flex-fill timeline-flow pb-4 ps-3">
              <div class="bg-light rounded p-2">
                <p class="fw-medium text-gray-9 mb-1">Marketing Strategy Presentation</p>
                <span>Marketing</span>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-start">
            <div class="d-flex align-items-center active-time">
              <span>09:20 AM</span>
              <span><i class="ti ti-point-filled text-secondary fs-20"></i></span>
            </div>
            <div class="flex-fill timeline-flow pb-4 ps-3">
              <div class="bg-light rounded p-2">
                <p class="fw-medium text-gray-9 mb-1">Design Review Hospital, doctors Management Project</p>
                <span>Review</span>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-start">
            <div class="d-flex align-items-center active-time">
              <span>09:18 AM</span>
              <span><i class="ti ti-point-filled text-warning fs-20"></i></span>
            </div>
            <div class="flex-fill timeline-flow pb-4 ps-3">
              <div class="bg-light rounded p-2">
                <p class="fw-medium text-gray-9 mb-1">Birthday Celebration of Employee</p>
                <span>Celebration</span>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-start">
            <div class="d-flex align-items-center active-time">
              <span>09:10 AM</span>
              <span><i class="ti ti-point-filled text-success fs-20"></i></span>
            </div>
            <div class="flex-fill timeline-flow ps-3">
              <div class="bg-light rounded p-2">
                <p class="fw-medium text-gray-9 mb-1">Update of Project Flow</p>
                <span>Development</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Leaves -->
  <div class="modal fade" id="add_leaves">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Leave</h4>
          <button class="btn-close custom-btn-close" data-bs-dismiss="modal" type="button"
            aria-label="Close">
            <i class="ti ti-x"></i>
          </button>
        </div>
        <form action="employee-dashboard.html">
          <div class="modal-body pb-0">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Employee Name</label>
                  <select class="select">
                    <option>Select</option>
                    <option>Anthony Lewis</option>
                    <option>Brian Villalobos</option>
                    <option>Harvey Smith</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Leave Type</label>
                  <select class="select">
                    <option>Select</option>
                    <option>Medical Leave</option>
                    <option>Casual Leave</option>
                    <option>Annual Leave</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">From </label>
                  <div class="input-icon-end position-relative">
                    <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy">
                    <span class="input-icon-addon">
                      <i class="ti ti-calendar text-gray-7"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">To </label>
                  <div class="input-icon-end position-relative">
                    <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy">
                    <span class="input-icon-addon">
                      <i class="ti ti-calendar text-gray-7"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">No of Days</label>
                  <input class="form-control" type="text">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Remaining Days</label>
                  <input class="form-control" type="text">
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Reason</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-light me-2" data-bs-dismiss="modal" type="button">Cancel</button>
            <button class="btn btn-primary" type="submit">Add Leaves</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Add Leaves -->

  <!-- Edit Task -->
  <div class="modal fade" id="edit_task">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Task </h4>
          <button class="btn-close custom-btn-close" data-bs-dismiss="modal" type="button"
            aria-label="Close">
            <i class="ti ti-x"></i>
          </button>
        </div>
        <form action="employee-dashboard.html">
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Todo Title</label>
                  <input class="form-control" type="text" value="Patient appointment booking">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Due Date</label>
                  <div class="input-icon-end position-relative">
                    <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy">
                    <span class="input-icon-addon">
                      <i class="ti ti-calendar text-gray-7"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Project</label>
                  <select class="select">
                    <option>Select</option>
                    <option selected="">Office Management</option>
                    <option>Clinic Management </option>
                    <option>Educational Platform</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label me-2">Team Members</label>
                  <input class="input-tags form-control" name="Label" data-role="tagsinput"
                    type="text" value="Jerald,Andrew,Philip,Davis" placeholder="Add new">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Tag</label>
                  <select class="select">
                    <option>Select</option>
                    <option>Internal</option>
                    <option selected="">Projects</option>
                    <option>Meetings</option>
                    <option>Reminder</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select class="select">
                    <option>Select</option>
                    <option selected="">Inprogress</option>
                    <option>Completed</option>
                    <option>Pending</option>
                    <option>Onhold</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Priority</label>
                  <select class="select">
                    <option>Select</option>
                    <option selected="">Medium</option>
                    <option>High</option>
                    <option>Low</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <label class="form-label">Who Can See this Task?</label>
                <div class="d-flex align-items-center">
                  <div class="form-check me-3">
                    <input class="form-check-input" id="flexRadioDefault4" name="flexRadioDefault"
                      type="radio">
                    <label class="form-check-label text-dark" for="flexRadioDefault4">
                      Public
                    </label>
                  </div>
                  <div class="form-check me-3">
                    <input class="form-check-input" id="flexRadioDefault5" name="flexRadioDefault"
                      type="radio" checked="">
                    <label class="form-check-label text-dark" for="flexRadioDefault5">
                      Private
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" id="flexRadioDefault6" name="flexRadioDefault"
                      type="radio">
                    <label class="form-check-label text-dark" for="flexRadioDefault6">
                      Admin Only
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="mb-3">
                  <label class="form-label">Descriptions</label>
                  <div class="summernote"></div>
                </div>
              </div>
              <div class="col-md-12">
                <label class="form-label">Upload Attachment</label>
                <div class="bg-light rounded p-2">
                  <div class="profile-uploader border-bottom mb-2 pb-2">
                    <div class="drag-upload-btn btn btn-sm btn-white border px-3">
                      Select File
                      <input class="form-control image-sign" type="file" multiple="">
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                    <div class="d-flex align-items-center">
                      <h6 class="fs-12 fw-medium me-1">Logo.zip</h6>
                      <span class="badge badge-soft-info">21MB </span>
                    </div>
                    <a class="btn btn-sm btn-icon" href="#"><i class="ti ti-trash"></i></a>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                      <h6 class="fs-12 fw-medium me-1">Files.zip</h6>
                      <span class="badge badge-soft-info">25MB </span>
                    </div>
                    <a class="btn btn-sm btn-icon" href="#"><i class="ti ti-trash"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-light me-2" data-bs-dismiss="modal" type="button">Cancel</button>
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Edit Task -->

  <!-- Delete Modal -->
  <div class="modal fade" id="delete_modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
            <i class="ti ti-trash-x fs-36"></i>
          </span>
          <h4 class="mb-1">Confirm Delete</h4>
          <p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
          <div class="d-flex justify-content-center">
            <a class="btn btn-light me-3" data-bs-dismiss="modal" href="javascript:void(0);">Cancel</a>
            <a class="btn btn-danger" href="employee-dashboard.html">Yes, Delete</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Delete Modal -->
@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
  <script>
    let punchInTime = null;
    let timerInterval = null;
    let pressTimer = null;
    let pressedFor3Sec = false;

    // Function to update time dynamically
    function updateTime() {
      let now = new Date();
      document.getElementById("current-time").innerText = now.toLocaleTimeString();
    }

    setInterval(updateTime, 1000);
    updateTime();

    // Start timer when button is held
    function startPress() {
      const btn = document.getElementById("punch-in-btn");
      btn.classList.add("holding");

      pressTimer = setTimeout(() => {
        pressedFor3Sec = true;
        punchIn();
      }, 3000);
    }

    // Cancel timer if button is released early
    function cancelPress() {
      const btn = document.getElementById("punch-in-btn");
      btn.classList.remove("holding");
      clearTimeout(pressTimer);
      pressedFor3Sec = false;
    }

    // Punch In Function
    function punchIn() {
      if (!pressedFor3Sec) return;

      $.ajax({
        url: "{{ route('employee.attendance.punch-in') }}",
        type: "POST",
        data: {
          _token: "{{ csrf_token() }}"
        },
        success: function(response) {
          punchInTime = new Date(response.punch_in_time);
          localStorage.setItem("punchInTime", punchInTime); // Save to localStorage

          document.getElementById("punch-in-time").innerText = punchInTime.toLocaleTimeString();
          document.getElementById("punch-in-btn").classList.add('d-none');
          document.getElementById("punch-out-btn").classList.remove('d-none');
          startWorkTimer();

          // $('#task_location_section').removeClass('d-none');

          // Show success toastr
          toastr.success("Successfully punched in at " + punchInTime.toLocaleTimeString(), "Success");
        },
        error: function(response) {
          if (response.status === 409) {
            // Already punched in
            toastr.warning(response.responseJSON.message || "You have already punched in today.",
              "Warning");
          } else {
            // Other errors
            toastr.error("Something went wrong. Please try again.", "Error");
          }
        }
      });
    }

    document.addEventListener("DOMContentLoaded", function() {
      const storedTime = localStorage.getItem("punchInTime");
      if (storedTime) {
        punchInTime = new Date(storedTime);
        document.getElementById("punch-in-btn").classList.add('d-none');
        document.getElementById("punch-out-btn").classList.remove('d-none');
        startWorkTimer();
      }
    });

    // Punch Out Function
    function punchOut() {
      $.ajax({
        url: "{{ route('employee.attendance.punch-out') }}",
        type: "POST",
        data: {
          _token: "{{ csrf_token() }}"
        },
        success: function(response) {
          clearInterval(timerInterval); // Stop the timer
          localStorage.removeItem("punchInTime"); // Clear punchInTime from localStorage
          document.getElementById("total-hours").innerText = response.total_hours;
          document.getElementById("production-hours").innerText = response.production_hours;
          document.getElementById("punch-in-btn").classList.remove('d-none');
          document.getElementById("punch-out-btn").classList.add('d-none');
          // Show success toastr
          toastr.success("Successfully punched out at " + new Date().toLocaleTimeString(), "Success");
        },
        error: function() {
          toastr.error("Failed to punch out. Please try again.", "Error");
        }
      });
    }

    // Timer Function for Live Work Hours Calculation
    function startWorkTimer() {
      if (!punchInTime) {
        const storedTime = localStorage.getItem("punchInTime");
        if (storedTime) {
          punchInTime = new Date(storedTime);
        } else {
          return;
        }
      }

      timerInterval = setInterval(() => {
        let now = new Date();
        let diff = new Date(now - punchInTime);
        let hours = diff.getUTCHours();
        let minutes = diff.getUTCMinutes();
        let seconds = diff.getUTCSeconds();
        document.getElementById("total-hours").innerText = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
      }, 1000);
    }

    function pad(num) {
      return num.toString().padStart(2, '0');
    }

    document.getElementById("punch-out-btn").addEventListener("click", punchOut);
  </script>

  <!-- Employee location -->

  <script>
    function getLocation() {
      if (navigator.geolocation) {
        $('#autoLocationInfo').html('<div class="alert alert-info">Detecting location...</div>');
        navigator.geolocation.getCurrentPosition(function(position) {
          const coords = position.coords.latitude + "," + position.coords.longitude;
          document.getElementById("location").value = coords;
          $('#autoLocationInfo').html('<div class="alert alert-success">Auto location detected: ' + coords +
            '</div>');
        }, function(error) {
          $('#autoLocationInfo').html('<div class="alert alert-danger">Failed to detect location.</div>');
        });
      } else {
        $('#autoLocationInfo').html(
          '<div class="alert alert-warning">Geolocation is not supported by this browser.</div>');
      }
    }

    $("document").ready(function() {
      $("#locationForm").on('submit', function(e) {
        e.preventDefault();
        $('#location_submit_button').attr('disabled', true).html(
            '<i class="ti ti-loader ti-pulse"></i> Saving...'),
          $.ajax({
            url: "{{ route('employee.location.store') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
              $('#responseMessage').html('<div class="alert alert-success">' + response.message +
                '</div>');
              $('#locationForm')[0].reset();
              $('#location_submit_button').attr('disabled', false).html('Post Update');
              toastr.success(response.message, "Success");
            },
            error: function(xhr) {
              let errors = xhr.responseJSON.errors;
              let errorHtml = '<div class="alert alert-danger"><ul>';
              $.each(errors, function(key, value) {
                errorHtml += '<li>' + value + '</li>';
              });
              errorHtml += '</ul></div>';
              $('#responseMessage').html(errorHtml);
              $('#location_submit_button').attr('disabled', false).html('Post Update');
            }
          });
      })
    })
  </script>
@endpush

@push('styles')
  <link href="{{ asset('vendor/flasher/toastr.min.css') }}" rel="stylesheet">
  <style>
    #punch-in-btn {
      position: relative;
      overflow: hidden;
    }

    #press-animation {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 100%;
      background-color: #267a658e;
      width: 0%;
      transition: width 0s;
    }

    #punch-in-btn.holding #press-animation {
      width: 100%;
      transition: width 3s linear;
    }
  </style>
@endpush
