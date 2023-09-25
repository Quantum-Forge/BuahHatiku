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

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Invoice</h6>
				</div>
				<div class="pull-right">
					<h6 class="txt-dark">Invoice#12345</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6">
							<span class="txt-dark head-font inline-block capitalize-font mb-5">Billed to:</span>
							<div class="">
								<select name="" class="form-control" style="width: 300px; max-width: 100%;" id="">
									<option value="1">Anak...</option>
								</select>
								<img src="{{ asset('dist/img/bca.png') }}" alt="" class="img-responsive" style="max-width: 100%; width: 100px;">
							</div>
						</div>
						<div class="col-xs-6 text-right">
							<address class="mb-15">
								<span class="address-head mb-5">Yayasan Bina Sejahtera.</span>
								Jl. Gunung Latimojong No.129-A, Maradekaya, <br>
								Kec. Makassar, Kota Makassar, <br>
								Sulawesi Selatan 90145 <br>
								<abbr title="Phone">P:</abbr>(0411)3625214
							</address>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-6">
							<address>
								<span class="txt-dark head-font capitalize-font mb-5">Bank BCA:</span>
								<br>
								Yayasan Bina Sejahtera<br>
								7055567123
							</address>
						</div>
						<div class="col-xs-6 text-right">
							<address>
								<span class="txt-dark head-font capitalize-font mb-5">order date:</span><br>
								dd/mm/yyyy<br><br>
							</address>
						</div>
					</div>
					
					<div class="seprator-block"></div>
					
					<div class="invoice-bill-table">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Tipe Terapi</th>
										<th>Durasi</th>
										<th>Harga</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>BS-200</td>
										<td>2 Jam</td>
										<td>1</td>
										<td>$10.99</td>
									</tr>
									<tr>
										<td>BS-400</td>
										<td>$20.00</td>
										<td>3</td>
										<td>$60.00</td>
									</tr>
									<tr>
										<td>BS-1000</td>
										<td>$600.00</td>
										<td>1</td>
										<td>$600.00</td>
									</tr>
									<thead>
										<tr>
											<th colspan="4" class="txt-dark">Pengembalian</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>ABA</td>
											<td style="width: 20%;">
												<input placeholder="Isi Durasi Jam..." name="Durasi" class="vertical-spin form-control" type="number" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" value="" style="display: block;">
											</td>
											<td>Rp. 20.000</td>
											<td>Rp. 20.000</td>
										</tr>
									</tbody>
									<tr class="txt-dark">
										<td></td>
										<td></td>
										<td>Subtotal</td>
										<td>$670.99</td>
									</tr>
									<tr class="txt-dark">
										<td></td>
										<td></td>
										<td>Shipping</td>
										<td>$15</td>
									</tr>
									<tr class="txt-dark">
										<td></td>
										<td></td>
										<td>Total</td>
										<td>$685.99</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-primary mr-10">
								Submit 
							</button>
						</div>
						<div class="clearfix"></div>
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