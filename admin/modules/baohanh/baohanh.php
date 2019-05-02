<?php 
	require_once "../../../controller/dao/database.php";
	$dao = new dao;
	$baoHanh = $dao->getById("baohanh",1);
	if(isset($_POST['submit'])){
		$baoHanh = array("noiDung"=>$_POST['moTa']);
		$dao->update("baohanh",$baoHanh,1);
		header("location:baohanh.php");
	}
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
  	<link rel="stylesheet" href="../../../static/css/styleAdmin.css">
	<script type="text/javascript" charset="utf8" src="../../../static/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../../../static/ckeditor/ckeditor.js"></script>
 	<script type="text/javascript" src="../../../static/js/myjs.js"></script>
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
	                        <strong class="card-title" >Chỉnh sửa bảo hành</strong>
	                        <div class="card-body card-block">
	                        	<form method="POST" action="" >
	                        		<div class="row form-group">
									 	<div class="col-12 col-md-5">
									 		<textarea id="moTa" class="form-control" name="moTa"><?php echo $baoHanh['noiDung'];?></textarea>
									 	</div>
								 	</div>
						 			<input class="btn btn-secondary btn-sm" type="submit" name="submit" value="UPDATE">	
	                        	</form>
	                        </div>
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
	<script type="text/javascript">
 		CKEDITOR.replace('moTa',{
 			width: '900px',
 			height: '700px',
	        resize_enabled : false
 		});
 		configCK();
 	</script>
 	
</body>
</html>
