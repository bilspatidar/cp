
<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'omsaitiffin_sgoldcrm');
define('DB_USERNAME','bilspati_user');
define('DB_PASSWORD','bilspati_user');


$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$_POST['type'] = 'country_table';
  if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	$name    = $_POST['name_startsWith'];	
	$branchId = $_POST['AdminBranchId']; 
    $query = "SELECT *FROM product 
    INNER JOIN branch_product ON branch_product.product_id=product.pid
    where
    branch_product.status='Accepted' AND
    branch_product.branch_id='$branchId' AND UPPER(product.barcode) LIKE '%".strtoupper($name)."%' 
    AND NOT EXISTS(select product_id from invoices where invoices.product_id = product.pid)";
    // AND NOT EXISTS(select ProductId from sales_item where sales_item.ProductId = product.pid";

	$result = mysqli_query($con, $query);

	$data = array();
	if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_assoc($result)) {
	
	$metal_id = $row['metal_id'];
	$pid = $row['pid'];
	$Gcarat = $row['Gcarat'];

	if($metal_id==5)
	{
    $query1 = "SELECT metal_price FROM metal where metal_id='$metal_id'";
	  $result1 = mysqli_query($con, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$metal_price=$row1['metal_price'];
	}
	else
	{
	    $query1 = "SELECT $Gcarat FROM metal where metal_id='1'";
	  $result1 = mysqli_query($con, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	$metal_price = $row1[$Gcarat];
	    
	}
	
	    
	    $netWeight = number_format($row['product_weight']-$row['stone_weight'],2);
	    $metalValue = $netWeight*$metal_price;
	    $totalMakinmgCharges = $netWeight*$row['making_charge'];
	    $taxableAmount = $metalValue+$row['stone_price']+$row['other_costing']+$totalMakinmgCharges;
	
		$name = $row['barcode'].'|'.$row['pname'].'|'.$row['product_weight'].'|'.$row['stone_weight'].'|'.$row['stone_price'].'|'.$netWeight.'|'.$metalValue.'|'.$taxableAmount.'|'.$row['pid'].'|'.$metal_id.'|'.$row_num;
		array_push($data, $name);	
	}	
  }
  
	echo json_encode($data);
}





?>