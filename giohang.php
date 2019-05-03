<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="static/css/style.css" rel="stylesheet" />
<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
<title>Homeshop</title>
</head>
<body>
	<!-- PHP -->
	<?php 
		require_once "controller/entity/Items.php";
		require_once ("layouts/menutop.php");

		$item = new Items;
		$htmlItems = "";
		$htmlFormUser = "";
		$tongTien = 0;
		if(isset($_SESSION['cartitems'])){
			$arrItems = $_SESSION['cartitems'];
			if(sizeof($arrItems)>0){
				foreach ($arrItems as $key => $value ) {
					$table = "product";
					$id = $value->idProduct;
					$product = $dao->getById($table,$id);
					$donGia = (int) $product['gia']; $soLuong =(int) $value->soLuong; $tong = $donGia*$soLuong;
					$htmlItems .= 
					"<tr>
						<form action='controller/service/giohang-update.php' method='post' accept-charset='UTF-8'>
							<input type='hidden' value=".$id." name='idP' />
							<td><img class='img-pro-gio-hang' src='static/images/".$product['img']."'></td>
							<td><a href='chitiet.php?id=".$id."'>".$product['namePro']."</a></td>
							<td><input style='width: 65px;' type='number' value=".$soLuong." name='quantity' min='1'/></td>
							<td>".number_format($donGia,'0','.',' ')." đ</td>
							<td>".number_format($tong,'0','.',' ')." đ</td>
							<td><a  href='controller/service/giohang-del.php?id=".$id."'><img class='xoa-pro' src='static/images/cancel.png'></a></td>
							<td><button type='submit'><img src='static/images/rotation.png'/></button></td>
						</form>
					</tr>";
					$tongTien += $tong;
				}
			}
			$_SESSION['tongTien']=$tongTien;
		}
		else{
			$htmlItems .= "<tr><td colspan='7'>Không có sản phẩm nào trong giỏ hàng.</td></tr>";
		}
		$arrTinh = $dao->getAll("province");
		$htmlTinh = "";
		foreach ($arrTinh as $key => $value) {
			$htmlTinh .="<option value='".$value['provinceid']."'>".$value['name']."</option>";
		}
		/* Thanh toán khi nhận hàng */
		if(isset($_POST['tt'])){
			if(isset($_SESSION['user'])){
				$user=$_SESSION['user'];
				$cartItems = $_SESSION['cartitems'];
				$tongItems = $_SESSION['tongItems'];
				$provinceID = $_POST['province'];
				$districtID = $_POST['district'];
				$wardID = $_POST['ward'];
				$diaChi = $_POST['address'];
				$ngayLap = date("Y-m-d");
				$tongTien = $_SESSION['tongTien'];
				$idUser = (int) $user['id'];
				$order = array("idUser"=>$idUser,"ngayLap"=>$ngayLap, "tongGia"=>$tongTien, "soLuong"=>$tongItems, "maTinh"=>$provinceID, "maQH"=>$districtID, "maPX"=>$wardID, "diaChi"=>$diaChi);
				$dao = new dao;
				$orderID = $dao->insertOrder($order);
				$item =  new Items;
				foreach ($cartItems as $value) {
					$value->idOrder = $orderID;
					$product = $dao->getById("product", $value->idProduct);
					$product['tongSL'] =(int)$product['tongSL']-(int) $value->soLuong;
					$dao->insertItems($value);
					$dao->update("product",$product, $value->idProduct);
				}
				unset($_SESSION['cartitems']);
				unset($_SESSION['tongItems']);
				unset($_SESSION['tongTien']);
				$_SESSION['orderID'] = $orderID;
				header("location:thanhtoanTC.php");
			}else{
				header("location:dangnhap.php");
			}
		}
	?>
	<!-- END PHP -->
	<div id="s-title">
		<p style="visibility: hidden;">
		<a href="<?php echo $urlHomeShop ?>">HOME</a>/<a class="link-danh-muc"><span class="danh-muc-product"></span></a>/<span class="name-product"></span>
		</p>
		<h1>Giỏ hàng của bạn</h1>
		<p>
			<a href="<?php echo $urlHomeShop; ?>">&larr; Back to Home</a>
		</p>
	</div>
	<div id="tai"></div>
	<div id="main-gio-hang">
			
			<table id="show-gio-hang" border="1" cellspacing="1" cellpadding="5" >
				<thead>
				<tr>
					<th style="min-width: 300px;" colspan="2" >Sản phẩm</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Tổng giá</th>
					<th colspan="2">Tùy chọn</th>
				</tr>
				</thead>
				<tbody>
				<?php echo "$htmlItems"; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4">Tổng :</td>
						<td colspan="3"><?php echo number_format($tongTien,'0','.',' ') ?> đ</td>
					</tr>
				</tfoot>
			</table>
			<div class="address">
				<?php if(isset($_SESSION['cartitems'])){ ?>
				<b>Địa chỉ giao hàng:</b>
				<form action="" method="POST" accept-charset="UTF-8">
					<select name="province" id="province">
						<option value="0">Chọn Tinh/Thành phố</option>
						<?php echo $htmlTinh; ?>
					</select>
					<select name="district" id="district">
						<option value="0">Chọn Quận/Huyện</option>
					</select>
					<select name="ward" id="ward">
						<option value="0">Chọn Phường/Xã</option>
					</select>
					<input type="text" name="address" placeholder="Số nhà" id="diaChi">
					<button type="button" class="button-gh button-tt" name="tt">Thanh toán khi nhận hàng</button>
				</form>
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="upload" value="1">
					<input type="hidden" name="return" value="http://localhost:81/webbandienthoai/controller/service/thanh-toan-paypal.php">
					<input type="hidden" name="cancel_return" value="http://localhost:81/webbandienthoai/thanhtoanTB.php">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="business" value="nguoinhanhomeshop@gmail.com">
					<!-- List CartItem -->
					<?php
							$arrItems = $_SESSION['cartitems'];
							$stt = 0; $htmlCartItems = "";
							foreach ($arrItems as $key => $value) {
								$product = $dao->getById("product",$value->idProduct);
								$giaItem = (int) $product['gia']/23000;
								$stt = $key + 1;
								$htmlCartItems .=
							"<input type='hidden' name='item_name_".$stt."' value='".$product['namePro']."'>
							<input type='hidden' name='item_number_".$stt."' value='".$product['id']."'>
							<input type='hidden' name='amount_".$stt."' value='".$giaItem."'>
							<input type='hidden' name='quantity_".$stt."' value='".$value->soLuong."'>";
							echo $htmlCartItems;
							}
					?>
					<button type="button" class="button-pp" name="pp"><img src="static/images/btnpaypal.png" alt="Pay with PayPal" /></button>
				</form>
				<?php } ?>
			</div>
	</div>
	<?php require_once ("layouts/footer.php") ?>
	<script type="text/javascript" src="static/js/myjs.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#province').change(function(){
				let provinceID = $('#province').val();
				$.post("http://localhost:81/webbandienthoai/controller/service/select-quan.php", {'id': provinceID} ,function(data){
					var data= "<option value='0'>Chọn Quận/Huyện</option>"+data;
					$('#district').html(data);
				});
			});
			$('#district').change(function(){
				let districtID = $('#district').val();
				$.post("http://localhost:81/webbandienthoai/controller/service/select-xa.php", {'id': districtID} ,function(data){
					var data = "<option value='0'>Chọn Phường/Xã</option>"+data;
					$('#ward').html(data);
				});
			});
			$('.button-tt').on("click", function(){
				let province = $('#province').val();
				let district = $('#district').val();
				let ward = $('#ward').val().trim();
				let address = $("#diaChi").val();
				if(province==0){
					alert("Chưa chọn Tỉnh/Thành phố.");
				}else if(district==0){
					alert("Chưa chọn Quận/Huyện.");
				}else if(ward==0){
					alert("Chưa chọn Xã/Phường");
				}else if(address==""){
					alert("Chưa nhập địa chỉ.");
				}else{
					$('.button-tt').attr({"type":"submit"})
				}
			});
			$('.button-pp').on("click", function(){
				let province = $('#province').val();
				let district = $('#district').val();
				let address = $("#diaChi").val();
				let ward = $('#ward').val().trim();
				if(province==0){
					alert("Chưa chọn Tỉnh/Thành phố.");
				}else if(district==0){
					alert("Chưa chọn Quận/Huyện.");
				}else if(ward==0){
					alert("Chưa chọn Xã/Phường.");
				}else if(address==""){
					alert("Chưa nhập địa chỉ.");
				}else{
					$.post("controller/service/save-address.php", {"provinceID":province,"districtID":district,"wardID":ward,"diaChi":address});
					$('.button-pp').attr({"type":"submit"});
				}
			});
		});
	</script>
</body>
</html>