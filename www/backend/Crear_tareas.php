<?php
// Incluir el archivo database.php para obtener la conexión a la base de datos
include "../backend/database.php";

// Obtener los datos del formulario
$Departamento = $_POST['Departamento'];
$Tarea = $_POST['Tarea'];
$FechaInicio = $_POST['FechaInicio'];
$Estado = $_POST['Estado'];


$query = "INSERT INTO Tareas (Tarea, FechaInicio, FechaFin, Estado,Departamento) VALUES ('$Tarea','$FechaInicio',null,'$Estado','$Departamento')";
$resultado = mysqli_query($conn, $query);

if (!$resultado) {
    echo "Error al crear la tarea: $Tarea - " . mysqli_error($conn);
}
// Redirigir a la página de tareas_admin.php
header("Location: ../php/tareas_admin.php");

// Cerrar la conexión (si es necesario)
mysqli_close($conn);
?>
