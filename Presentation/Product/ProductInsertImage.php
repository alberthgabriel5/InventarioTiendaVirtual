<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registar Producto</title>          
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
       
    </head>
    <body>
    <center>
        <br>
        <table>
            <tr>
                <td><a href="../../index.php">Inicio</a></td>
                <td><a href="ProductCreate.php">Registrar</a></td>
                <!--<td><a href="ProductRetrieve.php">Visualizar</a><td>-->
                <td><a href="ProductUpdate.php">Actualizar</a><td>
               <td><a href="ProductState.php">Estado</a><td>
            </tr>
        </table>
        <hr>
        <?php 
            $name = $_GET['nameProduct'];
            $idProduct = $_GET['idProduct'];
            $count = $_GET['count'];        
        ?>
        <h1>Registar Imagen a&emsp;<?php echo $name; ?></h1>
        <br>
        <form id="createProduct" method="POST" action="../../Business/Product/ProductAction.php" enctype="multipart/form-data">
            <table id="input">
                <tr>
                    <td><label id="lblColor">Imagen:</label></td>
                    <td><input type="file" id="fileImage0" name="fileImage0"/></td>
                    <td><input type="hidden" id="idProduct" name="idProduct" value="<?php echo $idProduct;?>"/></td>
                    
                </tr> 
                
            </table>
            <input type="hidden" id="count" name="count" value="<?php echo $count;?>"/>
            <input type="hidden" id="optionInsertImage" name="optionInsertImage">
            <input type="submit" id="btnAccept" name="btnAccept" value="Aceptar" />
            <input type="submit" id="btnAdd" onclick="return addInputFileImage('input');" value="Nueva imagen">
        </form>
        <br>
        <label id="txtMessage"></label>

    </center>
</body>
 <script src="../../JS/GenerateFieldsImages.js" type="text/javascript"></script>
<?php
if (isset($_GET['success'])) {
    echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Registro con éxito";
          </script>';
} else if (isset($_GET['errorInsert'])) {
    echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido";
          </script>';
} else if (isset($_GET['errorData'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados";
           </script>';
}else if (isset($_GET['errorExis'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "La imagen ingresada ya existe";
           </script>';
}else if (isset($_GET['errorSize'])) {
    echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "La imagen supera el tamaño permitido";
           </script>';
}
?>
<script language="JavaScript">

   

</script>

<script>
    $.validate({
        lang: 'es'
    });

</script>
</html>
