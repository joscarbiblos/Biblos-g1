<?php
include "../funciones.php";
include "./flibro.php";
controlSesion();
$usuario =  $_SESSION['usuario'];


//controlSesion();
?>

<html>
    <head>
        <title>Biblos</title>
    </head>
    <body>
        <h1>Gesti&oacute;n Libros</h1>
        <p>
            <?php
            iniciaBD();
            $dewey = $_POST['dewey']; // 
            $autores = $_POST['autor'];
            $nombre = $_POST['nombre']; // Nombre completo del tituloa
            $fecha_publicacion = $_POST['fecha_publicacion'];
            $fecha_adquisicion = $_POST['fecha_adquisicion'];
            $sinopsis = $_POST['sinopsis'];
            $numero_paginas = $_POST['numero_paginas'];
            $isbn = $_POST['isbn'];
            $editorial = $_POST['editorial'];





            $autor = htmlentities($autores[0]);

            // Tokenizamos. Ejemplos: Si llega '1-FAI'
            // Tenemos el codAutor_1='1'
            // Tenemos el $apellido3_1='FAI'
            $autor1 = $autores[0];
            $codAutor_1 = strtok($autor1, "-");
            $apellido3_1 = strtok("-");

            echo "xxxx-$autor<br>";
            $editorial = htmlentities($editorial);
            $nombre = htmlentities($nombre);
            $sinopsis = htmlentities($sinopsis);


            altalibro($dewey, $apellido3_1, $nombre, $fecha_publicacion, $fecha_adquisicion, $sinopsis, $numero_paginas, $isbn, $editorial);
            ?>

            <br><a href='./index.php'>Gestión libros</a>

    </body>
</html>