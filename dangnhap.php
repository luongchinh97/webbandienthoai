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
	?>
	<?php 
		$err = 2;
		if(isset($_POST['login'])){
			$username = $_POST['username']; $pass = $_POST['password'];
			$user = $dao->checkLogin($username,$pass);
			if($user!=""){
				$_SESSION['user']=$user;
				if($user['role']==1){
					//khach hang
					header("location:index.php");
				}else if($user['role']==2){
					header("location:admin/modules/product/list.php");
				}
			}else{
				$err = 1;
			}
		}
	?>
	<div id="login">
		<div id="form-a">
			<h1>Đăng nhập</h1>
			<form action="" method="post">
				<label id="lable-user" for="username"><img src="static/images/user.png"/></label>
				<input id="username" type="text" name="username" placeholder="Username" /> 
				<label id="lable-pass" for="password"><img src="static/images/password.png"/></label>
				<input type="password" name="password" placeholder="Passwrod" /> 
				<a href="#">Quên mật khẩu?</a>
				<button type="submit" onclick="check()" name="login">Đăng nhập</button>
				<a href="#">Đăng ký</a>
			</form>
		</div>
	</div>
	<?php require_once "layouts/footer.php"; ?>
	<script type="text/javascript">
		function check(){
			var err = <?php echo $err; ?>;
			if(err==1){
				alert('Sai username hoặc password');
			}
		}
	</script>
</body>
</html>