<?php 
	require_once "../../../controller/dao/database.php";
	$dao= new dao;
	if(isset($_POST['submit'])){
		if($_FILES['img']['error']>0){
			echo "<script>alert('Lỗi tải file')</script>";
			die();
		}
		else{
			move_uploaded_file($_FILES['img']['tmp_name'],"../../../static/images/".$_FILES['img']['name']);
			$data=array(
						"img"=>$_FILES['img']['name'],
						"url"=>$_POST['url']);
			$dao->insert("slider",$data);
			header("location:slider.php");
		}
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
	                        <strong class="card-title" >Thêm slider</strong>
	                    </div>
	                    <div class="card-body card-block">
	                    	<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="img-input">Ảnh:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input class="form-control-file" id="img-input" type="file" name="img">
								 	</div>
								 </div>
						 		<div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="url">URL:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="url" class="form-control" type="text" name="url" placeholder="Nhập url" required>
								 	</div>
								 </div>
								 
						 		<input class="btn btn-secondary btn-sm" type="submit" name="submit" value="Submit">		
						 	</form>
							
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="clearfix"></div>
</div>
</body>
</html>
