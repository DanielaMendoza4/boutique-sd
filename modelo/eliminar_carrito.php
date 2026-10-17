<?php
session_start();


if (isset($_SESSION['carrito'])) {
    
    if (isset($_GET['id'])) {
        $producto_id = $_GET['id'];

        
        foreach ($_SESSION['carrito'] as $key => $producto) {
            if ($producto['id'] == $producto_id) {
                unset($_SESSION['carrito'][$key]); 
                break;  
            }
        }

        
        header("Location: ../vista/carro.php?mensaje=Producto eliminado correctamente");
        exit();
    }
} else {
    
    header("Location: ../vista/carro.php?mensaje=No hay productos en el carrito");
    exit();
}
?>
