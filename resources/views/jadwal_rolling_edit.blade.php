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
						<div class="col-sm-6">
							<form action="/jadwal_rolling_edit" method="POST">
								{{ csrf_field() }}
								<div class="form-body">
									<input type="hidden" name="IdJadwal" value="{{$jadwal_rolling->IdJadwal}}">
									<h6 class="txt-dark capitalize-font"><i class="ti-calendar mr-10"></i>Penjadwalan Terapis</h6>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="mt-10 mb-30">
												<div class="table-responsive">
													<table class="table table-bordered mb-0">
														<thead>
														  <tr>
															<th>
																<div class="checkbox checkbox-success" style="padding-left: 25px !important;">
																	<input id="checkAll" type="checkbox">
																	<label for="checkAll" class="pl-0"></label>
																</div>
															</th>
															<th>Hari</th>
															<th>Start Time</th>
															<th>End Date</th>
														  </tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<div class="checkbox checkbox-success" style="padding-left: 25px !important;">
																		<input id="checkbox3" type="checkbox">
																		<label for="checkbox3" class="pl-0">
																		</label>
																	</div>
																</td>
																<td>Senin</td>
																<td>
																	<div class="form-group mb-0 {{ $errors->has('WaktuMulai') ? 'has-error' : '' }}"></div>
																	<div class="input-group date" id="SeninStart">
																		<span class="input-group-addon">
																			<span class="fa fa-clock-o"></span>
																		</span>
																		<input type="text" class="form-control" name="WaktuMulai" value="{{old('WaktuMulai')}}">
																		@error('WaktuMulai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuSelesai') ? 'has-error' : '' }} mb-0">
																		<div class='input-group date' id="SeninSelesai">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control"  name="WaktuSelesai" value="{{old('WaktuSelesai')}}">
																		</div>
																		@error('WaktuSelesai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="checkbox checkbox-success" style="padding-left: 25px !important;">
																		<input id="checkbox3" type="checkbox">
																		<label for="checkbox3" class="pl-0">
																		</label>
																	</div>
																</td>
																<td>Selasa</td>
																<td>
																	<div class="form-group mb-0 {{ $errors->has('WaktuMulai') ? 'has-error' : '' }}">

																	</div>
																	<div class="input-group date" id="SelasaStart">
																		<span class="input-group-addon">
																			<span class="fa fa-clock-o"></span>
																		</span>
																		<input type="text" class="form-control" name="WaktuMulai" value="{{old('WaktuMulai')}}">	
																		@error('WaktuMulai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuSelesai') ? 'has-error' : '' }} mb-0">
																		<div class='input-group date' id="SelasaSelesai">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control"  name="WaktuSelesai" value="{{old('WaktuSelesai')}}">
																		</div>
																		@error('WaktuSelesai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="checkbox checkbox-success" style="padding-left: 25px !important;">
																		<input id="checkbox3" type="checkbox">
																		<label for="checkbox3" class="pl-0">
																		</label>
																	</div>
																</td>
																<td>Rabu</td>
																<td>
																	<div class="form-group mb-0 {{ $errors->has('WaktuMulai') ? 'has-error' : '' }}">
																		<div class="input-group date" id="KamisStart">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control" name="WaktuMulai" value="{{old('WaktuMulai')}}">
																		</div>
																		@error('WaktuMulai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuSelesai') ? 'has-error' : '' }} mb-0">
																		<div class='input-group date' id="KamisSelesai">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control"  name="WaktuSelesai" value="{{old('WaktuSelesai')}}">
																		</div>
																		@error('WaktuSelesai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="checkbox checkbox-success" style="padding-left: 25px !important;">
																		<input id="checkbox3" type="checkbox">
																		<label for="checkbox3" class="pl-0">
																		</label>
																	</div>
																</td>
																<td>Kamis</td>
																<td>
																	<div class="form-group mb-0 {{ $errors->has('WaktuMulai') ? 'has-error' : '' }}">
																		<div class="input-group date" id="KamisStart">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control" name="WaktuMulai" value="{{old('WaktuMulai')}}">
																		</div>
																		@error('WaktuMulai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuSelesai') ? 'has-error' : '' }} mb-0">
																		<div class='input-group date' id="KamisSelesai">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control"  name="WaktuSelesai" value="{{old('WaktuSelesai')}}">
																		</div>
																		@error('WaktuSelesai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="checkbox checkbox-success" style="padding-left: 25px !important;">
																		<input id="checkbox3" type="checkbox">
																		<label for="checkbox3" class="pl-0">
																		</label>
																	</div>
																</td>
																<td>Jumat</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuMulai') ? 'has-error' : '' }} mb-0">
																		<div class="input-group date" id="JumatStart">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control" name="WaktuMulai" value="{{old('WaktuMulai')}}">
																		</div>
																		@error('WaktuMulai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuSelesai') ? 'has-error' : '' }} mb-0">
																		<div class='input-group date' id="JumatSelesai">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control"  name="WaktuSelesai" value="{{old('WaktuSelesai')}}">
																		</div>
																		@error('WaktuSelesai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="checkbox checkbox-success" style="padding-left: 25px !important;">
																		<input id="checkbox3" type="checkbox">
																		<label for="checkbox3" class="pl-0">
																		</label>
																	</div>
																</td>
																<td>Sabtu</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuMulai') ? 'has-error' : '' }} mb-0">
																		<div class="input-group date" id="SabtuStart">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control" name="WaktuMulai" value="{{old('WaktuMulai')}}">
																		</div>
																		@error('WaktuMulai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuSelesai') ? 'has-error' : '' }} mb-0">
																		<div class='input-group date' id="SabtuSelesai">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control"  name="WaktuSelesai" value="{{old('WaktuSelesai')}}">
																		</div>
																		@error('WaktuSelesai')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group {{ $errors->has('Tanggal') ? 'has-error' : '' }}">
														<label class="control-label mb-10">Tanggal Penjadwalan</label>
														<div class="input-group date">
															<input type="text" id="Tanggal" name="Tanggal" class="form-control" value="{{old('Tanggal', $jadwal_rolling->Tanggal)}}">
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
												<div class="col-md-12">
													<div class="form-group {{ $errors->has('NoIdentitas') ? 'has-error' : '' }}">
														<label class="control-label mb-10">Terapis</label>
														<select class="form-control" name="NoIdentitas" data-placeholder="Choose Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
															<option disabled selected>Choose..</option>
															@foreach( $terapises as $terapis)
																<option value="{{$terapis->NoIdentitas}}" @if(old('NoIdentitas', $jadwal_rolling->user->NoIdentitas) == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama}}</option>
															@endforeach
														</select>
														@error('NoIdentitas')
															<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<!--/span-->
												<div class="col-md-12">
													<div class="form-group {{ $errors->has('IdAnak') ? 'has-error' : '' }}">
														<label class="control-label mb-10">Anak</label>
														<select class="form-control" name="IdAnak">
															<option disabled selected>Choose..</option>
															@foreach($biodatas as $biodata)
																<option value="{{$biodata->IdAnak}}" @if(old('IdAnak', $jadwal_rolling->biodata->IdAnak) == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
															@endforeach
														</select>
														@error('IdAnak')
															<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group {{ $errors->has('IdTipe') ? 'has-error' : '' }}">
														<label class="control-label mb-10">Tipe Absensi</label>
														<select class="form-control" name="IdTipe">
															<option disabled selected>Choose..</option>
															@foreach($tipe_absensies as $tipe_absensi)
																<option value="{{$tipe_absensi->IdTipe}}" @if(old('IdTipe', $jadwal_rolling->IdTipe) == $tipe_absensi->IdTipe) selected @endif>{{$tipe_absensi->JenisAbsensi}}</option>
															@endforeach
														</select>
														@error('IdTipe')
															<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
												</div>
											</div>
											<div class="form-actions mt-10">
												<button type="submit" class="btn btn-success btn-block mr-10">Save</button>
											</div>
										</div>
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