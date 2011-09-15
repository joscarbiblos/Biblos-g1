<?php
include_once "../funciones.php";

function altalibro($dewey, $autor3, $nombre, $fecha_publicacion, $fecha_adquisicion, $sinopsis, $numero_paginas, $isbn, $editorial) {
    iniciaBD();
    $nombre3 = substr($nombre, 0, 3);

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
    echo "Total de titulos: " . mysql_num_rows($resultado) . "<p>\n";

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
            $fecha_publicacion = date('d-m-Y', strtotime($titulo['fecha_publicacion']));
            $fecha_adquisicion = date('d-m-Y', strtotime($titulo['fecha_adquisicion']));
            echo "<tr>\n";
            echo"<td><a href='http://localhost/Biblos/glibro/mlibroG.php?id_titulo=$id&dewey_id_categoria_dewey=$dewey&id_apellido=$autor'><img src='../imagen/b_edit.png'></a></td>\n";
            echo"<td><a href='http://localhost/Biblos/glibro/bajalibro.php?id_titulo=$id&dewey_id_categoria_dewey=$dewey&id_apellido=$autor'><img src='../imagen/b_drop.png' ></a></td>\n";
            //echo"<td><input type='button' name='bborrar' value='Borrar' OnClick='Borrartitulo($dni)'</td>\n";
            echo"<td>$dewey</td>\n";
            echo"<td>$id</td>\n";
            echo"<td>$autor</td>\n";
            echo"<td>$editorial</td>\n";
            echo"<td>$nombre</td>\n";
            echo" <td> <textarea name='sinopsis' rows='3' cols='52'>$sinopsis</textarea></td>\n";
            echo"<td>$isbn</td>\n";
            echo"<td>$fecha_publicacion</td>\n";
            echo"<td>$fecha_adquisicion</td>\n";
            echo "<tr>\n\n";
        }
    }

    else
        die("Fallo al listar" . mysql_error());
}
function formulariolibro($dewey, $autor, $id, $editable, $valorBoton="Enviar", $accion="") {
    $query = "select * from titulo where dewey_id_categoria_dewey= '$dewey' AND id_apellido='$autor' AND id_titulo='$id'";


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
        $autor = $fila['id_apellido'];
        $numero_paginas = $fila['numero_paginas'];
        $fecha_publicacion = date('d-m-Y', strtotime($fila['fecha_publicacion']));
        $fecha_adquisicion = date('d-m-Y', strtotime($fila['fecha_adquisicion']));

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
        echo (componeTextArea("sinopsis", $sinopsis, $editable) . "<p>\n");

        echo "<label>isbn</label>\n";
        echo (componeInput("isbn", $isbn, $editable) . "<p>\n");


        if ($editable)
            echo"<input type='submit' value='$valorBoton' name='$valorBoton' />\n";
        echo "</form>\n";
    }
}
function componeTextArea($nombreName, $valor, $editable) {
    $campo = "<textarea  rows='4' cols='63' name='$nombreName'> " . htmlentities($valor) . "</textarea>";
    if (!$editable)
        $campo = $campo . "readonly='readonly' ";
    $campo = $campo;

    return $campo;
}
function listarCatalogo() {
    iniciaBD();

    $query = "select * from titulo";

    $resultado = mysql_query($query);
    echo "Numero de títulos:" . mysql_num_rows($resultado) . "<p>";

    echo"<table border=1>";
    echo"<th>Codigo</th>
                        <th>Titulo</th>
                        <th>Autor</th>\n";
    if ($resultado) {
        while ($titulo = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $cat_dewey = $titulo['dewey_id_categoria_dewey'];
            $id_apellido = $titulo['id_apellido'];
            $id_titulo = $titulo['id_titulo'];
            echo "<tr>";
            echo "<td><a href='mostrarFichaLibro.php?c1=$cat_dewey&c2=$id_apellido&c3=$id_titulo'>" .
            $cat_dewey .
            "" . strtoupper($id_apellido) .
            "" . strtoupper($id_titulo) . "</a></td>";
            echo "<td>" . htmlentities($titulo['nombre']) . "</td>";

            $autores = obtenerAutores($cat_dewey, $id_apellido, $id_titulo);
            echo "<td><ul>";
            foreach ($autores as $autor) {
                echo "<li>" . $autor;
            }
            echo "</ul></td>";
            echo "<tr>\n";
        }
        echo"</table>";
    }

    else
        die("Fallo al listar") . mysql_error();
}
function modificarlibro($id, $autor, $editorial, $nombre, $sinopsis, $isbn) {
    $query = "UPDATE titulo
            SET  id_apellido='$autor',editorial_id_editorial='$editorial',nombre='$nombre',sinopsis='$sinopsis', isbn=$isbn WHERE dewey_id_categoria_dewey=$id";
    $resultado = mysql_query($query);
    if (mysql_affected_rows() == 0) {
        echo ("El registro no existe.");
        // altalibro($id,$autor,$editorial,$nombre);
    } else
    if ($resultado)
        echo mysql_affected_rows() . " modifacion de libro correcta.";
    else
        die("Fallo al modificar" . mysql_error());
}
function listartodo() {
    $sgbd = mysql_pconnect("localhost", "root", "");
    $db = mysql_select_db("biblos-g1");
    $query = "select * from titulo";
    listarCatalogo();
    //          (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    //       $resultado = mysql_query($query);
    //      if ($resultado){
    //           while($titulo = mysql_fetch_array($resultado)){
    //          echo "Titulo:".$titulo['nombre'];
    //         }
    //         echo mysql_affected_rows() . " Alta de libro correcta.";
    //    }
    //     else
    //        die("Fallo al listar"). mysql_error();
}
function obtenerAutores($cat_dewey, $id_apellido, $id_titulo) {
    iniciaBD();

    $query = "select nombre_autor,apellido1, apellido2 from titulo_has_autor, autor where 
        titulo_dewey_id_categoria_dewey='$cat_dewey' and
    titulo_id_apellido='$id_apellido' and
    titulo_id_titulo='$id_titulo' AND 
    autor_id_autor=id_autor";

    //echo $query;
    //          (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    $resultado = mysql_query($query);
    if ($resultado) {
        $i = 0;
        while ($autor = mysql_fetch_array($resultado)) {
            $autor_nombre = htmlentities($autor['nombre_autor']);
            $autor_apellido1 = htmlentities($autor['apellido1']);
            $autor_apellido2 = htmlentities($autor['apellido2']);


            $autores[$i] = $autor_apellido1 . " " . $autor_apellido2 . ", " . $autor_nombre;
            echo "-$i:" . $autores[$i];
            $i++;
        }
        $numAutores = mysql_num_rows($resultado);
        if ($numAutores == 0)
            $autores[0] = "Sin autor";
//        echo "Numero de libros:".mysql_num_rows($resultado);

        return $autores;
    }else {
        $autores[0] = "Fallo en la consulta autores";
        return $autores;
    }
}
function listarCatalogoXCampo($campoBusqueda, $valorBusqueda, $isExact) {


    $query = "select * from titulo where $campoBusqueda ";
    if ($isExact == TRUE)
        $query = $query . "= '$valorBusqueda'";
    else
        $query = $query . "like '%$valorBusqueda%'";
    // (id,autor,editorial,nombre)
    // values ($id,'$autor','$editorial','$nombre')";
    $resultado = mysql_query($query);
    $numTitulos = mysql_num_rows($resultado);

    if ($numTitulos == 0)
        echo "No hay titulos";
    else {

        echo"<table border=1>";
        echo"<th>Codigo</th>
            <th>Titulo</th>
            <th>Autor</th>\n";
        if ($resultado) {
            while ($titulo = mysql_fetch_array($resultado)) {
                // Saco en variables el codigo completo del libro
                $cat_dewey = $titulo['dewey_id_categoria_dewey'];
                $id_apellido = $titulo['id_apellido'];
                $id_titulo = $titulo['id_titulo'];
                echo "<tr>";
                echo "<td><a href='mostrarfichalibro.php?c1=$cat_dewey&c2=$id_apellido&c3=$id_titulo'>" .
                $cat_dewey .
                "" . strtoupper($id_apellido) .
                "" . strtoupper($id_titulo) . "</a></td>";
                echo "<td>" . htmlentities($titulo['nombre']) . "</td>";

                $autores = obtenerAutores($cat_dewey, $id_apellido, $id_titulo);
                echo "<td><ul>";
                foreach ($autores as $autor) {
                    echo "<li>" . $autor;
                }
                echo "</ul></td>";
                echo "<tr>\n";
            }
            // echo "<tr><td>Numero de titulos: $numTitulos</td></tr>";
            echo "<legend>Numero de titulos: $numTitulos</legend>";
            echo"</table>";
        }

        else
            die("Fallo al listar") . mysql_error();
    }
}
function obtenerEditorial($id_editorial) {
    iniciaBD();

    $query = "select nombre_editorial from editorial where 
        id_editorial='$id_editorial'";

    echo "-" . $query;

    $resultado = mysql_query($query);
    if ($resultado) {
        $fila = mysql_fetch_array($resultado);
        $editorial = $fila['nombre_editorial'];
    }else
        $editorial = "Sin editorial";

    return $editorial;
}
function formmenuespecifico() {
    echo "
    <html>
    <head>
        <title>Busqueda libro</title>
    </head>
    <body>
        <h1>Busqueda libro</h1>
        <form action='cespecifica.php' method='post'>
            Elige titulo:<br>
            <select name='tipobusqueda'>
                <option value='1'>titulo
                <option value='2'>Nombreautor
                <option value='3'>codewey   
            </select>
            <br>
            Buscar:<br>
            <input name='busca' type=text>
            <br>
            <input type=submit value='Buscar'>
        </form>
    </body>
</html> ";
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