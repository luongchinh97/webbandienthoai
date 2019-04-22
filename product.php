<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Homeshop</title>
  <link href="static/css/style.css" rel="stylesheet" />
  <script type="text/javascript" charset="utf8" src="static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
  <!-- PHP --> 
	<?php 
    require_once  ("layouts/menutop.php");
    $hangSX = $_GET['hangSX'];
    $arrPro = $dao->getProductByHang($hangSX);
  ?>
  <!-- END PHP -->

	<div id="s-title">
		<p>
			<a href="<?php echo $urlHomeShop; ?>">HOME</a>/<?php echo "$hangSX"; ?>
		</p>
		<h1>Danh sách sản phẩm</h1>
		<p>
			<a href="<?php echo($urlHomeShop) ?>">&larr; Back to Home</a>
		</p>
	</div>
	<div id="main-smartphone">
		<?php require_once ("layouts/menuleft.php") ?>
		<div id="main-smartphone-contents">
			<div id="top-main">
				<div id="button-grid"></div>
				<div id="button-list"></div>
				<div id="button-style"></div>
			</div>
			<div id="contents">
				<div class="product-swapper">
				</div>
			</div>
		</div>
	</div>
	<?php require_once ("layouts/footer.php") ?>
	
	<script language="javascript">
    //Định dạng giá tiền
  	function num_format(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')
    }
    //load sản phẩm
  	$(document).ready(function(){
  		    var list = <?php echo json_encode($arrPro); ?>;
  		    var productSwapperHtml = '', keyRAM='Tất cả', keyTien = 'Tất cả';
          var classD = 'product-detail';
          var classB = 'product-box';
          $.each(list, function(index, element){
          	productSwapperHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p ><a class = "add-to-cart" href="giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+ num_format(element.gia)+' VNĐ</h5></div></div>';
          });
          $('.product-swapper').html(productSwapperHtml);
          $('.id-product').hide();
       	  $('.a').on("click",function(){
       	 keyRAM = $(this).html();
       	 var productHtml = '';
       	 var product = [];
       	 if(keyRAM === 'Tất cả' && keyTien ==='Tất cả'){
       		 $('.product-swapper').html(productSwapperHtml);
                $('.id-product').hide();
                $('.a').css("list-style-image", "url(static/images/checkbox.png)");
           	 	  $(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
       	 }else if(keyRAM !== 'Tất cả' && keyTien ==='Tất cả'){
       		 $.each(list, function(index, element){
               	 if (element.RAM===keyRAM) {
               		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="../giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+'  VNĐ</h5></div></div>';
               		 product.push(element);
                  }
            });
       		if(product.length==0){
           	$('.product-swapper').html('</br></br>Không có sản phẩm nào');
          }else{
           	$('.product-swapper').html(productHtml);
           	$('.id-product').hide();
          }
       		  $('.a').css("list-style-image", "url(static/images/checkbox.png)");
           	$(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
       	 }else if(keyRAM === 'Tất cả' && keyTien !== 'Tất cả'){
       		 if(keyTien==='Dưới 2 triệu'){
          		 var min = 0, max = 2000000;
          	 }else if(keyTien==='Từ 2 đến 5 triệu'){
          		 var min = 2000000, max = 5000000;
          	 }else if(keyTien==='Từ 5 đến 10 triệu'){
          		 var min = 5000000, max = 10000000;
          	 }else if(keyTien==='Từ 10 đến 20 triệu'){
          		 var min = 10000000, max = 20000000;
          	 }else if(keyTien==='Trên 20 triệu'){
                var min = 20000000, max = 100000000;
             }
       		 $.each(list, function(index, element){
           		 var gia = parseInt(element.gia);
               	 if (gia<max && gia>min) {
               		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="../giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
               		 product.push(element);
                    }
                });
           	 if(product.length==0){
           		 $('.product-swapper').html('</br></br>Không có sản phẩm nào');
           	 }else{
           	 	 $('.product-swapper').html(productHtml);
           	 	 $('.id-product').hide();
           	 }
           	 $('.a').css("list-style-image", "url(static/images/checkbox.png)");
           	 $(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
       	 }else if(keyRAM !=='Tất cả' && keyTien !== 'Tất cả'){
       		  if(keyTien==='Dưới 2 triệu'){
               var min = 0, max = 2000000;
             }else if(keyTien==='Từ 2 đến 5 triệu'){
               var min = 2000000, max = 5000000;
             }else if(keyTien==='Từ 5 đến 10 triệu'){
               var min = 5000000, max = 10000000;
             }else if(keyTien==='Từ 10 đến 20 triệu'){
               var min = 10000000, max = 20000000;
             }else if(keyTien==='Trên 20 triệu'){
                var min = 20000000, max = 100000000;
            }
       		  $.each(list, function(index, element){
           		  var gia = parseInt(element.gia);
                if (gia<max && gia>min && element.RAM === keyRAM) {
               		productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="../giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
               		 product.push(element);
                }
            });
           	if(product.length==0){
           		$('.product-swapper').html('</br></br>Không có sản phẩm nào');
           	}else{
           	  $('.product-swapper').html(productHtml);
           	 	$('.id-product').hide();
           	}
           	$('.a').css("list-style-image", "url(static/images/checkbox.png)");
           	$(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
       	 }
    	});
      $('.b').on("click",function(){
     	  keyTien = $(this).html();
     	  var productHtml = '';
     	  var product = [];
     	  if(keyRAM === 'Tất cả' && keyTien === 'Tất cả'){
     		  $('.product-swapper').html(productSwapperHtml);
     		 	$('.id-product').hide();
          $('.b').css("list-style-image", "url(static/images/checkbox.png)");
         	$(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
     	  }else if(keyRAM !== 'Tất cả' && keyTien === 'Tất cả'){
     		  $.each(list, function(index, element){
            if (element.RAM === keyRAM) {
                productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
             		product.push(element);
            }
          });
       		if(product.length==0){
           	$('.product-swapper').html('</br></br>Không có sản phẩm nào');
          }else{
           	$('.product-swapper').html(productHtml);
           	$('.id-product').hide();
          }
       		$('.b').css("list-style-image", "url(static/images/checkbox.png)");
          $(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
     	  }else if(keyRAM === 'Tất cả' && keyTien !== 'Tất cả'){
     		  if(keyTien==='Dưới 2 triệu'){
            var min = 0, max = 2000000;
          }else if(keyTien==='Từ 2 đến 5 triệu'){
            var min = 2000000, max = 5000000;
          }else if(keyTien==='Từ 5 đến 10 triệu'){
            var min = 5000000, max = 10000000;
          }else if(keyTien==='Từ 10 đến 20 triệu'){
            var min = 10000000, max = 20000000;
          }else if(keyTien==='Trên 20 triệu'){
            var min = 20000000, max = 100000000;
          }
     		 $.each(list, function(index, element){
         		 var gia = parseInt(element.gia);
             	 if (gia<max && gia>min) {
             		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="../giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
             		 product.push(element);
                  }
              });
         	 if(product.length==0){
         		 $('.product-swapper').html('</br></br>Không có sản phẩm nào');
         	 }else{
         	 	 $('.product-swapper').html(productHtml);
         	 	 $('.id-product').hide();
         	 }
         	 $('.b').css("list-style-image", "url(static/images/checkbox.png)");
         	 $(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
     	 }else if(keyRAM !=='Tất cả' && keyTien !== 'Tất cả'){
     		 if(keyTien==='Dưới 2 triệu'){
               var min = 0, max = 2000000;
             }else if(keyTien==='Từ 2 đến 5 triệu'){
               var min = 2000000, max = 5000000;
             }else if(keyTien==='Từ 5 đến 10 triệu'){
               var min = 5000000, max = 10000000;
             }else if(keyTien==='Từ 10 đến 20 triệu'){
               var min = 10000000, max = 20000000;
             }else if(keyTien==='Trên 20 triệu'){
                var min = 20000000, max = 100000000;
             }
     		 $.each(list, function(index, element){
         		 var gia = parseInt(element.gia);
             	 if (gia<max && gia>min && element.RAM===keyRAM) {
             		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
             		 product.push(element);
                  }
              });
         	 if(product.length==0){
         		 $('.product-swapper').html('</br></br>Không có sản phẩm nào');
         	 }else{
         	 	 $('.product-swapper').html(productHtml);
         	 	 $('.id-product').hide();
         	 }
         	 $('.b').css("list-style-image", "url(static/images/checkbox.png)");
         	 $(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
     	  }
  	  });
      //Hiển thị tùy chọn
      $('#button-list').on('click',function(){
      	  $('.product-swapper div').removeClass('product-box');
      	  $('.product-swapper div').removeClass('product-box-after-after');
      	  $('.product-swapper div').addClass('product-box-after');
      	  $('.product-swapper div div').removeClass('product-detail');
      	  $('.product-swapper div div').removeClass('product-detail-after-after');
      	  $('.product-swapper div div').removeClass('product-box-after');
      	  $('.product-swapper div div').addClass('product-detail-after');
      	  classD='product-detail-after';
      	  classB='product-box-after';
      });
      $('#button-grid').on('click',function(){
      	$('.product-swapper div').removeClass('product-box-after');
      	$('.product-swapper div').removeClass('product-box-after-after');
    	  	$('.product-swapper div').addClass('product-box');
      	$('.product-swapper div div').removeClass('product-detail-after');
      	$('.product-swapper div div').removeClass('product-detail-after-after');
      	$('.product-swapper div div').removeClass('product-box');
      	$('.product-swapper div div').addClass('product-detail');
      	classD='product-detail';
      	classB='product-box';
      });
      $('#button-style').on('click', function(){
      $('.product-swapper div').removeClass('product-box');
      $('.product-swapper div').removeClass('product-box-after');
    	  $('.product-swapper div').addClass('product-box-after-after');
    	  $('.product-swapper div div').removeClass('product-detail');
    	  $('.product-swapper div div').removeClass('product-detail-after');
    	  $('.product-swapper div div').removeClass('product-box-after-after');
    	  $('.product-swapper div div').addClass('product-detail-after-after');
    	  classD='product-detail-after-after';
    	  classB='product-box-after-after';
      });
  });
  		$('#checkTable').css("list-style-image","url(static/images/checkboxCheck.png)");
	</script>

</body>
</html>