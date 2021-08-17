<?php 
	require 'database-config.php';

	session_start();

	$userid = "";
	$password = "";
	
	if(isset($_POST['userid'])){
		$userid = $_POST['userid'];
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];

	}
	
	

	$q = 'SELECT * FROM users WHERE userid=:userid AND password=:password';

	$query = $dbh->prepare($q);

	$query->execute(array(':userid' => $userid, ':password' => $password));


	if($query->rowCount() == 0){
		header('Location: index.php?err=1');
	}else{

		$row = $query->fetch(PDO::FETCH_ASSOC);

		session_regenerate_id();
		$_SESSION['sess_user_id'] = $row['id'];
		$_SESSION['sess_userid'] = $row['userid'];
        $_SESSION['sess_userrole'] = $row['UGroup'];

        
		session_write_close();

		if ($_SESSION['sess_userrole'] == "10") {
		    header('Location: attend.php');
		}  else {
		    header('Location: admin.php');
		}
		
		
	}


?>