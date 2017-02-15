<?php
include_once '../../Data/purchaseData.php';
class purchaseBusiness 
{
    private $purchaseData;
    
    public function purchaseBusiness() {
        $this->purchaseData = new purchaseData();
    }
    
    public function getAllPurchase(): array {
        return $this->purchaseData->getAllPurchase();
    }

    public function getAllPurchaseSupplier($idSupplier): array {
        return $this->purchaseData->getAllPurchaseSupplier($idSupplier);
    }

    public function insertPurchase($purchase) {
        return $this->purchaseData->insertPurchase($purchase);
    }

}

