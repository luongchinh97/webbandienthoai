<?php 
include __DIR__."/../../../controller/dao/database.php";
$dao= new dao;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Sửa thông tin sản phẩm</title>
 </head>
 <body>
 	<div>
	 	<form action="#" method="POST" enctype="multipart/form-data">
	 		<table cellspacing="0" cellpadding="5px" border="1px">
	 			<tr>
			 		<td><label>Tên sản phẩm</label> </td>
			 		<td><input type="text" name="namePro" value=""> </td>
	 			</tr>
	 			<tr>
			 		<td><label>Hãng sản xuất</label>  </td>
			 		<td><input type="text" name="hangSX" value=""> </td>
	 			</tr>
	 			<tr>
			 		<td><label>Giá</label>  </td>
			 		<td><input type="text" name="gia" value=""> </td>
	 			</tr>
			 	<tr>
			 		<td><label>Màn hình</label>  </td> 
			 		<td><input type="text" name="manHinh" value=""> </td>
			 	</tr>
			 	<tr>
			 		<td><label>Camera</label> </td>
			 		<td><input type="text" name="camera" value=""> </td>
			 	</tr>
			 	<tr>
			 		<td><label>Hệ điều hành</label></td>
			 		<td><input type="text" name="heDieuHanh" value=""></td>
			 	</tr>
			 	<tr>
			 		<td><label>Ram</label></td>
			 		<td><input type="text" name="ram" value=""></td>
			 	</tr>
			 	<tr>
			 		<td><label>Bộ nhớ trong</label> </td>
			 		<td><input type="text" name="rom" value=""></td>
			 	</tr>
			 	<tr>
			 		<td><label>pin</label> </td>
			 		<td><input type="text" name="pin" value=""></td>
			 	</tr>
			 	<tr>
			 		<td><label>Thêm ảnh</label> </td>
			 		<td><input type="file" name="img"> <img src=""/></td>
			 	</tr>
			 	<tr>
			 		<td><label>Tổng số lượng</label> </td>
			 		<td><input type="text" name="tongSL" value=""></td>			
			 	</tr>
	 			<tr>
	 				<td colspan="2" style="text-align: center"><input type="submit" name="submit" value="Thêm"></td>
	 			</tr>		
	 		</table>
	 	</form>
 	</div>
 	<?php 
 	if(isset($_POST['submit'])){
 		if($_FILES['img']['error']>0){
 			echo "Lỗi tải file ";
 			die();
 		}
 		else{
 			move_uploaded_file($_FILES['img']['tmp_name'],"../../../static/images/".$_FILES['img']['name']);
 			$data=array("namePro"=>$_POST['namePro'],
 						"hangSX"=>$_POST['hangSX'],
 						"gia"=>$_POST['gia'],
 						"manHinh"=>$_POST['manHinh'],
 						"camera"=>$_POST['camera'],
 						"heDieuHanh"=>$_POST['heDieuHanh'],
 						"RAM"=>$_POST['ram'],
 						"ROM"=>$_POST['rom'],
 						"PIN"=>$_POST['pin'],
 						"img"=>$_FILES['img']['name'],
 						"tongSL"=>$_POST['tongSL']);
 			$dao->insert("product",$data);
 			header("location:list.php");
 		}
 	}
 	 ?>
 	
 </body>
 </html>