<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/static/css/style.css" rel="stylesheet" />
<script type="text/javascript" charset="utf8" src="/static/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/static/js/myJS.js"></script>
<title>Homeshop</title>
</head>
<body>
	<jsp:include page="menutop.jsp"></jsp:include>
	<div id="s-title">
		<p>
			<a href="/LapTrinhWeb/home-shop">HOME</a>/HÓA ĐƠN
		</p>
		<h1>Hóa đơn</h1>
		<p>
			<a href="/LapTrinhWeb/smartphone">&larr; Back to Home</a>
		</p>
	</div>
	<dir class="tai"></dir>
	<div id="main-gio-hang">
		<div id="thong-tin-khach-hang">
			<h3>Thông tin khách hàng</h3>
			<p>Tên khách hàng : ${khachHang.tenKH}</p>
			<p>Số điện thoại : ${khachHang.phone }</p>
			<p>Địa chỉ : ${khachHang.diaChi }</p>
			<p>Danh sách sản phẩm : </p>
		</div>
		<table id="show-gio-hang">
			<thead>
			<tr>
				<th>STT</th>
				<th colspan="2">Sản phẩm</th>
				<th>Đơn giá</th>
				<th>Số lượng</th>
				<th>Tổng giá</th>
			</tr>
			</thead>
			<c:forEach items="${order.listItems}" var="item" varStatus="i">
			<tr>
				<td>${i.count}</td>
				<td><img class="img-pro-gio-hang" src="<c:url value = '/static/images/${item.matHang.img }'/>"></td>
				<td>${item.matHang.tenMH }</td>
				<td>${item.matHang.giaMH }</td>
				<td>${item.soLuong }</td>
				<td>${item.matHang.giaMH*item.soLuong  }</td>
			</tr>
			</c:forEach>
			<tfoot><tr>
				<th colspan="4">Tổng : </th>
				<th colspan="2">${order.total}</th>
			</tr></tfoot>
		</table>
	</div>
	<jsp:include page="footer.jsp"></jsp:include>
</body>
</html>