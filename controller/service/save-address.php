<?php 
	session_start();
	$provinceID = $_POST['provinceID'];$districtID = $_POST['districtID'];$wardID=$_POST['wardID'];$diaChi =$_POST['diaChi'];
	$_SESSION['address']=array(
		"provinceID"=>$provinceID,
		"districtID"=>$districtID,
		"wardID"=>$wardID,
		"diaChi"=>$diaChi
	);
 ?>