@extends('admin.layouts.master')
@section('title', 'Add New DPS')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New DPS</h5>
      <div class="row">
        <div class="col-md-6">
          <form action="{{ route('admin.dps.store') }}" method="POST">
            @csrf
            <!-- select employee -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mt-3">
                  <label for="employee_id">Select Employee</label>
                  <select class="form-control @error('employee_id') is-invalid @enderror" id="employee_id"
                    name="employee_id" @error('employee_id') aria-describedby="employee_id-error" @enderror>
                    <option disabled selected>Select Employee</option>
                    @forelse ($employees as $employee)
                      <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @empty
                      <option disabled>No record found</option>
                    @endforelse
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mt-3">
                  <label for="amount">Amount</label>
                  <input class="form-control @error('amount') is-invalid @enderror" id="amount"
                    name="amount" type="text" value="{{ old('amount') }}"
                    @error('amount') aria-describedby="amount-error" @enderror placeholder="Enter amount">
                  @error('amount')
                    <div class="invalid-feedback" id="amount-error">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group mt-3">
                  <label for="rate">Interest rate</label>
                  <input class="form-control @error('rate') is-invalid @enderror" id="rate" name="rate"
                    type="text" value="{{ old('rate') }}"
                    @error('rate') aria-describedby="rate-error" @enderror placeholder="Enter rate">
                  @error('rate')
                    <div class="invalid-feedback" id="rate-error">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group mt-3">
                  <label for="validity">Validity</label>
                  <select class="form-control @error('validity') is-invalid @enderror" id="validity"
                    name="validity" @error('validity') aria-describedby="validity-error" @enderror>
                    <option disabled selected>DPS Validity</option>
                    <option value="1">1 Years</option>
                    <option value="3">3 Years</option>
                    <option value="5">5 Years</option>
                    <option value="8">8 Years</option>
                    <option value="10">10 Years</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="d-flex">
              <button class="btn btn-secondary me-2 mt-4" id="check_dps">Check DPS Info</button>
              <button class="btn btn-primary mt-4" type="submit" disabled>Add DPS</button>
            </div>
          </form>
        </div>
        <div class="col-md-6 d-none" id="dps_info">

        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      // dps info check
      $('#check_dps').click(function(e) {
        e.preventDefault();
        const employee_id = $('#employee_id').val();
        const amount = $('#amount').val();
        const rate = $('#rate').val();
        const validity = $('#validity').val();

        if (employee_id != null && amount != null && rate != null && validity != null) {
          $.ajax({
            type: "POST",
            url: "{{ route('admin.dps.info') }}",
            data: {
              employee_id: employee_id,
              amount: amount,
              rate: rate,
              validity: validity,
              _token: "{{ csrf_token() }}"
            },
            beforeSend: function() {
              $('#check_dps').html('Checking Info... <i class="fas fa-spinner fa-spin"></i>')
            },
            success: function(response) {
              $('#check_dps').html('Check DPS Info');
              $('button[type=submit]').removeAttr('disabled');
              $('#dps_info').removeClass('d-none').html(response.info);
            }
          });
        } else {
          alert('Please fill all required field');
        }

      });

      // submit dps
      $('button[type=submit]').click(function(e) {
        e.preventDefault();
        $(this).prop('disabled', true);
        $(this).html('Please wait... <i class="fas fa-spinner fa-spin"></i>');
        $(this).closest('form').submit();
      });
    });
  </script>
@endpush

@push('styles')
  <style>
    .table th,
    .table td {
      padding: 0px 0px;
    }
  </style>
@endpush
