<?php

require_once 'usuario.php';

/**
 * Clase que representa a un solicitante del sistema.
 * Se encarga de generar solicitudes de soporte y préstamos de equipos.
 */
class Solicitante extends Usuario
{
    /**
     * Constructor de la clase Solicitante.
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
        parent::__construct($idUsuario, $nombre, $apellido, $correo, $contrasena, $estado);
    }

    /**
     * Crea un nuevo ticket de soporte.
     *
     * @return void
     */
    public function crearTicket(): void
    {
        // Lógica para crear un ticket en futuras etapas.
    }

    /**
     * Consulta el estado de un ticket generado.
     *
     * @return void
     */
    public function consultarEstadoTicket(): void
    {
        // Lógica para consultar el estado del ticket en futuras etapas.
    }

    /**
     * Solicita un préstamo de equipo.
     *
     * @return void
     */
    public function solicitarPrestamo(): void
    {
        // Lógica para solicitar un préstamo en futuras etapas.
    }
}
