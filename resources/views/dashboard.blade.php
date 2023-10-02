@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Dashboard</h5>
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
	<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">

		<div class="panel panel-default card-view  pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body  pa-0">
					<div class="profile-box">
						<div class="profile-info-wrap text-center">
							<div class="profile-info pt-40">
								<img class="img-circle inline-block mt-40 mb-10" src="dist/img/user1.png" alt="user"/>
								<h4 class="txt-light block  mb-5 capitalize-font">Aldo Sentosa</h4>
								<h6 class="txt-light block uppercase-font pb-40">Owner</h6>
							</div>	
							<div class="profile-image-overlay"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box bg-primary">
						<div class="row ma-0">
							<div class="col-xs-5 text-center pa-0 icon-wrap-left">
								<i class="icon-user txt-light"></i>
							</div>
							<div class="col-xs-7 text-center data-wrap-right">
								<h6 class="txt-light">Jumlah Terapis</h6>
								<span class="txt-light counter counter-anim">45678</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box bg-pink">
						<div class="row ma-0">
							<div class="col-xs-5 text-center pa-0 icon-wrap-left">
								<i class="ti-face-smile txt-light"></i>
							</div>
							<div class="col-xs-7 text-center data-wrap-right">
								<h6 class="txt-light">Anak Hadir</h6>
								<span class="txt-light counter counter-anim">45678</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box bg-red">
						<div class="row ma-0">
							<div class="col-xs-5 text-center pa-0 icon-wrap-left">
								<i class="ti-face-sad txt-light"></i>
							</div>
							<div class="col-xs-7 text-center data-wrap-right">
								<h6 class="txt-light">Anak tidak Hadir</h6>
								<span class="txt-light counter counter-anim">45678</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark"><i class="icon-share mr-10"></i>Visits Conversion</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<canvas id="chart_1" height="417"></canvas>	
				</div>
			</div>
		</div>

		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Daftar Absensi</h6>
				</div>
				<div class="pull-right">
					<a href="" class="label label-primary">Selengkapnya</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table class="table display product-overview" id="statement">
								<thead>
									<tr>
										<th>tanggal</th>
										<th>Jam</th>
										<th>Terapis</th>
										<th>Anak</th>
										<th>status</th>
									</tr>
								</thead>
								{{-- looping 4x sesuai urutan upload --}}
								<tbody>
									<tr>
										<td>dd/mm/yyyy</td>
										<td>00:00 - 00:00</td>
										<td>Terapis</td>
										<td>Brian Thomas</td>
										<td><span class="label label-success font-weight-100">Hadir</span></td>
									</tr>
									<tr>
										<td>dd/mm/yyyy</td>
										<td>00:00 - 00:00</td>
										<td>Terapis</td>
										<td>Brian Thomas</td>
										<td><span class="label label-success font-weight-100">Hadir</span></td>
									</tr>
									<tr>
										<td>dd/mm/yyyy</td>
										<td>00:00 - 00:00</td>
										<td>Muhammad Fadillah</td>
										<td>Anak</td>
										<td><span class="label label-danger font-weight-100">Tidak Hadir</span></td>
									</tr>
									<tr>
										<td>dd/mm/yyyy</td>
										<td>00:00 - 00:00</td>
										<td>Terapis</td>
										<td>Muhammad Aziz Fata</td>
										<td><span class="label label-danger font-weight-100">Tidak Hadir</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>	
				</div>	
			</div>
		</div>

	</div>
</div>
<!-- /Row -->

<div class="row">
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="calendar-wrap">
					  <div id="calendar_small" class="small-calendar"></div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark"><i class="icon-pie-chart mr-10"></i>Impressions</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<canvas id="chart_6" height="280"></canvas>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-success card-view">
			<div class="panel-heading mb-20">
				<div class="pull-left">
					<h6 class="panel-title txt-light pull-left">Daftar Anak</h6>
				</div>
				<div class="pull-right">
					<a class="txt-light" href="javascript:void(0);"><i class="ti-more"></i></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<ul class="chat-list-wrap">
						<li class="chat-list">
							<div class="chat-body">
								{{-- looping 4x dan sesuai dengan urutan upload, dan href anak ini mengarah ke parental_questionnaire_view/id jika ada,
									kalau tidak ada mengarah ke biodata_view --}}
								<a class="" href="#">
									<div class="chat-data">
										<img class="user-img img-circle" src="dist/img/user.png" alt="user"/>
										<div class="user-data">
											<span class="name block capitalize-font">Abigail Bell</span>
											<span class="diagnosa block txt-grey">Autis</span>
										</div>
										<div class="clearfix"></div>
									</div>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection

@section('scripts')
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

<!-- Calender JavaScripts -->
<script src="{{ asset('vendors/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-ui.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('dist/js/fullcalendar-data.js') }}"></script>

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
@endsection