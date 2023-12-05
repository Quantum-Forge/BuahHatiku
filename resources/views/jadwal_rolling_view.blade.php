@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg bg-red">
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
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Penjadwalan</h6>
				</div>
				<div class="pull-right">
					<div id="legend">
						<span class="label label-primary">ABA</span>
						<span class="label label-danger">OT</span>
						<span class="label label-warning">TW</span>
					  </div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div  class="tab-struct custom-tab-1">
						<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
							<li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="senin_tab" href="#senin">senin</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="selasa_tab" role="tab" href="#selasa" aria-expanded="false">selasa</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="rabu_tab" role="tab" href="#rabu" aria-expanded="false">rabu</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="kamis_tab" role="tab" href="#kamis" aria-expanded="false">kamis</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="jumat_tab" role="tab" href="#jumat" aria-expanded="false">jumat</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="sabtu_tab" role="tab" href="#sabtu" aria-expanded="false">sabtu</a></li>
						</ul>
						<div class="tab-content" id="myTabContent_7">
							<div  id="senin" class="tab-pane fade active in" role="tabpanel">
								<div class="text-nowrap">
									<div class="table-responsive" style="zoom: 50%">
										<table class="table table-sm table-bordered display pb-30">
											<thead>
												<tr>
													<th rowspan="2">Jam / Hari</th>
													<th class="text-center" colspan="{{ count($data[0]->first()) }}">
														Senin
													</th>
												</tr>
												<tr>
													@foreach($data[0]->first() as $header)
														@if($header->JenisAbsensi=="ABA") <th class="bg-primary txt-light">
														@elseif($header->JenisAbsensi=="TW") <th class="bg-yellow txt-dark">
														@elseif($header->JenisAbsensi=="OT") <th class="bg-red txt-light">
														@else <th>
														@endif
														{{ $header->Terapis }}</th>
													@endforeach
												</tr>
											</thead>
											<tbody>
												@foreach ($data[0] as $waktu => $group)
													<tr>
														<td>{{ $waktu }}</td>
														@foreach($group as $item)
															<td>{{ $item->Anak }}</td>
														@endforeach
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div  id="selasa" class="tab-pane fade" role="tabpanel">
								<div class="text-nowrap">
									<div class="table-responsive" style="zoom: 50%">
										<table class="table table-sm table-bordered display pb-30">
											<thead>
												<tr>
													<th rowspan="2">Jam / Hari</th>
													<th class="text-center" colspan="{{ count($data[1]->first()) }}">
														Selasa
													</th>
												</tr>
												<tr>
													@foreach($data[1]->first() as $header)
														@if($header->JenisAbsensi=="ABA") <th class="bg-primary txt-light">
														@elseif($header->JenisAbsensi=="TW") <th class="bg-yellow txt-dark">
														@elseif($header->JenisAbsensi=="OT") <th class="bg-red txt-light">
														@else <th>
														@endif
														{{ $header->Terapis }}</th>
													@endforeach
												</tr>
											</thead>
											<tbody>
												@foreach ($data[1] as $waktu => $group)
													<tr>
														<td>{{ $waktu }}</td>
														@foreach($group as $item)
															<td>{{ $item->Anak }}</td>
														@endforeach
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div  id="rabu" class="tab-pane fade" role="tabpanel">
								<div class="text-nowrap">
									<div class="table-responsive" style="zoom: 50%">
										<table class="table table-sm table-bordered display pb-30">
											<thead>
												<tr>
													<th rowspan="2">Jam / Hari</th>
													<th class="text-center" colspan="{{ count($data[2]->first()) }}">
														Rabu
													</th>
												</tr>
												<tr>
													@foreach($data[2]->first() as $header)
														@if($header->JenisAbsensi=="ABA") <th class="bg-primary txt-light">
														@elseif($header->JenisAbsensi=="TW") <th class="bg-yellow txt-dark">
														@elseif($header->JenisAbsensi=="OT") <th class="bg-red txt-light">
														@else <th>
														@endif
														{{ $header->Terapis }}</th>
													@endforeach
												</tr>
											</thead>
											<tbody>
												@foreach ($data[2] as $waktu => $group)
													<tr>
														<td>{{ $waktu }}</td>
														@foreach($group as $item)
															<td>{{ $item->Anak }}</td>
														@endforeach
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div  id="kamis" class="tab-pane fade" role="tabpanel">
								<div class="text-nowrap">
									<div class="table-responsive" style="zoom: 50%">
										<table class="table table-sm table-bordered display pb-30">
											<thead>
												<tr>
													<th rowspan="2">Jam / Hari</th>
													<th class="text-center" colspan="{{ count($data[3]->first()) }}">
														Kamis
													</th>
												</tr>
												<tr>
													@foreach($data[3]->first() as $header)
														@if($header->JenisAbsensi=="ABA") <th class="bg-primary txt-light">
														@elseif($header->JenisAbsensi=="TW") <th class="bg-yellow txt-dark">
														@elseif($header->JenisAbsensi=="OT") <th class="bg-red txt-light">
														@else <th>
														@endif
														{{ $header->Terapis }}</th>
													@endforeach
												</tr>
											</thead>
											<tbody>
												@foreach ($data[3] as $waktu => $group)
													<tr>
														<td>{{ $waktu }}</td>
														@foreach($group as $item)
															<td>{{ $item->Anak }}</td>
														@endforeach
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div  id="jumat" class="tab-pane fade" role="tabpanel">
								<div class="text-nowrap">
									<div class="table-responsive" style="zoom: 50%">
										<table class="table table-sm table-bordered display pb-30">
											<thead>
												<tr>
													<th rowspan="2">Jam / Hari</th>
													<th class="text-center" colspan="{{ count($data[4]->first()) }}">
														Jumat
													</th>
												</tr>
												<tr>
													@foreach($data[4]->first() as $header)
														@if($header->JenisAbsensi=="ABA") <th class="bg-primary txt-light">
														@elseif($header->JenisAbsensi=="TW") <th class="bg-yellow txt-dark">
														@elseif($header->JenisAbsensi=="OT") <th class="bg-red txt-light">
														@else <th>
														@endif
														{{ $header->Terapis }}</th>
													@endforeach
												</tr>
											</thead>
											<tbody>
												@foreach ($data[4] as $waktu => $group)
													<tr>
														<td>{{ $waktu }}</td>
														@foreach($group as $item)
															<td>{{ $item->Anak }}</td>
														@endforeach
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div  id="sabtu" class="tab-pane fade" role="tabpanel">
								<div class="text-nowrap">
									<div class="table-responsive" style="zoom: 50%">
										<table class="table table-sm table-bordered display pb-30">
											<thead>
												<tr>
													<th rowspan="2">Jam / Hari</th>
													<th class="text-center" colspan="{{ count($data[5]->first()) }}">
														Sabtu
													</th>
												</tr>
												<tr>
													@foreach($data[5]->first() as $header)
														@if($header->JenisAbsensi=="ABA") <th class="bg-primary txt-light">
														@elseif($header->JenisAbsensi=="TW") <th class="bg-yellow txt-dark">
														@elseif($header->JenisAbsensi=="OT") <th class="bg-red txt-light">
														@else <th>
														@endif
														{{ $header->Terapis }}</th>
													@endforeach
												</tr>
											</thead>
											<tbody>
												@foreach ($data[5] as $waktu => $group)
													<tr>
														<td>{{ $waktu }}</td>
														@foreach($group as $item)
															<td>{{ $item->Anak }}</td>
														@endforeach
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
		</div>
	</div>
</div>
<!-- /Row -->

@endsection

@section('scripts')
<!-- jQuery -->
<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Data table JavaScript -->
<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>

<!-- Init JavaScript -->
<script src="{{asset('dist/js/init.js')}}"></script>

@endsection