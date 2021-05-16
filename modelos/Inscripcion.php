<?php

class Inscripcion
{
    protected $idinscripcion;
    protected $idempleo;
    protected $idtitulado;
    protected $fecha_inscripcion;

    function __construct($row)
    {
        $this->idinscripcion = $row['idinscripcion'] ? $row['idinscripcion'] : false;
        $this->idempleo = $row['idempleo'] ? $row['idempleo'] : false;
        $this->idtitulado = $row['idtitulado'] ? $row['idtitulado'] : false;
        $this->fecha_inscripcion = $row['fecha_inscripcion'] ? $row['fecha_inscripcion'] : false;
    }


    public function getIdinscripcion()
    {
        return $this->idinscripcion;
    }

    public function setIdinscripcion($idinscripcion)
    {
        $this->idinscripcion = $idinscripcion;
    }

    public function getIdempleo()
    {
        return $this->idempleo;
    }

    public  function setIdempleo($idempleo)
    {
        $this->idempleo = $idempleo;
    }

    public function getIdtitulado()
    {
        return $this->idtitulado;
    }

    public   function setIdtitulado($idtitulado)
    {
        $this->idtitulado = $idtitulado;
    }

    public function getFecha_inscripcion()
    {
        return $this->fecha_inscripcion;
    }

    public  function setFecha_inscripcion($fecha_inscripcion)
    {
        $this->fecha_inscripcion = $fecha_inscripcion;
    }
}
