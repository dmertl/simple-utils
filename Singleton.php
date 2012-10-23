<?php

/**
 * Singleton
 */
class Singleton {

	private static $instance;

	/**
	 * @return mixed
	 */
	protected static function getInstance() {
		if(!self::$instance) {
			$class = get_called_class();
			self::$instance = new $class();
		}
		return self::$instance;
	}

}
