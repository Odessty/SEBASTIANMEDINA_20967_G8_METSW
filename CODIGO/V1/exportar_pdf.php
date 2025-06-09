<?php
ob_start(); // ← IMPORTANTE: inicia el buffer

require_once('tcpdf/tcpdf.php');
include('conexion.php');

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM reportes WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

$html = "<h1>Reporte Técnico</h1>";
$html .= "<strong>Fecha:</strong> {$data['fecha']}<br>";
$html .= "<strong>Ubicación:</strong> {$data['ubicacion']}<br>";
$html .= "<strong>Tipo de plaga:</strong> {$data['tipo_plaga']}<br>";
$html .= "<strong>Descripción:</strong><br>{$data['descripcion']}";

$pdf->writeHTML($html, true, false, true, false, '');

ob_end_clean(); // ← IMPORTANTE: limpia cualquier salida antes de enviar el PDF

$pdf->Output('reporte.pdf', 'I');
?>
