<?php
include("BaseDatos/conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM tareas WHERE id_tarea=$id";
$conexion->query($sql);

header("Location: dashboard.php");
?>