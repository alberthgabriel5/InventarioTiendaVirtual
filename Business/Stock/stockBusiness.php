<?php
include_once '../../Data/stockData.php';
class stockBusiness 
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


    
    
    
}


