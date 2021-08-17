<?php
     define('_HOST_NAME','localhost');
     define('_DATABASE_NAME','ewebdevs_hydrotek');
     define('_DATABASE_USER_NAME','ewebdevs_hydrotek');
     define('_DATABASE_PASSWORD','ewebdevs_hydrotek');
	
     $MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);
	 
	 if($MySQLiconn->connect_errno)
	 {
		 die("ERROR : -> ".$MySQLiconn->connect_error);
	 }
	 
