<?php
session_start(); // 🔥 INICIAR SESIÓN

error_reporting(E_ALL);
ini_set('display_errors', 1);

include(__DIR__ . "/conexion.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

// Comprobar si existe
$check = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conexion->query($check);

if ($result->num_rows > 0) {
    echo "Este correo ya está registrado.";
} else {

    $sql = "INSERT INTO usuarios (nombre, email, password)
            VALUES ('$nombre', '$email', '$password')";

    if ($conexion->query($sql) === TRUE) {

        // 🔥 GUARDAR SESIÓN AUTOMÁTICA
        $_SESSION['usuario'] = $nombre;
        $_SESSION['email'] = $email;

        // 🔥 REDIRIGIR
        header("Location: index.php");
        exit();

    } else {
        echo "Error: " . $conexion->error;
    }
}

$conexion->close();
?>