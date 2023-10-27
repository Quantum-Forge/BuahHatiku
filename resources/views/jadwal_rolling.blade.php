@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg bg-red">
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
							<form action="/jadwal_rolling" method="POST" id="jadwal_rolling_form">
								{{ csrf_field() }}
								<div class="form-body">
									<h6 class="txt-dark capitalize-font"><i class="ti-calendar mr-10"></i>Penjadwalan Terapis</h6>
									<hr>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group {{ $errors->has('Tanggal') ? 'has-error' : '' }}">
												<div class="input-group date">
													<input type="text" id="Tanggal" name="Tanggal" class="form-control" value="{{old('Tanggal')}}">
													<span class="input-group-addon">
														<span class="fa fa-calendar"></span>
													</span>
												</div> 
												@error('Tanggal')
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="col-md-12">
											<div class="table-wrap mt-10 mb-30">
												<div class="">
													<table id="rolling" class="table table-wrap table-bordered mb-0">
														<thead>
														  <tr>
															<th>Hari</th>
															<th>Waktu Mulai</th>
															<th>Waktu Selesai</th>
															<th>Terapis</th>
															<th>Anak</th>
															<th>Aksi</th>
														  </tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<div class="form-group mb-0">
																		<select name="Hari[]" id="" class="form-control">
																			<option value="Senin">Senin</option>
																			<option value="Selasa">Selasa</option>
																			<option value="Rabu">Rabu</option>
																			<option value="Kamis">Kamis</option>
																			<option value="Jumat">Jumat</option>
																			<option value="Sabtu">Sabtu</option>
																		</select>
																	</div>
																</td>
																<td>
																	<div class="form-group mb-0 {{ $errors->has('WaktuMulai.0') ? 'has-error' : '' }}">
																		<div class="input-group date" id="WaktuStart">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control" placeholder="Isi Waktu Mulai..." name="WaktuMulai[]" value="{{old('WaktuMulai.0')}}">
																		</div>
																		@error('WaktuMulai.0')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group {{ $errors->has('WaktuSelesai.0') ? 'has-error' : '' }} mb-0">
																		<div class='input-group date' id="WaktuSelesai">
																			<span class="input-group-addon">
																				<span class="fa fa-clock-o"></span>
																			</span>
																			<input type="text" class="form-control" placeholder="Isi Waktu Selesai..." name="WaktuSelesai[]" value="{{old('WaktuSelesai.0')}}">
																		</div>
																		@error('WaktuSelesai.0')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group mb-0 {{ $errors->has('NoIdentitas') ? 'has-error' : '' }}">
																		<select class="form-control" name="NoIdentitas[]" data-placeholder="Choose Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
																			<option disabled selected>Choose..</option>
																			@foreach( $terapises as $terapis)
																				<option value="{{$terapis->NoIdentitas}}" @if(old('NoIdentitas') == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama}}</option>
																			@endforeach
																		</select>
																		@error('NoIdentitas')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td>
																	<div class="form-group mb-0 {{ $errors->has('IdAnak') ? 'has-error' : '' }}">
																		<select class="form-control" name="IdAnak[]">
																			<option disabled selected>Choose..</option>
																			@foreach($biodatas as $biodata)
																				<option value="{{$biodata->IdAnak}}" @if(old('IdAnak') == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
																			@endforeach
																		</select>
																		@error('IdAnak')
																			<span class="help-block">{{ $message }}</span>
																		@enderror
																	</div>
																</td>
																<td class="text-center vertical-align-middle">
																	<a href="#" id="addrow" class="text-primary"><i class="fa fa-plus"></i></a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="form-actions mt-10">
													<button type="button" class="btn btn-success btn-block mr-10" onclick="submitForm()">Save</button>
												</div>
												@error('Hari')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
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
	<div class="col-md-3">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Remove Penjadwalan</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form action="/jadwal_rolling_delete" method="POST">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-12">
								<div class="form-group {{ $errors->has('TanggalDelete') ? 'has-error' : '' }}">
									<label class="control-label mb-10">Tanggal Berhenti</label>
									<div class="input-group date">
										<input type="text" id="TanggalDelete" name="TanggalDelete" class="form-control" value="{{old('TanggalDelete')}}">
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div> 
									@error('TanggalDelete')
										<span class="help-block">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group {{ $errors->has('NoIdentitasDelete') ? 'has-error' : '' }}">
									<label class="control-label mb-10">Terapis</label>
									<select class="form-control" name="NoIdentitasDelete" data-placeholder="Choose Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
										<option disabled selected>Choose..</option>
										@foreach( $terapises as $terapis)
											<option value="{{$terapis->NoIdentitas}}" @if(old('NoIdentitasDelete') == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama}}</option>
										@endforeach
									</select>
									@error('NoIdentitasDelete')
										<span class="help-block">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group {{ $errors->has('IdAnakDelete') ? 'has-error' : '' }}">
									<label class="control-label mb-10">Anak</label>
									<select class="form-control" name="IdAnakDelete">
										<option disabled selected>Choose..</option>
										@foreach($biodatas as $biodata)
											<option value="{{$biodata->IdAnak}}" @if(old('IdAnakDelete') == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
										@endforeach
									</select>
									@error('IdAnakDelete')
										<span class="help-block">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group {{ $errors->has('IdTipeDelete') ? 'has-error' : '' }}">
									<label class="control-label mb-10">Tipe Absensi</label>
									<select class="form-control" name="IdTipeDelete">
										<option disabled selected>Choose..</option>
										@foreach($tipe_absensies as $tipe_absensi)
											<option value="{{$tipe_absensi->IdTipe}}" @if(old('IdTipeDelete') == $tipe_absensi->IdTipe) selected @endif>{{$tipe_absensi->JenisAbsensi}}</option>
										@endforeach
									</select>
									@error('IdTipeDelete')
										<span class="help-block">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="form-actions mt-10">
							<button type="submit" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Delete</button>
						</div>		
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default card-view">
			<form action="/jadwal_rolling_delete_bulk" method="POST">
				{{csrf_field()}}
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Data Penjadwalan</h6>
					</div>
					<div class="pull-right">
						<a href="#" class="label label-danger" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-trash mr-5"></i>Remove</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h5 class="modal-title">Delete Schedule</h5>
							</div>
							<div class="modal-body">
								Are you sure to delete this Checks ?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
								<button type="submit" class="btn btn-danger">Yes</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="table-responsive">
							<table id="jadwal_table" class="table table-hover display pb-30" >
								<thead>
									<tr>
										<th>
											<div class="checkbox penjadwalan checkbox-success" style="padding-left: 25px !important;">
												<input id="checkAllPenjadwalan" type="checkbox">
												<label for="checkAllPenjadwalan" class="pl-0"></label>
											</div>
										</th>
										<th>Tanggal Penjadwalan</th>
										<th>Terapis</th>
										<th>Anak</th>
										<th>Tipe Absensi</th>
										<th>Waktu</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($jadwal_rolling as $jadwal)
										<tr>
											<td>
												<div class="checkbox penjadwalan checkbox-success" style="padding-left: 25px !important;">
													<input id="penjadwalan{{$loop->index+1}}" type="checkbox" name="Delete[]" value="{{$jadwal->IdJadwal}}">
													<label for="penjadwalan{{$loop->index+1}}" class="pl-0"></label>
												</div>
											</td>
											<td>{{$jadwal->Hari.', '.$jadwal->Tanggal}}</td>
											<td>{{$jadwal->user->Nama}}</td>
											<td>{{$jadwal->biodata->Nama}}</td>
											<td>{{$jadwal->tipe_absensi->JenisAbsensi}}</td>
											<td>{{$jadwal->WaktuMulai.' - '.$jadwal->WaktuSelesai}}</td>
											<td>
												<button type="button" class="btn btn-default btn-icon-anim btn-circle btn-sm" onclick="window.location.href='/jadwal_rolling_edit/{{$jadwal->IdJadwal}}';"><i class="fa fa-pencil"></i></button>
												<button type="button" data-toggle="modal" data-target="#responsive-modal{{$jadwal->IdJadwal}}" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
											</td>
										</tr>
										<div id="responsive-modal{{$jadwal->IdJadwal}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<!-- <form action="/jadwal_rolling_delete/{{$jadwal->IdJadwal}}" method="POST">
													{{csrf_field()}} -->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title">Delete Schedule</h5>
														</div>
														<div class="modal-body">
															Are you sure to delete this Schedule ?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
															<button type="button" class="btn btn-danger" onclick="window.location.href='/jadwal_rolling_delete/{{$jadwal->IdJadwal}}';">Yes</button>
														</div>
													</div>
												<!-- </form> -->
											</div>
										</div>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</form>
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

<!-- Bootstrap-table JavaScript -->
	<script src="vendors/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
	<script src="dist/js/bootstrap-table-data.js"></script>

<!-- Data table JavaScript -->
<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>

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
@endsection