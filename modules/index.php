<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Homeshop</title>
	<link href="/LapTrinhWeb/static/css/style.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" charset="utf8" src="/LapTrinhWeb/static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php include("../layouts/header.php") ?>
	<div id="main">
		<div id="quang-cao">
			<img id="quang-cao-mot"
				src="/LapTrinhWeb/static/images/quangcao1.png" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p>Laptop chính hãng</p>
				<p>Bảo hành 2 năm</p>
				<a style="color: white;" href="<c:url value='/laptop'/>" class="quang-cao">Read more</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-hai"
				src="/LapTrinhWeb/static/images/quangcao2.png" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p>Phụ kiện máy tính,</p>
				<p>Laptop, điện thoại đi kèm</p>
				<a href="<c:url value='/phukien'/>" class="quang-cao">Read more</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-ba" src="/LapTrinhWeb/static/images/quangcao3.png" />
			<div class="noi-dung">
				<p>Tablet mới nhất</p>
				<a href="<c:url value='/table'/>" class="quang-cao">Read more</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-bon"
				src="/LapTrinhWeb/static/images/quangcao4.png" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p style="margin-left: 300px;">Điện thoại chính hãng</p>
				<p style="margin-left: 300px;">giảm giá 70% cho chính dz</p>

				<a style="color: white; margin-left: 300px;" href=""<c:url value='/smartphone'/>
					class="quang-cao">Read more</a>
			</div>
		</div>
		<!-- Ket thuc phan danh muc  -->


		<div id="contents">
			<div id="product">
				<div class="title">
					<h3>Điện thoại</h3>
					<div class="slider-nav"></div>
				</div>
				<div class="product-swapper">
					<c:forEach items="${listSM}" var="product" begin="0" end="3">
						<div class="product-box">
							<img src="/LapTrinhWeb/static/images/${product.img}" />
							<div class="product-detail">
								<h4>
									<a href="<c:url value='/chi-tiet?id=${product.maMH }'/>">${product.tenMH }</a>

								</h4>
								<p class="id-product">${product.maMH }</p>
								<p>
									<a class="add-to-cart" href="/LapTrinhWeb/add-cart?idP=${product.maMH}">Add to Cart</a>
								</p>
								${product.giaMH}đ
							</div>
						</div>
					</c:forEach>
				</div>
			</div>
			<div id="product">
				<div class="title">
					<h3>Máy tính bảng</h3>
					<div class="slider-nav"></div>
				</div>
				<div class="product-swapper">
					<c:forEach items="${listT}" var="product" begin="0" end="3">
						<div class="product-box">
							<img src="/LapTrinhWeb/static/images/${product.img}" />
							<div class="product-detail">
								<h4>
									<a href="<c:url value='/chi-tiet?id=${product.maMH }'/>">${product.tenMH }</a>

								</h4>
								<p class="id-product">${product.maMH }</p>
								<p>
									<a class="add-to-cart" href="/LapTrinhWeb/add-cart?idP=${product.maMH}">Add to Cart</a>
								</p>
								${product.giaMH}đ
							</div>
						</div>
					</c:forEach>
				</div>
			</div>
			<div id="product">
				<div class="title">
					<h3>Máy tính</h3>
					<div class="slider-nav"></div>
				</div>
				<div class="product-swapper">
					<c:forEach items="${listLT}" var="product" begin="0" end="3">
						<div class="product-box">
							<img src="/LapTrinhWeb/static/images/${product.img}" />
							<div class="product-detail">
								<h4>
									<a href="<c:url value='/chi-tiet?id=${product.maMH }'/>">${product.tenMH }</a>

								</h4>
								<p class="id-product">${product.maMH }</p>
								<p>
									<a class="add-to-cart" href="/LapTrinhWeb/add-cart?idP=${product.maMH}">Add to Cart</a>
								</p>
								${product.giaMH}đ
							</div>
						</div>
					</c:forEach>
				</div>
			</div>
		</div>
	</div>
	<?php include("../layouts/footer.php") ?>

</body>
</html>