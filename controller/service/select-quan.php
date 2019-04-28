<?php 
	require_once "../dao/database.php";

	$id = $_POST['id'];
	$dao = new dao();
	$arr = $dao->getDistrict($id);
	$htmlArr = "";
	foreach ($arr as $key => $value) {
		$htmlArr .= "<option value='".$value['districtid']."'>".$value['name']."</option>";
	}
	echo $htmlArr;
 ?>