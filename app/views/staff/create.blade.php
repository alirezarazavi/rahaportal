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
			 	<div class="panel panel-success">
				<div class="panel-heading">
					اضافه کردن پرسنل
					<a href="{{URL::route('staff.index')}}" class="pull-left">بازگشت
						<i class="fa fa-angle-left"></i>
					</a>
					<!-- <span class="clearfix"></span> -->
				</div>
				<form role="form" action="{{URL::route('staff.store')}}" method="post">
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
											<input type="text" class="form-control" name="fname" required tabindex="1">
										</div>
										<div class="form-group">
											<label>تاریخ تولد</label>
											<input type="text" class="form-control datapicker" name="birth_date" tabindex="3" placeholder="روز/ماه/سال">
										</div>
										<div class="form-group">
											<label>شماره شناسنامه</label>
											<input type="text" class="form-control dir-ltr" name="shenasnameh" tabindex="5">
										</div>
										<div class="form-group">
											<label>مدرک تحصیلی</label>
											<select name="madrak" class="form-control" tabindex="7">
												<option value="0" selected="selected">انتخاب کنید...</option>
												<option value="زیر دیپلم">زیر دیپلم</option>
												<option value="دیپلم">دیپلم</option>
												<option value="فوق دیپلم">فوق دیپلم</option>
												<option value="لیسانس">لیسانس</option>
												<option value="فوق لیسانس">فوق لیسانس</option>
												<option value="دکترا">دکترا</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>نام خانوادگی *</label>
											<input type="text" class="form-control" name="lname" required tabindex="2">
										</div>
										<div class="form-group">
											<label>محل تولد</label>
											<input type="text" class="form-control" name="birth_location" tabindex="4">
										</div>
										<div class="form-group">
											<label>کد ملی *</label>
											<input type="text" class="form-control dir-ltr" name="kod_meli" required tabindex="6">
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
											<input type="number" class="form-control dir-ltr" name="staff_no" required tabindex="8">
										</div>
										<div class="form-group">
											<label>شروع به کار</label>
											<input type="text" class="form-control datapicker" name="start_date" tabindex="10">
										</div>
										<div class="form-group">
											<label>شماره بیمه</label>
											<input type="text" class="form-control dir-ltr" name="bimeh_no" tabindex="12">
										</div>
									</div>
									<div class="col-lg-6 pull-right">
										<div class="form-group">
											<label>شغل / سمت</label>
											<select name="shoghl" class="form-control" tabindex="9">
												<option value="0" selected="selected">انتخاب کنید...</option>
												<option value="محقق">محقق</option>
												<option value="تایپیست">تایپیست</option>
												<option value="مترجم">مترجم</option>
												<option value="خدمات">خدمات</option>
												<option value="پشتیبان">پشتیبان</option>
												<option value="مدیر">مدیر</option>
											</select>
										</div>
										<div class="form-group">
											<label>شروع بیمه</label>
											<input type="text" class="form-control datapicker" name="bimeh_date" tabindex="11">
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
											<input type="text" class="form-control" name="bank_name" tabindex="15">
										</div>
										<div class="form-group">
											<label>شماره حساب</label>
											<input type="text" class="form-control dir-ltr" name="bank_no" tabindex="16">
										</div>
										<div class="form-group">
											<label>شماره کارت</label>
											<input type="text" class="form-control dir-ltr" name="bank_card" tabindex="17">
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
											<input type="number" class="form-control dir-ltr" name="phone" tabindex="12">
										</div>
										<div class="form-group">
											<label>تلفن همراه</label>
											<input type="number" class="form-control dir-ltr" name="cellphone" tabindex="13">
										</div>
										<div class="form-group">
											<label>آدرس</label>
											<input type="text" class="form-control" name="address" tabindex="14">
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
									<textarea name="description" class="form-control" placeholder="توضیحات" tabindex="18"></textarea>
								</div>
							</div>
						</div>
						<!-- /description -->

					</div>
					<div class="panel-footer">
						<input type="submit" value="ذخیره" class="btn btn-success pull-left">
						<a href="{{URL::route('staff.create')}}" class="btn btn-default btn-padding pull-left">جدید</a>
						<span class="clearfix"></span>
					</div>
				</form>
			 </div>
		   </div>
	    </div>
	    <!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
	
@stop