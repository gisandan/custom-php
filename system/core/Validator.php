<?php

namespace App\Core\RequestValidator;

class RequestValidator {

	/*
	 * Required
	 *
	 * @param string $data
	 * @return bool
	 */
	public static function required($data) {
		return (empty($data)) ? false : true;
	}

	/*
	 * Alpha Numeric
	 *
	 * @param string $data
	 * @return bool
	 */
	public static function alphanumeric($data) {
		return (ctype_alnum($data)) ? true : false;
	}	

	/*
	 * Max
	 *
	 * @param string $data
	 * @param int $length
	 * @return bool
	 */
	public static function max($data, $length = 0) {
		return (strlen($data) > $length) ? false : true; 
	}

	/*
	 * Min
	 *
	 * @param string $data
	 * @param int $length
	 * @return bool
	 */
	public static function min($data, $length = 0) {
		return (strlen($data) < $length) ? false : true; 
	}

	/*
	 * String
	 *
	 * @param string $data
	 * @param int $type
	 * @return bool
	 */
	public static function stringType($data) {
		return ((string)($data) != $data) false : true;
	}

	/*
	 * Int
	 *
	 * @param string $data
	 * @param int $type
	 * @return bool
	 */
	public static function intType($data) {
		return ((string)($data) != $data) false : true;
	}
}