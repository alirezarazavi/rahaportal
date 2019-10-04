@extends('layouts.master')
@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">تنظیمات</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				@include('layouts.messages')
				@include('layouts.loader')
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title pull-right">تقویم کاری</h3>
						<a href="{{URL::route('settings.general.index')}}" class="pull-left">بازگشت<i class="fa fa-angle-left fa-fw"></i></a>
						<span class="clearfix"></span>
					</div>
					<div class="panel-body">
						<div class="col-lg-3 pull-right">
							<div class="panel panel-info">
								<div class="panel-heading">
									تعطیلی‌های هر هفته
								</div>
								<div class="panel-body">
									<div class="form-inline">
										<select name="weekly_dayOff" id="weekly_dayOff" class="form-control">
											<option value="0" selected="selected">انتخاب کنید</option>
											<option value="thu">پنج شنبه</option>
											<option value="fri">جمعه</option>
										</select>
										<a href="#" class="btn btn-sm btn-primary submit_weekly">ثبت <i class="fa fa-angle-left"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 pull-right">
							<div class="panel panel-info">
								<div class="panel-heading">
									روزهای تعطیل سال
								</div>
								<div class="panel-body">
									<div class="form-inline">
										<input type="text" id="dayOff" name="dayOff" placeholder="YYYY-mm-dd" class="form-control datepicker dayOff">
										<button type="button" class="submit_dayOff btn btn-sm btn-primary">ثبت <i class="fa fa-angle-left"></i></button>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="panel panel-success">
								<div class="panel-heading">تعطیلی‌های ثبت شده</div>
								<div class="panel-body">
									<table class="table table-hover" id="dayOff_result">
										@forelse ($daysOff as $dayOff)
											<tr>
												@if ($dayOff->yearly == NULL)
													<td>
														<span>@if ($dayOff->weekly == 'thu') پنج شنبه @elseif ($dayOff->weekly == 'fri') جمعه @endif</span>
														<button type="button" id="{{$dayOff->id}}" class="btn btn-xs btn-danger pull-left delete_dayOff">حذف</button>
													</td>
												@elseif ($dayOff->weekly == NULL)
													<td>
														<span>{{jDate::forge($dayOff->yearly)->format('l Y/n/j')}}</span>
														<button type="button" id="{{$dayOff->id}}" class="btn btn-xs btn-danger pull-left delete_dayOff">حذف</button>
													</td>
												@endif
										@empty 
												<td>تاکنون روز تعطیلی ثبت نشده است.</td>
											</tr>
										@endforelse
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

@stop