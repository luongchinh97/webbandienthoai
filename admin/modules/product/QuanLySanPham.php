<?php 
include __DIR__."/../../../lib/dao/database.php";
$dao= new dao;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý hóa đơn</title>
</head>
<body>
	<div class="wrapper">
		<div class="header"></div>
		<div class="menuleft"></div>
		<div class="content">
			<div>
				<form method="POST" action="danhsachtheoten.php">
					<label>Tìm kiếm theo tên:</label> <input type="text" name="ten" placeholder="Nhập tên sản phẩm cần tìm">
					<input type="submit" name="submit" value="Tìm">
				</form>
			</div>
			<div>
				<form method="POST" action="danhsachtheohang.php">
					<label>Hãng</label>
					<select name="hangSX">
						<?php 
						 $rs=$dao->getHangProduct();
						 while($row=$rs->fetch_assoc()){
						 	echo "<option value='".$row['hangSX']."'>".$row['hangSX']."</option>";
						 }
						?>
					</select>
					<input type="submit" name="Tìm">
				</form>
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer"></div>
	</div>
</body>
</html>
<option value=''></option>