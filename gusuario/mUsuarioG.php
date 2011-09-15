<?php
include "../funciones.php";
include "fusuario.php";
controlSesion();
$usuario =  $_SESSION['usuario'];
?>

<html>
    <head>
        <title>(<?php echo $usuario['nombre_usuario']?>)Gesti&oacute;n de usuario </title>
    </head>
    <body>


        <h1>Modificación de usuario</h1>
        <?php
        $dni=$_GET['dni'];
        echo "Mod para el usuario: ".$dni;
        iniciaBD();
        formularioUsuario($dni, TRUE, "Modificar", "mUsuarioP.php");
        
        
       
        ?>

    </body>
</html>

