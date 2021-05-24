<?php

class Titulo
{
    protected $idtitulo;
    protected $nombre;
    protected $grado;
    protected $idfamilia;

    function __construct($row)
    {
        $this->idtitulo = isset($row['idtitulo']) ? $row['idtitulo'] : null;
        $this->nombre = isset($row['nombre']) ? $row['nombre'] : null;
        $this->grado = isset($row['grado']) ? $row['grado'] : null;
        $this->idfamilia = isset($row['idfamilia']) ? $row['idfamilia'] : null;
    }
    public function getIdtitulo()
    {
        return $this->idtitulo;
    }

    public function setIdtitulo($idtitulo)
    {
        $this->idtitulo = $idtitulo;

        return $this;
    }

    public function getNombre()
    {
        if ($this->grado == "superior") {
            return "Grado Superior en " . $this->nombre;
        } elseif ($this->grado == "medio") {
            return "Grado Medio en " . $this->nombre;
        }
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getGrado()
    {
        return $this->grado;
    }

    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
    }

    public function getIdfamilia()
    {
        return $this->idfamilia;
    }

    public function setIdfamilia($idfamilia)
    {
        $this->idfamilia = $idfamilia;

        return $this;
    }
}
