<?php 
require_once "../../../controller/dao/database.php";
$dao= new dao;
$id=(int)$_GET['id'];
$row=$dao->getById("product",$id);
if(isset($_POST['submit'])){
		$data=array();
		move_uploaded_file($_FILES['img']['tmp_name'],"../../../static/images/".$_FILES['img']['name']);
		$IMG=$_FILES['img']['name'];
		if($IMG==""){
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
		 						"tongSL"=>(int)$_POST['tongSL'],
		 						"moTa"=>$_POST['moTa']
		 						);
		}else{
			$namSX=(int)$_POST['namSX'];
			$tongSL=(int)$_POST['tongSL'];
			$data=array("namePro"=>$_POST['namePro'],
		 						"hangSX"=>$_POST['hangSX'],
		 						"namSX"=>$namSX,
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
		 						"tongSL"=>$tongSL,
		 						"moTa"=>$_POST['moTa']
		 						);
		}
		$sql=$dao->update("product",$data,$id);
		header("location:list.php");
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
	                    	<strong class="card-title">Sửa sản phẩm</strong>
	                    </div>
	                    <div class="card-body card-block">
	                    	<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    			<div class="row form-group">
                    				<div class="col col-md-2">
	                    				<label class="form-control-label" for="name-input">Tên sản phẩm:</label> 
                    				</div>
                    				<div class="col-12 col-md-5">
							 			<input id="name-input" class="form-control" type="text" name="namePro" value="<?php echo $row['namePro'] ?>">
                    				</div>
                    			</div>
                    			<div class="row form-group">
                    				<div class="col col-md-2">
                    					<label class="form-control-label" for="hang-input">Hãng sản xuất:</label>
                    				</div>
                    				<div class="col-12 col-md-5">
                    					<input id="hang-input" class="form-control" type="text" name="hangSX" value="<?php echo $row['hangSX'] ?>">
                    				</div>
                    			</div>
								<div class="row form-group">
									<div class="col col-md-2">
								 		<label class="form-control-label" for="namsx-input">Năm sản xuất:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
							 			<input id="namsx-input" class="form-control" type="text" name="namSX" value="<?php echo $row['namSX'] ?>">
								 	</div>
								 </div>
								<div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="gia-input">Giá:</label>
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="gia-input" class="form-control" type="text" name="gia" value="<?php echo $row['gia'] ?>">
								 	</div>
								 </div>
								<div class="row form-group">
									<div class="col col-md-2">
								 		<label class="form-control-label" for="manHinh-input">Màn hình:</label>
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="manHinh-input" class="form-control" type="text" name="manHinh" value="<?php echo $row['manHinh'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="cpu-input">CPU:</label>
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="cpu-input" class="form-control" type="text" name="CPU" value="<?php echo $row['CPU'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="cameraTruoc-input">Camera Trước:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="cameraTruoc-input" class="form-control" type="text" name="cameraTruoc" value="<?php echo $row['cameraTruoc'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="cameraSau-input">Camera Sau:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="cameraSau-input" class="form-control" type="text" name="cameraSau" value="<?php echo $row['cameraSau'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="hdh-input">Hệ điều hành:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="hdh-input" class="form-control" type="text" name="heDieuHanh" value="<?php echo $row['heDieuHanh'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="ram-input">RAM:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="ram-input" class="form-control" type="text" name="ram" value="<?php echo $row['RAM'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="rom-input">Bộ nhớ trong:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="rom-input" class="form-control" type="text" name="rom" value="<?php echo $row['ROM'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="pin-input">Pin:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="pin-input" class="form-control" type="text" name="pin" value="<?php echo $row['PIN'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="img-input">Ảnh:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input class="form-control-file" id="img-input" type="file" name="img"><img style="width: 200px; height: 200px; margin-top: 15px;" src="../../../static/images/<?php echo $row['img']; ?>"/>
								 	</div>
								 </div>
						 		<div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="soluong-input">Tổng số lượng:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<input id="soluong-input" class="form-control" type="text" name="tongSL" value="<?php echo $row['tongSL'] ?>">
								 	</div>
								 </div>
								 <div class="row form-group">
									<div class="col col-md-2">
										<label class="form-control-label" for="moTa">Mô tả:</label> 
								 	</div>
								 	<div class="col-12 col-md-5">
								 		<textarea id="moTa" class="form-control" name="moTa"><?php echo $row['moTa']; ?></textarea>
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
	<div class="clearfix"></div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
 	<script type="text/javascript">
 		CKEDITOR.replace('moTa',{
 			width: '750px',
 			height: '650px',
	        resize_enabled : false
 		});
 		configCK();
 	</script>
 	
 	
 </body>
 </html>