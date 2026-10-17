<?php
require_once '../modelo/bd.php';
require_once '../modelo/usuarios_modelo.php';


$usuarios = obtenerUsuarios();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_usuario'])) {
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];

    crearUsuario($usuario, $rol, $correo, $telefono, $contraseña);
    header("Location: gestion_usuarios.php"); 
}


if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    eliminarUsuario($id);
    header("Location: gestion_usuarios.php"); 
}


if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $usuario = obtenerUsuarioPorId($id);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="../css/diseño2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('nav_admin.php'); ?>
<div class="container mt-5">
    <h2>Gestión de Usuarios</h2>

    <!-- Formulario para agregar o editar un usuario -->
    <div class="card mb-4">
        <div class="card-header">
            <h4><?php echo isset($usuario) ? 'Editar Usuario' : 'Crear Nuevo Usuario'; ?></h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" 
                           value="<?php echo isset($usuario) ? $usuario['usuario'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-control" id="rol" name="rol" required>
                        <option value="cliente" <?php echo isset($usuario) && $usuario['rol'] === 'cliente' ? 'selected' : ''; ?>>Cliente</option>
                        <option value="admin" <?php echo isset($usuario) && $usuario['rol'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" 
                           value="<?php echo isset($usuario) ? $usuario['correo'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" 
                           value="<?php echo isset($usuario) ? $usuario['telefono'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary" name="crear_usuario">
                    <?php echo isset($usuario) ? 'Actualizar Usuario' : 'Crear Usuario'; ?>
                </button>

        <a href="gestion_usuarios.php">
            <button type="button" class="btn btn-primary"  >
                Cancelar
            </button>
        </a>
    </div>
            </form>
        </div>
    </div>

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($usuarios as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['usuario']; ?></td>
            <td><?php echo $user['rol']; ?></td>
            <td><?php echo $user['correo']; ?></td>
            <td><?php echo $user['telefono']; ?></td>
            <td>
                <!-- Enlace para editar usuario -->
                <a href="?editar=<?php echo $user['id']; ?>" class="btn btn-warning">Editar</a>
                
                <!-- Enlace para eliminar usuario -->
                <a href="?eliminar=<?php echo $user['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
