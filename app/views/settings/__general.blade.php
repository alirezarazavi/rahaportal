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
						<h3 class="panel-title">تنظیمات عمومی</h3>
					</div>
					<div class="panel-body">
						<div class="">
							<p class="text-center">موردی برای نمایش وجود ندارد</p>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-primary pull-left" data-toggle="modal" data-target="#">ذخیره</button>
						<span class="clearfix"></span>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

@stop