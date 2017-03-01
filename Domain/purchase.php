<?php

/* 
 * clase que almacena el objeto compra a proveedor
 */
class purchase
{
    private $idPurchase;
    private $billNum;
    private $idProduct;
    private $idSupplier;
    private $datePurchase;
    private $descriptionPurchase;    
    private $totalPurchase;
    private $grossPrice;
    private $netPrice;
    private $canceled;
    private $recived;
    
    public function purchase($billNum, $idProduct, $idSupplier, $datePurchase, $descriptionPurchase, $totalPurchase, $grossPrice, $netPrice, $recived) {
        $this->billNum = $billNum;
        $this->idProduct = $idProduct;
        $this->idSupplier = $idSupplier;
        $this->datePurchase = $datePurchase;
        $this->descriptionPurchase = $descriptionPurchase;
        $this->totalPurchase = $totalPurchase;
        $this->grossPrice = $grossPrice;
        $this->netPrice = $netPrice;
        $this->recived = $recived;
    }
    public function getIdPurchase() {
        return $this->idPurchase;
    }

    public function getBillNum() {
        return $this->billNum;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function getIdSupplier() {
        return $this->idSupplier;
    }

    public function getDatePurchase() {
        return $this->datePurchase;
    }

    public function getDescriptionPurchase() {
        return $this->descriptionPurchase;
    }

    public function getTotalPurchase() {
        return $this->totalPurchase;
    }

    public function getGrossPrice() {
        return $this->grossPrice;
    }

    public function getNetPrice() {
        return $this->netPrice;
    }

    public function getCanceled() {
        return $this->canceled;
    }

    public function getRecived() {
        return $this->recived;
    }

    public function setIdPurchase($idPurchase) {
        $this->idPurchase = $idPurchase;
    }

    public function setBillNum($billNum) {
        $this->billNum = $billNum;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function setIdSupplier($idSupplier) {
        $this->idSupplier = $idSupplier;
    }

    public function setDatePurchase($datePurchase) {
        $this->datePurchase = $datePurchase;
    }

    public function setDescriptionPurchase($descriptionPurchase) {
        $this->descriptionPurchase = $descriptionPurchase;
    }

    public function setTotalPurchase($totalPurchase) {
        $this->totalPurchase = $totalPurchase;
    }

    public function setGrossPrice($grossPrice) {
        $this->grossPrice = $grossPrice;
    }

    public function setNetPrice($netPrice) {
        $this->netPrice = $netPrice;
    }

    public function setCanceled($canceled) {
        $this->canceled = $canceled;
    }

    public function setRecived($recived) {
        $this->recived = $recived;
    }


    
    
    
}
