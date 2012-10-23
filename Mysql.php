<?php

Class Mysql extends Singleton {

	public static function connect() {
		if(!mysql_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASS))
			die('Unable to connect to the database');
		if(!mysql_select_db(Config::DB_DATABASE))
			die('Unable to select database');
	}

	public static function queryToArray($sql) {
		if($result = self::query($sql)) {
			return self::resultToArray($result);
		} else {
			Log::write('error', self::error() . "\nSQL: " . $sql);
			return array();
		}
	}

	public static function query($sql) {
		return mysql_query($sql);
	}

	public static function fetchRow($result) {
		return mysql_fetch_array($result, MYSQL_ASSOC);
	}

	public static function resultToArray($result) {
		$arr = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$arr[] = $row;
		}
		return $arr;
	}

	public static function error() {
		return mysql_error();
	}

	public static function close() {
		mysql_close();
	}

	public static function escape($value) {
		return mysql_real_escape_string($value);
	}

}
