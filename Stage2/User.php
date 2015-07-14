<?php
	include_once("field_const.php");
	include_once("dbconn.php");	
	
	//User
	function getAllUsers() {
		//desc, asc
		$orderByStr = DB::genOrderByStr(func_get_args(), func_num_args(), 0);
		
		$query = "SELECT * FROM User " 
			. $orderByStr;
		return DB::query($query);
	}
	
	function getUser($userNo) {
		$query = "SELECT * FROM User " 
			. "WHERE " . userNo . " = $userNo";	//no hardcode! , "WHERE userNo = $userNo" <-- 唔好咁打
		return DB::query($query);
	}
	
	function addUser($loginName, $loginPswd, $drvID, $custNo, $suppNo, $adminNo) {
		//addUser("ftyabc", "ftypass", "123", null, null, null)
		//$newUser = array();
		//$newUser[loginName] = "ftyabc"
		//$newUser[loginPswd] = "123"
		//#nwqUawe["abc"] = new array();
		
		//addUser($newUser);
		if (isset($loginName) && is_array($loginName)) { //for JSON associated array
			$userObj = $loginName;
			$loginName = $userObj[loginName];
			$loginPswd = $userObj[loginPswd];
			$drvId = $userObj[drvId];
			$custNo = $userObj[custNo];
			$suppNo = $userObj[suppNo];
			$adminNo = $userObj[adminNo];
		}
		
		$userNo = DB::getLastIndex("User");
		$query = DB::genInsertStr("User", $userNo, $loginName, $loginPswd, $drvID, $custNo, $suppNo, $adminNo);
		return DB::query($query);
	}

	function delUser($userNo) {
		$query = 'DELETE FROM User '
			. 'WHERE ' . userNo . " = $userNo";	//no hardcode!, "WHERE userNo = $userNo" <-- 唔好咁打"
		return DB::query($query);
	}
?>