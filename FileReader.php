<?php

/**
 * Read data from a file
 */
class FileReader {

	/**
	 * @param resource $fh
	 * @param int $count
	 * @return array
	 */
	public static function readLines($fh, $count) {
		$lines = array();
		for($i = 0; $i < $count && $line = fgets($fh); $i++) {
			$lines[] = $line;
		}
		return $lines;
	}

}
