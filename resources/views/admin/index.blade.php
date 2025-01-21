@extends('admin.layouts.master')
@section('content')
  <!-- Breadcrumb -->
  <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
    <div class="my-auto mb-2">
      <h2 class="mb-1">Admin Dashboard</h2>
      <nav>
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}"><i class="ti ti-smart-home"></i></a>
          </li>
          <li class="breadcrumb-item">
            Dashboard
          </li>
        </ol>
      </nav>
    </div>
    {{-- <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
      <div class="mb-2 me-2">
        <div class="dropdown">
          <a class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown"
            href="javascript:void(0);">
            <i class="ti ti-file-export me-1"></i>Export
          </a>
          <ul class="dropdown-menu dropdown-menu-end p-3">
            <li>
              <a class="dropdown-item rounded-1" href="javascript:void(0);"><i
                  class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
            </li>
            <li>
              <a class="dropdown-item rounded-1" href="javascript:void(0);"><i
                  class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="mb-2">
        <div class="input-icon w-120 position-relative">
          <span class="input-icon-addon">
            <i class="ti ti-calendar text-gray-9"></i>
          </span>
          <input class="form-control yearpicker" type="text" value="2025">
        </div>
      </div>
    </div> --}}
  </div>
  <!-- /Breadcrumb -->

  <!-- Welcome Wrap -->
  <div class="card border-0">
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap pb-1">
      <div class="d-flex align-items-center mb-3">
        <span class="avatar avatar-xl flex-shrink-0">
          <img class="rounded-circle" src="{{ asset('assets/img/logo/logo.png') }}" alt="img">
        </span>
        <div class="ms-3">
          <h3 class="mb-2">Welcome Back, Admin <a class="edit-icon" href="javascript:void(0);"><i
                class="ti ti-edit fs-14"></i></a></h3>
          <p>You have <span class="text-primary text-decoration-underline">21</span> Pending Approvals &
            <span class="text-primary text-decoration-underline">14</span> Leave Requests
          </p>
        </div>
      </div>
      <div class="d-flex align-items-center mb-1 flex-wrap">
        <a class="btn btn-secondary btn-md mb-2 me-2" data-bs-toggle="modal" data-bs-target="#add_project"
          href="#"><i class="ti ti-square-rounded-plus me-1"></i>Add Employee</a>
        <a class="btn btn-primary btn-md mb-2" data-bs-toggle="modal" data-bs-target="#add_leaves"
          href="#"><i class="ti ti-square-rounded-plus me-1"></i>Add Task</a>
      </div>
    </div>
  </div>
  <!-- /Welcome Wrap -->

  <div class="row">

    <!-- Widget Info -->
    <div class="col-xxl-8 d-flex">
      <div class="row flex-fill">
        <div class="col-md-3 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <span class="avatar rounded-circle bg-primary mb-2">
                <i class="ti ti-calendar-share fs-16"></i>
              </span>
              <h6 class="fs-13 fw-medium text-default mb-1">Attendance Overview</h6>
              <h3 class="mb-3">120/154 <span class="fs-12 fw-medium text-success"><i
                    class="fa-solid fa-caret-up me-1"></i>+2.1%</span></h3>
              <a class="link-default" href="attendance-employee.html">View Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <span class="avatar rounded-circle bg-secondary mb-2">
                <i class="ti ti-browser fs-16"></i>
              </span>
              <h6 class="fs-13 fw-medium text-default mb-1">Total No of Groups</h6>
              <h3 class="mb-3">90/125 <span class="fs-12 fw-medium text-danger"><i
                    class="fa-solid fa-caret-down me-1"></i>-2.1%</span></h3>
              <a class="link-default" href="projects.html">View All</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <span class="avatar rounded-circle bg-info mb-2">
                <i class="ti ti-users-group fs-16"></i>
              </span>
              <h6 class="fs-13 fw-medium text-default mb-1">Total No of Employees</h6>
              <h3 class="mb-3">69/86 <span class="fs-12 fw-medium text-danger"><i
                    class="fa-solid fa-caret-down me-1"></i>-11.2%</span></h3>
              <a class="link-default" href="clients.html">View All</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="card flex-fill">
            <div class="card-body">
              <span class="avatar rounded-circle bg-pink mb-2">
                <i class="ti ti-checklist fs-16"></i>
              </span>
              <h6 class="fs-13 fw-medium text-default mb-1">Total No of Tasks</h6>
              <h3 class="mb-3">225/28 <span class="fs-12 fw-medium text-success"><i
                    class="fa-solid fa-caret-down me-1"></i>+11.2%</span></h3>
              <a class="link-default" href="tasks.html">View All</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Widget Info -->

    <!-- Clock-In/Out -->
    <div class="col-xxl-4 col-xl-6 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Clock-In/Out</h5>
          <div class="d-flex align-items-center">
            <div class="dropdown mb-2">
              <a class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center fs-13 me-2 border-0"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                All Departments
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Finance</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Development</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Marketing</a>
                </li>
              </ul>
            </div>
            <div class="dropdown mb-2">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>Today
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Month</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Week</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Today</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div>
            <div class="d-flex align-items-center justify-content-between br-5 mb-3 border border-dashed p-2">
              <div class="d-flex align-items-center">
                <a class="avatar flex-shrink-0" href="javascript:void(0);">
                  <img class="rounded-circle border border-2"
                    src="{{ asset('assets/img/profiles/avatar-24.jpg') }}" alt="img">
                </a>
                <div class="ms-2">
                  <h6 class="fs-14 fw-medium text-truncate">Daniel Esbella</h6>
                  <p class="fs-13">UI/UX Designer</p>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <a class="link-default me-2" href="javascript:void(0);"><i class="ti ti-clock-share"></i></a>
                <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
                    class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between br-5 mb-3 border p-2">
              <div class="d-flex align-items-center">
                <a class="avatar flex-shrink-0" href="javascript:void(0);">
                  <img class="rounded-circle border border-2"
                    src="{{ asset('assets/img/profiles/avatar-23.jpg') }}" alt="img">
                </a>
                <div class="ms-2">
                  <h6 class="fs-14 fw-medium">Doglas Martini</h6>
                  <p class="fs-13">Project Manager</p>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <a class="link-default me-2" href="javascript:void(0);"><i class="ti ti-clock-share"></i></a>
                <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
                    class="ti ti-circle-filled fs-5 me-1"></i>09:36</span>
              </div>
            </div>
            <div class="br-5 mb-3 border p-2">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <a class="avatar flex-shrink-0" href="javascript:void(0);">
                    <img class="rounded-circle border border-2"
                      src="{{ asset('assets/img/profiles/avatar-27.jpg') }}" alt="img">
                  </a>
                  <div class="ms-2">
                    <h6 class="fs-14 fw-medium text-truncate">Brian Villalobos</h6>
                    <p class="fs-13">PHP Developer</p>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <a class="link-default me-2" href="javascript:void(0);"><i
                      class="ti ti-clock-share"></i></a>
                  <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
                      class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
                </div>
              </div>
              <div
                class="d-flex align-items-center justify-content-between br-5 mt-2 flex-wrap border p-2 pb-0">
                <div>
                  <p class="d-inline-flex align-items-center mb-1"><i
                      class="ti ti-circle-filled text-success fs-5 me-1"></i>Clock In</p>
                  <h6 class="fs-13 fw-normal mb-2">10:30 AM</h6>
                </div>
                <div>
                  <p class="d-inline-flex align-items-center mb-1"><i
                      class="ti ti-circle-filled text-danger fs-5 me-1"></i>Clock Out</p>
                  <h6 class="fs-13 fw-normal mb-2">09:45 AM</h6>
                </div>
                <div>
                  <p class="d-inline-flex align-items-center mb-1"><i
                      class="ti ti-circle-filled text-warning fs-5 me-1"></i>Production</p>
                  <h6 class="fs-13 fw-normal mb-2">09:21 Hrs</h6>
                </div>
              </div>
            </div>
          </div>
          <h6 class="mb-2">Late</h6>
          <div class="d-flex align-items-center justify-content-between br-5 mb-3 border border-dashed p-2">
            <div class="d-flex align-items-center">
              <span class="avatar flex-shrink-0">
                <img class="rounded-circle border border-2"
                  src="{{ asset('assets/img/profiles/avatar-29.jpg') }}" alt="img">
              </span>
              <div class="ms-2">
                <h6 class="fs-14 fw-medium text-truncate">Anthony Lewis <span
                    class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
                      class="ti ti-clock-hour-11 me-1"></i>30 Min</span></h6>
                <p class="fs-13">Marketing Head</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <a class="link-default me-2" href="javascript:void(0);"><i class="ti ti-clock-share"></i></a>
              <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger"><i
                  class="ti ti-circle-filled fs-5 me-1"></i>08:35</span>
            </div>
          </div>
          <a class="btn btn-light btn-md w-100" href="attendance-report.html">View All Attendance</a>
        </div>
      </div>
    </div>
    <!-- /Clock-In/Out -->

    <!-- Punch-In/Out -->
    <div class="col-xxl-4 col-xl-6 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Punch-In/Out</h5>
          <div class="d-flex align-items-center">
            <div class="dropdown mb-2">
              <a class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center fs-13 me-2 border-0"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                All Departments
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Finance</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Development</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Marketing</a>
                </li>
              </ul>
            </div>
            <div class="dropdown mb-2">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>Today
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Month</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Week</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Today</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div>
            <div class="d-flex align-items-center justify-content-between br-5 mb-3 border border-dashed p-2">
              <div class="d-flex align-items-center">
                <a class="avatar flex-shrink-0" href="javascript:void(0);">
                  <img class="rounded-circle border border-2"
                    src="{{ asset('assets/img/profiles/avatar-24.jpg') }}" alt="img">
                </a>
                <div class="ms-2">
                  <h6 class="fs-14 fw-medium text-truncate">Daniel Esbella</h6>
                  <p class="fs-13">UI/UX Designer</p>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <a class="link-default me-2" href="javascript:void(0);"><i class="ti ti-clock-share"></i></a>
                <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
                    class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between br-5 mb-3 border p-2">
              <div class="d-flex align-items-center">
                <a class="avatar flex-shrink-0" href="javascript:void(0);">
                  <img class="rounded-circle border border-2"
                    src="{{ asset('assets/img/profiles/avatar-23.jpg') }}" alt="img">
                </a>
                <div class="ms-2">
                  <h6 class="fs-14 fw-medium">Doglas Martini</h6>
                  <p class="fs-13">Project Manager</p>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <a class="link-default me-2" href="javascript:void(0);"><i class="ti ti-clock-share"></i></a>
                <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
                    class="ti ti-circle-filled fs-5 me-1"></i>09:36</span>
              </div>
            </div>
            <div class="br-5 mb-3 border p-2">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <a class="avatar flex-shrink-0" href="javascript:void(0);">
                    <img class="rounded-circle border border-2"
                      src="{{ asset('assets/img/profiles/avatar-27.jpg') }}" alt="img">
                  </a>
                  <div class="ms-2">
                    <h6 class="fs-14 fw-medium text-truncate">Brian Villalobos</h6>
                    <p class="fs-13">PHP Developer</p>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <a class="link-default me-2" href="javascript:void(0);"><i
                      class="ti ti-clock-share"></i></a>
                  <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
                      class="ti ti-circle-filled fs-5 me-1"></i>09:15</span>
                </div>
              </div>
              <div
                class="d-flex align-items-center justify-content-between br-5 mt-2 flex-wrap border p-2 pb-0">
                <div>
                  <p class="d-inline-flex align-items-center mb-1"><i
                      class="ti ti-circle-filled text-success fs-5 me-1"></i>Clock In</p>
                  <h6 class="fs-13 fw-normal mb-2">10:30 AM</h6>
                </div>
                <div>
                  <p class="d-inline-flex align-items-center mb-1"><i
                      class="ti ti-circle-filled text-danger fs-5 me-1"></i>Clock Out</p>
                  <h6 class="fs-13 fw-normal mb-2">09:45 AM</h6>
                </div>
                <div>
                  <p class="d-inline-flex align-items-center mb-1"><i
                      class="ti ti-circle-filled text-warning fs-5 me-1"></i>Production</p>
                  <h6 class="fs-13 fw-normal mb-2">09:21 Hrs</h6>
                </div>
              </div>
            </div>
          </div>
          <h6 class="mb-2">Late</h6>
          <div class="d-flex align-items-center justify-content-between br-5 mb-3 border border-dashed p-2">
            <div class="d-flex align-items-center">
              <span class="avatar flex-shrink-0">
                <img class="rounded-circle border border-2"
                  src="{{ asset('assets/img/profiles/avatar-29.jpg') }}" alt="img">
              </span>
              <div class="ms-2">
                <h6 class="fs-14 fw-medium text-truncate">Anthony Lewis <span
                    class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success"><i
                      class="ti ti-clock-hour-11 me-1"></i>30 Min</span></h6>
                <p class="fs-13">Marketing Head</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <a class="link-default me-2" href="javascript:void(0);"><i class="ti ti-clock-share"></i></a>
              <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger"><i
                  class="ti ti-circle-filled fs-5 me-1"></i>08:35</span>
            </div>
          </div>
          <a class="btn btn-light btn-md w-100" href="attendance-report.html">View All Attendance</a>
        </div>
      </div>
    </div>
    <!-- /Punch-In/Out -->

  </div>

  <div class="row">

    <!-- Tasks -->
    <div class="col-xxl-4 col-xl-6 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Tasks</h5>
          <div class="d-flex align-items-center">
            <div class="dropdown mb-2 me-2">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>Today
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Month</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Week</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Today</a>
                </li>
              </ul>
            </div>
            <a class="btn btn-primary btn-icon btn-xs rounded-circle d-flex align-items-center justify-content-center mb-2 p-0"
              data-bs-toggle="modal" data-bs-target="#add_todo" href="#"><i
                class="ti ti-plus fs-16"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center todo-item br-5 mb-2 border p-2">
            <i class="ti ti-grid-dots me-2"></i>
            <div class="form-check">
              <input class="form-check-input" id="todo1" type="checkbox">
              <label class="form-check-label fw-medium" for="todo1">Add Holidays</label>
            </div>
          </div>
          <div class="d-flex align-items-center todo-item br-5 mb-2 border p-2">
            <i class="ti ti-grid-dots me-2"></i>
            <div class="form-check">
              <input class="form-check-input" id="todo2" type="checkbox">
              <label class="form-check-label fw-medium" for="todo2">Add Meeting to Client</label>
            </div>
          </div>
          <div class="d-flex align-items-center todo-item br-5 mb-2 border p-2">
            <i class="ti ti-grid-dots me-2"></i>
            <div class="form-check">
              <input class="form-check-input" id="todo3" type="checkbox">
              <label class="form-check-label fw-medium" for="todo3">Chat with Adrian</label>
            </div>
          </div>
          <div class="d-flex align-items-center todo-item br-5 mb-2 border p-2">
            <i class="ti ti-grid-dots me-2"></i>
            <div class="form-check">
              <input class="form-check-input" id="todo4" type="checkbox">
              <label class="form-check-label fw-medium" for="todo4">Management Call</label>
            </div>
          </div>
          <div class="d-flex align-items-center todo-item br-5 mb-2 border p-2">
            <i class="ti ti-grid-dots me-2"></i>
            <div class="form-check">
              <input class="form-check-input" id="todo5" type="checkbox">
              <label class="form-check-label fw-medium" for="todo5">Add Payroll</label>
            </div>
          </div>
          <div class="d-flex align-items-center todo-item br-5 mb-0 border p-2">
            <i class="ti ti-grid-dots me-2"></i>
            <div class="form-check">
              <input class="form-check-input" id="todo6" type="checkbox">
              <label class="form-check-label fw-medium" for="todo6">Add Policy for Increment </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Todo -->

    <!-- Employees Tasks (here add a column name tasks which show the uncompleted task number) -->
    <div class="col-xxl-4 col-xl-6 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Employees Tasks</h5>
          <a class="btn btn-light btn-md mb-2" href="employees.html">View All</a>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table-nowrap mb-0 table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Department</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="javascript:void(0);">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-32.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="javascript:void(0);">Anthony Lewis</a></h6>
                        <span class="fs-12">Finance</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-secondary-transparent badge-xs">
                      Finance
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="#">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-09.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="#">Brian Villalobos</a></h6>
                        <span class="fs-12">PHP Developer</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-danger-transparent badge-xs">Development</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="#">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-01.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="#">Stephan Peralt</a></h6>
                        <span class="fs-12">Executive</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-info-transparent badge-xs">Marketing</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="javascript:void(0);">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-34.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="javascript:void(0);">Doglas Martini</a></h6>
                        <span class="fs-12">Project Manager</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-purple-transparent badge-xs">Manager</span>
                  </td>
                </tr>
                <tr>
                  <td class="border-0">
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="javascript:void(0);">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-37.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="javascript:void(0);">Anthony Lewis</a></h6>
                        <span class="fs-12">UI/UX Designer</span>
                      </div>
                    </div>
                  </td>
                  <td class="border-0">
                    <span class="badge badge-pink-transparent badge-xs">UI/UX Design</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /Employees -->

  </div>

  <div class="row">

    <!-- Tasks Statistics -->
    <div class="col-xxl-4 col-xl-5 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Tasks Statistics</h5>
          <div class="d-flex align-items-center">
            <div class="dropdown mb-2">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>This Week
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Month</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Week</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Today</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chartjs-wrapper-demo position-relative mb-4">
            <canvas id="mySemiDonutChart" height="190"></canvas>
            <div class="position-absolute attendance-canvas text-center">
              <p class="fs-13 mb-1">Total Tasks</p>
              <h3>124/165</h3>
            </div>
          </div>
          <div class="d-flex align-items-center flex-wrap">
            <div class="border-end mb-3 me-2 pe-2 text-center">
              <p class="fs-13 d-inline-flex align-items-center mb-1"><i
                  class="ti ti-circle-filled fs-10 text-warning me-1"></i>Ongoing</p>
              <h5>24%</h5>
            </div>
            <div class="border-end mb-3 me-2 pe-2 text-center">
              <p class="fs-13 d-inline-flex align-items-center mb-1"><i
                  class="ti ti-circle-filled fs-10 text-info me-1"></i>On Hold </p>
              <h5>10%</h5>
            </div>
            <div class="border-end mb-3 me-2 pe-2 text-center">
              <p class="fs-13 d-inline-flex align-items-center mb-1"><i
                  class="ti ti-circle-filled fs-10 text-danger me-1"></i>Overdue</p>
              <h5>16%</h5>
            </div>
            <div class="mb-3 me-2 pe-2 text-center">
              <p class="fs-13 d-inline-flex align-items-center mb-1"><i
                  class="ti ti-circle-filled fs-10 text-success me-1"></i>Ongoing</p>
              <h5>40%</h5>
            </div>
          </div>
          <div class="bg-dark br-5 d-flex align-items-center justify-content-between p-3 pb-0">
            <div class="mb-2">
              <h4 class="text-success">389/689 hrs</h4>
              <p class="fs-13 mb-0">Spent on Overall Tasks This Week</p>
            </div>
            <a class="btn btn-sm btn-light mb-2 text-nowrap" href="tasks.html">View All</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /Tasks Statistics -->

    <!-- Target Overview (monthly given target and completed target in percentage) -->
    <div class="col-xl-7 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Target Overview</h5>
          <div class="d-flex align-items-center">
            <div class="dropdown mb-2">
              <a class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center fs-13 me-2 border-0"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                All Departments
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">UI/UX Designer</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">HR Manager</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Junior Tester</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body pb-0">
          <div class="d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center mb-1">
              <p class="fs-13 text-gray-9 mb-0 me-3"><i
                  class="ti ti-square-filled text-primary me-2"></i>Income</p>
              <p class="fs-13 text-gray-9 mb-0"><i class="ti ti-square-filled text-gray-2 me-2"></i>Expenses
              </p>
            </div>
            <p class="fs-13 mb-1">Last Updated at 11:30PM</p>
          </div>
          <div id="sales-income"></div>
        </div>
      </div>
    </div>
    <!-- /Target Overview -->
  </div>

  <div class="row">

    <!-- Employees By Department -->
    <div class="col-xxl-4 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Employees By Branch</h5>
          <div class="dropdown mb-2">
            <a class="btn btn-white btn-sm d-inline-flex align-items-center border" data-bs-toggle="dropdown"
              href="javascript:void(0);">
              <i class="ti ti-calendar me-1"></i>This Week
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-3">
              <li>
                <a class="dropdown-item rounded-1" href="javascript:void(0);">This Month</a>
              </li>
              <li>
                <a class="dropdown-item rounded-1" href="javascript:void(0);">This Week</a>
              </li>
              <li>
                <a class="dropdown-item rounded-1" href="javascript:void(0);">Last Week</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <div id="emp-department"></div>
          <p class="fs-13"><i class="ti ti-circle-filled fs-8 text-primary me-2"></i>No of
            Employees increased by <span class="text-success fw-bold">+20%</span> from last Year
          </p>
        </div>
      </div>
    </div>
    <!-- /Employees By Department -->

    <!-- Total Employee -->
    <div class="col-xxl-4 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Employee Status By Target</h5>
          <div class="dropdown mb-2">
            <a class="btn btn-white btn-sm d-inline-flex align-items-center border" data-bs-toggle="dropdown"
              href="javascript:void(0);">
              <i class="ti ti-calendar me-1"></i>January
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-3">
              <li>
                <a class="dropdown-item rounded-1" href="javascript:void(0);">January</a>
              </li>
              <li>
                <a class="dropdown-item rounded-1" href="javascript:void(0);">February</a>
              </li>
              <li>
                <a class="dropdown-item rounded-1" href="javascript:void(0);">March</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-1">
            <p class="fs-13 mb-3">Total Employee</p>
            <h3 class="mb-3">154</h3>
          </div>
          <div class="progress-stacked emp-stack mb-3">
            <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="15"
              aria-valuemin="0" aria-valuemax="100" style="width: 40%">
              <div class="progress-bar bg-warning"></div>
            </div>
            <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="30"
              aria-valuemin="0" aria-valuemax="100" style="width: 20%">
              <div class="progress-bar bg-secondary"></div>
            </div>
            <div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="20"
              aria-valuemin="0" aria-valuemax="100" style="width: 10%">
              <div class="progress-bar bg-danger"></div>
            </div>
            <div class="progress" role="progressbar" aria-label="Segment four" aria-valuenow="20"
              aria-valuemin="0" aria-valuemax="100" style="width: 30%">
              <div class="progress-bar bg-pink"></div>
            </div>
          </div>
          <div class="mb-3 border">
            <div class="row gx-0">
              <div class="col-6">
                <div class="flex-fill border-end border-bottom p-2">
                  <p class="fs-13 mb-2"><i class="ti ti-square-filled text-primary fs-12 me-2"></i>Fulltime
                    <span class="text-gray-9">(48%)</span>
                  </p>
                  <h2 class="display-1">112</h2>
                </div>
              </div>
              <div class="col-6">
                <div class="flex-fill border-bottom p-2 text-end">
                  <p class="fs-13 mb-2"><i class="ti ti-square-filled text-secondary fs-12 me-2"></i>Contract
                    <span class="text-gray-9">(20%)</span>
                  </p>
                  <h2 class="display-1">112</h2>
                </div>
              </div>
              <div class="col-6">
                <div class="flex-fill border-end p-2">
                  <p class="fs-13 mb-2"><i class="ti ti-square-filled text-danger fs-12 me-2"></i>Probation
                    <span class="text-gray-9">(22%)</span>
                  </p>
                  <h2 class="display-1">12</h2>
                </div>
              </div>
              <div class="col-6">
                <div class="flex-fill p-2 text-end">
                  <p class="fs-13 mb-2"><i class="ti ti-square-filled text-pink fs-12 me-2"></i>WFH <span
                      class="text-gray-9">(20%)</span></p>
                  <h2 class="display-1">04</h2>
                </div>
              </div>
            </div>
          </div>
          <h6 class="mb-2">Top Performer</h6>
          <div
            class="d-flex align-items-center justify-content-between border-primary bg-primary-100 br-5 mb-4 border p-2">
            <div class="d-flex align-items-center overflow-hidden">
              <span class="me-2">
                <i class="ti ti-award-filled text-primary fs-24"></i>
              </span>
              <a class="avatar avatar-md me-2" href="employee-details.html">
                <img class="rounded-circle border border-white"
                  src="{{ asset('assets/img/profiles/avatar-24.jpg') }}" alt="img">
              </a>
              <div>
                <h6 class="text-truncate fs-14 fw-medium mb-1"><a href="employee-details.html">Daniel
                    Esbella</a></h6>
                <p class="fs-13">IOS Developer</p>
              </div>
            </div>
            <div class="text-end">
              <p class="fs-13 mb-1">Performance</p>
              <h5 class="text-primary">99%</h5>
            </div>
          </div>
          <a class="btn btn-light btn-md w-100" href="employees.html">View All Employees</a>
        </div>
      </div>
    </div>
    <!-- /Total Employee -->

  </div>

  <div class="row">

    <!-- Salary overview (PIN, Name, Basic, TADA, Action can be only edited) -->
    <div class="col-xxl-8 col-xl-7 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Salary Overview</h5>
          <div class="d-flex align-items-center">
            <div class="dropdown mb-2">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>This Week
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Month</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Week</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Today</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table-nowrap mb-0 table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Team</th>
                  <th>Hours</th>
                  <th>Deadline</th>
                  <th>Priority</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a class="link-default" href="project-details.html">PRO-001</a></td>
                  <td>
                    <h6 class="fw-medium"><a href="project-details.html">Office Management App</a></h6>
                  </td>
                  <td>
                    <div class="avatar-list-stacked avatar-group-sm">
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-03.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-05.jpg') }}" alt="img">
                      </span>
                    </div>
                  </td>
                  <td>
                    <p class="mb-1">15/255 Hrs</p>
                    <div class="progress progress-xs w-100" role="progressbar" aria-valuenow="40"
                      aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-primary" style="width: 40%"></div>
                    </div>
                  </td>
                  <td>12 Sep 2024</td>
                  <td>
                    <span class="badge badge-danger d-inline-flex align-items-center badge-xs">
                      <i class="ti ti-point-filled me-1"></i>High
                    </span>
                  </td>
                </tr>
                <tr>
                  <td><a class="link-default" href="project-details.html">PRO-002</a></td>
                  <td>
                    <h6 class="fw-medium"><a href="project-details.html">Clinic Management </a></h6>
                  </td>
                  <td>
                    <div class="avatar-list-stacked avatar-group-sm">
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-06.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-07.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-08.jpg') }}" alt="img">
                      </span>
                      <a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium"
                        href="javascript:void(0);">
                        +1
                      </a>
                    </div>
                  </td>
                  <td>
                    <p class="mb-1">15/255 Hrs</p>
                    <div class="progress progress-xs w-100" role="progressbar" aria-valuenow="40"
                      aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-primary" style="width: 40%"></div>
                    </div>
                  </td>
                  <td>24 Oct 2024</td>
                  <td>
                    <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                      <i class="ti ti-point-filled me-1"></i>Low
                    </span>
                  </td>
                </tr>
                <tr>
                  <td><a class="link-default" href="project-details.html">PRO-003</a></td>
                  <td>
                    <h6 class="fw-medium"><a href="project-details.html">Educational Platform</a></h6>
                  </td>
                  <td>
                    <div class="avatar-list-stacked avatar-group-sm">
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-06.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-08.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-09.jpg') }}" alt="img">
                      </span>
                    </div>
                  </td>
                  <td>
                    <p class="mb-1">40/255 Hrs</p>
                    <div class="progress progress-xs w-100" role="progressbar" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-primary" style="width: 50%"></div>
                    </div>
                  </td>
                  <td>18 Feb 2024</td>
                  <td>
                    <span class="badge badge-pink d-inline-flex align-items-center badge-xs">
                      <i class="ti ti-point-filled me-1"></i>Medium
                    </span>
                  </td>
                </tr>
                <tr>
                  <td><a class="link-default" href="project-details.html">PRO-004</a></td>
                  <td>
                    <h6 class="fw-medium"><a href="project-details.html">Chat & Call Mobile App</a></h6>
                  </td>
                  <td>
                    <div class="avatar-list-stacked avatar-group-sm">
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-11.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-12.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-13.jpg') }}" alt="img">
                      </span>
                    </div>
                  </td>
                  <td>
                    <p class="mb-1">35/155 Hrs</p>
                    <div class="progress progress-xs w-100" role="progressbar" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-primary" style="width: 50%"></div>
                    </div>
                  </td>
                  <td>19 Feb 2024</td>
                  <td>
                    <span class="badge badge-danger d-inline-flex align-items-center badge-xs">
                      <i class="ti ti-point-filled me-1"></i>High
                    </span>
                  </td>
                </tr>
                <tr>
                  <td><a class="link-default" href="project-details.html">PRO-005</a></td>
                  <td>
                    <h6 class="fw-medium"><a href="project-details.html">Travel Planning Website</a>
                    </h6>
                  </td>
                  <td>
                    <div class="avatar-list-stacked avatar-group-sm">
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-17.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-18.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-19.jpg') }}" alt="img">
                      </span>
                    </div>
                  </td>
                  <td>
                    <p class="mb-1">50/235 Hrs</p>
                    <div class="progress progress-xs w-100" role="progressbar" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-primary" style="width: 50%"></div>
                    </div>
                  </td>
                  <td>18 Feb 2024</td>
                  <td>
                    <span class="badge badge-pink d-inline-flex align-items-center badge-xs">
                      <i class="ti ti-point-filled me-1"></i>Medium
                    </span>
                  </td>
                </tr>
                <tr>
                  <td><a class="link-default" href="project-details.html">PRO-006</a></td>
                  <td>
                    <h6 class="fw-medium"><a href="project-details.html">Service Booking Software</a>
                    </h6>
                  </td>
                  <td>
                    <div class="avatar-list-stacked avatar-group-sm">
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-06.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-08.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-09.jpg') }}" alt="img">
                      </span>
                    </div>
                  </td>
                  <td>
                    <p class="mb-1">40/255 Hrs</p>
                    <div class="progress progress-xs w-100" role="progressbar" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-primary" style="width: 50%"></div>
                    </div>
                  </td>
                  <td>20 Feb 2024</td>
                  <td>
                    <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                      <i class="ti ti-point-filled me-1"></i>Low
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="border-0"><a class="link-default" href="project-details.html">PRO-008</a>
                  </td>
                  <td class="border-0">
                    <h6 class="fw-medium"><a href="project-details.html">Travel Planning Website</a>
                    </h6>
                  </td>
                  <td class="border-0">
                    <div class="avatar-list-stacked avatar-group-sm">
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-15.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-16.jpg') }}" alt="img">
                      </span>
                      <span class="avatar avatar-rounded">
                        <img class="border border-white"
                          src="{{ asset('assets/img/profiles/avatar-17.jpg') }}" alt="img">
                      </span>
                      <a class="avatar bg-primary avatar-rounded text-fixed-white fs-10 fw-medium"
                        href="javascript:void(0);">
                        +2
                      </a>
                    </div>
                  </td>
                  <td class="border-0">
                    <p class="mb-1">15/255 Hrs</p>
                    <div class="progress progress-xs w-100" role="progressbar" aria-valuenow="45"
                      aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-primary" style="width: 45%"></div>
                    </div>
                  </td>
                  <td class="border-0">17 Oct 2024</td>
                  <td class="border-0">
                    <span class="badge badge-pink d-inline-flex align-items-center badge-xs">
                      <i class="ti ti-point-filled me-1"></i>Medium
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /Projects -->

    <!-- Invoices -->
    <div class="col-xl-5 d-flex">
      <div class="card flex-fill">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-2">
          <h5 class="mb-2">Salary Invoices</h5>
          <div class="d-flex align-items-center">
            <div class="dropdown mb-2">
              <a class="dropdown-toggle btn btn-white btn-sm d-inline-flex align-items-center fs-13 me-2 border-0"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                Invoices
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Invoices</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Paid</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Unpaid</a>
                </li>
              </ul>
            </div>
            <div class="dropdown mb-2">
              <a class="btn btn-white btn-sm d-inline-flex align-items-center border"
                data-bs-toggle="dropdown" href="javascript:void(0);">
                <i class="ti ti-calendar me-1"></i>This Week
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-3">
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Month</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">This Week</a>
                </li>
                <li>
                  <a class="dropdown-item rounded-1" href="javascript:void(0);">Today</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body pt-2">
          <div class="table-responsive pt-1">
            <table class="table-nowrap table-borderless mb-0 table">
              <tbody>
                <tr>
                  <td class="px-0">
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="invoice-details.html">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-39.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="invoice-details.html">Redesign Website</a></h6>
                        <span class="fs-13 d-inline-flex align-items-center">#INVOO2<i
                            class="ti ti-circle-filled fs-4 text-primary mx-1"></i>Logistics</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="fs-13 mb-1">Payment</p>
                    <h6 class="fw-medium">$3560</h6>
                  </td>
                  <td class="px-0 text-end">
                    <span class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i
                        class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="invoice-details.html">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-40.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="invoice-details.html">Module Completion</a></h6>
                        <span class="fs-13 d-inline-flex align-items-center">#INVOO5<i
                            class="ti ti-circle-filled fs-4 text-primary mx-1"></i>Yip Corp</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="fs-13 mb-1">Payment</p>
                    <h6 class="fw-medium">$4175</h6>
                  </td>
                  <td class="px-0 text-end">
                    <span class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i
                        class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="invoice-details.html">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-55.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="invoice-details.html">Change on Emp Module</a></h6>
                        <span class="fs-13 d-inline-flex align-items-center">#INVOO3<i
                            class="ti ti-circle-filled fs-4 text-primary mx-1"></i>Ignis LLP</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="fs-13 mb-1">Payment</p>
                    <h6 class="fw-medium">$6985</h6>
                  </td>
                  <td class="px-0 text-end">
                    <span class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i
                        class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="invoice-details.html">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-42.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="invoice-details.html">Changes on the Board</a></h6>
                        <span class="fs-13 d-inline-flex align-items-center">#INVOO2<i
                            class="ti ti-circle-filled fs-4 text-primary mx-1"></i>Ignis LLP</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="fs-13 mb-1">Payment</p>
                    <h6 class="fw-medium">$1457</h6>
                  </td>
                  <td class="px-0 text-end">
                    <span class="badge badge-danger-transparent badge-xs d-inline-flex align-items-center"><i
                        class="ti ti-circle-filled fs-5 me-1"></i>Unpaid</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-0">
                    <div class="d-flex align-items-center">
                      <a class="avatar" href="invoice-details.html">
                        <img class="img-fluid rounded-circle"
                          src="{{ asset('assets/img/users/user-44.jpg') }}" alt="img">
                      </a>
                      <div class="ms-2">
                        <h6 class="fw-medium"><a href="invoice-details.html">Hospital Management</a></h6>
                        <span class="fs-13 d-inline-flex align-items-center">#INVOO6<i
                            class="ti ti-circle-filled fs-4 text-primary mx-1"></i>HCL Corp</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="fs-13 mb-1">Payment</p>
                    <h6 class="fw-medium">$6458</h6>
                  </td>
                  <td class="px-0 text-end">
                    <span class="badge badge-success-transparent badge-xs d-inline-flex align-items-center"><i
                        class="ti ti-circle-filled fs-5 me-1"></i>Paid</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <a class="btn btn-light btn-md w-100 mt-2" href="invoice.html">View All</a>
        </div>
      </div>
    </div>
    <!-- /Invoices -->

  </div>
  <!-- /Page Wrapper -->

  <!-- Add Todo -->
  <div class="modal fade" id="add_todo">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Todo</h4>
          <button class="btn-close custom-btn-close" data-bs-dismiss="modal" type="button"
            aria-label="Close">
            <i class="ti ti-x"></i>
          </button>
        </div>
        <form action="index.html">
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Todo Title</label>
                  <input class="form-control" type="text">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label class="form-label">Tag</label>
                  <select class="select">
                    <option>Select</option>
                    <option>Internal</option>
                    <option>Projects</option>
                    <option>Meetings</option>
                    <option>Reminder</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label class="form-label">Priority</label>
                  <select class="select">
                    <option>Select</option>
                    <option>Medium</option>
                    <option>High</option>
                    <option>Low</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="mb-3">
                  <label class="form-label">Descriptions</label>
                  <div class="summernote"></div>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Add Assignee</label>
                  <select class="select">
                    <option>Select</option>
                    <option>Sophie</option>
                    <option>Cameron</option>
                    <option>Doris</option>
                    <option>Rufana</option>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-0">
                  <label class="form-label">Status</label>
                  <select class="select">
                    <option>Select</option>
                    <option>Completed</option>
                    <option>Pending</option>
                    <option>Onhold</option>
                    <option>Inprogress</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-light me-2" data-bs-dismiss="modal" type="button">Cancel</button>
            <button class="btn btn-primary" type="submit">Add New Todo</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Add Todo -->

  <!-- Add Project -->
  <div class="modal fade" id="add_project" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header header-border align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <h5 class="modal-title me-2">Add Project </h5>
            <p class="text-dark">Project ID : PRO-0004</p>
          </div>
          <button class="btn-close custom-btn-close" data-bs-dismiss="modal" type="button"
            aria-label="Close">
            <i class="ti ti-x"></i>
          </button>
        </div>
        <div class="add-info-fieldset">
          <div class="add-details-wizard p-3 pb-0">
            <ul class="progress-bar-wizard d-flex align-items-center border-bottom">
              <li class="active p-2 pt-0">
                <h6 class="fw-medium">Basic Information</h6>
              </li>
              <li class="p-2 pt-0">
                <h6 class="fw-medium">Members</h6>
              </li>
            </ul>
          </div>
          <fieldset id="first-field-file">
            <form action="projects.html">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div
                      class="d-flex align-items-center row-gap-3 bg-light w-100 mb-4 flex-wrap rounded p-3">
                      <div
                        class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle text-dark frames me-2 flex-shrink-0 border border-dashed">
                        <i class="ti ti-photo text-gray-2 fs-16"></i>
                      </div>
                      <div class="profile-upload">
                        <div class="mb-2">
                          <h6 class="mb-1">Upload Project Logo</h6>
                          <p class="fs-12">Image should be below 4 mb</p>
                        </div>
                        <div class="profile-uploader d-flex align-items-center">
                          <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                            Upload
                            <input class="form-control image-sign" type="file" multiple="">
                          </div>
                          <a class="btn btn-light btn-sm" href="javascript:void(0);">Cancel</a>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label">Project Name</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label">Client</label>
                      <select class="select">
                        <option>Select</option>
                        <option>Anthony Lewis</option>
                        <option>Brian Villalobos</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Start Date</label>
                          <div class="input-icon-end position-relative">
                            <input class="form-control datetimepicker" type="text" value="02-05-2024"
                              placeholder="dd/mm/yyyy">
                            <span class="input-icon-addon">
                              <i class="ti ti-calendar text-gray-7"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label">End Date</label>
                          <div class="input-icon-end position-relative">
                            <input class="form-control datetimepicker" type="text" value="02-05-2024"
                              placeholder="dd/mm/yyyy">
                            <span class="input-icon-addon">
                              <i class="ti ti-calendar text-gray-7"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Priority</label>
                          <select class="select">
                            <option>Select</option>
                            <option>High</option>
                            <option>Medium</option>
                            <option>Low</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Project Value</label>
                          <input class="form-control" type="text" value="$">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Total Working Hours</label>
                          <div class="input-icon-end position-relative">
                            <input class="form-control timepicker" type="text" value="02-05-2024"
                              placeholder="-- : -- : --">
                            <span class="input-icon-addon">
                              <i class="ti ti-clock-hour-3 text-gray-7"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Extra Time</label>
                          <input class="form-control" type="text">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-0">
                      <label class="form-label">Description</label>
                      <div class="summernote"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="d-flex align-items-center justify-content-end">
                  <button class="btn btn-outline-light me-2 border" data-bs-dismiss="modal"
                    type="button">Cancel</button>
                  <button class="btn btn-primary wizard-next-btn" type="button">Add Team Member</button>
                </div>
              </div>
            </form>
          </fieldset>
          <fieldset>
            <form action="projects.html">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label me-2">Team Members</label>
                      <input class="input-tags form-control" name="Label" data-role="tagsinput"
                        type="text" value="Jerald,Andrew,Philip,Davis" placeholder="Add new">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label me-2">Team Leader</label>
                      <input class="input-tags form-control" name="Label" data-role="tagsinput"
                        type="text" value="Hendry,James" placeholder="Add new">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label me-2">Project Manager</label>
                      <input class="input-tags form-control" name="Label" data-role="tagsinput"
                        type="text" value="Dwight" placeholder="Add new">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label">Status</label>
                      <select class="select">
                        <option>Select</option>
                        <option>Active</option>
                        <option>Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div>
                      <label class="form-label">Tags</label>
                      <select class="select">
                        <option>Select</option>
                        <option>High</option>
                        <option>Low</option>
                        <option>Medium</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="d-flex align-items-center justify-content-end">
                  <button class="btn btn-outline-light me-2 border" data-bs-dismiss="modal"
                    type="button">Cancel</button>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success_modal"
                    type="button">Save</button>
                </div>
              </div>
            </form>
          </fieldset>
        </div>
      </div>
    </div>
  </div>
  <!-- /Add Project -->

  <!-- Add Leaves -->
  <div class="modal fade" id="add_leaves">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Leave Request</h4>
          <button class="btn-close custom-btn-close" data-bs-dismiss="modal" type="button"
            aria-label="Close">
            <i class="ti ti-x"></i>
          </button>
        </div>
        <form action="index.html">
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
                  <input class="form-control" type="text" disabled="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Remaining Days</label>
                  <input class="form-control" type="text" disabled="">
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
@endsection
