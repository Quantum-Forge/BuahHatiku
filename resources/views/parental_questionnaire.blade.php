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
											<select name="IdAnak" class="form-control" required>
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
																	<input type="hidden" name="answer[{{$questionnaire->IdQuestionaire}}]" value="0">
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio1" value="Ya">
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio2" value="Kadang-kadang">
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio3" value="Tidak">
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
																	<input type="hidden" name="answer[{{$questionnaire->IdQuestionaire}}]" value="0">
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio1" value="Ya">
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio2" value="Kadang-kadang">
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio3" value="Tidak">
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
																	<input type="hidden" name="answer[{{$questionnaire->IdQuestionaire}}]" value="0">
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio1" value="Ya">
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio2" value="Kadang-kadang">
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio3" value="Tidak">
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
																	<input type="hidden" name="answer[{{$questionnaire->IdQuestionaire}}]" value="0">
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio1" value="Ya">
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio2" value="Kadang-kadang">
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" required name="answer[{{$questionnaire->IdQuestionaire}}]" id="radio3" value="Tidak">
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
										<th>Gambar</th>
										<th>Nama Anak</th>
										<th>Diagnosa</th>
										<th>Tanggal Masuk</th>
										<th>Tanggal Keluar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($biodatas_filled as $biodata)
									<tr>
										<td style="width: 7%;">{{$loop->index+1}}</td>
										<td style="width: 7%;"><img src="" alt="{{ $biodata->Nama }}" width="80"></td>
										<td>{{ $biodata->Nama }}</td>
										<td>
											@if($biodata->IdDiagnosa == 1) Hiperaktif
											@elseif($biodata->IdDiagnosa == 2) Autis
											@elseif($biodata->IdDiagnosa == 3) Speech Delay
											@elseif($biodata->IdDiagnosa == 4) ADHD
											@elseif($biodata->IdDiagnosa == 5) Lainnya
											@endif
										</td>
										<td>dd/mm/yyyy</td>
										<td>dd/mm/yyyy</td>
										<td width="80">
											<button class="btn btn-default btn-icon-anim btn-circle btn-sm" onclick="window.location.href='/parental_questionnaire_view/{{$biodata->IdAnak}}';"><i class="fa fa-eye"></i></button>
											<button data-toggle="modal" data-target="#responsive-modal{{$biodata->IdAnak}}" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-trash"></i></button>
										</td>
									</tr>
									<div id="responsive-modal{{$biodata->IdAnak}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
										<div class="modal-dialog">
											<form action="/parental_questionnaire_delete/{{$biodata->IdAnak}}" method="POST">
												{{ csrf_field() }}
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Delete Parental</h5>
													</div>
													<div class="modal-body">
														Are you sure to delete {{ $biodata->Nama}} parental data ?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
														<button type="submit" class="btn btn-danger">Yes</button>
													</div>
												</div>
											</form>
										</div>
									</div>
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

@section('scripts')
<!-- jQuery -->
<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

<!-- Form Wizard JavaScript -->
<script src="{{ asset('vendors/bower_components/jquery.steps/build/jquery.steps.min.js') }}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>

<!-- Form Wizard Data JavaScript -->
<script src="{{ asset('dist/js/form-wizard-data.js') }}"></script>

<!-- Data table JavaScript -->
<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>

<!-- Bootstrap Touchspin JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Starrr JavaScript -->
<script src="{{ asset('dist/js/starrr.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>

@endsection
