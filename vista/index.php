<?php
session_start();
include('../modelo/bd.php');  


$query = "SELECT * FROM productos";
$stmt = $base->prepare($query);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Ropa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="../css/estilo.css" rel="stylesheet" />
</head>
<body>

  <?php include('nav.php'); ?>

  
  <?php if (isset($_GET['mensaje'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="mensaje">
      <?php echo $_GET['mensaje']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
      
      setTimeout(function() {
        var alert = document.getElementById('mensaje');
        alert.style.opacity = 0;
      }, 1000);
    </script>
  <?php endif; ?>

  <div class="container mt-5">
  <div class="row">
    <?php foreach ($productos as $producto): ?>
      <div class="col-md-4">
        <div class="card">
          <!-- Cargar la imagen del producto desde la base de datos -->
          <img src="../imagenes/<?php echo htmlspecialchars($producto['imagen'], ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top" alt="Producto <?php echo $producto['id']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8'); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($producto['descripcion'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="card-text"><strong>Precio: $<?php echo htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
            
            <?php if (isset($_SESSION['usuario'])): ?>
              <a href="../modelo/agregar_carrito.php?id=<?php echo $producto['id']; ?>" class="btn btn-primary">Agregar al Carrito</a>
            <?php else: ?>
              <p class="text-danger">¡Debes iniciar sesión para agregar al carrito!</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

  <?php include('footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
