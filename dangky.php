<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Homeshop</title>
<link type="text/css" rel="stylesheet" href="static/css/style.css"/>
<body>
	<?php include("layouts/menutop.php") ?>
	<div id="login">
		<div id="form-a">
			<h1>Đăng ký</h1>
			<form action="" method="post">
				<label id="lable-user" for="username"><img src="static/images/user.png"/></label> 
				<input id="username" type="text" name="username" placeholder="Username" /> 
				<label id="lable-pass" for="password"><img src="static/images/password.png"/></label>
				<input id="password" type="password" name="password" placeholder="Passwrod" /> 
				<label id="lable-nl-pass" for="nlpassword"><img src="static/images/password.png"/></label>
				<input id="nlpassword" type="password" name="nlpassword" placeholder="Nhập lại password"/>
				<label id="lable-name" for="name"><img src="static/images/user.png"/></label> 
				<input id="name" type="text" name="name" placeholder="Họ và tên" />
				<label id="lable-email" for="email"><img src="static/images/gmail(1).png"/></label>
				<input id="email" type="email" name="gmail" placeholder="Gmail"/>
				<label id="lable-tel" for="password"><img src="static/images/mobile-phone.png"/></label>
				<input id="tel" type="tel" name="phone" placeholder="Phone">
				<button type="submit">Đăng ký</button>
			</form>
			<a href="#">Đăng nhập</a>
		</div>
	</div>
	<?php include("layouts/footer.php") ?>
	<script type="text/javascript">
		var err = ${err};
		if(err == 2){
			alert("Tên đăng nhập đã tồn tại.");
		}else if(err == 1){
			alert("Passwrod không trùng nhau.")
		}
	</script>
</body>
</html>