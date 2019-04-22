<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Homeshop</title>
	<link href="static/css/style.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<!-- PHP -->
	<?php 
		require_once "layouts/header.php"; 
		$spBanChay = $dao->getProductBanChay();
		$spMoi = $dao->getProductMoi();
		$htmlSBC = ""; $htmlSM = "";
		foreach ($spBanChay as $row => $value ) {
			$htmlSBC.=
			"<div class='product-box'><img src='static/images/".$value['img']."'/>
				<div class='product-detail'>
					<h4><a href='".$url."chitiet.php?id=".$value['id']."'>".$value['namePro']."</a></h4>
					<p class='id-product'>".$value['id']."</p>
					<p><a class='add-to-cart' href='".$url."giohang.php?id=".$value['id']."'>Add to Cart</a></p>".$value['gia']." VNĐ
				</div>
			</div>";
		}
		foreach ($spMoi as $row => $value) {
			$htmlSM.=
			"<div class='product-box'><img src='static/images/".$value['img']."'/>
				<div class='product-detail'>
					<h4><a href='".$url."chitiet.php?id=".$value['id']."'>".$value['namePro']."</a></h4>
					<p class='id-product'>".$value['id']."</p>
					<p><a class='add-to-cart' href='".$url."giohang.php?id=".$value['id']."'>Add to Cart</a></p>".$value['gia']." VNĐ
				</div>
			</div>";
		}
	?>

	<!-- END PHP -->
	
	<!-- Danh muc -->
	<div id="main">
		<div id="quang-cao">
			<img id="quang-cao-mot"
				src="static/images/quangcao1.png" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p>Laptop chính hãng</p>
				<p>Bảo hành 2 năm</p>
				<a style="color: white;" href="#" class="quang-cao">Read more</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-hai"
				src="static/images/quangcao2.png" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p>Phụ kiện máy tính,</p>
				<p>Laptop, điện thoại đi kèm</p>
				<a href="#" class="quang-cao">Read more</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-ba" src="static/images/quangcao3.png" />
			<div class="noi-dung">
				<p>Tablet mới nhất</p>
				<a href="#" class="quang-cao">Read more</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-bon"
				src="static/images/quangcao4.png" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p style="margin-left: 300px;">Điện thoại chính hãng</p>
				<p style="margin-left: 300px;">giảm giá 70% cho chính dz</p>

				<a style="color: white; margin-left: 300px;" href="#" class="quang-cao">Read more</a>
			</div>
		</div>
		<!-- End danh muc  -->


		<div id="contents">
			<div id="product">
				<div class="title">
					<h3 class="homenews">Sản phẩm mới nhất</h3>
					<div class="slider-nav"></div>
				</div>
				<div class="product-swapper">
					<?php echo "$htmlSM"; ?>
				</div>
			</div>
			<div id="product">
				<div class="title">
					<h3>Sản phẩm bán chạy</h3>
					<div class="slider-nav"></div>
				</div>
				<div class="product-swapper">
					<?php echo "$htmlSBC"; ?>
				</div>
			</div>
			<div id="product">
				<div class="title">
					<h3>Sản phẩm nổi bật</h3>
					<div class="slider-nav"></div>
				</div>
				<div class="product-swapper">
					<?php echo "$htmlSBC" ?>
				</div>
			</div>
		</div>
	</div>
	<?php require_once ("layouts/footer.php") ?>

</body>
</html>