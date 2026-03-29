<?php
$conexion = new mysqli("localhost", "root", "", "focusday");

if($conexion->connect_error){
    die("Error de conexion: " . $conexion->connect_error);
}
?>