<?php

class HistorialTicket
{
    private int $idHistorial;
    private DateTime $fechaHora;
    private string $accion;
    private string $descripcion;

    public function __construct(int $idHistorial, DateTime $fechaHora, string $accion, string $descripcion)
    {
        $this->idHistorial = $idHistorial;
        $this->fechaHora = $fechaHora;
        $this->accion = $accion;
        $this->descripcion = $descripcion;
    }

    public function getIdHistorial(): int
    {
        return $this->idHistorial;
    }

    public function setIdHistorial(int $idHistorial): void
    {
        $this->idHistorial = $idHistorial;
    }

    public function getFechaHora(): DateTime
    {
        return $this->fechaHora;
    }

    public function setFechaHora(DateTime $fechaHora): void
    {
        $this->fechaHora = $fechaHora;
    }

    public function getAccion(): string
    {
        return $this->accion;
    }

    public function setAccion(string $accion): void
    {
        $this->accion = $accion;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
}
