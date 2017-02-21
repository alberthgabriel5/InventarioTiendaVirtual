<?php
include_once '../../Domain/stock.php';
include_once '../../Business/Stock/stockBusiness.php';
$update =$_POST['btnUpdate'];
$purchase =$_POST['btnPurchase'];
$idStock = $_POST['idStock'];
$idProductStock = $_POST['idProductStock'];
$quantity = $_POST['txtQuantity'];
$level= $_POST['txtLevel'];


if($update){
$stock= new stock(0, 1, $quantity, $level);
$stock->setIdStock($idStock);
$stockBusiness = new stockBusiness();
if($stockBusiness->updateStock($stock)){
    header('location: ../../Presentation/Stock/stockUpdateInterface.php?update');
} else {
    header('location: ../../Presentation/Stock/stockUpdateInterface.php?errorSQL');
}
}else if ($purchase) {
    if($level>$quantity){
    // turn off the WSDL cache
	ini_set("soap.wsdl_cache_enabled", "0");
	
	$client = new SoapClient("http://localhost/SupplierWebService/scramble.wsdl");
	$stockBusiness = new stockBusiness();
	$descriptionPurchase= $stockBusiness->getNameTypeProduct($idProductStock);
        $quantityPurchase= $level-$quantity;
		
	$resulte = $client->purchase($descriptionPurchase,$idProductStock,$quantityPurchase);
	
        if($resulte=='sucess'){
            $stock= new stock(0, 1, $quantity, $level);
            $stock->setIdStock($idStock);
            $stockBusiness = new stockBusiness();
            if($stockBusiness->updateStock($stock)) {
                header('location: ../../Presentation/Stock/stockUpdateInterface.php?purchase');
            }
        }else if($resulte=='errorSQL'){
            header('location: ../../Presentation/Stock/stockUpdateInterface.php?errorSQL2');
        } else {
            echo ''.$resulte;
            header('location: ../../Presentation/Stock/stockUpdateInterface.php?error');
        }
    }else{
       header('location: ../../Presentation/Stock/stockUpdateInterface.php?error'); 
    }
} else {
    
header('location: ../../Presentation/Stock/stockUpdateInterface.php?error');
}
