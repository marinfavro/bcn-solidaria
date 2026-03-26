<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projectes - BCN SOLIDÀRIA</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/projectes.css">
</head>
<body class="fade-in">
    <!-- Header -->
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
    <li><a href="/index.php">Inici</a></li>
    <li><a href="/pages/projectes.php">Projectes</a></li>
    <li><a href="/pages/sobre-nosaltres.php">Sobre Nosaltres</a></li>
</ul>

<?php if (isset($_SESSION['usuario'])): ?>
    <div class="user-menu">
        <span>Hola, <?php echo $_SESSION['usuario']; ?></span>
        <a>|</a>
        <a href="/pages/mis_donaciones.php" class="mis-donaciones-link">
            Mis donacions
        </a>
        <a>|</a>
        <a href="/logout.php" class="btn-join">Tancar sessió</a>
    </div>
<?php else: ?>
    <a href="/pages/login.php">Iniciar sessió</a>
    <a href="/pages/uneix-te.php" class="btn-join">Uneix-te</a>
<?php endif; ?>
</nav>
        </div>
    </header>

    <div id="page-wrapper" class="fade-wrapper">
        <main>
            <section class="projectes-hero">
                <div class="badge">EL NOSTRE IMPACTE</div>
                <h1 class="hero-title">Projectes que <br><span class="italic-serif">transformen vides.</span></h1>
                <p class="hero-description">Des del nostre inici, hem treballat per convertir l'empatia en accions tangibles als carrers de Barcelona.</p>
            </section>

            <section class="projectes-grid">
                <!-- Projecte Passat -->
                <article class="project-card">
                    <div class="project-image-wrapper">
                        <img src="https://media.istockphoto.com/id/1447009406/es/foto/abuela-y-nietas-haciendo-galletas-navide%C3%B1as.jpg?s=612x612&w=0&k=20&c=HYiJJmyeqiTaPMHBMkfPi7ZV932BV_NwYmeAGzMvM0o=" alt="Projecte Passat" class="project-img" referrerpolicy="no-referrer">
                    </div>
                    <div class="project-info">
                        <span class="project-status status-past">Projecte Finalitzat (2024)</span>
                        <h2 class="project-title">El Record de l'Àvia</h2>
                        <p class="project-description">
                            Tot va començar amb una mirada. Al cor del Raval, vam descobrir que centenars de persones grans vivien en un silenci trencat només per la gana i la soledat. "El Record de l'Àvia" no va ser només un servei de menjars; va ser una xarxa de nets adoptius que cuinaven receptes de tota la vida per tornar-los el sabor de la llar i el caliu d'una conversa.
                        </p>
                        <div class="project-meta">
                            <div class="meta-item">
                                <h4>IMPACTE</h4>
                                <p>+120 avis acompanyats</p>
                            </div>
                            <div class="meta-item">
                                <h4>UBICACIÓ</h4>
                                <p>El Raval</p>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Projecte Present -->
                <article class="project-card">
                    <div class="project-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=2070&auto=format&fit=crop" alt="Projecte Present" class="project-img" referrerpolicy="no-referrer">
                    </div>
                    <div class="project-info">
                        <span class="project-status status-present">Actiu hores d'ara</span>
                        <h2 class="project-title">Taules Compartides</h2>
                        <p class="project-description">
                            Avui, la nostra lluita continua als carrers de l'Eixample i el Poblenou. "Taules Compartides" és la nostra resposta al malbaratament: connectem l'excedent fresc dels mercats amb les taules de qui més ho necessita. Perquè en una ciutat com Barcelona, cap plat hauria d'estar buit mentre les neveres dels comerços vessen.
                        </p>
                        <div class="project-meta">
                            <div class="meta-item">
                                <h4>RECOLLIDA</h4>
                                <p>450kg / setmana</p>
                            </div>
                            <div class="meta-item">
                                <h4>ESTAT</h4>
                                <p>Actiu a 6 barris</p>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Projecte Futur -->
                <article class="project-card">
                    <div class="project-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?q=80&w=2070&auto=format&fit=crop" alt="Projecte Futur" class="project-img" referrerpolicy="no-referrer">
                    </div>
                    <div class="project-info">
                        <span class="project-status status-future">El nostre gran somni</span>
                        <h2 class="project-title">Barcelona Zero Fam</h2>
                        <p class="project-description">
                            Mirem al futur amb una ambició que ens crema al pit: volem que el 2030 la gana sigui només un mal record. El nostre objectiu és reduir en un 90% la precarietat alimentària de nens i gent gran. Volem una Barcelona on créixer amb dignitat i envellir amb seguretat no sigui un privilegi, sinó una realitat per a cada ciutadà.
                        </p>
                        <div class="project-meta">
                            <div class="meta-item">
                                <h4>OBJECTIU</h4>
                                <p>-90% de gana infantil</p>
                            </div>
                            <div class="meta-item">
                                <h4>HORITZÓ</h4>
                                <p>Barcelona 2030</p>
                            </div>
                        </div>
                        <a href="uneix-te.php" class="btn-primary" style="margin-top: 30px; display: inline-block;">Ajuda'ns a fer-ho realitat &rarr;</a>
                    </div>
                </article>
            </section>
        </main>

        <footer class="site-footer">
            <div class="footer-container">
                <div class="footer-logo">
                    <div class="logo-icon-small">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                    </div>
                    <span>BCN SOLIDÀRIA</span>
                </div>
                <div class="footer-links">
                    <a href="#">PRIVADESA</a>
                    <a href="#">TERMES</a>
                    <a href="#">CONTACTE</a>
                </div>
                <div class="footer-copy">
                    &copy; 2026 Barcelona Solidària. Tots els drets reservats.
                </div>
            </div>
        </footer>
    </div>

    <script src="../js/transitions.js"></script>
    <script>
        // Intersection Observer per animar les targetes de projectes al fer scroll
        const observerOptions = {
            threshold: 0.2
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.project-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>
