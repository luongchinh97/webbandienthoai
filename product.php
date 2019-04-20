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
			<a href="<?php echo $urlHomeShop; ?>">HOME</a>/TABLET
		</p>
		<h1><?php echo $hangSX; ?></h1>
		<p>
			<a href="#">&larr; Back to Home</a>
		</p>
	</div>
	<div id="main-smartphone">
		<?php require_once ("layouts/menuleft.php") ?>
		<div id="main-smartphone-contents">
			<div id="top-main">
				<div id="button-list"></div>
				<div id="button-grid"></div>
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
	
	$(document).ready(function(){
		var list = <?php echo json_encode($arrPro); ?>;
		var productSwapperHtml = '', productHtml = '', keyHang='Tất cả', keyTien = 'Tất cả';
        var classD = 'product-detail';
        var classB = 'product-box';
        var productSwapper = [], product = [];
        $.each(list, function(index, element){
        	productSwapperHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p ><a class = "add-to-cart" href="giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+element.gia+'</h5></div></div>';
       		productSwapper.push(element);
        });
        $('.product-swapper').html(productSwapperHtml);
        $('.id-product').hide();
        console.log(productSwapper);
    	  /*********************************
    	  * Lọc dữ liệu theo giá sản phẩm **
    	  * *******************************/
     	 $('.a').on("click",function(){
     	 keyHang = $(this).html();
     	 var productHtml = '';
     	 var product = [];
     	 if(keyHang === 'Tất cả' && keyTien ==='Tất cả'){
     		 $('.product-swapper').html(productSwapperHtml);
              console.log(productSwapper);
              $('.id-product').hide();
              $('.a').css("list-style-image", "url(static/images/checkbox.png)");
         	 	$(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
     	 }else if(keyHang !== 'Tất cả' && keyTien ==='Tất cả'){
     		 $.each(productSwapper, function(index, element){
             	 if (element.hangSX===keyHang) {
             		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="../giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+element.gia+'</h5></div></div>';
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
     	 }else if(keyHang === 'Tất cả' && keyTien !=='Tất cả'){
     		 if(keyTien==='Dưới 5 triệu'){
        		 var min = 0, max = 5000000;
        	 }else if(keyTien==='Từ 5 đến 10 triệu'){
        		 var min = 5000000, max = 10000000;
        	 }else if(keyTien==='Từ 10 đến 20 triệu'){
        		 var min = 10000000, max = 20000000;
        	 }else if(keyTien==='Trên 20 triệu'){
        		 var min = 20000000, max = 100000000000;
        	 }
     		 $.each(productSwapper, function(index, element){
         		 var gia = parseInt(element.gia);
         		 console.log(gia);
             	 if (gia<max && gia>min) {
             		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="../giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+element.gia+'</h5></div></div>';
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
     	 }else if(keyHang !=='Tất cẩ' && keyTien !== 'Tất cả'){
     		 if(keyTien==='Dưới 5 triệu'){
        		 var min = 0, max = 5000000;
        	 }else if(keyTien==='Từ 5 đến 10 triệu'){
        		 var min = 5000000, max = 10000000;
        	 }else if(keyTien==='Từ 10 đến 20 triệu'){
        		 var min = 10000000, max = 20000000;
        	 }else if(keyTien==='Trên 20 triệu'){
        		 var min = 20000000, max = 100000000000;
        	 }
     		 $.each(productSwapper, function(index, element){
         		 var gia = parseInt(element.gia);
         		 console.log(gia);
             	 if (gia<max && gia>min && element.hangSX===keyHang) {
             		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="../giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+element.gia+'</h5></div></div>';
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
      /*********************************
 	  * Lọc dữ liệu theo giá sản phẩm **
 	  * *******************************/
    $('.b').on("click",function(){
   	 keyTien = $(this).html();
   	 var productHtml = '';
   	 var product = [];
   	 if(keyHang === 'Tất cả' && keyTien ==='Tất cả'){
   		 $('.product-swapper').html(productSwapperHtml);
   		 	$('.id-product').hide();
            console.log(productSwapper);
            $('.b').css("list-style-image", "url(static/images/checkbox.png)");
       	 	$(this).css("list-style-image", "url(static/images/checkboxCheck.png)");
   	 }else if(keyHang !== 'Tất cả' && keyTien ==='Tất cả'){
   		 $.each(productSwapper, function(index, element){
           	 if (element.hangSX===keyHang) {
           		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+element.gia+'</h5></div></div>';
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
   	 }else if(keyHang === 'Tất cả' && keyTien !=='Tất cả'){
   		 if(keyTien==='Dưới 5 triệu'){
    		 var min = 0, max = 5000000;
    	 }else if(keyTien==='Từ 5 đến 10 triệu'){
    		 var min = 5000000, max = 10000000;
    	 }else if(keyTien==='Từ 10 đến 20 triệu'){
    		 var min = 10000000, max = 20000000;
    	 }else if(keyTien==='Trên 20 triệu'){
    		 var min = 20000000, max = 100000000000;
    	 }
   		 $.each(productSwapper, function(index, element){
       		 var gia = parseInt(element.gia);
       		 console.log(gia);
           	 if (gia<max && gia>min) {
           		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="../giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+element.gia+'</h5></div></div>';
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
   	 }else if(keyHang !=='Tất cẩ' && keyTien !== 'Tất cả'){
   		 if(keyTien==='Dưới 5 triệu'){
    		 var min = 0, max = 5000000;
    	 }else if(keyTien==='Từ 5 đến 10 triệu'){
    		 var min = 5000000, max = 10000000;
    	 }else if(keyTien==='Từ 10 đến 20 triệu'){
    		 var min = 10000000, max = 20000000;
    	 }else if(keyTien==='Trên 20 triệu'){
    		 var min = 20000000, max = 100000000000;
    	 }
   		 $.each(productSwapper, function(index, element){
       		 var gia = parseInt(element.gia);
       		 console.log(gia);
           	 if (gia<max && gia>min && element.hangSX===keyHang) {
           		 productHtml += '<div class="'+classB+'"><img src="static/images/'+element.img+'"/><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="giohang.php?idP='+element.id+'">Add to Cart</a></p><h5>'+element.gia+'</h5></div></div>';
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
    /************************************
     * Hiển thị danh sách sản phẩm theo *
     * 3 style khác nhau.				*
     * **********************************/
    $('#button-list').on('click',function(){
    	  //$('.product-swapper div').css({"height": "250px","width": "750px","text-align": "left","padding":"10px 30px","cursor":"default"});
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
    	//$('.product-swapper div').css({"height": "auto","width": "250px","text-align": "center","padding":"0px","cursor":"pointer"});
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