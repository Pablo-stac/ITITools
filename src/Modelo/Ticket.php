<?php

class Ticket
{
    private int $idTicket;
    private string $asunto;
    private string $descripcion;
    private DateTime $fechaCreacion;
    private string $prioridad;
    private string $estado;
    private string $resolucion;

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

    public function getIdTicket(): int
    {
        return $this->idTicket;
    }

    public function setIdTicket(int $idTicket): void
    {
        $this->idTicket = $idTicket;
    }

    public function getAsunto(): string
    {
        return $this->asunto;
    }

    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getFechaCreacion(): DateTime
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(DateTime $fechaCreacion): void
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function getPrioridad(): string
    {
        return $this->prioridad;
    }

    public function setPrioridad(string $prioridad): void
    {
        $this->prioridad = $prioridad;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function getResolucion(): string
    {
        return $this->resolucion;
    }

    public function setResolucion(string $resolucion): void
    {
        $this->resolucion = $resolucion;
    }
}
