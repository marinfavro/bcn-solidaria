<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /pages/login.php");
    exit();
}

$id = intval($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Escanear QR</title>

<!-- CSS -->
<link rel="stylesheet" href="/css/confirmar_qr.css">

<!-- Librería QR -->
<script src="https://unpkg.com/html5-qrcode"></script>

<!-- TU JS -->
<script src="/js/analisis_qr.js" defer></script>

</head>
<body>

<div class="qr-container">

    <h2>Escaneja el QR</h2>
    <p>Apunta amb la càmera o puja una imatge per confirmar la donació</p>

    <div id="reader"></div>

    <input type="file" id="qr-input" class="btn-upload">

    <div id="preview-container" style="position:relative; display:none; margin-top:20px;">

    <img id="preview-img" style="max-width:300px; display:block; margin:auto; border-radius:10px;">

    <!-- ❌ BOTÓN ELIMINAR -->
    <button id="removeBtn" type="button"
        style="
            position:absolute;
            top:10px;
            right:10px;
            background:#000;
            color:#fff;
            border:none;
            border-radius:50%;
            width:30px;
            height:30px;
            cursor:pointer;
            font-size:16px;
        ">
        ✖
    </button>

</div>


<br><br>

<button id="btn-analizar" style="display:none;">Analitzar QR</button>

<p id="qr-status"></p>

    <a href="/pages/mis_donaciones.php" class="btn-back">
        ← Tornar a les donacions
    </a>

</div>

<script>
    const DONACION_ID = <?= $id ?>;
</script>

</body>
</html>