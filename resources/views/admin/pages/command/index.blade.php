@extends('admin.layouts.master')
@section('title', 'Run Artisan Commands')

@section('content')
  <div class="container mt-5">
    <h2 class="mb-4 text-center">Run Artisan Commands</h2>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
      <div class="card-header">Select a Command</div>
      <div class="card-body">
        <form id="artisanCommand">
          @csrf
          <div class="form-group">
            <label for="command">Choose a Command</label>
            <select class="form-control" id="command" name="command" required>
              <option value="">-- Select Artisan Command --</option>
              <option value="migrate">php artisan migrate</option>
              <option value="migrate:rollback">php artisan migrate:rollback</option>
              <option value="db:seed">php artisan db:seed</option>
              <option value="cache:clear">php artisan cache:clear</option>
              <option value="config:clear">php artisan config:clear</option>
              <option value="route:clear">php artisan route:clear</option>
              <option value="view:clear">php artisan view:clear</option>
              <option value="queue:work">php artisan queue:work</option>
            </select>
          </div>
          <button class="btn btn-primary mt-2" type="submit">Run Command</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      // delete confirmation
      $('#artisanCommand').on('submit', function(e){
        e.preventDefault();
        $('button[type=submit]').attr('disabled', true);
        const confirmed = confirm("Are you sure want to run this command.?");
        if (confirmed === true) {
          let command = $('#command').val();
          $.ajax({
            type: "post",
            url: "{{ route('admin.command.run.artisan') }}",
            data: {
              command:command,
              _token: "{{ csrf_token() }}"
            },
            success: function(response) {
              toastr.success(response.message);
              $('button[type=submit]').removeAttr('disabled');
            }
          });
        } else {
          $('button[type=submit]').removeAttr('disabled');
        }
      });
    });
  </script>
@endpush

@push('styles')
  <link href="{{ asset('vendor/flasher/toastr.min.css') }}" rel="stylesheet">
@endpush
