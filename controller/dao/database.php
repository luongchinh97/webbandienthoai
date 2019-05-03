<?php 
    require_once ("rootdao.php");
/**
 * 
 */
class dao{
    private $conn;

    /*Public Function*/

    function base_url(){
        return "http://localhost:81/webbandienthoai/";
    }

    function insert($table, $data) {
        $conn = connectDB();
        $sql = "INSERT INTO {$table}";
        $col = implode(',', array_keys($data));
        $sql.= "(".$col.")";
        $value = "";
        foreach($data as $key => $v) {
            if (is_string($v)) {
                $value.= "'".$v."',";
            } else {
                $value.= $v.",";
            }
        }
        $value = substr($value, 0, -1);
        $value = "(".$value.");";
        $sql.= " VALUES ".$value;
        $conn->query($sql);
        $conn->close();
    }

    function update($table, $data, $id) {
        $conn = connectDB();
        $sql = "UPDATE `{$table}` set ";
        $str = "";
        foreach($data as $key => $value) {
            if (is_string($value)) {
                $str.= $key."='".$value."',";
            } else {
                $str.= $key."=".$value.",";
            }
        }
        $str = substr($str, 0, -1);
        $sql.= $str." WHERE id=".$id.";";
        $conn->query($sql);
        $conn->close();
    }

    function delete($table, $id) {
        $conn = connectDB();
        $sql = "DELETE FROM `{$table}` WHERE id=".$id.";";
        $conn->query($sql);
        $conn->close();
    }

    function getById($table, $id){
        $conn = connectDB();
        $sql = "SELECT * FROM `{$table}` WHERE id=".$id.";";
        $rs=$conn->query($sql);
        if($rs->num_rows > 0){
            $row = $rs->fetch_assoc();
            return $row;
        }
        
    }

    function getAll($table){
        $conn = connectDB();
        $sql = "SELECT * FROM {$table};";
        $arr = array();
        $rs=$conn->query($sql);
        if($rs->num_rows > 0){
            while($row =$rs->fetch_assoc()){
                array_push($arr,$row);
            }
        }
        $conn->close();
        return $arr;
    }
    /* Product Function */

    function getHangProduct(){
        //lấy ra hãng sản xuất của các sản phẩm.
        $conn=connectDB();
        $sql="SELECT Distinct hangSX FROM product;";
        $rs=$conn->query($sql);
        $arr = array();
        if($rs->num_rows > 0){
            while($row = $rs->fetch_assoc()){
                array_push($arr, $row);
            }
        }
        $conn->close();
        return $arr;
    }

