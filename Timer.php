<?php

/**
 * Create timers
 */
class Timer {

	protected static $timers = array();

	/**
	 * @param string $name
	 */
	public static function start($name) {
		self::$timers[$name] = microtime(true);
	}

	/**
	 * @param string $name
	 * @return bool|int
	 */
	public static function lap($name) {
		if(isset(self::$timers[$name])) {
			return microtime(true) - self::$timers[$name];
		} else {
			return false;
		}
	}

	/**
	 * @param string $name
	 * @return float
	 */
	public static function lapInMinutes($name) {
		return self::lap($name) / 60;
	}

}
