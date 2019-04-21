<?php 
require_once "../dao/database.php";
	$hang = $_POST['hang'];
	$dao = new dao;
	$all ="all";
	if($hang!=$all){
	$arr = $dao->getProductByHang($hang);
	if(count($arr)>0){
		$htmlHang = "<table border='1px' cellspacing='0px'><tr style='font-weight: bold'>
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
			$htmlHang.="<tr><td>".$row['id']."</td>
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
		$htmlHang .="</table>";
		echo $htmlHang;
		}
	}else{
		$arrList=$dao->getAllProduct();
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
		foreach ($arrList as $row) {
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
	}
	
 ?>