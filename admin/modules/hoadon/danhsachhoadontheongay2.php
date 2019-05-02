<?php 
include("congcu.php");
function show(){
    $dao= new dao;
    $html="<thead><tr><th>STT</th><th>IdUser</th><th>Địa chỉ</th><th>Ngày lập</th><th>Tổng giá</th><th>Số lượng</th><th  colspan='3'>Tùy chọn</th></tr></thead>";
                $key=$_POST['key']; 
 				$time = strtotime($key);
 				$newformat = date('Y-m-d',$time);
                    $rs=$dao->searchByNgay($newformat);
                     
                 while($row = $rs->fetch_assoc()){
                        $html.="<tr><td>".$row['id'].
                        "</td><td>".$row['idUser'].
                        "</td><td>".$row['diaChi'].
                        "</td><td>".$row['ngayLap'].
                        "</td><td>".$row['tongGia'].
                        "</td><td>".$row['soLuong'].
                        "</td><td><a href='chitiet.php?id=".
                        $row['id']."'>Chi tiết</a></td><td><a href='sua.php?id=".$row['id'].
                        "'>Sửa</td><td><a href='xoa.php?id=".$row['id'].
                        "'>Xóa</td></tr>";
                    }
    return $html;
    }
 ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Danh sách hóa đơn</strong>
                <div>
                <form method="POST" action="index2.php">
                    <label>Tìm kiếm theo ngày :</label> <input type="text" name="key" placeholder="Nhập ngày cần tìm ">
                    <input type="submit" name="submit" value="Tìm">
                </form>
            </div>
            </div>
            <div style="font-size: 14px" class="card-body">
                <table id="bootstrap-data-table" class="table_user_list table table-striped table-bordered">
                </table>
            </div>
        </div>
    </div>
</div>
