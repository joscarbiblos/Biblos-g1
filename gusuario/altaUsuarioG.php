<?php
include "../funciones.php";
include "fusuario.php";
controlSesion();

?>

<html>
    <head>
        <title>Librer&iacute;a Online - Gestion de biblioteca </title>
    </head>
    <body>


        <h1>Gestion de usuarios</h1>
        <p>Los campos con * son obligatorios </p>
        <form action="altaUsuarioP.php" method="post">
            <table width="369" border=1 cellpadding="0" cellspacing="0">
                <tr>
                    <td>dni</td>
                    <td><input type=text name=dni maxlength=9 size=9>
                        *<br></td></tr>
                <tr>
                    <td>clave</td>
                    <td><input type=password name=clave maxlength=30 size=30>
                        *<br></td></tr>
                <tr>
                    <td>direccion</td>
                    <td> <input type=text name="direccion" maxlength=30 size=30>
                        *<br></td></tr>
                <tr>
                    <td>nombre usuario</td>
                    <td><input type=text name=nombre_usuario maxlength=30 size=30>
                        *<br></td></tr>
                <tr>
                    <td>apellido1</td>
                    <td> <input type=text name=apellido1_usuario maxlength=30 size=30>
                        *<br></td></tr>
                <tr>
                    <td>apellido2</td>
                    <td> <input type=text name=apellido2_usuario maxlength=30 size=30>
                        *<br></td></tr>

                <tr>
                    <td>telefono</td>
                    <td><input type=text name=telefono maxlength=30 size=30>
                        *<br></td></tr> 
                <tr>
                    <td>email</td>
                    <td> <input type=text name=email maxlength=30 size=30>
                        *<br></td></tr>


                <tr>
                    <td>administrador ?</td>
                    <td><?php cargardorLista("usuario", "es_administrador", "1", "seleccione"); ?>
                        <br></td></tr> 
                <tr>
                    <td>plantilla</td>
                    <td>
                        <?php cargardorLista("plantilla", "id_plantilla", "nombre_plantilla", "1", "seleccione"); ?>                      
                        <br></td></tr>
                <tr>
                    <td><input name="submit" type=submit value="Confirmar"></td>
                    <td><label>
                            <input name="limpiar" type="reset" id="limpiar" value="Limpiar campos">
                        </label></td>
                </tr>
            </table>
        </form>
    <p><a href="../menuG.php">Volver a menu</a>
    <a href='../mostrarusuario.php'> perfil usuario ?></a></p>
   
    </body>
</html>