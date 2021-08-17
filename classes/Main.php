<?php 
require_once 'DB.php';
class Main{
	protected $table;
	
	/* public $pdo;
	public function __construct(){
		return $this->pdo = DB::connect();
	} */
	
	public function selectAll(){
		$query = "SELECT * FROM $this->table";
		$stmt = DB::prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
?>