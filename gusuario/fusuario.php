<?php
include_once "../funciones.php";

function altausuario($dni, $email, $direccion, $telefono, $nombre_usuario, $clave, $es_administrador, $apellido1, $apellido2, $plantilla_id_plantilla) {
    iniciaBD();

    $query = "insert INTO usuario
                (dni, email, direccion, telefono, nombre_usuario, clave, es_administrador, apellido1_usuario, apellido2_usuario, plantilla_id_plantilla)
       values ('$dni', '$email', '$direccion', '$telefono', 
    '$nombre_usuario', '$clave', '$es_administrador', '$apellido1', '$apellido2', '$plantilla_id_plantilla')";

    echo $query;

    $resultado = mysql_query($query);
    if ($resultado)
        echo mysql_affected_rows() . " Alta de usuario correcta. Bienvenido .$nombre_usuario";
    else
        die("Fallo al insertar" . mysql_error());
}

function listarusuario($dni, $nombre_usuario, $apellido1, $apellido2, $direccion, $email, $telefono) {
    iniciaBD();

    $query = "select * from usuario";
    $resultado = mysql_query($query);
    echo "Numero de :" . mysql_num_rows($resultado) . "<p>";

    echo"<table border=1>";
    echo"<th>dni</th>
                        <th>nombre</th>
                        <th>apellido1 </th><th>apellido2 </th><th>direccion</th>\n";
    if ($resultado) {
        while ($usuario = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $dni = $usuario['dni'];
            $nombre = $usuario['nombre_usuario'];
            $apellido1 = $usuario['apellido1_usuario'];

            $nombre_usuario = $usuario['es_administrador'];
            $apellido2 = $usuario['apellido2_usuario'];

            $direccion = $usuario['direccion'];
            $email = $usuario['email'];
            $telefono = $usuario['telefono'];

            echo "<tr>";
            echo"<td>$dni</td>";
            echo"<td>$nombre_usuario</td>";
            echo"<td>$apellido1</td>";
            echo"<td>$apellido2</td>";
            echo"<td>$direccion</td>";
            echo"<td>$email</td>";
            echo"<td>$telefono</td>";

            echo "<tr>\n";
        }
        echo"</table>";
    }

    else
        die("Fallo al listar" . mysql_error());
}

function gestionUsuario() {
    iniciaBD();




    // Comienzo estructura grafica de la cabecera
    echo"<table border=1>";
    // Preparo los encabezados
    echo"<th>M</th><th>B</th>
            <th>dni</th><th>clave</th>
        <th>Nombre</th><th>Apellido1 </th><th>apellido2 </th>
        <th>direccion</th>
        <th>telefono</th> <th>email</th> <th>Adm?</th> <th>Plantilla</th>
        \n";


    $query = "select * from usuario";
    $resultado = mysql_query($query);
    echo "Numero de :" . mysql_num_rows($resultado) . "<p>";

    // Relleno las filas de la tabla grafica con las filas que vienen del select a la BD

    if ($resultado) {
        while ($usuario = mysql_fetch_array($resultado)) {
            // Saco en variables el codigo completo del libro
            $dni = $usuario['dni'];
            $clave = $usuario['clave'];
            $nombre = $usuario['nombre_usuario'];
            $apellido1 = $usuario['apellido1_usuario'];
            $apellido2 = $usuario['apellido2_usuario'];
            $direccion = $usuario['direccion'];
            $telefono = $usuario['telefono'];
            $email = $usuario['email'];
            $es_adminitrador = $usuario['es_administrador'];
            $id_plantilla = $usuario['plantilla_id_plantilla'];

            echo "<tr>";
            echo"<td><input type='button' name='bmodificar' value='Modificar' OnClick='ModificarUsuario($dni)'</td>";
            echo"<td><input type='button' name='bborrar' value='Borrar' OnClick='BorrarUsuario($dni)'</td>";
            echo"<td>$dni</td>";
            echo"<td>$clave</td>";
            echo"<td>$nombre</td>";
            echo"<td>$apellido1</td>";
            echo"<td>$apellido2</td>";
            echo"<td>$direccion</td>";
            echo"<td>$telefono</td>";
            echo"<td>$email</td>";
            echo"<td>$es_adminitrador</td>";
            echo"<td>$id_plantilla</td>";
            echo "<tr>\n";
        }
        echo"</table>";
    }

    else
        die("Fallo al listar" . mysql_error());
}

function modificarUsuario($dni, $email, $direccion, $telefono, $nombre_usuario, $clave, $es_administrador) {
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

function borrarusuario($dni) {
    //controlSesion();
    iniciaBD();

    $query = "DELETE FROM usuario WHERE dni='$dni'";
    $resultado = mysql_query($query);
    if (mysql_affected_rows() == 0)
        echo ("El usuario que quiere borrar no existe.");
    else
    if ($resultado)
        echo "(" . mysql_affected_rows() . ") Se ha borrado $dni correctamente";
    else
        die("Fallo al borrar el registro" . mysql_error());
}

function mostrarusuario($dni) {
    $query = "select * from usuario where dni= '$dni' ";


    $resultado = mysql_query($query);
    if ($resultado) {
        $fila = mysql_fetch_array($resultado);
        $nombreusuario = $fila['nombre_usuario'];
        $apellido1 = $fila['apellido1_usuario'];
        $apellido2 = $fila['apellido2_usuario'];
        $telefono = $fila['telefono'];
        $direccion = $fila['direccion'];
        $email = $fila['email'];
        $plantilla = $fila['plantilla_id_plantilla'];
        $clave = $fila['clave'];

        echo "<form name='mUsuarioP.php' action='accion' method='POST'>";

        echo "<label>DNI</label>";
        echo"<input type='text' name='DNI' value='$dni' readonly='readonly' /> <p>";
        
        echo "<label>Nombre</label>";
        echo"<input type='text' name='nombreUsuario' value='$nombreusuario' /> <p>";

        echo "<label>Clave</label>";
        echo"<input type='text' name='clave' value='$clave' /> <p>";

        echo "<label>Apellido1</label>";
        echo"<input type='text' name='apellido1' value='$apellido1' /> <p>";

        echo "<label>Apellido2</label>";
        echo"<input type='text' name='apellido2' value='$apellido2' /> <p>";

        echo "<label>Telefono</label>";
        echo"<input type='text' name='telefono' value='$telefono' /> <p>";

        echo "<label>Direccion</label>";
        echo"<input type='text' name='direccion' value='$direccion' /> <p>";

        echo "<label>eMail</label>";
        echo"<input type='text' name='email' value='$email' /> <p>";

        echo "<label>Plantilla</label>";
        echo"<input type='text' name='plantilla' value='$plantilla' /> <p>";
        echo"<input type='submit' value='Modificar' name='modificar' />";   
        echo "</form>";
    }
}
?>

<script LANGUAGE="JavaScript">
    function BorrarUsuario(dni)
    {
        var respuesta = confirm("¿Borrar usuario: "+dni+"?");
        if(respuesta){
            open("http://localhost/Biblos/gusuario/bajaUsuario.php?dni="+dni);
        }
        return true;
    } 
    
    function ModificarUsuario(dni)
    {

        open("http://localhost/Biblos/gusuario/mUsuario.php?dni="+dni);

        return true;
    }     
    
</script> 

