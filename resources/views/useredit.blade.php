@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Edit User</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li><a href="#"><span>Pengguna</span></a></li>
			<li class="active"><span>Edit</span></li>
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
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<div class="form-body">
							<form action="/user_edit" method="POST">
								<div class="row">
									{{ csrf_field() }}
									<div class="form-group col-md-6 {{ $errors->has('Nama') ? 'has-error' : '' }}">
										<label class="control-label mb-10 text-left">Nama</label>
										<input type="text" class="form-control" name="Nama" value="{{old('Nama', $user->Nama)}}" placeholder="Masukkan Nama Anda...">
										@error('Nama')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group col-md-6 {{ $errors->has('NoIdentitas') ? 'has-error' : '' }}">
										<label class="control-label mb-10 text-left">NIK</label>
										<input type="text" class="form-control" readonly name="NoIdentitas" value="{{old('NoIdentitas', $user->NoIdentitas)}}" placeholder="Masukkan NIK Anda...">
										@error('NoIdentitas')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group col-md-6 {{ $errors->has('Username') ? 'has-error' : '' }}">
										<label class="control-label mb-10 text-left" for="example-email">Username</label>
										<input type="text" id="username" name="Username" value="{{old('Username', $user->Username)}}" class="form-control" placeholder="Username">
										@error('Username')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group col-md-6 {{ $errors->has('Email') ? 'has-error' : '' }}">
										<label class="control-label mb-10 text-left" for="example-email">Email</label>
										<input type="email" id="example-email" name="Email" value="{{old('Email', $user->Email)}}" class="form-control" placeholder="Email">
										@error('Email')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group col-md-6 {{ $errors->has('Password') ? 'has-error' : '' }}">
										<label class="control-label mb-10 text-left">Password</label>
										<input type="password" class="form-control" name="Password" placeholder="Masukkan Password" value="{{old('Password')}}">
										@error('Password')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group col-md-6 {{ $errors->has('Role') ? 'has-error' : '' }}">
										<label class="control-label mb-10 text-left">Role</label>
										<select class="form-control" name="Role" >
											<option disabled selected>Choose...</option>
											<option value="1" @if(old('Role', $user->Role)==1) selected @endif>Owner</option>
											<option value="2" @if(old('Role', $user->Role)==2) selected @endif>Admin</option>
											<option value="3" @if(old('Role', $user->Role)==3) selected @endif>Terapis</option>
											<option value="4" @if(old('Role', $user->Role)==4) selected @endif>Staff</option>
										</select>
										@error('Role')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group col-md-12 {{ $errors->has('NoHP') ? 'has-error' : '' }}">
										<label class="control-label mb-10 text-left" for="no_hp">Nomor HP</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="ti-mobile mr-5"></i>(+62)</div>
											<input type="number" id="no_hp" name="NoHP" value="{{old('NoHP', $user->NoHP)}}" class="form-control" placeholder="Nomor HP">
										</div>
										@error('NoHP')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group col-md-12 {{ $errors->has('Alamat') ? 'has-error' : '' }}">
										<label class="control-label mb-10 text-left">Alamat</label>
										<textarea class="form-control" rows="5" name="Alamat" placeholder="Alamat">{{old('Alamat', $user->Alamat)}}</textarea>
										@error('Alamat')
											<span class="help-block">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<button class="btn btn-block btn-success">Submit</button>
							</form>
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
<script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

<!-- Data table JavaScript -->
<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

<script src="{{ asset('dist/js/validator_user.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>
@endsection