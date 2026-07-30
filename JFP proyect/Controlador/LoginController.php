<?php

require_once __DIR__ . '/../Modelo/Usuario.php';

/**
 * Controlador para gestionar el inicio y cierre de sesión del sistema.
 * Recibe las solicitudes de la vista y coordina la lógica de autenticación.
 */
class LoginController
{
    /**
     * Procesa el inicio de sesión del usuario.
     *
     * @param array $datos Datos enviados desde la vista.
     * @return array Resultado con éxito, mensaje y rol si aplica.
     */
    public function login(array $datos): array
    {
        $errores = $this->validarDatosBasicos($datos, ['email', 'password']);
        if (!empty($errores)) {
            return [
                'exito' => false,
                'mensaje' => 'Complete los campos obligatorios.',
                'errores' => $errores,
                'rol' => null
            ];
        }

        $usuario = new Usuario(
            0,
            '',
            '',
            trim($datos['email']),
            trim($datos['password']),
            true
        );

        return $usuario->autenticar();
    }

    /**
     * Cierra la sesión activa del usuario.
     *
     * @return array Resultado con éxito y mensaje.
     */
    public function logout(): array
    {
        $usuario = new Usuario(0, '', '', '', '', true);
        return $usuario->cerrarSesion();
    }

    /**
     * Valida los campos obligatorios básicos recibidos desde la vista.
     *
     * @param array $datos Datos enviados desde la vista.
     * @param array $camposObligatorios Lista de campos requeridos.
     * @return array Lista de errores encontrados.
     */
    private function validarDatosBasicos(array $datos, array $camposObligatorios): array
    {
        $errores = [];

        foreach ($camposObligatorios as $campo) {
            if (!isset($datos[$campo]) || trim((string) $datos[$campo]) === '') {
                $errores[$campo] = 'Campo obligatorio';
            }
        }

        return $errores;
    }
}
