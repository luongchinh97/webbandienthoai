<?php 
	require_once ("../../../controller/dao/database.php");
	$dao = new dao;
	$id = $_GET['id'];
	$dao->delete("slider",$id);
	header("location:slider.php");
 ?>