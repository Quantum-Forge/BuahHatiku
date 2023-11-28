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
			<li><a href="/dashboard">Dashboard</a></li>
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
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="form-wrap">
								<form action="/biodata_insert" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="form-body">
										<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Informasi Anak</h6>
										<hr>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('Nama') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Nama</label>
													<input type="text" id="firstName" class="form-control" name="Nama" placeholder="Isi Nama Anak" value="{{old('Nama')}}">
													@error('Nama')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('AnakKe') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Anak Ke...</label>
													<input type="number" id="lastName" class="form-control" name="AnakKe" placeholder="Anak ke..." value="{{old('AnakKe')}}">
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
														<option disabled selected>Choose...</option>
														<option value="Laki-laki" @if(old('JenisKelamin') == 'Laki-laki') selected @endif>Laki-laki</option>
														<option value="Perempuan" @if(old('JenisKelamin') == 'Perempuan') selected @endif>Perempuan</option>
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
														<input type="text" class="form-control" data-mask="99/99/9999" name="TglLahir" value="{{old('TglLahir')}}">
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div>
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
													<input type="text" class="form-control" name="TempatLahir" placeholder="Isi Tempat Lahir" value="{{old('TempatLahir')}}">
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
														<option disabled selected>Choose...</option>
														<option value="PAUD" @if(old('Pendidikan') == 'PAUD') selected @endif>Pendidikan Anak Usia Dini (PAUD)</option>
														<option value="SD" @if(old('Pendidikan') == 'SD') selected @endif>Sekolah Dasar (SD)</option>
														<option value="SMP" @if(old('Pendidikan') == 'SMP') selected @endif>Sekolah Menengah Pertama (SMP)</option>
														<option value="SMA" @if(old('Pendidikan') == 'SMA') selected @endif>Sekolah Menengah Atas (SMA)</option>
														<option value="SMK" @if(old('Pendidikan') == 'SMK') selected @endif>Sekolah Menengah Kejuruan (SMK)</option>
														<option value="Perguruan_Tinggi_S1" @if(old('Pendidikan') == 'Perguruan_Tinggi_S1') selected @endif>Perguruan Tinggi (Sarjana - S1)</option>
														<option value="Perguruan_Tinggi_S2" @if(old('Pendidikan') == 'Perguruan_Tinggi_S2') selected @endif>Perguruan Tinggi (Magister - S2)</option>
														<option value="Perguruan_Tinggi_S3" @if(old('Pendidikan') == 'Perguruan_Tinggi_S3') selected @endif>Perguruan Tinggi (Doktor - S3)</option>
														<option value="Madrasah_Ibtidaiyah" @if(old('Pendidikan') == 'Madrasah_Ibtidaiyah') selected @endif>Madrasah Ibtidaiyah (MI)</option>
														<option value="Madrasah_Tsanawiyah" @if(old('Pendidikan') == 'Madrasah_Tsanawiyah') selected @endif>Madrasah Tsanawiyah (MTs)</option>
														<option value="Madrasah_Aliyah" @if(old('Pendidikan') == 'Madrasah_Aliyah') selected @endif>Madrasah Aliyah (MA)</option>
														<option value="Pendidikan_Khusus" @if(old('Pendidikan') == 'Pendidikan_Khusus') selected @endif>Pendidikan Khusus</option>
													</select>
													@error('Pendidikan')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<!--/span-->
											<div class="col-md-12">
												<div class="form-group {{ $errors->has('Diagnosa') ? 'has-error has-danger' : '' }}" id="diagnosa">
													<label class="control-label mb-5">Diagnosa</label>
													<div class="row">
														<div class="col-md-6">
															<textarea name="KeteranganDiagnosa" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan Diagnosa...">{{old('KeteranganDiagnosa')}}</textarea>
														</div>
														<div class="col-md-6">
															<div class="radio-list">
																<div class="pl-0">
																	<span class="radio radio-info">
																		<input type="radio" name="Diagnosa" id="hiperaktif" value="1" @if(old('Diagnosa')==1) checked @endif>
																		<label for="hiperaktif">Hiperaktif</label>
																	</span>
																</div>
																<div class="pl-0">
																	<span class="radio radio-info">
																		<input type="radio" name="Diagnosa" id="autis" value="2" @if(old('Diagnosa')==2) checked @endif>
																<label for="autis">Autis</label>
																</span>
																</div>
																<div class="pl-0">
																	<span class="radio radio-info">
																		<input type="radio" name="Diagnosa" id="speech_delay" value="3" @if(old('Diagnosa')==3) checked @endif>
																<label for="speech_delay">Speech Delay</label>
																</span>
																</div>
																<div class="pl-0">
																	<span class="radio radio-info">
																		<input type="radio" name="Diagnosa" id="adhd" value="4" @if(old('Diagnosa')==4) checked @endif>
																		<label for="adhd">ADHD</label>
																	</span>
																</div>
																<div class="pl-0">
																	<span class="radio radio-info">
																		<input type="radio" name="Diagnosa" id="lainnya" value="5" @if(old('Diagnosa')==5) checked @endif>
																<label for="lainnya">Lainnya</label>
																</span>
																</div>
															</div>
														</div>
													</div>
													@error('Diagnosa')
														{{-- <span class="help-block">{{ $message }}</span> --}}
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-12 ">
												<div class="form-group {{ $errors->has('YangMendiagnosa') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Yang Mendiagnosa</label>
													<input type="text" class="form-control" name="YangMendiagnosa" placeholder="Silahkan Isi Form ini..." value="{{old('YangMendiagnosa')}}">
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
													<input type="text" class="form-control" name="NamaBapak" placeholder="Isi Nama Bapak" value="{{old('NamaBapak')}}">
													@error('NamaBapak')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('NamaIbu') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Nama Ibu</label>
													<input type="text" class="form-control" name="NamaIbu" placeholder="Isi Nama Ibu" value="{{old('NamaIbu')}}">
													@error('NamaIbu')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('PendBapak') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Pendidikan Bapak</label>
													<select name="PendBapak" class="form-control">
														<option disabled selected>Choose...</option>
														<option value="PAUD" @if(old('PendBapak') == 'PAUD') selected @endif>Pendidikan Anak Usia Dini (PAUD)</option>
														<option value="SD" @if(old('PendBapak') == 'SD') selected @endif>Sekolah Dasar (SD)</option>
														<option value="SMP" @if(old('PendBapak') == 'SMP') selected @endif>Sekolah Menengah Pertama (SMP)</option>
														<option value="SMA" @if(old('PendBapak') == 'SMA') selected @endif>Sekolah Menengah Atas (SMA)</option>
														<option value="SMK" @if(old('PendBapak') == 'SMK') selected @endif>Sekolah Menengah Kejuruan (SMK)</option>
														<option value="Perguruan_Tinggi_S1" @if(old('PendBapak') == 'Perguruan_Tinggi_S1') selected @endif>Perguruan Tinggi (Sarjana - S1)</option>
														<option value="Perguruan_Tinggi_S2" @if(old('PendBapak') == 'Perguruan_Tinggi_S2') selected @endif>Perguruan Tinggi (Magister - S2)</option>
														<option value="Perguruan_Tinggi_S3" @if(old('PendBapak') == 'Perguruan_Tinggi_S3') selected @endif>Perguruan Tinggi (Doktor - S3)</option>
														<option value="Madrasah_Ibtidaiyah" @if(old('PendBapak') == 'Madrasah_Ibtidaiyah') selected @endif>Madrasah Ibtidaiyah (MI)</option>
														<option value="Madrasah_Tsanawiyah" @if(old('PendBapak') == 'Madrasah_Tsanawiyah') selected @endif>Madrasah Tsanawiyah (MTs)</option>
														<option value="Madrasah_Aliyah" @if(old('PendBapak') == 'Madrasah_Aliyah') selected @endif>Madrasah Aliyah (MA)</option>
														<option value="Pendidikan_Khusus" @if(old('PendBapak') == 'Pendidikan_Khusus') selected @endif>Pendidikan Khusus</option>
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
														<option disabled selected>Choose...</option>
														<option value="PAUD" @if(old('PendIbu') == 'PAUD') selected @endif>Pendidikan Anak Usia Dini (PAUD)</option>
														<option value="SD" @if(old('PendIbu') == 'SD') selected @endif>Sekolah Dasar (SD)</option>
														<option value="SMP" @if(old('PendIbu') == 'SMP') selected @endif>Sekolah Menengah Pertama (SMP)</option>
														<option value="SMA" @if(old('PendIbu') == 'SMA') selected @endif>Sekolah Menengah Atas (SMA)</option>
														<option value="SMK" @if(old('PendIbu') == 'SMK') selected @endif>Sekolah Menengah Kejuruan (SMK)</option>
														<option value="Perguruan_Tinggi_S1" @if(old('PendIbu') == 'Perguruan_Tinggi_S1') selected @endif>Perguruan Tinggi (Sarjana - S1)</option>
														<option value="Perguruan_Tinggi_S2" @if(old('PendIbu') == 'Perguruan_Tinggi_S2') selected @endif>Perguruan Tinggi (Magister - S2)</option>
														<option value="Perguruan_Tinggi_S3" @if(old('PendIbu') == 'Perguruan_Tinggi_S3') selected @endif>Perguruan Tinggi (Doktor - S3)</option>
														<option value="Madrasah_Ibtidaiyah" @if(old('PendIbu') == 'Madrasah_Ibtidaiyah') selected @endif>Madrasah Ibtidaiyah (MI)</option>
														<option value="Madrasah_Tsanawiyah" @if(old('PendIbu') == 'Madrasah_Tsanawiyah') selected @endif>Madrasah Tsanawiyah (MTs)</option>
														<option value="Madrasah_Aliyah" @if(old('PendIbu') == 'Madrasah_Aliyah') selected @endif>Madrasah Aliyah (MA)</option>
														<option value="Pendidikan_Khusus" @if(old('PendIbu') == 'Pendidikan_Khusus') selected @endif>Pendidikan Khusus</option>
													</select>
													@error('PendIbu')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-12 ">
												<div class="form-group {{ $errors->has('Alamat') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Alamat</label>
													<textarea type="text" class="form-control" rows="7" name="Alamat" placeholder="Silahkan Isi Form ini...">{{old('Alamat')}}</textarea>
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
														<input type="text" class="form-control" data-mask="99/99/9999" name="TglLahirOrtu" value="{{old('TglLahirOrtu')}}">
														<span class="input-group-addon">
															<span class="fa fa-calendar"></span>
														</span>
													</div>
													@error('TglLahirOrtu')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group {{ $errors->has('NoHP') ? 'has-error' : '' }}">
													<label class="control-label mb-10">Phone Number</label>
													<input type="number" class="form-control" name="NoHP" value="{{old('NoHP')}}">
													@error('NoHP')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<!--/span-->
										</div>
										<!-- /Row -->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group {{ $errors->has('Email') ? 'has-error' : '' }}">
													<label class="control-label mb-10">E-mail</label>
													<input type="email" class="form-control" name="Email" value="{{old('Email')}}">
													@error('Email')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label mb-10">Foto</label>
													<input type="file" id="input-file-now" class="dropify" name="photo" data-allowed-file-extensions="jpg png jpeg" />
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions mt-10">
										<button type="submit" class="btn btn-success  mr-10"> Save</button>
										<a href="/dashboard" class="btn btn-default">Cancel</a>
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
