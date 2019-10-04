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
				<div class="panel panel-gray">
					<div class="panel-heading">
						لیست پرسنل
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables">
								<thead>
									<tr>
										<th>ردیف</th>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>شماره پرسنلی</th>
										<th>شروع به کار</th>
										<th>امکانات</th>
									</tr>
								</thead>
								<tbody>
									<?php $counter = 1 ?>
									@foreach ($staff as $s)
										<tr>
											<td>{{$counter}}</td>
											<td>{{$s->fname}}</td>
											<td>{{$s->lname}}</td>
											<td class="center">{{$s->staff_no}}</td>
											<td class="center">{{$s->start_date}}</td>
											<td class="center" width="250">
												<a href="{{URL::route('staff.show', $s->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-external-link fa-i-reposition"></i> نمایش</a>
												<a href="{{URL::route('staff.show', $s->id)}}#details" class="btn btn-info btn-xs"><i class="fa fa-tasks fa-i-reposition"></i> جزئیات</a>
												<a href="{{URL::route('staff.show', $s->id)}}#salary" class="btn btn-success btn-xs"><i class="fa fa-money fa-i-reposition"></i> فیش حقوقی</a>
												{{--<a href="{{URL::route('staff.edit', $s->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit fa-i-reposition"></i> ویرایش</a>--}}
												{{--<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_staff"><i class="fa fa-trash-o fa-fw fa-i-reposition"></i> حذف</a>--}}
												<div class="btn-group">
													<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">منو</span>
													</button>
													<ul class="dropdown-menu" role="menu">
														<li><a href="{{URL::route('staff.edit', $s->id)}}" class="text-right"><i class="fa fa-pencil fa-fw"></i> ویرایش</a></li>
														<li class="divider"></li>
														<li><a href="#" class="text-right" data-toggle="modal" data-target="#delete_staff"><i class="fa fa-trash-o fa-fw"></i> حذف</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<?php $counter++ ?>

										<!-- Delete -->
										<div class="modal fade" id="delete_staff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													{{Form::open(array('route' => array('staff.destroy', $s->id), 'method' => 'DELETE'))}}
													<div class="modal-header bg-danger">
														<h4>حذف کاربر «{{$s->fname .''. $s->lname}}»</h4>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<ul>
																<li>شما در حال حذف کاربر «{{$s->fname .''. $s->lname}}» هستید.</li>
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
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="panel-footer">
						<a href="{{URL::route('staff.create')}}" class="btn btn-outline btn-primary pull-left">ثبت پرسنل</a>
						<span class="clearfix"></span>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->
	
@stop