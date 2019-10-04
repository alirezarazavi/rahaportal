<?php

class BaseController extends Controller {
//	protected static $config;
	protected $setting;
	public function __construct()
	{
//		self::$config = Definition::first();
//		View::share('config', self::$config);
		$this->setting = Setting::first();
		View::share('setting', $this->setting);

	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
