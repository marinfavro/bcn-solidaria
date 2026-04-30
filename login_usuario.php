<?php
session_start();
include(__DIR__ . "/conexion.php");

$email = $_POST['email'];
$password_ingresada = $_POST['password'];

// 1. Consulta preparada para buscar al usuario
$stmt = $conexion->prepare("SELECT nombre, email, password FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    // 2. Verificar la contraseña cifrada
    if (password_verify($password_ingresada, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['email'] = $usuario['email'];
        header("Location: index.php");
        exit();
    } else {
        // Contraseña incorrecta
        header("Location: /pages/login.php?error=1");
        exit();
    }
} else {
    echo "Usuario no encontrado";
}

$stmt->close();
$conexion->close();
?>