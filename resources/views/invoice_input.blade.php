@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Invoice</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li><a href="#"><span>Faktur</span></a></li>
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
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form action="/input_invoice" method="GET">
						@error('message')
						<div class="alert alert-danger mb-10">{{ $message }}</div>
						@enderror
						<div class="row">
							<div class="col-xs-6">
								<span class="txt-dark head-font inline-block capitalize-font mb-5">Billed to:</span>
								<div class="">
									<select name="IdAnak" class="form-control" style="width: 300px; max-width: 100%;" onchange="this.form.submit()">
										<option disabled selected>Choose...</option>
										@foreach($biodatas as $biodata)
											<option value="{{$biodata->IdAnak}}" @if(Request::input('IdAnak') == $biodata->IdAnak) selected @endif>{{$biodata->Nama}}</option>
										@endforeach
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
					</form>
					
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
								<span class="txt-dark head-font capitalize-font mb-5">Invoice date:</span><br>
								{{$today}}<br><br>
							</address>
						</div>
					</div>
					<div class="seprator-block"></div>

					<div class="invoice-bill-table">
						<form action="/input_invoice" method="POST">
							{{csrf_field()}}
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Tipe Terapi</th>
											<th>Hari</th>
											<th>Jumlah Pertemuan</th>
											<th>Harga</th>
											<th>Total</th>
										</tr>
									</thead>
									<input type="hidden" name="NoIdentitas" value="{{$first_jadwal}}">
									<input type="hidden" name="IdAnak" value="{{Request::input('IdAnak')}}">
									<tbody>
										@php( $subtotal=0 )
										@foreach( $jadwal_hadir as $jadwal)
											<tr>
												<td>{{$jadwal->tipe_absensi->JenisAbsensi}}</td>
												<td>{{$jadwal->ListHari}}</td>
												<td>{{$jadwal->JumlahPertemuan}}</td>
												<td>Rp. {{number_format($jadwal->tipe_absensi->Harga, 0, ',', '.')}}</td>
												<td>Rp. {{number_format($jadwal->JumlahPertemuan * $jadwal->tipe_absensi->Harga, 0, ',', '.')}}</td>
												@php( $subtotal += $jadwal->JumlahPertemuan * $jadwal->tipe_absensi->Harga )
												<input type="hidden" name="absensi.IdTipe[]" value="{{$jadwal->IdTipe}}">
												<input type="hidden" name="absensi.Hari[]" value="{{$jadwal->ListHari}}">
												<input type="hidden" name="absensi.JmlhPertemuan[]" value="{{$jadwal->JumlahPertemuan}}">
												<input type="hidden" name="absensi.Harga[]" value="{{$jadwal->tipe_absensi->Harga}}">
												<input type="hidden" name="absensi.Total[]" value="{{$jadwal->JumlahPertemuan * $jadwal->tipe_absensi->Harga}}">
											</tr>
										@endforeach
										@php( $pengembalian=0 )
										@if(count($jadwal_tidak_hadir) > 0)
											<thead>
												<tr>
													<th class="txt-dark">Pengembalian</th>
													<th></th>
													<th></th>
													<th></th>	
													<th></th>
												</tr>
											</thead>
											<tbody>
												@foreach( $jadwal_tidak_hadir as $jadwal)
													<tr>
														<td>{{$jadwal->tipe_absensi->JenisAbsensi}}</td>
														<td>{{$jadwal->ListHari}}</td>
														<td>{{$jadwal->JumlahPertemuan}}</td>
														<td>Rp. {{number_format($jadwal->tipe_absensi->Harga, 0, ',', '.')}}</td>
														<td>Rp. {{number_format($jadwal->JumlahPertemuan * $jadwal->tipe_absensi->Harga, 0, ',', '.')}}</td>
														@php( $pengembalian += $jadwal->JumlahPertemuan * $jadwal->tipe_absensi->Harga )
														<input type="hidden" name="pengembalian.IdTipe[]" value="{{$jadwal->IdTipe}}">
														<input type="hidden" name="pengembalian.Hari[]" value="{{$jadwal->ListHari}}">
														<input type="hidden" name="pengembalian.JmlhPertemuan[]" value="{{$jadwal->JumlahPertemuan}}">
														<input type="hidden" name="pengembalian.Harga[]" value="{{$jadwal->tipe_absensi->Harga}}">
														<input type="hidden" name="pengembalian.Total[]" value="{{$jadwal->JumlahPertemuan * $jadwal->tipe_absensi->Harga}}">
													</tr>
												@endforeach
											</tbody>
										@endif
										<tr class="txt-dark">
											<td></td>
											<td></td>
											<td colspan="2" class="text-right">Subtotal</td>
											<td>Rp. {{number_format($subtotal, 0, ',', '.')}}</td>
											<input type="hidden" name="SubTotal" id="subtotal" value="{{$subtotal}}">
										</tr>
										<tr class="txt-dark">
											<td></td>
											<td></td>
											<td colspan="2" class="text-right">Pengembalian</td>
											<td>Rp. {{number_format($pengembalian, 0, ',', '.')}}</td>
											<input type="hidden" name="Pengembalian" id="pengembalian" value="{{$pengembalian}}">
										</tr>
										<tr class="txt-dark">
											<td></td>
											<td></td>
											<td colspan="2" class="text-right">Potongan</td>
											<td>
												<div class="form-group mt-10" style="">
													<input id="inputPotongan" type="number" value="" min="0" placeholder="Isi Potongan..." name="Potongan" class="form-control">
												</div>	
											</td>
										</tr>
										<tr class="txt-dark">
											<td></td>
											<td></td>
											<td colspan="2" class="text-right">Iuran</td>
											<td>
												<div class="form-group mt-10" style="">
													<input id="inputIuran" type="number" value="" min="0" placeholder="Isi Iuran..." name="Iuran" class="form-control">
												</div>	
											</td>
										</tr>
										<tr class="txt-dark">
											<td></td>
											<td></td>
											<td colspan="2" class="text-right">Total</td>
											<td id="GrandTotal">Rp. {{number_format($subtotal - $pengembalian, 0, ',', '.')}}</td>
											<input type="hidden" name="GrandTotal" value="{{$subtotal - $pengembalian}}">
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
						</form>
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

<!-- Select2 JavaScript -->
<script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- Bootstrap Select JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<!-- Bootstrap Touchspin JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Form Advance Init JavaScript -->
<script src="{{ asset('dist/js/form-advance-data.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>

<script src="{{ asset('dist/js/potongan.js') }}"></script>
@endsection