<?php 
    

class dao{
    private $conn;
    /*Dùng chung*/
    //Thêm
    function insert($table, $data){
    $conn =mysqli_connect("localhost","root","","smartshop");
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
        $sql="DELETE FROM {$table} WHERE id=$id;";
        $conn->query($sql);
        $conn->close();
    }


    //lay danh sach hoa don 
     function getPayment(){
       $conn =mysqli_connect("localhost","root","","smartshop");
        $sql="SELECT * FROM `order` WHERE 1;";
        $rs=$conn->query($sql);
        $conn->close();
        return $rs;
    }
}
?>