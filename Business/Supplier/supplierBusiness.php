<?php
include_once '../../Data/supplierData.php';
class supplierBusiness
{
    private $supplierData;
    
    public function supplierBusiness() {
        $this->supplierData= new supplierData();
    }
    public function activeSupplier($supplier) {
        return $this->supplierData->activeSupplier($supplier);
    }

    public function desactiveSupplier($supplier) {
        return $this->supplierData->desactiveSupplier($supplier);
    }

    public function getAllSupplier(): array {
        return $this->supplierData->getAllSupplier();
    }

    public function getAllSupplierActive(): array {
        return $this->supplierData->getAllSupplierActive();
    }

    public function getAllSupplierDesactive(): array {
        return $this->supplierData->getAllSupplierDesactive();
    }

    public function insertSupplier($supplier) {
        return $this->supplierData->insertSupplier($supplier);
    }

    public function updateSupplier($supplier) {
        return $this->supplierData->updateSupplier($supplier);
    }

    
    
}
    