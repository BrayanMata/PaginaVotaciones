<?php
session_start();

// Conexión a la base de datos
require "conexion.php";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$correo = trim($_POST['correo']);
$contrasena = trim($_POST['contrasena']); 

// Buscar usuario por correo
$stmt = $conn->prepare("SELECT user_id, nombre, contrasena FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

if (password_verify($contrasena, $usuario['contrasena'])) {
    $_SESSION['user_id'] = $usuario['user_id'];
    $_SESSION['nombre'] = $usuario['nombre'];

    header("Location: ../votacion.php");
    exit();
} else {
        header("Location: ../index.html");
        exit();
    }
} else {
    header("Location: ../index.html");
    exit();
}

$stmt->close();
$conn->close();
?>