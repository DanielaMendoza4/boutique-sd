<?php
require_once 'bd.php';

function obtenerProductos() {
    global $base;
    $query = "SELECT * FROM productos";
    return $base->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

function eliminarProducto($id) {
    global $base;  

    
    $sql = "DELETE FROM productos WHERE id = :id";
    $stmt = $base->prepare($sql);  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    
    if ($stmt->execute()) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto.";
    }
}

function actualizarProducto($id, $nombre, $descripcion, $precio, $stock, $idproveedor) {
    global $base;  
    
    $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, idproveedor = :idproveedor WHERE id = :id";
    $stmt = $base->prepare($sql);  
    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
    $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
    $stmt->bindParam(':idproveedor', $idproveedor, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto.";
    }
}


function obtenerProductoPorId($id) {
    global $base; 
    
    
    $sql = "SELECT * FROM productos WHERE id = :id";
    $stmt = $base->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}

?>


