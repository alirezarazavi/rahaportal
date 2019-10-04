<?php

class SalarySubAddController extends \BaseController {

	public function show($salary_id) 
	{
		$salary_base 				= 	SalaryBase::find($salary_id);
		$salary_subandadd 			= 	SalarySubAdd::where('salary_base_id','=',$salary_id)->get();
		$salary_subandadd_values 	=	DB::table('salary_subadd_values')->get();
		return View::make('salary.base.subandadd.index')
				->with('salary_base', $salary_base)
				->with('salary_subandadd', $salary_subandadd)
				->with('salary_subandadd_values', $salary_subandadd_values);
	}

	public function store()
	{
		$salary_subandadd 	= 	SalarySubAdd::create(array(
			'title'			=>	Input::get('title'),
			'description' 	=> 	Input::get('description'),
			'type' 			=> 	Input::get('type'),
			'salary_base_id'=> 	Input::get('salary_base_id')
		));
		$salary_subandadd->save();
		return Redirect::back();
	}

	public function store_value()
	{
		$subandadd_value 	= 	Input::get('value');
		$subandadd_id 		= 	Input::get('subandadd_id');
		$for_all 			=	Input::get('for_all');

		$exist = DB::table('salary_subadd_values')->where('subadd_id','=',$subandadd_id)->first();
		if ($exist) {
			DB::table('salary_subadd_values')
				->where('id', '=', $exist->id)
				->update(array(
					'value' 	=>	$hour = (int)str_replace(',', '', $subandadd_value),
					'subadd_id'	=>	$subandadd_id,
					'for_all' 	=> 	$for_all,
				)
			);
		} else {
			DB::table('salary_subadd_values')
				->insert(array(
					'value' 	=>	$hour = (int)str_replace(',', '', $subandadd_value),
					'subadd_id'	=>	$subandadd_id,
					'for_all' 	=> 	$for_all,
				)
			);
		}
		return Redirect::back();
	}

	public function update($subadd_id)
	{
		$salary_subandadd 	= 	SalarySubAdd::find($subadd_id)->update(array(
			'title'			=>	Input::get('edit_title'),
			'description' 	=> 	Input::get('edit_description'),
			'type' 			=> 	Input::get('edit_type'),
		));
		return Redirect::back()->with('alert-success','تغییرات ذخیره شد.');
	}

	public function destroy($subadd_id)
	{
		return Redirect::back()->with('alert-warning','در حال حاضر انجام این عملیات امکان پذیر نیست.');
	}

}