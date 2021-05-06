<?php

/**
 * Administrador
 */
class Administrador extends Usuario
{
    protected $idadmin;
    protected $apellidos;
    /**
     * __construct
     *
     * @param  mixed $row
     * @return void
     */
    function __construct($row)
    {
        $this->apellidos = isset($row['apellidos']) ? $row['apellidos'] : false;
        $this->idadmin =  isset($row['idadmin']) ? $row['idadmin'] : false;
        parent::__construct($row);
    }

    /**
     * Get the value of idadmin
     * 
     */
    public function getIdadmin()
    {
        return $this->idadmin;
    }

    /**
     * Set the value of idadmin
     *
     * @return  self
     */
    public function setIdadmin($idadmin)
    {
        $this->idadmin = $idadmin;

        return $this;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
}
