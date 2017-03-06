<?php

/**
 * Descripcion de Data
 * Clase que permite la conexión con la base de datos
 */
class Data {
    /* atributos */

    public $server;
    public $user;
    public $password;
    public $db;

    /* constructor */

    public function Data() {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "mgasoluciones";
    }

}

?>
