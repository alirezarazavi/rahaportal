<?php
class FAhelper {

	public static function month_name($month)
	{
		// Get Number of Month and return farsi name
		$month_name = '';
		switch ($month) {
			case 1:
				$month_name = 'فروردین';
				break;
			case 2:
				$month_name = 'اردیبهشت';
				break;
			case 3:
				$month_name = 'خرداد';
				break;
			case 4:
				$month_name = 'تیر';
				break;
			case 5:
				$month_name = 'مرداد';
				break;
			case 6:
				$month_name = 'شهریور';
				break;
			case 7:
				$month_name = 'مهر';
				break;
			case 8:
				$month_name = 'آبان';
				break;
			case 9:
				$month_name = 'آذر';
				break;
			case 10:
				$month_name = 'دی';
				break;
			case 11:
				$month_name = 'بهمن';
				break;
			case 12:
				$month_name = 'اسفند';
				break;
			default:
				$month_name = 'انتخاب کنید';
				break;
		}
		return $month_name;
	}

	// Calculation of Karkard and Gheybat of staff
	public static function calculation($day,$hour,$minute)
	{
		$day_calc 		= 	($day * 24) * 60;
		$hour_calc 		=  	$hour * 60;
		$minute_calc 	=	$minute;
		$total_calc 	= 	$day_calc + $hour_calc + $minute_calc;
		return $total_calc;
	}

	// Convert Farsi Digits to English
	public static function fa_digits($number)
	{
		$persian_digits    	=    array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
		$english_digits    	=    array('0','1','2','3','4','5','6','7','8','9');
		$result 			= str_replace($persian_digits, $english_digits, $number);
		return $result;
	}

	public static function day_name($day)
	{
		$day_name = '';
		switch($day):
			case 0:
				$day_name = 'شنبه';
				break;
			case 1:
				$day_name = 'یکشنبه';
				break;
			case 2:
				$day_name = 'دوشنبه';
				break;
			case 3:
				$day_name = 'سه شنبه';
				break;
			case 4:
				$day_name = 'چهارشنبه';
				break;
			case 5:
				$day_name = 'پنج شنبه';
				break;
			case 6:
				$day_name = 'جمعه';
				break;
			default:
				$day_name = 'نا مشخص';
				break;
		endswitch;
		return $day_name;
	}

}