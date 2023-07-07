<?php
class Database {
	public static $db;
	public static $con;
	function Database(){
		$this->user="contine2_bookmedik";$this->pass="CyyR&cQL0c=U";$this->host="192.95.39.30";$this->ddbb="contine2_bookmedik";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb, '3306');
		$con->query("set sql_mode=''");
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
