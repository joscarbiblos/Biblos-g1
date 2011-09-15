<?php
include "./funciones.php";
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bienvenido</title>
        <link rel="stylesheet" type="text/css" href="./recursos/reset.css" />
        <link rel="stylesheet" type="text/css" href="./recursos/style.css" />

        <style>
            #blog {
                padding-left: 00px;
                margin-left:-60px
            }
        </style> 

    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <form action='indexP.php' method='post'>
                    Su DNI: <input type='text' name='dni'><br>
                            Su password: <input type='password' name='password'><br>
                                    Tema<br />
                                    <?php cargardorLista("plantilla", "id_plantilla", "nombre_plantilla", "1", "Seleccione"); ?>
                                    <input type='submit' value='Aceptar'/>
                                    </form>
                                    </div>
                                    </div>
                                    </body>
                                    </html>
