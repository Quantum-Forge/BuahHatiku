@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Daftar Absensi</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li class="active"><span>Daftar Absensi</span></li>
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
						<form action="/daftar_absensi" method="GET">
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Tanggal*</label>
									<div class="input-group date" id="Tanggal">
										<input type="text" name="Tanggal" class="form-control" placeholder="Pilih Tanggal..." value="{{Auth::user()->Role==3? $tanggal: Request::input('Tanggal')}}" @if(Auth::user()->Role==3) readonly @endif>
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div> 
									{{-- <input type="date" name="Tanggal" class="form-control" value="{{Auth::user()->Role==3? $tanggal: Request::input('Tanggal')}}" @if(Auth::user()->Role==3) readonly @endif> --}}
								</div>
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Terapis*</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-user"></i></div>
											<select type="text" name="NoIdentitas" class="form-control" id="Terapis" tabindex="{{Auth::user()->Role==3? -1 : 1}}" @if(Auth::user()->Role==3) readonly @endif>
											<option disabled selected>Choose...</option>
												@foreach( $terapises as $terapis)
													<option value="{{$terapis->NoIdentitas}}" @if(Request::input('NoIdentitas') == $terapis->NoIdentitas || (Auth::user()->Role==3 && Auth::user()->NoIdentitas==$terapis->NoIdentitas)) selected @endif>{{$terapis->Nama}}</option>
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
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Start Time*</label>
									<div class="input-group date" id="WaktuMulai">
										<input type="text" class="form-control" name="WaktuMulai" value="{{Request::input('WaktuMulai')}}">
										<span class="input-group-addon">
											<span class="fa fa-clock-o"></span>
										</span>
									</div>
									{{-- <input type="time" class="form-control" name="WaktuMulai" value="{{Request::input('WaktuMulai')}}"> --}}
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
					<h6 class="panel-title txt-dark">Daftar Absensi</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<form action="/daftar_absensi" method="POST">
							{{csrf_field()}}
							<div class="table-responsive">
								<table id="datable_1" class="table display text-wrap">
									<thead>
										<tr>
											<th>No.</th>
											<th>Tanggal</th>
											<th>Jam</th>
											<th>Terapis</th>
											<th>Nama</th>
											<th>Status</th>
											<th>Keterangan</th>
										</tr>
									</thead>
									{{-- ini looping jadwal rolling, di tambahkan juga status kehadiran, karena uang makan harus dihitung dari absensi awal - akhir --}}
									<tbody>
										@foreach($jadwal_rolling as $jadwal)
										<tr>
											<td>{{$loop->index+1}}</td>
											<td>{{$jadwal->Tanggal}}</td>
											<td>{{$jadwal->WaktuMulai.' - '.$jadwal->WaktuSelesai}}</td>
											<td>{{$jadwal->user->Nama}}</td>
											<td>{{$jadwal->biodata->Nama}}</td>
											<td>
												<div class="checkbox checkbox-success">
													<input type="hidden" name="absensi[]" value="{{$jadwal->absensi->IdAbsensi}}">
													<input type="hidden" name="hadir[{{$jadwal->absensi->IdAbsensi}}]" value="0">
													<input id="status_kehadiran" type="checkbox" name="hadir[{{$jadwal->absensi->IdAbsensi}}]" @if($jadwal->absensi->Hadir == 1) checked @endif value="1">
													<label for="status_kehadiran">
														Hadir
													</label>
												</div>
											</td>
											<td>
												<textarea name="keterangan[{{$jadwal->absensi->IdAbsensi}}]" class="form-control" id="" cols="20" rows="3" placeholder="Isi Keterangan">{{$jadwal->absensi->Alasan}}</textarea>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<button type="submit" class="btn btn-info btn-block mt-10">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Row -->
<input type="hidden" id="WaktuSelesai">
@endsection

@section('scripts')
<!-- jQuery -->
<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

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
<script src="{{ asset('dist/js/form-picker-data.js') }}"></script>

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