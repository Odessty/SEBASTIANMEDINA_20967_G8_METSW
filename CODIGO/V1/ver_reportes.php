
<?php
session_start();
include('conexion.php');
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}
$stmt = $conn->prepare("SELECT * FROM reportes WHERE usuario_id=?");
$stmt->bind_param("i", $_SESSION['usuario_id']);
$stmt->execute();
$result = $stmt->get_result();
echo "<h2>Reportes técnicos</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<div><strong>Fecha:</strong> {$row['fecha']}<br>";
    echo "<strong>Ubicación:</strong> {$row['ubicacion']}<br>";
    echo "<strong>Tipo de plaga:</strong> {$row['tipo_plaga']}<br>";
    echo "<strong>Descripción:</strong> {$row['descripcion']}<br>";
    echo "<a href='exportar_pdf.php?id={$row['id']}'>Exportar PDF</a></div><hr>";
}
?>
<p><a href='dashboard.php'>Volver</a></p>
