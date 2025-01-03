<?php

// $DBhost = "localhost";
$DBuser = "root";
$DBpassword ="";
// $DBname="company";

// $conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname); 
$databass= new PDO("mysql:host=localhost; dbname=company;charset=utf8"  ,$DBuser ,$DBpassword ); 

if(!$databass){
	die("Connection failed: " . mysqli_connect_error());
}