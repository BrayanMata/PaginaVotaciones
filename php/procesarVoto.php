<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["error" => "No has iniciado sesión"]);
    exit();
}

include("conexion.php"); // archivo donde tienes mysqli $conn
$user_id = $_SESSION['user_id'];

// Recibir la institución desde JS
$data = json_decode(file_get_contents("php://input"), true);
$institucion = $data['institucion'] ?? null;

if (!$institucion) {
    echo json_encode(["error" => "Institución no válida"]);
    exit();
}

// Verificar si ya votó
$sql = "SELECT * FROM votos WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["error" => "Ya has votado"]);
    exit();
}

// Insertar el voto
$sql = "INSERT INTO votos (user_id, institucion) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $user_id, $institucion);
$stmt->execute();

// Obtener los nuevos contadores
$sql = "SELECT institucion, COUNT(*) as total FROM votos GROUP BY institucion";
$result = $conn->query($sql);

$conteos = [
    "ITCJ" => 0,
    "TEC" => 0,
    "URN" => 0,
    "UACJ" => 0,
    "UACH" => 0
];

while ($row = $result->fetch_assoc()) {
    $conteos[$row['institucion']] = $row['total'];
}

echo json_encode([
    "success" => true,
    "conteos" => $conteos
]);
?>