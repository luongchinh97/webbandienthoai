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
		require_once "controller/entity/Items";
		require_once ("layouts/menutop.php");

		$item = new Items();
		$htmlItems = "";
		$htmlFormUser = "";
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
							<td>".number_format($donGia,'0','.',' ')."</td>
							<td>".number_format($tong,'0','.',' ')."</td>
							<td><a  href='controller/service/giohang-del.php?id=".$id."'><img class='xoa-pro'>Delete</a></td>
							<td><button type='submit'>Update</button></td>
						</form>
					</tr>";
				}
				/*foreach ($user as $key => $value) {
					$htmlFormUser .= 
					"<form action='' method='post'>
						<div class='button-input'><input type='text' name='hoTen' placeholder='Họ và tên' ></div>
						<div class='button-input diaChi-input'><input type='text' name='diaChi' placeholder='Địa chỉ' ></div>
						<div class='button-input'>
							<select name='maCN'>
						    <option value='1'>Chi nhánh Hà Nội</option>
						    <option value='2'>Chi nhánh Hồ Chí Minh</option>
						  	</select>
						</div>
						<button class='button-gh button-tt' type='submit'>Thanh toán</button>
					</form>";
				}*/
			}
		}
		else{
			$htmlItems .= "<tr><td colspan='7'>Không có sản phẩm nào trong giỏ hàng.</td></tr>";
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
					<th>Delete</th>
					<th>Update</th>
				</tr>
				</thead>
				<tbody>
				<?php echo "$htmlItems"; ?>
				</tbody>
			</table>
			
			<div id="button">
				<?php echo "$htmlFormUser"; ?>
			</div>
			
	</div>
	<?php require_once ("layouts/footer.php") ?>
</body>
</html>