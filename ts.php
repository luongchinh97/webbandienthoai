<?php 
	$product = array("id"=>10,"tenPro"=>"Xe dap");
	var_dump($product);
	$product['id'] = $product['id'] - 1;
	var_dump($product);
 ?>