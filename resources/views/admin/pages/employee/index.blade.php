@extends('admin.layouts.master')
@section('title', 'Employee List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Information (List)</h5>
      <div class="table-responsive">
        <table class="table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('styles')
  {{-- DataTable CDN --}}
  <link href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" rel="stylesheet" />
@endpush

@push('scripts')
  {{-- DataTable CDN --}}
  <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

  {{-- Initializing DataTable --}}
  <script>
    $(document).ready(function() {
      $('#employeeTable').DataTable({
        processing: true,
        
      });
    });
  </script>
@endpush
