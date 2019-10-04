@extends('layouts.master')
@section('content')

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">حقوق و دستمزد</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">انتخاب پایه محاسبه</h3>
				</div>
				<div class="panel-body">
					@include('layouts.messages')
					<div class="row">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th class="text-right">عنوان</th>
									<th class="text-right">توضیح</th>
									<th class="text-right">حقوق پایه</th>
									<th class="text-right">حقوق هر دقیقه</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@foreach ($salary_base as $sbase)
								<tr class="">
									<td>{{$sbase->title}}</td>
									<td>{{$sbase->description}}</td>
									<td>{{$sbase->salary_base}}</td>
									<td>{{$sbase->salary_per_min}}</td>
									<td>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#select_base_{{$sbase->id}}">انتخاب</button>
									</td>
								</tr>

								<div class="modal fade" id="select_base_{{$sbase->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											{{Form::open(array('route' => array('salary.calculation.store'), 'method' => 'POST'))}}
											{{Form::hidden('base_id', $sbase->id)}}
											<div class="modal-header">
												<h4>انتخاب ماه برای {{$sbase->title}}</h4>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<label>انتخاب سال: </label>
													<select class="form-control" name="year">
														<option value="{{$this_year-1}}">{{$this_year-1}}</option>
														<option value="{{$this_year}}" selected="selected">{{$this_year}}</option>
														<option value="{{$this_year+1}}">{{$this_year+1}}</option>
													</select>
													<label>انتخاب ماه: </label>
													<select class="form-control" name="month">
														@for ($month = 0; $month <= 12; $month++)
															<?php
																$month_name = '';
																switch ($month) {
																	case 1:
																		$month_name = 'فروردین';
																		break;
																	case 2:
																		$month_name = 'اردیبهشت';
																		break;
																	case 3:
																		$month_name = 'خرداد';
																		break;
																	case 4:
																		$month_name = 'تیر';
																		break;
																	case 5:
																		$month_name = 'مرداد';
																		break;
																	case 6:
																		$month_name = 'شهریور';
																		break;
																	case 7:
																		$month_name = 'مهر';
																		break;
																	case 8:
																		$month_name = 'آبان';
																		break;
																	case 9:
																		$month_name = 'آذر';
																		break;
																	case 10:
																		$month_name = 'دی';
																		break;
																	case 11:
																		$month_name = 'بهمن';
																		break;
																	case 12:
																		$month_name = 'اسفند';
																		break;
																	default:
																		$month_name = 'انتخاب کنید';
																		break;
																}
															?>
															<option value="{{$month}}" @if ($this_month == $month_name) selected="selected" @endif>{{$month_name}}</option>
														@endfor
													</select>
												</div>

											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-success pull-left">برو</button>
												<button type="button" class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
											</div>
											{{Form::close()}}
										</div>
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
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

@stop