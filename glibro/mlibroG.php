<?php
include "../funciones.php";
include "flibro.php";
controlSesion();
$usuario =  $_SESSION['usuario'];

?>

<html>
    <head>
        <title>(<?php echo $usuario['nombre_usuario']?>)Librer&iacute;a Online - Gesti&oacute;n de biblioteca </title>
    </head>
    <body>


        <h1>Modificaci&oacute;n de libros</h1>
        <?php
    
        $dewey = $_GET['dewey_id_categoria_dewey'];
        $autor = $_GET['id_apellido'];
        $id = $_GET['id_titulo'];
        iniciaBD();
        formulariolibro($dewey,$autor,$id, TRUE, "Modificar", "mlibroP.php");

        ?>

    </body>
</html>

