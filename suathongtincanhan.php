
 <!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<title>Homeshop</title>
<link type='text/css' rel='stylesheet' href='static/css/style.css'/>
<body>
	<?php 
require_once ('layouts/menutop.php');
if (isset($_SESSION['user'])) {
	

$dao= new dao;
$id=$_SESSION['user']['id'];
$rs=array();
$rs=$dao->getbyId('user',$id);

$html='';
	$html.="<div id='login'>
		<div id='form-a'>
			<h1>Đăng ký</h1>
			<form action='' method='post'>
				<label id='lable-user' for='username'><img src='static/images/user.png'/></label> 
				<input id='username' type='text' name='username' placeholder='Username' /> 
				<label id='lable-pass' for='password'><img src='static/images/password.png'/></label>
				<input id='password' type='password' name='password' placeholder='Passwrod' /> 
				<label id='lable-nl-pass' for='nlpassword'><img src='static/images/password.png'/></label>
				<input id='nlpassword' type='password' name='nlpassword' placeholder='Nhập lại password'/>
				<label id='lable-name' for='name'><img src='static/images/user.png'/></label> 
				<input id='name' type='text' name='name' placeholder='Họ và tên' />
				<label id='lable-email' for='email'><img src='static/images/gmail(1).png'/></label>
				<input id='email' type='email' name='gmail' placeholder='Gmail'/>
				<label id='lable-tel' for='password'><img src='static/images/mobile-phone.png'/></label>
				<input id='tel' type='tel' name='phone' placeholder='Phone'>
				<button type='submit' name='send'>SUA TT</button>
			</form>
			<a href='dangnhap.php'>Đăng nhập</a>
		</div>
	</div>";
	
}
echo $html;
?>
 	<?php 
 	
 	if(isset($_POST['send'])){
 		$data=array('username'=>$_POST['username'],
 						'password'=>$_POST['password'],
 						'name'=>$_POST['name'],
 						'phone'=>$_POST['phone'],
 						'email'=>$_POST['gmail']);
 			$dao->update('user',$data,$id);
 			header('location:dangnhap.php');
 		}
 	
 	 ?>
 	<?php include('layouts/footer.php'); ?>
 </body>
 </html>