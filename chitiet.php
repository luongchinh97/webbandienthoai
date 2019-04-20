<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Chi tiet</title>
<link href="static/css/style.css" rel="stylesheet" />
<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php require_once "layouts/menutop.php"; ?>
	<div id="s-title">
		<p>
		<a href="#">HOME</a>/<a class="link-danh-muc"><span class="danh-muc-product">Danh mục</span></a>/<span class="name-product">Tên sp</span>
		</p>
		<h1>Shop</h1>
		<p>
			<a href="phu-kien">&larr; Back to Home</a>
		</p>
	</div>
	<div id="chi-tiet">
		<div id="chi-tiet-product">
			<div id="img-product">
				<img src="static/images/${pro.img}"/>
			</div>
			<div id="noi-dung-chi-tiet">
				<p class="id-product" style="display: none;">id</p>
				<h4 class="name-product">Tên : </h4>
				<p class="gia-product">Giá : </p>
				<h5>Hãng SX : </h5>
				<p></p>
				<p class="add-to-cart-2">
					<a class="add-to-cart"  href="add-cart?idP=${pro.idP}">Add to Cart</a>
				</p>
				<p>
					<a href="add-cart?idP=${pro.idP}">Mua ngay</a>
				</p>
			</div>
		</div>
	</div>
	<?php require_once "layouts/footer.php" ?>
</body>
</html>