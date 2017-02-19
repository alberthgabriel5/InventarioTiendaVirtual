<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar Proveedor</title>
    </head>
    <body>
        <b><a href="../../index.php">Inicio</a></b>&nbsp;        
        <a href="">Actualizar</a>
        
        <br><br><br>
        
          <?php
          include_once '../../Business/Stock/stockBusiness.php';
        $stockBusiness = new stockBusiness();
        //$true=$stockBusiness->insertExist();
        $result1 = $stockBusiness->getAllStock();
        foreach ($result1 as $tem) {
            ?>          
        <form name="updateStock" method="post" action="../../Business/Stock/stockUpdateAction.php">           

            <input type="hidden" id="idStock" name="idStock" value="<?php echo '' . $tem->getIdStock() . ''; ?>">
            <input type="text" id="txtNameStock" name="txtNameStock" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre Producto" size="10" maxlength="15" value="<?php echo '' . $stockBusiness->getNameProduct($tem->getIdProduct()) . ''; ?>" > 
            <input type="email" id="txtNamestore" name="txtNameStore" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre Tienda" value="<?php echo '' . $stockBusiness->getNameStore($tem->getIdStore()) . ''; ?>">
            <input type="reset" id="txtQuantity" name="txtQuantity" 
                    value="<?php echo '' . $tem->getQuantity() . ''; ?>">
            <input type="reset" id="txtLevel" name="txtLevel" 
                    value="<?php echo '' . $tem->getLevelStock() . ''; ?>">
            <input  type="submit" id="btnUpdate" name="btnUpdate" value="Actualizar" >
            <input  type="submit" id="btnDelete" name="btnDesactive" value="Desactivar" >

        </form>
        <?php
        }
        ?>
    </body>
</html>
