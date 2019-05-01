<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="static/css/style.css" rel="stylesheet" />
<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
<title>Homeshop</title>
</head>
<body>
	<!-- PHP -->
	<?php 
		require_once "layouts/menutop.php";
		require_once "controller/entity/Items.php";
		require_once "controller/service/sendGmail.php";
		if(!isset($_SESSION['user'])||!isset($_SESSION['orderID'])){
			header("location:index.php");
		}
		$orderID = $_SESSION['orderID'];
		$orderA = $dao->getById("order", $orderID);
		$user = $_SESSION['user'];
		$arrItems = $dao->getItemByOrderID($orderID);
		$body = "<table><thead><tr><th>Sản phẩm</th><th>Đơn giá</th><th>Số lượng</th><th>Tổng giá</th></tr></thead>";
		foreach ($arrItems as $key => $value) {
			$product = $dao->getById("product",$value['idProduct']);
			$body .="<tr><td>".$product['namePro']."</td><td>".$product['gia']."đ</td><td>".$value['soLuong']."</td><td>".(int)$product['gia']*(int)$value['soLuong']."đ</td></tr>";
		}
		$body .="<tfoot><tr><th colspan='3'>Tổng : </th><th colspan='2'>".$orderA['tongGia']."đ</th></tr></tfoot>";
	    sendGmail("Hóa đơn mua hàng tại SmartShop:",$body,$user['name'],"aidamcanta01@gmail.com");
	?>
	<!-- END PHP -->
	<div id="s-title">
		<p style="visibility: hidden;">
		<a href="<?php echo $urlHomeShop ?>">HOME</a>/<a class="link-danh-muc"><span class="danh-muc-product"></span></a>/<span class="name-product"></span>
		</p>
		<h1>Giỏ hàng của bạn</h1>
		<p>
			<a href="<?php echo $urlHomeShop; ?>">&larr; Back to Home</a>
		</p>
	</div>
	<div id="tai"></div>
	<div id="main-gio-hang">
		<div id="thong-tin-khach-hang">
			<h3>Thông tin khách hàng</h3>
			<p>Tên khách hàng : <?php echo $user['name'] ?></p>
			<p>Số điện thoại : <?php echo $user['phone'] ?></p>
			<p>Địa chỉ email : <?php echo $user['email'] ?></p>
			<p>Địa chỉ nhận : <?php echo $dao->getAddress($orderID) ?></p>
			<p>Danh sách sản phẩm : </p>
		</div>
		<table id="show-gio-hang">
			<thead>
			<tr>
				<th colspan="2">Sản phẩm</th>
				<th>Đơn giá</th>
				<th>Số lượng</th>
				<th>Tổng giá</th>
			</tr>
			</thead>
				<?php foreach ($arrItems as $key => $value) {$product = $dao->getById("product",$value['idProduct']); ?> 
				<tr>
					<td><img class="img-pro-gio-hang" src="static/images/<?php echo $product['img'] ?>"></td>
					<td><?php echo $product['namePro'] ?></td>
					<td><?php echo $product['gia'] ?>đ</td>
					<td><?php echo $value['soLuong'] ?></td>
					<td><?php echo (int)$product['gia']*(int)$value['soLuong'] ?>đ</td>
				</tr>
				<?php } ?>
			<tfoot>
				<tr>
					<th colspan="4">Tổng : </th>
					<th colspan="2"><?php echo $orderA['tongGia']; ?>đ</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<?php require_once ("layouts/footer.php") ?>
	
</body>
</html>
	