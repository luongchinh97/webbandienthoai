<?php 
	require_once "../../../controller/dao/database.php";
	$dao= new dao;
	$url_base = $dao->base_url();
	$arrHang=$dao->getHangProduct();
	$htmlHang = "";
	foreach ($arrHang as $value) {
		$htmlHang .="<option value='".$value['hangSX']."'>".$value['hangSX']."</option>";
	}
	$arrList=$dao->getAll("product");
	$htmlList = "<table id='bootstrap-data-table' class='table_user_list table table-striped table-bordered'>
					<tr>
					<td>ID</td>
					<td>Tên</td>
					<td>Hãng SX</td>
					<td>Năm SX</td>
					<td>giá</td>
					<td>Ảnh</td>
					<td>Số Lượng</td>
					<td></td>
					</tr>";
	foreach ($arrList as $row) {
		$htmlList.="<tr><td>".$row['id']."</td>
					<td>".$row['namePro']."</td>
					<td>".$row['hangSX']."</td>
					<td>".$row['namSX']."</td>
					<td>".$row['gia']."</td>
					<td><img style='width:60px;height:60px;' src='../../../static/images/".$row['img']."'></td>
					<td>".$row['tongSL']."</td>
					<td><a href='edit.php?id=".$row['id']."'>Sửa</a></td>
					</tr>";
	}
	$htmlList .="</table>";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý hóa đơn</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title></title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  	<link rel="stylesheet" href="http://localhost:81/webbandienthoai/static/css/styleAdmin.css">
	<script type="text/javascript" charset="utf8" src="../../../static/js/jquery-3.2.1.min.js"></script>
  	<style>
  		#dropbox_search{
  			position: relative;
  			float: right;
  			top: -32px;
  		}
  	</style>
</head>
<body>
	<?php include_once ("../../layouts/left-panel.php"); ?>
	<div id="right-panel" class="right-panel">
		<?php include_once ("../../layouts/Header.php"); ?>
		<div class="content">
	        <div class="animated fadeIn">
	          <div class="row">
	            <div class="col-md-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong class="card-title" >Danh sách sản phẩm</strong>
	                        <div style="margin-top: 10px">
								<form method="POST" action="#">
									<input id="input_search" style="width: 350px" type="text" name="ten" placeholder="Nhập tên sản phẩm cần tìm" 
									class="form-control form-control-sm searchTen">
								</form>
							</div>
							<div id="dropbox_search">
								<form method="POST" action="#">
									<label>Hãng</label>
									<select class="hangSX" id="hangSX">
										<option value="all" selected="selected">Tất cả</option>
										<?php echo "$htmlHang"; ?>
									</select>
								</form>
							</div>
							 <div style="margin-top: 10px"><a href='http://localhost:81/webbandienthoai/admin/modules/product/add.php' class='btn btn-primary a-btn-slide-text'><span><strong>Thêm</strong></span></a></div>
	                    </div>
	                    <div style="font-size: 14px" class="card-body list">
							<?php echo $htmlList ?>
						</div>
	                </div>
	            </div>
	          </div>
	        </div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
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
