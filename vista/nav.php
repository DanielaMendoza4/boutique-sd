<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">S&D</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="bi bi-house-door"></i> Inicio
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carro.php">
            <i class="bi bi-cart"></i> Carrito
            <?php
              if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
                echo '<span class="badge bg-danger">' . count($_SESSION['carrito']) . '</span>';
              }
            ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-search"></i> Buscar
          </a>
        </li>

        <?php if (isset($_SESSION['usuario'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="../controlador/logout.php">
              <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">
              <i class="bi bi-person"></i> Registro/Login
            </a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="contacto.php">
            <i class="bi bi-envelope"></i> Contacto
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
