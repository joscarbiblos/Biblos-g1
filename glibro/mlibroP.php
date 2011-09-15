<?php
include_once "../funciones.php";
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        iniciaBD();
        $id = $_POST['id_titulo'];
        $dewey = $_POST['dewey_id_categoria_dewey'];
        $autor = $_POST['id_apellido'];
        $nombre = $_POST['nombre']; // Nombre completo del tituloa
        $fecha_publicacion = $_POST['fecha_publicacion'];
        $fecha_adquisicion = $_POST['fecha_adquisicion'];
        $sinopsis = $_POST['sinopsis'];
        $numero_paginas = $_POST['numero_paginas'];
        $isbn = $_POST['isbn'];
        $editorial = $_POST['editorial_id_editorial'];



        $query = "UPDATE titulo
            SET dewey_id_categoria_dewey='$dewey',id_apellido='$id_apellido',  id_titulo='$id_titulo', nombre='$nombre',      
          fecha_publicacion='$fecha_publicacion',  fecha_adquisicion= '$fecha_adquisicion', sinopsis='$sinopsis', numero_paginas='$numero_paginas',
          isbn='$isbn',editorial_id_editorial='$editorial' WHERE dewey_id_categoria_dewey='$dewey' AND id_titulo='$id_titulo' AND id_apellido='$id_apellido'";

        // echo $query;

        $resultado = mysql_query($query);
        if ($resultado) {
            if (mysql_affected_rows() == 0) {
                echo ("No hubo moficiacion.");
            } else
                echo "(" . mysql_affected_rows() . ") Modifacion de libro .$nombre correcta.";
            echo"<br><a href='./index.php'>Gestión libros</a>";
        }
        else
            die("Fallo al modificar" . mysql_error());
        ?>
    </body>
</html>
