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
							<form action="/jadwal_rolling" method="POST">
								{{ csrf_field() }}
								<div class="form-body">
									<h6 class="txt-dark capitalize-font"><i class="ti-calendar mr-10"></i>Scheduling</h6>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10">Tanggal Penjadwalan</label>
												<div class="input-group" id="">
													<input type="date" name="Tanggal" id="date-input" class="form-control">
													<span class="input-group-addon">
														<span class="fa fa-calendar"></span>
													</span>
												</div> 
												@error('Tanggal')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10">Terapis</label>
												<select class="form-control" name="NoIdentitas" data-placeholder="Choose Terapis" tabindex="1">
													<option disabled selected>Choose..</option>
													@foreach( $terapises as $terapis)
														<option value="{{$terapis->NoIdentitas}}">{{$terapis->Nama}}</option>
													@endforeach
												</select>
												@error('NoIdentitas')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<!--/span-->
									</div>
									<!-- /Row -->
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label mb-10">Anak</label>
												<select class="form-control" name="IdAnak">
													<option disabled selected>Choose..</option>
													@foreach($biodatas as $biodata)
														<option value="{{$biodata->IdAnak}}">{{$biodata->Nama}}</option>
													@endforeach
												</select>
												@error('IdAnak')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label mb-10">Tipe Absensi</label>
												<select class="form-control" name="IdTipe">
													<option disabled selected>Choose..</option>
													@foreach($tipe_absensies as $tipe_absensi)
														<option value="{{$tipe_absensi->IdTipe}}">{{$tipe_absensi->JenisAbsensi}}</option>
													@endforeach
												</select>
												@error('IdTipe')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10 text-left">Time Range Pick</label>
												<div class="row">
													<div class="col-sm-6">
														<div class='input-group'>
															<span class="input-group-addon">
																<span class="fa fa-clock-o mr-5"></span>
																Start
															</span>
															<input type='time' name="WaktuMulai" id="start-time" class="form-control" />
														</div>
														@error('WaktuMulai')
															<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
													<div class="col-sm-6">
														<div class='input-group'>
															<input type='time' name="WaktuSelesai" id="end-time" class="form-control" />
															<span class="input-group-addon">
																<span class="fa fa-clock-o mr-5"></span>
																 End
															</span>
														</div>
														@error('WaktuSelesai')
															<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
												</div>
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
   
   <!-- Data table JavaScript -->
   <script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
   
   <!-- Slimscroll JavaScript -->
   <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
   
   <!-- Fancy Dropdown JS -->
   <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
   
   <!-- Init JavaScript -->
   <script src="{{ asset('dist/js/init.js') }}"></script>
<script>
	$(document).ready(function() {
		// Mendengarkan perubahan pada input tanggal
		$("#date-input, #start-time, #end-time").on("change", function() {
			validateTime();
		});
	
		// Fungsi untuk melakukan validasi
		function validateTime() {
			var selectedDate = new Date($("#date-input").val());
			var today = new Date();
	
			if (selectedDate.toDateString() === today.toDateString()) {
				var startTime = $("#start-time").val();
				var endTime = $("#end-time").val();
	
				if (startTime && endTime && startTime > endTime) {
					alert("End Time tidak boleh lebih awal daripada Start Time");
					// Mengosongkan input End Time atau melakukan tindakan lain yang sesuai
					$("#end-time").val("");
				}
			}
		}
	});
</script>
@endsection