<?php
include "database.php";

$username = $_POST['user'];
$password = $_POST['password'];

// Preparar la consulta SQL
$sql = "SELECT * FROM user WHERE Usuario = ? AND Password = ?";
$stmt = mysqli_prepare($conn, $sql);

// Vincular parámetros a la consulta preparada
mysqli_stmt_bind_param($stmt, "ss", $username, $password);

// Ejecutar la consulta preparada
mysqli_stmt_execute($stmt);

// Obtener resultado de la consulta
$result = mysqli_stmt_get_result($stmt);

// Verificar si se encontró el usuario y contraseña
if(mysqli_num_rows($result) > 0) {
    // Obtener el rol del usuario

    $row = mysqli_fetch_assoc($result);
    $role = $row['Roles'];
    $user = $row['Usuario'];
    $id = $row['CodigoEmpleado'];
    session_start();
    $_SESSION['user'] = $user;
    $_SESSION['role'] = $role;
    $getDepartamentoSQL = "SELECT Departamento FROM Usuarios WHERE CodigoEmpleado = '$id'";
    $getDepartamento = mysqli_query($conn, $getDepartamentoSQL);
    $rowDepartamento = mysqli_fetch_assoc($getDepartamento);
    $_SESSION['departamento'] = $rowDepartamento['Departamento'];
    // Redirigir según el rol del usuario
    if ($role == "Administrador") {
        header("Location: /tareas_admin");
    } elseif ($role == "Usuario") {
        header("Location: /tareas");
    } elseif ($role == "Cliente") {
        header("Location: /cliente");
    }
    exit;
} else {
    // Si no hay resultados en la consulta, el usuario y/o contraseña son incorrectos
    header("Location: /error");
}

// Liberar recursos
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>