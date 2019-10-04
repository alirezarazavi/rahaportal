<?php

class ReportController extends \BaseController {

	public function index()
	{

		$time   = time();
		$repTime = mb_split('-',$this->setting->report_time);
		$date = strtotime(date("Y-m-d l"));
		$report = Report::where('user_id','=',Auth::user()->id)->orderBy('date','asc')->take(10)->get();
		$exist = Report::where('user_id','=',Auth::user()->id)->where('date','=', $date)->first();
		$notRepTime = false;
		$alreadyRep = false;
		$msg = '';

		if ($exist !== null):
			$alreadyRep = true;
			$msg .= '<p>شما گزارش کار امروز خود را ارسال کرده‌اید</p>';
		endif;
		if ($time < strtotime($repTime[0]) OR $time > strtotime($repTime[1])):
			$notRepTime = true;
			$msg .= '<p>فقط از ساعت '.$repTime[0].' تا '.$repTime[1].' امکان نوشتن گزارش وجود دارد</p>';
		endif;

		return View::make('report.index')
				->with('report', $report)
				->with('exist', $exist)
				->with('notRepTime', $notRepTime)
				->with('alreadyRep', $alreadyRep)
				->with('msg', $msg);
	}

	public function store()
	{
		$workTime = mb_split('-', $this->setting->work_time);
		$entTime = Input::get('enter_time');
		$extTime = Input::get('exit_time');
		$takhir = (strtotime($entTime) - strtotime($workTime[0])) / 60;
		$tajil = (strtotime($workTime[1]) - strtotime($extTime)) / 60;
		$date = strtotime(date("Y-m-d l"));
		Report::create(array(
			"user_id"       =>  Auth::user()->id,
			"description"   =>  Input::get('report_description'),
			"en_ex_time"    =>  Input::get('enter_time') .'-'. Input::get('exit_time'),
			"leave_time"    =>  Input::get('leaveTime_start'),
			"date"          =>  $date,
			"takhir"		=>	$takhir,
			"tajil"			=>	$tajil
		));
		return Redirect::route('report.index');
	}

}