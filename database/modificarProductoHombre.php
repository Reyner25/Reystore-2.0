

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Productos</title>
    <link rel="stylesheet" href="styleDatabase/modificarProductosHombre.css">
</head>
<body>

<?$id = $_GET['id'];?>

<form action="modificarProductoHombre.php?id=<?php echo $_GET['id'];?>" method="post"  enctype="multipart/form-data" class="formulario">
<h2>Modificar</h2>
<?php

require_once("conexion.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    echo $id;
    $consulta =" SELECT * FROM reystore.hombre WHERE id=$id ;";

    foreach( $conexion->query($consulta) as $fila){

        $ImgAnterior= $fila['Imagen'];

        // print_r($fila);?>

        <div>
            <label for="txtNombre">Nombre</label> <br>
            <input type="text"  value="<?php print_r($fila['Nombre'])?>"  name="txtNombre" placeholder="Nombre">
        </div>


        <div>
            <label for="txtTalla">Talla:</label> <br>
            <input value="<?php print_r($fila['Talla'])?>" type="text" name="txtTalla" id="txtTalla"   placeholder="Talla">
        </div>


        <div>
            <label for="txtPrecio">Precio: </label><br>
            <input value="<?php print_r($fila['Precio'])?>" type="text" name="txtPrecio" id="txtPrecio" placeholder="Precio" >
        </div>


        <img src="../imgdeProductos/imgHombre/<?php echo $fila['Imagen'];?>" alt="">

        <div>

            <label for="txtimagen">Imagen:</label> <br>
            <input type="file" name="txtImagen" id="txtImagen"  placeholder="Imagen" class="imagenCargada">
        </div>


        <div>
            <a href="/database/crudHombre.php"><button type="submit" value="Modificar" name="Modificar">Modificar</button></a>
        <a href="/reystore/database/crudHombre.php"><button type="button" value="Cancelar" name="Cancelar">Cancelar</button>
        </a> 
        </div>

        </form>

<?php 

    }
}
?>


<?php
//recibimos la informacion para Modificar los archivos
if($_POST){

$nombreProducto = $_POST['txtNombre'];
$tallaProducto =$_POST['txtTalla'];
$precioProducto = $_POST['txtPrecio'];



if((!(isset($_POST['txtImagen'])))){
    $sql="UPDATE `hombre` SET `Nombre` = '$nombreProducto', `Talla` = '$tallaProducto', `Precio` = '$precioProducto' WHERE `hombre`.`Id` = $id ";
    $conexion->exec($sql);


    header("location:crudHombre.php");

}


if(empty($_POST['txtImagen'])){

    echo "2";

    $nombreImg= $_FILES['txtImagen']['name'];
    $ubicacionImg=$_FILES['txtImagen']['tmp_name'];
    $tipoImg=$_FILES['txtImagen']['type'];

    
        if(!(strpos($tipoImg,'gif') || strpos($tipoImg,'jpeg') || strpos($tipoImg,'jpg') || strpos($tipoImg,'png')) ){

            echo"Solo se permiten archivos jpeg, npg, gif y png";
        }else{
    //guardr la foto
            $sql="UPDATE `hombre` SET `Nombre` = '$nombreProducto', `Talla` = '$tallaProducto', `Precio` = '$precioProducto', `Imagen` = '$nombreImg'  WHERE `hombre`.`Id` = $id;";
            
            $conexion->exec($sql);
            move_uploaded_file($ubicacionImg ,"../imgdeProductos/imgHombre/".$nombreImg);
    //eliminar la foto anterior 
           $rutaImgAnterior="../imgdeProductos/imgHombre/".$ImgAnterior;
            unlink($rutaImgAnterior);

            header("location:crudHombre.php");

        } 
    
    //Acomodar el registro
}




}

?>




</body>
</html>