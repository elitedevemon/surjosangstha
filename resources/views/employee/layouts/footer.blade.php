  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- Bootstrap Core JS -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

  <!-- Feather Icon JS -->
  <script src="{{ asset('assets/js/feather.min.js') }}" type="text/javascript"></script>

  <!-- Slimscroll JS -->
  <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

  <!--Sticky Sidebar JS -->
  <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"
    type="text/javascript"></script>

  <!-- Chart JS -->
  <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>

  <!-- Chart JS -->
  <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/chartjs/chart-data.js') }}" type="text/javascript"></script>

  <!-- Datetimepicker JS -->
  <script src="{{ asset('assets/js/moment.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

  <!-- Daterangepikcer JS -->
  <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript">
  </script>

  <!-- Summernote JS -->
  <script src="{{ asset('assets/plugins/summernote/summernote-lite.min.js') }}" type="text/javascript">
  </script>

  <!-- Bootstrap Tagsinput JS -->
  <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"
    type="text/javascript"></script>

  <!-- Select2 JS -->
  <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

  <!-- Color Picker JS -->
  <script src="{{ asset('assets/plugins/%40simonwep/pickr/pickr.es5.min.js') }}" type="text/javascript">
  </script>

  <!-- Custom JS -->
  <script src="{{ asset('assets/js/todo.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/theme-colorpicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>

  <script>
    //logout function
    function confirmLogout(event, element) {
      event.preventDefault();
      if (confirm("Are you sure you want to log out?")) {
        element.closest('form').submit();
      }
    }
  </script>

