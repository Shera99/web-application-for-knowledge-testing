<?php 
session_start();
class ConnectBD{
    const User = "admin";
    const Pass = "shera29019";
    const Host = "shop";
    const DB = "testirovanie";
    const Charset = "utf8";
    const opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public static function connect(){
        $user 		= self::User;
		$pass 		= self::Pass;
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