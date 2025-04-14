@extends('admin.layouts.master')
@section('title', 'Block Customer (List)')

@section('content')
  <div class="card">
    <div class="card-header justify-content-between">
      <div class="card-title d-flex justify-content-between align-items-center">
        Block Customer (List)
        <div class="col-3">
          <input type="search" name="search" id="search_block_customer" class="form-control form-control-sm"
          placeholder="Search by code" aria-label="Search">
        </div>
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table-sm table text-nowrap">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Due</th>
              <th scope="col">Employee By</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($customers as $customer)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->code }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->block_customer_due }}</td>
                <td>{{ $customer->group->employee->name }}</td>
                <td>
                  <button class="btn btn-secondary btn-sm">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  <button class="btn btn-secondary btn-sm">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                  <button class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
            @empty
              <td colspan="8">No data found</td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection

