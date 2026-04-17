
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
        header("Location: dashboard.php");
        exit();

    }else{
        echo "Credenciales incorrectas";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body class="bg-light">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">

                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="text-center mb-4">Iniciar sesión</h3>

                            <form method="POST">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>

                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>