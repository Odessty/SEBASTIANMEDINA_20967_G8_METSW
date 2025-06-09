
<?php
session_start();
include('conexion.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username=?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($user = $result->fetch_assoc()) {
        if (password_verify($clave, $user['password'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['usuario_id'] = $user['id'];
        } else {
            die("Contraseña incorrecta");
        }
    } else {
        die("Usuario no encontrado");
    }
}
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Control de Plagas</a>
        <div class="d-flex">
            <a href="logout.php" class="btn btn-outline-light ms-2">Cerrar sesión</a>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 100px;">
    <h2 class="text-center">Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
    <div class="card mt-4 mx-auto" style="max-width: 600px;">
        <div class="card-header">Crear Reporte Técnico</div>
        <div class="card-body">
            <form method="POST" action="crear_reporte.php">
                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="fecha" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ubicación</label>
                    <input type="text" name="ubicacion" class="form-control" placeholder="Ubicación" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de Plaga</label>
                    <input type="text" name="tipo_plaga" class="form-control" placeholder="Tipo de plaga" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" placeholder="Descripción detallada" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Guardar Reporte</button>
            </form>
            <div class="text-center mt-3">
                <a href="ver_reportes.php" class="btn btn-secondary">Ver Reportes</a>
            </div>
        </div>
    </div>
</div>
<script>
function toggleTheme() {
    const html = document.documentElement;
    html.setAttribute('data-bs-theme', html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark');
}
</script>
</body>
</html>
