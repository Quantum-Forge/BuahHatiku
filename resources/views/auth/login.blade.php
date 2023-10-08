<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>BuahHatiku - Login</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content=""/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
		<link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

        <!-- vector map CSS -->
        <link href="{{ asset('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css">

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
									<div class="panel-heading">
										<div class="pull-left">
											<h6 class="panel-title txt-dark">Login</h6>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="panel-wrapper collapse in">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-12 col-xs-12">
													<div class="form-wrap">
														<form method="POST" action="/login">
															{{ csrf_field() }}
															@error('error')
																<div class="alert alert-danger alert-dismissable">
																	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
																	<i class="ti-na pr-15"></i>{{ $message }}
																</div>
															@enderror
															<div class="form-group">
																<label class="control-label mb-10" for="email">Email</label>
																<div class="input-group">
																	<input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
																	<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="password">Password</label>
																<div class="input-group">
																	<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
																	<div class="input-group-addon"><i class="icon-lock"></i></div>
																</div>
															</div>
															
															<div class="form-group">
																<div class="checkbox checkbox-success pr-10 pull-left">
																	<input id="checkbox_2" name="remember_me" type="checkbox">
																	<label for="checkbox_2"> Keep me logged in </label>
																</div>
																<a class="capitalize-font txt-danger block pt-5 pull-right" href="#">forgot password</a>
																<div class="clearfix"></div>
															</div>
															<div class="form-group">
																<button type="submit" class="btn btn-success btn-block">Sign in</button>
															</div>
															<div class="form-group mb-0">
																<span class="inline-block pr-5">Don't have an account?</span>
																<a class="inline-block txt-danger" href="signup-page.html">Sign Up</a>
															</div>	
														</form>
													</div>
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
