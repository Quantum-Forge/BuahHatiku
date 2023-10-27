@extends('layouts.app')

@section('dashboard')

<!-- Title -->
<div class="row heading-bg  bg-red">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-light">Questionnaire</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Dashboard</a></li>
			<li class="active"><span>Create Questionnaire</span></li>
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
					<h6 class="panel-title txt-dark">Questionnaire Anak</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="form-wrap row">
								<div class="col-md-5">
									<form class="form-horizontal" action="/questionnaire_insert" method="POST">
										{{ csrf_field() }}
										<div class="form-group {{ $errors->has('IdJenis') ? 'has-error' : '' }}">
											<label for="Jenis" class="col-sm-3 control-label">Jenis*</label>
											<div class="col-sm-9">
												<div class="input-group">
													<div class="input-group-addon"><i class="icon-list"></i></div>
													<select type="text" class="form-control" id="Jenis" name="IdJenis">
														<option disabled selected>Choose...</option>
														@foreach($jenis_questionaires as $jenis)
															<option value="{{$jenis->IdJenis}}" @if(old('IdJenis') == $jenis->IdJenis) selected @endif>{{$jenis->NamaJenis}}</option>
														@endforeach
													</select>
												</div>
												@error('IdJenis')
													<span class="help-block">{{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="form-group {{ $errors->has('Pertanyaan') ? 'has-error' : '' }}">
											<label  for="Pertanyaan" class="col-sm-3 control-label">Pertanyaan*</label>
											<div class="col-sm-9">
												<div class="input-group">
													<textarea name="Pertanyaan" class="form-control" id="" cols="50" rows="10">{{old('Pertanyaan')}}</textarea>
													@error('Pertanyaan')
														<span class="help-block">{{ $message }}</span>
													@enderror
												</div>
											</div>
										</div>
										<div class="form-group mb-0">
											<div class="col-sm-offset-3 col-sm-9">
												<button type="submit" class="btn btn-info ">Submit</button>
											</div>
										</div>
									</form>
								</div>
								<div class="col-md-7">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-sm display text-wrap">
												<thead>
													<tr>
														<th>No</th>
														<th>Jenis</th>
														<th style="width: 40%;">Pertanyaan</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													@foreach($questionnaires as $questionnaire)
													<tr>
														<td>{{ $loop->index+1 }}</td>
														<td>{{ $questionnaire->jenis->NamaJenis }}</td>
														<td>{{ $questionnaire->Pertanyaan }}</td>
														<td>
															<button data-toggle="modal" data-target="#responsive-modal{{$questionnaire->IdQuestionaire}}" class="btn btn-info btn-icon-anim btn-circle btn-sm"><i class="fa fa-pencil"></i></button>
														</td>
													</tr>
													<div id="responsive-modal{{$questionnaire->IdQuestionaire}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
														<form action="/questionnaire_edit/{{$questionnaire->IdQuestionaire}}" method="POST">
														{{ csrf_field() }}
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																	<h5 class="modal-title">Edit Questionnaire#{{$questionnaire->IdQuestionaire}}</h5>
																</div>
																<div class="modal-body">
																	<div class="form-group {{ $errors->has('IdJenis') ? 'has-error' : '' }}">
																		<div class="">
																			<div class="input-group">
																				<div class="input-group-addon"><i class="icon-list"></i></div>
																				<select type="text" required class="form-control" id="Jenis" name="IdJenis">
																					@foreach($jenis_questionaires as $jenis)
																						<option value="{{$jenis->IdJenis}}" @if(old('IdJenis', $questionnaire->IdJenis) == $jenis->IdJenis) selected @endif>{{$jenis->NamaJenis}}</option>
																					@endforeach
																				</select>
																			</div>
																			@error('IdJenis')
																				<span class="help-block">{{ $message }}</span>
																			@enderror
																		</div>
																	</div>
																	<div class="form-group {{ $errors->has('Pertanyaan') ? 'has-error' : '' }}">
																		<div class="">
																			<div class="input-group">
																				<textarea name="Pertanyaan" required placeholder="Isi pertanyaan baru..." class="form-control" id="" cols="100" rows="10">{{$questionnaire->Pertanyaan}}</textarea>
																				@error('Pertanyaan')
																					<span class="help-block">{{ $message }}</span>
																				@enderror
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-success btn-block">Submit</button>
																</div>
															</div>
														</div>
														</form>
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

<!-- Data table JavaScript -->
<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>
@endsection
