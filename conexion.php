<?php
$host = "localhost";
$usuario = "marin";
$contrasena = "Temporal1";
$base_datos = "proyecto_donaciones";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Si quieres comprobar que conecta correctamente, puedes descomentar la línea siguiente:
// echo "Conexión exitosa";
?>
