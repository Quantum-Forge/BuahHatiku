<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>500 Error</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content=""/>
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
		<link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
		<!-- vector map CSS -->
		<link href="{{ asset('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Custom CSS -->
		<link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
		
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="panel panel-default card-view mb-0">
									<div class="panel-wrapper collapse in">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-12 col-xs-12 text-center">
													<h3 class="mb-20 txt-danger">Server Error</h3>
													<p class="font-18 txt-dark mb-15">Looks like somthing went wrong!</p>
													<p>We track these errors automatically.</p>
													<a class="btn btn-success btn-icon right-icon btn-rounded mt-30" href="/home"><span>back to home</span><i class="fa fa-space-shuttle"></i></a>
													<p class="font-12 mt-15">{{ date('Y') }} &copy; Buahatiku. Developed by Rumah Pintar Inovasi</p>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
	
		<!-- Init JavaScript -->
		<script src="{{ asset('dist/js/init.js') }}"></script>
	</body>
</html>