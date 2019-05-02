<?php 
include_once 'controller/service/sendGmail.php';
$conn=mysqli_connect("localhost","root","","smartshop");
	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$sql="SELECT * FROM user WHERE username='$username'";
		$rs=$conn->query($sql);
		if($rs->num_rows>0){
			$row=$rs->fetch_assoc();
			$password=$row['password'];
			$email=$row['email'];
			sendGmail("mật khẩu của bạn:",$password,$username,$email);
		} else{
			echo "<script> alert('không tồn tại tài khoản');</script>";
		}
	}
 ?>
 <form method="POST">
 	Nhập tên username <input type="text" name="username">
 	<input type="submit" name="submit">
 </form>