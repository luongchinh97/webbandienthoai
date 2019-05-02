
<div id="header">
	<?php 
		require_once ("menutop.php"); 
		$arrSlider = $dao->getAll("slider");
	?>
	<div id="slider">
		<div class="slideshow-container">
		<?php foreach ($arrSlider as $key => $value) {?>
        <div class="mySlides fade">
          	<img src="static/images/<?php echo $value['img']; ?>" style="width:100%">
          	<div class="text"><a href="quang-cao?id=<?php echo $value['id']; ?>">Xem chi tiết.</a></div>
        </div>
	    <?php } ?>
      	</div>
      	<br>

      	<div style="text-align:center" class="list-dot">
        	<span class="dot" onclick="currentSlide(0)"></span> 
        	<span class="dot" onclick="currentSlide(1)"></span> 
        	<span class="dot" onclick="currentSlide(2)"></span> 
      	</div>  
	</div>
	<script>
      //khai báo biến slideIndex đại diện cho slide hiện tại
      var slideIndex;
      // KHai bào hàm hiển thị slide
      function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }

          slides[slideIndex].style.display = "block";  
          dots[slideIndex].className += " active";
          //chuyển đến slide tiếp theo
          slideIndex++;
          //nếu đang ở slide cuối cùng thì chuyển về slide đầu
          if (slideIndex > slides.length - 1) {
            slideIndex = 0
          }    
          //tự động chuyển đổi slide sau 5s
          setTimeout(showSlides, 5000);
      }
      //mặc định hiển thị slide đầu tiên 
      showSlides(slideIndex = 0);


      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
    </script>
</div>
