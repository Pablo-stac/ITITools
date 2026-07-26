<?php

/**
 * Clase que representa una solicitud de registro pendiente de aprobación.
 */
class SolicitudRegistro
{
    /**
     * Identificador de la solicitud.
     *
     * @var int
     */
    private int $idSolicitud;

    /**
     * Nombre del solicitante.
     *
     * @var string
     */
    private string $nombre;

    /**
     * Apellido del solicitante.
     *
     * @var string
     */
    private string $apellido;

    /**
     * Correo del solicitante.
     *
     * @var string
     */
    private string $correo;

    /**
     * Contraseña del solicitante.
     *
     * @var string
     */
    private string $contrasena;

    /**
     * Fecha en que se realizó la solicitud.
     *
     * @var DateTime
     */
    private DateTime $fechaSolicitud;

    /**
     * Estado actual de la solicitud.
     *
     * @var string
     */
    private string $estadoSolicitud;

    /**
     * Constructor de la clase SolicitudRegistro.
     *
     * @param int $idSolicitud Identificador de la solicitud.
     * @param string $nombre Nombre del solicitante.
     * @param string $apellido Apellido del solicitante.
     * @param string $correo Correo del solicitante.
     * @param string $contrasena Contraseña del solicitante.
     * @param DateTime $fechaSolicitud Fecha de la solicitud.
     * @param string $estadoSolicitud Estado de la solicitud.
     */
    public function __construct(int $idSolicitud, string $nombre, string $apellido, string $correo, string $contrasena, DateTime $fechaSolicitud, string $estadoSolicitud)
    {
        $this->idSolicitud = $idSolicitud;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->fechaSolicitud = $fechaSolicitud;
        $this->estadoSolicitud = $estadoSolicitud;
    }

    /**
     * Obtiene el identificador de la solicitud.
     *
     * @return int
     */
    public function getIdSolicitud(): int
    {
        return $this->idSolicitud;
    }

    /**
     * Establece el identificador de la solicitud.
     *
     * @param int $idSolicitud Identificador de la solicitud.
     * @return void
     */
    public function setIdSolicitud(int $idSolicitud): void
    {
        $this->idSolicitud = $idSolicitud;
    }

    /**
     * Obtiene el nombre del solicitante.
     *
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Establece el nombre del solicitante.
     *
     * @param string $nombre Nombre del solicitante.
     * @return void
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Obtiene el apellido del solicitante.
     *
     * @return string
     */
    public function getApellido(): string
    {
        return $this->apellido;
    }

    /**
     * Establece el apellido del solicitante.
     *
     * @param string $apellido Apellido del solicitante.
     * @return void
     */
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * Obtiene el correo del solicitante.
     *
     * @return string
     */
    public function getCorreo(): string
    {
        return $this->correo;
    }

    /**
     * Establece el correo del solicitante.
     *
     * @param string $correo Correo del solicitante.
     * @return void
     */
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    /**
     * Obtiene la contraseña del solicitante.
     *
     * @return string
     */
    public function getContrasena(): string
    {
        return $this->contrasena;
    }

    /**
     * Establece la contraseña del solicitante.
     *
     * @param string $contrasena Contraseña del solicitante.
     * @return void
     */
    public function setContrasena(string $contrasena): void
    {
        $this->contrasena = $contrasena;
    }

    /**
     * Obtiene la fecha de la solicitud.
     *
     * @return DateTime
     */
    public function getFechaSolicitud(): DateTime
    {
        return $this->fechaSolicitud;
    }

    /**
     * Establece la fecha de la solicitud.
     *
     * @param DateTime $fechaSolicitud Fecha de la solicitud.
     * @return void
     */
    public function setFechaSolicitud(DateTime $fechaSolicitud): void
    {
        $this->fechaSolicitud = $fechaSolicitud;
    }

    /**
     * Obtiene el estado de la solicitud.
     *
     * @return string
     */
    public function getEstadoSolicitud(): string
    {
        return $this->estadoSolicitud;
    }

    /**
     * Establece el estado de la solicitud.
     *
     * @param string $estadoSolicitud Estado de la solicitud.
     * @return void
     */
    public function setEstadoSolicitud(string $estadoSolicitud): void
    {
        $this->estadoSolicitud = $estadoSolicitud;
    }

    /**
     * Aprueba la solicitud.
     *
     * @return void
     */
    public function aprobarSolicitud(): void
    {
        // Lógica para aprobar la solicitud en futuras etapas.
    }

    /**
     * Rechaza la solicitud.
     *
     * @return void
     */
    public function rechazarSolicitud(): void
    {
        // Lógica para rechazar la solicitud en futuras etapas.
    }
}
