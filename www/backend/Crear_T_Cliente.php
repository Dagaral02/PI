<?php
// Incluir el archivo database.php para obtener la conexión a la base de datos
include "../backend/database.php";

// Obtener los datos del formulario
$Departamento = $_POST['Departamento'];
$Tarea = $_POST['Tarea'];
$FechaInicio = $_POST['FechaInicio'];
$Estado = $_POST['Estado'];

// Obtener los CodigoEmpleado de todas las personas en el Departamento dado
$queryEmpleados = "SELECT CodigoEmpleado FROM Usuarios WHERE Departamento = '$Departamento'";
$resultadoEmpleados = mysqli_query($conn, $queryEmpleados);

$query = "INSERT INTO Tareas (Tarea, FechaInicio, FechaFin, Estado,Departamento) VALUES ('$Tarea','$FechaInicio',null,'$Estado','$Departamento')";
$resultado = mysqli_query($conn, $query);

if (!$resultado) {
    echo "Error al crear la tarea: $Tarea - " . mysqli_error($conn);
}
// Redirigir a la página de tareas_admin.php
header("Location: /cliente");

// Cerrar la conexión (si es necesario)
mysqli_close($conn);
?>
