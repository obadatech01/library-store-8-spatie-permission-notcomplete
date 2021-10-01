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

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/media/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/RWD-table-pattern/css/rwd-table.min.css')}}">

    <!-- Remodal -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/modal/remodal/remodal.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/modal/remodal/remodal-default-theme.css')}}">

    <!-- Jquery UI -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/jquery-ui/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/plugin/jquery-ui/jquery-ui.structure.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/plugin/jquery-ui/jquery-ui.theme.min.css')}}">


	<!-- Boostrap Tree View -->
	<link rel="stylesheet" href="{{asset('assets/plugin/treeview/bootstrap-treeview.min.css')}}">

    <!-- RTL -->
	<link rel="stylesheet" href="{{asset('assets/styles/style-rtl.min.css')}}">

    <!-- Toaster CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script>
        (function () {
            window.Laravel = {
                csrfToken: '{{ csrf_token() }}'
            };
        })();
    </script>
</head>

<body>

    @include('layouts.sidebar')
    @include('layouts.header')

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

	<!-- Data Tables -->
    <script src="{{asset('assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js')}}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('assets/plugin/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/plugin/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/scripts/datatables.demo.min.js')}}"></script>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/scripts/sweetalert.init.min.js')}}"></script>

    <!-- Remodal -->
    <script src="{{ asset('assets/plugin/modal/remodal/remodal.min.js')}}"></script>

    <!-- Jquery UI -->
	<script src="{{ asset('assets/plugin/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{ asset('assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- Boostrap Tree View -->
	<script src="assets/plugin/treeview/bootstrap-treeview.min.js"></script>
	<script src="assets/scripts/treeview.init.min.js"></script>

    <script src="{{ asset('assets/scripts/main.min.js')}}"></script>

    <!-- Sweetalert2 js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(function(){
            $(document).on('click', '#delete', function(e){
                e.preventDefault();
                var link = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                })
            });
        });
    </script>

    <!-- Toaster js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type', 'info')}}";
        switch(type) {
            case 'info':
            toastr.info("{{Session::get('message')}}");
            break;

            case 'success':
            toastr.success("{{Session::get('message')}}");
            break;

            case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;

            case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
        }
        @endif
    </script>
</body>
</html>
