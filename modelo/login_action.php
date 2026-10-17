<?php
session_start();

require_once 'bd.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['correo'], $_POST['contraseña'])) {
    header('Location: ../vista/login.php');
    exit;
}

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$query = "SELECT id, correo, contraseña, rol FROM usuarios WHERE correo = :correo";
$stmt = $base->prepare($query);
$stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$password_ok = false;
if ($user) {
    $stored = $user['contraseña'];

    if (password_verify($contraseña, $stored)) {
        $password_ok = true;
    } elseif ($contraseña === $stored) {
        $password_ok = true;

        $nuevo_hash = password_hash($contraseña, PASSWORD_DEFAULT);
        $update = $base->prepare("UPDATE usuarios SET contraseña = :hash WHERE id = :id");
        $update->execute([':hash' => $nuevo_hash, ':id' => $user['id']]);
    }
}

if ($password_ok) {
    $_SESSION['usuario'] = $user['correo'];
    $_SESSION['rol'] = $user['rol'];
    $_SESSION['usuario_id'] = $user['id'];

    if ($user['rol'] === 'admin') {
        header('Location: ../vista/admin_dashboard.php');
    } else {
        header('Location: ../vista/index.php');
    }
    exit;
}

header('Location: ../vista/login.php?error=Usuario%20o%20contrase%C3%B1a%20incorrectos');
exit;
