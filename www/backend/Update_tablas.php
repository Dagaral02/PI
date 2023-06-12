<?php
// Incluir el archivo database.php para obtener la conexión a la base de datos
include "../backend/database.php";

// Obtener los datos del formulario
$CodigoTarea = $_POST['CodigoTarea'];
$FechaFin = $_POST['FechaFin'];
$Estado = $_POST['Estado'];

// Verificar si el valor de FechaFin está presente en la solicitud POST
if (empty($FechaFin)) {
    $FechaFin = "NULL";
} else {
    // Escapar el valor de FechaFin para evitar inyección de SQL
    $FechaFin = mysqli_real_escape_string($conn, $FechaFin);
    // Agregar comillas simples alrededor de la fecha para la consulta SQL
    $FechaFin = "'" . $FechaFin . "'";
}

// Actualizar los datos en la tabla Tarea
$query = "UPDATE Tareas SET FechaFin = $FechaFin, Estado = '$Estado' WHERE CodigoTarea = '$CodigoTarea'";
$resultado = mysqli_query($conn, $query);

if ($resultado) {
    header("Location: /tareas");
} else {
    echo "Error al actualizar los datos: " . mysqli_error($conn);
}

// Cerrar la conexión (si es necesario)
mysqli_close($conn);
?>
