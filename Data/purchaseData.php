<?php
include_once 'Data.php';
include_once '../../Domain/purchase.php';
/* 
 * Clase para transacciones SQL de las compras a provedor
 * 
 */
class purchaseData extends Data
{
    
   /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */
    function getAllPurchase() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplier order by idPurchases asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase($row['idSupplier'], $row['datePurchases'], $row['descriptionPurchases'],$row['product'],$row['totalPurchases']);
            $currentData->setIdPurchase($row['idPurchases']);           
            array_push($array, $currentData);
             //echo ''.$currentData->getIdSupplier().' '.$currentData->getIdProduct().'<br>';
        }
        //echo 'obtuvo los valores';
        //exit;
        return $array;
    }//fin función getSupplier
    /**
     * Función que permite la obtención de todos los registros de 
     * un provedor de la base de datos
     * Historico
     * @return array Historico
     */
    function getAllPurchaseSupplier($idSupplier) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplier where idSupplier=".$idSupplier." order by idPurchases asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase($row['idSupplier'], $row['datePurchases'], $row['descriptionPurchases'],$row['product'],$row['totalPurchases']);
            $currentData->setIdSupplier($row['idPurchases']);            
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getSupplier    
    function getNameSupplier($idSupplier){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameSupplier from tbsupplier where idSupplier=".$idSupplier.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['nameSupplier'];
        mysqli_close($conn);
        return $name;
    }
    function getNameProduct($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameProduct from tbproduct where idProduct=".$idProduct.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['nameProduct'];
        mysqli_close($conn);
        return $name;
    }
    function getBrandProduct($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select brand from tbproduct where idProduct=".$idProduct.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['brand'];
        mysqli_close($conn);
        return $name;
    }
    function getModelProduct($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select model from tbproduct where idProduct=".$idProduct.";");
        $consult= mysqli_fetch_assoc($result);
        $name = $consult['model'];
        mysqli_close($conn);
        return $name;
    }
}

