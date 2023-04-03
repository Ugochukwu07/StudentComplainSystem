
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>{{ config('app.name') }} - {{ $title ?? 'Dashboard' }}</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">

    @yield('css')

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
	<div id="loader"></div>

  @include('layouts.header')

  <x-Layout.Sidebar />

  @yield('content')

  @include('layouts.footer')

</div>
<!-- ./wrapper -->

	<!-- Page Content overlay -->


	<!-- Vendor JS -->
	<script src="{{ asset('js/vendors.min.js') }}"></script>
	<script src="{{ asset('js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.resize.js') }}"></script>
    @yield('vendor_js')

    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
	<script src="{{ asset('js/pages/sampledata1.js') }}"></script>

	<!-- Master Admin App -->
	<script src="{{ asset('js/template.js') }}"></script>
	<script src="{{ asset('js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/pages/custom-scroll.js') }}"></script>

    <script>
        $('#departments').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#faculties').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#offices').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#complains').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#students').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    @yield('js')

</body>
</html>
