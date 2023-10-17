@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Jadwal Rolling</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li class="active"><span>Jadwal rolling</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<form action="/jadwal_rolling" method="POST">
								{{ csrf_field() }}
								<div class="form-body">
									<h6 class="txt-dark capitalize-font"><i class="ti-calendar mr-10"></i>Penjadwalan Terapis</h6>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group {{ $errors->has('Tanggal') ? 'has-error' : '' }}">
												<label class="control-label mb-10">Tanggal Penjadwalan</label>
												<div class="input-group date" id="Tanggal">
													<input type="text" name="Tanggal" class="form-control" value="{{old('Tanggal')}}">
													<span class="input-group-addon">
														<span class="fa fa-calendar"></span>
													</span>
												</div> 
												@error('Tanggal')
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group {{ $errors->has('NoIdentitas') ? 'has-error' : '' }}">
												<label class="control-label mb-10">Terapis</label>
												<select class="form-control" name="NoIdentitas" data-placeholder="Choose Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
													<option disabled selected>Choose..</option>
													@foreach( $terapises as $terapis)
														<option value="{{$terapis->NoIdentitas}}" @if(old('NoIdentitas') == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama}}</option>
													@endforeach
												</select>
												@error('NoIdentitas')
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<!--/span-->
									</div>
									<!-- /Row -->
									<div class="row">
										<div class="col-md-3">
											<div class="form-group {{ $errors->has('IdAnak') ? 'has-error' : '' }}">
												<label class="control-label mb-10">Anak</label>
												<select class="form-control" name="IdAnak">
													<option disabled selected>Choose..</option>
													@foreach($biodatas as $biodata)
														<option value="{{$biodata->IdAnak}}" @if(old('IdAnak') == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
													@endforeach
												</select>
												@error('IdAnak')
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group {{ $errors->has('IdTipe') ? 'has-error' : '' }}">
												<label class="control-label mb-10">Tipe Absensi</label>
												<select class="form-control" name="IdTipe">
													<option disabled selected>Choose..</option>
													@foreach($tipe_absensies as $tipe_absensi)
														<option value="{{$tipe_absensi->IdTipe}}" @if(old('IdTipe') == $tipe_absensi->IdTipe) selected @endif>{{$tipe_absensi->JenisAbsensi}}</option>
													@endforeach
												</select>
												@error('IdTipe')
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group {{ $errors->has('WaktuMulai') ? 'has-error' : '' }}">
												<label class="control-label mb-10 text-left">Time Range Pick</label>
												<div class="row">
													<div class="col-sm-6">
														<div class="input-group date" id="WaktuMulai">
															<span class="input-group-addon">
																<span class="fa fa-clock-o mr-5"></span>
																Start
															</span>
															<input type="text" class="form-control" name="WaktuMulai" value="{{old('WaktuMulai')}}">
															{{-- <input type='time' name="WaktuMulai" id="start-time" class="form-control" value="{{old('WaktuMulai')}}"/> --}}
														</div>
														@error('WaktuMulai')
															<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
													<div class="col-sm-6">
														<div class="form-group {{ $errors->has('WaktuSelesai') ? 'has-error' : '' }}">
															<div class='input-group date' id="WaktuSelesai">
																<input type="text" class="form-control"  name="WaktuSelesai" value="{{old('WaktuSelesai')}}">
																{{-- <input type='time' name="WaktuSelesai" id="end-time" class="form-control" value="{{old('WaktuSelesai')}}"/> --}}
																<span class="input-group-addon">
																	<span class="fa fa-clock-o mr-5"></span>
																	 End
																</span>
															</div>
															@error('WaktuSelesai')
																<span class="help-block">{{ $message }}</span>
															@enderror
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									@error('message')
										<span class="help-block">{{ $message }}</span>
									@enderror
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
<script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

<!-- Moment JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
		
<!-- Bootstrap Colorpicker JavaScript -->
<script src="{{ asset('vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
		
<!-- Bootstrap Datetimepicker JavaScript -->
<script type="text/javascript" src="{{ asset('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Bootstrap Daterangepicker JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- Form Picker Init JavaScript -->
<script src="{{ asset('dist/js/jadwal_rolling_picker.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
<!-- Bootstrap Dropify JavaScript -->
<script src="{{ asset('vendors/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
<!-- Form Flie Upload Data JavaScript -->
<script src="{{ asset('dist/js/form-file-upload-data.js') }}"></script>

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