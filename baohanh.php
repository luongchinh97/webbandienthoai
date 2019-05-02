<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Homeshop</title>
	<link href="static/css/style.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
	<style type="text/css">
		table, tr, th, td{
			border: 1px solid #6b9cff;
		}
		table{
			border-collapse: collapse;
		    background-color: rgb(255, 255, 204);
		}
		h1{
			font-size: 20px;
			margin: 10px;
		}
		p{
			font-size: 14px;
			font-family: Times New Roman;
		}
	</style>
</head>
<body>
	<?php 
		require_once "layouts/menutop.php"; 
		$baoHanh = $dao->getById("baohanh",1);
	?>
	<div id="main-bao-hanh">
		<div id="contents-bao-hanh">
			<?php echo $baoHanh['noiDung'];?>
		</div>
	</div>
	<?php require_once ("layouts/footer.php"); ?>
</body>
</html>