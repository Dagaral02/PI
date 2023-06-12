<?php
// Incluir el archivo database.php para obtener la conexión a la base de datos
include "../backend/database.php";

// Obtener los datos del formulario
$CodigoEmpleado = $_POST['CodigoEmpleado'];


// Obtener los CodigoEmpleado de todas las personas en el Departamento dado
$query = "DELETE FROM Usuarios WHERE CodigoEmpleado = '$CodigoEmpleado'";
$resultado = mysqli_query($conn, $query);

//Comprobacion
if ($resultado) {
    header("Location: ../php/tareas_admin.php");
} else {
    echo "Error al actualizar los datos: " . mysqli_error($conn);
}

// Cerrar la conexión (si es necesario)
mysqli_close($conn);
?>
