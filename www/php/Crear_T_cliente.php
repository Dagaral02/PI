<?php
include "../backend/database.php";
?>

<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <title> Listado de tareas </title>

    <link rel="stylesheet" href="../css/Crear_tarea.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0 .0/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../Imagen/Icon.png">
    <style type="text/css">

    </style>

    <script type="text/javascript">
    </script>
    <!-- Incluir los archivos JS de jQuery, jQuery UI y Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/p opper.min.js"></script>
</head>

<body>

<div id="general">
    <div id="cuerpo">
        <div id ="encabezado">
            <h1 class="titulo">Crear Tareas</h1>
        </div>
        <div id="contenido">
            <div class="container">
                <form action="../backend/Crear_T_Cliente.php" method="POST">
                    <div class="datos"  style="height: 36px;">
                        <label class="form-label" for="Tarea">Tarea:</label>
                    </div>
                    <div style="margin-left: 71px">
                        <textarea class="form-input" name="Tarea" rows="4" cols="50" placeholder="Escribe tus comentarios aquí"></textarea><br><br>
                    </div>
                    <div class="datos">
                        <label class="form-label" for="Departamento">Departamento:</label>
                        <select class="form-input" name="Departamento" required>
                            <option value="Cliente">Cliente</option>
                        </select><br><br>
                    </div>
                    <div class="datos">
                        <label class="form-label" for="FechaInicio">Fecha de Inicio:</label>

                        <input class="form-input" type="date" name="FechaInicio" required placeholder="dd/mm/aaaa"><br><br>
                    </div>
                    <div class="datos">
                        <label class="form-label" for="Estado">Estado:</label>

                        <select class="form-input" name="Estado" required>
                            <option value="Pendiente">Pendiente</option>
                        </select><br><br>

                    </div>

                    <input class="submit-button" type="submit" value="Crear Tarea">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
