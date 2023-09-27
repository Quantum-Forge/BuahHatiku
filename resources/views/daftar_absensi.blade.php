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
						<form action="/daftar_absensi" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Tanggal*</label>
									<input type="date" name="Tanggal" class="form-control">
								</div>
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Terapis*</label>
									<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-user"></i></div>
											<select type="text" name="NoIdentitas" class="form-control" id="Terapis">
											<option disabled selected>Choose...</option>
												@foreach( $terapises as $terapis)
													<option value="{{$terapis->NoIdentitas}}">{{$terapis->Nama}}</option>
												@endforeach
											</select>
										</div>
								</div>
								<div class="form-group">
									<label for="Jenis" class="control-label mb-10">Anak*</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-user"></i></div>
										<select type="text" name="IdAnak" class="form-control" id="Terapis">
											<option disabled selected>Choose...</option>
											@foreach($biodatas as $biodata)
												<option value="{{$biodata->IdAnak}}">{{$biodata->Nama}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label  for="Pertanyaan" class="control-label mb-10">Tipe Absensi*</label>
									<select type="text" name="IdTipe" class="form-control" id="Terapis">
										<option disabled selected>Choose...</option>
										@foreach($tipe_absensies as $tipe_absensi)
											<option value="{{$tipe_absensi->IdTipe}}">{{$tipe_absensi->JenisAbsensi}}</option>
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
					<h6 class="panel-title txt-dark">Daftar Absensi</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="" class="table display text-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Tanggal</th>
										<th>Terapis</th>
										<th>Nama</th>
										<th>Status</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								{{-- ini looping jadwal rolling, di tambahkan juga status kehadiran, karena uang makan harus dihitung dari absensi awal - akhir --}}
								<tbody>
									{{-- @foreach($absensies as $absensi)
									<tr>
										<td>{{$loop->index+1}}</td>
										<td>dd/mm/yyyy</td>
										<td>Terapis</td>
										<td>{{$absensi->biodata->Nama}}</td>
										<td>
											<div class="checkbox checkbox-success">
												<input id="status_kehadiran" type="checkbox" onchange="window.location.href='/absensi_hadir/{{$absensi->IdAbsensi}}';" @if($absensi->Hadir ==  1) checked @else '' @endif>
												<label for="status_kehadiran">
													Hadir
												</label>
											</div>
										</td>
										<td>
											<textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
										</td>
									</tr>
									@endforeach --}}
									<tr>
										<td>1</td>
										<td>dd/mm/yyyy</td>
										<td>Terapis</td>
										<td>Anak</td>
										<td>
											<div class="checkbox checkbox-success">
												<input id="status_kehadiran" type="checkbox">
												<label for="status_kehadiran">
													Hadir
												</label>
											</div>
										</td>
										<td>
											<textarea name="" class="form-control" id="" cols="20" rows="3" placeholder="Isi Keterangan"></textarea>
										</td>
									</tr>
								</tbody>
							</table>
							<button type="submit" class="btn btn-info btn-block">Submit</button>
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