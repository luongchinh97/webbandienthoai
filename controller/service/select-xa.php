<?php 
	require_once "../dao/database.php";

	$id = $_POST['id'];
	$dao = new dao();
	$arr = $dao->getWard($id);
	$htmlArr = "";
	foreach ($arr as $key => $value) {
		$htmlArr .= "<option value='".$value['wardid']."'>".$value['name']."</option>";
	}
	echo $htmlArr;
 ?>