    function getProductByHang($hangSX){
        //lấy ra sản phẩm theo Hãng SX.
        $conn=connectDB();
        $sql="SELECT * FROM product WHERE hangSX='".$hangSX."';";
        $rs=$conn->query($sql);
        $arr = array();
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($arr, $row);
            }
        }
        $conn->close();
        return $arr;
    }

    function searchProductByName($data, $limit){
        //tìm kiếm sản phẩm theo tên.
        $conn=connectDB();
        $sql="SELECT * FROM product WHERE namePro like'%".$data."%';";
        if($limit>0){
            $sql = "SELECT * FROM product WHERE namePro LIKE '%".$data."%' LIMIT ".$limit.";";
        }
        $rs=$conn->query($sql);
        $arr = array();
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($arr, $row);
            }
        }
        $conn->close();
        return $arr;

    }

    function getProductMoi(){
        //lấy ra sản phẩm mới nhất theo năm sản xuất và ngày nhập
        $conn = connectDB();
        $sql = "SELECT * FROM product Order By namSX DESC LIMIT 8;";
        $arr = array();
        $rs = $conn->query($sql);
        if($rs->num_rows > 0){
            while($row = $rs->fetch_assoc()){
                array_push($arr,$row);
            }
        }
        $conn->close();
        return $arr;
    }

    function getProductBanChay($limit){
        $conn = connectDB();
        $arr = array();
        $sql = "SELECT product.*, SUM(cartitems.soLuong) AS tong FROM product INNER JOIN cartitems ON product.id = cartitems.idProduct GROUP BY cartitems.idProduct ORDER BY tong DESC;";
        if($limit!=0){
            $sql = "SELECT product.*, SUM(cartitems.soLuong) AS tong FROM product INNER JOIN cartitems ON product.id = cartitems.idProduct GROUP BY cartitems.idProduct ORDER BY tong DESC LIMIT {$limit};";
        }
        $rs= $conn->query($sql);
        if($rs->num_rows > 0){
            while($row = $rs->fetch_assoc()){
                array_push($arr,$row);
            }
        }
        $conn->close();
        return $arr;
    }

    /* Get Quan/Huyen/Tinh*/
    function getDistrict($id){
        $conn = connectDB();
        $arr = array();
        $sql = "SELECT * FROM district WHERE provinceid = '".$id."';";
        $rs = $conn->query($sql);
        if($rs->num_rows>0){
            while($row = $rs->fetch_assoc()){
                array_push($arr, $row);
            }
        }
        $conn->close();
        return $arr;
    }

    function getWard($id){
        $conn= connectDB();
        $arr = array();
        $sql = "SELECT * FROM ward WHERE districtid = '".$id."';";
        $rs=$conn->query($sql);
        if($rs->num_rows>0){
            while ($row=$rs->fetch_assoc()) {
                array_push($arr, $row);
            }
        }
        $conn->close();
        return $arr;
    }
    /* Order Function */
    function insertOrder($order){
        $conn = connectDB();
        $sql = "INSERT INTO `order` (idUser, ngayLap, tongGia, soLuong, maTinh, maQH, maPX, diaChi) VALUES (".$order['idUser'].",'".$order['ngayLap']."','".$order['tongGia']."', ".$order['soLuong'].", '".$order['maTinh']."','".$order['maQH']."','".$order['maPX']."','".$order['diaChi']."');";
        $rs = $conn->query($sql);
        $id = $conn->insert_id;
        return $id;
        $conn->close();
    }
    function getAddress($orderID){
        $conn = connectDB();
        $sql = "SELECT province.name as tinh, district.name as QH, ward.name as XP, `order`.diaChi as diaChi FROM `order`, district, province, ward WHERE id = $orderID AND maTinh = province.provinceid AND maQH = district.districtid AND maPX = ward.wardid;";
        $rs = $conn->query($sql);
        if($rs->num_rows>0){
            $row = $rs->fetch_assoc();
        }
        $address = $row['diaChi'].", ".$row['XP'].", ".$row['QH'].", ".$row['tinh'].".";
        return $address;

    }
    /* CartItems Functon */
    function insertItems($item){
        $conn = connectDB();
        $sql = "INSERT INTO cartitems (idOrder, idProduct, soLuong) VALUES ('".$item->idOrder."','".$item->idProduct."','".$item->soLuong."');";
        $rs = $conn->query($sql);
        $conn->close();
    }
    function getItemByOrderID($orderID){
        $conn = connectDB();
        $sql = "SELECT * FROM cartitems WHERE idOrder = $orderID;";
        $arr =array();
        $rs = $conn->query($sql);
        if($rs->num_rows > 0){
            while($row=$rs->fetch_assoc()){
                array_push($arr,$row);
            }
        }
        return $arr;
    }
    /* User Function */
    function checkLogin($username,$password){
        $conn = connectDB();
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password';";
        $rs = $conn->query($sql);
        if($rs->num_rows >0){
            $row = $rs->fetch_assoc();
            return $row;
        }else{
            return "";
        }
    }
    function checkUser($username){
        $conn = connectDB();
        $sql = "SELECT * FROM user WHERE username='$username';";
        $rs = $conn->query($sql);
        if($rs->num_rows >0){
            $row = $rs->fetch_assoc();
            return $row;
        }
    }

}
 ?>