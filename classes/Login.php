<?php 
require_once 'DB.php';
class Login{
	protected $table = "admin";
	
	public function LogOn($email, $password){
		/* $sql = "SELECT * FROM $this->table WHERE email = ? and password = ?";
		$stmt = DB::prepare($sql);
		$stmt->execute(array($email, $password));
		$stmt->fetch();
		$num = $stmt->rowCount(); */
		if($email == 'admin@gmail.com' && $password == 'admin'){
			return $email;
		}else{
			return $password;
		}
	}
}
?>