<?php
session_start();
include("BaseDatos/conexion.php");

//Proteger Acceso
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$nombreUsuario = $_SESSION['usuario'];
$id_usuario = (int) $_SESSION['id_usuario'];

//Consultar tareas del usuario
$sql = "SELECT * FROM tareas
        WHERE id_usuario = $id_usuario
        ORDER BY fecha DESC";

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

        <!-- CABECERA -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2>👋 Bienvenido, <?php echo $nombreUsuario; ?></h2>

                <p class="text-muted">Organiza tu dia de forma eficiente</p>

            </div>

            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>

        </div>

        <!-- BOTON CREAR -->
        <div class="mb-4">

            <a href="crear_tarea.php" class="btn btn-primary">Nueva tarea</a>

        </div>

        <!-- LISTADO -->
        <div class="card shadow">

            <div class="card-body">

                <h4 class="mb-4">📝 Tus tareas</h4>

                <?php if($resultado->num_rows > 0): ?>

                    <?php while($tarea = $resultado->fetch_assoc()): ?>

                        <?php
                            // COLOR SEGUN PRIORIDAD
                            $color = "secondary";

                            if($tarea['prioridad'] == "alta"){
                                $color = "danger";

                            }elseif($tarea['prioridad'] == "media"){
                                $color = "warning";

                            }else{
                                $color = "success";
                            }
                    ?>

                    <div class="card mb-3 border-0 shadow-sm">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-start">

                                <!-- INFO -->
                                <div>

                                    <h5 class="card-title">
                                        <?php echo $tarea['titulo']; ?>
                                    </h5>

                                    <p class="card-text">
                                        <?php echo $tarea['descripcion']; ?>
                                    </p>

                                    <!-- PRIORIDAD -->
                                    <span class="badge bg-<?php echo $color; ?>">
                                        <?php echo ucfirst($tarea['prioridad']); ?>
                                    </span>

                                    <!-- ESTADO -->
                                    <span class="badge bg-dark">
                                        <?php echo ucfirst($tarea['estado']); ?>
                                    </span>

                                    <!-- FECHA -->
                                    <div class="mt-2 text-muted">

                                        📆 Fecha límite:
                                        <?php echo $tarea['fecha_limite']; ?>

                                    </div>

                                </div>

                                <!-- BOTON -->
                                <div>

                                    <a href="eliminar_tarea.php?id=<?php echo $tarea['id_tarea']; ?>"
                                       class="btn btn-danger btn-sm">
                                       Eliminar
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                <?php endwhile; ?>

            <?php else: ?>

                <div class="alert alert-info">
                    No tienes tareas todavía.
                    ¡Empieza creando una!
                </div>

            <?php endif; ?>

            </div>

        </div>

    </div>
    
    </body>
</html>