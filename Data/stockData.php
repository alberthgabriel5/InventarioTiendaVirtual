<?php
include_once 'Data.php';
include_once '../Domain/stock.php';


/**
 * Clase de manejo de funciones Sql de la clase Inventario
 */

class stockData extends Data
{
    /*
     * Función que permite el registro de los proveedores en la base de datos
     * primero consulta el id para crear un consecutivo y luego registra el nuevo
     * @param type $stock
     * @return boolean
     */
    function insertStock($stock) {
        
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
//Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select * from tbstock order by idStock desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idStock'] + 1;
        } else {
            $id = 1;
        }        
    if ($this->stockExist($stock->getIdProduct, $stock->getIdStore())) {// Actualiza y activa siya existe el correo
            $queryInsert = mysqli_query($conn, "update `tbstock` SET 'quantity`= '".$stock->getQuantity()."',`levelStock`='".$stock->getLevelStock()."' WHERE where idProduct='" . $stock->getIdProduct() . "',idStore='" . $stock->getIdStore()."';");
        } else {//Se realiza el insert en la base de datos si no existe            
        $queryInsert = mysqli_query($conn, "insert into tbstock values (" .
                    $id . ",'" .
                    $stock->getIdProduct() . "','" .
                    $stock->getIdStock() . "','" .
                    $stock->getQuantity() . "','" .
                    $stock->getLevelStock() . "');");
        }
        mysqli_close($conn);
        return $queryInsert;
    }
    
    function stockExist($idProduct,$idStore){
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $resultExist = mysqli_query($conn, "select count(idStock) as total from tbstock where idProduct=" . $idProduct() . " and idStore=" . $idStore().";");
        $total = mysqli_fetch_assoc($resultExist);
        mysqli_close($conn);
        if ($total['total'] >= 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }

//fin function insertstock    
    /**
     * Metodo para actualizar los datos de un proveedor
     * @param type $stock
     * @return type
     */

    function updateStock($stock) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $queryUpdate = mysqli_query($conn, "update `tbstock` set `quantity`='" .
                $stock->getQuantity() . "',`levelStock`='" . $stock->getLevelStock() .
                "' where `idStock`='" . $stock->getIdStock() . "';");
        mysqli_close($conn);
        return $queryUpdate;
    }

    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */
    function getAllStock() {  
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbstock order by idStock asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {//idStock`, `idProduct`, `idStore`, `quantity`, `levelStock`
            $currentData = new stock($row['idProduct'], $row['idStore'], $row['quantity'],$row['levelStock']);
            $currentData->setIdStock($row['idStock']);
            array_push($array, $currentData);
        }
        mysqli_close($conn);
        return $array;
    }//fin función getStock
    
    function insertExist(){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $allproducts = mysqli_query($conn, "select * from tbproduct where active=1 order by idProduct asc");
        while ($product = mysqli_fetch_array($allproducts)) {     
            if($this->stockExist($product['idProduct'], $product['idStore'])!=TRUE){
                $stock=new stock($product['idProduct'], $product['idStore'], 0, 0);
                $this->insertStock($stock);
            }
        } 
        mysqli_close($conn);
        return TRUE;
    }
    
    function getNameProduct($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameProduct from tbproduct where idProduct=".$idProduct.";");
        $consult= mysqli_fetch_row($result);
        $name = $consult['nameProduct'];
        mysqli_close($conn);
        return $name;
    }
    function getNameStore($idProduct){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select nameStore from tbStore where idStore=".$idProduct.";");
        $consult= mysqli_fetch_row($result);
        $name = $consult['nameProduct'];
        mysqli_close($conn);
        return $name;
    }
    
    
}



