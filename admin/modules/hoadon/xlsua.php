<?php
	$id = $_POST['id'];
	$idUer = $_POST['idUser'];
	$dc = $_POST['diaChi'];
	$ngay = $_POST['ngayLap'];
	$tong = $_POST['tongGia'];
	$sl = $_POST['soLuong'];
	$conn=mysqli_connect("localhost","root","","smartshop") or die ("loi ket noi sql");
	mysqli_set_charset($conn,"utf8");
	$sql ="UPDATE `order` SET  diaChi='$dc',ngayLap='ngay',tongGia='$tong',soLuong='$sl' WHERE id ='$id' " ;
	$rs=mysqli_query($conn,$sql);
	print_r($rs);
	if($rs){
	 	 header("location:http://localhost:81/webbandienthoai/admin/modules/hoadon/list.php");
	}
?>