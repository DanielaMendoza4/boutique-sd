<?php
require_once 'bd.php';


function obtenerUsuarios() {
    global $base;
    $query = "SELECT * FROM usuarios";
    return $base->query($query)->fetchAll(PDO::FETCH_ASSOC);
}


function obtenerUsuarioPorId($id) {
    global $base;
    $query = "SELECT * FROM usuarios WHERE id = $id";  // Inserción directa del ID
    return $base->query($query)->fetch(PDO::FETCH_ASSOC);
}


function crearUsuario($usuario, $rol, $correo, $telefono, $contraseña) {
    global $base;
    
    
    $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

    
    $query = "INSERT INTO usuarios (usuario, rol, correo, telefono, contraseña) 
              VALUES ('$usuario', '$rol', '$correo', $telefono, '$hashed_password')";
    

    return $base->exec($query);  // Retorna el número de filas afectadas
}


function actualizarUsuario($id, $usuario, $rol, $correo, $telefono, $contraseña) {
    global $base;
    
    
    $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
    
    
    $query = "UPDATE usuarios SET usuario = '$usuario', rol = '$rol', correo = '$correo', 
              telefono = $telefono, contraseña = '$hashed_password' WHERE id = $id";
    
    
    return $base->exec($query);  
}


function eliminarUsuario($id) {
    global $base;
    $query = "DELETE FROM usuarios WHERE id = $id";  
    
    return $base->exec($query);  
}
?>
