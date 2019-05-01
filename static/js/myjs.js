function cartItems(){
	$('#gio-hang div').mouseover(function() {
		$(this).css({"background-color" : "white"});
		$('#gio-hang img').attr('src','static/images/shopping-cart.png');
	});
	$('#gio-hang div').mouseout(function() {
		$(this).css({"background-color" : "#6b9cff"});
		$('#gio-hang img').attr('src','static/images/shopping-cart(1).png');
	});

}
function showListSearchProduct(data){
	$.ajax({
	    url: "http://localhost:81/webbandienthoai/controller/service/search-product.php",
	    method: "POST",
	    dataType: "html",
	    data: {search: data},
	    success: function(res) {
	    	$('.data-search').html(res);
	    },
    });
}
function num_format(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')
}
function loadProduct(list){
	var productSwapperHtml = '', keyRAM='Tất cả', keyTien = 'Tất cả';
    var classD = 'product-detail';
    var classB = 'product-box';
    $.each(list, function(index, element){
    	productSwapperHtml += '<div class="'+classB+'"><div class="product-img"><img src="static/images/'+element.img+'"/></div><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p ><a class = "add-to-cart" href="controller/service/giohang-add.php?id='+element.id+'">Add to Cart</a></p><h5>'+ num_format(element.gia)+' VNĐ</h5></div></div>';
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
		       		productHtml += '<div class="'+classB+'"><div class="product-img"><img src="static/images/'+element.img+'"/></div><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="controller/service/giohang-add.php?id='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+'  VNĐ</h5></div></div>';
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
		       		productHtml += '<div class="'+classB+'"><div class="product-img"><img src="static/images/'+element.img+'"/></div><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="controller/service/giohang-add.php?id='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
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
		       		productHtml += '<div class="'+classB+'"><div class="product-img"><img src="static/images/'+element.img+'"/></div><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="controller/service/giohang-add.php?id='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
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
	        		productHtml += '<div class="'+classB+'"><div class="product-img"><img src="static/images/'+element.img+'"/></div><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="controller/service/giohang-add.php?id='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
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
		     		productHtml += '<div class="'+classB+'"><div class="product-img"><img src="static/images/'+element.img+'"/></div><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="controller/service/giohang-add.php?id='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
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
	     		 	productHtml += '<div class="'+classB+'"><div class="product-img"><img src="static/images/'+element.img+'"/></div><div class="'+classD+'"><h4><a href = "chitiet.php?id='+element.id+'">'+element.namePro+'</a></h4><p class="id-product">'+element.id+'</p><p><a class = "add-to-cart" href="controller/service/giohang-add.php?id='+element.id+'">Add to Cart</a></p><h5>'+num_format(element.gia)+' VNĐ</h5></div></div>';
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
}
function checkAddress(){
	let province = $('#province').val();
	let district = $('#district').val();
	let ward = trim($('#ward').val());
	let address = $("#diaChi").val();
	if(province==0){
		alert("Chưa chọn Tỉnh/Thành phố.");
	}else if(district==0){
		alert("Chưa chọn Quận/Huyện.");
	}else if(ward==0){
		alert("Chưa chọn Xã/Phường");
	}else if(address==""){
		alert("Chưa nhập địa chỉ.");
	}
}
function configCK(){
	CKEDITOR.config.removeButtons =
           'Save,NewPage,DocProps,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,SelectAll,SpellChecker,Scayt,About';
}