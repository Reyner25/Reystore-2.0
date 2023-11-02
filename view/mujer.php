<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapatos mujer</title>

    <link rel="stylesheet" href="style/hombre.css">

</head>
<body>

<?php

require_once("header.php");
require_once("../database/conexion.php");

?>
    


<div class="etiqueta">    

    <?php 
            require_once("../database/conexion.php");


            $sql="SELECT * FROM mujer";

            $sentencia=$conexion->prepare($sql);
            $sentencia->execute();
            $resultado=$sentencia->fetchAll();


            foreach($resultado as $fila){
        ?>


<section class="productos">
    
               <h1 class="nombreZapato"><?php print_r($fila["Nombre"]);?></h1> 
                
                <img class="imgZapatos" src="../imgdeProductos/imgMujer/<?php echo $fila["Imagen"];?>" alt="">
                <p class="precioImg"><b>Precio: <?php print_r($fila["Precio"]);?></b></p>
                <p class="tallaImg"><b>Talla: <?php print_r($fila["Talla"]);?></b></p>

        

</section>



<?php }?>

</div>

</body>
</html>





</body>
</html>