<?php
    $conn=mysqli_connect("localhost","root","","smartshop") or die ("loi ket noi sql");
    mysqli_set_charset($conn,"utf8");
    $id = $_GET['id'];
    $result = $conn->query("select * from `order` where id = " . $id);
    $rs = $result->fetch_assoc();
?>
<div class="col-lg-6">
    <div style="width: 600px;margin-left: 200px" class="card">
        <div class="card-header"><center><strong>Sửa hóa đơn</strong></center></div>
        <div class="card-body card-block">
            <form action="xlsua.php" method="post" >
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group"><label for="company" class=" form-control-label">ID</label><input readonly value="<?php echo $id ;?>"  name="username" type="text" id="username_add" placeholder="Nhập id" class="form-control">
                </div>
                <div class="form-group"><label for="vat" class=" form-control-label">Địa chỉ</label><input  value="<?php echo $rs['diaChi'] ;?>"  name="diaChi" type="text" id="vat" placeholder="Nhập địa chỉ " class="form-control"></div>
                <div class="form-group"><label for="street" class=" form-control-label">Ngày lập</label><input readonly value="<?php echo $rs['ngayLap'] ;?>"  name="ngayLap" type="text" id="street" placeholder="Ngày lập " class="form-control"></div>
                <div class="form-group"><label for="street" class=" form-control-label">Tổng giá</label><input readonly value="<?php echo $rs['tongGia'] ;?>"  name="tongGia" type="text" id="street" placeholder="Nhập tổng giá" class="form-control"></div>
                <div class="form-group"><label for="country" class=" form-control-label">Số lượng</label><input readonly value="<?php echo $rs['soLuong'] ;?>"  name="soLuong" type="text" id="country" placeholder="Số lượng" class="form-control"></div>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
            </form>
        </div>
    </div>
</div>
