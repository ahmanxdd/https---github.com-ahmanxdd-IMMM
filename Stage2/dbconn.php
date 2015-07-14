<?php
	const DBHOST = "127.0.0.1";
	const DBNAME = "sdp_test";
	const USERNAME = "root";
	const PASSWORD = "haha123";
	
	class DB {
		public static $debugMode = false;
		public static $DBHOST = "127.0.0.1";
		public static $DBNAME = "sdp_test";
		public static $USERNAME = "root";
		public static $PASSWORD = "haha123";
		public static $db;	
		
		public static function openDatabase() {
			$db = new mysqli(DB::$DBHOST, DB::$USERNAME, DB::$PASSWORD, DB::$DBNAME);
		}
		
		public static function genOrderByStr($args, $argsNum, $first) {
			
			//DB::genOrderByStr(func_get_args(), func_num_args(), 1)
			if ($argsNum <= $first)
				return "";
			
			$orderByStr = "ORDER BY ";
			for ($i = $first; $i < $argsNum - 2; $i+=2)
				$orderByStr .= $args[$i] . ' ' . $args[$i+1] . ',';
			$orderByStr .= $args[$argsNum-2] . ' ' . $args[$argsNum-1];
			return $orderByStr;
		}
	
		public static function genInsertStr($tableName) {
			$args = func_get_args();
			$argsNum = func_num_args();
			
			$insertStr = "INSERT INTO $tableName VALUES(";
			for ($i = 1; $i < $argsNum-1; $i++) {
				if (is_null($args[$i]))
					$insertStr .= 'null,';
				else
					$insertStr .= $args[$i] . ',';
			}
			
			if (is_null($args[$argsNum-1]))
					$insertStr .= 'null';
				else
					$insertStr .= $args[$i];
			$insertStr .= ")";
			
			return $insertStr;
		}
		
		public static function query($query) {
			$result = $db->query($query);
			//for INSERT, UPDATE, DELETE  
			if ($result === true)
				return true;
			if ($result === false) {
				if ($debugMode)
					die("Database error: " . $db->error);
				return false;
			}
			//for SELECT
			if ($result->num_rows > 0) {
				return "something"; //TODO
			} 
			else 
				return  null;
		}
		
		private static $PREFIX = array();

		public static function getLastIndex($tableName) {
			
			return "111";
		}
		
		
	}
	
	DB::openDatabase();

	
	
?>