<?php
include("BaseDatos/conexion.php");
session_start();

// Proteger acceso
if(!isset($_SESSION['usuario'])){
    header("Location:login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// Guardar tarea
if($_POST){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $prioridad = $_POST['prioridad'];
    $fecha_limite = $_POST['fecha_limite'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO tareas
           (titulo, descripcion, prioridad, fecha_limite, estado, id_usuario)
           VALUES
           ('$titulo', '$descripcion', '$prioridad', '$fecha_limite', '$estado', '$id_usuario')";

    if($conexion->query($sql)){
        header("Location: dashboard.php");
        exit();
    }else{
        echo "Error al crear tarea: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Crear tarea</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body class="bg-light">

        <div class="container mt-5">

            <div class="row justify-content-center">

                <div class="col-md-6">

                    <div class="card shadow">

                        <div class="card-body">

                            <h2 class="text-center mb-4">📝 Nueva tarea</h2>

                            <form method="POST">

                                <!-- TITULO -->
                                 <div class="mb-3">
                                    <label class="form-label">Título</label>

                                    <input type="text" name="titulo" class="form-control" placeholder="Introduce el título" required>
                                 </div>

                                 <!--DESCRIPCIÓ<N-->
                                 <div class="mb-3">
                                    <label class="form-label">Descripción</label>

                                    <textarea name="descripcion" class="form-control" rows="4" placeholder="Describe la tarea"></textarea>
                                 </div>

                                 <!--Prioridad-->
                                 <div class="mb-3">
                                    <label class="form-label">Prioridad</label>

                                    <select name="prioridad" class="form-control">

                                        <option value="baja">Baja</option>

                                        <option value="media" selected>Media</option>

                                        <option value="alta">Alta</option>

                                    </select>
                                 </div>

                                 <!--Fecha Limite-->
                                 <div class="mb-3">
                                    <label class="form-label">Fecha límite</label>

                                    <input type="date" name="fecha_limite" class="form-control">
                                 </div>
                                 
                                 <!--Estado-->
                                 <div class="mb-4">
                                    <label class="form-label">Estado</label>

                                    <select name="estado" class="form-control">

                                        <option value="pendiente" selected>Pendiente</option>

                                        <option value="completada">Completada</option>

                                    </select>
                                 </div>
                                 
                                 <!--Botones-->
                                 <div class="d-grid gap-2">

                                    <button type="submit" class="btn btn-primary">Crear tarea</button>

                                    <a href="dashboard.php" class="btn btn-secondary">Volver al dashboard</a>

                                 </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        </body>
</html>