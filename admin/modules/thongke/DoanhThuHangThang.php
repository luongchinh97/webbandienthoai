<?php include_once ("../../../controller/dao/rootdao.php")?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  <link rel="stylesheet" href="http://localhost:81/webbandienthoai/static/css/styleAdmin.css">
  <style>
      th{
          text-align: center;
      }
      #search11{
          float: right;
      }
      #contact-submit{
          cursor: pointer;
          width: 100%;
          border: none;
          background: #4CAF50;
          color: #FFF;
          margin: 0 0 5px;
          padding: 10px;
          font-size: 15px;
      }
      #contact-submit:hover {
          background: #43A047;
          -webkit-transition: background 0.3s ease-in-out;
          -moz-transition: background 0.3s ease-in-out;
          transition: background-color 0.3s ease-in-out;
      }
      #check_username{
          display: none;
      }
  </style>
</head>
<body>
    <?php include_once ("../../layouts/left-panel.php")?>
    <div id="right-panel" class="right-panel">
      <?php include_once ("../../layouts/Header.php")?>
      <div class="content">
          <div id="chart_div" class="animated fadeIn">
          </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        // Load the Visualization API and the piechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            // Create columns for the DataTable
            data.addColumn('string');
            data.addColumn('number', 'Devices');
            // Create Rows with data
            data.addRows([
                <?php
                $conn = connectDB();
                $query = "select month(ngayLap) as thang, sum(tongGia) as doanhThu from `order`  where year(ngayLap)=2019 group by thang";
                $result = mysqli_query($conn, $query);

                if(mysqli_num_rows($result)){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "['".$row['thang']."',".$row['doanhThu']."],";
                    }
                }
                ?>
            ]);
            //Create option for chart
            var options = {
                title: 'Biểu đồ thống kê doanh thu theo tháng',
                'width': 800,
                'height': 600,
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</body>
</html>
