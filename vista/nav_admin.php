<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin_dashboard.php">
            <i class="fas fa-user-shield"></i> Admin Panel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="gestion_productos.php">
                        <i class="fas fa-box"></i> Gestionar Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion_usuarios.php">
                        <i class="fas fa-users"></i> Gestionar Usuarios
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="../controlador/logout.php">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
