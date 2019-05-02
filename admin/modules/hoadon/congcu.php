<?php 
class dao{
    private $conn;
    /*Dùng chung*/
    //Thêm
    function insert($table, $data){
    $conn =mysqli_connect("localhost","root","","smartshop");
    mysqli_set_charset($conn,"utf8");
    $sql= "INSERT INTO {$table}";
    $colum=implode(',',array_keys($data));
    $sql.="(".$colum.")";
    $value="";
    foreach ($data as $key => $v) {
        if(is_string($v)){

        $value.="'".$v."',";
        } else{
            $value.=$v.",";
            }
    }
    $value=substr($value,0,-1);
    $value="(".$value.");";
    $sql.="VALUES ".$value;
    $conn->query($sql);
    $conn->close();
    }
    //Sửa 
    function update($table,$data,$id){
       $conn =mysqli_connect("localhost","root","","smartshop");
       mysqli_set_charset($conn,"utf8");
        $sql="UPDATE {$table} set ";
        $str="";
        foreach ($data as $key => $value) {
            if(is_string($value)){
                $str.=$key."='".$value."',";
            } else{
            $str.=$key."=".$value.",";
                }
        }

        $str=substr($str,0,-1);
        $sql.=$str." WHERE id=".$id.";";
        $conn->query($sql);
        $conn->close();
        
    }

    //Xoá
    function delete($table,$id){
       $conn =mysqli_connect("localhost","root","","smartshop");
       mysqli_set_charset($conn,"utf8");
        $sql="DELETE FROM {$table} WHERE id=$id;";
        $conn->query($sql);
        $conn->close();
    }


    //lay danh sach hoa don 
     function getPayment(){
       $conn =mysqli_connect("localhost","root","","smartshop");
       mysqli_set_charset($conn,"utf8");
        $sql="select * from `order`";

        // $rs=$conn->query($sql);
        $rs = mysqli_query($conn, $sql);
        // $conn->close();
       
        // return $rs;
        mysqli_close($conn);
        return $rs;
    }

    function SearchByidUser($data){
        $conn = mysqli_connect("localhost","root","","smartshop");
        mysqli_set_charset($conn,"utf8");
        $sql = "SELECT * FROM `order` WHERE idUser like'%".$data."%';";
        $rs=$conn->query($sql);
        $conn->close();
        return $rs;
    }
    // tim ngay lap hoa don 
     function getNgaylap(){
        $conn= mysqli_connect("localhost","root","","smartshop");
        $sql="SELECT DISTINCT ngayLap FROM `order`";
        $rs=$conn->query($sql);
        $conn->close();
        return $rs;
     }
     function getChiTietHD($id){
        $sql = "SELECT user.name, user.phone,user.email, product.namePro, product.hangSX,product.gia,product.namSX , `order`.tongGia,`order`.diaChi, cartitems.soLuong FROM `order`, user, product, cartitems where `order`.idUser = user.id AND `order`.id = cartitems.idOrder AND cartitems.idProduct = product.id and `order`.id=".$id;
        $conn =mysqli_connect("localhost","root","","smartshop");
        mysqli_set_charset($conn,"utf8");
        $rs = mysqli_query($conn, $sql);
        $arr=array();
        while($row=mysqli_fetch_assoc($rs)){
                        array_push($arr, $row);

                    }
        mysqli_close($conn);
        return $arr;
     }


     function searchByNgay($data){
        $conn = mysqli_connect("localhost","root","","smartshop");
        mysqli_set_charset($conn,"utf8");
        $sql = "SELECT * FROM `order` WHERE ngayLap='".$data."'";
        $rs=$conn->query($sql);
        $conn->close();
        return $rs;
    }
}
?>