<?php
require_once('dbutils.php');
$conexion= conectarDB();
$lista = getAceptados($conexion);
$aceptados = json_encode($lista);
echo $aceptados;


?>