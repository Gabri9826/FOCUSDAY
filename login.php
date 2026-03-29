<?php
include("BaseDatos/conexion.php");

session_start();

if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios
            WHERE email='$email' AND contraseña='$password'";

    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $usuario = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $usuario['nombre'];
        echo "Bienvenido " . $usuario['nombre'];

    }else{
        echo "Credenciales incorrectas";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Iniciar sesión</h2>

        <form method="POST">
            <input type="email" name="email" placeholder="email" required>
            <br>
            <br>
            <input type="password" name="password" placeholder="contraseña" required>
            <br>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </body>
</html>