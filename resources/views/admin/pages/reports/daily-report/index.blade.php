@extends('admin.layouts.master')
@section('title', 'Daily Report')

@section('content')
  <div class="card">
    <div class="card-header justify-content-between">
      <div class="card-title">
        Daily Report
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table-sm table text-nowrap">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Employee Name</th>
              <th scope="col">Branch</th>
              <th scope="col">New OD</th>
              <th scope="col">OD Re.</th>
              <th scope="col">Late OD Re.</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($employees as $employee)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->branch->branch_name }}</td>
                <td>{{ count($employee->overdues->where('paid_status', 'pending')) }}</td>
                <td>{{ count($employee->overdues->where('paid_status', 'paid')->where('od_status', 'new')) }}</td>
                <td>{{ count($employee->overdues->where('paid_status', 'paid')->where('od_status', 'block')) }}</td>
                <td>
                  <a href="" class="btn btn-sm btn-primary">View</a>
                </td>
              </tr>
            @empty
              <td colspan="7">No data found</td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection

