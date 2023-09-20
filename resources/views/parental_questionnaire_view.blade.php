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
																<p class="form-control-static"> John </p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Anak ke...:</label>
															<div class="col-md-9">
																<p class="form-control-static"> Doe </p>
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
																<p class="form-control-static"> Male </p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tanggal Lahir:</label>
															<div class="col-md-9">
																<p class="form-control-static"> 24/05/1990 </p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Tempat Lahir:</label>
															<div class="col-md-9">
																<p class="form-control-static"> 24/05/1990 </p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Pendidikan:</label>
															<div class="col-md-9">
																<p class="form-control-static"> 24/05/1990 </p>
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
																<p class="form-control-static"> Category1 </p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Pemeriksa:</label>
															<div class="col-md-9">
																<p class="form-control-static"> Free </p>
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
																<p class="form-control-static"> 827 Deerfield Ave. Greenwood</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Ibu:</label>
															<div class="col-md-9">
																<p class="form-control-static"> Los Angeles </p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"> Pendidikan:</label>
															<div class="col-md-9">
																<p class="form-control-static"> California</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Pendidikan:</label>
															<div class="col-md-9">
																<p class="form-control-static"> 457890 </p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Alamat:</label>
															<div class="col-md-9">
																<p class="form-control-static"> USA </p>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">DOB Ibu:</label>
															<div class="col-md-9">
																<p class="form-control-static"> USA </p>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Handphone:</label>
															<div class="col-md-9">
																<p class="form-control-static"> USA </p>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email:</label>
															<div class="col-md-9">
																<p class="form-control-static"> USA </p>
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
							<div class="row">
								<div class="col-sm-12">
									<div class="form-wrap">
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label class="control-label mb-10" for="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam a architecto sed, modi error iste eaque! Quidem, dignissimos temporibus. Fuga, quisquam! Veritatis iure nihil repellendus nesciunt eligendi sed possimus excepturi.#1</label>
													<div class="radio-list">
														<div class="col-sm-12">
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio1" value="option1" checked>
																<label for="radio1"> Ya </label>
															</div>
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio2" value="option2">
																<label for="radio2"> Kadang-kadang </label>
															</div>
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio3" value="option3">
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
						</section>
						<h3><span class="number"><i class="ti-thought txt-black"></i></span><span class="head-font capitalize-font">Sosialisasi</span></h3>
						<section>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-wrap">
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label class="control-label mb-10" for="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam a architecto sed, modi error iste eaque! Quidem, dignissimos temporibus. Fuga, quisquam! Veritatis iure nihil repellendus nesciunt eligendi sed possimus excepturi.#1</label>
													<div class="radio-list">
														<div class="col-sm-12">
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio1" value="option1">
																<label for="radio1"> Ya </label>
															</div>
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio2" value="option2">
																<label for="radio2"> Kadang-kadang </label>
															</div>
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio3" value="option3">
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
						</section>
						<h3><span class="number"><i class="ti-rss-alt txt-black"></i></span><span class="head-font capitalize-font">Sensory</span></h3>
						<section>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-wrap">
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label class="control-label mb-10" for="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam a architecto sed, modi error iste eaque! Quidem, dignissimos temporibus. Fuga, quisquam! Veritatis iure nihil repellendus nesciunt eligendi sed possimus excepturi.#1</label>
													<div class="radio-list">
														<div class="col-sm-12">
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio1" value="option1">
																<label for="radio1"> Ya </label>
															</div>
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio2" value="option2">
																<label for="radio2"> Kadang-kadang </label>
															</div>
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio3" value="option3">
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
						</section>
						<h3><span class="number"><i class="ti-heart-broken txt-black"></i></span><span class="head-font capitalize-font">Kesehatan</span></h3>
						<section>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-wrap">
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label class="control-label mb-10" for="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam a architecto sed, modi error iste eaque! Quidem, dignissimos temporibus. Fuga, quisquam! Veritatis iure nihil repellendus nesciunt eligendi sed possimus excepturi.#1</label>
													<div class="radio-list">
														<div class="col-sm-12">
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio1" value="option1">
																<label for="radio1"> Ya </label>
															</div>
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio2" value="option2">
																<label for="radio2"> Kadang-kadang </label>
															</div>
															<div class="radio">
																<input type="radio" disabled name="radio" id="radio3" value="option3">
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
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<!-- /Row -->





@endsection
