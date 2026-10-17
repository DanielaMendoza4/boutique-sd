<?php

function crearProducto($nombre, $descripcion, $precio, $stock, $idproveedor, $fecha_ingreso) {
    global $base;
    
    
    $query = "INSERT INTO productos (nombre, descripcion, precio, stock, idproveedor, fecha_ingreso) 
              VALUES (:nombre, :descripcion, :precio, :stock, :idproveedor, :fecha_ingreso)";
    
    
    $stmt = $base->prepare($query);
    
    
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':idproveedor', $idproveedor);
    $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);

    
    return $stmt->execute();
}
?>