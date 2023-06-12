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

        <link rel="stylesheet" href="../css/tareas.css">
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
                    <h1 class="titulo">Lista de tareas</h1>
                    <form method="POST" action="modificar">
                        <input type="submit" name="modificar" value="Modificar" class="boton">
                    </form>
                </div>
                <div id="contenido" class="panel-scroll">
                    <?php
                    // Obtener los datos de la tabla
                    $resultado = mysqli_query($conn, "SELECT CodigoTarea, Tarea, FechaInicio, FechaFin, Estado FROM Tareas WHERE Estado IN ('Pendiente', 'En Proceso') AND Departamento = '$departamento'");

                    // Crear la tabla HTML
                    echo '<table class="miTabla">';
                    echo '<tr><th>Codigo Tarea</th><th>Tarea</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Estado</th></tr>';
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo '<tr>';
                        echo '<td>' . $fila['CodigoTarea'] . '</td>';
                        echo '<td>' . $fila['Tarea'] . '</td>';
                        echo '<td>' . $fila['FechaInicio'] . '</td>';
                        echo '<td>' . ($fila['FechaFin'] ? $fila['FechaFin'] : 'XX-XX-XX') . '</td>';
                        echo '<td>' . $fila['Estado'] . '</td>';

                        echo '</tr>';
                    }

                    echo '</table>';

                    // Cerrar la conexión a la base de datos
                    mysqli_close($conn);
                    ?>


                </div>
                <div id="cerrarsesion">
                    <button type="button" class="boton_down" onclick="logout()">Cerrar sesión</button>
                </div>

                <script>
                    function logout() {
                        window.location.href = "../backend/logout.php";
                    }
                </script>
            </div>
        </div>
    </body>
</html>