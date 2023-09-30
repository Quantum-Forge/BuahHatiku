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
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<div class="form-body">
							<form action="/user_edit" method="POST">
								<div class="row">
									{{ csrf_field() }}
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Nama</label>
										<input type="text" class="form-control" name="Nama" placeholder="Masukkan Nama Anda..." value="{{$user->Nama}}">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">NIK</label>
										<input type="number" readonly class="form-control" name="NoIdentitas" placeholder="Masukkan NIK Anda..." value="{{$user->NoIdentitas}}">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left" for="example-email">Username</label>
										<input type="text" id="example-email" name="Username" class="form-control" placeholder="Username" value="{{$user->Username}}">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left" for="example-email">Email</label>
										<input type="email" id="example-email" name="Email" class="form-control" placeholder="Email" value="{{$user->Email}}">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Password</label>
										<input type="password" class="form-control" name="Password" placeholder="Masukkan Password">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Role</label>
										<select class="form-control" name="Role">
											<option disabled >Choose...</option>
											<option value="1" @if ($user->Role == 1) selected @endif >Owner</option>
											<option value="2" @if ($user->Role == 2) selected @endif >Admin</option>
											<option value="3" @if ($user->Role == 3) selected @endif >Terapis</option>
										</select>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label mb-10 text-left" for="no_hp">Nomor HP</label>
										<input type="text" id="no_hp" name="NoHP" data-mask="0899999999999999" class="form-control" placeholder="Nomor HP" value="{{$user->NoHP}}">
									</div>
									<div class="form-group col-md-12">
										<label class="control-label mb-10 text-left">Alamat</label>
										<textarea class="form-control" rows="5" name="Alamat" placeholder="Alamat">{{$user->Alamat}}</textarea>
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

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>
@endsection