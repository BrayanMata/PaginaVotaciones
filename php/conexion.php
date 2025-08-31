<?php
// Datos de conexión
$host = "localhost";
$dbname = "usuario_votacion";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>