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
					<h6 class="panel-title txt-dark">Biodata Anak</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="form-wrap">
								<form action="/biodata_edit" method="POST">
									{{ csrf_field() }}
									<div class="form-body">
										<input type="hidden" name="IdAnak" value="{{$biodata->IdAnak}}">
										<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Informasi Anak</h6>
										<hr>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Nama</label>
													<input type="text" id="firstName" class="form-control" name="Nama" placeholder="Isi Nama Anak" value="{{old('Nama', $biodata->Nama)}}">
													@error('Nama')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Anak Ke...</label>
													<input type="number" id="lastName" class="form-control" name="AnakKe" placeholder="Anak ke..." value="{{old('AnakKe', $biodata->AnakKe)}}">
													@error('AnakKe')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<!--/span-->
										</div>
										<!-- /Row -->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Jenis Kelamin</label>
													<select class="form-control" name="JenisKelamin">
														<option @if (old('JenisKelamin', $biodata->JenisKelamin) == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
														<option @if (old('JenisKelamin', $biodata->JenisKelamin) == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
													</select>
													@error('JenisKelamin')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Tanggal Lahir</label>
													<input type="date" class="form-control" name="TglLahir" value="{{old('TglLahir', $biodata->TglLahir)}}">
													@error('TglLahir')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
										</div>
										<!-- /Row -->
										<div class="row">
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Tempat Lahir</label>
													<input type="text" class="form-control" name="TempatLahir" placeholder="Isi Tempat Lahir" value="{{old('TempatLahir', $biodata->TempatLahir)}}">
													@error('TempatLahir')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<!--/span-->
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Pendidikan</label>
													<select name="Pendidikan" class="form-control">
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "PAUD") selected @endif value="PAUD">Pendidikan Anak Usia Dini (PAUD)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "SD") selected @endif value="SD">Sekolah Dasar (SD)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "SMP") selected @endif value="SMP">Sekolah Menengah Pertama (SMP)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "SMA") selected @endif value="SMA">Sekolah Menengah Atas (SMA)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "SMK") selected @endif value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "Perguruan_Tinggi_S1") selected @endif value="Perguruan_Tinggi_S1">Perguruan Tinggi (Sarjana - S1)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "Perguruan_Tinggi_S2") selected @endif value="Perguruan_Tinggi_S2">Perguruan Tinggi (Magister - S2)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "Perguruan_Tinggi_S3") selected @endif value="Perguruan_Tinggi_S3">Perguruan Tinggi (Doktor - S3)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "Madrasah_Ibtidaiyah") selected @endif value="Madrasah_Ibtidaiyah">Madrasah Ibtidaiyah (MI)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "Madrasah_Tsanawiyah") selected @endif value="Madrasah_Tsanawiyah">Madrasah Tsanawiyah (MTs)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "Madrasah_Aliyah") selected @endif value="Madrasah_Aliyah">Madrasah Aliyah (MA)</option>
														<option @if(old('Pendidikan', $biodata->Pendidikan) == "Pendidikan_Khusus") selected @endif value="Pendidikan_Khusus">Pendidikan Khusus</option>
													</select>
													@error('Pendidikan')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<!--/span-->
											<!--/span-->
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label mb-5">Diagnosa</label>
													<div class="radio-list">
														<div class="radio-inline pl-0">
															<span class="radio radio-info">
																<input type="radio" name="Diagnosa" @if(old('IdDiagnosa', $biodata->IdDiagnosa) == 1) checked @endif id="hiperaktif" value="1">
																<label for="hiperaktif">Hiperaktif</label>
															</span>
														</div>
														<div class="radio-inline">
															<span class="radio radio-info">
																<input type="radio" name="Diagnosa" @if(old('IdDiagnosa', $biodata->IdDiagnosa) == 2) checked @endif id="autis" value="2">
														<label for="autis">Autis</label>
														</span>
														</div>
														<div class="radio-inline">
															<span class="radio radio-info">
																<input type="radio" name="Diagnosa" @if(old('IdDiagnosa', $biodata->IdDiagnosa) == 3) checked @endif id="speech_delay" value="3">
														<label for="speech_delay">Speech Delay</label>
														</span>
														</div>
														<div class="radio-inline">
															<span class="radio radio-info">
																<input type="radio" name="Diagnosa" @if(old('IdDiagnosa', $biodata->IdDiagnosa) == 4) checked @endif id="adhd" value="4">
														<label for="adhd">ADHD</label>
														</span>
														</div>
														<div class="radio-inline">
															<span class="radio radio-info">
																<input type="radio" name="Diagnosa" @if(old('IdDiagnosa', $biodata->IdDiagnosa) == 5) checked @endif id="lainnya" value="5">
														<label for="lainnya">Lainnya</label>
														</span>
														</div>
														@error('Diagnosa')
															<div class="alert alert-danger">{{ $message }}</div>
														@enderror
													</div>
													<textarea name="KeteranganDiagnosa" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan Diagnosa...">{{old('KeteranganDiagnosa', $biodata->KeteranganDiagnosa)}}</textarea>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-12 ">
												<div class="form-group">
													<label class="control-label mb-10">Yang Mendiagnosa</label>
													<input type="text" class="form-control" name="YangMendiagnosa" placeholder="Silahkan Isi Form ini..." value="{{old('YangMendiagnosa', $biodata->YangMendiagnosa)}}">
													@error('YangMendiagnosa')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
										</div>
										<!-- /Row -->
										
										<div class="seprator-block"></div>
										
										<h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>Data Orang tua</h6>
										<hr>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Nama Bapak</label>
													<input type="text" class="form-control" name="NamaBapak" placeholder="Isi Nama Bapak" value="{{old('NamaBapak', $biodata->NamaBapak)}}">
													@error('NamaBapak')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Nama Ibu</label>
													<input type="text" class="form-control" name="NamaIbu" placeholder="Isi Nama Ibu" value="{{old('NamaIbu', $biodata->NamaIbu)}}">
													@error('NamaIbu')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Pendidikan Bapak</label>
													<select name="PendBapak" class="form-control">
														<option @if(old('PendBapak', $biodata->PendBapak) == "PAUD") selected @endif value="PAUD">Pendidikan Anak Usia Dini (PAUD)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "SD") selected @endif value="SD">Sekolah Dasar (SD)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "SMP") selected @endif value="SMP">Sekolah Menengah Pertama (SMP)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "SMA") selected @endif value="SMA">Sekolah Menengah Atas (SMA)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "SMK") selected @endif value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "Perguruan_Tinggi_S1") selected @endif value="Perguruan_Tinggi_S1">Perguruan Tinggi (Sarjana - S1)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "Perguruan_Tinggi_S2") selected @endif value="Perguruan_Tinggi_S2">Perguruan Tinggi (Magister - S2)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "Perguruan_Tinggi_S3") selected @endif value="Perguruan_Tinggi_S3">Perguruan Tinggi (Doktor - S3)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "Madrasah_Ibtidaiyah") selected @endif value="Madrasah_Ibtidaiyah">Madrasah Ibtidaiyah (MI)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "Madrasah_Tsanawiyah") selected @endif value="Madrasah_Tsanawiyah">Madrasah Tsanawiyah (MTs)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "Madrasah_Aliyah") selected @endif value="Madrasah_Aliyah">Madrasah Aliyah (MA)</option>
														<option @if(old('PendBapak', $biodata->PendBapak) == "Pendidikan_Khusus") selected @endif value="Pendidikan_Khusus">Pendidikan Khusus</option>
													</select>
													@error('PendBapak')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Pendidikan Ibu</label>
													<select name="PendIbu" class="form-control">
														<option @if(old('PendIbu', $biodata->PendIbu) == "PAUD") selected @endif value="PAUD">Pendidikan Anak Usia Dini (PAUD)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "SD") selected @endif value="SD">Sekolah Dasar (SD)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "SMP") selected @endif value="SMP">Sekolah Menengah Pertama (SMP)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "SMA") selected @endif value="SMA">Sekolah Menengah Atas (SMA)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "SMK") selected @endif value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "Perguruan_Tinggi_S1") selected @endif value="Perguruan_Tinggi_S1">Perguruan Tinggi (Sarjana - S1)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "Perguruan_Tinggi_S2") selected @endif value="Perguruan_Tinggi_S2">Perguruan Tinggi (Magister - S2)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "Perguruan_Tinggi_S3") selected @endif value="Perguruan_Tinggi_S3">Perguruan Tinggi (Doktor - S3)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "Madrasah_Ibtidaiyah") selected @endif value="Madrasah_Ibtidaiyah">Madrasah Ibtidaiyah (MI)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "Madrasah_Tsanawiyah") selected @endif value="Madrasah_Tsanawiyah">Madrasah Tsanawiyah (MTs)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "Madrasah_Aliyah") selected @endif value="Madrasah_Aliyah">Madrasah Aliyah (MA)</option>
														<option @if(old('PendIbu', $biodata->PendIbu) == "Pendidikan_Khusus") selected @endif value="Pendidikan_Khusus">Pendidikan Khusus</option>
													</select>
													@error('PendIbu')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="col-md-12 ">
												<div class="form-group">
													<label class="control-label mb-10">Alamat</label>
													<textarea type="text" class="form-control" rows="7" name="Alamat" placeholder="Silahkan Isi Form ini...">{{old('Alamat', $biodata->Alamat)}}</textarea>
													@error('Alamat')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Tanggal Lahir Bapak/Ibu</label>
													<input type="date" class="form-control" name="TglLahirOrtu" value="{{old('TglLahirOrtu', $biodata->TglLahirOrtu)}}">
													@error('TglLahirOrtu')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
													{{-- <div class="input-group date" name="TglLahirOrtu" id="TglLahirOrtu">
														<input type="text" data-mask="99/99/9999" class="form-control">
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div> --}}
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Phone Number</label>
													<input type="number" class="form-control" name="NoHP" value="{{old('NoHP', $biodata->NoHP)}}">
													@error('NoHP')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<!--/span-->
										</div>
										<!-- /Row -->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label mb-10">E-mail</label>
													<input type="email" class="form-control" name="Email" value="{{old('Email', $biodata->Email)}}">
													@error('Email')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
										</div>
										<label class="control-label mb-10">Foto</label>
										<input type="file" id="input-file-now" class="dropify" name="photo" data-allowed-file-extensions="jpg png jpeg" />
										@error('photo')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-actions mt-10">
										<button type="submit" class="btn btn-success  mr-10"> Save</button>
										<button type="button" class="btn btn-default">Cancel</button>
									</div>
								</form>
							</div>
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

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
<!-- Bootstrap Dropify JavaScript -->
<script src="{{ asset('vendors/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
<!-- Form Flie Upload Data JavaScript -->
<script src="{{ asset('dist/js/form-file-upload-data.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>

@endsection
