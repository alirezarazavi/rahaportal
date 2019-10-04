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
	        <div class="col-md-12">
	            <div class="panel panel-primary">
	            	<div class="panel-heading">
	            		<h3 class="panel-title">فیش حقوقی</h3>
	            	</div>
	            	<div class="panel-body">
	            		
	            		<div class="col-lg-3">
	            			<div class="form-group">
								<select name="salary_date" class="form-control salary_date">
									<option value="0" selected="selected">انتخاب تاریخ</option>
									@foreach ($salary_date as $date)
										<option value="{{$date->date_year .'-'. $date->date_month}}">
											{{$date->date_year .'/'. $date->date_month}}
										</option>
									@endforeach
								</select>
							</div>
							انتخاب پرسنل
							<div class="list-group salary_staff_name">
								@foreach ($staff as $s)
									<a href="#" class="list-group-item" id="{{$s->id}}">
										{{$s->fname.' '.$s->lname}} 
										<span class="badge pull-left" style="font-weight:normal;">{{$s->staff_no}}</span>
									</a>
								@endforeach
							</div>
							
							<a href="#" class="show_salary btn btn-primary btn-block pull-left">نمایش</a>
						</div>
						
						<div class="col-lg-9">
							<div class="panel panel-default">
								<div class="panel-heading">
									<a href="#" class="btn btn-success print">چاپ</a>
									<p class="pay_slip not_found pull-left text-danger"></p>
								</div>
								<div class="panel-body" id="salary_area">
									<table class="table table-bordered">
										<tr>
											<td colspan="4">
												<p class="text-center">@if ($setting) {{$setting->title}} @endif</p>
												<p class="text-center">فیش حقوقی <span class="pay_slip_date"></span></p>
											</td>
										</tr>

										<tr style="background:#eee;">
											<td width="170px">مشخصات پرسنلی</td>
											<td width="170px">وضعیت کارکرد</td>
											<td width="170px">شرح پرداخت</td>
											<td width="170px">شرح کسور</td>
										</tr>
										<tr>
											<td rowspan="3">
												<p><strong>کد پرسنلی: </strong><span class="pay_slip staff_no"></span></p>
												<p><strong>نام و نام خانوادگی: </strong><span class="pay_slip staff_name"></span></p>
												<p><strong>کد ملی: </strong><span class="pay_slip kod_meli"></span></p>
												<p><strong>شماره شناسنامه: </strong><span class="pay_slip shenasnameh"></span></p>
												<p><strong>شغل / سمت: </strong><span class="pay_slip"></span></p>
												<p><strong>شماره حساب / کارت: </strong><span class="pay_slip"></span></p>
												<p><strong>شماره بیمه: </strong><span class="pay_slip"></span></p>
											</td>
											<td>
												<p><strong>جمع کارکرد: </strong><span class="pay_slip karkard"></span> ساعت</p>
												<p><strong>جمع غیبت: </strong><span class="pay_slip gheybat"></span> ساعت</p>
											</td>
											<td>
												<p><strong>حقوق پایه: </strong><span class="pay_slip salary_base"></span> ریال</p>
												<p><strong>حقوق هر ساعت کار: </strong><span class="pay_slip salary_per_min"></span> ریال</p>

												<p class="pay_slip ezafat"><strong></strong><span class="pay_slip"></span> </p>
											</td>
											<td>
												<p class="pay_slip kosor"><strong></strong><span class="pay_slip"></span> </p>
											</td>
										</tr>
										<tr style="background:#eee;">
											<td>وضعیت مرخصی</td>
											<td>مانده حقوق</td>
											<td>امضاء - اثرانگشت</td>
										</tr>
										<tr>
											<td>
												<p><strong>مرخصی: </strong><span class="pay_slip"></span></p>
												<p><strong>مانده مرخصی: </strong><span class="pay_slip"></span></p>
											</td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>
												<p>جمع پرداخت: <span class="pay_slip"></span></p>
											</td>
											<td>
												<p>جمع کسور: <span class="pay_slip"></span></p>
											</td>
											<td colspan="2">
												<p>خالص دریافتی: <span class="pay_slip salary_total"></span> ریال</p>
											</td>
										</tr>

									</table>
								</div>
							</div>
						</div>
	            	</div>
	            	<!-- /.panel-body -->
	            </div>
	            <!-- /.panel -->
	        </div>
	    </div>
	    <!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
	
@stop