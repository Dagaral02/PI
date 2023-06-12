<?php
include "../backend/sesion.php";
$departamento = $_SESSION['departamento'];
include "../backend/database.php";
?>

    <!doctype html>
    <html lang="es">

<head>

    <meta charset="utf-8">

    <title> Listado de tareas </title>

    <link rel="stylesheet" href="../css/Modificar_Tarea_Cilente.css">
    <link rel="icon" type="image/png" href="../Imagen/Icon.png">
    <link rel="icon" type="image/png" href="../Imagen/Icon.png">
    <style type="text/css">
    </style>

    <script type="text/javascript">

    </script>

    <!-- Incluir los archivos JS de jQuery, jQuery UI y Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

<div id="general">
    <div id="cuerpo">
        <div id ="encabezado">
            <h1 class="titulo">Modificar tareas</h1>
        </div>
        <div id="contenido">
            <div class="container">
                <form action="../backend/Update_cliente.php" method="POST">
                    <div class="cambios">
                        <label class="form-label" for="CodigoTarea">Código de Tarea:</label>
                        <select class="form-input" name="CodigoTarea" required>
                            <?php
                            // Consulta para obtener los códigos de tarea con estado "Pendiente" o "En Proceso"
                            $query = "SELECT CodigoTarea FROM Tareas WHERE Estado IN ('Pendiente', 'En Proceso') AND Departamento = '$departamento'";
                            $resultado = mysqli_query($conn, $query);

                            if (mysqli_num_rows($resultado) > 0) {
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    echo '<option value="' . $row['CodigoTarea'] . '">' . $row['CodigoTarea'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No hay tareas disponibles</option>';
                            }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="cambios">
                        <label class="form-label" for="FechaFin">Fecha de Finalización:</label>
                        <input class="form-input" type="date" name="FechaFin" placeholder="dd/mm/aaaa"><br><br>
                    </div>
                    <div class="cambios">
                        <label class="form-label" for="Estado">Estado:</label>
                        <select class="form-input" name="Estado" required>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Finalizado">Finalizado</option>
                        </select><br><br>
                    </div>
                    <input class="submit-button" type="submit" value="Subir Cambios">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
