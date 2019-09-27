<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mybook";

$dbConnection = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if($dbConnection->connect_errno){
  die("Could not connect to the database");
}
//else{
//  echo "Successfully connected to the database.!!!!";
//}
 ?>
