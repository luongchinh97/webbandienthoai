<?php 
include("database.php");
$dao= new dao;
$id=1;
$hang = "iphone";
$rs=$dao->SearchbyName($hang);
while($row=$rs->fetch_assoc())
{
	echo $row['id']. "<br/>";
	echo $row['namePro'];
}
 ?>