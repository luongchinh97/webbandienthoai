


 <!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="static/css/style.css"/>
<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="static/js/myjs.js"></script>
<title>Homeshop</title>
</head>
<body>
	<?php 
		require_once "layouts/menutop.php";
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
					sendGmail("Mật khẩu của bạn:",$password,$username,$email);
				} else{
					echo "<script> alert('không tồn tại tài khoản');</script>";
				}
			}
 	?>
	<div id="login">
		<div id="form-a">
			<h1>Lấy Lại Mật Khẩu</h1>
			<form action="" method="post">
				<label id="lable-user" for="username"><img src="static/images/user.png"/></label>
				<input id="username" type="text" name="username" placeholder="Username" /> 
				
				
				<button type="submit" name="submit">Gửi</button>
				
			</form>
		</div>
	</div>
	<?php require_once "layouts/footer.php"; ?>
	
</body>
</html>