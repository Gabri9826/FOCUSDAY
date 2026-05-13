<?php
include("BaseDatos/conexion.php");
session_start();

if(isset($_GET['id'])){

    $id_tarea = $_GET['id'];

    $sql = "UPDATE tareas
           SET estado='completada'
           WHERE id_tarea = $id_tarea";

    if($conexion->query($sql)){
        header("Location: dashboard.php");
        exit();
    }else{
        echo "Error: " . $conexion->error;
    }
}
?>