<?php
include_once "../funciones.php";
include "flibro.php";
controlSesion();
$usuario =  $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $dewey = $_GET['dewey_id_categoria_dewey'];
        $autor = $_GET['id_apellido'];
        $id = $_GET['id_titulo'];
        //$nombre = $_GET['nombre'];
        echo "Baja para el libro: " . $id;
        iniciaBD();
        formulariolibro($dewey, $autor, $id, false);
       // echo "Borrado: " . $nombre;
        borrarlibro($dewey, $autor, $id);
        echo"<br><a href='./index.php'>Gestión libros</a>";
        ?>
    </body>
</html>
<?php

function borrarlibro($dewey, $autor, $id) {
    //controlSesion();
    iniciaBD();

    $query = "DELETE FROM titulo WHERE dewey_id_categoria_dewey='$dewey' AND id_apellido='$autor' AND id_titulo='$id'";
    $resultado = mysql_query($query);
    //echo $query;
    if (mysql_affected_rows() == 0)
        echo ("El libro que quiere borrar no existe.");
    else
    if ($resultado)
        echo "(" . mysql_affected_rows() . ") libro se ha borrado el libro  $id correctamente\n";
    else
        die("Fallo al borrar el registro" . mysql_error());
}
?>