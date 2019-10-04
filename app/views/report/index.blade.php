@extends('layouts.master')
@section('content')

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">گزارش کار</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				@include('layouts.messages')
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">گزارش کار</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
						<thead>
							<tr>
								<th width="150px" class="text-right">تاریخ</th>
								<th class="text-right">توضیح</td>
								<th width="100px" class="text-right">ورود و خروج</th>
								<th width="100px" class="text-right">مرخصی ساعتی</th>
								<th width="80px" class="text-right">تاخیر</th>
								<th width="80px" class="text-right">تعجیل</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($report as $rep)
								<tr>
									<td>
										{{jDate::forge()->format('l d-m-Y')}}
									</td>
									<td>{{$rep->description}}</td>
									<td>{{$rep->en_ex_time}}</td>
									<td>{{$rep->leave_time}}</td>
									<td>{{$rep->takhir}} دقیقه</td>
									<td>{{$rep->tajil}} دقیقه</td>
								</tr>
							@empty
								<tr>
									<p class="text-center">آیتمی برای نمایش وجود ندارد</p>
								</tr>
							@endforelse
						</tbody>

						</table>
							@if ($alreadyRep == true || $notRepTime == true)
								<div class="alert alert-warning">
									{{$msg}}	
								</div>
							@endif

					</div>
					<div class="panel-footer">
						<button class="btn btn-success btn-outline pull-left" data-toggle="modal" data-target="#new_report">جدید</button>
						<span class="clearfix"></span>
					</div>
					<!-- New Report -->
					<div class="modal fade" id="new_report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								{{Form::open(array('route' => array('report.store'), 'method' => 'POST'))}}
								<div class="modal-header">
									<h4>گزارش کار جدید <span class="pull-left">{{jDate::forge()->format('l Y/m/d')}}</span></h4>
								</div>
								<div class="modal-body">
									@if ($alreadyRep == true || $notRepTime == true)
										<div class="alert alert-warning">
											{{$msg}}	
										</div>
									@else
										<div class="row">
											<div class="col-lg-4 pull-right">
												<label class="topalign-fix"><i class="fa fa-clock-o fa-fw fa-fw fa-i-reposition"></i> ساعت ورود و خروج</label>
											</div>
											<div class="col-lg-4 pull-right">
												<div class="input-group">
													<div class="input-group-addon timepicker-fix">ورود</div>
													<div class="input-append bootstrap-timepicker">
														<input type="text" name="enter_time" required="required" class="form-control timepicker dir-ltr timepicker-fix-input">
													</div>
												</div>
											</div>
											<div class="col-lg-4 pull-right">
												<div class="input-group">
													<div class="input-group-addon timepicker-fix">خروج</div>
													<div class="input-append bootstrap-timepicker">
														<input type="text" name="exit_time" required="required" class="form-control timepicker dir-ltr timepicker-fix-input">
													</div>
												</div>
											</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-lg-8">
												<textarea name="report_description" id="report_description" rows="3" cols="10" class="form-control" placeholder="توضیح..." required="required" style="resize: none;"></textarea>
											</div>
											<div class="col-lg-4">
												<label for="report_description" class="control-label"><i class="fa fa-pencil-square-o fa-fw fa-fw fa-i-reposition"></i> توضیح</label>
											</div>
										</div>
										<br/>
										<div class="row well well-sm">
											<div class="col-lg-4 pull-right">
												<label class="topalign-fix"><i class="fa fa-external-link fa-fw fa-i-reposition"></i> مرخصی روزانه</label>
											</div>
											<div class="col-lg-4 pull-right">
												<div class="input-group">
													<div class="input-group-addon timepicker-fix">دقیقه</div>
													<div class="input-append bootstrap-timepicker">
														<input type="text" name="leaveTime_start" class="form-control timepicker dir-ltr timepicker-fix-input">
													</div>
												</div>
											</div>
											{{--<div class="col-lg-4 pull-right">--}}
												{{--<div class="input-group">--}}
													{{--<div class="input-group-addon timepicker-fix">پایان</div>--}}
													{{--<div class="input-append bootstrap-timepicker">--}}
														{{--<input type="text" name="leaveTime_end" class="form-control timepicker dir-ltr timepicker-fix-input">--}}
													{{--</div>--}}
												{{--</div>--}}
											{{--</div>--}}
										</div>
										<div class="row">
											<ul class="text-danger">
												<li>در هر روز فقط می‌توانید یک گزارش بنویسید</li>
												<li>بعد از ذخیره گزارش هر روز، امکان ویرایش یا حذف آن وجود ندارد</li>
												<li>ساعت ورود و خروج را به صورت ۲۴ ساعت وارد کنید</li>
											</ul>
										</div>
									@endif
								</div>
								<div class="modal-footer">
									@if ($alreadyRep == true || $notRepTime == true)
									@else
										<button class="btn btn-success pull-left" type="submit">ذخیره</button>
									@endif
									<button type="button" class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
								</div>
								{{Form::close()}}
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