
<?php
require_once("conexion.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Hombres</title>
    <link rel="stylesheet" href="styleDatabase/crudHombre.css">
</head>

<body>





<form action="crudHombre.php" method="post"  enctype="multipart/form-data" class="formulario">


<div>
    <label for="txtNombre">Nombre</label> <br>
    <input type="text" name="txtNombre" id="txtNombre"  placeholder="Nombre">
</div>


<div>
    <label for="txtTalla">Talla:</label> <br>
    <input type="text" name="txtTalla" id="txtTalla"  placeholder="Talla">
</div>


<div>
    <label for="txtPrecio">Precio: </label><br>
    <input type="text" name="txtPrecio" id="txtPrecio" placeholder="Precio" >
</div>


<div>
    <label for="txtimagen">Imagen:</label> <br>
    <input type="file" name="txtImagen" id="txtImagen"  placeholder="Imagen" class="imagenCargada">
</div>


<div>

    <input type="submit" placeholder="Enviar" value="Enviar" name="enviar">
    <button type="button">Modificar</button>
    <button type="button">Cancelar</button>

</div>







</form>


<br>
<br> 


<?php

//codigo PHP


if($_POST){

    echo "Contenido del envio";

    $nombre= $_POST["txtNombre"];
    print_r($nombre) ;

    $talla= $_POST["txtTalla"];
    print_r("La talla es: ".$talla);

    $precio= $_POST["txtPrecio"];
    print_r("El precio es: ".$precio);


    if( empty($_POST["txtimagen"])){

        $imagen= $_FILES["txtImagen"]['name'];
        $ubicacionImg=$_FILES["txtImagen"]['tmp_name'];
        $tipoImg= $_FILES["txtImagen"]['type'];

        if(!(strpos($tipoImg,'gif') || strpos($tipoImg,'jpeg') || strpos($tipoImg,'npg')) ){

            echo"Solo se permiten archivos jpeg, npg, gif";
        }else{

            $peticion= "INSERT INTO `hombre` (`Id`, `Nombre`, `Talla`, `Imagen`, `Precio`) VALUES ( '' , '$nombre', '$talla', '$imagen', '$precio')";
            $conexion->exec($peticion);

            move_uploaded_file($ubicacionImg,"../imgdeProductos/imgHombre/".$imagen);
        } ?>

     <script>

     (function(){

        var not=function(){
            window.history.replaceState(null,null, window.location.pathname);
   
                }       
        setTimeout(not, 0)    

     }())
     </script>   

<?php   


    }

}

?>







 <!-- MOSTRAR EL CONTENIDO DE LA BASE DE DATOS  de la tabla hombres    


<table style="margin-left: 20rem;">
            
            <tr>
                <th>Id</th>
                <th>nombre</th>
                <th>talla</th>
                <th>Imagen</th>
                <th>Precio</th>
            </tr>
    
            <?php /*

            require_once("conexion.php");


            $sql="SELECT * FROM hombre";

            $sentencia=$conexion->prepare($sql);
            $sentencia->execute();

            $resultado=$sentencia->fetchAll();


            foreach($resultado as $fila){?> 
            
                <tr>
                    <th><?php echo $fila["Id"]; ?></th>
                    <th><?php echo $fila["Nombre"]; ?></th>
                    <th><?php  print_r($fila["Talla"]);?></th>
                    <td style="width: 80px;"><img style="width: 80px;" src="../imgHombre/<?php echo $fila["Imagen"]?>" alt=""></td>
                   <!-- <th><?php  //print_r($fila["Imagen"]);?></th>-->
                    <th><?php  print_r($fila["Precio"]);?></th>
                </tr>


                
            <?php }   */ ?>

            <br>
    
     </table>
            -->

</body>
</html>



<?php

