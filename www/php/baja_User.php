<?php
include "../backend/database.php";
?>

<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <title> Listado de tareas </title>

    <link rel="stylesheet" href="../css/baja_User.css">
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
                <h1 class="titulo">Dar de baja</h1>
            </div>
        </div>
        <div id="contenido" class="panel-scroll">
            <form action="../backend/baja_User.php" method="POST">
            <?php
            // Obtener los datos de la tabla
            $resultado = mysqli_query($conn, "SELECT * FROM Usuarios");

            // Crear la tabla HTML
            echo '<table class="miTabla">';
            echo '<tr><th>Codigo Empleado</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Departamento</th><th>Roles</th></tr>';
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';
                echo '<td>' . $fila['CodigoEmpleado'] . '</td>';
                echo '<td>' . $fila['Nombre'] . '</td>';
                echo '<td>' . $fila['Apellido1'] . '</td>';
                echo '<td>' . $fila['Apellido2'] . '</td>';
                echo '<td>' . $fila['Departamento'] . '</td>';
                echo '<td>' . $fila['Roles'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
            ?>
        </div>
        <div class="boton">
            <input class="submit-button" type="submit" value="Dar de Baja">
            <label class="datos" for="CodigoEmpleado">Codigo Empleado:</label>
            <input type="text" id="CodigoEmpleado" name="CodigoEmpleado" />
        </div>
    </div>
</div>
</body>
</html>
