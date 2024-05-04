@extends('layouts.app') @section('title')Buahatiku - Management System @endsection

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
	<div class="col-sm-12">
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
											<td>{{$jadwal->Terapis.'['.$jadwal->JenisAbsensi.']'}}</td>
											<td>{{$jadwal->Anak}}</td>
											<td>
												<div class="checkbox checkbox-success">
													<input type="hidden" name="absensi[]" value="{{$jadwal->IdAbsensi}}">
													<input type="hidden" name="hadir[{{$jadwal->IdAbsensi}}]" value="0">
													<input id="status_kehadiran" type="checkbox" name="hadir[{{$jadwal->IdAbsensi}}]" @if($jadwal->Hadir == 1) checked @endif value="1">
													<label for="status_kehadiran">
														Hadir
													</label>
												</div>
											</td>
											<td>
												<textarea name="keterangan[{{$jadwal->IdAbsensi}}]" class="form-control" id="" cols="20" rows="3" placeholder="Isi Keterangan">{{$jadwal->Alasan}}</textarea>
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

