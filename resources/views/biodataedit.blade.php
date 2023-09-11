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
								<form action="#">
									<div class="form-body">
										<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Informasi Anak</h6>
										<hr>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Name</label>
													<input type="text" id="firstName" class="form-control" placeholder="Isi Nama Anak">
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Anak Ke...</label>
													<input type="number" id="lastName" class="form-control" placeholder="Anak ke...">
												</div>
											</div>
											<!--/span-->
										</div>
										<!-- /Row -->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Sex</label>
													<select class="form-control">
														<option value="">Male</option>
														<option value="">Female</option>
													</select>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Date of Birth</label>
													<input type="date" class="form-control">
												</div>
											</div>
										</div>
										<!-- /Row -->
										<div class="row">
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Place Of Birth</label>
													<input type="text" class="form-control" placeholder="Isi Tempat Lahir">
												</div>
											</div>
											<!--/span-->
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Pendidikan</label>
													<select name="" class="form-control">
														<option value="PAUD">Pendidikan Anak Usia Dini (PAUD)</option>
														<option value="SD">Sekolah Dasar (SD)</option>
														<option value="SMP">Sekolah Menengah Pertama (SMP)</option>
														<option value="SMA">Sekolah Menengah Atas (SMA)</option>
														<option value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
														<option value="Perguruan_Tinggi_S1">Perguruan Tinggi (Sarjana - S1)</option>
														<option value="Perguruan_Tinggi_S2">Perguruan Tinggi (Magister - S2)</option>
														<option value="Perguruan_Tinggi_S3">Perguruan Tinggi (Doktor - S3)</option>
														<option value="Madrasah_Ibtidaiyah">Madrasah Ibtidaiyah (MI)</option>
														<option value="Madrasah_Tsanawiyah">Madrasah Tsanawiyah (MTs)</option>
														<option value="Madrasah_Aliyah">Madrasah Aliyah (MA)</option>
														<option value="Pendidikan_Khusus">Pendidikan Khusus</option>
													</select>
													
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
																<input type="radio" name="radio5" id="hiperaktif" value="option1">
																<label for="hiperaktif">Hiperaktif</label>
															</span>
														</div>
														<div class="radio-inline">
															<span class="radio radio-info">
																<input type="radio" name="radio5" id="speech_delay" value="option2">
														<label for="speech_delay">Autis</label>
														</span>
														</div>
														<div class="radio-inline">
															<span class="radio radio-info">
																<input type="radio" name="radio5" id="speech_delay" value="option2">
														<label for="speech_delay">Speech Delay</label>
														</span>
														</div>
														<div class="radio-inline">
															<span class="radio radio-info">
																<input type="radio" name="radio5" id="adhd" value="option2">
														<label for="adhd">ADHD</label>
														</span>
														</div>
														<div class="radio-inline">
															<span class="radio radio-info">
																<input type="radio" name="radio5" id="lainnya" value="option2">
														<label for="lainnya">Lainnya</label>
														</span>
														</div>
													</div>
													<textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Keterangan Diagnosa..."></textarea>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-12 ">
												<div class="form-group">
													<label class="control-label mb-10">Yang Mendiagnosa</label>
													<input type="text" class="form-control" placeholder="Silahkan Isi Form ini...">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Pendidikan Bapak</label>
													<select name="" class="form-control">
														<option value="PAUD">Pendidikan Anak Usia Dini (PAUD)</option>
														<option value="SD">Sekolah Dasar (SD)</option>
														<option value="SMP">Sekolah Menengah Pertama (SMP)</option>
														<option value="SMA">Sekolah Menengah Atas (SMA)</option>
														<option value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
														<option value="Perguruan_Tinggi_S1">Perguruan Tinggi (Sarjana - S1)</option>
														<option value="Perguruan_Tinggi_S2">Perguruan Tinggi (Magister - S2)</option>
														<option value="Perguruan_Tinggi_S3">Perguruan Tinggi (Doktor - S3)</option>
														<option value="Madrasah_Ibtidaiyah">Madrasah Ibtidaiyah (MI)</option>
														<option value="Madrasah_Tsanawiyah">Madrasah Tsanawiyah (MTs)</option>
														<option value="Madrasah_Aliyah">Madrasah Aliyah (MA)</option>
														<option value="Pendidikan_Khusus">Pendidikan Khusus</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Pendidikan Ibu</label>
													<select name="" class="form-control">
														<option value="PAUD">Pendidikan Anak Usia Dini (PAUD)</option>
														<option value="SD">Sekolah Dasar (SD)</option>
														<option value="SMP">Sekolah Menengah Pertama (SMP)</option>
														<option value="SMA">Sekolah Menengah Atas (SMA)</option>
														<option value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
														<option value="Perguruan_Tinggi_S1">Perguruan Tinggi (Sarjana - S1)</option>
														<option value="Perguruan_Tinggi_S2">Perguruan Tinggi (Magister - S2)</option>
														<option value="Perguruan_Tinggi_S3">Perguruan Tinggi (Doktor - S3)</option>
														<option value="Madrasah_Ibtidaiyah">Madrasah Ibtidaiyah (MI)</option>
														<option value="Madrasah_Tsanawiyah">Madrasah Tsanawiyah (MTs)</option>
														<option value="Madrasah_Aliyah">Madrasah Aliyah (MA)</option>
														<option value="Pendidikan_Khusus">Pendidikan Khusus</option>
													</select>
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
													<input type="text" class="form-control" placeholder="Isi Nama Bapak">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Nama Ibu</label>
													<input type="text" class="form-control" placeholder="Isi Nama Ibu">
												</div>
											</div>
											<div class="col-md-12 ">
												<div class="form-group">
													<label class="control-label mb-10">Alamat</label>
													<textarea type="text" class="form-control" rows="7" placeholder="Silahkan Isi Form ini..."></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Usia Bapak/Ibu</label>
													<input type="number" class="form-control">
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label mb-10">Phone Number</label>
													<input type="number" class="form-control">
												</div>
											</div>
											<!--/span-->
										</div>
										<!-- /Row -->
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label mb-10">E-mail</label>
													<input type="email" class="form-control">
												</div>
											</div>
										</div>
										<label class="control-label mb-10">Foto</label>
										<input type="file" id="input-file-now" class="dropify" data-allowed-file-extensions="jpg png jpeg" />
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
