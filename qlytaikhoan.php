
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
	<title>quan ly tai khoan</title>
	<link type='text/css' rel='stylesheet' href='static/css/style.css'/>
	<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php require_once ("layouts/menutop.php") ?>


<?php 

if (isset($_SESSION['user'])) {



$conn=mysqli_connect('localhost','root','','smartshop');
// mysqli_query($conn, 'SET NAMES 'UTF8'');

$sql="SELECT * FROM user WHERE id= '".$_SESSION['user']['id']."';";
$result=$conn->query($sql);
$html="";
if($result->num_rows>0){
while ($row=$result->fetch_assoc()) {
	$html.=
	"<table border='3' width='1000' height='300'>
	<tr>
		<th colspan='3'>Quản lý tài khoản</th>
	</tr>
	<tr>
		<td><div class='dashboard-profile'>
	<div class='dashboard-mod-title' data-spm-anchor-id='a2o4n.manage_account.1.i0.136a705bPRdY5Z'>Thông tin cá nhân 
		<span>|</span> 
		<a data-spm='dprofile_edit' href='suathongtincanhan.php'>Chỉnh sửa</a>
	</div>
	<div class='dashboard-info'>
		<div class='dashboard-info-item'>". $user['username']."</div>
		<div class='dashboard-info-item'>". $user['email']."</div>
		
	</div>
</div>	</td>
		<td><div class='dashboard-address-item shipping'>
		<div class='dashboard-mod-title'>Sổ địa chỉ <span>|</span> 
			
		</div>
		<div class='dashboard-address-default'>Địa chỉ nhận hàng mặc định</div>
		<div class='dashboard-address-username'>". $user['username']."</div>
		<div class='dashboard-address-detail'>Km10, Đường Nguyễn Trãi , Quận Hà Đông ,Hà Nội</div>
		<div class='dashboard-address-detail'>Hà Nội - Quận Hà Đông - Phường Mỗ Lao</div>
		<div class='dashboard-address-phone'>". $user['phone']."</div>
	</div></td>
		<td><div class='dashboard-address-item billing'>
		<div class='dashboard-mod-title'>Sổ địa chỉ <span>|</span> 
			
	</div>
	<div class='dashboard-address-default'>Địa chỉ thanh toán mặc định</div>
	<div class='dashboard-address-username'>". $user['username']."</div>
	<div class='dashboard-address-detail'>Km10, Đường Nguyễn Trãi , Quận Hà Đông ,Hà Nội</div>
	<div class='dashboard-address-detail'>Hà Nội - Quận Hà Đông - Phường Mỗ Lao</div>
	<div class='dashboard-address-phone'>". $user['phone']."</div>
</div>
</td>
	</tr>
</table>";
}
}

echo $html;}
?>
<?php require_once ("layouts/footer.php") ?>
</body>
</html>






