@extends('layouts.app') @section('title')Buahatiku - Management System @endsection

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Arsip Faktur</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>Faktur</span></a></li>
			<li class="active"><span>Daftar Faktur</span></li>
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
					<h6 class="panel-title txt-dark">Invoice List</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table  display table-hover mb-30">
								<thead>
									<tr>
										<th>#Invoice</th>
										<th>Nama Anak</th>
										<th>Jumlah</th>
										<th>Status</th>
										<th>tanggal</th>
										<th>aksi</th>
									</tr>
								</thead>

								<tbody>
									@foreach( $invoices as $invoice)
									<tr>
										<td>#{{$invoice->NoInvoice}}</td>
										<td>{{$invoice->biodata->Nama}}</td>
										<td>Rp. {{number_format($invoice->GrandTotal, 0, ',', '.')}}</td>
										<td>
											@if($invoice->StatusPelunasan == 1) <span class="label label-success">Lunas</span>
											@else <span class="label label-danger">Belum Lunas</span>
											@endif
										</td>
										<td>{{$invoice->TglInvoice}}</td>
										<td>
											<a target="_blank" href="/invoice_detail/{{$invoice->NoInvoice}}">
												<i class="fa fa-file-text-o" aria-hidden="true"></i>
											</a>	
										</td>
									</tr>
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

