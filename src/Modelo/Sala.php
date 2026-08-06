<?php

class Sala
{
    private int $idSala;
    private string $nombre;

    public function __construct(int $idSala, string $nombre)
    {
        $this->idSala = $idSala;
        $this->nombre = $nombre;
    }

    public function getIdSala(): int
    {
        return $this->idSala;
    }

    public function setIdSala(int $idSala): void
    {
        $this->idSala = $idSala;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
}
