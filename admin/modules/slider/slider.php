<?php 
	require_once ("../../../controller/dao/database.php");
	$dao = new dao;
	$arr = $dao->getAll("slider");
	$time = $dao->getById("time-slider",1);

	if(isset($_POST['submit'])){
		$t = array("thoiGian"=>(int) $_POST['time-slide']);
		$dao->update("time-slider",$t,1);
		header("location:slider.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title></title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  	<link rel="stylesheet" href="http://localhost:81/webbandienthoai/static/css/styleAdmin.css">
	<script type="text/javascript" charset="utf8" src="../../../static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php include_once ("../../layouts/left-panel.php"); ?>
	<div id="right-panel" class="right-panel">
		<?php include_once ("../../layouts/Header.php"); ?>
		<div class="content">
	        <div class="animated fadeIn">
	          <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <div class="card-header">
	                        <strong class="card-title" >Slider website</strong>
	                    </div>
	                    <div class="table-stats order-table ov-h">
	                    	<div style="margin: 10px 50px;"><a href='add.php' class='btn btn-primary a-btn-slide-text'><span><strong>Thêm</strong></span></a></div>
	                    	<table class="table">
	                    		<thead>
	                    			<tr>
		                    			<th class="serial">#</th>
		                    			<th>ID</th>
		                    			<th>Images</th>
		                    			<th>URL</th>
		                    			<th>Thao tác</th>
	                    			</tr>
	                    		</thead>
	                    		<tbody>
	                    			<?php foreach ($arr as $key => $value) { ?>
	                    			<tr>
	                    				<td class="serial"><?php echo (int)$key+1 ?></td>
	                    				<td><?php echo $value['id']  ?></td>
	                    				<td><?php echo $value['img'] ?></td>
	                    				<td><?php echo $value['url'] ?></td>
	                    				<td><a href="update.php?id=<?php echo $value['id'];?>">Update</a> | <a href="delete.php?id=<?php echo $value['id'];?>">Delete</a></td>
	                    			</tr>
	                    			<?php } ?>
	                    		</tbody>
	                    	</table>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-6">
	            	<div class="card">
	                    <div class="card-body">
	                    	<form action="" method="POST">
	                    		<div class="form-group">
	                    			<label class="control-label mb-1">Thời gian chuyển slide:</label>
	                    			<input type="number" name="time-slide" class="form-control cc-name valid" min="1" value="<?php echo $time['thoiGian']?>">
	                    			<input type="submit" name="submit" class="btn btn-outline-secondary" style="margin-top: 10px;" value="Lưu">
	                    		</div>
	                    	</form>
	                    </div>
	                </div>
	            </div>
	          </div>
	        </div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
