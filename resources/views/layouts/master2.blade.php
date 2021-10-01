<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{asset('assets/styles/style.min.css')}}">

	<!-- Material Design Icon -->
	<link rel="stylesheet" href="{{asset('assets/fonts/material-design/css/materialdesignicons.css')}}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('assets/plugin/waves/waves.min.css')}}">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{asset('assets/plugin/sweet-alert/sweetalert.css')}}">

	<!-- Morris Chart -->
	<link rel="stylesheet" href="{{asset('assets/plugin/chart/morris/morris.css')}}">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="{{asset('assets/plugin/fullcalendar/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugin/fullcalendar/fullcalendar.print.css')}}" media='print'>

	<!-- RTL -->
	<link rel="stylesheet" href="{{asset('assets/styles/style-rtl.min.css')}}">

    @yield('css')

    <script>
        (function () {
            window.Laravel = {
                csrfToken: '{{ csrf_token() }}'
            };
        })();
    </script>
</head>

<body>

    @yield('content')

	<!-- ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{asset('assets/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('assets/plugin/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('assets/plugin/waves/waves.min.js')}}"></script>

	<!-- Morris Chart -->
	<script src="{{asset('assets/plugin/chart/morris/morris.min.js')}}"></script>
	<script src="{{asset('assets/plugin/chart/morris/raphael-min.js')}}"></script>
	<script src="{{asset('assets/scripts/chart.morris.init.min.js')}}"></script>

	<!-- Flot Chart -->
	<script src="{{asset('assets/plugin/chart/plot/jquery.flot.min.js')}}"></script>
	<script src="{{asset('assets/plugin/chart/plot/jquery.flot.tooltip.min.js')}}"></script>
	<script src="{{asset('assets/plugin/chart/plot/jquery.flot.categories.min.js')}}"></script>
	<script src="{{asset('assets/plugin/chart/plot/jquery.flot.pie.min.js')}}"></script>
	<script src="{{asset('assets/plugin/chart/plot/jquery.flot.stack.min.js')}}"></script>
	<script src="{{asset('assets/scripts/chart.flot.init.min.js')}}"></script>

	<!-- Sparkline Chart -->
	<script src="{{asset('assets/plugin/chart/sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('assets/scripts/chart.sparkline.init.min.js')}}"></script>

	<!-- FullCalendar -->
	<script src="{{asset('assets/plugin/moment/moment.js')}}"></script>
	<script src="{{asset('assets/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{asset('assets/scripts/fullcalendar.init.js')}}"></script>

	<script src="{{asset('assets/scripts/main.min.js')}}"></script>
    @yield('js')
</body>
</html>
