@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-12">
		<h5 class="txt-light">"{{Request::input('Nama')}}" Result</h5>
	</div>
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
	@foreach( $biodatas as $biodata )
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<article class="col-item">
						<div class="photo">
							<div class="options">
								<a href="/biodata_edit/{{$biodata->IdAnak}}" class="btn btn-default btn-icon-anim btn-circle mr-5" type="submit"><i class="icon-pencil"></i></a>
							</div>
							<img src="{{ $biodata->Photo? asset('storage/'.$biodata->Photo) : 'dist/img/chair.jpg'}}" class="img-responsive" alt="{{$biodata->Nama}}"> 
						</div>
						<div class="info text-center">
							<h6>{{$biodata->Nama}}</h6>
							<span class="product-spec capitalize-font block mt-5 mb-5">{{$biodata->TglLahir->format('d-m-Y')}}</span>
							<span class="head-font block text-success">{{$biodata->Diagnosa()}}</span>
						</div>
					</article>
				</div>
			</div>	
		</div>	
	</div>
	@endforeach
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