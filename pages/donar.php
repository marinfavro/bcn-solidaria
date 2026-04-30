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
<title>Donacions</title>
<link rel="stylesheet" href="../css/donar.css">
</head>

<header class="site-header">
    <div class="header-container">
        <a href="/index.php" class="logo">
            <div class="logo-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                </svg>
            </div>
            <span>BCN SOLIDÀRIA</span>
        </a>

        <nav class="main-nav">
            <ul>
                <li><a href="/index.php">Inici</a></li>
                <li><a href="/pages/projectes.php">Projectes</a></li>
                <li><a href="/pages/sobre-nosaltres.php">Sobre Nosaltres</a></li>
            </ul>

                    <?php if (isset($_SESSION['usuario'])): ?>
            <span style="margin-right: 10px;">
                Hola, <?php echo $_SESSION['usuario']; ?>
            </span>
                <?php endif; ?>
        </nav>
    </div>
</header>

<body>

<div class="container auth-card">
    <h1 class="auth-title">Fer una donació</h1>
    <a href="/index.php" class="btn-back">← Tornar</a>

    <!-- SELECT TIPO -->
    <div class="form-group">
        <label>Què vols donar?</label>
        <select id="tipo">
            <option value="">Selecciona</option>
            <option value="dinero">Diners</option>
            <option value="comida">Menjar</option>
        </select>
    </div>

    <!-- 💰 FORM DINERO -->
    <form id="formDinero" class="hidden" action="/guardar_donaciones.php" method="POST">
        <input type="hidden" name="tipo" value="dinero">

        <label>Mètode de pagament</label>
        <select name="metodo" id="metodoPago" required>
            <option value="">Selecciona</option>
            <option value="bizum">Bizum</option>
            <option value="tarjeta">Targeta</option>
            <option value="transferencia">Transferencia</option>
        </select>

        <div id="bizumFields" class="hidden">
            <label>Número de teléfono</label>
            <input type="text" name="telefono">
        </div>

        <div id="tarjetaFields" class="hidden">
            <label>Número de tarjeta</label>
            <input type="text" name="tarjeta_numero" id="tarjeta" placeholder="1234 5678 9012 3456">

            <label>Fecha de caducidad</label>
                            <input 
                    type="text" 
                    id="caducidad" 
                    name="caducidad"
                    placeholder="MM/AA"
                    maxlength="5"
                    oninvalid="this.setCustomValidity('Introdueix una data vàlida (MM/AA)')"
                    oninput="this.setCustomValidity('')"
                >

            <label>CVV</label>
            <input type="text" name="tarjeta_cvv">
        </div>

        <div id="transferenciaFields" class="hidden">
            <label>IBAN</label>
            <input type="text" name="iban" id="iban" placeholder="ES00 1234 1234 1234 1234 1234">

            <label>Nombre del titular</label>
            <input type="text" name="titular">
        </div>

        <label>Quantitat (€)</label>
        <input type="number" name="cantidad" required>

        <button type="submit" class="btn-primary btn-donar">Donar ara &rarr;</button>
    </form>

    <!-- 🍚 FORM COMIDA -->
    <form id="formComida" class="hidden" action="/guardar_donaciones.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="tipo" value="comida">

        <label>Tipus d'aliment</label>
        <select name="tipo_comida" required>
            <option>Arròs</option>
            <option>Pasta</option>
            <option>Conserves</option>
            <option>Llegums</option>
        </select>
        <label>Quantitat (aproximada)</label>
<select name="cantidad_comida" required>
    <option value="">Selecciona</option>
    <option value="100g">100g</option>
    <option value="250g">250g</option>
    <option value="500g">500g</option>
    <option value="1kg">1kg</option>
    <option value="1.5kg">1,5kg</option>
    <option value="2kg">2kg</option>
    <option value="2.5kg">2,5kg</option>
    <option value="3kg">3kg</option>
    <option value="3.5kg">3,5kg</option>
    <option value="4kg">4kg</option>
    <option value="4.5kg">4,5kg</option>
    <option value="5kg">5kg</option>
    <option value="+5kg">+5kg</option>
</select>

        <label>Foto del producte</label>

        <!-- DROP AREA -->
        <div id="drop-area">
            <p>Arrossega una imatge aquí o fes clic</p>
            <input type="file" name="foto" id="fotoInput" accept="image/*" required hidden>
        </div>

        <!-- PREVIEW INSTAGRAM STYLE -->
        <div id="preview-container">
            <img id="preview">
            <button type="button" id="removeBtn">✖</button>
        </div>

        <button type="submit" class="btn-primary btn-donar">Donar ara &rarr;</button>
    </form>
</div>

<script src="../js/donar.js"></script>
</body>
</html>