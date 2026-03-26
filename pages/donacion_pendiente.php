<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: /pages/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<title>Gràcies per la teva donació</title>
<link rel="stylesheet" href="../css/estilos.css">
</head>

<body style="text-align:center; padding:60px;">

<h1>🙏 Gràcies per la teva donació!</h1>

<p style="margin-top:20px; font-size:18px; color:#666;">
Moltes gràcies per voler ajudar 💛
</p>

<p style="margin-top:20px; max-width:600px; margin-left:auto; margin-right:auto;">
Tens <strong>7 dies</strong> per portar la teva donació a un punt de recollida verificat.
<br><br>
La donació quedarà en <strong>estat pendent</strong> fins que sigui validada mitjançant el codi QR.
</p>

<a href="/pages/mis_donaciones.php" class="btn-primary" style="margin-top:30px; display:inline-block;">
Veure les meves donacions →
</a>

</body>
</html>