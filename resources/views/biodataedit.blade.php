@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Biodata Anak</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li class="active"><span>Biodata</span></li>
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
								<form action="/biodata_edit" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="form-body">
										<input type="hidden" name="IdAnak" value="{{$biodata->IdAnak}}">
										<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Informasi Anak</h6>
										<hr>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('Nama') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Nama</label>
													<input type="text" id="firstName" class="form-control" name="Nama" placeholder="Isi Nama Anak" value="{{old('Nama', $biodata->Nama)}}">
													@error('Nama')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('AnakKe') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Anak Ke...</label>
													<input type="number" id="lastName" class="form-control" name="AnakKe" placeholder="Anak ke..." value="{{old('AnakKe', $biodata->AnakKe)}}">
													@error('AnakKe')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
										</div>
										<!-- /Row -->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('JenisKelamin') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Jenis Kelamin</label>
													<select class="form-control" name="JenisKelamin">
														<option @if (old('JenisKelamin', $biodata->JenisKelamin) == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
														<option @if (old('JenisKelamin', $biodata->JenisKelamin) == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
													</select>
													@error('JenisKelamin')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('TglLahir') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Tanggal Lahir</label>
													<div class="input-group date" id="TglLahir">
														<input type="text" data-mask="99/99/9999" class="form-control" name="TglLahir" value="{{old('TglLahir', $biodata->TglLahir)}}">
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div>
													<!-- <input type="date" class="form-control" name="TglLahir" value="{{old('TglLahir', $biodata->TglLahir)}}"> -->
													@error('TglLahir')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
										</div>
										<!-- /Row -->
										<div class="row">
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('TempatLahir') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Tempat Lahir</label>
													<input type="text" class="form-control" name="TempatLahir" placeholder="Isi Tempat Lahir" value="{{old('TempatLahir', $biodata->TempatLahir)}}">
													@error('TempatLahir')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('Pendidikan') ? 'has-error' : '' }}">
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
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<!--/span-->
											<div class="col-md-12">
												<div class="form-group {{ $errors->has('Diagnosa') ? 'has-error' : '' }}">
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
															{{-- <span class="help-block">{{ $message }}</span> --}}
														@enderror
													</div>
													<textarea name="KeteranganDiagnosa" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan Diagnosa...">{{old('KeteranganDiagnosa', $biodata->KeteranganDiagnosa)}}</textarea>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-12 ">
												<div class="form-group {{ $errors->has('YangMendiagnosa') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Yang Mendiagnosa</label>
													<input type="text" class="form-control" name="YangMendiagnosa" placeholder="Silahkan Isi Form ini..." value="{{old('YangMendiagnosa', $biodata->YangMendiagnosa)}}">
													@error('YangMendiagnosa')
														<span class="help-block">{{ $message }}</span>
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
												<div class="form-group {{ $errors->has('NamaBapak') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Nama Bapak</label>
													<input type="text" class="form-control" name="NamaBapak" placeholder="Isi Nama Bapak" value="{{old('NamaBapak', $biodata->NamaBapak)}}">
													@error('NamaBapak')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('NamaIbu') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Nama Ibu</label>
													<input type="text" class="form-control" name="NamaIbu" placeholder="Isi Nama Ibu" value="{{old('NamaIbu', $biodata->NamaIbu)}}">
													@error('NamaIbu')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('PendBapak') ? 'has-error' : '' }}">
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
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('PendIbu') ? 'has-error' : '' }}">
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
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-12 ">
												<div class="form-group {{ $errors->has('Alamat') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Alamat</label>
													<textarea type="text" class="form-control" rows="7" name="Alamat" placeholder="Silahkan Isi Form ini...">{{old('Alamat', $biodata->Alamat)}}</textarea>
													@error('Alamat')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('TglLahirOrtu') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Tanggal Lahir Ibu</label>
													<div class="input-group date" id="TglLahirOrtu">
														<input type="text" data-mask="99/99/9999" class="form-control" name="TglLahirOrtu" value="{{old('TglLahirOrtu', $biodata->TglLahirOrtu)}}">
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div>
													<!-- <input type="date" class="form-control" name="TglLahirOrtu" value="{{old('TglLahirOrtu', $biodata->TglLahirOrtu)}}"> -->
													@error('TglLahirOrtu')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('NoHP') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Phone Number</label>
													<input type="number" class="form-control" name="NoHP" value="{{old('NoHP', $biodata->NoHP)}}">
													@error('NoHP')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
										</div>
										<!-- /Row -->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('Email') ? 'has-error' : '' }}">
													<label class="control-label mb-10">E-mail</label>
													<input type="email" class="form-control" name="Email" value="{{old('Email', $biodata->Email)}}">
													@error('Email')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('TanggalMasuk') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Tanggal Masuk</label>
													<div class="input-group date" id="TanggalMasuk">
														<input type="text" data-mask="99/99/9999" class="form-control" name="TanggalMasuk" value="{{old('TanggalMasuk', $biodata->TglMasuk)}}">
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div>
													<!-- <input type="date" class="form-control" name="TanggalMasuk" value="{{old('TanggalMasuk', $biodata->TglMasuk)}}"> -->
													@error('TanggalMasuk')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-12">
												<div class="form-group {{ $errors->has('NoHP') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Foto</label>
													<input type="file" id="input-file-now" class="dropify" name="photo" data-allowed-file-extensions="jpg png jpeg" />
													@error('photo')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
										</div>
										
									</div>
									<div class="form-actions mt-10">
										<button type="submit" class="btn btn-success  mr-10"> Save</button>
										<button type="button" class="btn btn-default" onclick="window.location.href='/biodata_view';">Cancel</button>
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


<!-- Moment JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
		
<!-- Bootstrap Colorpicker JavaScript -->
<script src="{{ asset('vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
		
<!-- Bootstrap Datetimepicker JavaScript -->
<script type="text/javascript" src="{{ asset('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Bootstrap Daterangepicker JavaScript -->
<script src="{{ asset('vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- Form Picker Init JavaScript -->
<script src="{{ asset('dist/js/form-picker-data.js') }}"></script>

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
