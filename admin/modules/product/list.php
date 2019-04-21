<?php 
include __DIR__."/../../../controller/dao/database.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý hóa đơn</title>
  	<script type="text/javascript" charset="utf8" src="../../../static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php 
		$dao= new dao;
		$url_base = $dao->base_url();
		$arrHang=$dao->getHangProduct();
		$htmlHang = "";
		foreach ($arrHang as $value) {
			$htmlHang .="<option value='".$value['hangSX']."'>".$value['hangSX']."</option>";
		}
		$arrList=$dao->getAllProduct();
		$htmlList = "<table border='1px' cellspacing='0px'><tr style='font-weight: bold'>
 					<td>ID</td>
 					<td>Tên</td>
 					<td>Hãng SX</td>
 					<td>Năm SX</td>
 					<td>giá</td>
 					<td>Ảnh</td>
 					<td>Số Lượng</td>
 					<td></td>
 					<td></td>
 				</tr>";
		foreach ($arrList as $row) {
			$htmlList.="<tr><td>".$row['id']."</td>
 					<td>".$row['namePro']."</td>
 					<td>".$row['hangSX']."</td>
 					<td>".$row['namSX']."</td>
 					<td>".$row['gia']."</td>
 					<td><img src='../../../static/images/".$row['img']."'></td>
 					<td>".$row['tongSL']."</td>
 					<td><a href='edit.php?id=".$row['id']."'>Sửa</a></td>
 					<td><a href='delete.php?id=".$row['id']."'>Xóa</td>
 					</tr>";
		}
		$htmlList .="</table>";


	?>

	<div class="wrapper">
		<div class="content">
			<div>
				<form method="POST" action="#">
					<label>Tìm kiếm theo tên:</label> <input type="text" name="ten" placeholder="Nhập tên sản phẩm cần tìm" class="searchTen">
				</form>
			</div>
			<div>
				<form method="POST" action="#">
					<label>Hãng</label>
					<select class="hangSX" id="hangSX">
						<option value="all" selected="selected">Tất cả</option>
						<?php echo "$htmlHang"; ?>
					</select>
				</form>
			</div>
			<div>
				<button><a href="add.php"> Thêm sản phẩm</a> </button>
			</div>
			<div class=list>
				<?php echo $htmlList ?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer"></div>
	</div>
	<script>
		$(document).ready(function(){
			$('.searchTen').keyup(function(){
				var name=$('.searchTen').val();
				$.post('<?php echo $url_base;?>controller/service/search-product-by-name-service.php',
				{name: name},function(data){
					$('.list').html(data);
				})
				
			});

			$('.hangSX').change(function(){
				var hang=$('.hangSX').val();
				$.post('<?php echo $url_base;?>controller/service/search-product-by-hang-service.php',
				{hang:hang}, function(hangSX){
					$('.list').html(hangSX);
				});
				
			});
		});
</script>

</body>
</html>
