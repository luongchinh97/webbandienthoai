<?php 
include __DIR__."/../../../controller/dao/database.php";
$dao= new dao;
$id=$_GET['id'];
$rs=array();
$rs=$dao->getbyId("product",$id);
$row=$rs[0];


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Sửa thông tin sản phẩm</title>
 </head>
 <body>
 	<form action="#" method="POST" enctype="multipart/form-data">
 		<label>Tên sản phẩm</label> 
 			<input type="text" name="namePro" value="<?php echo $row['namePro'] ?>"><br/>
 		<label>Hãng sản xuất</label> 
 			<input type="text" name="hangSX" value="<?php echo $row['hangSX'] ?>"><br/>
 		<label>Giá</label> 
 			<input type="text" name="gia" value="<?php echo $row['gia'] ?>"><br/>
 		<label>Màn hình</label> 
 			<input type="text" name="manHinh" value="<?php echo $row['manHinh'] ?>"><br/>
 		<label>Camera</label> 
 			<input type="text" name="camera" value="<?php echo $row['camera'] ?>"><br/>
 		<label>Hệ điều hành</label> 
 			<input type="text" name="heDieuHanh" value="<?php echo $row['heDieuHanh'] ?>"><br/>
 		<label>Ram</label> 
 			<input type="text" name="ram" value="<?php echo $row['RAM'] ?>"><br/>
 		<label>Bộ nhớ trong</label> 
 			<input type="text" name="rom" value="<?php echo $row['ROM'] ?>"><br/>
 		<label>pin</label> 
 			<input type="text" name="pin" value="<?php echo $row['PIN'] ?>"><br/>
 		<label>ảnh</label> 
 			<input type="file" name="img"> <img src="../../../static/images/<?php echo $row['img']; ?>"/><br/>
 		<label>Tổng số lượng</label> 
 			<input type="text" name="tongSL" value="<?php echo $row['tongSL'] ?>"><br/>				
 		<input type="submit" name="submit" value="UPDATE">		
 	</form>
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
 			$dao->update("product",$data,$id);
 			header("location:list.php");
 		}
 	}
 	 ?>
 	
 </body>
 </html>