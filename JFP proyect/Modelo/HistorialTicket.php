<?php

/**
 * Clase que representa el historial de cambios de un Ticket.
 * Almacena un registro de todas las acciones realizadas sobre un ticket.
 */
class HistorialTicket
{
    /**
     * Identificador del historial.
     *
     * @var int
     */
    private int $idHistorial;

    /**
     * Fecha de la acción registrada.
     *
     * @var DateTime
     */
    private DateTime $fecha;

    /**
     * Acción realizada sobre el ticket.
     *
     * @var string
     */
    private string $accion;

    /**
     * Descripción detallada de la acción.
     *
     * @var string
     */
    private string $descripcion;

    /**
     * Constructor de la clase HistorialTicket.
     *
     * @param int $idHistorial Identificador del historial.
     * @param DateTime $fecha Fecha de la acción.
     * @param string $accion Acción realizada.
     * @param string $descripcion Descripción de la acción.
     */
    public function __construct(int $idHistorial, DateTime $fecha, string $accion, string $descripcion)
    {
        $this->idHistorial = $idHistorial;
        $this->fecha = $fecha;
        $this->accion = $accion;
        $this->descripcion = $descripcion;
    }

    /**
     * Obtiene el identificador del historial.
     *
     * @return int
     */
    public function getIdHistorial(): int
    {
        return $this->idHistorial;
    }

    /**
     * Establece el identificador del historial.
     *
     * @param int $idHistorial Identificador del historial.
     * @return void
     */
    public function setIdHistorial(int $idHistorial): void
    {
        $this->idHistorial = $idHistorial;
    }

    /**
     * Obtiene la fecha de la acción.
     *
     * @return DateTime
     */
    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    /**
     * Establece la fecha de la acción.
     *
     * @param DateTime $fecha Fecha de la acción.
     * @return void
     */
    public function setFecha(DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * Obtiene la acción realizada.
     *
     * @return string
     */
    public function getAccion(): string
    {
        return $this->accion;
    }

    /**
     * Establece la acción realizada.
     *
     * @param string $accion Acción realizada.
     * @return void
     */
    public function setAccion(string $accion): void
    {
        $this->accion = $accion;
    }

    /**
     * Obtiene la descripción de la acción.
     *
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Establece la descripción de la acción.
     *
     * @param string $descripcion Descripción de la acción.
     * @return void
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Registra una acción en el historial del ticket.
     *
     * @return void
     */
    public function registrarAccion(): void
    {
        // Lógica para registrar la acción en el historial en futuras etapas.
    }
}
