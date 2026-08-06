<?php

class Equipo
{
    private int $idEquipo;
    private string $codigoInventario;
    private string $tipo;
    private string $marca;
    private string $modelo;
    private string $numeroSerie;
    private string $estado;

    public function __construct(int $idEquipo, string $codigoInventario, string $tipo, string $marca, string $modelo, string $numeroSerie, string $estado)
    {
        $this->idEquipo = $idEquipo;
        $this->codigoInventario = $codigoInventario;
        $this->tipo = $tipo;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->numeroSerie = $numeroSerie;
        $this->estado = $estado;
    }

    public function getIdEquipo(): int
    {
        return $this->idEquipo;
    }

    public function setIdEquipo(int $idEquipo): void
    {
        $this->idEquipo = $idEquipo;
    }

    public function getCodigoInventario(): string
    {
        return $this->codigoInventario;
    }

    public function setCodigoInventario(string $codigoInventario): void
    {
        $this->codigoInventario = $codigoInventario;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getNumeroSerie(): string
    {
        return $this->numeroSerie;
    }

    public function setNumeroSerie(string $numeroSerie): void
    {
        $this->numeroSerie = $numeroSerie;
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
