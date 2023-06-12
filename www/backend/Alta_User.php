<?php
// Incluir el archivo database.php para obtener la conexión a la base de datos
include "../backend/database.php";

// Obtener los datos del formulario
$Nombre = $_POST['Nombre'];
$Apellido1 = $_POST['Apellido1'];
$Apellido2 = $_POST['Apellido2'];
$Departamento = $_POST['Departamento'];
$Roles = $_POST['Roles'];

// Obtener los CodigoEmpleado de todas las personas en el Departamento dado
$query = "insert into Usuarios (Nombre, Apellido1,Apellido2,Departamento,Roles) values ('$Nombre', '$Apellido1','$Apellido2','$Departamento','$Roles')";
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
