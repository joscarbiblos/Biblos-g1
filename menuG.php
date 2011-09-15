<?php
include "funciones.php";
controlSesion();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Menu principal Biblos</title>
         <?php fijaPlantillaCSS();?>
    </head>
    <body>
        <h1>MENU</h1>
        <h1>Opciones</h1>
        <ul><li>Consultas
                <ul>
                    <li><a href='./glibro/cgeneral.php'>Consulta general</a>
                    <li><a href='./glibro/cespecificaG.php'>Consulta concreta</a>

                </ul>


                <?php
                $usuario =  $_SESSION['usuario'];
                // Comprobacion del tipo de usuario
                if ($usuario['es_administrador'] == 1)
                    mostrarOpcionesAdministracion();
                ?>

            <li><a href='salir.php'>Salir</a>
        </ul>
    </ul>
</body>
</html>


<?php

function mostrarOpcionesAdministracion() {
//echo "Es administrador";

    echo("
        <li>Administracion
        <ul>
        <li><a href='glibro/index.php'>Gestion Catalogo</a>      
        <li><a href='gusuario/index.php'>Gestion Usuario</a>        
        </ul>");
}

?>