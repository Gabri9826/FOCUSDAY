<?php
include("BaseDatos/conexion.php");

if($_POST){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (nombre, email, contraseña)
    VALUES ('$nombre', '$email', '$password')";

    if($conexion->query($sql)){
        echo "Usuario registrado correctamente";
    }else{
        echo "Error: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
    </head>
    <body>
        <h2>Registro de usuario</h2>
        <form method="POST">
            <input type="text" name="nombre" placeholder="nombre" required>
            <br>
            <br>
            <input type="email" name="email" placeholder="email" required>
            <br>
            <br>
            <input type="password" name="password" placeholder="contraseña" required>
            <br>
            <br>
            <button type="submit">Registrarse</button>
        </form>
    </body>
</html>