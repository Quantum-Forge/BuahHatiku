<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Buahatiku - Management System</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content=""/>
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
		<link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
		<!-- vector map CSS -->
		<link href="{{ asset('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Custom CSS -->
		<link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
	</head>
	<style>
		@media print {
		  .btn-print, .btn-lunas {
			display: none !important;
		  }
		}
	  </style>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
		
			<!-- Main Content -->
			<form action="/invoice_detail/{{$invoice->NoInvoice}}" method="POST" class="page-wrapper pa-0 ma-0">
				{{csrf_field()}}
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="panel panel-default card-view mb-0">
									<div class="panel-wrapper collapse in">
										<div class="panel-body">
											<div class="profile-box">
												<div class="profile-info-wrap text-center" style="background: transparent;">
													<div class="profile-info pt-0 pb-20">
														<img class="img-circle inline-block mt-40 mb-10" src="{{ asset('dist/img/buahatiku.png') }}" alt="">
													</div>	
												</div>
											</div>
											<div class="table-responsive">
												<table class="table table-bordered">
													<thead>
														<tr>
															
															<th colspan="4" class="text-center">Nota Penagihan {{\Carbon\Carbon::parse($invoice->TglInvoice)->format('F Y')}}</th>
														</tr>
														<tr>
															<th colspan="2">{{$invoice->biodata->Nama}}</th>
															<th colspan="2" class="text-center">{{$invoice->TglInvoice}}</th>
														</tr>
													</thead>
													<tbody>
														@foreach($invoice->rincian as $rincian)
															@if($rincian->JenisTransaksi == 1)
																<thead>
																	<tr>
																		<th colspan="1">{{$rincian->tipe_absensi->JenisAbsensi}}</th>
																		<th colspan="3">{{$rincian->Hari}}</th>
																	</tr>
																</thead>
															@endif
														@endforeach
														
														@foreach($invoice->rincian as $rincian)
															@if($rincian->JenisTransaksi == 1)
																<tr>
																	<td>{{$rincian->tipe_absensi->JenisAbsensi}}</td>
																	<td>{{$rincian->JmlhPertemuan}}</td>
																	<td> {{number_format($rincian->tipe_absensi->Harga, 0, ',', '.')}}</td>
																	<td> {{number_format($rincian->Total, 0, ',', '.')}}</td>
																</tr>
															@endif
														@endforeach
														@php( $pengembalian=0 )
														@foreach($invoice->rincian as $rincian)
															@if($rincian->JenisTransaksi == 0)
															<thead>
																<tr>
																	<th colspan="4" class="txt-dark">Pengembalian</th>
																</tr>
															</thead>
															@endif
														@endforeach
														@foreach($invoice->rincian as $rincian)
															@if($rincian->JenisTransaksi == 0)
																<tr>
																	<th>{{$rincian->tipe_absensi->JenisAbsensi}}</th>
																	<th>{{$rincian->JmlhPertemuan}}</th>
																	<th> {{number_format($rincian->tipe_absensi->Harga, 0, ',', '.')}}</th>
																	<th> {{number_format($rincian->Total, 0, ',', '.')}}</th>
																	@php($pengembalian += $rincian->Total)
																</tr>
															@endif
														@endforeach
														
														<tr class="txt-dark">
															<td class="text-right" colspan="3">Subtotal</td>
															<td> {{number_format($invoice->SubTotal, 0, ',', '.')}}</td>
														</tr>
														<tr class="txt-dark">
															<td class="text-right" colspan="3">Pengembalian</td>
															<td> {{number_format($invoice->Pengembalian, 0, ',', '.')}}</td>
														</tr>
														<tr class="txt-dark">
															<td class="text-right" colspan="3">Potongan</td>
															<td> {{number_format($invoice->Potongan, 0, ',', '.')}}</td>
														</tr>
														<tr class="txt-dark">
															<td class="text-right" colspan="3">SPP</td>
															<td> {{number_format($invoice->SPP, 0, ',', '.')}}</td>
														</tr>
														<tr class="txt-dark">
															<td class="text-right" colspan="3">Iuran</td>
															<td> {{number_format($invoice->Iuran, 0, ',', '.')}}</td>
														</tr>
														<tr class="txt-dark">
															<td class="text-right" colspan="3">Total</td>
															<td> {{number_format($invoice->GrandTotal, 0, ',', '.')}}</td>
														</tr>
													</tbody>
												</table>
												<button type="submit" class="btn btn-block btn-success btn-lunas" @if($invoice->StatusPelunasan == 1) disabled @endif>
													Lunas
												</button>
												<button type="button" class="btn btn-block btn-success btn-outline btn-icon left-icon btn-print" onclick="javascript:window.print();"> 
													<i class="fa fa-print"></i><span> Print</span> 
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</form>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
	
		<!-- Init JavaScript -->
		<script src="{{ asset('dist/js/init.js') }}"></script>
	</body>
</html>