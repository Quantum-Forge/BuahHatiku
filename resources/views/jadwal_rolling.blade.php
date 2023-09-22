@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">analytical</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>dashboard</span></a></li>
			<li class="active"><span>analytical</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->

</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Jadwal Rolling</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<form action="#">
								<div class="form-body">
									<h6 class="txt-dark capitalize-font"><i class="ti-calendar mr-10"></i>Pembuatan Jadwal Rolling</h6>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10">Tanggal Penjadwalan</label>
												<div class="input-group date" name="Tanggal" id="Tanggal_rolling">
													<input type="text" data-mask="99/99/9999" class="form-control">
													<span class="input-group-addon">
														<span class="fa fa-calendar"></span>
													</span>
												</div> 
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10">Terapis</label>
												<select class="form-control" data-placeholder="Choose Terapis" tabindex="1">
													<option value=""></option>
												</select>
											</div>
										</div>
										<!--/span-->
									</div>
									<!-- /Row -->
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10">Anak</label>
												<select class="form-control">
													<option value="">Male</option>
													<option value="">Female</option>
												</select>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10">Jam</label>
												<input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2016 1:30 PM - 01/01/2016 2:00 PM">
											</div>
										</div>
										<!--/span-->
									</div>
									<div class="form-actions mt-10">
										<button type="submit" class="btn btn-success btn-block mr-10">Save</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Row -->

@endsection

@section('scripts')
<!-- jQuery -->
<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Moment JavaScript -->
<script src="{{ asset('vendors/bower_components/moment/min/moment-with-locales.min.js') }}"></script>

<!-- Bootstrap Colorpicker JavaScript -->
<script src="{{ asset('vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

<!-- Switchery JavaScript -->
<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

<!-- Select2 JavaScript -->
<script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- Bootstrap Select JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<!-- Bootstrap Tagsinput JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

<!-- Bootstrap Touchspin JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Multiselect JavaScript -->
<script src="{{ asset('vendors/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>

<!-- Bootstrap Switch JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>

<!-- Bootstrap Datetimepicker JavaScript -->
<script src="{{ asset('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Form Advance Init JavaScript -->
<script src="{{ asset('dist/js/form-advance-data.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>

@endsection