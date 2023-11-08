<?php


require_once('conexion.php');
/*codigo PHP para verificar y mandar todo los archivos a la base de datos y enviar la imagen a una carpeta del 
 de la pagina web recuerda que en las imagenes solo guarda el nombre y despues la busca en la base de datos y la relaciona con el nombre 
 con el cual la guardaste en la carpeta de la pagina */


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

        if(!(strpos($tipoImg,'gif') || strpos($tipoImg,'jpeg') || strpos($tipoImg,'npg') || strpos($tipoImg,'png')) ){

            echo"Solo se permiten archivos jpeg, npg, gif y png";
        }else{

            $peticion= "INSERT INTO `hombre` (`Id`, `Nombre`, `Talla`, `Imagen`, `Precio`) VALUES ( '' , '$nombre', '$talla', '$imagen', '$precio')";
            $conexion->exec($peticion);

            move_uploaded_file($ubicacionImg,"../imgdeProductos/imgHombre/".$imagen);
        } ?>


     <script>
        //este script sirve para que cuando se recargue la paguina web no se reenvie el formulario nuevamente a la base de datos
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