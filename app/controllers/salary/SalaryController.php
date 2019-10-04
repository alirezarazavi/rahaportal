<?php

class SalaryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax()) {
			$date_year 	= 	Input::get('date_year');
			$date_month	= 	Input::get('date_month');
			$staffID 	= 	Input::get('staffID');
			return $this->ajaxGet($date_year, $date_month, $staffID);
		}
		$staff 			=	Staff::all();
		$salary_date 	=	Salary::orderBy('date_year','desc')->orderBy('date_month','desc')->groupBy('date_month')->groupBy('date_year')->get();
		return View::make('salary.index')
					->with('staff', $staff)
					->with('salary_date', $salary_date);
	}

	public function ajaxGet($date_year, $date_month, $staffID)
	{
		$salary 			= 	Salary::where('staff_id','=',$staffID)->where('date_year','=',$date_year)->where('date_month','=',$date_month)->first();
		if ($salary):
			$staff 			= 	Staff::find($salary->staff_id);
			$salary_base 	= 	SalaryBase::find($salary->salary_base_id);
			$work 			=	DB::table('work')->where('id','=',$salary->karkard_id)->first();
			$staff_subadd 	=	DB::table('staff_subadd')->where('staff_id','=',$staffID)->where('salary_id','=',$salary->id)->groupBy('subadd_value_id')->get();
			$subadd_value 	= 	array();
			$subadd 		= 	array();
			foreach ($staff_subadd as $s_sa):
				$subadd_value[]  	= 	DB::table('salary_subadd_values')->where('id','=',$s_sa->subadd_value_id)->get();
			endforeach;
			foreach ($subadd_value as $value):
				$subadd[] 			=	DB::table('salary_subadd')->where('id','=',$value[0]->subadd_id)->get();
			endforeach;
			return 	$result = array(
						'salary' 		=> 	$salary,
						'staff'			=>	$staff,
						'salary_base' 	=>	$salary_base,
						'work'			=>	$work,
						'staff_subadd' 	=>	$staff_subadd,
						'subadd_value'	=>	$subadd_value,
						'subadd'		=>	$subadd
					);
		endif;
		return null;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}






}
