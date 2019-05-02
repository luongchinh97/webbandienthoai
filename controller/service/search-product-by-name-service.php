<?php 
	require_once "../dao/database.php";
	$name = $_POST['name'];
	$dao = new dao;
	$arr = $dao->searchProductByName($name,0);
	if(count($arr)>0){
		$htmlList = "<table id='bootstrap-data-table' class='table_user_list table table-striped table-bordered'>
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
		foreach ($arr as $key => $row) {
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
	} else{
		echo "data not found";
	}
	
 ?>
