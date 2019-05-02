 <?php
    require 'congcu.php';
    $dao = new dao();
    $chiTiet = $dao->getchiTietHD($_GET['id']);
 ?>
 <div class="modal-header">
                    <h1 style="text-align: center;color: red">Chi tiết hóa đơn</h1>
                <div class="modal-body modal-body-detail">
                    <!-- phone, dia chi, email -->
                    <div class="row customer-info">
                        <h3 style="text-align: center; width:100%;">THÔNG TIN KHÁCH HÀNG</h3>
                       <?php 
                            for($i =0; $i<count($chiTiet) ;$i++){
                                $html="<span style='font-weight: bold'>Tên khách hàng: "."<span style='font-weight:normal'>".$chiTiet[$i]['name']."</span></span>".
                                    "<span style='margin-left:100px; font-weight: bold'>Số điện thoại: "."<span style='font-weight:normal'>".$chiTiet[$i]['phone']."</span></span>".
                                    "<span style='margin-left: 200px; font-weight:bold'> Email: "."<span style='font-weight:normal'>".$chiTiet[$i]['email']."</span></span>".
                                    "<span style='margin-left:100px; font-weight: bold'>Địa chỉ: "."<span style='font-weight:normal'>".$chiTiet[$i]['diaChi']."</span></span>";

                                    echo $html;
                                break;
                            }
                       ?>
                    </div>
                    <hr>
                    <!-- ten hang, so luong, don gia , thanh tien, tong cong -->
                    <div class="row">
                        <h3 style="text-align: center; width:100%;">THÔNG TIN SẢN PHẨM</h3>
                        <table class="table" border="1px solid gray">
                            
                                <tr>
                                    <th width="">Sản phẩm</th>
                                    <th width="">Hãng sản xuất</th>
                                    <th width="">Năm sản xuất</th>
                                    <th width="">Số lượng</th>
                                    <th scope="">Giá thành</th>
                                    <th scope="">Tổng tiền</th>
                                </tr>
                          
                            <tbody class="product-info">
                                <tr>
                                   
                                    <th><?php echo $chiTiet[$i]['namePro'] ?></th>
                                    <td><?php echo $chiTiet[$i]['hangSX'] ?></td>
                                    <td><?php echo $chiTiet[$i]['namSX'] ?></td>
                                    <td> <?php echo $chiTiet[$i]['soLuong'] ?></td>
                                    <td> <?php echo $chiTiet[$i]['gia'] ?></td>
                                    <td><?php echo $chiTiet[$i]['tongGia'] ?></td>
                                </tr>
                                
                            </tbody>
                            
                        </table>
                      
                    </div>
                </div>