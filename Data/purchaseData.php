<?php
include_once 'Data.php';
include_once '../../Domain/purchase.php';
include_once '../../Domain/typeProduct.php';
include_once '../../Domain/Product.php';
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
        $result = mysqli_query($conn, "select * from tbpurchasingsupplier order by idPurchase asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase($row['billNum'],$row['idProduct'],
                    $row['idSupplier'], $row['datePurchases'], 
                    $row['descriptionPurchases'],$row['totalPurchases'],
                    $row['grossPrice'],$row['netPrice'],$row['received']);
            $currentData->setIdPurchase($row['idPurchase']);           
            array_push($array, $currentData);
             //echo ''.$currentData->getIdSupplier().' '.$currentData->getIdProduct().'<br>';
        }
        //echo 'obtuvo los valores';
        //exit;
        mysqli_close($conn);
        return $array;
    }//fin función getSupplier
   /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */
    function getAllPurchaseToPay() {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbpurchasingsupplierpayable order by idPurchase asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new purchase($row['billNum'],$row['idProduct'],
                    $row['idSupplier'], $row['datePurchases'], 
                    $row['descriptionPurchases'],$row['totalPurchases'],
                    $row['grossPrice'],$row['netPrice'],$row['received']);
            $currentData->setIdPurchase($row['idPurchase']);           
            array_push($array, $currentData);
             //echo ''.$currentData->getIdSupplier().' '.$currentData->getIdProduct().'<br>';
        }
        //echo 'obtuvo los valores';
        //exit;
        mysqli_close($conn);
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
    /***
     * Función que permite la obtención de todos los registro de 
     * producto de la base de datos
     */
    function getTypeProduct(){     
        
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn,"select * from tbtypeproduct where active = 1 order by idtypeproduct asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new TypeProduct($row['nameTypeProduct']);
            $currentData->setIdTypeProduct($row['idTypeProduct']);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getTypeProducts    
    /*     * *
     * Función que permite la obtención de todos los registro de 
     * producto de la base de datos
     */
    function getProducts() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbproduct` where active != 0 order by brand asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], "", $row['description'], $row['nameProduct'], $row['characteristics'], $row['serie']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            $colors = "";
            $resultColors = mysqli_query($conn, "select * from tbproductcolor where idproduct = " . $idProduct);
            while ($rowColor = mysqli_fetch_array($resultColors)) {
                $colors .= $rowColor['color'] . ';';
            }
            $currentData->setColor($colors);

            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }    
   
    function getProductsTypeProduct($idTypeProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select  * from `tbproduct` where active != 0 and idtypeproduct = ".$idTypeProduct." order by brand asc;");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new Product($row['brand'], $row['model'], $row['price'], "", $row['description'], $row['nameProduct'], $row['characteristics'], $row['serie']);
            $currentData->setIdProduct($row['idProduct']);

            $idProduct = $row['idProduct'];
            $resultImage = mysqli_query($conn, "select * from tbimageproduct where idProduct = " . $idProduct);
            while ($rowImage = mysqli_fetch_array($resultImage)) {
                $currentData->setPathImages($rowImage['pathImage']);
            }
            $colors = "";
            $resultColors = mysqli_query($conn, "select * from tbproductcolor where idproduct = " . $idProduct);
            while ($rowColor = mysqli_fetch_array($resultColors)) {
                $colors .= $rowColor['color'] . ';';
            }
            $currentData->setColor($colors);

            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }
    
}

