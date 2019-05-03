<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>quan ly don hang</title>
	<link type="text/css" rel="stylesheet" href="static/css/style.css"/>
	<link type="text/css" rel="stylesheet" href="static/css/a1.css"/>
  <script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php  require_once ("layouts/menutop.php");
      if (isset($_SESSION['user'])) {
      $conn=mysqli_connect('localhost','root','','smartshop');
      $sql="select * from `order`,cartitems,product where `order`.id=cartitems.idOrder and cartitems.idProduct=product.id and `order`.idUser='".$_SESSION['user']['id']."';";
      $result=$conn->query($sql);
      $html='';
      	$stt=1;
      if($result->num_rows>0){
      while ($row=$result->fetch_assoc()) {
      	$html.="
      	<table id='t01' height='200'>
      	<tr>
      		<th colspan='4'>Quản lý mặt hàng</th>
      	</tr>
        <tr>
          <th>STT</th>
          <th>Mã sản phẩm</th>
          <th>Tên sản phẩm</th> 
          <th>Ngày lập</th>
        </tr>
        <tbody>
        	<tr height='200' >
          <td>".$stt."</td>
          <td font-size='50'	>". $row['idProduct']."</td>
          <td>". $row['namePro']."</td>
          <td>". $row['ngayLap']."</td>
      </tr>
        </tbody>
      </table>";
      }
      }
      }
      $stt++;
      echo $html;
?>

<?php include("layouts/footer.php") ?>
</body>
</html>
