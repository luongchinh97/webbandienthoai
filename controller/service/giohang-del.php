<?php 
	require_once "../entity/Items.php";
	session_start();
	$item = new Items();
	$id = $_GET['id'];
	$ListItems = $_SESSION['cartitems'];
	foreach ($ListItems as $key => $value) {
		if($value->idProduct==$id){
			unset($ListItems[$key]);
			break;
		}
	}
	if(sizeof($ListItems)>0){
		$_SESSION['cartitems'] = $ListItems;
		$tongSoLuong = 0;
		foreach ($_SESSION['cartitems'] as $key => $value) {
			$tongSoLuong =$tongSoLuong + $value->soLuong;
		}
		$_SESSION['tongItems'] = $tongSoLuong;
	}else{
		unset($_SESSION['cartitems']);
		unset($_SESSION['tongItems']);
	}
	header("location:../../giohang.php");
 ?>