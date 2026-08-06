<?php

class Prestamo
{
    private int $idPrestamo;
    private DateTime $fechaPrestamo;
    private ?DateTime $fechaDevolucion;
    private string $estado;

    public function __construct(int $idPrestamo, DateTime $fechaPrestamo, ?DateTime $fechaDevolucion, string $estado)
    {
        $this->idPrestamo = $idPrestamo;
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaDevolucion = $fechaDevolucion;
        $this->estado = $estado;
    }

    public function getIdPrestamo(): int
    {
        return $this->idPrestamo;
    }

    public function setIdPrestamo(int $idPrestamo): void
    {
        $this->idPrestamo = $idPrestamo;
    }

    public function getFechaPrestamo(): DateTime
    {
        return $this->fechaPrestamo;
    }

    public function setFechaPrestamo(DateTime $fechaPrestamo): void
    {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    public function getFechaDevolucion(): ?DateTime
    {
        return $this->fechaDevolucion;
    }

    public function setFechaDevolucion(?DateTime $fechaDevolucion): void
    {
        $this->fechaDevolucion = $fechaDevolucion;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }
}
