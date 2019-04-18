<div id="temp"></div>
<div id="menu-top">
	<ul>
		<li class="home-shop"><a href="/LapTrinhWeb/home-shop">Home<span>Shop</span></a></li>
		<li><a href="/LapTrinhWeb/home-shop">Home &rsaquo;</a>
			<ul>
				<li><a href="/LapTrinhWeb/smartphone">Apple</a></li>
				<li><a href="/LapTrinhWeb/table">Samsung</a></li>
				<li><a href="/LapTrinhWeb/laptop">Asus</a></li>
				<li><a href="/LapTrinhWeb/phukien">OPPO</a></li>
			</ul></li>
		<li><a href="#">Khuyễn mãi</a></li>
		<li><a href="#">CÃ´ng nghá»‡</a></li>
		<li><a href="#">Há»i Ä‘Ã¡p</a></li>
	</ul>
	<div class="top_search">
		<div class="input-group">
			<form action="/LapTrinhWeb/tim-kiem" method="post">
				<input type="text" name="search" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Go!</button>
				</span>
			</form>
		</div>
	</div>
	<div id="dang-nhap-dang-ky">
		<c:if test="${sessionScope.member==null}">
			<a href="<c:url value = '/dang-nhap'/>">ÄÄƒng nháº­p</a>
			<a href="<c:url value = '/dang-ky'/>">ÄÄƒng kÃ½</a>
		</c:if>
		<c:if test="${sessionScope.member!=null}">
			<button><a href="/LapTrinhWeb/logout">ÄÄƒng xuáº¥t</a></button>
		</c:if>
	</div>
	<div id="gio-hang">
		<div>
			<a href="/LapTrinhWeb/gio-hang"><img src="/LapTrinhWeb/static/images/shopping-cart(1).png"></a>
		</div>
		<p>Shopping cart</p>
		<p>
			<span id="so-luong-items"></span> items
		</p>
	</div>
	
</div>


<script type="text/javascript">
	$('#gio-hang div').mouseover(function() {
		$(this).css({"background-color" : "white"});
		$('#gio-hang img').attr('src','/LapTrinhWeb/static/images/shopping-cart.png');
	});
	$('#gio-hang div').mouseout(function() {
		$(this).css({"background-color" : "#6b9cff"});
		$('#gio-hang img').attr('src','/LapTrinhWeb/static/images/shopping-cart(1).png');
	});
	var soLuong = 0;
	soLuong = ${sessionScope.soLuong};
	if(soLuong != 0){
		$('#so-luong-items').html(soLuong);
	}else{
		$('#so-luong-items').html(0);
	}
</script>