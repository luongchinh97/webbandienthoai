<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Homeshop</title>
<link type="text/css" rel="stylesheet" href="static/css/style.css"/>
<body>
	<?php 
		include("layouts/menutop.php");
		$dao=new dao;
		if(isset($_POST['send'])){
			$username=	$_POST['username'];
			$password=	$_POST['password'];
			$nlpassword=$_POST['nlpassword'];
			$hoten=	$_POST['name'];
			$gmail=	$_POST['gmail'];
			$phone=	$_POST['phone'];
			if ($username == "" || $password == "" || $hoten == "" || $gmail == "" || $password != $nlpassword||$password== ""||$nlpassword==""||$phone=="") { echo "<script type='text/javascript'>alert('yeu cau nhap du thong tin');</script>";
			} else{ 
			 // Kiểm tra tài khoản đã tồn tại chưa 
				// $conn=mysqli_connect('localhost','root','','smartshop');
				// $sql="select * from user where username='$username'"; 
				// $kt=mysqli_query($conn, $sql); 
				$rs=$dao->checkUser($username);
				if(isset($rs)) {
					echo "<script type='text/javascript'>alert('tai khoan da ton tai');</script>";
				}else { 
					$a=array("username" => $username,"password" => $password,"name" => $hoten,"email" => $gmail,"phone" => $phone,"role"=>1);
					$dao->insert("user",$a);
					echo"<script type='text/javascript'>alert('dang ky thanh cong');</script>";
				}
			}
		}
	 ?>
	<div id="login">
		<div id="form-a">
			<h1>Đăng ký</h1>
			<form action="" method="post">
				<label id="lable-user" for="username"><img src="static/images/user.png"/></label> 
				<input id="username" type="text" name="username" placeholder="Username" required /> 
				<label id="lable-pass" for="password"><img src="static/images/password.png"/></label>
				<input id="password" type="password" name="password" placeholder="Passwrod" required /> 
				<label id="lable-nl-pass" for="nlpassword"><img src="static/images/password.png"/></label>
				<input id="nlpassword" type="password" name="nlpassword" placeholder="Nhập lại password" required />
				<label id="lable-name" for="name"><img src="static/images/user.png"/></label> 
				<input id="name" type="text" name="name" placeholder="Họ và tên" required />
				<label id="lable-email" for="email"><img src="static/images/gmail(1).png"/></label>
				<input id="email" type="email" name="gmail" placeholder="Gmail" required />
				<label id="lable-tel" for="password"><img src="static/images/mobile-phone.png"/></label>
				<input id="tel" type="tel" name="phone" placeholder="Phone" required pattern="0[0-9]{9,10}">
				<button type="submit" name="send">Đăng ký</button>
			</form>
			<a href="dangnhap.php">Đăng nhập</a>
		</div>
	</div>
	<?php include("layouts/footer.php") ?>
</body>
</html>