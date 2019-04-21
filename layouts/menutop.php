<!-- CODE PHP -->
<?php 
	require_once  ("controller/dao/database.php");
	session_start();
	$dao = new dao;
	$url = $dao->base_url();
	$urlHomeShop = $url."index.php";
	/*Lấy danh sách danh mục*/
	$htmlHang = "";
	$arr = $dao->getHangProduct();
	foreach ($arr as $key => $value) {
		$htmlHang .= "<li><a href='".$url."product.php?hangSX=".$value['hangSX']."'>"
				.$value['hangSX']."</a></li>";
	}
	/*Check user đăng nhập*/
	$htmlUser = "<a href='".$url."dangky.php'>Đăng ký</a><a href='".$dao->base_url()."dangnhap.php'>Đăng nhập</a>";
	if(isset($_SESSION["user"])){
		$table = "user";
		$id = $_SESSION["user"]["id"];
		$htmlUser = "<a href='#'>".$dao->getById($table, $id)."</a>";
	}

 ?>
 <!-- END CODE PHP -->

<div id="temp"></div>
<div id="menu-top">
	<ul>
		<li class="home-shop"><a href="<?php echo $urlHomeShop; ?>"><img src="static/images/logo.png" alt=""></a></li>
		<li><a>Điện thoại</a>
			<ul class="list-hang">
			<!-- Danh sách hãng sản phẩm -->
			<?php echo $htmlHang; ?>
			</ul>
		</li>
		<li><a href="#">Bảo hành</a></li>
	</ul>
	<div class="top_search">
		<div class="input-group">
			<form action="" method="post">
				<input type="text" name="search" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Go!</button>
				</span>
			</form>
		</div>
	</div>
	<div id="dang-nhap-dang-ky">
		<?php echo $htmlUser; ?>
	</div>
	<div id="gio-hang">
		<div>
			<a href="#"><img src="static/images/shopping-cart(1).png"></a>
		</div>
		<span id="so-luong-items">10</span>
	</div>
	
</div>
<script type="text/javascript">
	$('#gio-hang div').mouseover(function() {
		$(this).css({"background-color" : "white"});
		$('#gio-hang img').attr('src','static/images/shopping-cart.png');
	});
	$('#gio-hang div').mouseout(function() {
		$(this).css({"background-color" : "#6b9cff"});
		$('#gio-hang img').attr('src','static/images/shopping-cart(1).png');
	});
</script>