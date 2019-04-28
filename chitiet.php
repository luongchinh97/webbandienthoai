<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Chi tiet</title>
<link href="static/css/style.css" rel="stylesheet" />
<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
</head>
<body>

	<!-- PHP -->
	<?php 
		require_once "layouts/menutop.php"; 
		$idProduct = $_GET['id'];
		$table = "product";
		$Product = $dao->getById($table,$idProduct);
	?>
	<!-- END PHP -->

	<div id="s-title">
		<p><a href="<?php echo $urlHomeShop;?>">HOME</a>/
			<a class="link-danh-muc" href="<?php echo $url;?>product.php?hangSX=<?php echo $Product['hangSX'];?>">
			<span class="danh-muc-product"><?php echo $Product['hangSX'];?></span></a>/
			<span class='name-product'><?php echo $Product['namePro'];?></span></p>"
		<h1>Chi tiết</h1>
		<p>
			<a href="#">&larr; Back to Home</a>
		</p>
	</div>
	<div id="chi-tiet">
		<div id="chi-tiet-product">
			<div id="img-product"><img src="static/images/<?php echo $Product['img'];?>"/></div>
			<div id="noi-dung-chi-tiet">
				<p class="id-product" style="display: none;"><?php echo $Product['id'];?></p>
				<h4 class="name-product"><?php echo $Product['namePro'];?> </h4>
				<p class='gia-product'><?php echo number_format($Product['gia'],'0','.',' ');?> VNĐ</p>
				<h5>Hãng SX : <?php echo $Product['hangSX']; ?></h5>
				<p></p>
				<p class="add-to-cart-2"><a class="add-to-cart" href="controller/service/giohang-add.php?id=<?php echo $Product['id']; ?>">MUA NGAY</a></p>
				<a href="">Xem chi tiết mặt hàng</a>
			</div>
		</div>
	</div>
	<?php require_once "layouts/footer.php" ?>
</body>
</html>