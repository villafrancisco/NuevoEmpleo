<?php

class Familia
{
    protected $idfamilia;
    protected $nombre;
    protected $nombre_imagen;


    function __construct($row)
    {
        $this->idfamilia = $row['idfamilia'] ? $row['idfamilia'] : null;
        $this->nombre = $row['nombre'] ? $row['nombre'] : null;
        $this->nombre_imagen = $row['nombre_imagen'] ? $row['nombre_imagen'] : null;
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

    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getNombre_imagen()
    {
        return $this->nombre_imagen;
    }

    public function setNombre_imagen($nombre_imagen)
    {
        $this->nombre_imagen = $nombre_imagen;

        return $this;
    }
}
