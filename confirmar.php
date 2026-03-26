<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: /pages/login.php");
    exit();
}

include("conexion.php");

$usuario = $conexion->real_escape_string($_SESSION['usuario']);

// Validar ID obligatorio
if (!isset($_GET['id'])) {
    header("Location: /pages/mis_donaciones.php");
    exit();
}

$id = intval($_GET['id']);


// Verificar que la donación pertenece al usuario
$sql = "SELECT id FROM donaciones_comida 
        WHERE id = $id AND usuario = '$usuario'";

$result = $conexion->query($sql);

if ($result->num_rows == 0) {
    // No existe o no es suya
    header("Location: mis_donaciones.php");
    exit();
}

// Actualizar estado
$update = "UPDATE donaciones_comida 
           SET estado = 'confirmada' 
           WHERE id = $id AND usuario = '$usuario'";

if ($conexion->query($update)) {
    // OK
    header("Location: /pages/gracias.php");
} else {
    // ERROR (opcional, por si quieres debug)
    echo "Error al confirmar la donación";
}

exit();
?>