<?php
session_start();


if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include('nav_admin.php'); ?>
    <header class="bg-dark text-white text-center py-4">
        <h1>Bienvenido al Dashboard de Administrador</h1>
        <p>¡Has iniciado sesión correctamente!</p>
    </header>

    <div class="container mt-5">
        <h2>Gestión del Sistema</h2>
        <div class="row">
            <!-- Enlace a productos -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gestionar Productos</h5>
                        <p class="card-text">Añadir, editar o eliminar productos de la tienda.</p>
                        <a href="gestion_productos.php" class="btn btn-primary">Gestionar Productos</a>
                    </div>
                </div>
            </div>
            <!-- Enlace a usuarios -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gestionar Usuarios</h5>
                        <p class="card-text">Ver y administrar los usuarios registrados en la página.</p>
                        <a href="gestion_usuarios.php" class="btn btn-primary">Gestionar Usuarios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
