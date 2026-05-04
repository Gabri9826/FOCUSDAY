<?php
session_start();
include("BaseDatos/conexion.php");

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$nombreUsuario = $_SESSION['usuario'];
$id_usuario = (int) $_SESSION['id_usuario'];

$sql = "SELECT * FROM tareas
        WHERE id_usuario = $id_usuario
        ORDER BY id_tarea DESC";

$resultado = $conexion->query($sql);
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
            <div>
                <h2>👋 Bienvenido, <?php echo $nombreUsuario; ?></h2>
                <p class ="text-muted">Organiza tu día de forma eficiente</p>
            </div>
            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>

        <div class="mb-4">
            <a href="crear_tarea.php" class="btn btn-primary">+ Nueva tarea</a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <h4 class="mb-3">📝 Tus tareas</h4>

                <?php if($resultado->num_rows > 0): ?>

                    <ul class="list-group">

                        <?php while($tarea = $resultado->fetch_assoc()): ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <span>
                                    <?php echo $tarea['titulo']; ?>
                                </span>

                                <a href="eliminar_tarea.php?id=<?php echo $tarea['id_tarea']; ?>"
                                    class="btn btn-sm btn-danger">
                                    Eliminar
                                </a>

                            </li>

                        <?php endwhile; ?>

                    </ul>
                
                <?php else: ?>

                    <div class="alert alert-info">
                        No tienes tareas todavía. ¡Empieza creando una!
                    </div>

                <?php endif; ?>

            </div>
        </div>

    </div>

    </body>
</html>