<?php
include_once '../../Domain/stock.php';
include_once '../../Business/Stock/stockBusiness.php';

$idStock = $_POST['idStock'];
$quantity = $_POST['txtQuantity'];
$level= $_POST['txtLevel'];
$stock= new stock(0, 1, $quantity, $level);
$stock->setIdStock($idStock);
$stockBusiness = new stockBusiness();
if($stockBusiness->updateStock($stock)){
    header('location: ../../Presentation/Stock/stockUpdateInterface.php?update');
} else {
    header('location: ../../Presentation/Stock/stockUpdateInterface.php?errorSQL');
}

