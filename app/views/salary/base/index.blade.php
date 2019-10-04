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
			@include('layouts.messages')
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">پایه محاسبه حقوق و دستمزد</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="text-right">عنوان</th>
									<th class="text-right">توضیح</th>
									<th class="text-right">پایه حقوق</th>
									<th class="text-right">مبنای هر دقیقه</th>
									<th width="150" class="text-right">امکانات</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($salary_base as $salary_base)
								<tr class="">
									<td>{{$salary_base->title}}</td>
									<td>{{$salary_base->description}}</td>
									<td>{{$salary_base->salary_base}}</td>
									<td>{{$salary_base->salary_per_min}}</td>
									<td>
										<a href="base/subandadd/{{$salary_base->id}}" class="btn btn-primary btn-md">کسر و اضافه</a>
										<div class="btn-group">
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
												<span class="caret"></span>
												<span class="sr-only">منو</span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#" class="text-right" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil fa-fw"></i> ویرایش</a></li>
												<li class="divider"></li>
												<li><a href="#" class="text-right" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o fa-fw"></i> حذف</a></li>
											</ul>
										</div>
										<!-- Delete -->
										<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            {{Form::open(array('route' => array('salary.base.destroy', $salary_base->id), 'method' => 'DELETE'))}}
										            <div class="modal-header bg-danger">
										                <h4>حذف پایه محاسبه حقوق و دستمزد «{{$salary_base->title}}»</h4>
										            </div>
										            <div class="modal-body">
														<div class="form-group">
															<ul>
																<li>شما در پی حذف پایه محاسبه حقوق و دستمزد «{{$salary_base->title}}» هستید.</li>
																<li>فقط وقتی اقدام به حذف پایه محاسبه کنید که کارکنان یا ماه‌های کمی برمبنای آن حقوق و دستمزد آن‌ها محاسبه شده باشد.</li>
																<li>حذف پایه محاسبه موجب حذف تمام محاسبات حقوق و دستمزد کارکنانی که برمبنای این پایه محاسبه صورت گرفته خواهد شد و حقوق و دستمزد آن‌ها غیرقابل بازیابی، نمایش یا ویرایش خواهد بود.</li>
																<li>در حذف پایه محاسبه دقت کنید.</li>
															</ul>
														</div>
										            </div>
													<div class="bg-danger"><p class="modal-footer-tips-text">این عملیات قطعی و غیرقابل بازگشت خواهد بود.</p></div>
										            <div class="modal-footer">
														<button class="btn btn-danger pull-left" type="submit">حذف</button>
										                <button type="button" class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
										            </div>
													{{Form::close()}}
										        </div>
										    </div>
										</div>
										<!-- Edit -->
										<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            {{Form::open(array('route' => array('salary.base.update', $salary_base->id), 'method' => 'PUT'))}}
										            <div class="modal-header bg-warning">
										                <h4>ویرایش پایه محاسبه حقوق و دستمزد «{{$salary_base->title}}»</h4>
										            </div>
										            <div class="modal-body">
														<div class="form-group">
															<label for="edit_title" class="control-label">عنوان</label>
															<input type="text" class="form-control" value="{{$salary_base->title}}" placeholder="عنوان" id="edit_title" name="edit_title">

															<label for="edit_description" class="control-label">توضیح</label>
															<input type="text" class="form-control" value="{{$salary_base->description}}" placeholder="توضیح (اختیاری)" id="edit_description" name="edit_description">
															
															<label for="edit_salary_base" class="control-label">حقوق پایه</label>
															<div class="input-group">
																<input type="text" class="form-control fa-input formatNumber" value="{{$salary_base->salary_base}}" id="edit_salary_base" name="edit_salary_base">
																<div class="input-group-addon fa-btn">ریال</div>
															</div>
														
															<label for="edit_salary_per_min" class="control-label">دستمزد هر «دقیقه» کار</label>
															<div class="input-group">
																<input type="text" class="form-control fa-input formatNumber" value="{{$salary_base->salary_per_min}}" id="edit_salary_per_min" name="edit_salary_per_min">
																<div class="input-group-addon fa-btn">ریال</div>
															</div>
														</div>
										            </div>
													<div class="bg-warning"><p class="modal-footer-tips-text">نکته: ویرایش «حقوق پایه» یا «دستمزد هر دقیقه کار» تمام محاسبات گذشته حقوق و دستمزد بر مبنای این پایه محاسبه را بهم می‌زند و باید برای تک تک کاربران از نو محاسبه صورت بگیرد.</p></div>
										            <div class="modal-footer">
														<button class="btn btn-info pull-left" type="submit">ذخیره</button>
										                <button type="button" class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
										            </div>
													{{Form::close()}}
										        </div>
										    </div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- New -->
					<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog">
					        <div class="modal-content">
					            {{Form::open(array('route' => array('salary.base.store'), 'method' => 'POST'))}}
					            <div class="modal-header bg-success">
					                <h4>ایجاد پایه محاسبه حقوق و دستمزد</h4>
					            </div>
					            <div class="modal-body">
									<div class="form-group">
										<label for="title" class="control-label">عنوان</label>
										<input type="text" class="form-control" value="" placeholder="عنوان" id="title" name="title">

										<label for="description" class="control-label">توضیح</label>
										<input type="text" class="form-control" value="" placeholder="توضیح (اختیاری)" id="description" name="description">
										
										<label for="salary_base" class="control-label">حقوق پایه</label>
										<div class="input-group">
											<input type="text" class="form-control fa-input formatNumber" value="" id="salary_base" name="salary_base">
											<div class="input-group-addon fa-btn">ریال</div>
										</div>
									
										<label for="salary_per_min" class="control-label">دستمزد هر «دقیقه» کار</label>
										<div class="input-group">
											<input type="text" class="form-control fa-input formatNumber" value="" id="salary_per_min" name="salary_per_min">
											<div class="input-group-addon fa-btn">ریال</div>
										</div>
									</div>

					                <!-- <div class="form-group form-inline">
										این مقادیر از 
										<select class="form-control" name="month_from">
											<option value="01" @if ($now_month == 'فروردین') selected="selected" @endif>فروردین</option>
											<option value="02" @if ($now_month == 'اردیبهشت') selected="selected" @endif>اردیبهشت</option>
											<option value="03" @if ($now_month == 'خرداد') selected="selected" @endif>خرداد</option>
											<option value="04" @if ($now_month == 'تیر') selected="selected" @endif>تیر</option>
											<option value="05" @if ($now_month == 'مرداد') selected="selected" @endif>مرداد</option>
											<option value="06" @if ($now_month == 'شهریور') selected="selected" @endif>شهریور</option>
											<option value="07" @if ($now_month == 'مهر') selected="selected" @endif> مهر</option>
											<option value="08" @if ($now_month == 'آبان') selected="selected" @endif>آبان</option>
											<option value="09" @if ($now_month == 'آذر') selected="selected" @endif>آذر</option>
											<option value="10" @if ($now_month == 'دی') selected="selected" @endif>دی</option>
											<option value="11" @if ($now_month == 'بهمن') selected="selected" @endif>بهمن</option>
											<option value="12" @if ($now_month == 'اسفند') selected="selected" @endif>اسفند</option>
										</select>
										و
										<select class="form-control" name="year_from">
											<option value="{{$now_year-1}}">{{$now_year-1}}</option>	
											<option value="{{$now_year}}" selected="selected">{{$now_year}}</option>	
											<option value="{{$now_year+1}}">{{$now_year+1}}</option>	
										</select>
									</div> -->
									<!-- <div class="form-group form-inline">
										تا 
										<select class="form-control" name="month_to">
											<option value="01">فروردین</option>
											<option value="02">اردیبهشت</option>
											<option value="03">خرداد</option>
											<option value="04">تیر</option>
											<option value="05">مرداد</option>
											<option value="06">شهریور</option>
											<option value="07"> مهر</option>
											<option value="08">آبان</option>
											<option value="09">آذر</option>
											<option value="10">دی</option>
											<option value="11">بهمن</option>
											<option value="12" selected="selected">اسفند</option>
										</select>
										و
										<select class="form-control" name="year_to">
											<option value="{{$now_year-1}}">{{$now_year-1}}</option>	
											<option value="{{$now_year}}" selected="selected">{{$now_year}}</option>	
											<option value="{{$now_year+1}}">{{$now_year+1}}</option>	
										</select>
										محاسبه خواهد شد.
									</div> -->

					            </div>
					            <div class="modal-footer">
										<button class="btn btn-success pull-left" type="submit">ایجاد</button>
					                <button type="button" class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
					            </div>
								{{Form::close()}}
					        </div>
					    </div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary btn-outline pull-left" data-toggle="modal" data-target="#new">جدید</button>
					<span class="clearfix"></span>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

@stop