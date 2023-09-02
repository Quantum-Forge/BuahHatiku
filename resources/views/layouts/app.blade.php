<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Kenny I Fast build Admin dashboard for any platform</title>
	<meta name="description" content="Kenny is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Kenny Admin, kennyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('vendors/bower_components/morris.js/morris.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Data table CSS -->
    <link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
    <!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper">
        @include('layouts.top_nav')
        @include('layouts.left_nav')
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('dashboard')
            </div>
        @include('layouts.footer')
        </div>
    </div>




    <!-- jQuery -->
    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Data table JavaScript -->
    <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

    <!-- simpleWeather JavaScript -->
    <script src="{{ asset('vendors/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('dist/js/simpleweather-data.js') }}"></script>

    <!-- Progressbar Animation JavaScript -->
    <script src="{{ asset('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/Counter-Up/jquery.counterup.min.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- ChartJS JavaScript -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendors/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('dist/js/morris-data.js') }}"></script>

    <script src="{{ asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('dist/js/init.js') }}"></script>
    <script src="{{ asset('dist/js/dashboard-data.js') }}"></script>

</body>
</html>