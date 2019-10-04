<?php

class SettingController extends \BaseController {

    public function index()
    {
        $def = Setting::first();
        return View::make('settings.general')
                    ->with('def',$def);
    }

    public function store()
    {

        $id                     = Input::get('id');
        $title                  = Input::get('site_title');
        $work_time              = Input::get('workTime_start') .'-'. Input::get('workTime_end');
        $vacation_per_month     = Input::get('vacation_per_month');
        $report_time            = Input::get('repTime_start') .'-'. Input::get('repTime_end');
        $availability_from_out  = Input::get('availability_from_out');
        $user_access            = Input::get('user_access');

        Setting::updateOrCreate(array('id' => $id),array(
            'title'                 =>  $title,
            'work_time'             =>  $work_time,
            'vacation_per_month'    =>  $vacation_per_month,
            'report_time'           =>  $report_time,
            'availability_from_out' =>  $availability_from_out,
            'user_access'           =>  $user_access,
        ));

        return Redirect::back()->with('alert-success','تغییرات ذخیره شد.');
    }


    public function calendar()
    {
        // DayOff
        if (Request::ajax()) {
            // Submit Yearly DayOff
            if (Input::get('submit') == 'yearly') {
                $date_split = mb_split('/', Input::get('yearly_date'));
                $date = jDateTime::mktime(0,0,0,$date_split[1],$date_split[2],$date_split[0]);
                $find_duplicate = DB::table('calendar_days_off')->where('yearly','=',$date)->first();
                if (is_null($find_duplicate)):
                    DB::table('calendar_days_off')->insert(['yearly' => $date]);
                endif;
            }
            // Delete Yearly DayOff
            if (Input::get('delete') == 'yearly') {
                $date = Input::get('yearly_date_id');
                DB::table('calendar_days_off')->where('id','=',$date)->delete();
            }

            // Submit Weekly DayOff
            if (Input::get('submit') == 'weekly') {
                if (Input::get('weekly_dayOff')) {
                    $day = Input::get('weekly_dayOff');
                    DB::table('calendar_days_off')->where('weekly','=',$day)->delete();
                    DB::table('calendar_days_off')->insert(['weekly' => $day]);
                }
            }

        }
        $daysOff =  DB::table('calendar_days_off')->orderBy('weekly','desc')->get();
        return View::make('settings.calendar')
                    ->with('daysOff',$daysOff);
    }
    

}