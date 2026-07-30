<?php
require_once __DIR__ . '/Controlador/UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'nombre' => trim($_POST['nombre'] ?? ''),
        'apellido' => trim($_POST['apellido'] ?? ''),
        'correo' => trim($_POST['email'] ?? $_POST['correo'] ?? ''),
        'contrasena' => $_POST['password'] ?? $_POST['contrasena'] ?? '',
        'estado' => $_POST['estado'] ?? 'activo',
        'rol' => $_POST['rol'] ?? ''
    ];

    $controlador = new UsuarioController();
    $resultado = $controlador->crearUsuario($datos);

    echo json_encode($resultado);
    exit;
}

header('Content-Type: application/json');
echo json_encode([
    'exito' => false,
    'mensaje' => 'Método no permitido.'
]);
exit;
