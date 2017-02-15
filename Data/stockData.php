<?php

/**
 * Clase de manejo de funciones Sql de la clase Inventario
 */

class stockData 
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
        $resultExist = mysqli_query($conn, "select count(idStock) as total from tbstock where idProduct='" . $stock->getIdProduct() . "',idStore='" . $stock->getIdStore()."';");
        $total = mysqli_fetch_assoc($resultExist);
        if ($total['total'] >= 1) {// Actualiza y activa siya existe el correo
            $queryInsert = mysqli_query($conn, "update `tbstock` SET 'quantity`= '".$stock->getQuantity()."',`levelStock`='".$stock->getLevelStock()."' WHERE where idProduct='" . $stock->getIdProduct() . "',idStore='" . $stock->getIdStore()."';");
        } else {//Se realiza el insert en la base de datos si no existe
        $queryInsert = mysqli_query($conn, "insert into tbstock values (" .
                $id . ",'" .
                $stock->getIdProduct() . "','" .
                $stock->getIdStock() . "','" .
                $stock->getQuantity() . "','" .
                $stock->getLevelStock() ."');");
        }
        mysqli_close($conn);
        return $queryInsert;
        
    }//fin function insertstock    
    /**
     * Metodo para actualizar los datos de un proveedor
     * @param type $stock
     * @return type
     */
    function updateStock($stock) {        
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $queryUpdate = mysqli_query($conn, "update `tbstock` SET `quantity`='".
                $stock->getQuantity()."',`levelStock`='".$stock->getLevelStock().
                "' WHERE `idStock`='".$stock->getIdStock()."';");        
        return $queryUpdate;
    }    
    /**
     * Función que permite la obtención de todos los registros de 
     * provedores de la base de datos
     * @return array
     */
    function getAllStock() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result = mysqli_query($conn, "select * from tbstock where order by idStock asc");
        $array = array();
        while ($row = mysqli_fetch_array($result)) {
            $currentData = new stock($row['nameStock'], $row['emailStock'], $row['emailStock'],$row['telephoneStock']);
            $currentData->setIdStock($row['idStock']);
            $currentData->setActiveStock($row['idStock']==1);
            array_push($array, $currentData);
        }
        return $array;
    }//fin función getStock
    
}




