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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Registro</title>
    </head>
    <body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow">
                    <div class="card-body">

                        <h3 class="text-center mb-4">Crear cuenta</h3>

                        <form method="POST">

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                            </div>

                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Registrarse</button>

                        </form>

                        <p class="text-center mt-3">
                            ¿Ya tienes cuenta?
                            <a href="login.php">Iniciar sesión</a>
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
    
    </body>
</html>