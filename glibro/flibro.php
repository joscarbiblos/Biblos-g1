<?php
include_once "../funciones.php";

//function altalibro($dni, $email, $direccion, $telefono, $nombre_usuario, $clave, $es_administrador, $apellido1, $apellido2, $plantilla_id_plantilla) {
function altalibro($dewey,$autor3,$nombre,$fecha_publicacion,$fecha_adquisicion,$sinopsis,$numero_paginas,$isbn,$editorial){   
    iniciaBD();
    $nombre3=substr($nombre, 0, 3);

    $query = "insert INTO titulo
                (dewey_id_categoria_dewey, id_apellido, id_titulo, nombre, fecha_publicacion, fecha_adquisicion, sinopsis, numero_paginas, isbn, 
    editorial_id_editorial)
       values ($dewey,'$autor3','$nombre3','$nombre','$fecha_publicacion','$fecha_adquisicion','$sinopsis',$numero_paginas,$isbn,$editorial)";

   

    $resultado = mysql_query($query);
    if ($resultado)
        echo mysql_affected_rows() . " Alta de libro..$nombre .Correcta \n";
    else
        die("Fallo al insertar" . mysql_error());
}

function rellenalibroConOpciones() {
    iniciaBD();
    $query = "select * from titulo";
    $resultado = mysql_query($query);
    echo "Total de titulos: ".mysql_num_rows($resultado)."<p>\n";

    // Relleno las filas de la tabla grafica con las filas que vienen del select a la BD

    if ($resultado) {
        while ($titulo = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $dewey = $titulo['dewey_id_categoria_dewey'];
            $id = $titulo['id_titulo'];
         $autor = $titulo['id_apellido'];
           $editorial = htmlentities($titulo['editorial_id_editorial']);
            $nombre = htmlentities($titulo['nombre']);
            $sinopsis = htmlentities($titulo['sinopsis']);
            $isbn = htmlentities($titulo['isbn']);
           $fecha_publicacion =date('d-m-Y', strtotime($titulo['fecha_publicacion']));
            $fecha_adquisicion =date('d-m-Y', strtotime($titulo['fecha_adquisicion']));
            echo "<tr>\n";
            echo"<td><a href='http://localhost/Biblos/glibro/mlibroG.php?id_titulo=$id&dewey_id_categoria_dewey=$dewey&id_apellido=$autor'><img src='../imagen/b_edit.png'></a></td>\n";
            echo"<td><a href='http://localhost/Biblos/glibro/bajalibro.php?id_titulo=$id&dewey_id_categoria_dewey=$dewey&id_apellido=$autor'><img src='../imagen/b_drop.png' ></a></td>\n";            
            //echo"<td><input type='button' name='bborrar' value='Borrar' OnClick='Borrartitulo($dni)'</td>\n";
             echo"<td>$dewey</td>\n";
            echo"<td>$id</td>\n";
            echo"<td>$autor</td>\n";
            echo"<td>$editorial</td>\n";
            echo"<td>$nombre</td>\n";
            echo"<td>$sinopsis</td>\n";
            echo"<td>$isbn</td>\n";
            echo"<td>$fecha_publicacion</td>\n";
             echo"<td>$fecha_adquisicion</td>\n";
            echo "<tr>\n\n";
        }
    }

    else
        die("Fallo al listar" . mysql_error());
}
 function formulariolibro($dewey,$autor,$id,$editable, $valorBoton="Enviar", $accion="") {
            $query = "select * from titulo where dewey_id_categoria_dewey= '$dewey' AND id_apellido='$autor' AND id_titulo='$id'  \n";


            $resultado = mysql_query($query);
            if ($resultado) {
                $fila = mysql_fetch_array($resultado);
              $dewey = $fila['dewey_id_categoria_dewey'];
                $id = $fila['id_titulo'];
              //$autor = $fila['autor'];
                $editorial = $fila['editorial_id_editorial'];
                $nombre = $fila['nombre'];
                $sinopsis = $fila['sinopsis'];
                $isbn = $fila['isbn'];
                $fecha_publicacion =date('d-m-Y', strtotime($titulo['fecha_publicacion']));
            $fecha_adquisicion =date('d-m-Y', strtotime($titulo['fecha_adquisicion']));

//$accion = $fila['accion'];

                echo "<form name='$valorBoton' action='$accion' method='POST'>\n\n";

                echo "<label>dewey</label>\n";
                echo"<input type='text' name='dewey_id_categoria_dewey' value='$id' readonly='readonly' /> <p>\n";

                echo "<label>autor</label>\n";
                echo (componeInput("autor", $autor, $editable) . "<p>\n");


                echo "<label>editorial</label>\n";
                echo (componeInput("editorial", $editorial, $editable) . "<p>\n");

                echo "<label>nombre</label>\n";
                echo (componeInput("nombre", $nombre, $editable) . "<p>\n");

                echo "<label>sinopsis</label>\n";
                echo (componeInput("sinopsis", $sinopsis, $editable) . "<p>\n");

                echo "<label>isbn</label>\n";
                echo (componeInput("isbn", $isbn, $editable) . "<p>\n");

                
                if ($editable)
                    echo"<input type='submit' value='$valorBoton' name='$valorBoton' />\n";
                echo "</form>\n";
            }
        }


?>
  <script LANGUAGE="JavaScript">
    function Borrarlibro(id)
    {
        var respuesta = confirm("¿Borrar usuario: "+id+"?");
        if(respuesta){
            open("http://localhost/Biblos/gusuario/bajaUsuario.php?id="+id);
        }
        return true;
    } 
    
    function ModificarUsuario(dni)
    {

        open("http://localhost/Biblos/glibro/mlibroG.php?id="+id);

        return true;
    } 
    
  
</script> 