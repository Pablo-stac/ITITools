<?php

/**
 * Clase que representa la entidad Ticket del sistema.
 * Un ticket es una solicitud de soporte generada por un solicitante.
 */
class Ticket
{
    /**
     * Identificador del ticket.
     *
     * @var int
     */
    private int $idTicket;

    /**
     * Asunto del ticket.
     *
     * @var string
     */
    private string $asunto;

    /**
     * Descripción detallada del ticket.
     *
     * @var string
     */
    private string $descripcion;

    /**
     * Fecha de creación del ticket.
     *
     * @var DateTime
     */
    private DateTime $fechaCreacion;

    /**
     * Prioridad del ticket.
     *
     * @var string
     */
    private string $prioridad;

    /**
     * Estado actual del ticket.
     *
     * @var string
     */
    private string $estado;

    /**
     * Resolución del ticket.
     *
     * @var string
     */
    private string $resolucion;

    /**
     * Constructor de la clase Ticket.
     *
     * @param int $idTicket Identificador del ticket.
     * @param string $asunto Asunto del ticket.
     * @param string $descripcion Descripción del ticket.
     * @param DateTime $fechaCreacion Fecha de creación del ticket.
     * @param string $prioridad Prioridad del ticket.
     * @param string $estado Estado del ticket.
     * @param string $resolucion Resolución del ticket.
     */
    public function __construct(int $idTicket, string $asunto, string $descripcion, DateTime $fechaCreacion, string $prioridad, string $estado, string $resolucion)
    {
        $this->idTicket = $idTicket;
        $this->asunto = $asunto;
        $this->descripcion = $descripcion;
        $this->fechaCreacion = $fechaCreacion;
        $this->prioridad = $prioridad;
        $this->estado = $estado;
        $this->resolucion = $resolucion;
    }

    /**
     * Obtiene el identificador del ticket.
     *
     * @return int
     */
    public function getIdTicket(): int
    {
        return $this->idTicket;
    }

    /**
     * Establece el identificador del ticket.
     *
     * @param int $idTicket Identificador del ticket.
     * @return void
     */
    public function setIdTicket(int $idTicket): void
    {
        $this->idTicket = $idTicket;
    }

    /**
     * Obtiene el asunto del ticket.
     *
     * @return string
     */
    public function getAsunto(): string
    {
        return $this->asunto;
    }

    /**
     * Establece el asunto del ticket.
     *
     * @param string $asunto Asunto del ticket.
     * @return void
     */
    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    /**
     * Obtiene la descripción del ticket.
     *
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Establece la descripción del ticket.
     *
     * @param string $descripcion Descripción del ticket.
     * @return void
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Obtiene la fecha de creación del ticket.
     *
     * @return DateTime
     */
    public function getFechaCreacion(): DateTime
    {
        return $this->fechaCreacion;
    }

    /**
     * Establece la fecha de creación del ticket.
     *
     * @param DateTime $fechaCreacion Fecha de creación del ticket.
     * @return void
     */
    public function setFechaCreacion(DateTime $fechaCreacion): void
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * Obtiene la prioridad del ticket.
     *
     * @return string
     */
    public function getPrioridad(): string
    {
        return $this->prioridad;
    }

    /**
     * Establece la prioridad del ticket.
     *
     * @param string $prioridad Prioridad del ticket.
     * @return void
     */
    public function setPrioridad(string $prioridad): void
    {
        $this->prioridad = $prioridad;
    }

    /**
     * Obtiene el estado del ticket.
     *
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * Establece el estado del ticket.
     *
     * @param string $estado Estado del ticket.
     * @return void
     */
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    /**
     * Obtiene la resolución del ticket.
     *
     * @return string
     */
    public function getResolucion(): string
    {
        return $this->resolucion;
    }

    /**
     * Establece la resolución del ticket.
     *
     * @param string $resolucion Resolución del ticket.
     * @return void
     */
    public function setResolucion(string $resolucion): void
    {
        $this->resolucion = $resolucion;
    }

    /**
     * Asigna un soporte al ticket.
     *
     * @return void
     */
    public function asignarSoporte(): void
    {
        // Lógica para asignar un soporte al ticket en futuras etapas.
    }

    /**
     * Cambia el estado del ticket.
     *
     * @return void
     */
    public function cambiarEstado(): void
    {
        // Lógica para cambiar el estado del ticket en futuras etapas.
    }

    /**
     * Registra la resolución del ticket.
     *
     * @return void
     */
    public function registrarResolucion(): void
    {
        // Lógica para registrar la resolución del ticket en futuras etapas.
    }
}
