<?php
include_once "../funciones.php";
include "flibro.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>(<?php echo $usuario['nombre_usuario']?>)</title>
    </head>
    <body>
        <h1>Aministracion de libros</h1></br>
        <br><a href='altalibroG.php'><img src='../imagen/cruzverde.jpg' width="2%" alt="Alta de titulo" title="Alta de titulo"></a>
        <br><a href='../menuG.php'>Menu General</a>
        <table border=1>
        <table border=1>
            <th>M</th><th>B</th>
            <th>dewey</th><th>titulo</th><th>autor</th>
            <th>editorial</th><th>nombre </th><th>sinopsis </th>
            <th>isbn</th>
         
            <?php
            rellenalibroConOpciones();
            ?>
        </table>
        <br><a href='altalibroG.php'><img src='../imagen/cruzverde.jpg' alt="Alta de titulo" title="Alta de titulo"></a>
        
        <br><a href='../menuG.php'>Menu General</a>
    </body>
</html>
