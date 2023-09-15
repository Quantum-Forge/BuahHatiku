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
					<form id="example-advanced-form" action="#">
						<h3><span class="number"><i class="ti-info txt-black"></i></span><span class="head-font capitalize-font">Nama Anak</span></h3>
						<fieldset class="form-wrap">
							<div class="form-horizontal">
								<div class="form-body">
									<div class="form-group">
											<div class="col-md-12">
												<select name="" class="form-control" id="">
													<option disabled selected>Silahkan Pilih Nama Anak...</option>
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
											<div class="row">
												<div class="col-md-12">
													<label class="control-label mb-10" for="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam a architecto sed, modi error iste eaque! Quidem, dignissimos temporibus. Fuga, quisquam! Veritatis iure nihil repellendus nesciunt eligendi sed possimus excepturi.#1</label>
													<div class="radio-list">
														<div class="col-sm-12">
															<div class="radio">
																<input type="radio" name="radio" id="radio1" value="option1">
																<label for="radio1"> Ya </label>
															</div>
															<div class="radio">
																<input type="radio" name="radio" id="radio2" value="option2">
																<label for="radio2"> Kadang-kadang </label>
															</div>
															<div class="radio">
																<input type="radio" name="radio" id="radio3" value="option3">
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
						</fieldset>
					 
						<h3><span class="number"><i class="ti-thought txt-black"></i></span><span class="head-font capitalize-font">Sosialisasi</span></h3>
						<fieldset>
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
																<input type="radio" name="radio" id="radio1" value="option1">
																<label for="radio1"> Ya </label>
															</div>
															<div class="radio">
																<input type="radio" name="radio" id="radio2" value="option2">
																<label for="radio2"> Kadang-kadang </label>
															</div>
															<div class="radio">
																<input type="radio" name="radio" id="radio3" value="option3">
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
						</fieldset>
					 
						<h3><span class="number"><i class="ti-rss-alt txt-black"></i></span><span class="head-font capitalize-font">Sensory</span></h3>
						<fieldset>
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
																<input type="radio" name="radio" id="radio1" value="option1">
																<label for="radio1"> Ya </label>
															</div>
															<div class="radio">
																<input type="radio" name="radio" id="radio2" value="option2">
																<label for="radio2"> Kadang-kadang </label>
															</div>
															<div class="radio">
																<input type="radio" name="radio" id="radio3" value="option3">
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
						</fieldset>

						<h3><span class="number"><i class="ti-heart-broken txt-black"></i></span><span class="head-font capitalize-font">Kesehatan</span></h3>
						<fieldset>
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
																<input type="radio" name="radio" id="radio1" value="option1">
																<label for="radio1"> Ya </label>
															</div>
															<div class="radio">
																<input type="radio" name="radio" id="radio2" value="option2">
																<label for="radio2"> Kadang-kadang </label>
															</div>
															<div class="radio">
																<input type="radio" name="radio" id="radio3" value="option3">
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
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Row -->





@endsection
