<?php
    include "../backend/sesion.php";
    if ($_SESSION['role'] != "Administrador") {
        header("Location: ../html/error.html");
        exit;
    }
    include "../backend/database.php";
?>

<!doctype html>
<html lang="es">

    <head>

        <meta charset="utf-8">

        <title> Listado de tareas </title>

        <link rel="stylesheet" href="../css/tareas_admin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="../Imagen/Icon.png">
        <style type="text/css">

        </style>

        <script type="text/javascript">

        </script>

        <!-- Incluir los archivos JS de jQuery, jQuery UI y Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>

    <body>

        <div id="general">
            <div id="cuerpo">
                <div id ="encabezado" class="col-md-12">
                    <div class="col-md-8">
                        <h1 class="titulo">Lista de tareas</h1>
                    </div>
                    <div class="dropdown col-md-4">
                        <button onclick="myFunction()" class="btn dropbtn" style="width: 100%;">Opciones</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="nuevaTarea">Crear Tarea</a>
                            <a href="alta">Dar de Alta Usuario</a>
                            <a href="baja">Dar de baja Usuario</a>
                        </div>
                    </div>
                    <script>
                        /* When the user clicks on the button,
                        toggle between hiding and showing the dropdown content */
                        function myFunction() {
                            document.getElementById("myDropdown").classList.toggle("show");
                        }

                        // Close the dropdown if the user clicks outside of it
                        window.onclick = function(event) {
                            if (!event.target.matches('.dropbtn')) {
                                var dropdowns = document.getElementsByClassName("dropdown-content");
                                var i;
                                for (i = 0; i < dropdowns.length; i++) {
                                    var openDropdown = dropdowns[i];
                                    if (openDropdown.classList.contains('show')) {
                                        openDropdown.classList.remove('show');
                                    }
                                }
                            }
                        }
                    </script>
                </div>
                <div id="contenido" class="panel-scroll">
                        <?php
                        // Obtener los datos de la tabla
                        $resultado = mysqli_query($conn, "SELECT CodigoTarea, Tarea, FechaInicio, FechaFin, Estado FROM Tareas");

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
                    <button type="button" class="boton_down btn" onclick="logout()">Cerrar sesión</button>
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