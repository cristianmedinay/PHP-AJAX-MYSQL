<?php



function conectarDB(){
    $cadConexion = "mysql:host=localhost;dbname=listaclientes";

    $usuario= "root";
    $pass= "";    
    try {
        $db = new PDO($cadConexion,$usuario,$pass);
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $th) {
        echo "error conectando".$th->getMessage();
    }
}


function getClientes($db){
    $vector = array();

    try {
        $stmt = $db ->query("SELECT * FROM usuarios");
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC) ){
            $vector[] = $fila;
        }
    } catch (PDOException $th) {
        echo "error clientes".$th->getMessage();

    }
    return $vector;
}

function getAceptados($db){
    $vector = array();

    try {
        $stmt = $db ->query("SELECT * FROM solicitudes");
        while($fila = $stmt->fetch(PDO::FETCH_ASSOC) ){
            $vector[] = $fila;
        }
    } catch (PDOException $th) {
        echo "error clientes".$th->getMessage();

    }
    return $vector;
}

function Eliminar($db,$n1,$n2){
    try {
        $stmt = $db->query("DELETE FROM solicitudes where nombre='$n1' and apellido='$n2' ");
        $stmt ->execute();
    } catch (PDOException $th) {
        echo "error clientes".$th->getMessage();

    }
}



function InsertarSolicitud($db,$n1, $n2){
    $sql = "INSERT INTO solicitudes (nombre,apellido) values ('$n1','$n2')";
    //$sql = "INSERT INTO solicitudes (nombre,apellido) values (:nombre,:apellido)";
    try {
    $stmt = $db-> prepare($sql);
    $stmt->bindParam(':nombre',$n1);
    $stmt->bindParam(':apellido',$n2);
    $stmt->execute();
    }catch (PDOException $th) {
        echo "error clientes".$th->getMessage();

    }
    return $db->lastInsertId();
}




?>