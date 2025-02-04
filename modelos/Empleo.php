<?php

class Empleo implements JsonSerializable
{
    protected $idempleo;
    protected $idempresa;
    protected $idfamilia;
    protected $descripcion;
    protected $fecha_publicacion;

    function __construct($row = false)
    {
        $this->idempleo = isset($row['idempleo']) ? $row['idempleo'] : null;
        $this->idempresa = isset($row['idempresa']) ? $row['idempresa'] : null;
        $this->idfamilia = isset($row['idfamilia']) ? $row['idfamilia'] : null;
        $this->descripcion = isset($row['descripcion']) ? $row['descripcion'] : null;
        $this->fecha_publicacion = isset($row['fecha_publicacion']) ? $row['fecha_publicacion'] : null;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function getIdempleo()
    {
        return $this->idempleo;
    }

    public function setIdempleo($idempleo)
    {
        $this->idempleo = $idempleo;
    }

    public function getIdempresa()
    {
        return $this->idempresa;
    }

    public function setIdempresa($idempresa)
    {
        $this->idempresa = $idempresa;
    }


    public function getIdfamilia()
    {
        return $this->idfamilia;
    }

    public function setIdfamilia($idfamilia)
    {
        $this->idfamilia = $idfamilia;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getFecha_publicacion()
    {
        $date = date_create($this->fecha_publicacion);

        return date_format($date, "d/m/Y");
    }

    public function setFecha_publicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;
    }
}
