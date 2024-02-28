@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Tipe Absensi</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>Master Data</span></a></li>
			<li class="active"><span>Tipe Absensi</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->

</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Jenis-jenis Absensi</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<form class="form-horizontal" action="/tipe_absensi_insert" method="POST">
								{{ csrf_field() }}
								<div class="form-group {{ $errors->has('JenisAbsensi') ? 'has-error' : '' }}">
									<label for="Jenis" class="col-sm-3 control-label">Jenis*</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon"><i class="icon-list"></i></div>
											<input type="text" name="JenisAbsensi" class="form-control" value="{{old('JenisAbsensi')}}">
										</div>
										@error('JenisAbsensi')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="form-group {{ $errors->has('Harga') ? 'has-error' : '' }}">
									<label for="Jenis" class="col-sm-3 control-label">Harga*</label>
									<div class="col-sm-9">
										<div class="input-group">
											<div class="input-group-addon">Rp.</div>
											<input type="number" name="Harga" placeholder="Isi Harga..." class="form-control"  value="{{old('Harga')}}">
										</div>
										@error('Harga')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="form-group {{ $errors->has('Durasi') ? 'has-error' : '' }}">
									<label for="" class="col-sm-3 control-label">Durasi*</label>
									<div class="col-sm-9">
										<input placeholder="Isi Sesi..." name="Durasi" class="vertical-spin form-control" type="number" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" value="{{old('Durasi')}}" style="display: block;">
										<span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
										@error('Durasi')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="form-group {{ $errors->has('Keterangan') ? 'has-error' : '' }}">
									<label for="Pertanyaan" class="col-sm-3 control-label">Keterangan*</label>
									<div class="col-sm-9">
										<div class="input-group">
											<textarea name="Keterangan" class="form-control" id="" cols="50" rows="10">{{old('Keterangan')}}</textarea>
										</div>
										@error('Keterangan')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="form-group mb-0">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-info btn-block ">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="form-wrap row">
								<div class="table-wrap">
									<div class="table-responsive">
										<table id="datable_1" class="table table-sm table-hover display text-wrap">
											<thead>
												<tr>
													<th>No</th>
													<th>Jenis</th>
													<th>Harga</th>
													<th>Durasi</th>
													<th width="100">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach( $tipe_absensies as $tipe_absensi)
												<tr>
													<td>{{$loop->index+1}}</td>
													<td>{{$tipe_absensi->JenisAbsensi}}</td>
													<td>Rp. {{$tipe_absensi->Harga}}</td>
													<td>{{$tipe_absensi->Durasi}} Jam</td>
													<td width="100">
														<button data-toggle="modal" data-target="#responsive-modal{{$tipe_absensi->IdTipe}}" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-pencil"></i></button>
														<button @if($tipe_absensi->has_relation()) disabled @endif data-toggle="modal" data-target="#responsive-modal-delete{{$tipe_absensi->IdTipe}}" class="btn @if($tipe_absensi->has_relation()) btn-default @else btn-info @endif btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
													</td>
												</tr>
												<div id="responsive-modal{{$tipe_absensi->IdTipe}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
													<div class="modal-dialog">
														<form action="/tipe_absensi_edit/{{$tipe_absensi->IdTipe}}" method="POST">
															{{ csrf_field() }}
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																	<h5 class="modal-title">Edit Tipe Absensi</h5>
																</div>
																<div class="modal-body">
																	<div class="form-group ">
																		<div class="">
																			<div class="input-group">
																				<div class="input-group-addon"><i class="icon-list"></i></div>
																				<input type="text" required placeholder="Isi Jenis..." name="JenisAbsensi" class="form-control" value="{{$tipe_absensi->JenisAbsensi}}">
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="">
																			<div class="input-group">
																				<div class="input-group-addon">Rp.</div>
																				<input type="number" name="Harga" placeholder="Isi Harga..." class="form-control"  value="{{$tipe_absensi->Harga}}">
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<input placeholder="Isi Sesi..." name="Durasi" class="form-control" type="number" value="{{$tipe_absensi->Durasi}}">
																	</div>
																	<div class="form-group">
																		<div class="">
																			<div class="input-group">
																				<textarea name="Keterangan" placeholder="Isi Keterangan..." class="form-control" id="" cols="100" rows="10">{{$tipe_absensi->Keterangan}}</textarea>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-success btn-block">Submit</button>
																</div>
															</div>
														</form>
													</div>
												</div>
												<div id="responsive-modal-delete{{$tipe_absensi->IdTipe}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
													<div class="modal-dialog">
														<form action="/tipe_absensi_delete/{{$tipe_absensi->IdTipe}}" method="POST">
															{{ csrf_field() }}
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																	<h5 class="modal-title">Delete Tipe Absensi</h5>
																</div>
																<div class="modal-body">
																	Are you sure to delete {{$tipe_absensi->JenisAbsensi}} ?
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
																	<button type="submit" class="btn btn-danger">Yes</button>
																</div>
															</div>
														</form>
													</div>
												</div>
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
<!-- jQuery -->
<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Data table JavaScript -->
<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>

<!-- Moment JavaScript -->
<script src="{{ asset('vendors/bower_components/moment/min/moment-with-locales.min.js') }}"></script>

<!-- Bootstrap Colorpicker JavaScript -->
<script src="{{ asset('vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

<!-- Switchery JavaScript -->
<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

<!-- Select2 JavaScript -->
<script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- Bootstrap Select JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<!-- Bootstrap Tagsinput JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

<!-- Bootstrap Touchspin JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Multiselect JavaScript -->
<script src="{{ asset('vendors/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>

<!-- Bootstrap Switch JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>

<!-- Bootstrap Datetimepicker JavaScript -->
<script src="{{ asset('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Form Advance Init JavaScript -->
<script src="{{ asset('dist/js/form-advance-data.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>

@endsection