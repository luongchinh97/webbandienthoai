
<div id="header">
	<?php 
		require_once ("menutop.php"); 
		$arrSlider = $dao->getAll("slider");
    $t = $dao->getById("time-slider",1);
    $time = (int)$t['time']*1000;
	?>
	<div id="slider">
		<div class="slideshow-container">
		<?php foreach ($arrSlider as $key => $value) {?>
        <div class="mySlides fade">
          	<img src="static/images/<?php echo $value['img']; ?>" style="width:100%">
          	<div class="text"><a href="<?php echo $value['url'] ?>">Xem chi tiết.</a></div>
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
      var slideIndex;
      function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          var timeSlider = <?php echo $time ?>;
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }

          slides[slideIndex].style.display = "block";  
          dots[slideIndex].className += " active";
          slideIndex++;
          if (slideIndex > slides.length - 1) {
            slideIndex = 0
          }    
          setTimeout(showSlides, timeSlider);
      }
      showSlides(slideIndex = 0);
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
    </script>
</div>
