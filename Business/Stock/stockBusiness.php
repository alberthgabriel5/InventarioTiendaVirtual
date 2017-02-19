<?php
include_once '../../Data/stockData.php';
class stockBusiness extends stockData
{
    private $stockData;
    
    public function stockBusiness() {
        $this->stockData = new stockData();
    }
    public function getAllStock(): array {
        return $this->stockData->getAllStock();
    }
    public function insertStock($stock) {
        return $this->stockData->insertStock($stock);
    }

    public function updateStock($stock) {
        return $this->stockData->updateStock($stock);
    }
    
    public function insertExist() {
       return $this->stockData->insertExist();
    }

    public function stockExist($idProduct, $idStore) {
        return $this->stockData->stockExist($idProduct, $idStore);
    }
    public function getNameProduct($idProduct) {
        return $this->stockData->getNameProduct($idProduct);
    }

    public function getNameStore($idProduct) {
        return $this->stockData->getNameStore($idProduct);
    }




    
    
    
}

