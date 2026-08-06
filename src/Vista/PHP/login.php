<?php
session_start();
$mensajeLogin = trim($_GET['mensaje'] ?? '');
?>
<!DOCTYPE html>
<!-- Página de inicio de sesión: controla el proceso de autenticación -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Inicio de Sesión</title>
</head>
<body>
    <!-- Contenedor principal de la pantalla de login -->
    <main class="login">
        <header class="login-header">
            <img src="../IMG/logo ITI.png" alt="logo iti" class="logo">
            <h1>Inicio de Sesión</h1>
        </header>

        <!-- Formulario de login: la vista captura el evento y lo envía al controlador -->
        <form class="login-form" novalidate>
            <div class="login-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="login-field">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div id="mensaje-login" class="login-mensaje" aria-live="polite">
            <?= htmlspecialchars($mensajeLogin, ENT_QUOTES, 'UTF-8') ?>
        </div>

            <div class="login-actions">
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>
    </main>

    <script src="../JS/login.js" defer></script>
</body>
</html>