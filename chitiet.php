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
				<div class="id-product" style="display: none;"><?php echo $Product['id'];?></div>
				<h4><?php echo strtoupper($Product['namePro']);?> </h4>
				<div class="noi-dung-sp-chi-tiet">
					<div class="gia-product-chi-tiet">- Giá: <strong><?php echo number_format($Product['gia'],'0','.','.');?>đ</strong></div>
					<h5>- Hãng: <?php echo $Product['hangSX']; ?></h5>
					<h5>- Năm sx: <?php echo $Product['namSX'] ?></h5>
				</div>
				<div class="button-chi-tiet">
					<a class="add-to-cart" href="controller/service/giohang-add.php?id=<?php echo $Product['id']; ?>">MUA NGAY</a>
					<a class="chi-tiet" id="button-ttct" style="background-image: linear-gradient(-180deg,#288ad6 0%,#0e74c3 100%);">Xem chi tiết mặt hàng</a>
				</div>
			</div>
		</div>
		<div class="thong-tin-chi-tiet">
			<div class="text-chi-tiet">
				<h3 style="text-decoration: underline;">Đặc điểm nổi bật của <?php echo $Product['namePro'] ?></h3>
				<div class="content-chi-tiet"><?php echo $Product['moTa']; ?></div>
			</div>
			<div class="thong-so-ky-thuat">
				<h2>Thông số kỹ thuật</h2>
				<ul class="parameter">
					<li>
						<span>Màn hình:</span>
						<div><?php echo $Product['manHinh'] ?></div>
					</li>
					<li>
						<span>Hệ điều hành:</span>
						<div><?php echo $Product['heDieuHanh'] ?></div>
					</li>
					<li>
						<span>Camera trước:</span>
						<div><?php echo $Product['cameraTruoc'] ?></div>
					</li>
					<li>
						<span>Camera sau:</span>
						<div><?php echo $Product['cameraSau'] ?></div>
					</li>
					<li>
						<span>CPU: </span>
						<div><?php echo $Product['CPU'] ?></div>
					</li>
					<li>
						<span>RAM:</span>
						<div><?php echo $Product['RAM'] ?></div>
					</li>
					<li>
						<span>Bộ nhớ trong:</span>
						<div><?php echo $Product['ROM'] ?></div>
					</li>
					<li>
						<span>Dung lượng pin:</span>
						<div><?php echo $Product['PIN'] ?></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php require_once "layouts/footer.php" ?>
	<script type="text/javascript">
		$(document).ready(function(){
			let dem = 0;
			$('#button-ttct').on("click", function(){
				if(dem%2==0){
					$('.thong-tin-chi-tiet').show();
					dem++;
				}else{
					$('.thong-tin-chi-tiet').hide();
					dem++;
				}
			});
		});
		
	</script>
</body>
</html>