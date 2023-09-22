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
									@foreach($biodatas as $biodata)
									<tr>
										<td style="width: 7%;">{{$loop->index+1}}</td>
										<td style="width: 7%;"><img src="{{ asset('storage/'.$biodata->Photo) }}" alt="iMac" width="80"></td>
										<td>{{$biodata->Nama}}</td>
										<td>{{$biodata->TglLahir}}</td>
										<td>{{$biodata->Email}}</td>
										<td width="80">
											<button class="btn btn-default btn-icon-anim btn-circle btn-sm" onclick="window.location.href='/biodata_edit/{{$biodata->IdAnak}}';"><i class="fa fa-pencil"></i></button>
											<button data-toggle="modal" data-target="#responsive-modal{{$biodata->IdAnak}}" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
										</td>
									</tr>
									<div id="responsive-modal{{$biodata->IdAnak}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
										<form action="/biodata_delete/{{$biodata->IdAnak}}" method="POST">
										{{ csrf_field() }}
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h5 class="modal-title">Delete Data Anak</h5>
												</div>
												<div class="modal-body">
													Are you sure to delete {{$biodata->Nama}} ?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
													<button type="submit" class="btn btn-danger">Yes</button>
												</div>
											</div>
										</div>
										</form>
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