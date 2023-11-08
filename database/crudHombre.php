
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Hombres</title>
    <link rel="stylesheet" href="styleDatabase/crudHombre.css">
</head>

<body>


<form action="validarDatosHombres.php" method="post"  enctype="multipart/form-data" class="formulario">


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

    <button type="submit" placeholder="Enviar" value="Enviar" name="enviar">Enviar</button>


</div>


</form>

<br>
 <!-- MOSTRAR EL CONTENIDO DE LA BASE DE DATOS  de la tabla hombres  -->   


<table style="margin-left: 20rem;">
           
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Talla</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Accion</th>
        </tr>
    </thead>
        <?php 

        require_once("conexion.php");

        $sql="SELECT * FROM hombre";
        $sentencia=$conexion->prepare($sql);
        $sentencia->execute();
        $resultado=$sentencia->fetchAll();


        foreach($resultado as $fila){?> 
            
        <tbody>
            <tr class="">
                    <td id="idProductos"><?php echo $fila["Id"]; ?></td>
                    <td ><?php echo $fila["Nombre"]; ?></td>

                    <td id="talla"><?php  print_r($fila["Talla"]);?></td>
                    <td><img class="imagenTabla" src="../imgdeProductos/imgHombre/<?php echo $fila["Imagen"]?>" alt=""></td>

                    <td><?php  print_r($fila["Precio"]);?></td>
                    <td> <a  class="modificar" href="modificarProductoHombre.php?id=<?php echo $fila["Id"];?>">Modificar</a></td>
                    
            </tr>
        </tbody>

        <?php  }  ?>

        
</table>



</body>
</html>



<?php

