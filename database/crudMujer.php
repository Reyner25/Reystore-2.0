<?php
require_once("conexion.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud mujer</title>
    <link rel="stylesheet" href="styleDatabase/crudMujer.css">
</head>
<body>



<form action="crudMujer.php" method="post"  enctype="multipart/form-data" class="formulario">



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




<?php

//codigo PHP


if($_POST){

    echo "Contenido del envio";

    echo "<br>";
    $nombre= $_POST["txtNombre"];
    print_r($nombre) ;
    echo "<br>";
    $talla= $_POST["txtTalla"];
    print_r("La talla es: ".$talla);
    echo "<br>";

    $precio= $_POST["txtPrecio"];
    print_r("El precio es: ".$precio);


    if( empty($_POST["txtimagen"])){

        $imagen= $_FILES["txtImagen"]['name'];
        $ubicacionImg=$_FILES["txtImagen"]['tmp_name'];
        $tipoImg= $_FILES["txtImagen"]['type'];

        if(!(strpos($tipoImg,'gif') || strpos($tipoImg,'jpeg') || strpos($tipoImg,'npg')) ){

            echo"Solo se permiten archivos jpeg, npg, gif";
        }else{
            require_once("conexion.php");

            $peticion= "INSERT INTO `mujer` (`Id`, `Nombre`, `Talla`, `Imagen`, `Precio`) VALUES ( Null , '$nombre', '$talla', '$imagen', '$precio')";
            $conexion->exec($peticion);

            move_uploaded_file($ubicacionImg,"../imgdeProductos/imgMujer/".$imagen);
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

    
</body>
</html>