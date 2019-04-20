<?php 
include("ok.php");
$dao= new dao;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Danh sách sản phẩm theo tên đã nhập</title>
 </head>
 <body>
 	<div class="wrapper">
 		<div class="header"></div>
 		<div class="menuleft"></div>
 		<div class="content">
 			<table border="1px" cellspacing="0px">
 				<tr style="font-weight: bold">
 					<td>ID</td>
 					<td>Tên</td>
 					<td>Hãng SX</td>
 					<td>Năm SX</td>
 					<td>giá</td>
 					<td>Ảnh</td>
 					<td>Số Lượng</td>
 					<td></td>
 					<td></td>
 				</tr>
 				<?php 
 				$name=$_POST['ten'];
 				$rs=$dao->SearchbyName($name);
 				$html="";
 				while($row=$rs->fetch_assoc()){
 					$html.="<tr><td>".$row['id']."</td>
 					<td>".$row['namePro']."</td>
 					<td>".$row['hangSX']."</td>
 					<td>".$row['namSX']."</td>
 					<td>".$row['gia']."</td>
 					<td><img src='".$row['img']."'></td>
 					<td>".$row['tongSL']."</td>
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