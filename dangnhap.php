<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="static/css/style.css"/>
<title>Homeshop</title>

</head>
<body>
	<?php include("layouts/header.php") ?>
	<div id="login">
		<div id="form-a">
			<h1>Đăng nhập</h1>
			<form action="#" method="post">
				<label id="lable-user" for="username"><img src="static/images/user.png"/></label>
				<input id="username" type="text" name="username" placeholder="Username" /> 
				<label id="lable-pass" for="password"><img src="static/images/password.png"/></label>
				<input type="password" name="password" placeholder="Passwrod" /> 
				<a href="#">Quên mật khẩu?</a>
				<button type="submit">Đăng nhập</button>
				<a href="#">Đăng ký</a>
			</form>
		</div>
	</div>
	<?php include("layouts/footer.php") ?>
	<script type="text/javascript">
		var err = ${err};
		if(err==1){
			alert('Sai username hoặc password');
		}
	</script>
</body>
</html>