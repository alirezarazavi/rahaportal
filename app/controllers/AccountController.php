<?php

class AccountController extends \BaseController {

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		$rules = array(
			'username' 	=>	'required',
			'password'	=>	'required',
		);
		$messages = array(
			'username.required' =>	'نام کاربری الزامی است',
			'password.required'	=>	'رمز عبور الزامی است',
		);
		$validator = Validator::make(Input::all(), $rules, $messages);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$auth = Auth::attempt(array(
				'username' 	=>  Input::get('username'),
				'password' 	=>	Input::get('password')
			));

			if (Auth::user()->role == 'user' AND $this->setting->user_access == 'false') {
				$this->logout();
				return Redirect::back()->with('alert-warning','در حال حاضر دسترسی به پنل توسط مدیر مسدود شده است');
			}
			elseif (Auth::user()->role == 'user' AND $this->setting->availability_from_out == 'false') {
				return $this->userAvailabilityFromOut();
			}
			elseif($auth) {
				return Redirect::intended();
			}
			else {
				return Redirect::back()->with('alert-danger','نام کاربری یا رمز عبور اشتباه است')->withInput();
			}

		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('login');
	}


	// User Availability
	protected function userAvailabilityFromOut()
	{
		// Check if today is OffDay <>
		$daysOff = DB::table('calendar_days_off')->get();
		$date = jDateTime::date('Y/n/j', false, false, true);
		$date1 = mb_split('/', $date);
		$jalaliDate = jDateTime::mktime(0,0,0,$date1[1],$date1[2],$date1[0]);
		$today_is_off_day = false;
		foreach ($daysOff as $off):
			if ($off->yearly == $jalaliDate):
				$today_is_off_day = true;
			endif;
		endforeach;
		if ($today_is_off_day == true):
			$this->logout();
			return Redirect::back()->with('alert-warning','دسترسی به پنل فقط در روزهای کاری مقدور است');
		endif;
		
		// Check if current time is workTime
		$date = date("H:i");
		$workTime = mb_split("-", $this->setting->work_time);
		if ($date < $workTime[0] OR $date > $workTime[1]):
			$this->logout();
			return Redirect::back()->with('alert-warning','دسترسی به پنل فقط در ساعات کاری مقدور است');
		endif;
	}

}