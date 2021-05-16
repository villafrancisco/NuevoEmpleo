<?php

class Empleo
{
    protected $idempleo;
    protected $idempresa;
    protected $idfamilia;

    protected $descripcion;
    protected $logo;
    protected $fecha_publicacion;


    function __construct($row)
    {
        $this->idempleo = isset($row['idempleo']) ? $row['idempleo'] : false;
        $this->idempresa = isset($row['idempresa']) ? $row['idempresa'] : false;
        $this->idfamilia = isset($row['idfamilia']) ? $row['idfamilia'] : false;

        $this->descripcion = isset($row['descripcion']) ? $row['descripcion'] : false;
        $this->logo = isset($row['logo']) ? $row['logo'] : false;
        $this->fecha_publicacion = isset($row['fecha_publicacion']) ? $row['fecha_publicacion'] : false;
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

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getFecha_publicacion()
    {
        $date = date_create($this->fecha_publicacion);

        return date_format($date, "d/m/Y");;
    }

    public function setFecha_publicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;
    }
}
