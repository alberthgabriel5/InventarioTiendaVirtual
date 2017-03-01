<?php
include_once '../../Data/purchaseData.php';
class purchaseBusiness extends purchaseData
{
    private $purchaseData;
    
    public function purchaseBusiness() {
        $this->purchaseData = new purchaseData();
    }
    
    public function getAllPurchase(){
        return $this->purchaseData->getAllPurchase();
    }

    public function getAllPurchaseSupplier($idSupplier){
        return $this->purchaseData->getAllPurchaseSupplier($idSupplier);
    }

    public function insertPurchase($purchase) {
        return $this->purchaseData->insertPurchase($purchase);
    }
    public function getNameSupplier($idSupplier) {
        return $this->purchaseData->getNameSupplier($idSupplier);
    }

    public function getBrandProduct($idProduct) {
        return $this->purchaseData->getBrandProduct($idProduct);
    }

    public function getModelProduct($idProduct) {
        return $this->purchaseData->getModelProduct($idProduct);
    }

    public function getNameProduct($idProduct) {
        return $this->purchaseData->getNameProduct($idProduct);
    }
    public function getProducts(){
        return $this->purchaseData->getProducts();
    }

    public function getProductsTypeProduct($idTypeProduct){
        return $this->purchaseData->getProductsTypeProduct($idTypeProduct);
    }

    public function getTypeProduct() {
        return $this->purchaseData->getTypeProduct();
    }



}

