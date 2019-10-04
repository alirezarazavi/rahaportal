<?php

class UserController extends \BaseController {

	public function index()
	{
		$users 	=	User::where('id','!=',Auth::user()->id)->where('staff_id','=',0)->get();
		return View::make('settings.users')
					->with('users',$users);
	}

	public function store()
	{
		$rules 	= 	array(
			'username' 		=> 	'required|min:4|max:10|unique:users',
			'email' 		=>	'required|email',
			'password' 		=> 	'required',
			'conf_password' => 	'required|same:password',
			'role'			=> 	'required',
		);
		$messages = array(
			'username.required'			=> 'نام کاربری الزامی است',
			'username.unique'			=> 'این نام کاربری قبلا ثبت شده است',
			'email.required'			=> 'ایمیل الزامی است',
			'email.email'				=> 'یک ایمیل صحیح وارد کنید',
			'password.required'			=> 'رمز عبور الزامی است',
			'conf_password.required'	=> 'تکرار رمز عبور الزامی است',
			'password.same'				=> 'رمز عبور و تکرار رمز عبور یکی نیست',
		);
		$validator = Validator::make(Input::all(), $rules, $messages);
		if($validator->fails()) {
			return Redirect::route('settings.users.index')
							->withErrors($validator)
							->withInput();
		} else {
			$username 	= 	Input::get('username');
			$email 		= 	Input::get('email');
			$password 	= 	Input::get('password');
			$role 		= 	Input::get('role');
			$user 		= 	User::create(
				array(
					'username' 	=> 	$username,
					'email' 	=> 	$email,
					'password'	=>	Hash::make($password),
					'role'		=>	$role
				));
			return Redirect::route('settings.users.index')
								->with('alert-success','کاربر ایجاد شد.');
		}
	}

	public function update($id)
	{
		$rules 	= 	array(
			'username' 		=> 	'required|min:4|max:10|unique:users',
			'email' 		=>	'required|email',
			'password' 		=> 	'required',
			'conf_password' => 	'required|same:password',
			'role'			=> 	'required',
		);
		$messages = array(
			'username.required'			=> 'نام کاربری الزامی است',
			'username.unique'			=> 'این نام کاربری قبلا ثبت شده است',
			'email.required'			=> 'ایمیل الزامی است',
			'email.email'				=> 'یک ایمیل صحیح وارد کنید',
			'password.required'			=> 'رمز عبور الزامی است',
			'conf_password.required'	=> 'تکرار رمز عبور الزامی است',
			'password.same'				=> 'رمز عبور و تکرار رمز عبور یکی نیست',
		);
		$validator = Validator::make(Input::all(), $rules, $messages);
		if($validator->fails()) {
			return Redirect::route('settings.users.index')
							->withErrors($validator)
							->withInput();
		} else {
			$username 	= 	Input::get('username');
			$email 		= 	Input::get('email');
			$password 	= 	Input::get('password');
			$role 		= 	Input::get('role');
			$user 		= 	User::find($id);
			$user->update(
				array(
					'username' 	=> 	$username,
					'email' 	=> 	$email,
					'password'	=>	Hash::make($password),
					'role'		=>	$role
				));
			return Redirect::route('settings.users.index')
								->with('alert-success','تغییرات ذخیره شد.');
		}
	}

	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		return Redirect::back();
	}

}