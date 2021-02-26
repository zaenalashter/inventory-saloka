<!-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
  <!-- General JS Scripts -->
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/scripts.js"></script>
  <script src="/js/custom.js"></script>
<!-- AdminLTE App -->
<!-- <script src="{{ asset('js/adminlte.min.js') }}"></script> -->

<!-- SweetAlert 2 -->
<script src="{{ asset('vendor/sweetalert2-8.13.1/sweetalert2.all.min.js') }}"></script>

<!-- DataTables -->
<script type="text/javascript" src="{{ asset('vendor/datatables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/datatables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/datatables/FixedColumns-3.2.5/js/dataTables.fixedColumns.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/datatables/FixedColumns-3.2.5/js/fixedColumns.bootstrap4.min.js') }}"></script>

<!-- DateRangePicker -->
<script type="text/javascript" src="{{ asset('vendor/daterangepicker-master/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/daterangepicker-master/daterangepicker.js') }}"></script>

<!-- Slim Select -->
<script type="text/javascript" src="{{ asset('vendor/slimselect/slimselect.min.js') }}"></script>

{{-- ApexCharts --}}
<script type="text/javascript" src="{{ asset('vendor/apexcharts/dist/apexcharts.js') }}"></script>

{{-- ApexCharts --}}
<script type="text/javascript" src="{{ asset('vendor/chart.js/dist/Chart.js') }}"></script>

{{-- Numeral JS --}}
<script type="text/javascript" src="{{ asset('vendor/numeral/numeral.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
