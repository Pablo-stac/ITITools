<?php

require_once 'usuario.php';

/**
 * Clase que representa a un administrador del sistema.
 * Se encarga de gestionar usuarios, inventario, tickets y solicitudes.
 */
class Administrador extends Usuario
{
    /**
     * Constructor de la clase Administrador.
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
     * Gestiona los usuarios del sistema.
     *
     * @return void
     */
    public function gestionarUsuarios(): void
    {
        // Lógica para gestionar usuarios en futuras etapas.
    }

    /**
     * Gestiona el inventario de equipos del sistema.
     *
     * @return void
     */
    public function gestionarInventario(): void
    {
        // Lógica para gestionar el inventario en futuras etapas.
    }

    /**
     * Gestiona los tickets de soporte del sistema.
     *
     * @return void
     */
    public function gestionarTickets(): void
    {
        // Lógica para gestionar tickets en futuras etapas.
    }

    /**
     * Gestiona las solicitudes de préstamo del sistema.
     *
     * @return void
     */
    public function gestionarSolicitudes(): void
    {
        // Lógica para gestionar solicitudes en futuras etapas.
    }
}
