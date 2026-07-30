<?php

require_once __DIR__ . '/../Modelo/Usuario.php';
require_once __DIR__ . '/../Modelo/UsuarioRepository.php';

/**
 * Controlador para gestionar usuarios del sistema.
 */
class UsuarioController
{
    /**
     * Repositorio de usuarios.
     *
     * @var UsuarioRepository
     */
    private UsuarioRepository $usuarioRepository;

    /**
     * Constructor del controlador.
     */
    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository();
    }

    /**
     * Crea un nuevo usuario en el sistema.
     *
     * @param array $datos
     * @return array
     */
    public function crearUsuario(array $datos): array
    {
        $requiredFields = ['nombre', 'apellido', 'correo', 'contrasena', 'estado'];

        foreach ($requiredFields as $field) {
            if (empty($datos[$field])) {
                return [
                    'exito' => false,
                    'mensaje' => 'Complete todos los campos obligatorios.'
                ];
            }
        }

        if ($this->usuarioRepository->findByCorreo($datos['correo']) !== null) {
            return [
                'exito' => false,
                'mensaje' => 'Ya existe un usuario con ese correo.'
            ];
        }

        $usuario = new Usuario(
            0,
            trim($datos['nombre']),
            trim($datos['apellido']),
            trim($datos['correo']),
            password_hash($datos['contrasena'], PASSWORD_DEFAULT),
            $datos['estado'] === 'activo' || $datos['estado'] === 1 || $datos['estado'] === true
        );

        $guardado = $this->usuarioRepository->save($usuario);

        return [
            'exito' => $guardado,
            'mensaje' => $guardado
                ? 'Registro realizado correctamente.'
                : 'No fue posible registrar el usuario.'
        ];
    }

    /**
     * Modifica los datos de un usuario existente.
     *
     * @param array $datos
     * @return bool
     */
    public function modificarUsuario(array $datos): bool
    {
        if (empty($datos['idUsuario']) || !is_numeric($datos['idUsuario'])) {
            return false;
        }

        $usuarioExistente = $this->usuarioRepository->findById((int) $datos['idUsuario']);
        if ($usuarioExistente === null) {
            return false;
        }

        $nombre = trim($datos['nombre'] ?? $usuarioExistente->getNombre());
        $apellido = trim($datos['apellido'] ?? $usuarioExistente->getApellido());
        $correo = trim($datos['correo'] ?? $usuarioExistente->getCorreo());
        $contrasena = !empty($datos['contrasena'])
            ? password_hash($datos['contrasena'], PASSWORD_DEFAULT)
            : $usuarioExistente->getContrasena();
        $estado = isset($datos['estado'])
            ? ($datos['estado'] === 'activo' || $datos['estado'] === 1 || $datos['estado'] === true)
            : $usuarioExistente->getEstado();

        $usuarioActualizado = new Usuario(
            (int) $datos['idUsuario'], 
            $nombre,
            $apellido,
            $correo,
            $contrasena,
            $estado
        );

        return $this->usuarioRepository->update($usuarioActualizado);
    }

    /**
     * Desactiva un usuario del sistema.
     *
     * @param int $idUsuario
     * @return bool
     */
    public function desactivarUsuario(int $idUsuario): bool
    {
        return $this->usuarioRepository->deactivate($idUsuario);
    }
}
