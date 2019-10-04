<?php

class SalaryBaseController extends \BaseController {

	public function index() 
	{
		$now_month 			= 	jDate::forge()->format('F');
		$now_year 			= 	jDate::forge()->format('Y');
		$now_year 			= 	FAhelper::fa_digits($now_year);

		$salary_base 		= 	SalaryBase::orderBy('id','desc')->get();
		return View::make('salary.base.index')
				->with('salary_base', $salary_base)
				->with('now_month', $now_month)
				->with('now_year', $now_year);

	}

	public function store()
	{
		$base 				= 	(int)str_replace(',', '', Input::get('salary_base'));
		$permin 			= 	(int)str_replace(',', '', Input::get('salary_per_min'));

		$salary 			= 	SalaryBase::create(array(
			'title'			=> 	Input::get('title'),
			'description'	=> 	Input::get('description'),
			'salary_base' 	=> 	$base,
			'salary_per_min'=>	$permin,
		));
		$salary->save();
		return Redirect::route('salary.base.index');
	}

	public function update($salary_base_id)
	{
		$base 				= 	(int)str_replace(',', '', Input::get('edit_salary_base'));
		$permin 			= 	(int)str_replace(',', '', Input::get('edit_salary_per_min'));

		$salary 			= 	SalaryBase::find($salary_base_id)->update(array(
			'title'			=> 	Input::get('edit_title'),
			'description'	=> 	Input::get('edit_description'),
			'salary_base' 	=> 	$base,
			'salary_per_min'=>	$permin,
		));
		// $salary->save();
		return Redirect::route('salary.base.index');
	}

	public function destroy($salary_base_id)
	{
		return Redirect::back()->with('alert-warning','در حال حاضر انجام این عملیات امکان پذیر نیست.');
	}


}