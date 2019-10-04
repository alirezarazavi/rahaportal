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
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">مدیریت کاربر</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<table class="table table-hover">
							<thead>
								<td>نام کاربری</td>
								<td>ایمیل</td>
								<td>دسترسی</td>
								<td>تاریخ عضویت</td>
								<td>امکانات</td>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{$user->username}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->role}}</td>
										<td>{{jDate::forge($user->created_at)->format('j F Y')}}</td>
										<td>
											<div class="btn-group">
												<button class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown" type="button">
													<span class="caret"></span>
												</button>
												<ul class="dropdown-menu pull-left" role="menu">
													<li><a href="#" class="text-right" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil fa-fw"></i> ویرایش</a></li>
													<li class="divider"></li>
													<li><a href="#" class="text-right" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o fa-fw"></i> حذف</a></li>
												</ul>
											</div>
										</td>
									<tr>
									<!-- Edit -->
									<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												{{Form::open(array('route' => array('settings.users.update', $user->id), 'method' => 'PUT'))}}
												<div class="modal-header">
													<h4>ویرایش کاربر «{{$user->username}}»</h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-8">
															<input type="text" class="form-control dir-ltr" value="{{$user->username}}" placeholder="نام کاربری فقط به صورت انگلیسی" id="username" name="username">
														</div>
														<div class="col-lg-4">
															<label for="username" class="control-label">نام کاربری</label>
														</div>
													</div>
													<br/>
													<div class="row">
														<div class="col-lg-8">		
															<input type="text" class="form-control dir-ltr" value="{{$user->email}}" placeholder="ایمیل" id="email" name="email">
														</div>
														<div class="col-lg-4">
															<label for="email" class="control-label">ایمیل</label>
														</div>
													</div>
													<br/>
													<div class="row">
														<div class="col-lg-8">
															<input type="password" class="form-control dir-ltr" value="" placeholder="رمز عبور" id="password" name="password">
														</div>
														<div class="col-lg-4">
															<label for="password" class="control-label">رمز عبور</label>
														</div>
													</div>
													<br/>
													<div class="row">
														<div class="col-lg-8">
															<input type="password" class="form-control dir-ltr" value="" placeholder="تکرار رمز عبور" id="conf_password" name="conf_password">
														</div>
														<div class="col-lg-4">
															<label for="conf_password" class="control-label">تکرار رمز عبور</label>
														</div>
													</div>
													<br/>
													<div class="row">
														<div class="col-lg-8">
															<select name="role" class="form-control">
																<option value="admin">مدیر</option>
															</select>
														</div>
														<div class="col-lg-4">
															<label for="role" class="control-label">دسترسی</label>
														</div>
													</div>

												</div>

												<div class="modal-footer">
													<button class="btn btn-primary pull-left" type="submit">ذخیره تغییرات</button>
													<button type="button" class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
												</div>
												{{Form::close()}}
											</div>
										</div>
									</div>
									<!-- Delete -->
									<div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									    <div class="modal-dialog">
									        <div class="modal-content">
									            {{Form::open(array('route' => array('settings.users.destroy', $user->id), 'method' => 'DELETE'))}}
									            <div class="modal-header bg-danger">
									                <h4>حذف کاربر «{{$user->username}}»</h4>
									            </div>
									            <div class="modal-body">
													<div class="form-group">
														<ul>
															<li>شما در حال حذف کاربر «{{$user->username}}» هستید.</li>
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
					<!-- New -->
					<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								{{Form::open(array('route' => array('settings.users.store'), 'method' => 'POST'))}}
								<div class="modal-header">
									<h4>ایجاد کاربر</h4>
								</div>
								
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-8">
											<input type="text" class="form-control dir-ltr" value="{{Input::old('username')}}" placeholder="نام کاربری فقط به صورت انگلیسی" id="username" name="username">
										</div>
										<div class="col-lg-4">
											<label for="username" class="control-label">نام کاربری</label>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-lg-8">		
											<input type="text" class="form-control dir-ltr" value="{{Input::old('email')}}" placeholder="ایمیل" id="email" name="email">
										</div>
										<div class="col-lg-4">
											<label for="email" class="control-label">ایمیل</label>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-lg-8">
											<input type="password" class="form-control dir-ltr" value="" placeholder="رمز عبور" id="password" name="password">
										</div>
										<div class="col-lg-4">
											<label for="password" class="control-label">رمز عبور</label>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-lg-8">
											<input type="password" class="form-control dir-ltr" value="" placeholder="تکرار رمز عبور" id="conf_password" name="conf_password">
										</div>
										<div class="col-lg-4">
											<label for="conf_password" class="control-label">تکرار رمز عبور</label>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-lg-8">
											<select name="role" class="form-control">
												<option value="admin">مدیر</option>
											</select>
										</div>
										<div class="col-lg-4">
											<label for="role" class="control-label">دسترسی</label>
										</div>
									</div>

								</div>

								<div class="modal-footer">
									<button class="btn btn-success pull-left" type="submit">ایجاد</button>
									<button type="button" class="btn btn-default pull-left btn-padding" data-dismiss="modal">انصراف</button>
								</div>
								{{Form::close()}}
							</div>
						</div>
					</div>
					<!-- /New -->
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary btn-outline pull-left" data-toggle="modal" data-target="#newUser">ایجاد کاربر</button>
					<span class="clearfix"></span>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

@stop