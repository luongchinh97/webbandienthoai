<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Chi tiet</title>
<link href="/LapTrinhWeb/static/css/style.css" rel="stylesheet" />
<script type="text/javascript" charset="utf8" src="/LapTrinhWeb/static/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/LapTrinhWeb/static/js/myJS.js"></script>
</head>
<body>
	<jsp:include page="menutop.jsp"></jsp:include>
	<div id="s-title">
		<p>
		<a href="/LapTrinhWeb/home-shop">HOME</a>/<a class="link-danh-muc"><span class="danh-muc-product">Danh mục</span></a>/<span class="name-product">Tên sp</span>
		</p>
		<h1>Shop</h1>
		<p>
			<a href="/LapTrinhWeb/phu-kien">&larr; Back to Home</a>
		</p>
	</div>
	<div id="chi-tiet">
		<div id="chi-tiet-product">
			<div id="img-product">
				<img src="/LapTrinhWeb/static/images/${pro.img}"/>
			</div>
			<div id="noi-dung-chi-tiet">
				<p class="id-product" style="display: none;">id</p>
				<h4 class="name-product">Tên : </h4>
				<p class="gia-product">Giá : </p>
				<h5>Hãng SX : </h5>
				<p></p>
				<p class="add-to-cart-2">
					<a class="add-to-cart"  href="/LapTrinhWeb/add-cart?idP=${pro.idP}">Add to Cart</a>
				</p>
				<p>
					<a href="/LapTrinhWeb/add-cart?idP=${pro.idP}">Mua ngay</a>
				</p>
			</div>
		</div>
	</div>
	<jsp:include page="footer.jsp"></jsp:include>
</body>
</html>