<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// 🔐 Verificar sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: /pages/login.php");
    exit();
}

// 🔌 Conexión
include(__DIR__ . "/conexion.php");

// 👤 Usuario
$usuario = $conexion->real_escape_string($_SESSION['usuario']);

// 📌 Tipo
$tipo = $_POST['tipo'] ?? "";

// =========================
// 💰 DONACIÓN DINERO
// =========================
if ($tipo === "dinero") {

    $metodo = $conexion->real_escape_string($_POST['metodo']);
    $cantidad = $conexion->real_escape_string($_POST['cantidad']);

    // ✅ FECHA REAL (IMPORTANTE)
    $fecha = date("Y-m-d H:i:s");
    $caducidad = $_POST['caducidad'] ?? '';
    // Campos opcionales
    $telefono = isset($_POST['telefono']) ? $conexion->real_escape_string($_POST['telefono']) : NULL;

    $tarjeta = isset($_POST['tarjeta_numero']) ? $_POST['tarjeta_numero'] : NULL;
    if ($tarjeta) {
        // Guardar solo últimos 4 dígitos
        $tarjeta = substr(str_replace(' ', '', $tarjeta), -4);
    }

    $iban = isset($_POST['iban']) ? $conexion->real_escape_string($_POST['iban']) : NULL;
    $titular = isset($_POST['titular']) ? $conexion->real_escape_string($_POST['titular']) : NULL;

    // ❌ NO GUARDAR CVV

        if ($metodo === "bizum") {
        if (empty($telefono) || strlen($telefono) != 9) {
            die("Error: Teléfono inválido");
        }
    }

    if ($metodo === "tarjeta") {
    if (empty($tarjeta) || strlen($tarjeta) != 4) {
        die("Error: Tarjeta inválida");
    }

    if (empty($caducidad)) {
        die("Error: Fecha inválida");
    }
}

    if ($metodo === "transferencia") {
        if (empty($iban) || strlen($iban) < 10) {
            die("Error: IBAN inválido");
        }
    }

    $sql = "INSERT INTO donaciones_dinero
        (usuario, metodo, cantidad, telefono, tarjeta, fecha, iban, titular)
        VALUES
        ('$usuario', '$metodo', '$cantidad', '$telefono', '$tarjeta', '$fecha', '$iban', '$titular')";

    if ($conexion->query($sql)) {
        header("Location: /pages/gracias.php");
        exit();
    } else {
        echo "Error: " . $conexion->error;
    }
}

// =========================
// 🍚 DONACIÓN COMIDA
// =========================
elseif ($tipo === "comida") {

    if (empty($_POST['tipo_comida'])) {
        die("Error: tipo de comida vacío");
    }

    $tipo_comida = $conexion->real_escape_string($_POST['tipo_comida']);
    $cantidad_comida = $conexion->real_escape_string($_POST['cantidad_comida']);

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

        $carpeta = __DIR__ . "/uploads/";

        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0755, true);
        }

        $nombreFoto = time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['foto']['name']);
        $ruta = $carpeta . $nombreFoto;

        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $ruta)) {
            die("Error al subir la imagen");
        }

    } else {
        $nombreFoto = NULL;
    }

    $sql = "INSERT INTO donaciones_comida (usuario, tipo_comida, cantidad, foto)
        VALUES ('$usuario', '$tipo_comida', '$cantidad_comida', '$nombreFoto')";

    if ($conexion->query($sql)) {
    header("Location: /pages/donacion_pendiente.php");
    exit();
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>