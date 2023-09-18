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

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Parental Questionnaire</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form id="example-advanced-form" action="/parental_questionnaire" method="POST">
						{{ csrf_field() }}
						<h3><span class="number"><i class="ti-info txt-black"></i></span><span class="head-font capitalize-font">Nama Anak</span></h3>
						<fieldset class="form-wrap">
							<div class="form-horizontal">
								<div class="form-body">
									<div class="form-group">
										<div class="col-md-12">
											<select name="IdAnak" class="form-control">
												<option disabled selected>Silahkan Pilih Nama Anak...</option>
												@foreach( $biodatas as $biodata)
													<option value="{{$biodata->IdAnak}}">{{$biodata->Nama}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>
						</fieldset>

						<h3><span class="number"><i class="ti-microphone-alt txt-black"></i></span><span class="head-font capitalize-font">Speech</span></h3>
						<fieldset>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-wrap">
										<div class="form-group">
											@php($counter = 1)
											@foreach( $questionnaires as $questionnaire)
												@if($questionnaire->IdJenis == 1)
													<div class="row">
														<div class="col-md-12">
															<label class="control-label mb-10" for="">{{$counter++}}.{{$questionnaire->Pertanyaan}}</label>
															<input type="hidden" name="questionnaire[]" value="{{$questionnaire->IdQuestionaire}}">
															<div class="radio-list">
																<div class="col-sm-12">
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio1" value="Ya">
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio2" value="Kadang-kadang">
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio3" value="Tidak">
																		<label for="radio3"> Tidak </label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												@endif
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					 
						<h3><span class="number"><i class="ti-thought txt-black"></i></span><span class="head-font capitalize-font">Sosialisasi</span></h3>
						<fieldset>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-wrap">
										<div class="form-group">
											@php($counter = 1)
											@foreach( $questionnaires as $questionnaire)
												@if($questionnaire->IdJenis == 2)
													<div class="row">
														<div class="col-md-12">
															<label class="control-label mb-10" for="">{{$counter++}}.{{$questionnaire->Pertanyaan}}</label>
															<input type="hidden" name="questionnaire[]" value="{{$questionnaire->IdQuestionaire}}">
															<div class="radio-list">
																<div class="col-sm-12">
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio1" value="Ya">
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio2" value="Kadang-kadang">
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio3" value="Tidak">
																		<label for="radio3"> Tidak </label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												@endif
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					 
						<h3><span class="number"><i class="ti-rss-alt txt-black"></i></span><span class="head-font capitalize-font">Sensory</span></h3>
						<fieldset>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-wrap">
										<div class="form-group">
											@php($counter = 1)
											@foreach( $questionnaires as $questionnaire)
												@if($questionnaire->IdJenis == 3)
													<div class="row">
														<div class="col-md-12">
															<label class="control-label mb-10" for="">{{$counter++}}.{{$questionnaire->Pertanyaan}}</label>
															<input type="hidden" name="questionnaire[]" value="{{$questionnaire->IdQuestionaire}}">
															<div class="radio-list">
																<div class="col-sm-12">
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio1" value="Ya">
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio2" value="Kadang-kadang">
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio3" value="Tidak">
																		<label for="radio3"> Tidak </label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												@endif
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</fieldset>

						<h3><span class="number"><i class="ti-heart-broken txt-black"></i></span><span class="head-font capitalize-font">Kesehatan</span></h3>
						<fieldset>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-wrap">
										<div class="form-group">
											@php($counter = 1)
											@foreach( $questionnaires as $questionnaire)
												@if($questionnaire->IdJenis == 4)
													<div class="row">
														<div class="col-md-12">
															<label class="control-label mb-10" for="">{{$counter++}}.{{$questionnaire->Pertanyaan}}</label>
															<input type="hidden" name="questionnaire[]" value="{{$questionnaire->IdQuestionaire}}">
															<div class="radio-list">
																<div class="col-sm-12">
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio1" value="Ya">
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio2" value="Kadang-kadang">
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio3" value="Tidak">
																		<label for="radio3"> Tidak </label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												@endif
											@endforeach
										</div>
									</div>
								</div>
							</div>
							{{-- <input type="submit"> --}}
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Daftar Parental Questionnaire</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-sm table-hover display text-nowrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>ID Parental</th>
										<th>Nama Anak</th>
										<th>Diagnosa</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td width="80">
											<button class="btn btn-default btn-icon-anim btn-circle btn-sm"><i class="fa fa-eye"></i></button>
											<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
										</td>
									</tr>
									<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h5 class="modal-title">Delete Parental</h5>
												</div>
												<div class="modal-body">
													Are you sure to delete this (ID Parental) ?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
													<button type="button" class="btn btn-danger">Yes</button>
												</div>
											</div>
										</div>
									</div>
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
