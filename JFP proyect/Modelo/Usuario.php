<?php

/**
 * Clase que representa la entidad Usuario del sistema.
 */
class Usuario
{
    /**
     * Identificador del usuario.
     *
     * @var int
     */
    private int $idUsuario;

    /**
     * Nombre del usuario.
     *
     * @var string
     */
    private string $nombre;

    /**
     * Apellido del usuario.
     *
     * @var string
     */
    private string $apellido;

    /**
     * Correo electrónico del usuario.
     *
     * @var string
     */
    private string $correo;

    /**
     * Contraseña del usuario.
     *
     * @var string
     */
    private string $contrasena;

    /**
     * Estado del usuario.
     *
     * @var bool
     */
    private bool $estado;

    /**
     * Constructor de la clase Usuario.
     *
     * @param int $idUsuario Identificador del usuario.
     * @param string $nombre Nombre del usuario.
     * @param string $apellido Apellido del usuario.
     * @param string $correo Correo electrónico del usuario.
     * @param string $contrasena Contraseña del usuario.
     * @param bool $estado Estado del usuario.
     */
    public function __construct(int $idUsuario, string $nombre, string $apellido, string $correo, string $contrasena, bool $estado)
    {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->estado = $estado;
    }

    /**
     * Obtiene el identificador del usuario.
     *
     * @return int
     */
    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    /**
     * Establece el identificador del usuario.
     *
     * @param int $idUsuario Identificador del usuario.
     * @return void
     */
    public function setIdUsuario(int $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Obtiene el nombre del usuario.
     *
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Establece el nombre del usuario.
     *
     * @param string $nombre Nombre del usuario.
     * @return void
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Obtiene el apellido del usuario.
     *
     * @return string
     */
    public function getApellido(): string
    {
        return $this->apellido;
    }

    /**
     * Establece el apellido del usuario.
     *
     * @param string $apellido Apellido del usuario.
     * @return void
     */
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * Obtiene el correo electrónico del usuario.
     *
     * @return string
     */
    public function getCorreo(): string
    {
        return $this->correo;
    }

    /**
     * Establece el correo electrónico del usuario.
     *
     * @param string $correo Correo electrónico del usuario.
     * @return void
     */
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    /**
     * Obtiene la contraseña del usuario.
     *
     * @return string
     */
    public function getContrasena(): string
    {
        return $this->contrasena;
    }

    /**
     * Establece la contraseña del usuario.
     *
     * @param string $contrasena Contraseña del usuario.
     * @return void
     */
    public function setContrasena(string $contrasena): void
    {
        $this->contrasena = $contrasena;
    }

    /**
     * Obtiene el estado del usuario.
     *
     * @return bool
     */
    public function getEstado(): bool
    {
        return $this->estado;
    }

    /**
     * Establece el estado del usuario.
     *
     * @param bool $estado Estado del usuario.
     * @return void
     */
    public function setEstado(bool $estado): void
    {
        $this->estado = $estado;
    }

    /**
     * Autentica al usuario con las credenciales proporcionadas.
     *
     * @return array Resultado con éxito, mensaje y rol.
     */
    public function autenticar(): array
    {
        $usuariosValidos = [
            [
                'email' => 'admin@iti.edu.uy',
                'password' => '1234',
                'rol' => 'administrador'
            ],
            [
                'email' => 'soporte@iti.edu.uy',
                'password' => '1234',
                'rol' => 'soporte'
            ],
            [
                'email' => 'solicitante@iti.edu.uy',
                'password' => '1234',
                'rol' => 'solicitante'
            ]
        ];

        foreach ($usuariosValidos as $usuarioValido) {
            if ($usuarioValido['email'] === $this->correo && $usuarioValido['password'] === $this->contrasena) {
                return [
                    'exito' => true,
                    'mensaje' => 'Inicio de sesión correcto.',
                    'rol' => $usuarioValido['rol']
                ];
            }
        }

        return [
            'exito' => false,
            'mensaje' => 'Email o contraseña incorrectos.',
            'rol' => null
        ];
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @return array Resultado con éxito y mensaje.
     */
    public function cerrarSesion(): array
    {
        return [
            'exito' => true,
            'mensaje' => 'Sesión cerrada correctamente.'
        ];
    }
}
