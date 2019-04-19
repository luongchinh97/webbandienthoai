<?php 
    require_once __DIR__."/rootdao.php";
/**
 * 
 */
class dao{
    private $conn;
    function insert($table, $data)
    {
    $conn = connectDB();
    $sql= "INSERT INTO {$table}";
    $colum=implode(',',array_keys($a));
    $sql.="(".$clolum.")";
    $value="";
    foreach ($data as $key => $v) {
        if(is_string($v)){
        $valu
        $value.="'".$v."',";
        } else{
            $value.=$v.",";
        }

    }
    $value=substr($value,0,-1);


}
}
 ?>