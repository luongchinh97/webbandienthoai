<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Homeshop</title>
  <link href="static/css/style.css" rel="stylesheet" />
  <script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
  <!-- PHP --> 
	<?php 
    require_once  ("layouts/menutop.php");
    $hangSX = $_GET['hangSX'];
    $arrPro = $dao->getProductByHang($hangSX);
  ?>
  <!-- END PHP -->

	<div id="s-title">
		<p>
			<a href="<?php echo $urlHomeShop; ?>">HOME</a>/<?php echo "$hangSX"; ?>
		</p>
		<h1>Danh sách sản phẩm</h1>
		<p>
			<a href="<?php echo($urlHomeShop) ?>">&larr; Back to Home</a>
		</p>
	</div>
	<div id="main-smartphone">
		<?php require_once ("layouts/menuleft.php") ?>
		<div id="main-smartphone-contents">
			<div id="top-main">
				<div id="button-grid"></div>
				<div id="button-list"></div>
				<div id="button-style"></div>
			</div>
			<div id="contents">
				<div class="product-swapper">
				</div>
			</div>
		</div>
	</div>
	<?php require_once ("layouts/footer.php") ?>
	
	<script language="javascript">
  	$(document).ready(function(){
	    var list = <?php echo json_encode($arrPro); ?>;
      	loadProduct(list);
      	setTypeShowProduct();
    });  
	</script>

</body>
</html>