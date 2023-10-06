@extends('layouts.app')

@section('dashboard')

<form action="/invoice_detail/{{$invoice->NoInvoice}}" method="POST">
{{csrf_field()}}
<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Invoice # {{$invoice->NoInvoice}}</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/invoice_input">Faktur</a></li>
			<li><a href="#	"><span>dashboard</span></a></li>
			<li class="active"><span>Invoice # {{$invoice->NoInvoice}}</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->

</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	<div class="col-md-12">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Invoice</h6>
					</div>
					<div class="pull-right">
						<h6 class="txt-dark">Invoice # {{$invoice->NoInvoice}}</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-6">
								<span class="txt-dark head-font inline-block capitalize-font mb-5">Billed to:</span>
								<address class="mb-15">
									<span class="address-head mb-5">{{$invoice->biodata->Nama}}</span>
									{{$invoice->biodata->Alamat}} <br>
									<abbr title="Phone">P:</abbr>{{$invoice->biodata->NoHP}}
								</address>
							</div>
							<div class="col-xs-6 text-right">
								<span class="txt-dark head-font inline-block capitalize-font mb-5">shiped to:</span>
								<address class="mb-15">
									<span class="address-head mb-5">Xyz, Inc.</span>
										Jl. Gunung Latimojong No.129-A, Maradekaya,<br>
										Kec. Makassar, Kota Makassar,<br>
										Sulawesi Selatan 90145 <br>
										P:(0411)3625214 <br>
									<abbr title="Phone">P:</abbr>(123) 456-7890
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
									<span class="txt-dark head-font capitalize-font mb-5">invoice date:</span><br>
									{{$invoice->TglInvoice}}<br><br>
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
											<th>Hari</th>
											<th>Durasi</th>
											<th>Harga</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										@foreach($invoice->rincian as $rincian)
											@if($rincian->JenisTransaksi == 1)
												<tr>
													<td>{{$rincian->tipe_absensi->JenisAbsensi}}</td>
													<td>{{$rincian->Hari}}</td>
													<td>{{$rincian->JmlhPertemuan}} Jam</td>
													<td>Rp. {{number_format($rincian->tipe_absensi->Harga, 0, ',', '.')}}</td>
													<td>Rp. {{number_format($rincian->Total, 0, ',', '.')}}</td>
												</tr>
											@endif
										@endforeach
										@foreach($invoice->rincian as $rincian)
										@if($rincian->JenisTransaksi == 0)
										<thead>
											<tr>
												<th colspan="4" class="txt-dark">Pengembalian</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>{{$rincian->tipe_absensi->JenisAbsensi}}</td>
												<td>{{$rincian->Hari}}</td>
												<td>{{$rincian->JmlhPertemuan}} Jam</td>
												<td>Rp. {{number_format($rincian->tipe_absensi->Harga, 0, ',', '.')}}</td>
												<td>Rp. {{number_format($rincian->Total, 0, ',', '.')}}</td>
											</tr>
										</tbody>
										@endif
										@endforeach
										<tr class="txt-dark">
											<td></td>
											<td></td>
											<td></td>
											<td>Subtotal</td>
											<td>Rp. {{number_format($invoice->SubTotal, 0, ',', '.')}}</td>
										</tr>
										<tr class="txt-dark">
											<td></td>
											<td></td>
											<td></td>
											<td>Pengembalian</td>
											<td>Rp. {{number_format($invoice->SubTotal - $invoice->GrandTotal, 0, ',', '.')}}</td>
										</tr>
										<tr class="txt-dark">
											<td></td>
											<td></td>
											<td></td>
											<td>Total</td>
											<td>Rp. {{number_format($invoice->GrandTotal, 0, ',', '.')}}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn btn-success mr-10" @if($invoice->StatusPelunasan == 1) disabled @endif>
									Lunas
								</button>
								<button type="button" class="btn btn-success btn-outline btn-icon left-icon" onclick="javascript:window.print();"> 
									<i class="fa fa-print"></i><span> Print</span> 
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
</form>
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