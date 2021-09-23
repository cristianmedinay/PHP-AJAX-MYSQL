<?php 


require_once('dbutils.php');
$conexion= conectarDB();

$n1 = $_POST['nombre'];
$n2 = $_POST['apellido'];

InsertarSolicitud($conexion,$n1,$n2);


?>