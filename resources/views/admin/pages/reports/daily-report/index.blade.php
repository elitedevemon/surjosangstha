@extends('admin.layouts.master')
@section('title', 'Employee List')

@section('content')
  <div class="card">
    <div class="card-header justify-content-between">
      <div class="card-title">
        Small Tables
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table-sm table text-nowrap">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Name</th>
              <th scope="col">Branch</th>
              <th scope="col">New OD</th>
              <th scope="col">OD Re.</th>
              <th scope="col">Late OD Re.</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                <div class="form-check">
                  {{-- <input class="form-check-input" id="checkebox-sm" type="checkbox" value=""
                    checked=""> --}}
                  <label class="form-check-label" for="checkebox-sm">
                    Zelensky
                  </label>
                </div>
              </th>
              <td>25-Apr-2021</td>
              <td><span class="badge bg-soft-success">Paid</span></td>
              <td>
                <div class="hstack fs-15 gap-2">
                  <a class="btn btn-icon btn-sm btn-light" href="javascript:void(0);"><i
                      class="feather-download"></i></a>
                  <a class="btn btn-icon btn-sm btn-light" href="javascript:void(0);"><i
                      class="feather-edit"></i></a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection

