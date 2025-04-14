@extends('employee.layouts.master')
@section('title', 'Group List')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title d-flex justify-content-between align-items-center">
        Vehicle (List)
        <a class="btn btn-sm btn-primary" id="addNewVehicle" href="{{ route('employee.vehicle.create') }}"
          onclick="addNewVehicle()">Add New</a>
      </h5>
      <div class="table-responsive">
        <table class="table-striped table-hover table" id="employeeTable">
          <thead>
            <tr>
              <th scope="col">SI</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($vehicles as $vehicle)
              @if (count($vehicle->bookings) === 0)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $vehicle->owner_name }}</td>
                <td>{{ $vehicle->mobile_number }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <!--Call button -->
                    <a class="btn btn-primary me-1" href="tel:{{ $vehicle->mobile_number }}" title="Edit"
                      aria-describedby="Edit group" style="padding: 2px 5px;">
                      <i class="fa-solid fa-phone"></i>
                    </a>
                    <!-- Booking Button -->
                    <a class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#bookingModal"
                      data-owner="{{ $vehicle->owner_name }}" data-mobile="{{ $vehicle->mobile_number }}"
                      data-address="{{ $vehicle->address }}" data-vehicle-id="{{ $vehicle->id }}"
                      href="javascript:void(0);" title="Book Now" aria-describedby="booking button"
                      style="padding: 2px 5px;">
                      <i class="fa-regular fa-square-plus"></i>
                    </a>

                    <!--Edit button -->
                    <a class="btn btn-primary me-1" href="{{ route('employee.vehicle.edit', $vehicle->id) }}" title="Edit" aria-describedby="Edit group"
                      style="padding: 2px 5px;">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                  </div>
                </td>
              </tr>
              @endif
            @empty
              <tr>
                <td class="text-center" colspan="6">No data found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Booking Modal -->
  <div class="modal fade" id="bookingModal" aria-labelledby="bookingModalLabel" aria-hidden="true"
    tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookingModalLabel">Book Vehicle</h5>
          <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>Owner:</strong> <span id="modalOwner"></span></p>
          <p><strong>Mobile:</strong> <span id="modalMobile"></span></p>
          <p><strong>Address:</strong> <span id="modalAddress"></span></p>

          <form id="bookingForm">
            @csrf
            <input id="modalVehicleId" name="vehicle_id" type="hidden">
            <input type="hidden" name="employee_id" value="{{ Auth::user()->employee_id }}">
            <label for="fare">Vehicle Fare (৳)</label>
            <input class="form-control mb-3" id="fare" name="fare" type="number" required>

            <button class="btn btn-success w-100" type="submit" id="booking_button">Confirm Booking</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
  <script>
    function addNewVehicle() {
      $('#addNewVehicle').html('Add new <i class="fas fa-spinner fa-spin"></i>');
    }

    $(document).ready(function() {
      // status change
      $('.status-btn').change(function() {
        const status = $(this).prop('checked');
        const id = $(this).data('id');
        $.ajax({
          type: "post",
          url: "{{ route('employee.group.change.status') }}",
          data: {
            status: status,
            id: id,
            _token: "{{ csrf_token() }}"
          },
          success: function(response) {
            toastr.success(response.message);
          }
        });
      })
    });
  </script>

  <!-- Booking Modal Script -->
  <script>
    const bookingModal = document.getElementById('bookingModal');
    bookingModal.addEventListener('show.bs.modal', function(event) {
      const button = event.relatedTarget;

      document.getElementById('modalOwner').textContent = button.getAttribute('data-owner');
      document.getElementById('modalMobile').textContent = button.getAttribute('data-mobile');
      document.getElementById('modalAddress').textContent = button.getAttribute('data-address');
      document.getElementById('modalVehicleId').value = button.getAttribute('data-vehicle-id');
    });

    // Booking form submit (AJAX example)
    $('#bookingForm').submit(function(e) {
      e.preventDefault();
      $('#booking_button').html('Booking. Please wait <i class="fas fa-spinner fa-spin"></i>');
      $.ajax({
        url: "{{ route('employee.vehicle.book') }}",
        method: "POST",
        data: $(this).serialize(),
        success: function(response) {
          $('#bookingModal').modal('hide');
          $('#bookingForm')[0].reset();
          $('#booking_button').html('Confirm Booking');
          toastr.success(response.message);
          $('#employeeTable').DataTable().ajax.reload(null, false);
        },
        error: function(xhr) {
          alert('Booking failed.');
        }
      });
    });
  </script>
@endpush

@push('styles')
  <link href="{{ asset('vendor/flasher/toastr.min.css') }}" rel="stylesheet">
@endpush
