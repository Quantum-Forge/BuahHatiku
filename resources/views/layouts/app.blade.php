<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>@yield('title')</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content=""/>
	<!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap touchspin CSS -->
    <link href="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap Colorpicker CSS -->
    <link href="{{ asset('vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Datetimepicker CSS -->
    <link href="{{ asset('vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- vector map CSS -->
	<link href="{{ asset('vendors/bower_components/jquery-wizard.js/css/wizard.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Calendar CSS -->
	<link href="{{ asset('vendors/bower_components/fullcalendar/dist/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
	<!-- jquery-steps css -->
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.steps/demo/css/jquery.steps.css') }}">
    <!-- select2 CSS -->
    <link href="{{ asset('vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- switchery CSS -->
    <link href="{{ asset('vendors/bower_components/switchery/dist/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- bootstrap-select CSS -->
    <link href="{{ asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- bootstrap-tagsinput CSS -->
    <link href="{{ asset('vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css"/>
    <!-- bootstrap-touchspin CSS -->
    <link href="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- multi-select CSS -->
    <link href="{{ asset('vendors/bower_components/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Switches CSS -->
    <link href="{{ asset('vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Dropify CSS -->
	<link href="{{ asset('vendors/bower_components/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Morris Charts CSS -->
    <link href="{{ asset('vendors/bower_components/morris.js/morris.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Jasny-bootstrap CSS -->
	<link href="{{ asset('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
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
<script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
<!-- Data table JavaScript -->
<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>
<!-- Moment JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
<!-- Switchery JavaScript -->
<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
<!-- Bootstrap Colorpicker JavaScript -->
<script src="{{ asset('vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>	
<!-- Bootstrap Datetimepicker JavaScript -->
<script type="text/javascript" src="{{ asset('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- Bootstrap Daterangepicker JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Bootstrap Dropify JavaScript -->
<script src="{{ asset('vendors/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
<!-- Form Flie Upload Data JavaScript -->
<script src="{{ asset('dist/js/form-file-upload-data.js') }}"></script>
<!-- Bootstrap Dropify JavaScript -->
<script src="{{ asset('vendors/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
<!-- Form Flie Upload Data JavaScript -->
<script src="{{ asset('dist/js/form-file-upload-data.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Bootstrap Select JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<!-- Bootstrap Touchspin JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
<!-- Form Wizard JavaScript -->
<script src="{{ asset('vendors/bower_components/jquery.steps/build/jquery.steps.min.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<!-- Form Advance Init JavaScript -->
<script src="{{ asset('dist/js/form-advance-data.js') }}"></script>
@yield('scripts')
</body>
</html>