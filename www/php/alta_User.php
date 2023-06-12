<?php
include "../backend/database.php";
?>

<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <title> Listado de tareas </title>

    <link rel="stylesheet" href="../css/alta_User.css">
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
            <h1 class="titulo">Alta de Usuarios</h1>
        </div>
        <div id="contenido">
            <div class="container">
                <form action="../backend/Alta_User.php" method="POST">
                    <div class="datos"  style="margin-bottom: 0px">
                        <label class="form-label" for="Tarea">Nombre:</label>
                        <input type="text" id="Nombre" name="Nombre" />
                    </div>
                    <div class="datos"  style="margin-bottom: 0px">
                        <label class="form-label" for="Apellido1">Apellido1:</label>
                        <input type="text" id="Apellido1" name="Apellido1" />
                    </div>
                    <div class="datos"  style="margin-bottom: 0px">
                        <label class="form-label" for="Apellido2">Apellido2:</label>
                        <input type="text" id="Apellido2" name="Apellido2" />
                    </div>
                    <div class="datos">
                        <label class="form-label" for="Departamento">Departamento:</label>
                        <select class="form-input" name="Departamento" required>
                            <?php
                            // Consulta para obtener los departamentos
                            $query = "SELECT * FROM Departamento";
                            $resultado = mysqli_query($conn, $query);

                            if (mysqli_num_rows($resultado) > 0) {
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    echo '<option value="' . $row['Departamento'] . '">' . $row['Departamento'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No hay departamentos disponibles</option>';
                            }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="datos">
                        <label class="form-label" for="Roles">Estado:</label>
                        <select class="form-input" name="Roles" required>
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select><br><br>

                    </div>
                    <input class="submit-button" type="submit" value="Dar de Alta">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
