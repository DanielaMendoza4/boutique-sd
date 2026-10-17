<?php

require_once '../modelo/bd.php';
require_once '../modelo/productos_modelo.php'; 


if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $producto = obtenerProductoPorId($id); 

    
    if (!$producto) {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "ID del producto no proporcionado.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_producto'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $idproveedor = $_POST['idproveedor'];

    
    actualizarProducto($id, $nombre, $descripcion, $precio, $stock, $idproveedor);
    header("Location: gestion_productos.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Producto</h1>
        
        
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>"> <!-- Campo oculto con el ID del producto -->
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $producto['descripcion']; ?></textarea>
            </div>
            
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $producto['stock']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="idproveedor" class="form-label">Proveedor</label>
                <select class="form-control" id="idproveedor" name="idproveedor" required>
                    
                    <option value="1" <?php if ($producto['idproveedor'] == 1) echo 'selected'; ?>>Proveedor 1</option>
                    <option value="2" <?php if ($producto['idproveedor'] == 2) echo 'selected'; ?>>Proveedor 2</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary" name="editar_producto">Editar Producto</button>

            <a href="gestion_productos.php">
            <button type="button" class="btn btn-primary"  >
                Cancelar
            </button>
        </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
