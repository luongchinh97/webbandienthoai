<?php 
	require_once "../dao/database.php";
	$name = $_POST['name'];
	$dao = new dao;
	$arr = $dao->searchProductByName($name);
	if(count($arr)>0){
		$htmlList = "<table border='1px' cellspacing='0px'><tr style='font-weight: bold'>
 					<td>ID</td>
 					<td>Tên</td>
 					<td>Hãng SX</td>
 					<td>Năm SX</td>
 					<td>giá</td>
 					<td>Ảnh</td>
 					<td>Số Lượng</td>
 					<td></td>
 					<td></td>
 				</tr>";
		foreach ($arr as $key => $row) {
			$htmlList.="<tr><td>".$row['id']."</td>
	 					<td>".$row['namePro']."</td>
	 					<td>".$row['hangSX']."</td>
	 					<td>".$row['namSX']."</td>
	 					<td>".$row['gia']."</td>
	 					<td><img src='../../../static/images/".$row['img']."'></td>
	 					<td>".$row['tongSL']."</td>
	 					<td><a href='sua.php?id=".$row['id']."'>Sửa</a></td>
	 					<td><a href='xoa.php?id=".$row['id']."'>Xóa</td>
	 					</tr>";
		}
		$htmlList .="</table>";
		echo $htmlList;
	} else{
		echo "data not found";
	}
	
 ?>
