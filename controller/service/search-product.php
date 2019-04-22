<?php 
	require_once "../dao/database.php";
	$dao = new dao;
	$name = $_POST['search'];
	$limit = 5;
	$arr =  $dao->searchProductByName($name, $limit);
	$htmlP = "";
	if($name !== ""){
		foreach ($arr as $row => $value) {
		$htmlP .="<ul><li><a href='#'><img src='static/images/".$value['img']."'><div class='name-product'>".$value['namePro']."</div><div class='gia-product'>". number_format($value['gia'] ,0, "."," ") . " VNĐ</div></a></li></ul>";
		}
	}
	
	echo "$htmlP";
?>
    