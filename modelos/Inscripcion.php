<?php

class Inscripcion
{
    protected $idinscripcion;
    protected $idempleo;
    protected $idtitulado;
    protected $fecha_inscripcion;

    function __construct($row = false)
    {

        $this->idinscripcion = isset($row['idinscripcion']) ? $row['idinscripcion'] : null;
        $this->idempleo = isset($row['idempleo']) ? $row['idempleo'] : null;
        $this->idtitulado = isset($row['idtitulado']) ? $row['idtitulado'] : null;
        $this->fecha_inscripcion = isset($row['fecha_inscripcion']) ? $row['fecha_inscripcion'] : null;
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

        $date = date_create($this->fecha_inscripcion);
        return date_format($date, "d/m/Y");
    }

    public  function setFecha_inscripcion($fecha_inscripcion)
    {
        $this->fecha_inscripcion = $fecha_inscripcion;
    }
}
