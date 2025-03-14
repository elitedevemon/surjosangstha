<!DOCTYPE html>
<html lang="en">

  @include('employee.layouts.header')
  @stack('styles')

  <body>

    <div id="global-loader">
      <div class="page-loader"></div>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

      @include('employee.layouts.partials.top-bar')

      <!-- Sidebar -->
      <div class="sidebar" id="sidebar">
        @include('employee.layouts.partials.logo')
        @include('employee.layouts.partials.header-nav')
        @include('employee.layouts.partials.sidebar-menu')
      </div>
      <!-- /Sidebar -->

      <!-- Page Wrapper -->
      <div class="page-wrapper">
        <div class="content">

          @yield('content')

        </div>

        <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
          <p class="mb-0">2025 {{ \Illuminate\Support\Carbon::now()->format('Y') == '2025' ? '' : '-'. \Illuminate\Support\Carbon::now()->format('Y') }} &copy; Surjo Sangstha.</p>
          <p>Designed &amp; Developed By <a class="text-primary" href="https://github.com/elitedevemon">EliteDev Emon</a></p>
        </div>

      </div>

    </div>
    <!-- /Main Wrapper -->

    @include('employee.layouts.footer')
    @stack('scripts')

  </body>

</html>
