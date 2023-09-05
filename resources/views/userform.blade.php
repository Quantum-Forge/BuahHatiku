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
					<h6 class="panel-title txt-dark">Form User</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<form action="/user_form" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<label class="control-label mb-10 text-left">Nama</label>
								<input type="text" class="form-control" name="Nama" placeholder="Masukkan Nama Anda...">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">NIK</label>
								<input type="number" class="form-control" name="NoIdentitas" placeholder="Masukkan NIK Anda...">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left" for="example-email">Username</label>
								<input type="text" id="example-email" name="Username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left" for="example-email">Email</label>
								<input type="email" id="example-email" name="Email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Password</label>
								<input type="password" class="form-control" name="Password" placeholder="Masukkan Password">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Role</label>
								<select class="form-control" name="Role">
									<option disabled selected>Choose...</option>
									<option value="1">Owner</option>
									<option value="2">Admin</option>
									<option value="3">Terapis</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left" for="no_hp">Nomor HP</label>
								<input type="number" id="no_hp" name="NoHP" class="form-control" placeholder="Nomor HP">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Alamat</label>
								<textarea class="form-control" rows="5" name="Alamat" placeholder="Alamat"></textarea>
							</div>
							<button class="btn btn-block btn-success">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Row -->





@endsection