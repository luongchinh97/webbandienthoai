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
		require_once ("layouts/menutop.php") 

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
					<th>STT</th>
					<th style="min-width: 300px;" colspan="2" >Sản phẩm</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Tổng giá</th>
					<th>Delete</th>
					<th>Update</th>
				</tr>
				</thead>
				<tbody>
				<!--<c:forEach items="${sessionScope.carts}" var="cartItem" varStatus="status">
					<tr>
						<form action="" method="post" accept-charset="UTF-8">
							<input type="hidden" value="${cartItem.matHang.maMH}" name="idP" />
							<td></td>
							<td><img class="img-pro-gio-hang" src=""></td>
							<td><a href="<c:url value='/chi-tiet?id=${cartItem.matHang.maMH}'/>"></a></td>
							<td><input style="width: 65px;" type="number" value="${cartItem.soLuong}" name="quantity" min="1"/></td>
							<td></td>
							<td></td>
							<td><a  href="<c:url value='/remove-cart?idP=${cartItem.matHang.maMH}'/>"><img class="xoa-pro" src=""></a></td>
							<td><button type="submit">Update</button></td>
						</form>
					</tr>
				</c:forEach>-->
				<c:if test="${empty sessionScope.carts}">
				<tr>
					<td colspan="7">Không có sản phẩm nào trong giỏ hàng.</td>
				</tr>
				</c:if>
				</tbody>
			</table>
			
			<div id="button">
				<c:if test="${not empty sessionScope.carts}">
					<c:url value="/member/phuong-thuc-thanh-toan" var="url"></c:url>
					<form action="${url}" method="post">
						<div class="button-input"><input type="text" name="hoTen" placeholder="Họ và tên" ></div>
						<div class="button-input"><input type="text" name="sdt" placeholder="Số điện thoại"></div>
						<div class="button-input diaChi-input"><input type="text" name="diaChi" placeholder="Địa chỉ" ></div>
						<div class="button-input">
							<select name="maCN">
						    <option value="1">Chi nhánh Hà Nội</option>
						    <option value="2">Chi nhánh Hồ Chí Minh</option>
						  	</select>
						</div>
						<button class="button-gh button-tt" type="submit">Thanh toán</button>
					</form>
				</c:if>
			</div>
			
	</div>
	<?php require_once ("layouts/footer.php") ?>
</body>
</html>