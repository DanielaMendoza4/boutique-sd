<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: ../vista/login.php'); 
    exit();
}


if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    
    include('bd.php');
    $query = "SELECT * FROM productos WHERE id = :id";
    $stmt = $base->prepare($query);
    $stmt->bindParam(':id', $producto_id, PDO::PARAM_INT);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if ($producto) {
        
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        
        $producto_en_carrito = [
            'id' => $producto['id'],
            'nombre' => $producto['nombre'],
            'precio' => $producto['precio'],
            'cantidad' => 1,  
        ];

        
        $existe_producto = false;
        foreach ($_SESSION['carrito'] as $key => $item) {
            if ($item['id'] == $producto['id']) {
                $_SESSION['carrito'][$key]['cantidad']++;
                $existe_producto = true;
                break;
            }
        }

        if (!$existe_producto) {
            $_SESSION['carrito'][] = $producto_en_carrito;
        }

        
        header('Location: ../vista/index.php?mensaje=Producto agregado al carrito');
        exit();
    }
}

header('Location: ../vista/index.php');
exit();
?>
