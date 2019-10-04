<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li class="sidebar-user">
				<p style="color:#8A8A8A;">
					امروز:&nbsp;
					{{jDate::forge()->format('l j F y')}}
				</p>
			</li>
			<!-- <li class="sidebar-search">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control fa-input" placeholder="جستجو ...">
					<span class="input-group-btn">
						<button class="btn btn-default fa-btn" type="button">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
			</li>
			input-group -->

			<li>
				<a href="{{URL::route('home')}}" @if (route::is('home')) class="active" @endif><i class="fa fa-dashboard fa-fw"></i> داشبورد</a>
			</li>
			<li @if (route::is('staff.index') OR route::is('staff.create') OR route::is('staff.show')) class="active" @endif>
				<a href="#"><i class="fa fa-users fa-fw"></i> اطلاعات پرسنل<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{URL::route('staff.index')}}" @if (route::is('staff.index')) class="active" @endif>لیست پرسنل</a>
					</li>
					<li>
						<a href="{{URL::route('staff.create')}}" @if (route::is('staff.create')) class="active" @endif>ثبت پرسنل</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li @if (route::is('salary.index') OR route::is('salary.base.index') OR route::is('salary.calculation.index') OR route::is('salary.base.subandadd.show') OR route::is('salary.calculation.store')) class="active" @endif>
				<a href="forms.html"><i class="fa fa-credit-card fa-fw"></i> حقوق و دستمزد<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{URL::route('salary.index')}}" @if (route::is('salary.index')) class="active" @endif>فیش حقوقی</a>
					</li>
					<li>
						<a href="#">مقادیر فیش حقوقی</a>
					</li>
					<li>
						<a href="{{URL::route('salary.calculation.index')}}" @if (route::is('salary.calculation.index')) class="active" @endif>محاسبه کارکرد</a>
					</li>
					<li>
						<a href="{{URL::route('salary.base.index')}}" @if (route::is('salary.base.index')) class="active" @endif>پایه حقوق</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="#"><i class="fa fa-sitemap fa-fw"></i> تجهیزات<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="#">نرم افزار</a>
					</li>
					<li>
						<a href="#">سخت افزار</a>
					</li>
					<li>
						<a href="#">اضافه کردن</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="{{URL::route('report.index')}}" @if (Route::is('report.index')) class="active" @endif><i class="fa fa-book fa-fw"></i> گزارش کار</a>
			</li>
			{{--<li>--}}
				{{--<a href="#"><i class="fa fa-suitcase fa-fw"></i> مرخصی</a>--}}
			{{--</li>--}}
			<li @if (Route::is('settings.users.index') OR Route::is('settings.general.index')) class="active" @endif>
				<a href="#"><i class="fa fa-wrench fa-fw"></i> تنظیمات<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{URL::route('settings.users.index')}}" @if (Route::is('settings.users.index')) class="active" @endif>مدیریت کاربرها</a>
					</li>
					<li>
						<a href="{{URL::route('settings.general.index')}}" @if (Route::is('settings.general.index')) class="active" @endif>تنظیمات</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->


