@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-12">
		<h5 class="txt-light">"bbbbbbbbbbbbbbbbbbbbbbbbbbbbb" Result</h5>
	</div>
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<article class="col-item">
						<div class="photo">
							<div class="options">
								<a href="" class="btn btn-default btn-icon-anim btn-circle mr-5" type="submit"><i class="icon-pencil"></i></a>
								<a href="/biodata_view" class="btn btn-info btn-icon-anim btn-circle" type="submit"><i class="icon-trash"></i></a>
							</div>
							<img src="dist/img/chair.jpg" class="img-responsive" alt="Product Image"> 
						</div>
						<div class="info text-center">
							<h6>Aldo Sentosa</h6>
							{{-- tanggal lahir --}}
							<span class="product-spec capitalize-font block mt-5 mb-5">dd/mm/yyy</span>
							<span class="head-font block text-success">diagnosa</span>
						</div>
					</article>
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

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>

@endsection