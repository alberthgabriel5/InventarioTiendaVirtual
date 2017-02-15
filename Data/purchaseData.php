<?php
include_once './Data.php';
include_once '../Domain/purchase.php';
/* 
 * Clase para transacciones SQL de las compras a provedor
 * 
 */
class purchaseData{
    /*
     * Función que permite el registro de las compras a los provedores en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     * @param type $purchase
     * @return boolean
     */
    function insertSupplier($purchase) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select idPurchases from tbpurchasingsupplier order by idPurchases desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idPurchases'] + 1;
        } else {
            $id = 1;
        }
        $queryInsert = mysqli_query($conn, "insert into tbsupplier values (" .
                $id . ",'" .
                $purchase->getIdSupplier() . "','" .
                $purchase->getDatePurchase() . "','" .
                $purchase->getDescriptionPurchase() . "','" .
                $purchase->getIdProduct() . "','" .
                $purchase->getTotalPurchase() ."',1);");        
        mysqli_close($conn);
        return $queryInsert;
        
    }//fin function insertsupplier
}

