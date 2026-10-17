<?php
require_once '../modelo/bd.php';
require_once '../modelo/productos_modelo.php'; 
require_once '../modelo/crear_producto.php'; 

$productos = obtenerProductos();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_producto'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $idproveedor = $_POST['idproveedor'];
    $fecha_ingreso = date('Y-m-d');

    crearProducto($nombre, $descripcion, $precio, $stock, $idproveedor, $fecha_ingreso);
    header("Location: gestion_productos.php"); 
    exit;
}


if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    eliminarProducto($id);
    header("Location: gestion_productos.php"); 
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="../css/diseño2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('nav_admin.php'); ?>
<div class="container mt-5">
    <h2>Gestión de Productos</h2>

    <!-- Formulario para agregar un nuevo producto -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Agregar Nuevo Producto</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" required>
                </div>
                <div class="mb-3">
                    <label for="idproveedor" class="form-label">Proveedor</label>
                    <select class="form-control" id="idproveedor" name="idproveedor" required>
                        
                        <option value="1">P&W</option>
                        <option value="2">Jeans & Denim</option>
                        <option value="3">Proveedor Ropa S.A</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="crear_producto">Crear Producto</button>
            </form>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                    <td>
                        <a href="editar_producto.php?editar=<?php echo $producto['id']; ?>"class="btn btn-warning">Editar</a>
                        <a href="?eliminar=<?php echo $producto['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este producto?')">Eliminar</a>
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
