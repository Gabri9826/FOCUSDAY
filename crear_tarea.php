<?php
include("BaseDatos/conexion.php");
session_start();

if($_POST){
    $titulo = $_POST['titulo'];

    $sql = "INSERT INTO tareas (titulo) VALUES ('$titulo')";
    $conexion->query($sql);

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Nueva tarea</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body class="bg-light">

        <div class="container mt-5">
            <div class="col-md-5 mx-auto">

                <div class="card shadow">
                    <div class="card-body">

                        <h3 class="mb-4 text-center">Nueva tarea</h3>

                        <form method="POST">
                            <input type="text" name="titulo" class="form-control mb-3" placeholder="Título de la tarea" required>

                            <button class="btn btn-success w-100">Guardar tarea</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        </body>
</html>