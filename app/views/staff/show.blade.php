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
			  <div class="panel panel-default">
				<div class="panel-heading">
					{{$staff->fname . ' ' . $staff->lname}}
					<a href="{{URL::route('staff.index')}}" class="pull-left">بازگشت
						<i class="fa fa-angle-left"></i>
					</a>
				</div>
				<div class="panel-body">
					<div class="row">
						<ul class="nav nav-tabs" id="tabbable" role="tablist">
							<li class="active"><a href="#home">اطلاعات کلی</a></li>
							<li><a href="#details">جزئیات</a></li>
							<li><a href="#salary">فیش حقوقی</a></li>
						</ul>
					</div>
					<div class="row">
						<div class="tab-content">
							<div class="tab-pane active" id="home">
								@include('layouts.messages')
								<div class="col-lg-6">
									<div class="form-group">
										<strong>شماره پرسنلی: </strong>
										<span>{{$staff->staff_no}}</span>
									</div>
									<div class="form-group">
										<strong>شغل / سمت: </strong>
										<span>{{$staff->shoghl}}</span>
									</div>
									<div class="form-group">
										<strong>شروع به کار: </strong>
										<span>{{$staff->start_date}}</span>
									</div>
									<div class="form-group">
										<strong>شماره بیمه: </strong>
										<span>{{$staff->bimeh_no}}</span>
									</div>
									<div class="form-group">
										<strong>شروع بیمه: </strong>
										<span>{{$staff->bimeh_date}}</span>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<strong>{{$staff->fname .' '. $staff->lname}}</strong>
									</div>
									<div class="form-group">
										<strong>کد ملی: </strong>
										<span>{{$staff->kod_meli}}</span>
									</div>
									<div class="form-group">
										<strong>شماره شناسنامه: </strong>
										<span>{{$staff->shenasnameh}}</span>
									</div>
									<div class="form-group">
										<strong>تاریخ تولد: </strong>
										<span>{{$staff->birth_date}}</span>
									</div>
									<div class="form-group">
										<strong>محل تولد: </strong>
										<span>{{$staff->birth_location}}</span>
									</div>
									<div class="form-group">
										<strong>مدرک تحصیلی: </strong>
										<span>{{$staff->madrak}}</span>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="details">
								<div class="col-lg-6">
									<div class="form-group">
										<strong>نام بانک: </strong>
										<span>{{$staff->bank_name}}</span>
									</div>
									<div class="form-group">
										<strong>شماره حساب: </strong>
										<span>{{$staff->bank_no}}</span>
									</div>
									<div class="form-group">
										<strong>شماره کارت: </strong>
										<span>{{$staff->bank_card}}</span>
									</div>
									<div class="form-group">
										<strong>ثبت شده در: </strong>
										<span>{{jDate::forge($staff->created_at)->format('j F y')}}</span>
									</div>
									<div class="form-group">
										<strong>آخرین به‌روز رسانی: </strong>
										<span>{{jDate::forge($staff->updated_at)->format('j F y')}}</span>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<strong>تلفن ثابت: </strong>
										<span>{{$staff->phone}}</span>
									</div>
									<div class="form-group">
										<strong>تلفن همراه: </strong>
										<span>{{$staff->cellphone}}</span>
									</div>
									<div class="form-group">
										<strong>آدرس: </strong>
										<span>{{$staff->address}}</span>
									</div>
									<div class="form-group">
										<strong>توضیحات: </strong>
										<span>{{$staff->description}}</span>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="salary">
								salary
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<a href="{{URL::route('staff.edit',$staff->id, $staff->id)}}" class="btn btn-warning btn-sm btn-padding pull-left">ویرایش</a>
					<span class="clearfix"></span>
				</div>
			 </div>
		   </div>
	    </div>
	    <!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
	
@stop