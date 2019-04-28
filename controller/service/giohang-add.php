<?php 
	require_once "../entity/Items.php";

	session_start();
	$item = new Items();
	$idP = (int) $_GET['id'];
	$item->idProduct = $idP;
	$item->soLuong = 1;
	/*
	Kiểm tra xem giỏ hàng đã tồn tại chưa
	1. Nếu chưa tồn tại thì tạo session và luu item vào sesion
	2. Nếu dã tồn tại thì thêm item vào session cartitems đã có
	*/
	if(empty($_SESSION['cartitems'])){
		$_SESSION['cartitems'] = array();
		array_push($_SESSION['cartitems'], $item);
	}else{
		$check = 0;
		$ListItems = $_SESSION['cartitems'];
		foreach ($ListItems as $value) {
			if($value->idProduct==$idP){
				$value->soLuong = $value->soLuong + 1;
				$check = 1;
				break;
			}
		}
		if($check == 0){
			array_push($ListItems, $item);
		}
		$_SESSION['cartitems']=$ListItems;
	}
	$tongSoLuong = 0;
	foreach ($_SESSION['cartitems'] as $key => $value) {
		$tongSoLuong =$tongSoLuong + $value->soLuong;
	}
	$_SESSION['tongItems'] = $tongSoLuong;
	header ("location:../../giohang.php");
	
 ?>