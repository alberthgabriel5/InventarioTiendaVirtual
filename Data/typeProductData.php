<?php
include_once 'Data.php';
include_once '../../Domain/typeProduct.php';
/**
 * Descripcion de TypeProductData
 * Clase donde se realizan las conexiones con la base de datos, 
 * para llevar a cabo el CRUD que corresponde a tipo de productos 
 * @author Alberth Calderon Alvarado
 */
class TypeProductData extends Data {
    
    
    /***
     * Función que permite el registro de los tipos de productos en la base de datos
     * primeo consulta el id para crear un consecutivo y luego registra el nuevo
     */
    function insertTypeProduct($typeProduct) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se consulta por el ultimo id registrado para generar el consecutivo
        $resultID = mysqli_query($conn, "select  * from tbtypeproduct order by idtypeproduct desc limit 1");
        $row = mysqli_fetch_array($resultID);
        if (sizeof($row) >= 1) {
            $id = $row['idTypeProduct'] + 1;
        } else {
            $id = 1;
        }

        //Se realiza el insert en la base de datos
        $queryInsert = mysqli_query($conn, "insert into tbtypeproduct values (" 
                . $id . ",'" . $typeProduct->getNameTypeProduct()."',1)");
        mysqli_close($conn);

        if ($queryInsert) {
            return true;
        } else {
            return false;
        }
    }//fin function insertProduct
    /**
     * metodo para consultar si existe el dato ya registrado en la base de datos
     * @param type $nameTypeProduct nombre del nuevo tipo de producto
     * @return type regresa
     */

    function isExist($nameTypeProduct) {
        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $result =mysqli_query($conn, "select count(nameTypeProduct) as total from tbtypeproduct where nameTypeProduct='" . $nameTypeProduct."';");
        $total = mysqli_fetch_assoc($result);
        if ($total['total'] >= 1) {
            $exist = 'Existe';
        } else {
            $exist = 'NoExiste';
        }
        return $exist;
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
    /*
     * Función que permite la actualización de un tipo de producto en la base de datos
     */
    function updateTypeProduct($typeProduct) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la actualizacion en la base de datos
        $queryUpdate = mysqli_query($conn, "update tbtypeproduct set  nametypeproduct = '"
                . $typeProduct->getNameTypeProduct() . "' where tbtypeproduct.idtypeproduct = "
                . $typeProduct->getIdTypeProduct() . ";");
        mysqli_close($conn);

        if ($queryUpdate) {
            return true;
        } else {
            return false;
        }
    }
    //fin función updateTypeProduct

    /*
     * Función que permite realizar la eliminación de algun registro en la base de datos
     */

    function deleteTypeProduct($idTypeProduct) {

        $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Se realiza la eliminación en la base de datos
        $queryDelete = mysqli_query($conn, "update tbtypeproduct set active=0 where idtypeproduct = "
                . $idTypeProduct . ";");
        mysqli_close($conn);

        if ($queryDelete) {
            return true;
        } else {
            return false;
        }
    }

//fin función deleteTypeProduct

}
