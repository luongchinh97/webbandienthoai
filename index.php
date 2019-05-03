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
	<?php 
		require_once "layouts/header.php"; 
		$spBanChay = $dao->getProductBanChay(12);
		$spMoi = $dao->getProductMoi();
		$qc1 = $dao->getById("quangcao",1);$qc2 = $dao->getById("quangcao",2);$qc3 = $dao->getById("quangcao",3);$qc4 = $dao->getById("quangcao",4);
		$htmlSBC = ""; $htmlSM = "";
		foreach ($spBanChay as $row => $value ) {
			$htmlSBC.=
			"<div class='product-box'>
				<div class='product-img'>
					<img src='static/images/".$value['img']."'/>
				</div>
				<div class='product-detail'>
					<h4><a href='chitiet.php?id=".$value['id']."'>".$value['namePro']."</a></h4>
					<p class='id-product'>".$value['id']."</p>
					<p><a class='add-to-cart' href='controller/service/giohang-add.php?id=".$value['id']."'>Add to Cart</a></p>".number_format($value['gia'],'0','.',' ')." VNĐ
				</div>
			</div>";
		}
		foreach ($spMoi as $row => $value) {
			$htmlSM.=
			"<div class='product-box'>
				<div class='product-img'>
					<img src='static/images/".$value['img']."'/>
				</div>
				<div class='product-detail'>
					<h4><a href='chitiet.php?id=".$value['id']."'>".$value['namePro']."</a></h4>
					<p class='id-product'>".$value['id']."</p>
					<p><a class='add-to-cart' href='controller/service/giohang-add.php?id=".$value['id']."'>Add to Cart</a></p>".number_format($value['gia'],'0','.',' ')." VNĐ
				</div>
			</div>";
		}
	?>
	<div id="main">
		<div id="quang-cao">
			<img id="quang-cao-mot"
				src="static/images/<?php echo $qc1['img']?>" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p><?php echo $qc1['noiDung']; ?></p>
				<a style="color: white;" href="quangcao.php?id=<?php echo $qc1['id']?>" class="quang-cao">Xem chi tiết</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-hai"
				src="static/images/<?php echo $qc2['img'] ?>" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p><?php echo $qc2['noiDung']; ?></p>
				<a href="quangcao.php?id=<?php echo $qc2['id']?>" class="quang-cao">Xem chi tiết</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-ba" src="static/images/<?php echo $qc3['img'] ?>" />
			<div class="noi-dung">
				<p><?php echo $qc3['noiDung']; ?></p>
				<a href="quangcao.php?id=<?php echo $qc3['id']?>" class="quang-cao">Xem chi tiết</a>
			</div>
		</div>
		<div id="quang-cao">
			<img id="quang-cao-bon"
				src="static/images/<?php echo $qc4['img'] ?>" />
			<div class="noi-dung" style="color: #f7f7f7;">
				<p style="margin-left: 300px;"><?php echo $qc4['noiDung']; ?></p>
				<a style="color: white; margin-left: 300px;" href="quangcao.php?id=<?php echo $qc4['id']?>" class="quang-cao">Xem chi tiết</a>
			</div>
		</div>
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
		</div>
	</div>
	<?php require_once ("layouts/footer.php"); ?>
</body>
</html>