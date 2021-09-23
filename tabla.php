<?php 
require_once('dbutils.php');
$conexion= conectarDB();
$datos = getClientes($conexion);

$arrayvacio=array();

    foreach ($datos as $key => $value) {
        $arrayvacio[]=array(
                'id'=>$value['id'],
                'name'=>$value['nombre'],
                'lastname'=>$value['apellido'],
        );
    }
    $codi = json_encode($arrayvacio);
    echo $codi;


?>