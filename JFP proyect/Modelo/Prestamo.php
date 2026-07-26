<?php

/**
 * Clase que representa un préstamo de equipo en el sistema SGRSI.
 */
class Prestamo
{
    /**
     * Identificador del préstamo.
     *
     * @var int
     */
    private int $idPrestamo;

    /**
     * Fecha en que se realizó el préstamo.
     *
     * @var DateTime
     */
    private DateTime $fechaPrestamo;

    /**
     * Fecha de devolución esperada.
     *
     * @var DateTime
     */
    private DateTime $fechaDevolucion;

    /**
     * Estado actual del préstamo.
     *
     * @var string
     */
    private string $estado;

    /**
     * Constructor de la clase Prestamo.
     *
     * @param int $idPrestamo Identificador del préstamo.
     * @param DateTime $fechaPrestamo Fecha del préstamo.
     * @param DateTime $fechaDevolucion Fecha de devolución.
     * @param string $estado Estado del préstamo.
     */
    public function __construct(int $idPrestamo, DateTime $fechaPrestamo, DateTime $fechaDevolucion, string $estado)
    {
        $this->idPrestamo = $idPrestamo;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaDevolucion = $fechaDevolucion;
        $this->estado = $estado;
    }

    /**
     * Obtiene el identificador del préstamo.
     *
     * @return int
     */
    public function getIdPrestamo(): int
    {
        return $this->idPrestamo;
    }

    /**
     * Establece el identificador del préstamo.
     *
     * @param int $idPrestamo Identificador del préstamo.
     * @return void
     */
    public function setIdPrestamo(int $idPrestamo): void
    {
        $this->idPrestamo = $idPrestamo;
    }

    /**
     * Obtiene la fecha del préstamo.
     *
     * @return DateTime
     */
    public function getFechaPrestamo(): DateTime
    {
        return $this->fechaPrestamo;
    }

    /**
     * Establece la fecha del préstamo.
     *
     * @param DateTime $fechaPrestamo Fecha del préstamo.
     * @return void
     */
    public function setFechaPrestamo(DateTime $fechaPrestamo): void
    {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    /**
     * Obtiene la fecha de devolución.
     *
     * @return DateTime
     */
    public function getFechaDevolucion(): DateTime
    {
        return $this->fechaDevolucion;
    }

    /**
     * Establece la fecha de devolución.
     *
     * @param DateTime $fechaDevolucion Fecha de devolución.
     * @return void
     */
    public function setFechaDevolucion(DateTime $fechaDevolucion): void
    {
        $this->fechaDevolucion = $fechaDevolucion;
    }

    /**
     * Obtiene el estado del préstamo.
     *
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * Establece el estado del préstamo.
     *
     * @param string $estado Estado del préstamo.
     * @return void
     */
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    /**
     * Registra el préstamo.
     *
     * @return void
     */
    public function registrarPrestamo(): void
    {
        // Lógica para registrar el préstamo en futuras etapas.
    }

    /**
     * Registra la devolución del préstamo.
     *
     * @return void
     */
    public function registrarDevolucion(): void
    {
        // Lógica para registrar la devolución en futuras etapas.
    }

    /**
     * Verifica si el préstamo está vencido.
     *
     * @return void
     */
    public function verificarVencimiento(): void
    {
        // Lógica para verificar el vencimiento en futuras etapas.
    }
}
