<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /pages/login.php");
    exit();
}

include("../conexion.php");

$usuario = $conexion->real_escape_string($_SESSION['usuario']);

// DONACIONES DINERO
$sql_dinero = "SELECT * FROM donaciones_dinero WHERE usuario = '$usuario' ORDER BY id DESC";
$res_dinero = $conexion->query($sql_dinero);

// DONACIONES COMIDA
$sql_comida = "SELECT * FROM donaciones_comida WHERE usuario = '$usuario' ORDER BY id DESC";
$res_comida = $conexion->query($sql_comida);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<title>Les meves donacions</title>
<link rel="stylesheet" href="../css/mis_donaciones.css">
</head>

<body>

<!-- HEADER -->
<header class="site-header">
    <div class="header-container">
        <a href="/index.php" class="logo">
            <div class="logo-icon">❤</div>
            <span>BCN SOLIDÀRIA</span>
        </a>

        <nav class="main-nav">
            <ul>
                <li><a href="/index.php">Inici</a></li>
                <li><a href="/pages/projectes.php">Projectes</a></li>
                <li><a href="/pages/sobre-nosaltres.php">Sobre Nosaltres</a></li>
            </ul>

            <a href="/logout.php" class="btn-logout">Tancar sessió</a>
        </nav>
    </div>
</header>

<div class="container">

    <h1>Les meves donacions</h1>

    <div class="grid">

        <!-- 💰 DINERO -->
        <div class="card">
            <h2>Donacions econòmiques</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Quantitat</th>
                    <th>Mètode</th>
                    <th>Estat</th>
                </tr>

                <?php if ($res_dinero->num_rows > 0): ?>
                    <?php while ($row = $res_dinero->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['cantidad'] ?> €</td>
                            <td><?= $row['metodo'] ?></td>
                            <td class="ok">Confirmada</td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Encara no has fet cap donació econòmica</td>
                    </tr>
                <?php endif; ?>

            </table>
        </div>

        <!-- 🍚 COMIDA -->
        <div class="card">
            <h2>Donacions d'aliments</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Tipus</th>
                    <th>Quantitat</th>
                    <th>Estat</th>
                    <th>Acció</th>
                </tr>

                <?php if ($res_comida->num_rows > 0): ?>
                    <?php while ($row = $res_comida->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['tipo_comida'] ?></td>
                            <td><?= $row['cantidad'] ?></td>

                            <td class="<?= $row['estado'] == 'pendiente' ? 'pending' : 'ok' ?>">
                                <?= $row['estado'] == 'pendiente' ? 'Pendent' : 'Confirmada' ?>
                            </td>

                            <td>
                                <?php if ($row['estado'] == 'pendiente'): ?>
                                    <a href="/pages/confirmar_qr.php?id=<?= $row['id'] ?>" class="btn-confirm">
                                        Confirmar
                                    </a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Encara no has fet cap donació d'aliments</td>
                    </tr>
                <?php endif; ?>

            </table>
        </div>

    </div>
</div>

</body>
</html>