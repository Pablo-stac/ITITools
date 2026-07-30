<?php
require_once __DIR__ . '/Controlador/LoginController.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'exito' => false,
        'mensaje' => 'Método no permitido.'
    ]);
    exit;
}

$datos = [
    'email' => trim($_POST['email'] ?? ''),
    'password' => $_POST['password'] ?? ''
];

$controlador = new LoginController();
$resultado = $controlador->login($datos);

echo json_encode($resultado);
