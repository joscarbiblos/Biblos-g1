<?php
include "../funciones.php";
include "flibro.php";
controlSesion();
$usuario=$_SESSION['usuario'];
echo "Usuario:" . $usuario['nombre_usuario'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> (<?php echo $usuario['nombre_usuario']?>)Consulta espec&iacute;fica</title>
    </head>
    <body>
        <a href='../mostrarusuario.php'>.perfil</a>
       <form action='cespecificaP.php' method='POST'>

            <fieldset>
                <legend>Consulta espec&iacute;fica</legend>
                <fieldset>
                    <legend>Tipo de busqueda</legend>
                
                <input type='radio' name='tipo_busqueda' value='1'>Dewey
                <input type='radio' name='tipo_busqueda' value='2' checked>Titulo
                </fieldset>
                
                
                </select>
                <h3>Datos de la busqueda</h3>
                
                <label>Introduzca los datos:<p>
                </label><input type='text' name='busqueda' size='25' maxlength='25'><br>
                <br><input type='submit' name='Envio' value='Envio'>
                <input type='reset' value='Limpiar campos'>
            </fieldset>
           
        </form>
        <p><a href="index.php">Volver a listado general de gesti&oacute;n de libros</a>
   <a href="../menuG.php">Volver a menu principal</a></p>
    </body>
</html>
