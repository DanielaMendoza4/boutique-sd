<?php
require_once "bd.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['usuario'], $_POST['correo'], $_POST['telefono'], $_POST['contraseña'])) {
    header('Location: ../vista/registro.php');
    exit;
}

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

$consulta = $base->prepare(
    "INSERT INTO usuarios (usuario, correo, telefono, contraseña) VALUES (:usuario, :correo, :telefono, :contraseña)"
);
$consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$consulta->bindParam(':correo', $correo, PDO::PARAM_STR);
$consulta->bindParam(':telefono', $telefono, PDO::PARAM_STR);
$consulta->bindParam(':contraseña', $contraseña, PDO::PARAM_STR);

if ($consulta->execute()) {
    header('Location: ../vista/login.php?mensaje=Registro%20exitoso%2C%20inicia%20sesi%C3%B3n');
} else {
    header('Location: ../vista/registro.php?error=No%20se%20pudo%20registrar');
}
exit;
