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

{{-- content --}}

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Daftar User</h6>
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
										<th>Nama</th>
										<th>Email</th>
										<th>Handphone</th>
										<th>Role</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									<tbody>
										@foreach ($users as $user)
										<tr>	
											<td width="50">{{ $loop->index + 1 }}</td>
											<td>{{ $user->Nama }}</td>
											<td>{{ $user->Email }}</td>
											<td>{{ $user->NoHP }}</td>
											<td>
												@if($user->Role == 1 )
													Owner
												@elseif($user->Role == 2 )
													Admin
												@elseif($user->Role == 3 )
													Terapis
												@endif
											</td>
											<td><input type="checkbox" onchange="window.location.href='/user_toggle_status/{{$user->NoIdentitas}}';" @if($user->StatusAktif ==  1) checked @else '' @endif class="js-switch" data-color="#FAAB15" data-size="small"></td>
											<td width="80">
												<button class="btn btn-default btn-icon-anim btn-circle btn-sm" onclick="window.location.href='/user_edit/{{$user->NoIdentitas}}';"><i class="fa fa-pencil"></i></button>
												<button data-toggle="modal" data-target="#responsive-modal{{$user->NoIdentitas}}" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
											</td>
										</tr>
										<div id="responsive-modal{{$user->NoIdentitas}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<form action="/user_delete/{{$user->NoIdentitas}}" method="POST">
												{{ csrf_field() }}
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title">Delete User</h5>
														</div>
														<div class="modal-body">
															Are you sure to delete {{$user->Nama}} ?
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
								</thead>
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
