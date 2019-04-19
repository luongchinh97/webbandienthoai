<?php 
include("database.php");
$dao= new dao;
$a=array("username"=>"nuc",
		"password"=>"nuc",
		"name"=>"nuc",
		"phone"=>"0124",
		"email"=>"nuc@123",
		"role"=>"admin");
$dao->insert("user",$a);
 ?>