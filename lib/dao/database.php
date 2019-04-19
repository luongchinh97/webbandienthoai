<?php 
    require_once __DIR__."/rootdao.php";
/**
 * 
 */
class dao{
    private $conn;
    /*Dùng chung*/
    //Thêm
    function insert($table, $data){
    $conn = connectDB();
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
        $conn=connectDB();
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
        $conn=connectDB();
        $sql="DELETE FROM {$table} WHERE id=$id;";
        $conn->query($sql);
        $conn->close();
    }
    //Dùng riêng
    //Product
    function getHangProduct(){
        $conn=connectDB();
        $sql="SELECT Distinct hangSX FROM product;";
        
        $rs=$conn->query($sql);

        
        $conn->close();
        return $rs;
        
    }
    function getSPbyHangProduct($hangSX){
        $conn=connectDB();
        $sql="SELECT * FROM product WHERE hangSX='".$hangSX."';";
        $rs=$conn->query($sql);
        $conn->close();
        return $rs;
    }
    //Tìm sản phầm theo tên nhập vào
    function SearchbyName($data){
        $conn=connectDB();
        $sql="SELECT * FROM product WHERE namePro like'%".$data."%';";
        $rs=$conn->query($sql);
        $conn->close();
        return $rs;

    }
    //Order
    
}
    
 ?>