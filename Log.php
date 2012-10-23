<?php

/**
 * Write to a log file
 * @method static Log getInstance
 */
class Log extends Singleton {

	protected $handles = array();

	/**
	 * @param string $file
	 * @param string $message
	 */
	public static function write($file, $message) {
		$log = self::getInstance();
		if(!isset($log->handles[$file])) {
			$log->handles[$file] = fopen($file . '.log', 'a+');
		}
		if($log->handles[$file]) {
			fwrite($log->handles[$file], $message);
		}
	}

	public function __destruct() {
		$log = self::getInstance();
		foreach($log->handles as $fh) {
			fclose($fh);
		}
	}

}
