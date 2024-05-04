@extends('layouts.app') @section('title')Buahatiku - Management System @endsection

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Jadwal Terapis</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li class="active"><span>Jadwal Terapis</span></li>
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
							<form action="/jadwal_rolling_edit" id="jadwal_rolling_edit" method="POST">
								{{ csrf_field() }}
								<div class="form-body">
									<input type="hidden" name="IdJadwal" value="{{$jadwal_rolling->IdJadwal}}">
									<h6 class="txt-dark capitalize-font"><i class="ti-calendar mr-10"></i>Penjadwalan Terapis</h6>
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group {{ $errors->has('Tanggal') ? 'has-error' : '' }}">
												<label class="control-label mb-10">Tanggal Penjadwalan</label>
												<div class="input-group date">
													<input type="text" name="Tanggal" id="Tanggal" class="form-control" value="{{old('Tanggal', $jadwal_rolling->Tanggal)}}">
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
													<option value="{{$terapis->NoIdentitas}}" @if(old('NoIdentitas', $jadwal_rolling->user->NoIdentitas) == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama}}</option>
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
														<option value="{{$biodata->IdAnak}}" @if(old('IdAnak', $jadwal_rolling->biodata->IdAnak) == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
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
													<option value="{{$tipe_absensi->IdTipe}}" @if(old('IdTipe', $jadwal_rolling->IdTipe) == $tipe_absensi->IdTipe) selected @endif>{{$tipe_absensi->JenisAbsensi}}</option>
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
															<input type="text" class="form-control" name="WaktuMulai" value="{{old('WaktuMulai', $jadwal_rolling->WaktuMulai)}}">
														</div>
														@error('WaktuMulai')
															<span class="help-block">{{ $message }}</span>
														@enderror
													</div>
													<div class="col-sm-6">
														<div class="form-group {{ $errors->has('WaktuSelesai') ? 'has-error' : '' }}">
															<div class='input-group date' id="WaktuSelesai">
																<input type="text" class="form-control"  name="WaktuSelesai" value="{{old('WaktuSelesai', $jadwal_rolling->WaktuSelesai)}}">
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
<!-- Form Picker Init JavaScript -->
<script src="{{ asset('dist/js/jadwal_rolling-edit.js') }}"></script>
@endsection