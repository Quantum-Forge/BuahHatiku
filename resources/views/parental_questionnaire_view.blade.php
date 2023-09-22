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
					<div id="example-basic">
						<h3><span class="number"><i class="ti-info txt-black"></i></span><span class="head-font capitalize-font">Nama Anak</span></h3>
						<section>
							<!-- Row -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-wrap">
										<div class="form-horizontal">
											<div class="form-body">
												<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>patient's Info</h6>
												<hr>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nama:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->Nama}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Anak ke...:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->AnakKe}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!-- /Row -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Jenis Kelamin:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->JenisKelamin}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tanggal Lahir:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->TglLahir}}</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tempat Lahir:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->TempatLahir}}</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Pendidikan:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	@if($biodata->Pendidikan=='PAUD') Pendidikan Anak Usia Dini (PAUD) @endif
																	@if($biodata->Pendidikan=='SD') Sekolah Dasar (SD) @endif
																	@if($biodata->Pendidikan=='SMP') Sekolah Menengah Pertama (SMP) @endif
																	@if($biodata->Pendidikan=='SMA') Sekolah Menengah Atas (SMA) @endif
																	@if($biodata->Pendidikan=='SMK') Sekolah Menengah Kejuruan (SMK) @endif
																	@if($biodata->Pendidikan=='Perguruan_Tinggi_S1') Perguruan Tinggi (Sarjana - S1) @endif
																	@if($biodata->Pendidikan=='Perguruan_Tinggi_S2') Perguruan Tinggi (Magister - S2) @endif
																	@if($biodata->Pendidikan=='Perguruan_Tinggi_S3') Perguruan Tinggi (Doktor - S3) @endif
																	@if($biodata->Pendidikan=='Madrasah_Ibtidaiyah') Madrasah Ibtidaiyah (MI) @endif
																	@if($biodata->Pendidikan=='Madrasah_Tsanawiyah') Madrasah Tsanawiyah (MTs) @endif
																	@if($biodata->Pendidikan=='Madrasah_Aliyah') Madrasah Aliyah (MA) @endif
																	@if($biodata->Pendidikan=='Pendidikan_Khusus') Pendidikan Khusus @endif
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!-- /Row -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Diagnosa:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																@if($biodata->IdDiagnosa == 1) Hiperaktif
																@elseif($biodata->IdDiagnosa == 2) Autis
																@elseif($biodata->IdDiagnosa == 3) Speech Delay
																@elseif($biodata->IdDiagnosa == 4) ADHD
																@elseif($biodata->IdDiagnosa == 5) Lainnya
																@endif
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Pemeriksa:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->YangMendiagnosa}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!-- /Row -->
												
												<div class="seprator-block"></div>
												
												<h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>data orang tua</h6>
												<hr>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ayah:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->NamaBapak}}</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ibu:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->NamaIbu}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"> Pendidikan:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	@if($biodata->PendBapak=='PAUD') Pendidikan Anak Usia Dini (PAUD) @endif
																	@if($biodata->PendBapak=='SD') Sekolah Dasar (SD) @endif
																	@if($biodata->PendBapak=='SMP') Sekolah Menengah Pertama (SMP) @endif
																	@if($biodata->PendBapak=='SMA') Sekolah Menengah Atas (SMA) @endif
																	@if($biodata->PendBapak=='SMK') Sekolah Menengah Kejuruan (SMK) @endif
																	@if($biodata->PendBapak=='Perguruan_Tinggi_S1') Perguruan Tinggi (Sarjana - S1) @endif
																	@if($biodata->PendBapak=='Perguruan_Tinggi_S2') Perguruan Tinggi (Magister - S2) @endif
																	@if($biodata->PendBapak=='Perguruan_Tinggi_S3') Perguruan Tinggi (Doktor - S3) @endif
																	@if($biodata->PendBapak=='Madrasah_Ibtidaiyah') Madrasah Ibtidaiyah (MI) @endif
																	@if($biodata->PendBapak=='Madrasah_Tsanawiyah') Madrasah Tsanawiyah (MTs) @endif
																	@if($biodata->PendBapak=='Madrasah_Aliyah') Madrasah Aliyah (MA) @endif
																	@if($biodata->PendBapak=='Pendidikan_Khusus') Pendidikan Khusus @endif
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Pendidikan:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	@if($biodata->PendIbu=='PAUD') Pendidikan Anak Usia Dini (PAUD) @endif
																	@if($biodata->PendIbu=='SD') Sekolah Dasar (SD) @endif
																	@if($biodata->PendIbu=='SMP') Sekolah Menengah Pertama (SMP) @endif
																	@if($biodata->PendIbu=='SMA') Sekolah Menengah Atas (SMA) @endif
																	@if($biodata->PendIbu=='SMK') Sekolah Menengah Kejuruan (SMK) @endif
																	@if($biodata->PendIbu=='Perguruan_Tinggi_S1') Perguruan Tinggi (Sarjana - S1) @endif
																	@if($biodata->PendIbu=='Perguruan_Tinggi_S2') Perguruan Tinggi (Magister - S2) @endif
																	@if($biodata->PendIbu=='Perguruan_Tinggi_S3') Perguruan Tinggi (Doktor - S3) @endif
																	@if($biodata->PendIbu=='Madrasah_Ibtidaiyah') Madrasah Ibtidaiyah (MI) @endif
																	@if($biodata->PendIbu=='Madrasah_Tsanawiyah') Madrasah Tsanawiyah (MTs) @endif
																	@if($biodata->PendIbu=='Madrasah_Aliyah') Madrasah Aliyah (MA) @endif
																	@if($biodata->PendIbu=='Pendidikan_Khusus') Pendidikan Khusus @endif
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alamat:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->Alamat}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">DOB Ayah/Ibu:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->TglLahirOrtu}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Handphone:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->NoHP}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email:</label>
															<div class="col-md-9">
																<p class="form-control-static">{{$biodata->Email}}</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
						</section>
						<h3><span class="number"><i class="ti-microphone-alt txt-black"></i></span><span class="head-font capitalize-font">Speech</span></h3>
						<section>
							@php($counter = 1)
							@foreach( $biodata->parental_questionnaires as $parental)
								@if($parental->questionnaire->IdJenis == 1)
									<div class="row">
										<div class="col-sm-12">
											<div class="form-wrap">
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label class="control-label mb-10" for="">{{$counter++}}.{{$parental->questionnaire->Pertanyaan}}</label>
															<div class="radio-list">
																<div class="col-sm-12">
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio1" value="option1" @if($parental->Jawaban=='Ya') checked @endif>
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio2" value="option2" @if($parental->Jawaban=='Kadang-kadang') checked @endif>
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio3" value="option3" @if($parental->Jawaban=='Tidak') checked @endif>
																		<label for="radio3"> Tidak </label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</section>
						<h3><span class="number"><i class="ti-thought txt-black"></i></span><span class="head-font capitalize-font">Sosialisasi</span></h3>
						<section>
							@php($counter = 1)
							@foreach( $biodata->parental_questionnaires as $parental)
								@if($parental->questionnaire->IdJenis == 2)
									<div class="row">
										<div class="col-sm-12">
											<div class="form-wrap">
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label class="control-label mb-10" for="">{{$counter++}}.{{$parental->questionnaire->Pertanyaan}}</label>
															<div class="radio-list">
																<div class="col-sm-12">
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio1" value="option1" @if($parental->Jawaban=='Ya') checked @endif>
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio2" value="option2" @if($parental->Jawaban=='Kadang-kadang') checked @endif>
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio3" value="option3" @if($parental->Jawaban=='Tidak') checked @endif>
																		<label for="radio3"> Tidak </label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</section>
						<h3><span class="number"><i class="ti-rss-alt txt-black"></i></span><span class="head-font capitalize-font">Sensory</span></h3>
						<section>
							@php($counter = 1)
							@foreach( $biodata->parental_questionnaires as $parental)
								@if($parental->questionnaire->IdJenis == 3)
									<div class="row">
										<div class="col-sm-12">
											<div class="form-wrap">
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label class="control-label mb-10" for="">{{$counter++}}.{{$parental->questionnaire->Pertanyaan}}</label>
															<div class="radio-list">
																<div class="col-sm-12">
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio1" value="option1" @if($parental->Jawaban=='Ya') checked @endif>
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio2" value="option2" @if($parental->Jawaban=='Kadang-kadang') checked @endif>
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio3" value="option3" @if($parental->Jawaban=='Tidak') checked @endif>
																		<label for="radio3"> Tidak </label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</section>
						<h3><span class="number"><i class="ti-heart-broken txt-black"></i></span><span class="head-font capitalize-font">Kesehatan</span></h3>
						<section>
							@php($counter = 1)
							@foreach( $biodata->parental_questionnaires as $parental)
								@if($parental->questionnaire->IdJenis == 4)
									<div class="row">
										<div class="col-sm-12">
											<div class="form-wrap">
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<label class="control-label mb-10" for="">{{$counter++}}.{{$parental->questionnaire->Pertanyaan}}</label>
															<div class="radio-list">
																<div class="col-sm-12">
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio1" value="option1" @if($parental->Jawaban=='Ya') checked @endif>
																		<label for="radio1"> Ya </label>
																	</div>
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio2" value="option2" @if($parental->Jawaban=='Kadang-kadang') checked @endif>
																		<label for="radio2"> Kadang-kadang </label>
																	</div>
																	<div class="radio">
																		<input type="radio" disabled name="answer[{{$parental->IdQuestionaire}}]" id="radio3" value="option3" @if($parental->Jawaban=='Tidak') checked @endif>
																		<label for="radio3"> Tidak </label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</section>
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
