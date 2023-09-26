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
	<div class="col-sm-6">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Absensi</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="form-wrap">
								{{-- ini hanya filtering doang --}}
								<form class="form-horizontal" action="/daftar_absensi" method="POST">
									{{ csrf_field() }}
									<div class="form-group">
										<label for="Jenis" class="col-sm-3 control-label">Tanggal*</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
												<input type="date" name="Tanggal" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="Jenis" class="col-sm-3 control-label">Terapis*</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-user"></i></div>
												<select type="text" name="NoIdentitas" class="form-control" id="Terapis">
													@foreach( $terapises as $terapis)
														<option value="{{$terapis->NoIdentitas}}">{{$terapis->Nama}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="Jenis" class="col-sm-3 control-label">Anak*</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-user"></i></div>
												<select type="text" name="IdAnak" class="form-control" id="Terapis">
													@foreach($biodatas as $biodata)
														<option value="{{$biodata->IdAnak}}">{{$biodata->Nama}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label  for="Pertanyaan" class="col-sm-3 control-label">Tipe Absensi*</label>
										<div class="col-sm-9">
											<select type="text" name="IdTipe" class="form-control" id="Terapis">
												<option disabled selected>Choose...</option>
												@foreach($tipe_absensies as $tipe_absensi)
													<option value="{{$tipe_absensi->IdTipe}}">{{$tipe_absensi->JenisAbsensi}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group mb-0">
										<div class="col-sm-12">
											<button type="submit" class="btn btn-info btn-block"><i class="fa fa-filter"></i> Filter</button>
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
	<div class="col-sm-6">
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
						<div class="table-responsive">
							<table id="datable_1" class="table table-sm table-hover display text-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								{{-- ini looping jadwal rolling, di tambahkan juga status kehadiran, karena uang makan harus dihitung dari absensi awal - akhir --}}
								<tbody>
									@foreach($absensies as $absensi)
									<tr>
										<td>{{$loop->index+1}}</td>
										<td>{{$absensi->biodata->Nama}}</td>
										<td>
											<div class="checkbox checkbox-success">
												<input id="status_kehadiran" type="checkbox" onchange="window.location.href='/absensi_hadir/{{$absensi->IdAbsensi}}';" @if($absensi->Hadir ==  1) checked @else '' @endif>
												<label for="status_kehadiran">
													Hadir
												</label>
											</div>
										</td>
									</tr>
									@endforeach
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

@endsection