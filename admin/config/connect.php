<?php

class ConnectDB{

	const User = "root";
	const DB = "testirovanie";
	const Host = "shop";
	const Charset = "utf8";
	private $opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];

	public static function connectToDb(){
		$user 		= self::User;
		$pass = '';
		$db   		= self::DB;
		$host 		= self::Host;
		$charset	= self::Charset;
		
		try {
			$conn = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo "Connection error - " . $e->getMessage();
		}
		
		return $conn;
	}

}

?>