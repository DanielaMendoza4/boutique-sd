<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getProductoById($id) {
    
    include '../modelo/bd.php';

    
    $query = "SELECT * FROM productos WHERE id = :id";
    $stmt = $base->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


if (!isset($_SESSION['usuario'])) {
    
    echo "<div class='alert alert-warning' role='alert'>Debes <a href='../vista/login.php' class='alert-link'>iniciar sesión</a> para ver tu carrito.</div>";
} else {
    

    
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo "<h3 class='mt-4'>Tu Carrito de Compras</h3>";

        
        echo "<table class='table table-striped table-bordered mt-3'>";
        echo "<thead class='thead-dark'>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th></th>
                </tr>
              </thead>";
        echo "<tbody>";

        $total = 0; 

        foreach ($_SESSION['carrito'] as $producto_id) {
            
            $producto = getProductoById($producto_id['id']);

            if (!$producto) {
                continue;
            }

            $producto_total = $producto['precio'] * $producto_id['cantidad'];
            $total += $producto_total;

            echo "<tr>";
            echo "<td>" . htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . number_format($producto['precio'], 2) . " USD</td>";
            echo "<td>" . $producto_id['cantidad'] . "</td>";
            echo "<td>" . number_format($producto_total, 2) . " USD</td>";
            echo "<td><a href='../modelo/eliminar_carrito.php?id=" . $producto_id['id'] . "' class='btn btn-sm btn-danger'>Eliminar</a></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        
        echo "<h4 class='mt-3'>Total: " . number_format($total, 2) . " USD</h4>";

        
        echo "<div class='mt-3'>
                <a href='../vista/index.php' class='btn btn-secondary'>Seguir comprando</a>
              </div>";

    } else {
        
        echo "<div class='alert alert-info mt-4' role='alert'>Tu carrito está vacío.</div>";

        
        echo "<a href='../vista/index.php' class='btn btn-secondary mt-3'>Volver a la tienda</a>";
    }
}
?>
