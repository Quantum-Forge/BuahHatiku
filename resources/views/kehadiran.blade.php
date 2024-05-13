@extends('layouts.app') @section('title')Buahatiku - Management System @endsection

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">kehadiran</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li class="active"><span>daftar kehadiran</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->

</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
<div class="col-sm-3">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title">Absensi</h6>
				</div>
				<div class="pull-right">
					<a data-toggle="collapse" href="#filtering_absen" aria-expanded="true" class="">
						<i class="fa fa-angle-down fa-fw"></i>
						<i class="fa fa-angle-up fa-fw"></i>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div id="filtering_absen" class="panel-wrapper collapse in" aria-expanded="true">
				<div class="panel-body">
					<div class="form-wrap">
						<form action="/kehadiran" method="GET">
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Tanggal*</label>
									<div class="input-group date">
										<input type="text" name="Tanggal" id="Tanggal" class="form-control" placeholder="Pilih Tanggal..." value="{{Request::input('Tanggal')}}">
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
								</div>
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Terapis*</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-user"></i></div>
											<select type="text" name="NoIdentitas" class="form-control" id="Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
											<option disabled>Choose...</option>
												@foreach( $terapises as $terapis)
													<option value="{{$terapis->NoIdentitas}}" @if(Request::input('NoIdentitas') == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama.'['.$terapis->tipe_absensi->JenisAbsensi.']'}}</option>
												@endforeach
											</select>
										</div>
								</div>
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Anak*</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-user"></i></div>
										<select type="text" name="IdAnak" class="form-control" id="Anak">
											<option disabled selected>Choose...</option>
											@foreach($biodatas as $biodata)
												<option value="{{$biodata->IdAnak}}" @if(Request::input('IdAnak') == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label  for="Pertanyaan" class="control-label mb-10">Tipe Absensi*</label>
									<select type="text" name="IdTipe" class="form-control" id="Terapis">
										<option disabled selected>Choose...</option>
										@foreach($tipe_absensies as $tipe_absensi)
											<option value="{{$tipe_absensi->IdTipe}}" @if(Request::input('IdTipe') == $tipe_absensi->IdTipe) selected @endif>{{$tipe_absensi->JenisAbsensi}}</option>
										@endforeach
									</select>
								</div>
								<button type="submit" class="btn btn-info btn-block"><i class="fa fa-filter"></i> Filter</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Daftar Kehadiran</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-responsive">
						<table id="datable_1" class="table table-sm table-hover display text-wrap">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal</th>
									<th>Jam</th>
									<th>Terapis</th>
									<th>Nama</th>
									<th>Jenis Absensi</th>
									<th>Status</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								@if($jadwal_rolling)
								@foreach($jadwal_rolling as $jadwal)
									<tr>
										<td>{{$loop->index+1}}</td>
										<td>{{$jadwal->Tanggal}}</td>
										<td>{{$jadwal->WaktuMulai.' - '.$jadwal->WaktuSelesai}}</td>
										<td>{{$jadwal->Terapis}}</td>
										<td>{{$jadwal->Anak}}</td>
										<td>{{$jadwal->JenisAbsensi}}</td>
										<td><span class="label {{$jadwal->Hadir == 1 ? 'label-success' : 'label-danger'}}">{{$jadwal->Hadir == 1 ? 'Hadir' : 'Tidak Hadir'}}</span></td>
										<td>{{$jadwal->Alasan}}</td>
									</tr>
								@endforeach
								@endif
							</tbody>
						</table>
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
<script src="{{ asset('dist/js/daftar_absensi_picker.js') }}"></script>
@endsection