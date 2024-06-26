@extends('layouts.app') @section('title')Buahatiku - Management System @endsection

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
							<img src="{{ $biodata->Photo? asset('storage/'.$biodata->Photo) : 'dist/img/user.png'}}" class="img-responsive" alt="{{$biodata->Nama}}"> 
						</div>
						<div class="info text-center">
							<h6>{{$biodata->Nama}}</h6>
							<span class="product-spec capitalize-font block mt-5 mb-5">{{$biodata->JenisKelamin}}</span>
							<span class="head-font block text-success">{{$biodata->NoHP}}</span>
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

