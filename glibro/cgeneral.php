<?php
include "../funciones.php";
include "flibro.php";
controlSesion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Listado general del catalogo.</h1>
        <?php
        listarCatalogo();
        ?>
   <p><a href="index.php" align="right">Volver a menu de Gestión de libros               </a>
    <a href='../mostrarusuario.php' align="left"> perfil usuario actual</a></p>
   
    </body>
</html>

<?php




?>