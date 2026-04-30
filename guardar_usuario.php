<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include(__DIR__ . "/conexion.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
// 🔐 Ciframos la contraseña antes de guardarla
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// 1. Preparar la consulta para verificar si existe el email
$check = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
$check->bind_param("s", $email); // "s" significa que el dato es un string
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "Este correo ya está registrado.";
} else {
    // 2. Preparar la consulta de inserción (Consultas preparadas)
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['usuario'] = $nombre;
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        echo "Error al registrar: " . $stmt->error;
    }
    $stmt->close();
}
$check->close();
$conexion->close();
?>