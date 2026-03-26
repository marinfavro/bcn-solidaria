<?php
session_start();

include(__DIR__ . "/conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

// Buscar usuario
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {

    $usuario = $result->fetch_assoc();

    // 🔥 comprobar contraseña
    if ($password == $usuario['password']) {

        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['email'] = $usuario['email'];

        header("Location: index.php");
        exit();

    } else {
        header("Location: /pages/login.php?error=1");
    exit();
    }

} else {
    echo "Usuario no encontrado";
}

$conexion->close();
?>