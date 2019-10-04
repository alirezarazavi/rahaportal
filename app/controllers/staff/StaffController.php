<?php

class StaffController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$staff = Staff::all();
		return View::make('staff.staff')
				->with('staff',$staff);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('staff.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$staff = Staff::create(array(
			'fname' 		=> Input::get('fname'),
			'lname' 		=> Input::get('lname'),
			'staff_no'		=> Input::get('staff_no'),
			'kod_meli'		=> Input::get('kod_meli'),
			'shenasnameh'	=> Input::get('shenasnameh'),
			'birth_date'	=> Input::get('birth_date'),
			'birth_location'=> Input::get('birth_location'),
			'madrak'		=> Input::get('madrak'),
			'shoghl'		=> Input::get('shoghl'),
			'start_date'	=> Input::get('start_date'),
			'bimeh_date'	=> Input::get('bimeh_date'),
			'bimeh_no'		=> Input::get('bimeh_no'),
			'phone'			=> Input::get('phone'),
			'cellphone'		=> Input::get('cellphone'),
			'address'		=> Input::get('address'),
			'bank_name'		=> Input::get('bank_name'),
			'bank_no'		=> Input::get('bank_no'),
			'bank_card'		=> Input::get('bank_card'),
			'description'	=> Input::get('description'),

		));
		$staff->save();
		// create user
		if ($staff) {
			User::create(array(
				'username' 	=>	Input::get('staff_no'),
				'password'	=>	Hash::make(Input::get('kod_meli')),
				'email'		=>	0,
				'role'		=>	'user',
				'staff_id' 	=>	$staff->id
			));
		}
		return Redirect::route('staff.create')
				->with('alert-success','اطلاعات پرسنل با موفقیت ثبت شد.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$staff = Staff::find($id);
		return View::make('staff.show')
				->with('staff',$staff);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$staff = Staff::find($id);
		return View::make('staff.edit')
				->with('staff',$staff);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$staff = Staff::find($id);
		$staff->update(array(
			'fname' 		=> Input::get('fname'),
			'lname' 		=> Input::get('lname'),
			'staff_no'		=> Input::get('staff_no'),
			'kod_meli'		=> Input::get('kod_meli'),
			'shenasnameh'	=> Input::get('shenasnameh'),
			'birth_date'	=> Input::get('birth_date'),
			'birth_location'=> Input::get('birth_location'),
			'madrak'		=> Input::get('madrak'),
			'shoghl'		=> Input::get('shoghl'),
			'start_date'	=> Input::get('start_date'),
			'bimeh_date'	=> Input::get('bimeh_date'),
			'bimeh_no'		=> Input::get('bimeh_no'),
			'phone'			=> Input::get('phone'),
			'cellphone'		=> Input::get('cellphone'),
			'address'		=> Input::get('address'),
			'bank_name'		=> Input::get('bank_name'),
			'bank_no'		=> Input::get('bank_no'),
			'bank_card'		=> Input::get('bank_card'),
			'description'	=> Input::get('description'),
		));
		$staff->save();
		// update user
		if ($staff) {
			$user = User::where('staff_id','=',$id);
			$user->update(array(
				'username' 	=>	Input::get('staff_no'),
				'password'	=>	Hash::make(Input::get('kod_meli')),
				'email'		=>	0,
				'role'		=>	'user',
			));
		}
		return Redirect::route('staff.index')
				->with('alert-success','اطلاعات پرسنل ویرایش شد.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$staff 	= Staff::find($id);
		$staff->delete();
		$user 	= 	User::where('staff_id','=',$id);
		$user->delete();
		return Redirect::route('staff.index')
				->with('alert-danger', 'اطلاعات پرسنل حذف شد.');
	}


}
