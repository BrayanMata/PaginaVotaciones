<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Inicializar los conteos
$conteos = [
    "ITCJ" => 0,
    "TEC" => 0,
    "URN" => 0,
    "UACJ" => 0,
    "UACH" => 0
];

// Consultar los votos
$sql = "SELECT institucion, COUNT(*) as total FROM votos GROUP BY institucion";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $conteos[$row['institucion']] = $row['total'];
}

// Revisar si el usuario ya votó
$sql2 = $conn->prepare("SELECT institucion FROM votos WHERE user_id = ?");
$sql2->bind_param("i", $user_id);
$sql2->execute();
$res2 = $sql2->get_result();
$usuario_voto = null;
if($res2->num_rows > 0){
    $row = $res2->fetch_assoc();
    $usuario_voto = $row['institucion'];
}

echo json_encode(["conteos" => $conteos, "usuario_voto" => $usuario_voto]);

?>