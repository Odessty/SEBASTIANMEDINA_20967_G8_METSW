
<?php
session_start();
include('conexion.php');
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}
$stmt = $conn->prepare("INSERT INTO reportes (usuario_id, fecha, ubicacion, tipo_plaga, descripcion) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $_SESSION['usuario_id'], $_POST['fecha'], $_POST['ubicacion'], $_POST['tipo_plaga'], $_POST['descripcion']);
$stmt->execute();
header("Location: dashboard.php");
exit();
?>
