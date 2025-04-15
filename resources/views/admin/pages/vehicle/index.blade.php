@extends('admin.layouts.master')
@section('title', 'Vehicle (List)')

@section('content')
  <div class="card">
    <div class="card-header justify-content-between">
      <div class="card-title d-flex justify-content-between align-items-center">
        Vehicle (List)
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
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Branch</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($vehicles as $vehicle)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $vehicle->owner_name }}</td>
                <td>{{ $vehicle->mobile_number }}</td>
                <td>{{ $vehicle->address }}</td>
                <td>{{ $vehicle->branch->branch_name }}</td>
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

