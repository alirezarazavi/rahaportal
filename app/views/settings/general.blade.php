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
				{{Form::open(array('route' => array('settings.general.store'), 'method' => 'POST'))}}
				@if ($def) {{Form::hidden('id', $def->id)}} @endif
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">تنظیمات عمومی</h3>
					</div>
					<div class="panel-body">
						<div class="">
							<div class="row well well-sm well-light">
								<div class="col-lg-2 pull-right">
									<label for="site_title" class="topalign-fix"><i class="fa fa-home fa-fw"></i> عنوان پنل</label>
								</div>
								<div class="col-lg-4 pull-right">
									<input type="text" class="form-control" id="site_title" name="site_title" value="@if($def){{$def->title}}@endif" placeholder="عنوان پنل"/>
								</div>
								<div class="col-lg-5">
									<p class="topalign-fix"><small>عنوان سایت در نوار اصلی بخش مدیریت، فیش حقوقی و نوار عنوان به نمایش درخواهد آمد.</small></p>
								</div>
							</div>
							<br />
							<div class="row well well-sm well-light">
								<div class="col-lg-2 pull-right">
									<label class="topalign-fix"> <i class="fa fa-clock-o fa-fw"></i> ساعت کار مجموعه</label>
								</div>
								<?php if ($def): $split_work = mb_split('-', $def->work_time); endif ?>
								<div class="col-lg-2 pull-right">
									<div class="input-group">
										<div class="input-group-addon timepicker-fix"> از </div>
										<div class="input-append bootstrap-timepicker">
											<input type="text" name="workTime_start" value="@if ($def) {{$split_work[0]}} @endif" class="form-control timepicker dir-ltr timepicker-fix-input">
										</div>
									</div>
								</div>
								<div class="col-lg-2 pull-right">
									<div class="input-group">
										<div class="input-group-addon timepicker-fix"> تا </div>
										<div class="input-append bootstrap-timepicker">
											<input type="text" name="workTime_end" value="@if ($def) {{$split_work[1]}} @endif" class="form-control timepicker dir-ltr timepicker-fix-input">
										</div>
									</div>
								</div>
								<div class="col-lg-5">
									<p class="topalign-fix"><small>شروع و پایان کار هر روز کاری را وارد کنید. <a href="{{URL::route('settings.general.calendar')}}">روزهای تعطیل را مشخص کنید</a></small></p>
								</div>
							</div>
							<br />
							<div class="row well well-sm well-light">
								<div class="col-lg-2 pull-right">
									<label for="vacation_per_month" class="topalign-fix"><i class="fa fa-suitcase fa-fw"></i> ساعات مرخصی در ماه</label>
								</div>
								<div class="col-lg-4 pull-right">
									<input type="tel" min="0" max="60"  class="form-control" id="vacation_per_month" name="vacation_per_month" value="@if ($def) {{$def->vacation_per_month}} @endif" placeholder="مرخصی به ساعت"/>
								</div>
								<div class="col-lg-5">
									<p class="topalign-fix"><small>ساعات مرخصی مجاز هر کاربر در ماه را وارد کنید.</small></p>
								</div>
							</div>
							<br />
							<div class="row well well-sm well-light">
								<div class="col-lg-2 pull-right">
									<label class="topalign-fix"><i class="fa fa-book fa-fw"></i> ساعت گزارش گیری</label>
								</div>
								<?php if ($def): $split_report = mb_split('-', $def->report_time); endif ?>
								<div class="col-lg-2 pull-right">
									<div class="input-group">
										<div class="input-group-addon timepicker-fix"> از </div>
										<div class="input-append bootstrap-timepicker">
											<input type="text" name="repTime_start" value="{{$split_report[0]}}" class="form-control timepicker dir-ltr timepicker-fix-input">
										</div>
									</div>
								</div>
								<div class="col-lg-2 pull-right">
									<div class="input-group">
										<div class="input-group-addon timepicker-fix"> تا </div>
										<div class="input-append bootstrap-timepicker">
											<input type="text" name="repTime_end" value="{{$split_report[1]}}" class="form-control timepicker dir-ltr timepicker-fix-input">
										</div>
									</div>
								</div>
								<div class="col-lg-5">
									<p class="topalign-fix"><small>کارمندها از چه ساعتی مجاز به وارد کردن گزارش کار خود باشند</small></p>
								</div>
							</div>

							<br />
							<div class="row well well-sm well-light">
								<div class="col-lg-2 pull-right">
									<label class="topalign-fix"><i class="fa fa-external-link-square fa-fw"></i> دسترسی خارج از ساعت کار</label>
								</div>
								<div class="col-lg-4 pull-right" style="margin-top: 5px;">
									<div class="col-lg-4 col-lg-offset-3">
										<label>
											<input type="radio" value="false" name="availability_from_out" @if ($def->availability_from_out == 'false') checked @endif> غیرمجاز
										</label>
									</div>
									<div class="col-lg-4">
										<label>
											<input type="radio" value="true" name="availability_from_out" @if ($def->availability_from_out == 'true') checked @endif> مجاز
										</label>
									</div>
								</div>
								<div class="col-lg-5">
									<p class="topalign-fix"><small>کاربران در خارج از ساعات کاری مجاز به استفاده از پنل باشند؟</small></p>
								</div>
							</div>
							<br />
							<div class="row well well-sm well-light">
								<div class="col-lg-2 pull-right">
									<label class="topalign-fix"><i class="fa fa-lock fa-fw"></i> دسترسی پنل</label>
								</div>
								<div class="col-lg-4 pull-right" style="margin-top: 5px;">
									<div class="col-lg-4 col-lg-offset-3">
										<label>
											<input type="radio" value="false" name="user_access" @if($def->user_access == 'false') checked @endif> بسته
										</label>
									</div>
									<div class="col-lg-4">
										<label>
											<input type="radio" value="true" name="user_access" @if($def->user_access == 'true') checked @endif> باز
										</label>
									</div>
								</div>
								<div class="col-lg-5">
									<p class="topalign-fix"><small>این گزینه دسترسی همه کاربران عادی بجز مدیر را به پنل باز/بسته می‌کند</small></p>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-primary pull-left" data-toggle="modal" data-target="#">ذخیره</button>
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