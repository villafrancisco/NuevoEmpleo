<?php

class Empleo
{
    protected $idempleo;
    protected $idempresa;
    protected $descripcion;
    protected $fecha_publicacion;

    function __construct($row)
    {
        $this->idempleo = isset($row['idempleo']) ? $row['idempleo'] : false;
        $this->idempresa = isset($row['idempresa']) ? $row['idempresa'] : false;
        $this->descripcion = isset($row['descripcion']) ? $row['descripcion'] : false;
        $this->fecha_publicacion = isset($row['fecha_publicacion']) ? $row['fecha_publicacion'] : false;
    }

    /**
     * Get the value of idoferta
     */
    public function getIdempleo()
    {
        return $this->idempleo;
    }

    /**
     * Set the value of idoferta
     *
     * @return  self
     */
    public function setIdempleo($idempleo)
    {
        $this->idempleo = $idempleo;

        return $this;
    }

    /**
     * Get the value of idempresa
     */
    public function getIdempresa()
    {
        return $this->idempresa;
    }

    /**
     * Set the value of idempresa
     *
     * @return  self
     */
    public function setIdempresa($idempresa)
    {
        $this->idempresa = $idempresa;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
    public function getFecha_publicacion()
    {
        return $this->fecha_publicacion;
    }

    public function setFecha_publicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;
    }
}
