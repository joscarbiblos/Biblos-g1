<?php
include "../funciones.php";
include "flibro.php";
//controlSesion();
?>

<html>
    <head>
        <title>Librería Online - Gestion de biblioteca </title>
    </head>
    <body>


        <h1>Modificación de libros</h1>
        <?php
    
        $dewey = $_GET['dewey_id_categoria_dewey'];
        $autor = $_GET['id_apellido'];
        $id = $_GET['id_titulo'];
        iniciaBD();
        formulariolibro($dewey,$autor,$id, TRUE, "Modificar", "mlibroP.php");

        

        function componeInput($nombreName, $valor, $editable) {
            $campo = "<input type='text' name='$nombreName' value='" . htmlentities($valor) . "' ";
            if (!$editable)
                $campo = $campo . "readonly='readonly' ";
            $campo = $campo . "/>";

            return $campo;
        }
        ?>

    </body>
</html>

