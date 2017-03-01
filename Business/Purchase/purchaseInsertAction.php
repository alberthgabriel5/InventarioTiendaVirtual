<?php
$purchase=$_POST['insert'];
$idProduct =$_POST['cbTypeProduct'];
$quantity= $_POST['numQuantity'];
$porcent= $_POST['numPorcent'];
$pay= $_POST['pay'];



 //echo '<img src="http://www.tipos.co/wp-content/uploads/2015/01/Existen-m%C3%BAltiples-f%C3%B3rmulas-de-programaci%C3%B3n.jpg">';

if ($purchase) {    
	ini_set("soap.wsdl_cache_enabled", "0");
	
	$client = new SoapClient("http://localhost/SupplierWebService/scramble.wsdl");
	$purchaseBusiness = new purchaseBusiness();
	$descriptionPurchase= $purchaseBusiness->getNameTypeProduct($idProductStock);
        $quantityPurchase= $level-$quantity;
		
	$resulte = $client->purchase($idProduct,$quantity,$porcent,$pay);
        
        header('location: ../../Presentation/Purchase/purchaseCreateInterface.php?'.$resulte.'');
           
        
        
}else{
       header('location: ../../Presentation/Stock/stockUpdateInterface.php?error'); 
    }
    