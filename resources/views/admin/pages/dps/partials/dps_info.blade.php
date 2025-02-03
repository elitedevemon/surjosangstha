<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img class="rounded-start"
        src="{{ asset('storage/'.$employee->upload_file->own_photo) }}" alt="{{ $employee->name }}">
    </div>
    <div class="col-md-8">
      <div class="card-body" style="padding: 0.50rem 1.25rem">
        <table class="table-borderless table">
          <tr>
            <td>Name:</td>
            <td>{{ $employee->name }}</td>
          </tr>
          <tr>
            <td>Employee Code:</td>
            <td>{{ $employee->employee_code }}</td>
          </tr>
          <tr>
            <td>DPS amount:</td>
            <td>{{ $amount }} tk</td>
          </tr>
          <tr>
            <td>Interest rate:</td>
            <td>{{ $rate }}%</td>
          </tr>
          <tr>
            <td>Validity:</td>
            <td>{{ $validity }} years</td>
         </tr>  
          <tr>
            <td class="text-success fw-bold py-2 text-center" colspan="2">After {{ $validity }} years</td>
          </tr>
          <tr>
            <td>Main Balance</td>
            <td class="text-primary">{{ $amount * ($validity * 12) }} tk</td>
          </tr>
          <tr>
            <td>Interest</td>
            <td class="text-primary">{{ ($amount * $rate/100) * ($validity * 12) }}</td>
          </tr>
          <tr>
            <td>Payable Balance</td>
            <td class="text-primary">{{ $amount * ($validity * 12) + ($amount * $rate/100) * ($validity * 12) }} tk</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
