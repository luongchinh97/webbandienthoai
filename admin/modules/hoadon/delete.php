<?php
	$conn=mysqli_connect("localhost","root","","smartshop") or die ("loi ket noi sql");
	mysqli_set_charset($conn,"utf8");
	$id = $_GET['id'];
	$sql ="DELETE FROM `order` WHERE id=".$id ;
	$rs=mysqli_query($conn,$sql);
	if($rs){
	 	 header("location:list.php");
	}
?>