<?php 
	require_once "../../../controller/dao/database.php";
	$dao= new dao;
	$url_base = $dao->base_url();
	if(isset($_POST['submit'])){
		if($_FILES['img']['error']>0){
			echo "Lỗi tải file ";
			die();
		}
		else{
			move_uploaded_file($_FILES['img']['tmp_name'],"../../../static/images/".$_FILES['img']['name']);
			$data=array("namePro"=>$_POST['namePro'],
						"hangSX"=>$_POST['hangSX'],
						"namSX"=>(int)$_POST['namSX'],
						"gia"=>$_POST['gia'],
						"manHinh"=>$_POST['manHinh'],
						"CPU"=>$_POST['CPU'],
						"cameraTruoc"=>$_POST['cameraTruoc'],
						"cameraSau"=>$_POST['cameraSau'],
						"heDieuHanh"=>$_POST['heDieuHanh'],
						"RAM"=>$_POST['ram'],
						"ROM"=>$_POST['rom'],
						"PIN"=>$_POST['pin'],
						"img"=>$_FILES['img']['name'],
						"tongSL"=>(int)$_POST['tongSL'],
						"moTa"=>$_POST['moTa']);
			$dao->insert("product",$data);
			header("location:list.php");
		}
	}
 ?>
 <!DOCTYPE html>
 <html lang="en">
  <head>
 	<meta charset="UTF-8">
 	<title>Thêm sản phẩm</title>
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  	<link rel="stylesheet" href="http://localhost:81/webbandienthoai/static/css/styleAdmin.css">

 	<script type="text/javascript" src="../../../static/js/jquery-3.2.1.min.js"></script>
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
	                    	<strong class="card-title">Thêm sản phẩm</strong>
	                    </div>
	                    <div class="card-body card-block">
	                    	<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    			<div class="row form-group">
                    				<div class="col col-md-2">
	                    				<label class="form-control-label" for="name-input">Tên sản phẩm:</label> 
                    				</div>
                    				<div class="col-12 col-md-5">
							 			<input id="name-input" class="form-control" type="text" name="namePro" required>
                    				</div>
                    			</div>
                    			<div class="row form-group">
                    				<div class="col col-md-2">
                    					<label class="form-control-label" for="hang-input">Hãng sản xuất:</label>
                    				</div>
                    				<div class="col-12 col-md-5">
                    					<input id="hang-input" class="form-control" type="text" name="hangSX" required>
                    				</div>
                    			</div>
								<div class="row form-group">
									<div class="col col-md-2">
								 		<label class="form-control-label" for="namsx-input">Năm sản xuất:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
							 			<input id="namsx-input" class="form-control" type="text" name="namSX" required>
								 	</div>
								 </div>
								<div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="gia-input">Giá:</label>
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="gia-input" class="form-control" type="text" name="gia" required>
								 	</div>
								 </div>
								<div class="row form-group">
									<div class="col col-md-2">
								 		<label class="form-control-label" for="manHinh-input">Màn hình:</label>
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="manHinh-input" class="form-control" type="text" name="manHinh" required>
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="cpu-input">CPU:</label>
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="cpu-input" class="form-control" type="text" name="CPU" required>
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="cameraTruoc-input">Camera Trước:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="cameraTruoc-input" class="form-control" type="text" name="cameraTruoc" required>
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="cameraSau-input">Camera Sau:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="cameraSau-input" class="form-control" type="text" name="cameraSau" required>
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="hdh-input">Hệ điều hành:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="hdh-input" class="form-control" type="text" name="heDieuHanh" required>
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="ram-input">RAM:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="ram-input" class="form-control" type="text" name="ram" required>
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="rom-input">Bộ nhớ trong:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="rom-input" class="form-control" type="text" name="rom" required>
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="pin-input">Pin:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="pin-input" class="form-control" type="text" name="pin" required>
								 	</div>
								 </div>
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
										<label class="form-control-label" for="soluong-input">Tổng số lượng:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="soluong-input" class="form-control" type="text" name="tongSL" required>
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="moTa">Mô tả:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<textarea id="moTa" class="form-control" name="moTa" required></textarea>
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
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
 	<script type="text/javascript">
 		CKEDITOR.replace('moTa',{
 			width: '750px',
 			height: '450px',
	        resize_enabled : false
 		});
 		configCK();
 	</script>
 </body>
 </html>