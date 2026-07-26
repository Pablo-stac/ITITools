<?php

require_once 'usuario.php';

/**
 * Clase que representa al personal de soporte del sistema.
 * Hereda los datos básicos del usuario y gestiona operaciones de soporte.
 */
class Soporte extends Usuario
{
    /**
     * Constructor de la clase Soporte.
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
     * Asigna una prioridad a un ticket.
     *
     * @return void
     */
    public function asignarPrioridad(): void
    {
        // Lógica para asignar prioridad en futuras etapas.
    }

    /**
     * Cambia el estado de un ticket.
     *
     * @return void
     */
    public function cambiarEstadoTicket(): void
    {
        // Lógica para cambiar el estado del ticket en futuras etapas.
    }

    /**
     * Registra un diagnóstico del problema.
     *
     * @return void
     */
    public function registrarDiagnostico(): void
    {
        // Lógica para registrar un diagnóstico en futuras etapas.
    }

    /**
     * Registra la resolución de un ticket.
     *
     * @return void
     */
    public function registrarResolucion(): void
    {
        // Lógica para registrar la resolución en futuras etapas.
    }

    /**
     * Registra un préstamo de equipo.
     *
     * @return void
     */
    public function registrarPrestamo(): void
    {
        // Lógica para registrar un préstamo en futuras etapas.
    }

    /**
     * Registra la devolución de un equipo.
     *
     * @return void
     */
    public function registrarDevolucion(): void
    {
        // Lógica para registrar una devolución en futuras etapas.
    }

    /**
     * Consulta el inventario de equipos.
     *
     * @return void
     */
    public function consultarInventario(): void
    {
        // Lógica para consultar inventario en futuras etapas.
    }
}
