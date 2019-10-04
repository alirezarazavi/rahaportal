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
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="col-lg-12" style="height:17px;padding:0;">
						<h3 class="panel-title pull-right">کسر و اضافه برای «{{$salary_base->title}}»</h3>
						<a href="{{URL::route('salary.base.index')}}" class="pull-left">بازگشت<i class="fa fa-angle-left fa-fw"></i></a>
					</div>
					<span class="clearfix"></span>
				</div>
				<div class="panel-body">
					<div class="row">
						<table class="table table-striped table-hover">
							<tr>
								<td>عنوان</td>
								<td>نوع</td>
								<td>توضیحات</td>
								<td class="text-center">امکانات</td>
							</tr>
							@foreach ($salary_subandadd as $subandadd)
							<tr>
								<td>
									{{$subandadd->title}}
								</td>
								<td>
									@if ($subandadd->type == 'sub') <span class="label label-danger">کسر از حقوق</span> @else <span class="label label-success">اضافه به حقوق</span> @endif 
								</td>
								<td>
									{{$subandadd->description}}
								</td>
								<td class="text-left">
									<button class="btn btn-info" data-toggle="modal" data-target="#values_{{$subandadd->id}}">مقدار</button>

									<div class="btn-group">
										<button class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown" type="button">
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-left" role="menu">
											<li><a href="#" class="text-right" data-toggle="modal" data-target="#edit_subandadd_{{$subandadd->id}}"><i class="fa fa-pencil fa-fw"></i> ویرایش</a></li>
											<li class="divider"></li>
											<li><a href="#" class="text-right" data-toggle="modal" data-target="#delete_subandadd_{{$subandadd->id}}"><i class="fa fa-trash-o fa-fw"></i> حذف</a></li>
										</ul>
									</div>
								</td>
							</tr>
							<!-- NEW SUB_ADD VALUE -->
							<div class="modal fade" id="values_{{$subandadd->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										{{Form::open(array('route' => array('salary.base.subandadd.value.store'), 'method' => 'POST'))}}
										{{Form::hidden('subandadd_id',$subandadd->id)}}
										<div class="modal-header">
											<h4>مقدار @if ($subandadd->type == 'sub') <span class="label label-danger">کسر از حقوق</span> @else <span class="label label-success">اضافه به حقوق</span> @endif برای «{{$subandadd->title}}»</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<div class="input-group">
													<input type="text" class="form-control fa-input formatNumber" @foreach($salary_subandadd_values as $subandadd_values)
													@if ($subandadd_values->subadd_id == $subandadd->id) value="{{$subandadd_values->value}}" @endif @endforeach id="value" name="value">
													<div class="input-group-addon fa-btn">ریال</div>
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<label>
														برای همه کارکنان محاسبه شود؟
														<input type="checkbox" name="for_all" 
															@foreach ($salary_subandadd_values as $subandadd_values) 
																@if ($subandadd_values->subadd_id == $subandadd->id)
																	@if ($subandadd_values->for_all == 'y') 
																		checked="checked" 
																	@endif 
																@endif 
															@endforeach 
														value="y">
														<a href="#" class="tipsy" title="اگر تیک این قسمت را بگذارید، این مقدار به صورت خودکار هرماه برای تمامی کارکنان محاسبه خواهد شد.">
															<i class="fa fa-exclamation-circle fa-fw"></i>
														</a>
													</label>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success pull-left">ذخیره</button>
											<button class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
										</div>
										{{Form::close()}}
									</div>
								</div>
							</div>
							<!-- Edit -->
							<div class="modal fade" id="edit_subandadd_{{$subandadd->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										{{Form::open(array('route' => array('salary.base.subandadd.update', $subandadd->id), 'method' => 'PUT'))}}
										<div class="modal-header bg-warning">
											<h4>ویرایش «{{$subandadd->title}}»</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<input type="text" name="edit_title" class="form-control" value="{{$subandadd->title}}" placeholder="عنوان">
											</div>
											<div class="form-group">
												<input type="text" name="edit_description" class="form-control" value="{{$subandadd->description}}" placeholder="توضیح (اختیاری)">
											</div>
											<div class="form-group">
												<select class="form-control" name="edit_type">
													<option value="0" selected="selected">نوع...</option>
													<option value="add" @if ($subandadd->type == 'add') selected="selected" @endif>اضافه</option>
													<option value="sub" @if ($subandadd->type == 'sub') selected="selected" @endif>کسر</option>
												</select>
											</div>
										</div>
										<div class="modal-footer">
											{{Form::submit('ذخیره', array('class' => 'btn btn-info pull-left'))}}
											<button class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
										</div>
										{{Form::close()}}
									</div>
								</div>
							</div>
							<!-- Delete -->
							<div class="modal fade" id="delete_subandadd_{{$subandadd->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										{{Form::open(array('route' => array('salary.base.subandadd.destroy'), 'method' => 'DELETE'))}}
										{{Form::hidden('salary_base_id', $salary_base->id)}}
										<div class="modal-header bg-danger">
											<h4>حذف «{{$subandadd->title}}»</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<ul>
													<li>شما در حال حذف «{{$subandadd->title}}» هستید.</li>
													<li>مقادیر «{{$subandadd->title}}» نیز به همراه خود آن حذف و غیرقابل بازگشت خواهد بود.</li>
													<li>حذف این آیتم تاثیری بر محاسبات انجام گرفته براساس این آیتم در گذشته نخواهد داشت و پس از حذف این آیتم، محاسبات با مقادیر جدید صورت می‌گیرد.</li>
												</ul>
											</div>
										</div>
										<div class="bg-danger"><p class="modal-footer-tips-text">نکته: این عملیات قطعی و غیرقابل بازگشت خواهد بود.</p></div>
										<div class="modal-footer">
											{{Form::submit('حذف', array('class' => 'btn btn-danger pull-left'))}}
											<button class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
										</div>
										{{Form::close()}}
									</div>
								</div>
							</div>
							@endforeach
						</table>
						<!-- New -->
						<div class="modal fade" id="new_subandadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									{{Form::open(array('route' => array('salary.base.subandadd.store'), 'method' => 'POST'))}}
									{{Form::hidden('salary_base_id', $salary_base->id)}}
									<div class="modal-header">
										<h4>ایجاد کسر یا اضافه از حقوق برای «{{$salary_base->title}}»</h4>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<input type="text" name="title" class="form-control" placeholder="عنوان">
										</div>
										<div class="form-group">
											<input type="text" name="description" class="form-control" placeholder="توضیح (اختیاری)">
										</div>
										<div class="form-group">
											<select class="form-control" name="type">
												<option value="0" selected="selected">نوع...</option>
												<option value="add">اضافه</option>
												<option value="sub">کسر</option>
											</select>
										</div>
									</div>
									<div class="modal-footer">
										{{Form::submit('ایجاد', array('class' => 'btn btn-success pull-left'))}}
										<button class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
									</div>
									{{Form::close()}}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-info btn-outline pull-left" data-toggle="modal" data-target="#new_subandadd">اضافه</button>
					<span class="clearfix"></span>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

@stop