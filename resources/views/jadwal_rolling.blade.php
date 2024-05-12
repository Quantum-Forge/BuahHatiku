@extends('layouts.app') @section('title')Buahatiku - Management System @endsection

@section('dashboard')

<!-- Title -->
<div class="row heading-bg bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Jadwal terapis</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li class="active"><span>Jadwal terapis</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<form action="/jadwal_rolling" method="POST" id="jadwal_rolling_form">
{{ csrf_field() }}
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
								<div class="form-body">
									<h6 class="txt-dark capitalize-font"><i class="ti-calendar mr-10"></i>Penjadwalan Tanggal Terapi</h6>
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
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="mb-30">
			<div id="jadwal-container">
				<div id="jadwal-rolling" class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">jadwal terapi</h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div  class="panel-body">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<select name="Hari[]" id="" class="form-control">
												<option value="" disabled selected>Silahkan Pilih Hari...</option>
												<option value="Senin">Senin</option>
												<option value="Selasa">Selasa</option>
												<option value="Rabu">Rabu</option>
												<option value="Kamis">Kamis</option>
												<option value="Jumat">Jumat</option>
												<option value="Sabtu">Sabtu</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group {{ $errors->has('WaktuMulai.0') ? 'has-error' : '' }}">
											<div class="input-group date" id="WaktuStart">
												<div class="input-group-addon">
													<span class="fa fa-clock-o"></span>
												</div>
												<input type="text" class="form-control" data-mask="99:99" placeholder="Isi Waktu Mulai..." name="WaktuMulai[]" value="{{old('WaktuMulai.0')}}">
											</div>
											@error('WaktuMulai.0')
												<span class="help-block">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group {{ $errors->has('WaktuSelesai.0') ? 'has-error' : '' }}">
											<div class='input-group date' id="WaktuSelesai">
												<div class="input-group-addon">
													<span class="fa fa-clock-o"></span>
												</div>
												<input type="text" class="form-control" data-mask="99:99" placeholder="Isi Waktu Selesai..." name="WaktuSelesai[]" value="{{old('WaktuSelesai.0')}}">
											</div>
											@error('WaktuSelesai.0')
												<span class="help-block">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('NoIdentitas.0') ? 'has-error' : '' }}">
											<select class="form-control" name="NoIdentitas[]" data-placeholder="Choose Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
												<option value="" selected disabled>Silahkan Pilih Nama Terapis...</option>
												@foreach( $terapises as $terapis)
													<option value="{{$terapis->NoIdentitas}}" @if(old('NoIdentitas.0') == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama.' ['.$terapis->tipe_absensi->JenisAbsensi.']'}}</option>
												@endforeach
											</select>
											@error('NoIdentitas.0')
												<span class="help-block">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('IdAnak.0') ? 'has-error' : '' }}">
											<select class="form-control" name="IdAnak[]">
												<option value="" selected disabled>Silahkan Pilih Anak...</option>
												@foreach($biodatas as $biodata)
													<option value="{{$biodata->IdAnak}}" @if(old('IdAnak.0') == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
												@endforeach
											</select>
											@error('IdAnak.0')
												<span class="help-block">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer txt-dark font-12">
							<a href="#" class="btn btn-primary btn-sm add-card"><i class="fa fa-plus mr-10"></i>Add</a>
							<a href="#" class="btn btn-danger btn-sm remove-card ml-10" style="display: none;"><i class="fa fa-trash mr-10"></i>Remove</a>
						</div>
					</div>
				</div>
				@if(count(old('Hari')  ?? []) > 1)
					@for($i=1; $i<count(old('Hari')); $i++)
					<div id="jadwal-rolling" class="panel" style="border: 1px solid #3CB878; padding: 2px; display: inline-block;">
						<div class="panel-wrapper collapse in">
							<div  class="panel-body">
								<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<select name="Hari[]" id="" class="form-control">
													<option value="" selected disabled></option>
													<option value="Senin" @if(old('Hari.'.$i) == 'Senin') selected @endif>Senin</option>
													<option value="Selasa" @if(old('Hari.'.$i) == 'Selasa') selected @endif>Selasa</option>
													<option value="Rabu" @if(old('Hari.'.$i) == 'Rabu') selected @endif>Rabu</option>
													<option value="Kamis" @if(old('Hari.'.$i) == 'Kamis') selected @endif>Kamis</option>
													<option value="Jumat" @if(old('Hari.'.$i) == 'Jumat') selected @endif>Jumat</option>
													<option value="Sabtu" @if(old('Hari.'.$i) == 'Sabtu') selected @endif>Sabtu</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-0 {{ $errors->has('WaktuMulai.'.$i) ? 'has-error' : '' }}">
												<div class="input-group date" id="datetimepicker1-0">
													<span class="input-group-addon">
														<span class="fa fa-clock-o"></span>
													</span>
													<input type="text" class="form-control" data-mask="99:99" placeholder="Isi Waktu Mulai..." name="WaktuMulai[]" value="{{old('WaktuMulai.'.$i)}}">
												</div>
												@error('WaktuMulai.'.$i)
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group {{ $errors->has('WaktuSelesai.'.$i) ? 'has-error' : '' }} mb-0">
												<div class='input-group date' id="datetimepicker1-1">
													<span class="input-group-addon">
														<span class="fa fa-clock-o"></span>
													</span>
													<input type="text" class="form-control" data-mask="99:99" placeholder="Isi Waktu Selesai..." name="WaktuSelesai[]" value="{{old('WaktuSelesai.'.$i)}}">
												</div>
												@error('WaktuSelesai.'.$i)
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group {{ $errors->has('NoIdentitas.'.$i) ? 'has-error' : '' }}">
												<select class="form-control" name="NoIdentitas[]" data-placeholder="Choose Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
													<option value="" selected disabled>Choose..</option>
													@foreach( $terapises as $terapis)
														<option value="{{$terapis->NoIdentitas}}" @if(old('NoIdentitas.'.$i) == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama.' ['.$terapis->tipe_absensi->JenisAbsensi.']'}}</option>
													@endforeach
												</select>
												@error('NoIdentitas.'.$i)
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group {{ $errors->has('IdAnak.'.$i) ? 'has-error' : '' }}">
												<select class="form-control" name="IdAnak[]">
													<option value="" selected>Choose..</option>
													@foreach($biodatas as $biodata)
														<option value="{{$biodata->IdAnak}}" @if(old('IdAnak.'.$i) == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
													@endforeach
												</select>
												@error('IdAnak.'.$i)
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-footer txt-dark font-12">
								<a href="#" class="btn btn-primary btn-sm add-card"><i class="fa fa-plus mr-10"></i>Add</a>
								<a href="#" class="btn btn-danger btn-sm remove-card" style="display: none;"><i class="fa fa-trash mr-10"></i>Remove</a>
							</div>
						</div>
					</div>
					@endfor
				@endif
			</div>
			<div class="form-actions mt-30">
				<button type="submit" class="btn btn-success btn-block mr-10">Save</button>
			</div>
		</div>
	</div>
</form>
	<div class="col-md-3">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark"><i class="fa fa-filter mr-10"></i>Filter Penjadwalan</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form action="/jadwal_rolling" method="GET">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group ">
									<label class="control-label mb-10">Tanggal</label>
									<div class="input-group date">
										<input type="text" id="TanggalFilter" name="Tanggal" class="form-control" value="{{Request::input('Tanggal')}}">
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div> 
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label mb-10">Terapis</label>
									<select class="form-control" name="NoIdentitas" data-placeholder="Choose Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
										<option disabled selected>Choose...</option>
												@foreach( $terapises as $terapis)
													<option value="{{$terapis->NoIdentitas}}" @if(Request::input('NoIdentitas') == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama.' ['.$terapis->tipe_absensi->JenisAbsensi.']'}}</option>
												@endforeach
											</select>
									</select>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label mb-10">Anak</label>
									<select class="form-control" name="IdAnak">
										<option disabled selected>Choose...</option>
											@foreach($biodatas as $biodata)
												<option value="{{$biodata->IdAnak}}" @if(Request::input('IdAnak') == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
											@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-actions mt-10">
							<button type="submit" class="btn btn-success btn-block"><i class="fa fa-filter"></i> Filter</button>
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
						<a href="#" class="label label-danger" data-toggle="modal" data-target="#responsive-modal">
							<i class="fa fa-trash mr-5"></i>Hapus (<span id="checkedCount">0</span>)
						</a>
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
								Are you sure to delete <span id="checkedCountModal">0</span> checks?
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
							<table id="jadwal_table" class="table table-hover display pb-30 text-nowrap">
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
											<td>{{$jadwal->Terapis}}</td>
											<td>{{$jadwal->Anak}}</td>
											<td><span class="label label-success">{{$jadwal->JenisAbsensi}}</span></td>
											<td>{{$jadwal->WaktuMulai.' - '.$jadwal->WaktuSelesai}}</td>
											<td>
												<button type="button" class="btn btn-default btn-icon-anim btn-circle btn-sm" onclick="window.location.href='/jadwal_rolling_edit/{{$jadwal->IdJadwal}}';"><i class="fa fa-pencil"></i></button>
												<button type="button" data-toggle="modal" data-target="#responsive-modal{{$jadwal->IdJadwal}}" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
											</td>
										</tr>
										<div id="responsive-modal{{$jadwal->IdJadwal}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
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
<!-- Form Picker Init JavaScript -->
<script src="{{ asset('dist/js/jadwal_rolling_picker.js') }}"></script>
@endsection