<?php
session_start();

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

// Recibir y sanitizar datos del formulario
$nombre = htmlspecialchars($_POST['nombre']);
$correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);
$universidad = htmlspecialchars($_POST['universidad']);
$telefono = htmlspecialchars($_POST['telefono']);
$contrasena_raw = $_POST['contrasena'];
$contrasena = password_hash($contrasena_raw, PASSWORD_DEFAULT);

// Validar campos requeridos
if (!$universidad || !$correo || !$edad || !$telefono || strlen($telefono) < 10) {
    header("Location: ../formularioCuenta.html");
    exit();
}

// Validar correo único
$verificar_correo = $conn->prepare("SELECT user_id FROM usuarios WHERE correo = ?");
$verificar_correo->bind_param("s", $correo);
$verificar_correo->execute();
$verificar_correo->store_result();

if ($verificar_correo->num_rows > 0) {
    header("Location: ../formularioCuenta.html");
    exit();
}
$verificar_correo->close();

// Insertar nuevo usuario
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, edad, universidad, telefono, contrasena) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $nombre, $correo, $edad, $universidad, $telefono, $contrasena);

if ($stmt->execute()) {
    header("Location: ../index.html");
    exit();
} else {
    header("Location: ../formularioCuenta.html");
    exit();
}

$stmt->close();
$conn->close();
?>