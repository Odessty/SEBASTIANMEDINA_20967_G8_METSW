
<?php
include('conexion.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $clave);
    $stmt->execute();
    echo "Usuario registrado. <a href='index.php'>Ingresar</a>";
    exit();
}
?>
<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario" required><br>
    <input type="password" name="clave" placeholder="Contraseña" required><br>
    <button type="submit">Registrar</button>
</form>
