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
		{{Form::open(array('route' => 'salary.calculation.store', 'method' => 'POST', 'class' => 'form-inline'))}}
		{{Form::hidden('baseID', $base->id, array('id' => 'baseID'))}}
		{{Form::hidden('date_month', $month, array('id' => 'date_month'))}}
		{{Form::hidden('date_year', $year, array('id' => 'date_year'))}}
		{{Form::hidden('salary_min', $base->salary_per_min, array('id' => 'salary_min'))}}
		{{Form::hidden('salary_base', $base->salary_base, array('id' => 'salary_base'))}}

			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="col-lg-12" style="height:17px;padding:0;">
						<h3 class="panel-title pull-right">
							محاسبه کارکرد «<span class="text-success">{{FAhelper::month_name($month).' '.$year}}</span>»
						</h3>
						<a href="{{URL::route('salary.calculation.index')}}" class="pull-left">بازگشت<i class="fa fa-angle-left fa-fw"></i></a>
					</div>
					<span class="clearfix"></span>
				</div>
				<div class="panel-body" id="create_content">
				<div class="row">
					<div class="col-lg-3 staff_name">
						انتخاب پرسنل
						<ul class="nav nav-pills nav-stacked" style="padding:0;">
							@foreach ($staff as $s)
								<li id="{{$s->id}}"><a href="#">{{$s->fname.' '.$s->lname}} <small>({{$s->staff_no}})</small></a></li>
							@endforeach	
						</ul>
					</div>
					<div class="col-lg-9">
						<div class="row">
							@include('layouts.messages')
							@include('layouts.loader')
						</div>
						<div class="row" id="main_calculation" style="display:none;">

							<div class="col-lg-6">
								<div class="panel panel-red">
									<div class="panel-heading">غیبت</div>
									<div class="panel-body">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control fa-input gheybat gheybat_day" value="" name="gheybat_day">
												<div class="input-group-addon fa-btn">روز</div>
												<input type="text" class="form-control fa-input gheybat gheybat_hour" value="" name="gheybat_hour">
												<div class="input-group-addon fa-btn">ساعت</div>
												<input type="text" class="form-control fa-input gheybat gheybat_minute" value="" name="gheybat_minute">
												<div class="input-group-addon fa-btn">دقیقه</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="panel panel-green">
									<div class="panel-heading">کارکرد</div>
									<div class="panel-body">
										<div class="form-group">
											<div class="input-group">
												<input type="text" class="form-control fa-input karkard karkard_day" name="karkard_day">
												<div class="input-group-addon fa-btn">روز</div>
												<input type="text" class="form-control fa-input karkard karkard_hour" value="" name="karkard_hour">
												<div class="input-group-addon fa-btn">ساعت</div>
												<input type="text" class="form-control fa-input karkard karkard_minute" value="" name="karkard_minute">
												<div class="input-group-addon fa-btn">دقیقه</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="panel panel-danger">
									<div class="panel-heading">
										کسور
									</div>
									<div class="panel-body">
										<div class="row">
											<table class="table table-striped">
												<tr>
													<td>عنوان</td>
													<td class="text-center">محاسبه شود؟</td>
													<td class="text-center">مقدار</td>
												</tr>
												@foreach ($subandadd as $sub)
												@if ($sub->type == 'sub')
												<tr>
													<td>
														{{$sub->title}}
														<a href="#" class="tipsy" title="{{$sub->description}}">
															<i class="fa fa-question-circle fa-fw"></i>
														</a>
													</td>
													<td class="text-center">
														<span class="subadd_id" id="{{$sub->id}}"></span>
														<input type="checkbox"
															@foreach ($subandadd_values as $value)
															@if ($value->subadd_id == $sub->id)
																@if ($value->for_all == 'y')
																	checked disabled
																@endif
																id="subaddvalue_{{$value->id}}"
															@endif
															@endforeach
																name="sub_calc">
													</td>
													<td class="text-left" width="150px">
														<div class="form-group">
															<div class="input-group">
																<input type="text" class="form-control fa-input formatNumber" disabled="disabled"
																@foreach($subandadd_values as $value)
																	@if ($value->subadd_id == $sub->id)
																		value="{{$value->value}}"
																	@endif
																@endforeach
																 		name="calc_sub_value">
																<div class="input-group-addon fa-btn">ریال</div>
															</div>
														</div>
													</td>
												</tr>
												@endif
												@endforeach
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-heading">
										اضافات
									</div>
									<div class="panel-body">
									<div class="row">
										<table class="table table-striped">
											<tr>
												<td>عنوان</td>
												<td class="text-center">محاسبه شود؟</td>
												<td class="text-center">مقدار</td>
											</tr>
											@foreach ($subandadd as $add)
											@if ($add->type == 'add')
											<tr>
												<td>
													{{$add->title}}
													<a href="#" class="tipsy" title="{{$add->description}}">
														<i class="fa fa-question-circle fa-fw"></i>
													</a>
												</td>
												<td class="text-center">
													<span class="subadd_id" id="{{$add->id}}"></span>
													<input type="checkbox" 
														@foreach ($subandadd_values as $value)
														@if ($value->subadd_id == $add->id)
															@if ($value->for_all == 'y')
																checked disabled
															@endif
														id="subaddvalue_{{$value->id}}"
														@endif
														@endforeach
														name="add_calc">
												</td>
												<td class="text-left" width="150px">
													<div class="form-group">
														<div class="input-group">
															<input type="text" class="form-control fa-input formatNumber" disabled="disabled"
																@foreach($subandadd_values as $value)
																	@if ($value->subadd_id == $add->id)
																		value="{{$value->value}}"
																	@endif
																@endforeach
																		value=""
																 		name="calc_add_value">
															<div class="input-group-addon fa-btn">ریال</div>
														</div>
													</div>
												</td>
											</tr>
											@endif
											@endforeach
										</table>
									</div>
								</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="panel panel-primary">
									<div class="panel-heading">حقوق</div>
									<div class="panel-body">
										<ul class="list-group" style="padding:0;">
											<li class="list-group-item">پایه حقوق 
												<span class="pull-left salary_base">{{$base->salary_base}}</span>
											</li>
											<li class="list-group-item">کارکرد
												<span class="pull-left total_karkard"></span>
											</li>
											<li class="list-group-item">غیبت
												<span class="pull-left total_gheybat"></span>
											</li>
											<li class="list-group-item">خالص دریافتی
												<span class="pull-left total_salary"></span>
											</li>
										</ul>
									</div>
								</div>
							</div>
								
						</div>
					</div>

				</div>
				</div>
				<div class="panel-footer">
					<button type="button" id="submit" class="btn btn-success pull-left">ذخیره</button>
					<span class="clearfix"></span>
				</div>
			</div>
		{{Form::close()}}
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

@stop