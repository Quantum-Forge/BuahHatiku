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
					<h6 class="panel-title txt-dark">Biodata Anak</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-sm table-hover display text-nowrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Gambar</th>
										<th>Nama</th>
										<th>DOB</th>
										<th>Email</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="width: 7%;">1</td>
										<td style="width: 7%;"><img src="dist/img/chair.jpg" alt="iMac" width="80"></td>
										<td>Brian</td>
										<td>17-Aug-2023</td>
										<td>Data_1@yahoo</td>
										<td width="80">
											<button class="btn btn-default btn-icon-anim btn-circle btn-sm"><i class="fa fa-pencil"></i></button>
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
<!-- /Row -->





@endsection
