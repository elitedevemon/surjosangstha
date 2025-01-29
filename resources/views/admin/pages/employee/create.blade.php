@extends('admin.layouts.master')
@section('title', 'Add Employee')
@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Add Employee</h5>
      <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <!-- Employee Information -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Employee Information</h5>
            <!-- Employee Information -->
            <div class="row">
              <div class="col-12 col-md-7">
                <!-- Name, Email -->
                <div class="row gx-1">
                  <div class="form-group col-6">
                    <label for="name">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                      name="name" type="text" placeholder="Enter name" required value="{{ old('name') }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" required
                      placeholder="Enter email" value="{{ old('email') }}">
                  </div>
                </div>

                <!-- Permanent Address -->
                <div class="row gx-1 mt-2">
                  <div class="form-group col-4">
                    <label for="own_village">Village</label>
                    <input class="form-control" id="own_village" name="own_village" type="text" required
                      placeholder="Village" value="{{ old('own_village') }}">
                  </div>
                  <div class="form-group col-4">
                    <label for="own_union">Union</label>
                    <input class="form-control" id="own_union" name="own_union" type="text" required
                      placeholder="Union" value="{{ old('own_union') }}">
                  </div>
                  <div class="form-group col-4">
                    <label for="own_post_office">Post Office</label>
                    <input class="form-control" id="own_post_office" name="own_post_office" type="text"
                      required placeholder="Post Office" value="{{ old('own_post_office') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="own_thana">Thana</label>
                    <input class="form-control" id="own_thana" name="own_thana" type="text" required
                      placeholder="Thana" value="{{ old('own_thana') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="own_district">District</label>
                    <input class="form-control" id="own_district" name="own_district" type="text" required
                      placeholder="District" value="{{ old('own_district') }}">
                  </div>
                </div>

                <!-- Phone, Designation, Branch -->
                <div class="row gx-1 mt-2">
                  <div class="form-group col-4">
                    <label for="own_phone">Phone</label>
                    <input class="form-control" id="own_phone" name="own_phone" type="text" required
                      placeholder="Enter phone" value="{{ old('own_phone') }}">
                  </div>
                  <div class="form-group col-4">
                    <label for="branch_id">Branch</label>
                    <select class="form-select" id="branch_id" name="branch_id" aria-label="Employee Branch"
                      required>
                      <option disabled selected>--Select Branch--</option>
                      @forelse ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                      @empty
                        <option disabled>No record found</option>
                      @endforelse
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="employee_designation_id">Designation</label>
                    <select class="form-select" id="employee_designation_id" name="employee_designation_id"
                      aria-label="Employee Designation" required>
                      <option disabled selected>--Select Designation--</option>
                      @forelse ($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                      @empty
                        <option disabled>No record found</option>
                      @endforelse
                    </select>
                  </div>

                  <!-- NID, DOB -->
                  <div class="row gx-1 mt-2">
                    <div class="form-group col-6">
                      <label for="own_nid">NID Number</label>
                      <input class="form-control" id="own_nid" name="own_nid" type="text" required
                        placeholder="Enter NID number" value="{{ old('own_nid') }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="dob">Date of Birth</label>
                      <input class="form-control" id="dob" name="dob" type="date"
                        placeholder="Enter birth date" value="{{ old('dob') }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-5">
                <div class="row">
                  <div class="col-12">
                    <div class="text-center">
                      <div class="rounded-circle image-container bg-primary mx-auto"
                        style="height: 40%; width: 40%; overflow: hidden;">
                        <img class="rounded-circle" id="employee_profile"
                          src="{{ asset('assets/img/profiles/profile.jpg') }}" alt="Profile Picture"
                          style="height: 160px">
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="own_photo"><i class="fa-solid fa-camera"></i></label>
                        <input id="own_photo" name="own_photo" type="file" data-id="employee_profile" hidden required accept=".jpg,.png,.jpeg" value="{{ old('own_photo') }}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    {{-- NID Front --}}
                    <div class="row gx-1 mt-3">
                      <div class="col-6 image-container text-center">
                        <!-- NID Front Image -->
                        <img id="employee_nid_front" src="{{ asset('assets/img/front.jpg') }}"
                          alt="NID Front" style="height: 130px; width: 100%">

                        <!-- NID Front Camera Icon -->
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="own_nid_front"><i class="fa-solid fa-camera"></i></label>

                        <!-- NID Front File Input -->
                        <input class="d-none" id="own_nid_front" name="own_nid_front" type="file"
                          required data-id="employee_nid_front" accept=".jpg,.png,.jpeg" value="{{ old('own_nid_front') }}">
                      </div>

                      {{-- NID Back --}}
                      <div class="col-6 image-container text-center">
                        <!-- NID back Image -->
                        <img id="employee_nid_back" src="{{ asset('assets/img/back.jpg') }}" alt="NID back"
                          style="height: 130px; width: 100%">

                        <!-- NID back Camera Icon -->
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="own_nid_back"><i class="fa-solid fa-camera"></i></label>

                        <!-- NID back File Input -->
                        <input class="d-none" id="own_nid_back" name="own_nid_back" type="file" required data-id="employee_nid_back" accept=".jpg,.png,.jpeg" value="{{ old('own_nid_back') }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Father Information -->
            <h5 class="card-title mt-4">Father Information</h5>
            <div class="form-check form-switch">
              <input class="form-check-input" id="father_address" type="checkbox" role="switch">
              <label for="father_address">Same as employee address</label>
            </div>

            <!-- Name, Phone, NID, Village, Union, Post Office, Thana, District -->
            <div class="row gx-1 mt-2">
              <div class="form-group col-3">
                <label for="father_name">Name</label>
                <input class="form-control" id="father_name" name="father_name" type="text" required
                  placeholder="Father Name" value="{{ old('father_name') }}">
              </div>
              <div class="form-group col-3">
                <label for="father_phone">Phone</label>
                <input class="form-control" id="father_phone" name="father_phone" type="text"
                  placeholder="Father Phone" value="{{ old('father_phone') }}">
              </div>
              <div class="form-group col-3">
                <label for="father_nid">NID</label>
                <input class="form-control" id="father_nid" name="father_nid" type="text" required
                  placeholder="Father NID number" value="{{ old('father_nid') }}">
              </div>
              <div class="form-group col-3">
                <label for="father_village">Village</label>
                <input class="form-control" id="father_village" name="father_village" type="text"
                  required placeholder="Father Village" value="{{ old('father_village') }}">
              </div>
              <div class="form-group col-3 mt-2">
                <label for="father_union">Union</label>
                <input class="form-control" id="father_union" name="father_union" type="text" required
                  placeholder="Father Union" value="{{ old('father_union') }}">
              </div>
              <div class="form-group col-3 mt-2">
                <label for="father_post_office">Post Office</label>
                <input class="form-control" id="father_post_office" name="father_post_office" type="text"
                  required placeholder="Father Post Office" value="{{ old('father_post_office') }}">
              </div>
              <div class="form-group col-3 mt-2">
                <label for="father_thana">Thana</label>
                <input class="form-control" id="father_thana" name="father_thana" type="text" required
                  placeholder="Father Thana" value="{{ old('father_thana') }}">
              </div>
              <div class="form-group col-3 mt-2">
                <label for="father_district">District</label>
                <input class="form-control" id="father_district" name="father_district" type="text"
                  required placeholder="Father District" value="{{ old('father_district') }}">
              </div>
            </div>

            <!-- Mother Information -->
            <h5 class="card-title mt-4">Mother Information</h5>
            <div class="form-check form-switch">
              <input class="form-check-input" id="mother_address" type="checkbox" role="switch">
              <label for="mother_address">Same as employee address</label>
            </div>
            <!-- Name, Phone, NID, Village, Union, Post Office, Thana, District -->
            <div class="row gx-1 mt-2">
              <div class="form-group col-3">
                <label for="mother_name">Name</label>
                <input class="form-control" id="mother_name" name="mother_name" type="text" required
                  placeholder="Mother Name" value="{{ old('mother_name') }}">
              </div>
              <div class="form-group col-3">
                <label for="mother_phone">Phone</label>
                <input class="form-control" id="mother_phone" name="mother_phone" type="text"
                  placeholder="Mother Phone" value="{{ old('mother_phone') }}">
              </div>
              <div class="form-group col-3">
                <label for="mother_nid">NID</label>
                <input class="form-control" id="mother_nid" name="mother_nid" type="text" required
                  placeholder="Mother NID number" value="{{ old('mother_nid') }}">
              </div>
              <div class="form-group col-3">
                <label for="mother_village">Village</label>
                <input class="form-control" id="mother_village" name="mother_village" type="text"
                  required placeholder="Mother Village" value="{{ old('mother_village') }}">
              </div>
              <div class="form-group col-3 mt-2">
                <label for="mother_union">Union</label>
                <input class="form-control" id="mother_union" name="mother_union" type="text" required
                  placeholder="Mother Union" value="{{ old('mother_union') }}">
              </div>
              <div class="form-group col-3 mt-2">
                <label for="mother_post_office">Post Office</label>
                <input class="form-control" id="mother_post_office" name="mother_post_office" type="text"
                  required placeholder="Mother Post Office" value="{{ old('mother_post_office') }}">
              </div>
              <div class="form-group col-3 mt-2">
                <label for="mother_thana">Thana</label>
                <input class="form-control" id="mother_thana" name="mother_thana" type="text" required
                  placeholder="Mother Thana" value="{{ old('mother_thana') }}">
              </div>
              <div class="form-group col-3 mt-2">
                <label for="mother_district">District</label>
                <input class="form-control" id="mother_district" name="mother_district" type="text"
                  required placeholder="Mother District" value="{{ Old('mother_district') }}">
              </div>
            </div>
          </div>
        </div>

        <!-- Guarantor Information -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Guarantor Information</h5>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" id="guarantor_1_address" type="checkbox" role="switch">
              <label for="guarantor_1_address">Same as employee address</label>
            </div>
            <!-- Guarantor Information -->
            <div class="row">
              <div class="col-12 col-md-7">
                <!-- Name, Email -->
                <div class="row gx-1">
                  <div class="form-group col-6">
                    <label for="guarantor_1_name">Name</label>
                    <input class="form-control" id="guarantor_1_name" name="guarantor_1_name" type="text"
                      required placeholder="Enter name" value="{{ old('guarantor_1_name') }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="guarantor_1_phone">Phone</label>
                    <input class="form-control" id="guarantor_1_phone" name="guarantor_1_phone"
                      type="text" required placeholder="Enter Phone" value="{{ old('guarantor_1_phone') }}">
                  </div>
                  <div class="form-group col-12 mt-2">
                    <label for="guarantor_1_nid">NID</label>
                    <input class="form-control" id="guarantor_1_nid" name="guarantor_1_nid" type="text"
                      required placeholder="Enter NID number" value="{{ old('guarantor_1_nid') }}">
                  </div>
                </div>

                <!-- Permanent Address -->
                <div class="row gx-1 mt-2">
                  <div class="form-group col-6">
                    <label for="guarantor_1_village">Village</label>
                    <input class="form-control" id="guarantor_1_village" name="guarantor_1_village"
                      type="text" required placeholder="Village" value="{{ old('guarantor_1_village') }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="guarantor_1_union">Union</label>
                    <input class="form-control" id="guarantor_1_union" name="guarantor_1_union"
                      type="text" required placeholder="Union" value="{{ old('guarantor_1_union') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="guarantor_1_post_office">Post Office</label>
                    <input class="form-control" id="guarantor_1_post_office" name="guarantor_1_post_office"
                      type="text" required placeholder="Post Office" value="{{ old('guarantor_1_post_office') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="guarantor_1_thana">Thana</label>
                    <input class="form-control" id="guarantor_1_thana" name="guarantor_1_thana"
                      type="text" required placeholder="Thana" value="{{ old('guarantor_1_thana') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="guarantor_1_district">District</label>
                    <input class="form-control" id="guarantor_1_district" name="guarantor_1_district"
                      type="text" required placeholder="District" value="{{ old('guarantor_1_district') }}">
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-5">
                <div class="row">
                  <div class="col-12">
                    <div class="text-center">
                      <div class="rounded-circle image-container bg-primary mx-auto"
                        style="height: 40%; width: 40%; overflow: hidden;">
                        <img class="rounded-circle" id="guarantor_1_profile"
                          src="{{ asset('assets/img/profiles/profile.jpg') }}" alt="Profile Picture"
                          style="height: 160px">
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="guarantor_1_photo"><i class="fa-solid fa-camera"></i></label>
                        <input class="d-none" id="guarantor_1_photo" name="guarantor_1_photo" type="file"
                          required data-id="guarantor_1_profile" accept=".jpg,.png,.jpeg" value="{{ old('guarantor_1_photo') }}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    {{-- NID Front --}}
                    <div class="row gx-1 mt-3">
                      <div class="col-6 image-container text-center">
                        <!-- NID Front Image -->
                        <img id="guarantor_1_nid_front_photo" src="{{ asset('assets/img/front.jpg') }}"
                          alt="NID Front" style="height: 130px; width: 100%">

                        <!-- NID Front Camera Icon -->
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="guarantor_1_nid_front"><i class="fa-solid fa-camera"></i></label>

                        <!-- NID Front File Input -->
                        <input class="d-none" id="guarantor_1_nid_front" name="guarantor_1_nid_front"
                          type="file" required data-id="guarantor_1_nid_front_photo" accept=".jpg,.png,.jpeg" value="{{ old('guarantor_1_nid_front') }}">
                      </div>

                      {{-- NID Back --}}
                      <div class="col-6 image-container text-center">
                        <!-- NID back Image -->
                        <img id="guarantor_1_nid_back_photo" src="{{ asset('assets/img/back.jpg') }}"
                          alt="NID back" style="height: 130px; width: 100%">

                        <!-- NID back Camera Icon -->
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="guarantor_1_nid_back"><i class="fa-solid fa-camera"></i></label>

                        <!-- NID back File Input -->
                        <input class="d-none" id="guarantor_1_nid_back" name="guarantor_1_nid_back"
                          type="file" required data-id="guarantor_1_nid_back_photo" accept=".jpg,.png,.jpeg" value="{{ old('guarantor_1_nid_back') }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- select if there have multiple guarantor -->
            <div class="form-check form-switch mt-4">
              <input class="form-check-input" name="multiple_guarantor" id="multiple_guarantor" type="checkbox" role="switch">
              <label for="multiple_guarantor">Multiple Guarantor</label>
            </div>
          </div>
        </div>

        <!-- Guarantor 2 Information -->
        <div class="card d-none" id="guarantor_2_access">
          <div class="card-body">
            <h5 class="card-title">Second Guarantor Information</h5>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" id="guarantor_2_address" type="checkbox" role="switch">
              <label for="guarantor_2_address">Same as employee address</label>
            </div>
            <!-- Guarantor Information -->
            <div class="row">
              <div class="col-12 col-md-7">
                <!-- Name, Email -->
                <div class="row gx-1">
                  <div class="form-group col-6">
                    <label for="guarantor_2_name">Name</label>
                    <input class="form-control" id="guarantor_2_name" name="guarantor_2_name" type="text"
                      placeholder="Enter name" value="{{ old('guarantor_2_name') }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="guarantor_2_phone">Phone</label>
                    <input class="form-control" id="guarantor_2_phone" name="guarantor_2_phone"
                      type="text" placeholder="Enter Phone" value="{{ old('guarantor_2_phone') }}">
                  </div>
                  <div class="form-group col-12 mt-2">
                    <label for="guarantor_2_nid">NID</label>
                    <input class="form-control" id="guarantor_2_nid" name="guarantor_2_nid" type="text"
                      placeholder="Enter NID number" value="{{ old('guarantor_2_nid') }}">
                  </div>
                </div>

                <!-- Permanent Address -->
                <div class="row gx-1 mt-2">
                  <div class="form-group col-6">
                    <label for="guarantor_2_village">Village</label>
                    <input class="form-control" id="guarantor_2_village" name="guarantor_2_village"
                      type="text" placeholder="Village" value="{{ old('guarantor_2_village') }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="guarantor_2_union">Union</label>
                    <input class="form-control" id="guarantor_2_union" name="guarantor_2_union"
                      type="text" placeholder="Union" value="{{ old('guarantor_2_union') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="guarantor_2_post_office">Post Office</label>
                    <input class="form-control" id="guarantor_2_post_office" name="guarantor_2_post_office"
                      type="text" placeholder="Post Office" value="{{ old('guarantor_2_post_office') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="guarantor_2_thana">Thana</label>
                    <input class="form-control" id="guarantor_2_thana" name="guarantor_2_thana"
                      type="text" placeholder="Thana" value="{{ old('guarantor_2_thana') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="guarantor_2_district">District</label>
                    <input class="form-control" id="guarantor_2_district" name="guarantor_2_district"
                      type="text" placeholder="District" value="{{ old('guarantor_2_district') }}">
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-5">
                <div class="row">
                  <div class="col-12">
                    <div class="text-center">
                      <div class="rounded-circle image-container bg-primary mx-auto"
                        style="height: 40%; width: 40%; overflow: hidden;">
                        <img class="rounded-circle" id="guarantor_2_profile"
                          src="{{ asset('assets/img/profiles/profile.jpg') }}" alt="Profile Picture"
                          style="height: 160px">
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="guarantor_2_photo"><i class="fa-solid fa-camera"></i></label>
                        <input class="d-none" id="guarantor_2_photo" name="guarantor_2_photo" type="file" data-id="guarantor_2_profile" accept=".jpg,.png,.jpeg" value="{{ old('guarantor_2_photo') }}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    {{-- NID Front --}}
                    <div class="row gx-1 mt-3">
                      <div class="col-6 image-container text-center">
                        <!-- NID Front Image -->
                        <img id="guarantor_2_nid_front_photo" src="{{ asset('assets/img/front.jpg') }}"
                          alt="NID Front" style="height: 130px; width: 100%">

                        <!-- NID Front Camera Icon -->
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="guarantor_2_nid_front"><i class="fa-solid fa-camera"></i></label>

                        <!-- NID Front File Input -->
                        <input class="d-none" id="guarantor_2_nid_front" name="guarantor_2_nid_front"
                          type="file" data-id="guarantor_2_nid_front_photo" accept=".jpg,.png,.jpeg" value="{{ old('guarantor_2_nid_front') }}">
                      </div>

                      {{-- NID Back --}}
                      <div class="col-6 image-container text-center">
                        <!-- NID back Image -->
                        <img id="guarantor_2_nid_back_photo" src="{{ asset('assets/img/back.jpg') }}"
                          alt="NID back" style="height: 130px; width: 100%">

                        <!-- NID back Camera Icon -->
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="guarantor_2_nid_back"><i class="fa-solid fa-camera"></i></label>

                        <!-- NID back File Input -->
                        <input class="d-none" id="guarantor_2_nid_back" name="guarantor_2_nid_back"
                          type="file" data-id="guarantor_2_nid_back_photo" accept=".jpg,.png,.jpeg" value="{{ old('guarantor_2_nid_back') }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Nominee Information -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Nominee Information</h5>
            <div class="form-check form-switch mb-2">
              <input class="form-check-input" id="nominee_address" type="checkbox" role="switch">
              <label for="nominee_address">Same as employee address</label>
            </div>
            <!-- Nominee Information -->
            <div class="row">
              <div class="col-12 col-md-7">
                <!-- Name, Email -->
                <div class="row gx-1">
                  <div class="form-group col-6">
                    <label for="nominee_name">Name</label>
                    <input class="form-control" id="nominee_name" name="nominee_name" type="text"
                      required placeholder="Enter name" value="{{ old('nominee_name') }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="nominee_phone">Phone</label>
                    <input class="form-control" id="nominee_phone" name="nominee_phone" type="text"
                      required placeholder="Enter Phone" value="{{ old('nominee_phone') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="nominee_nid">NID</label>
                    <input class="form-control" id="nominee_nid" name="nominee_nid" type="text" required
                      placeholder="Enter NID number" value="{{ old('nominee_nid') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="nominee_relation">Relation</label>
                    <input class="form-control" id="nominee_relation" name="nominee_relation" type="text"
                      required placeholder="Relation with employee" value="{{ old('nominee_relation') }}">
                  </div>
                </div>

                <!-- Permanent Address -->
                <div class="row gx-1 mt-2">
                  <div class="form-group col-6">
                    <label for="nominee_village">Village</label>
                    <input class="form-control" id="nominee_village" name="nominee_village" type="text"
                      required placeholder="Village" value="{{ old('nominee_village') }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="nominee_union">Union</label>
                    <input class="form-control" id="nominee_union" name="nominee_union" type="text"
                      required placeholder="Union" value="{{ old('nominee_union') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="nominee_post_office">Post Office</label>
                    <input class="form-control" id="nominee_post_office" name="nominee_post_office"
                      type="text" required placeholder="Post Office" value="{{ old('nominee_post_office') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="nominee_thana">Thana</label>
                    <input class="form-control" id="nominee_thana" name="nominee_thana" type="text"
                      required placeholder="Thana" value="{{ old('nominee_thana') }}">
                  </div>
                  <div class="form-group col-6 mt-2">
                    <label for="nominee_district">District</label>
                    <input class="form-control" id="nominee_district" name="nominee_district" type="text"
                      required placeholder="District" value="{{ old('nominee_district') }}">
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-5">
                <div class="row">
                  <div class="col-12">
                    <div class="text-center">
                      <div class="rounded-circle image-container bg-primary mx-auto"
                        style="height: 40%; width: 40%; overflow: hidden;">
                        <img class="rounded-circle" id="nominee_profile"
                          src="{{ asset('assets/img/profiles/profile.jpg') }}" alt="Profile Picture"
                          style="height: 160px">
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="nominee_photo"><i class="fa-solid fa-camera"></i></label>
                        <input class="d-none" id="nominee_photo" name="nominee_photo" type="file"
                          required data-id="nominee_profile" accept=".jpg,.png,.jpeg" value="{{ old('nominee_photo') }}">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    {{-- NID Front --}}
                    <div class="row gx-1 mt-3">
                      <div class="col-6 image-container text-center">
                        <!-- NID Front Image -->
                        <img id="nominee_nid_front_photo" src="{{ asset('assets/img/front.jpg') }}"
                          alt="NID Front" style="height: 130px; width: 100%">

                        <!-- NID Front Camera Icon -->
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="nominee_nid_front"><i class="fa-solid fa-camera"></i></label>

                        <!-- NID Front File Input -->
                        <input class="d-none" id="nominee_nid_front" name="nominee_nid_front" type="file"
                          required data-id="nominee_nid_front_photo" accept=".jpg,.png,.jpeg" value="{{ old('nominee_nid_front') }}">
                      </div>

                      {{-- NID Back --}}
                      <div class="col-6 image-container text-center">
                        <!-- NID back Image -->
                        <img id="nominee_nid_back_photo" src="{{ asset('assets/img/back.jpg') }}"
                          alt="NID back" style="height: 130px; width: 100%">

                        <!-- NID back Camera Icon -->
                        <label class="input-overlay d-flex align-items-center justify-content-center"
                          for="nominee_nid_back"><i class="fa-solid fa-camera"></i></label>

                        <!-- NID back File Input -->
                        <input class="d-none" id="nominee_nid_back" name="nominee_nid_back" type="file"
                          required data-id="nominee_nid_back_photo" accept=".jpg,.png,.jpeg" value="{{ old('nominee_nid_back') }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Official Information -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Official Information</h5>
            <!-- Name, Email -->
            <div class="row gx-1">
              <div class="form-group col-3">
                <label for="employee_code">Employee Code</label>
                <input class="form-control" id="employee_code" name="employee_code" type="text" required
                  placeholder="Enter Employee Code" value="{{ old('employee_code') }}">
              </div>
              <div class="form-group col-3">
                <label for="basic_salary">Salary</label>
                <input class="form-control" id="basic_salary" name="basic_salary" type="number" required
                  placeholder="Enter Salary" value="{{ old('basic_salary') }}">
              </div>
              <div class="form-group col-3">
                <label for="application_date">Application Date</label>
                <input class="form-control" id="application_date" name="application_date" type="date"
                  required placeholder="Enter application date" value="{{ old('application_date') }}">
              </div>
              <div class="form-group col-3">
                <label for="joining_date">Joining Date</label>
                <input class="form-control" id="joining_date" name="joining_date" type="date" required
                  placeholder="Enter Joining date" value="{{ old('joining_date') }}">
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Add Employee</button>
      </form>
    </div>
  </div>
@endsection

@push('styles')
  <style>
    .image-container {
      position: relative;
      overflow: hidden;
    }

    .image-container img {
      display: block;
      width: 100%;
      height: auto;
    }

    .input-overlay {
      position: absolute;
      background: rgb(0, 0, 0);
      background: rgba(0, 0, 0, 0.5);
      color: #f1f1f1;
      transition: .5s ease;
      opacity: 0;
      font-size: 30px;
      text-align: center;
      cursor: pointer;
      width: 100%;
      left: 0;
      top: 0;
      bottom: 0;
      right: 0;
    }

    .image-container:hover .input-overlay {
      opacity: 1;
    }

    .form-select {
      line-height: 1.8;
    }
  </style>
@endpush

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#father_address').change(function() {
        const prop = $(this).prop('checked');
        // alert(prop);
        if (prop) {
          $('#father_village').val($('#own_village').val()).prop('readonly', true);
          $('#father_union').val($('#own_union').val()).prop('readonly', true);
          $('#father_post_office').val($('#own_post_office').val()).prop('readonly', true);
          $('#father_thana').val($('#own_thana').val()).prop('readonly', true);
          $('#father_district').val($('#own_district').val()).prop('readonly', true);
        } else {
          $('#father_village').val('').removeAttr('readonly');
          $('#father_union').val('').removeAttr('readonly');
          $('#father_post_office').val('').removeAttr('readonly');
          $('#father_thana').val('').removeAttr('readonly');
          $('#father_district').val('').removeAttr('readonly');
        }
      });

      $('#mother_address').change(function() {
        const prop = $(this).prop('checked');
        if (prop) {
          $('#mother_village').val($('#own_village').val()).prop('readonly', true);
          $('#mother_union').val($('#own_union').val()).prop('readonly', true);
          $('#mother_post_office').val($('#own_post_office').val()).prop('readonly', true);
          $('#mother_thana').val($('#own_thana').val()).prop('readonly', true);
          $('#mother_district').val($('#own_district').val()).prop('readonly', true);
        } else {
          $('#mother_village').val('').removeAttr('readonly');
          $('#mother_union').val('').removeAttr('readonly');
          $('#mother_post_office').val('').removeAttr('readonly');
          $('#mother_thana').val('').removeAttr('readonly');
          $('#mother_district').val('').removeAttr('readonly');
        }
      });

      $('#guarantor_1_address').change(function() {
        const prop = $(this).prop('checked');
        if (prop) {
          $('#guarantor_1_village').val($('#own_village').val()).prop('readonly', true);
          $('#guarantor_1_union').val($('#own_union').val()).prop('readonly', true);
          $('#guarantor_1_post_office').val($('#own_post_office').val()).prop('readonly', true);
          $('#guarantor_1_thana').val($('#own_thana').val()).prop('readonly', true);
          $('#guarantor_1_district').val($('#own_district').val()).prop('readonly', true);
        } else {
          $('#guarantor_1_village').val('').removeAttr('readonly');
          $('#guarantor_1_union').val('').removeAttr('readonly');
          $('#guarantor_1_post_office').val('').removeAttr('readonly');
          $('#guarantor_1_thana').val('').removeAttr('readonly');
          $('#guarantor_1_district').val('').removeAttr('readonly');
        }
      });

      $('#multiple_guarantor').change(function() {
        const prop = $(this).prop('checked');
        if (prop) {
          $('#guarantor_2_access').removeClass('d-none');
          $('#guarantor_2_name').prop('required', true);
          $('#guarantor_2_phone').prop('required', true);
          $('#guarantor_2_nid').prop('required', true);
          $('#guarantor_2_village').prop('required', true);
          $('#guarantor_2_union').prop('required', true);
          $('#guarantor_2_post_office').prop('required', true);
          $('#guarantor_2_thana').prop('required', true);
          $('#guarantor_2_district').prop('required', true);
          $('#guarantor_2_photo').prop('required', true);
          $('#guarantor_2_nid_front').prop('required', true);
          $('#guarantor_2_nid_back').prop('required', true);
        } else {
          $('#guarantor_2_access').addClass('d-none');
          $('#guarantor_2_name').val('').removeAttr('required');
          $('#guarantor_2_phone').val('').removeAttr('required');
          $('#guarantor_2_nid').val('').removeAttr('required');
          $('#guarantor_2_village').val('').removeAttr('required');
          $('#guarantor_2_union').val('').removeAttr('required');
          $('#guarantor_2_post_office').val('').removeAttr('required');
          $('#guarantor_2_thana').val('').removeAttr('required');
          $('#guarantor_2_district').val('').removeAttr('required');
          $('#guarantor_2_photo').val('').removeAttr('required');
          $('#guarantor_2_nid_front').val('').removeAttr('required');
          $('#guarantor_2_nid_back').val('').removeAttr('required');
        }
      });

      $('#guarantor_2_address').change(function() {
        const prop = $(this).prop('checked');
        if (prop) {
          $('#guarantor_2_village').val($('#own_village').val()).prop('readonly', true);
          $('#guarantor_2_union').val($('#own_union').val()).prop('readonly', true);
          $('#guarantor_2_post_office').val($('#own_post_office').val()).prop('readonly', true);
          $('#guarantor_2_thana').val($('#own_thana').val()).prop('readonly', true);
          $('#guarantor_2_district').val($('#own_district').val()).prop('readonly', true);
        } else {
          $('#guarantor_2_village').val('').removeAttr('readonly');
          $('#guarantor_2_union').val('').removeAttr('readonly');
          $('#guarantor_2_post_office').val('').removeAttr('readonly');
          $('#guarantor_2_thana').val('').removeAttr('readonly');
          $('#guarantor_2_district').val('').removeAttr('readonly');
        }
      });

      $('#nominee_address').change(function() {
        const prop = $(this).prop('checked');
        if (prop) {
          $('#nominee_village').val($('#own_village').val()).prop('readonly', true);
          $('#nominee_union').val($('#own_union').val()).prop('readonly', true);
          $('#nominee_post_office').val($('#own_post_office').val()).prop('readonly', true);
          $('#nominee_thana').val($('#own_thana').val()).prop('readonly', true);
          $('#nominee_district').val($('#own_district').val()).prop('readonly', true);
        } else {
          $('#nominee_village').val('').removeAttr('readonly');
          $('#nominee_union').val('').removeAttr('readonly');
          $('#nominee_post_office').val('').removeAttr('readonly');
          $('#nominee_thana').val('').removeAttr('readonly');
          $('#nominee_district').val('').removeAttr('readonly');
        }
      });
    });

    $('input[type="file"]').change(function(event) {
      const file = $(this).val();
      const ext = file.split('.').pop().toLowerCase();
      const id = $(this).data('id');

      if ($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1) {
        // document.getElementById(id).src = window.URL.revokeObjectURL(this.files[0]);
        alert('Please upload a valid image file');
        $(this).val('');
        return false;
      }
      if (this.files[0].size > 204800) {
        alert("File size shouldn't exceed 200 KB.!");
        this.value = "";
        return false;
      }else{
        document.getElementById(id).src = window.URL.createObjectURL(this.files[0]);
      }
    });

    $('button[type="submit"]').click(function(e) {
      e.preventDefault();
      $(this).html('Please wait... <i class="fas fa-spinner fa-spin"></i>').attr('disabled', 'true');
      const own_photo = $('#own_photo').val();
      const own_nid_front = $('#own_nid_front').val();
      const own_nid_back = $('#own_nid_back').val();
      const guarantor_1_photo = $('#guarantor_1_photo').val();
      const guarantor_1_nid_front = $('#guarantor_1_nid_front').val();
      const guarantor_1_nid_back = $('#guarantor_1_nid_back').val();
      const guarantor_2_photo = $('#guarantor_2_photo').val();
      const guarantor_2_nid_front = $('#guarantor_2_nid_front').val();
      const guarantor_2_nid_back = $('#guarantor_2_nid_back').val();
      const nominee_photo = $('#nominee_photo').val();
      const nominee_nid_front = $('#nominee_nid_front').val();
      const nominee_nid_back = $('#nominee_nid_back').val();

      const multiple_guarantor = $('#multiple_guarantor').prop('checked');

      if (own_photo == '' || own_nid_front == '' || own_nid_back == '' || guarantor_1_photo == '' ||
        guarantor_1_nid_front == '' || guarantor_1_nid_back == '' || nominee_photo == '' ||
        nominee_nid_front == '' || nominee_nid_back == '') {
        alert('Please fill up all the fields');
        $(this).html('Add Employee').removeAttr('disabled');
        return false;
      }

      if (multiple_guarantor == true) {
        if (guarantor_2_photo == '' || guarantor_2_nid_front == '' || guarantor_2_nid_back == '') {
          alert('Please fill up the second guarantor information');
          $(this).html('Add Employee').removeAttr('disabled');
          return false;
        }
      }

      $(this).closest('form').submit();

    });
  </script>
@endpush
