<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-5">
        <h2>Contacto</h2>
        <p>¿Tienes alguna pregunta? Escríbenos y te responderemos lo antes posible.</p>

        <div class="row">
            <div class="col-md-6">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn custom-btn">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h5>Información de contacto</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope"></i> contacto@tiendaropa.com</li>
                    <li><i class="bi bi-telephone"></i> +51 999 999 999</li>
                    <li><i class="bi bi-geo-alt"></i> Lima, Perú</li>
                </ul>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
