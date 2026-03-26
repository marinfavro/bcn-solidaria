<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sessió - BCN SOLIDÀRIA</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body class="bg-light">

<header class="site-header">
    <div class="header-container">
        <a href="../index.php" class="logo">
                <div class="logo-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                </div>
                <span>BCN SOLIDÀRIA</span>
            </a>

        <nav class="main-nav">
            <ul>
                <li><a href="../index.php">Inici</a></li>
                <li><a href="/pages/projectes.php">Projectes</a></li>
                <li><a href="/pages/sobre-nosaltres.php">Sobre Nosaltres</a></li>
            </ul>
            <a href="/pages/uneix-te.php" class="btn-join">Uneix-te</a>
        </nav>
    </div>
</header>

<main class="auth-container">
    <div class="auth-card scale-wrapper is-visible">

        <h1 class="auth-title">Inicia sessió</h1>
        <p class="auth-subtitle">Accedeix al teu compte.</p>

        <!-- FORMULARIO LOGIN -->
         <?php if (isset($_GET['error'])): ?>
    <div class="error-msg">
        El correu electrònic no coincideix amb la contrasenya proporcionada. Torna-ho a intentar.
    </div>
<?php endif; ?>
        <form class="auth-form" action="../login_usuario.php" method="POST">

            <div class="form-group">
                <label for="email">CORREU ELECTRÒNIC</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <input type="email" id="email" name="email" placeholder="jordi@exemple.cat" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">CONTRASENYA</label>
                <div class="input-wrapper">
                    <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn-auth">Entrar</button>

        </form>

        <div class="auth-divider">
            <span>o</span>
        </div>

        <div class="auth-footer-link">
            <a href="/pages/uneix-te.php">Crear un compte</a>
        </div>

    </div>
</main>

<script src="../js/transitions.js"></script>

</body>
</html>