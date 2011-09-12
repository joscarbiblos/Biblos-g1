<?php
include "./funciones.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <title><h1>Login</h1></title>
    </head>
    <body>
        <form action='indexP.php' method='post'>
            Su DNI: <input type='text' name='dni'><br>
            Su password: <input type='password' name='password'><br>
            Tema<br />
            <?php cargardorLista("plantilla", "id_plantilla", "nombre_plantilla", "1", "Seleccione"); ?>
            <input type='submit' value='Aceptar'/>
        </form>

    </body>
</html>
