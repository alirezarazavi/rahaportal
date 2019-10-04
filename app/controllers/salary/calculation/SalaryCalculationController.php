<?php

class SalaryCalculationController extends \BaseController {

	public function index()
	{
		$this_month 	= jDate::forge()->format('F');
		$this_year 		= jDate::forge()->format('Y');
		$this_year 		= FAhelper::fa_digits($this_year);

		$salary_base 	= SalaryBase::orderBy('id','desc')->get();
		return View::make('salary.calculation.index')
				->with('salary_base', $salary_base)
				->with('this_month', $this_month)
				->with('this_year', $this_year);
	}

	public function store()
	{
		if (Request::ajax()) {

			if (Input::get('get') == 'calculation') {
				// get variables from js/ajax (script.js)
				$baseID 	= Input::get('baseID');
				$staffID 	= Input::get('staffID');
				$date_year	= Input::get('date_year');
				$date_month	= Input::get('date_month');
				// salary
				$salary 	= DB::table('salary')
								->where('salary_base_id','=',$baseID)
								->where('staff_id','=',$staffID)
								->where('date_year','=',$date_year)
								->where('date_month','=',$date_month)
								->first();
				// karkard
				$karkard 	= DB::table('work')->find($salary->karkard_id);
				// staff_subadd (sub and add)
				$staffsubadd= DB::table('staff_subadd')
								->where('staff_id','=',$staffID)
								->where('base_id','=',$baseID)
								->where('salary_id','=',$salary->id)
								->get();
				$data = array('karkard' => $karkard, 'staffsubadd' => $staffsubadd, 'salary' => $salary);
				return json_encode($data);
			}

			if (Input::get('set') == 'calculation') {
				// get variables from js/ajax (script.js)
				$baseID 		= Input::get('baseID');
				$staffID 		= Input::get('staffID');
				$date_year		= Input::get('date_year');
				$date_month		= Input::get('date_month');
				$date 			= new DateTime;
				/* Karkard and Gheybat (karkard) */
				// check if exist
				$salary 		= DB::table('salary')->where('salary_base_id','=',$baseID)->where('staff_id','=',$staffID)->where('date_year','=',$date_year)->where('date_month','=',$date_month)->first();
				$karkard_exist 	= null;
				if ($salary): $karkard_exist = DB::table('work')->find($salary->karkard_id); endif;
				// variable to store last insert id
				$lastInsertId 	= null;
				if ($karkard_exist != null) {
					// Update if exist
					DB::table('work')
						->where('id','=',$karkard_exist->id)
						->update(array(
							// 'staff_id' 		=> 	$staffID,
							// 'base_id'		=>	$baseID,
							'karkard_day' 	=>	Input::get('karkard_day'),
							'karkard_hour' 	=>	Input::get('karkard_hour'),
							'karkard_minute'=>	Input::get('karkard_minute'),
							'gheybat_day' 	=>	Input::get('gheybat_day'),
							'gheybat_hour' 	=>	Input::get('gheybat_hour'),
							'gheybat_minute'=>	Input::get('gheybat_minute'),
							'karkard_total' => 	FAhelper::calculation(Input::get('karkard_day'),Input::get('karkard_hour'),Input::get('karkard_minute')),
							'gheybat_total' => 	FAhelper::calculation(Input::get('gheybat_day'),Input::get('gheybat_hour'),Input::get('gheybat_minute')),
							'updated_at'	=> 	$date,
						)
					);
				} else {
					// Insert new if not exist
					$lastInsertId = DB::table('work')
						->insertGetId(array(
							'staff_id' 		=> 	$staffID,
							'base_id'		=>	$baseID,
							'karkard_day' 	=>	Input::get('karkard_day'),
							'karkard_hour' 	=>	Input::get('karkard_hour'),
							'karkard_minute'=>	Input::get('karkard_minute'),
							'gheybat_day' 	=>	Input::get('gheybat_day'),
							'gheybat_hour' 	=>	Input::get('gheybat_hour'),
							'gheybat_minute'=>	Input::get('gheybat_minute'),
							'karkard_total' => 	FAhelper::calculation(Input::get('karkard_day'),Input::get('karkard_hour'),Input::get('karkard_minute')),
							'gheybat_total' => 	FAhelper::calculation(Input::get('gheybat_day'),Input::get('gheybat_hour'),Input::get('gheybat_minute')),
							'created_at'	=> 	$date,
							'updated_at'	=> 	$date,
						)
					);
				}
				if ($lastInsertId 	== 	null) {
					// if new record, get last insert id, if updated record, get from above
					$lastInsertId 	= 	$karkard_exist->id;
				}
				// Calculation of Total Salary (base and minute salary and add, sub from salary)
				$totalGheybat 		= 	FAhelper::calculation(Input::get('gheybat_day'),Input::get('gheybat_hour'),Input::get('gheybat_minute'));
				$sub_and_add 		= 	Input::get('sub_and_add');
				$salary 			= 	Input::get('salary_base') - ($totalGheybat * Input::get('salary_min'));
				$totalSalary 		= 	$salary;

				// salary
				DB::table('salary')
						->where('salary_base_id','=',$baseID)
						->where('staff_id','=',$staffID)
						->where('date_year','=',$date_year)
						->where('date_month','=',$date_month)
						->delete();
				$salary_last_insert_id = DB::table('salary')
					->insertGetId(array(
						'salary_base_id'	=> 	$baseID, 
						'staff_id' 			=> 	$staffID,
						'karkard_id'		=> 	$lastInsertId,
						'total_salary'		=> 	$totalSalary,
						'date_year'			=> 	$date_year,
						'date_month'		=> 	$date_month,
						'created_at'		=> 	$date,
						'updated_at'		=> 	$date,
					)
				);

				// Delete Previous staff_subadd (sub and add)
				DB::table('staff_subadd')
					->where('staff_id','=',$staffID)
					->where('base_id','=',$baseID)
					->where('salary_id','=',$salary_last_insert_id)
					->delete();
				if ($sub_and_add) :
					foreach ($sub_and_add as $subadd) :
						// Insert into staff_subadd (sub and add)
						DB::table('staff_subadd')
							->insert(array(
								'subadd_value_id'	=> 	$subadd['subadd_value_id'],
								'staff_id'			=>	$staffID,
								'base_id'			=>	$baseID,
								'salary_id'			=>	$salary_last_insert_id,
							)
						);
						// add or sub from salary
						if ($subadd['subadd_type'] == 'add_calc') {
							$totalSalary += $subadd['subadd_value'];
						} 
						if ($subadd['subadd_type'] == 'sub_calc') {
							$totalSalary -= $subadd['subadd_value'];
						}
					endforeach;
					// update salary to insert new salary value with sub and add
					DB::table('salary')->where('id','=',$salary_last_insert_id)->update(array('total_salary' => $totalSalary));
				endif;

			}
		}

		$base_id 			= Input::get('base_id');
		$month				= Input::get('month');
		$year 				= Input::get('year');
		$base 				= SalaryBase::find($base_id);
		$staff 				= Staff::all();
		$subandadd 			= SalarySubAdd::where('salary_base_id', '=', $base_id)->get();
		$subandadd_values 	= DB::table('salary_subadd_values')->get();
		return View::make('salary.calculation.create')
				->with('base', $base)
				->with('subandadd', $subandadd)
				->with('subandadd_values', $subandadd_values)
				->with('staff', $staff)
				->with('month', $month)
				->with('year', $year);
	}


}