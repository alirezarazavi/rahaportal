@if (Session::has('alert-success'))
	<div class="alert alert-success alert-dismissable">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    {{Session::get('alert-success')}}
	</div>
@endif

@if (Session::has('alert-danger'))
	<div class="alert alert-danger alert-dismissable">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    {{Session::get('alert-danger')}}
	</div>
@endif

@if (Session::has('alert-warning'))
	<div class="alert alert-warning alert-dismissable">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    {{Session::get('alert-warning')}}
	</div>
@endif

@if (Session::has('alert-info'))
	<div class="alert alert-info alert-dismissable">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    {{Session::get('alert-info')}}
	</div>
@endif

@if($errors->has())
	<p class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@foreach ($errors->all() as $error) {{ $error }} <br /> @endforeach
	</p>
@endif