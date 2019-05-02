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
	$htmlUser = "<a class='dang-ky' href='".$url."dangky.php'>Đăng ký</a><button class='dang-nhap'><a href='".$dao->base_url()."dangnhap.php'>Đăng nhập</a></button>";
	if(isset($_SESSION["user"])){
		$user = $_SESSION["user"];
		$htmlUser = "<div class=tt-user>
						<div class='name-user'>  ".$user['name']."  </div>
						<div class='ql-user'>
							<ul>
								<li><i class='far fa-smile'></i><a href='#'>Quản lý tài khoản</a></li>
								<li><i class='fas fa-box'></i><a href='#'>Đơn hàng của tôi</a></li>
								<li><i class='fas fa-sign-out-alt'></i><a href='dangxuat.php'>Đăng xuất</a></li>
							</ul>
						</div>
					</div>	";
	}
	$tongItems = 0;
	if(isset($_SESSION['tongItems'])){
		$tongItems = $_SESSION['tongItems'];
	}
 ?>
 <!-- END CODE PHP -->
<div id="temp"></div>
<div id="menu-top">
	<ul>
		<li class="home-shop"><a href="<?php echo $urlHomeShop; ?>">Home<span>Shop</span></a></li>
		<li><a>Điện thoại</a>
			<ul class="list-hang">
			<!-- Danh sách hãng sản phẩm -->
			<?php echo $htmlHang; ?>
			</ul>
		</li>
		<li><a href="baohanh.php">Bảo hành</a></li>
	</ul>
	<div class="top_search">
		<div class="input-group">
			<form action="search.php" method="get">
				<input type="text" name="search" class="search-input" placeholder="Search for...">
				<span class="input-group-btn">
					<button type="submit">Search</button>
				</span>
			</form>
		</div>
		<div class="data-search">
		</div>
	</div>
	<div id="dang-nhap-dang-ky">
		<?php echo $htmlUser; ?>
	</div>
	<div id="gio-hang">
		<div>
			<a href="giohang.php"><img src="static/images/shopping-cart(1).png"></a>
		</div>
		<p id="so-luong-items">
			<?php echo "$tongItems"; ?>
		</p>
	</div>
	
</div>
<script type="text/javascript" src="static/js/myjs.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		cartItems();
		$('.search-input').on("keyup", function(){
			let data = $(this).val();
			showListSearchProduct(data);
		});
		$('.name-user').on("mouseover", function(){
			$('.ql-user').show();
		});
		$('.ql-user').on("mouseover", function(){
			$('.ql-user').show();
		});
		$('.ql-user').on("mouseout", function(){
			$('.ql-user').hide();
		});
	});
</script>