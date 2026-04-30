<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: /pages/login.php");
    exit();
}

include(__DIR__ . "/../conexion.php");

$puntos = [];
$cp = "";
$error_cp = "";

if (isset($_GET['cp'])) {
    $cp = trim($_GET['cp']);

    if (!preg_match('/^[0-9]{5}$/', $cp)) {
        $error_cp = "El codi postal ha de tenir exactament 5 números.";
    } else {
        $cp = $conexion->real_escape_string($cp);

        $sql = "SELECT * FROM puntos_recogida WHERE codigo_postal = '$cp'";
        $resultado = $conexion->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $puntos[] = $fila;
            }
        } else {
            $sql = "SELECT * FROM puntos_recogida";
            $resultado = $conexion->query($sql);

            if ($resultado) {
                while ($fila = $resultado->fetch_assoc()) {
                    $puntos[] = $fila;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Donació pendent</title>
<link rel="stylesheet" href="../css/donacion_pendiente.css">
</head>

<body class="pending-page-body">

<div class="pending-page-wrapper">

    <div class="pending-page-card">
        <div class="pending-page-icon">🙏</div>

        <h1 class="pending-page-title">Gràcies per la teva donació!</h1>

        <p class="pending-page-subtitle">
            Moltes gràcies per voler ajudar 💛
        </p>

        <p class="pending-page-text">
            Tens <strong>7 dies</strong> per portar la teva donació a un punt de recollida verificat.
            <br><br>
            La donació quedarà en <strong>estat pendent</strong> fins que sigui validada mitjançant el codi QR.
        </p>

        <a href="/pages/mis_donaciones.php" class="pending-main-btn">
            Veure les meves donacions →
        </a>
    </div>

    <div class="pending-locator-card">
        <div class="pending-locator-header">
            <h2 class="pending-locator-title">Troba un punt de recollida proper</h2>
            <p class="pending-locator-desc">
                Introdueix el teu codi postal per veure els punts disponibles més propers.
            </p>
        </div>

        <form method="GET" class="pending-locator-form">
            <input 
                type="text" 
                name="cp" 
                maxlength="5"
                pattern="[0-9]{5}"
                inputmode="numeric"
                value="<?php echo htmlspecialchars($cp); ?>"
                placeholder="Ex: 08012"
                class="pending-locator-input"
                required
            >
            <button type="submit" class="pending-locator-btn">
                Buscar
            </button>
        </form>
        <?php if ($error_cp != ""): ?>
        <p class="pending-cp-error"><?php echo $error_cp; ?></p>
        <?php endif; ?>
        <?php if (isset($_GET['cp'])): ?>
            <div class="pending-results">
                <?php if (count($puntos) > 0): ?>
                    <?php if ($cp != ""): ?>
                        <p class="pending-results-info">
                            <?php
                            $hayExacto = false;
                            foreach ($puntos as $punto) {
                                if ($punto['codigo_postal'] == $cp) {
                                    $hayExacto = true;
                                    break;
                                }
                            }

                            if ($hayExacto) {
                                echo "S'han trobat punts per al codi postal <strong>" . htmlspecialchars($cp) . "</strong>.";
                            } else {
                                echo "No s'han trobat punts exactes per al codi postal <strong>" . htmlspecialchars($cp) . "</strong>. Es mostren tots els punts disponibles.";
                            }
                            ?>
                        </p>
                    <?php endif; ?>

                    <div class="pending-points-grid">
                        <?php foreach ($puntos as $punto): ?>
                            <div class="pending-point-card">
                                <div class="pending-point-top">
                                    <span class="pending-point-barri"><?php echo htmlspecialchars($punto['barri']); ?></span>
                                    <span class="pending-point-need pending-need-<?php echo htmlspecialchars($punto['color']); ?>">
                                        <?php echo htmlspecialchars($punto['necessitat']); ?>
                                    </span>
                                </div>

                                <div class="pending-point-body">
                                    <p><strong>Adreça:</strong> <?php echo htmlspecialchars($punto['direccion']); ?></p>
                                    <p><strong>Codi postal:</strong> <?php echo htmlspecialchars($punto['codigo_postal']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="pending-no-results">No hi ha punts de recollida disponibles.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

</body>
</html>