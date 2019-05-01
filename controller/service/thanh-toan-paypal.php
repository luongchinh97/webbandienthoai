<?php
	require_once "../entity/Items.php";
	require_once "../dao/database.php";
	session_start();

	$user=$_SESSION['user'];
	$address = $_SESSION['address'];
	$cartItems = $_SESSION['cartitems'];
	$tongItems = $_SESSION['tongItems'];
	$provinceID = $address['provinceID'];
	$districtID = $address['districtID'];
	$wardID = $address['wardID'];
	$diaChi = $address['diaChi'];
	$ngayLap = date("Y-m-d");
	$tongTien = $_SESSION['tongTien'];
	$idUser = (int) $user['id'];
	$order = array("idUser"=>$idUser,"ngayLap"=>$ngayLap, "tongGia"=>$tongTien, "soLuong"=>$tongItems, "maTinh"=>$provinceID, "maQH"=>$districtID, "maPX"=>$wardID, "diaChi"=>$diaChi);
	$dao = new dao;
	$orderID = $dao->insertOrder($order);
	$item =  new Items;
	foreach ($cartItems as $value) {
		$value->idOrder = $orderID;
		$product = $dao->getById("product", $value->idProduct);
		$product['tongSL'] =(int)$product['tongSL']-(int) $value->soLuong;
		$dao->insertItems($value);
		$dao->update("product",$product, $value->idProduct);
	}
	unset($_SESSION['cartitems']);
	unset($_SESSION['tongItems']);
	unset($_SESSION['tongTien']);
	$_SESSION['orderID']=$orderID;
	header("location:../../thanhtoanTC.php");
?>