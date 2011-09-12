<?php
include_once "../funciones.php";
include "flibro.php";
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
        formulariolibro($dewey, $autor, $id, $nombre, false);
        echo "Borrado: " . $nombre;
        borrarlibro($dewey, $autor, $id, $nombre);
        echo"<br><a href='./index.php'>Gestión libros</a>";
        ?>
    </body>
</html>
<?php

function borrarlibro($dewey, $autor, $id, $nombre) {
    //controlSesion();
    iniciaBD();

    $query = "DELETE FROM titulo WHERE dewey_id_categoria_dewey='$dewey' AND id_apellido='$autor' AND id_titulo='$id'AND nombre='$nombre' \n";
    $resultado = mysql_query($query);
    echo $query;
    if (mysql_affected_rows() == 0)
        echo ("El libro que quiere borrar no existe.");
    else
    if ($resultado)
        echo "(" . mysql_affected_rows() . ") Se ha borrado el libro $nombre correctamente\n";
    else
        die("Fallo al borrar el registro" . mysql_error());
}
?>