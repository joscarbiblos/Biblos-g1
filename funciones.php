<?php
function controlSesion() {
    // Arrancamos la sesion de forma comun
    session_start();
    if (!$_SESSION['usuario'] || !isset($_SESSION['usuario'])) {
        header("location:indexG.php");
    }
}
function iniciaBD() {
    $sgbd = mysql_pconnect("localhost", "root", "");
    if (!$sgbd)
        die("fallo al conectar a sgbd");
    $db = mysql_select_db("biblos-g1");
    if (!$db)
        die("fallo al conectar a $sgbd");
}
/**
 * @author anonimo
 * @version 1.0
 * @param type $nombreTabla
 * @param type $codCampo
 * @param type $valorCampo
 * @param type $visibles
 * @param numerico $visibles Numero de elementos visibles simultaneamente
 */
function cargardorLista($nombreTabla, $codCampo, $valorCampo, $visibles=1, $opcionSeleccione=null) {
    iniciaBD();
    $query = "SELECT * FROM $nombreTabla";
    $resultado = mysql_query($query);
    $opcion0 = "";


    $select = "<select name='$nombreTabla' size='$visibles' ";
    if ($opcionSeleccione) {
        $select .= "class='Obligado'";
        $opcion0 = "<option value='' SELECTED>$opcionSeleccione";
    }

    $select .= ">";



    //echo "<select name='$nombreTabla' size='$visibles'value='$value'>";
    echo $select;
    echo $opcion0;
    while ($salida = mysql_fetch_array($resultado)) {
        echo "<option value='" . $salida[$codCampo] . "'>" . htmlentities($salida[$valorCampo]) . ' (' . $salida[$codCampo] . ") </option>";
    }
    echo "</select></br>";
}
/**
 * Descripción breve (una línea)
 *
 * Descripción extensa. Todas las líneas que
 * sean necesarias
 * Todas las líneas comienzan con *
  <- Esta línea es ignorada
 *
 * Este DocBlock documenta la función suma()
 * @param string $nombreTabla Recibir el nombre de una tabla de base de datos
 * @param string $codCampo Recibe el nombre de la columna de BD con el id de la tabla
 * @return void
 * @author Nuñez
 * @version 1.0
 * @since 0,9
 *
 */
function cargardorLista2($nombreTabla, $codCampo, $valorCampo1, $valorCampo2, $visibles=1, $opcionSeleccione=null, $strOrden=null) {
    iniciaBD();
    $query = "SELECT * FROM $nombreTabla";
    if($strOrden)
        $query .= " ORDER BY $strOrden";
    
    $resultado = mysql_query($query);
    $opcion0 = "";


    $select = "<select name='" . $nombreTabla . "[]' size='$visibles' ";
    if ($opcionSeleccione) {
        $select .= "class='Obligado'";
        $opcion0 = "<option value='' SELECTED>$opcionSeleccione";
    }

    $select .= ">";
    // $select = $select .">";


    echo $select;
    echo $opcion0;

    while ($salida = mysql_fetch_array($resultado)) {
        echo "<option value='" . $salida[$codCampo] . "-" . strtoupper(substr($salida[$valorCampo1], 0, 3)) . "'>" . htmlentities($salida[$valorCampo1]) . "," . htmlentities($salida[$valorCampo2]) . "</option>";
    }
    echo "</select></br>";
}
function fijaPlantillaCSS() {
    echo "<LINK href='recursos/plantilla" . $_SESSION['tema'] . ".css' rel='stylesheet' type='text/css'>\n";
}
function componeInput($nombreName, $valor, $editable){
          $campo = "<input type='text' name='$nombreName' value='".htmlentities($valor)."' ";
        if (!$editable)
            $campo = $campo . "readonly='readonly' ";
        $campo = $campo . "/>";
        
        return $campo;
        
}
?>