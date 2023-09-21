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
								<input type="text" class="form-control" name="Nama" value="{{old('Nama')}}" placeholder="Masukkan Nama Anda...">
								@error('Nama')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">NIK</label>
								<input type="number" class="form-control" name="NoIdentitas" value="{{old('NoIdentitas')}}" placeholder="Masukkan NIK Anda...">
								@error('NoIdentitas')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left" for="example-email">Username</label>
								<input type="text" id="example-email" name="Username" value="{{old('Username')}}" class="form-control" placeholder="Username">
								@error('Username')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left" for="example-email">Email</label>
								<input type="email" id="example-email" name="Email" value="{{old('Email')}}" class="form-control" placeholder="Email">
								@error('Email')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Password</label>
								<input type="password" class="form-control" name="Password" value="{{old('Password')}}" placeholder="Masukkan Password">
								@error('Password')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Role</label>
								<select class="form-control" name="Role" >
									<option disabled selected>Choose...</option>
									<option value="1" @if(old('Role')==1) selected @endif>Owner</option>
									<option value="2" @if(old('Role')==2) selected @endif>Admin</option>
									<option value="3" @if(old('Role')==3) selected @endif>Terapis</option>
								</select>
								@error('Role')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left" for="no_hp">Nomor HP</label>
								<input type="number" id="no_hp" name="NoHP" value="{{old('NoHP')}}" class="form-control" placeholder="Nomor HP">
								@error('NoHP')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Alamat</label>
								<textarea class="form-control" rows="5" name="Alamat" placeholder="Alamat">{{old('Alamat')}}</textarea>
								@error('Alamat')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
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