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
	<div class="col-sm-12">
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
							<div class="form-wrap row">
								<div class="col-md-4">
									<form class="form-horizontal">
										<div class="form-group">
											<label for="Jenis" class="col-sm-3 control-label">Jenis*</label>
											<div class="col-sm-9">
												<div class="input-group">
													<div class="input-group-addon"><i class="icon-list"></i></div>
													<input type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="Jenis" class="col-sm-3 control-label">Harga*</label>
											<div class="col-sm-9">
												<div class="input-group">
													<div class="input-group-addon">Rp.</div>
													<input type="number" placeholder="Isi Harga..." class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="" class="col-sm-3 control-label">Durasi</label>
											<div class="col-sm-9">
												<input placeholder="Isi Durasi Jam..." class="vertical-spin form-control" type="number" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" value="" style="display: block;">
												<span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
											</div>
										</div>
										<div class="form-group">
											<label for="Pertanyaan" class="col-sm-3 control-label">Keterangan*</label>
											<div class="col-sm-9">
												<div class="input-group">
													<textarea name="" class="form-control" id="" cols="50" rows="10"></textarea>
												</div>
											</div>
										</div>
										<div class="form-group mb-0">
											<div class="col-sm-offset-3 col-sm-9">
												<button type="submit" class="btn btn-info ">Submit</button>
											</div>
										</div>
									</form>
								</div>
								<div class="col-md-8">
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
													<tr>
														<td>1</td>
														<td>Kesadaran/Kognitif</td>
														<td>Mengetahui nama sendiri</td>
														<td>1 Jam</td>
														<td width="100">
															<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
														</td>
													</tr>
													<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																	<h5 class="modal-title">Delete Bio</h5>
																</div>
																<div class="modal-body">
																	Are you sure to delete this Bio ?
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
																	<button type="button" class="btn btn-danger">Yes</button>
																</div>
															</div>
														</div>
													</div>
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
</div>
<!-- /Row -->

@endsection