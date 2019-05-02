<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
          * {
            box-sizing:border-box
          }
          h2 {
            text-align: center;
          }
          /* Slideshow container */
          .slideshow-container {
            max-width: 500px;
            position: relative;
            margin: auto;
          }
          /* Ẩn các slider */
          .mySlides {
              display: none;
          }
          /* Định dạng nội dung Caption */
          .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
          }

          /* Thêm hiệu ứng khi chuyển đổi các slide */
          .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 3s;
            animation-name: fade;
            animation-duration: 3s;
          }

          @-webkit-keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
          }

          @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
          }
        </style>
    </head>
    <body> 
      <div class="slideshow-container">
        <h2>Freetus.net hướng dẫn tạo slideShow đơn giản</h2>
        <div class="mySlides fade">
          <img src="https://freetuts.net/upload/tut_post/images/2017/07/30/964/slide-1.jpg" style="width:100%">
          <div class="text">Nội dung caption của slide đầu tiên!</div>
        </div>

        <div class="mySlides fade">
          <img src="https://freetuts.net/upload/tut_post/images/2017/07/30/964/slide-2.jpg" style="width:100%">
          <div class="text">Nội dung caption của slide thứ 2!</div>
        </div>

        <div class="mySlides fade">
          <img src="https://freetuts.net/upload/tut_post/images/2017/07/30/964/slide-3.jpg" style="width:100%">
          <div class="text">Nội dung caption của slide thứ 3!</div>
        </div>
      </div>
      <br>
    </body>
    <script>
      //khai báo biến slideIndex đại diện cho slide hiện tại
      var slideIndex;
      // KHai bào hàm hiển thị slide
      function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";  
          }
          slides[slideIndex].style.display = "block";  
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
</html>