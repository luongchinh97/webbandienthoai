<?php 
require_once "../dao/database.php";
	$hang = $_POST['hang'];
	$dao = new dao;
	$all ="all";
	if($hang!=$all){
	$arr = $dao->getProductByHang($hang);
	if(count($arr)>0){
		$htmlHang = "<table id='bootstrap-data-table' class='table_user_list table table-striped table-bordered'>
				<tr>
 					<td>ID</td>
 					<td>Tên</td>
 					<td>Hãng SX</td>
 					<td>Năm SX</td>
 					<td>giá</td>
 					<td>Ảnh</td>
 					<td>Số Lượng</td>
 					<td></td>
 				</tr>";
		foreach ($arr as $row) {
			$htmlHang.="<tr><td>".$row['id']."</td>
	 					<td>".$row['namePro']."</td>
	 					<td>".$row['hangSX']."</td>
	 					<td>".$row['namSX']."</td>
	 					<td>".$row['gia']."</td>
	 					<td><img style='width:60px;height:60px;' src='../../../static/images/".$row['img']."'></td>
	 					<td>".$row['tongSL']."</td>
	 					<td><a href='edit.php?id=".$row['id']."'>Sửa</a></td>
	 					</tr>";
		}
		$htmlHang .="</table>";
		echo $htmlHang;
		}
	}else{
		$arrList=$dao->getAll("product");
		$htmlList = "<table id='bootstrap-data-table' class='table_user_list table table-striped table-bordered'>
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
 					<td><img style='width:60px;height:60px;' src='../../../static/images/".$row['img']."'></td>
 					<td>".$row['tongSL']."</td>
 					<td><a href='edit.php?id=".$row['id']."'>Sửa</a></td>
 					</tr>";
		}
		$htmlList .="</table>";
echo $htmlList;
	}
	
 ?>