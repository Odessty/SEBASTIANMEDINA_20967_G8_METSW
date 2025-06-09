<?php
$conn = new mysqli('localhost', 'root', '', 'control_plagas');
if ($conn->connect_error) {
    // Lanza una excepción o maneja el error sin imprimir nada directamente
    error_log('Conexión fallida: ' . $conn->connect_error); // solo para el log
    header('HTTP/1.1 500 Internal Server Error');
    exit; // salir silenciosamente
}
?>
