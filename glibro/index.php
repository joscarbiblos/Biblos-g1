<?php
include_once "../funciones.php";
include "flibro.php";
controlSesion();
$usuario =  $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>(<?php echo $usuario['nombre_usuario']?>) men&uacute; General</title>
        <link rel="stylesheet" type="text/css" href="./recursos/reset.css" />
<link rel="stylesheet" type="text/css" href="./recursos/style.css" />
    </head>
    <body>
        <div id="wrap">
            <div id="wrap">
        <h1 id="logo">Aministracion<span>libros en biblioteca</span></h1>
        <ul><li><a href='altalibroG.php'><img src='../imagen/cruzverde.jpg' width="2%" alt="Alta de titulo" title="Alta de titulo"></a></li>
        <li><a href='../menuG.php'>Menu General  </a></li>
        <li><a href='cespecificaG.php'>Consulta Espec&iacute;fica</a></li>
          </div>
            
      <div id="content">
            <h2>listado</h2>
          <table border=1>
            <th>M</th><th>B</th>
            <th>dewey</th><th>titulo</th><th>autor</th>
            <th>editorial</th><th>nombre </th><th>sinopsis </th>
            <th>isbn</th>  <th>fecha adquisicion</th>  <th>fecha publicacion</th>
     </div> 
            </div>
            <?php
            rellenalibroConOpciones();
            ?>
        </table>
        <br><a href='altalibroG.php'><img src='../imagen/cruzverde.jpg' alt="Alta de titulo" title="Alta de titulo"></a>
        
        <br><a href='../menuG.php'>Menu General</a>
    </body>
</html>
