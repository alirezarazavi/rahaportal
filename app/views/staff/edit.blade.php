
@extends('layouts.master')
@section('content')

	<div id="page-wrapper">
	    <div class="row">
		   <div class="col-lg-12">
			  <h1 class="page-header">اطلاعات پرسنل</h1>
		   </div>
		   <!-- /.col-lg-12 -->
	    </div>
	    <!-- /.row -->
	    <div class="row">
		   <div class="col-lg-12">
		   		@include('layouts.messages')
			 	<div class="panel panel-default">
				<div class="panel-heading">
					ویرایش اطلاعات «{{$staff->fname .' '. $staff->lname}}»
					<a href="{{URL::route('staff.index')}}" class="pull-left">بازگشت
						<i class="fa fa-angle-left"></i>
					</a>
					<!-- <span class="clearfix"></span> -->
				</div>
				{{Form::open(array('route' => array('staff.update', $staff->id), 'method' => 'PUT'))}}
					<div class="panel-body">

						<div class="col-lg-6 pull-right">
							<div class="panel panel-default">
								<div class="panel-heading">
									اطلاعات پایه
								</div>
								<div class="panel-body">
									<div class="col-lg-6 pull-right">
										<div class="form-group">
											<label>نام *</label>
											<input type="text" class="form-control" name="fname" value="{{$staff->fname}}" required tabindex="1">
										</div>
										<div class="form-group">
											<label>تاریخ تولد</label>
											<input type="text" class="form-control datapicker" name="birth_date" value="{{$staff->birth_date}}" tabindex="3">
										</div>
										<div class="form-group">
											<label>شماره شناسنامه</label>
											<input type="text" class="form-control dir-ltr" name="shenasnameh" value="{{$staff->shenasnameh}}" tabindex="5">
										</div>
										<div class="form-group">
											<label>مدرک تحصیلی</label>
											<select name="madrak" class="form-control" tabindex="7">
												<option value="0">انتخاب کنید...</option>
												<option @if ($staff->madrak == 'زیر دیپلم') selected="selected" @endif value="زیر دیپلم">زیر دیپلم</option>
												<option @if ($staff->madrak == 'دیپلم') selected="selected" @endif value="دیپلم">دیپلم</option>
												<option @if ($staff->madrak == 'فوق دیپلم') selected="selected" @endif value="فوق دیپلم">فوق دیپلم</option>
												<option @if ($staff->madrak == 'لیسانس') selected="selected" @endif value="لیسانس">لیسانس</option>
												<option @if ($staff->madrak == 'فوق لیسانس') selected="selected" @endif value="فوق لیسانس">فوق لیسانس</option>
												<option @if ($staff->madrak == 'دکترا') selected="selected" @endif value="دکترا">دکترا</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>نام خانوادگی *</label>
											<input type="text" class="form-control" name="lname" value="{{$staff->lname}}" required tabindex="2">
										</div>
										<div class="form-group">
											<label>محل تولد</label>
											<input type="text" class="form-control" name="birth_location" value="{{$staff->birth_location}}" tabindex="4">
										</div>
										<div class="form-group">
											<label>کد ملی *</label>
											<input type="text" class="form-control dir-ltr" name="kod_meli" value="{{$staff->kod_meli}}" required tabindex="6">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /base-staff-info -->

						<div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									اطلاعات کاری
								</div>
								<div class="panel-body">
									<div class="col-lg-6 pull-right">
										<div class="form-group">
											<label>شماره پرسنلی *</label>
											<input type="number" class="form-control dir-ltr" name="staff_no" value="{{$staff->staff_no}}" required tabindex="8">
										</div>
										<div class="form-group">
											<label>شروع به کار</label>
											<input type="text" class="form-control datapicker" name="start_date" value="{{$staff->start_date}}" tabindex="10">
										</div>
										<div class="form-group">
											<label>شماره بیمه</label>
											<input type="text" class="form-control dir-ltr" name="bimeh_no" value="{{$staff->bimeh_no}}" tabindex="12">
										</div>
									</div>
									<div class="col-lg-6 pull-right">
										<div class="form-group">
											<label>شغل / سمت</label>
											<select name="shoghl" class="form-control" tabindex="9">
												<option value="0">انتخاب کنید...</option>
												<option @if ($staff->shoghl == 'محقق') selected="selected" @endif value="محقق">محقق</option>
												<option @if ($staff->shoghl == 'تایپیست') selected="selected" @endif value="تایپیست">تایپیست</option>
												<option @if ($staff->shoghl == 'مترجم') selected="selected" @endif value="مترجم">مترجم</option>
												<option @if ($staff->shoghl == 'خدمات') selected="selected" @endif value="خدمات">خدمات</option>
												<option @if ($staff->shoghl == 'پشتیبان') selected="selected" @endif value="پشتیبان">پشتیبان</option>
												<option @if ($staff->shoghl == 'مدیر') selected="selected" @endif value="مدیر">مدیر</option>
											</select>
										</div>
										<div class="form-group">
											<label>شروع بیمه</label>
											<input type="text" class="form-control datapicker" name="bimeh_date" value="{{$staff->bimeh_date}}" tabindex="11">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /work-info -->
						
						<div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									اطلاعات بانکی
								</div>
								<div class="panel-body">
									<div class="col-lg-12">
										<div class="form-group">
											<label>نام بانک</label>
											<input type="text" class="form-control" name="bank_name" value="{{$staff->bank_name}}" tabindex="15">
										</div>
										<div class="form-group">
											<label>شماره حساب</label>
											<input type="text" class="form-control dir-ltr" name="bank_no" value="{{$staff->bank_no}}" tabindex="16">
										</div>
										<div class="form-group">
											<label>شماره کارت</label>
											<input type="text" class="form-control dir-ltr" name="bank_card" value="{{$staff->bank_card}}" tabindex="17">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /bank-info -->

						<div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									اطلاعات تماس
								</div>
								<div class="panel-body">
									<div class="col-lg-12">
										<div class="form-group">
											<label>تلفن ثابت</label>
											<input type="number" class="form-control dir-ltr" name="phone" value="{{$staff->phone}}" tabindex="12">
										</div>
										<div class="form-group">
											<label>تلفن همراه</label>
											<input type="number" class="form-control dir-ltr" name="cellphone" value="{{$staff->cellphone}}" tabindex="13">
										</div>
										<div class="form-group">
											<label>آدرس</label>
											<input type="text" class="form-control" name="address" value="{{$staff->address}}" tabindex="14">
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<!-- /contact-info -->

						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									اطلاعات تکمیلی
								</div>
								<div class="panel-body">
									<textarea name="description" class="form-control" placeholder="توضیحات" tabindex="18">{{$staff->description}}</textarea>
								</div>
							</div>
						</div>
						<!-- /description -->

					</div>
					<div class="panel-footer">
						<input type="submit" value="ذخیره تغییرات" class="btn btn-success pull-left">
						<span class="clearfix"></span>
					</div>
				{{Form::close()}}
			 </div>
		   </div>
	    </div>
	    <!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
	
@stop