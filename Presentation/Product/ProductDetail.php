<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>

        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
        <script src="../../JS/ShoppingCar.js" type="text/javascript"></script>

        <link href="../../CSS/starrr.css" rel=stylesheet/>
        <script src="../../JS/starrr.js"></script>
    </head>
    <body>
        <br>
    <center>
        <table>
            <tr>
                <td><a href="../Modules/ClientView.php?idProduct=<?php echo $_GET["idProduct"]; ?>">Atrás</a></td>
                <td><a href="../ShoppingCar/ShoppingCar.php">Carrito compras</a></td>
            </tr>
        </table>
    </center>
    <br><hr>
    <?php
    if (@session_start() == true) {
        if (isset($_SESSION["idUser"])) {
            include_once '../../Business/Product/ProductBusiness.php';
            include_once '../../Business/SpecificationProduct/SpecificationproductBusiness.php';
            include_once '../../Data/Frecuency.php';
            $idProduct = $_GET["idProduct"];
            $frecuency = new Frecuency();
            $result = $frecuency->updateView();
            $productBusiness = new ProductBusiness();
            $product = $productBusiness->getProductByID($idProduct);
            $specificationBusiness = new SpecificationproductBusiness();
            $specification = $specificationBusiness->getSpecificationProduct($idProduct);
            ?>
            <div>
                <center><h1 id="txtName"><?php echo $product[0]->getName(); ?></h1></center>
                <table>
                    <?php
                    $cont = 0;
                    foreach ($product[0]->getPathImages() as $currentImage) {
                        $img = $currentImage;
                        if ($cont < 3) {
                            ?>
                            <tr><td><img  src="<?php echo $currentImage; ?>" alt="" style="width: 100px; height: 100px;"/></td></tr>

                            <?php
                        } else {
                            ?>
                            <tr>
                                <td><img  src="<?php echo $currentImage; ?>" alt="" style="width: 135px; height: 100px;"/></td>

                            </tr>
                            <?php
                        }
                        $cont++;
                    }
                    ?>
                </table>
                <div style="position: relative; bottom: 420px; margin-left: 110px;">
                    <img style="width: 300px; height: 300px;"id="imgChange" src="<?php echo $img; ?>" alt=""/></div>

                <div style="position: relative; bottom: 730px; margin-left: 430px;">

                    <table>
                        <tr><td><h2>Marca:</h2></td> <td><h4 id="txtBrand"><?php echo $product[0]->getBrand(); ?></h4></td></tr>
                        <tr><td><h2>Modelo:</h2></td> <td><h4 id="txtModel"><?php echo $product[0]->getModel(); ?></h4></td></tr>
                        <tr><td><h2>Serie:</h2></td> <td><h4 id="txtSerie"><?php echo $product[0]->getSerie(); ?></h4></td></tr>
                        <tr><td><h2>Precio:</h2></td> <td><h4><?php echo '₡' . number_format($product[0]->getPrice()); ?></h4><br></td></tr>
                        <tr>
                            <td><h2>Colores:</h2></td>
                            <td>
                                <?php
                                $colors = split(";", $product[0]->getColor());
                                for ($i = 0; $i < sizeof($colors); $i++) {
                                    if ($colors[$i] != "") {
                                        ?>
                                        <input type="text" disabled="true" style="background:
                                               <?php echo $colors[$i]; ?>;
                                               border: none;  width: 30px; height: 30px;"/>                            
                                               <?php
                                           }
                                       }
                                       ?>
                            </td>
                        </tr>
                        <tr><td><h2>Descripción:</h2></td><td><h4><?php echo $product[0]->getDescription(); ?></h4></td></tr>
                        <tr><td><h2>Características:</h2></td><td><h4><?php echo $product[0]->getCharacteristics(); ?></h4></td></tr>
                        <tr><td>

                                <?php
                                include_once '../../Business/Details/detailsBusiness.php';
                                $detailsBusiness = new detailsBusiness();
                                $wish = $detailsBusiness->isDesired($_GET["idProduct"], $_SESSION["idUser"]);
                                $like = $detailsBusiness->isLike($_GET["idProduct"], $_SESSION["idUser"]);
                                
                                ?>
                                <form id="details" method="POST" action="../../Business/Details/desireAction.php">

                                    <input type="hidden" id="idProductWish" name="idProductWish" value="<?php echo $_GET['idProduct'] ?>">                    
                                    <input type="hidden" id="idclientWish" name="idClientWish" value="<?php echo $_SESSION["idUser"] ?>">                    
                                    <input type="checkbox" name="checkWish" <?php
                                    if ($wish) {
                                        echo 'checked="false"';
                                    }
                                    ?> disabled/>Favoritos  <br>
                                    <input type="submit" name ="change" id="change" value="Agregar a la lista de favoritos" >
                                    <br>
                                    <input type="checkbox" name="checkLike" <?php
                                            if ($like) {
                                                echo 'checked="false"';
                                            }
                                                ?> disabled> Si me Gusta  


                                                    <input type="checkbox" name="checkDislike" <?php
                                            if (!$like) {
                                                echo 'checked="false"';
                                            }
                                                ?> disabled>No me Gusta <br>

                                                    <input type="submit" name ="btnLike" id="btnLike" value="<?php
                                                    if ($like) {
                                                        echo 'No me Gusta';
                                                    } else {
                                                        echo 'Me Gusta';
                                                    }
                                                    ?>" >
                                </form>

                            </td></tr>

                        <tr>
                            <td>
                                Calificar: <span id="Estrellas" ></span><br>
                                Ranking: <span id="Ranking" ></span>
                                <br> Ranking = <?php echo ''.$detailsBusiness->getRanking($_GET['idProduct']).'';?>

                            </td></tr>
                    </table>
                </div >
                <div style="position: relative; bottom: 1320px; margin-left: 800px;">
                    <table>
                        <tr>
                            <td><h2>Especificaciones:</h2><td></td></td><td><a href="../WallView/Wall.php?idProduct=<?php echo $idProduct; ?>">Ver muro</a></td><br>
                        <td><input type="submit" id="btnCar" name="btnCar" value="Agregar carrito" /></td>
                        <?php
                        foreach ($specification as $currentSpe) {
                            ?>
                            <tr>
                                <td><h4><?php echo $currentSpe->getNameSpecification(); ?></h4></td>
                                <td><h4><?php echo $currentSpe->getValueSpecification(); ?></h4></td></tr>
                            <?php
                        }
                        ?>
                        </tr>


                    </table>
                    <label id="lblMessage"></label>
                </div>
            </div>
            <input type="hidden" id="idProduct" name="idProduct" value="<?php echo $idProduct; ?>"/>
            <input type="hidden" id="txtPrice" name="txtPrice" value="<?php echo $product[0]->getPrice(); ?>"/>
            <?php
        }
    }
    ?>

</body>

<script>
    $('#Estrellas').starrr({
        rating:<?php echo '' . $detailsBusiness->getCalification($_SESSION["idUser"], $_GET['idProduct']) . ''; ?>,
        change: function (e, valor) {
            var calificacion = valor;            
        }

    });

</script>
<script>
    $('#Ranking').starrr({
        rating:<?php echo '' . $detailsBusiness->getRanking($_GET['idProduct']) . ''; ?>,
        change: function (e, valor) {
            var calificacion = valor;            
        }

    });

</script>

</html>
<?php



function insertCalification($value) {
    include '../../Domain/star.php';
    $detail = new detailsBusiness();
    $ranking = new star($_GET['idProduct'], $_SESSION["idUser"], $value);
    return $detail->insertCalification($ranking);
}
?>




