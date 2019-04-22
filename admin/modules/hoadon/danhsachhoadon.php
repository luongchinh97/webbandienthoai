<?php 
include("congcu.php");
$dao= new dao;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Danh sách hóa đơn</title>
 </head>
 <body>
 	<div class="wrapper">
 		<div class="header"></div>
 		<div class="menuleft"></div>
 		<div class="content">
 			<table border="1px" cellspacing="0px">
 				<tr style="font-weight: bold">
 					<td>id</td>
 					<td>idUser</td>
 					<td>diaChi</td>
 					<td>ngayLap</td>
 					<td>tongGia</td>
 					<td>Số Lượng</td>
 					<td></td>
 					<td></td>
 				</tr>
 				<?php 
 				$rs=$dao->getPayment();
 					while($row=$rs->fetch_assoc()){
 						$html.="<tr><td>".$row['id']."</td>
 						<td>".$row['idUser']."</td>
 						<td>".$row['diaChi']."</td>
 						<td>".$row['ngayLap']."</td>
 						<td>".$row['tongGia']."</td>
 						<td>".$row['soLuong']."</td>
 						<td><a href='sua.php?id=".$row['id']."'>Sửa</a></td>
 						<td><a href='xoa.php?id=".$row['id']."'>Xóa</td>
 						</tr>";

 					}
 				
 					echo "$html";
 				 ?>
 				
 			</table>
 		</div>
 		<div class="clear"></div>
 		<div class="footer"></div>
 	</div>
 </body>
 </html>