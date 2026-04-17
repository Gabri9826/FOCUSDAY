<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="bg-light">

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Hola, <?php echo $_SESSION['usuario']; ?> 👋</h2>
            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <h4 class="mb-3">Tus tareas</h4>

                <p>Aquí aparecerán tus tareas próximamente...</p>

                <a href="crear_tarea.php" class="btn btn-primary">+ Nueva tarea</a>
            </div>
        </div>

    </div>

    </body>
</html>