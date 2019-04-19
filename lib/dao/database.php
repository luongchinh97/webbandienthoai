<?php 
    require_once __DIR__."/rootdao.php";
/**
 * 
 */
class dao{
    private $conn;
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
    function update($table,$data){
        $conn=connectDB();
        $sql="UPDATE {$table} set";
        $str="";
        foreach ($data as $key => $value) {
            if(is_string($value)){
                $str=$key."='".$value."',";
            } else{
            $str=$key."=".$value.",";
                }
        }

        $str=substr($str,0,-1);
    }
    
}
 ?>