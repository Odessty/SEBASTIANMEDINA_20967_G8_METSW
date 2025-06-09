
<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Ingreso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">TKC DESINFECCIONES</a>
    </div>
</nav>
<div class="container" style="margin-top: 100px;">
    <h2 class="text-center">Ingreso</h2>
    <form method="POST" action="dashboard.php" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="clave" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        <p class="text-center mt-3"><a href="registrar.php">Registrarse</a></p>
        <p class="text-center mt-2"><button type="button" class="btn btn-secondary" onclick="toggleTheme()">Modo Claro/Oscuro</button></p>
    </form>
</div>
<script>
function toggleTheme() {
    const html = document.documentElement;
    html.setAttribute('data-bs-theme', html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark');
}
</script>
</body>
</html>
