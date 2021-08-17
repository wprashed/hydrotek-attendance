<?php 
class DB{
	public static $pdo;
	
	public static function connect(){
		if( !isset(self::$pdo) ){
			try{
				self::$pdo = new PDO("sqlite:db/library_management.db");
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		return self::$pdo;
	}
	public static function prepare($sql){
		return self::connect()->prepare($sql);
	}
}
?>