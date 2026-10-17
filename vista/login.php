<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
   
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <?php include ('nav.php');?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="max-width: 400px; width: 100%;">
            <div class="card-body">
                <h2 class="text-center mb-4">Iniciar sesión</h2>
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
                <?php if (isset($_GET['mensaje'])): ?>
                    <div class="alert alert-success"><?php echo htmlspecialchars($_GET['mensaje'], ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
                <form action="../modelo/login_action.php" method="POST">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo:</label>
                        <input type="email" name="correo" id="correo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña:</label>
                        <input type="password" name="contraseña" id="contraseña" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn custom-btn">Iniciar sesión</button>
                    </div>
                </form>
                <p class="text-center">¿Aún no te has registrado? <a href="registro.php" class="text-decoration-none">Registrarse</a></p>
            </div>
        </div>
    </div>
    <?php include ('footer.php'); ?>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>