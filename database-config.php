<?php
   // define database related variables
   $database = 'ewebdevs_hydrotek';
   $host = 'localhost';
   $user = 'ewebdevs_hydrotek';
   $pass = 'ewebdevs_hydrotek';

   // try to conncet to database
   $dbh = new PDO("mysql:dbname={$database};host={$host};port={3306}", $user, $pass);

   if(!$dbh){

      echo "unable to connect to database";
   }
   
?>