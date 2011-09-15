<?php
include "../funciones.php";
include "./flibro.php";
controlSesion();
$usuario =  $_SESSION['usuario'];

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>(<?php echo $usuario['nombre_usuario']?>)Librería Online - Gestion de biblioteca   </title>
        <!--<title>Librería Online - Gestion de biblioteca</title><!--
        <script type="text/javascript" src="../js/validaciones1.js"></script>
        <?php fijaPlantillaCSS();
        ?>


        <style type="text/css">@import url(../recursos/calendar.css);</style>  

        <script type="text/javascript" src="../js/calendar.js"></script>
        <script type="text/javascript" src="../js/calendar-es.js"></script>
        <script type="text/javascript" src="../js/calendar-setup.js"></script>
        <script type="text/javascript" src="../js/validaciones1.js"></script>

    </head>
    <body>
        


        <h1>Gestion de libros</h1>
        <p>Los campos con * son obligatorios </p>
        <form action="altalibroP.php" method="post" onSubmit="return ValidaCampoVacioConFormato2(this);">
            <table width="369" border=1 cellpadding="0" cellspacing="0">
                <tr>
                    <td>cod dewey *</td>
                    <td><?php cargardorLista("dewey", "id_categoria_dewey", "categoria_dewey", 1, "Seleccione opcion"); ?>
                        <br></td></tr>
                <tr>
                    <td>Autor</td>
                    <td> <?php cargardorLista2("autor", "id_autor", "apellido1", "nombre_autor", 1, "Seleccione"); ?></td></tr>
                <tr>
                    <td>Editorial</td>
                    <td>
                        <?php cargardorLista("editorial", "id_editorial", "nombre_editorial", 1, "Seleccione opcion"); ?>
                        *<br></td></tr>
                <tr>
                    <td>titulo del libro </td>
                    <td><input type=text name=nombre maxlength=30 size=30 class="Obligado">
                        *<br></td></tr>
                <tr>
                    

                    
                    <th> fecha_publicacion </th>
                    <th> <input type="text" name="fecha_publicacion" id="fecha_publicacion" value="" size="30" />  
                        <input type="button" id="trigger" value="..." /><br></th>
                </tr>
                <tr>
                    <th> fecha_adquisicion  </th>
                    <th> <input type="text" name="fecha_adquisicion" id="fecha_adquisicion" value="" size="30" />  
                        <input type="button" id="trigger2" value="..." /><br></th>
                </tr>
                <td>sinopsis*</td>
                <td>
                    <textarea name="sinopsis" rows="4" cols="20">
                    </textarea>
                    <br></td></tr>
                <tr>
                    <td>isbn</td>
                    <td><input type=text name=isbn maxlength=30 size=30>
                        *<br></td></tr>
                <tr>
                    <td>numero_paginas</td>
                    <td><input type=text name=numero_paginas maxlength=30 size=30>
                        *<br></td></tr>



                <tr>
                    <td><input name="submit" type=submit value="Confirmar"></td>
                    <td><label>
                            <input name="limpiar" type="reset" id="limpiar" value="Limpiar campos">
                        </label></td>
                </tr>
            </table>
        </form>
        <p><a href="index.php">Volver a menu</a></p>
        <a href='../mostrarusuario.php'> perfil usuario ?</a></p>
    <a href='../mostrarFichaLibro.php'>ver todos los libros</a></p>
</body>

<script type="text/javascript">

    Calendar.setup(
    {
        inputField  : "fecha_publicacion",
        ifFormat    : "%d/%m/%Y",
        button      : "trigger"          
    });
        
    Calendar.setup(
    {
        inputField  : "fecha_adquisicion",
        ifFormat    : "%d/%m/%Y",
        button      : "trigger2"          
    });        

    function Valida( formulario ) {
        var valido=true;
        var i=0, strCamposVacios;
        var camposVacios=new Array();
            
        if (formulario.nombre_titulo.value == '') {
            strCamposVacios=formulario.nombre_titulo.name;
            i++;
            valido=false;
        }
            
        if(i>0){
            var mensaje="("+i+") - Faltan los siguientes campos obligatorios:\n"
            window.alert(mensaje+strCamposVacios);
        }
        return valido;
    } 
</script>
</html>