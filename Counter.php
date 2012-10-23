<?php

/**
 * Track incremental counters
 */
class Counter {

	protected static $counters = array();

	/**
	 * @param string $name
	 * @param int $amount Amount to increment by, defaults to 1
	 * @return int Current total after increment
	 */
	public static function inc($name, $amount = 1) {
		if(!array_key_exists($name, self::$counters)) {
			self::$counters[$name] = 0;
		}
		return self::$counters[$name] += $amount;
	}

	/**
	 * @param string $name
	 * @return int
	 */
	public static function get($name) {
		if(array_key_exists($name, self::$counters)) {
			return self::$counters[$name];
		}
		return 0;
	}

}
