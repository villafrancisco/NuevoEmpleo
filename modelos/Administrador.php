<?php

/**
 * Administrador
 */
class Administrador extends Usuario
{
    /**
     * idadmin
     *
     * @var int
     */
    protected $idadmin;
    /**
     * apellidos
     *
     * @var string
     */
    protected $apellidos;
    /**
     * __construct
     *
     * @param  mixed $row
     * @return void
     */
    function __construct($row = false)
    {
        $this->apellidos = isset($row['apellidos']) ? $row['apellidos'] : null;
        $this->idadmin =  isset($row['idadmin']) ? $row['idadmin'] : null;
        parent::__construct($row);
    }

    /**
     * getIdadmin
     *
     * @return void
     */
    public function getIdadmin()
    {
        return $this->idadmin;
    }

    /**
     * setIdadmin
     *
     * @param  mixed $idadmin
     * @return void
     */
    public function setIdadmin($idadmin)
    {
        $this->idadmin = $idadmin;

        return $this;
    }
    /**
     * getApellidos
     *
     * @return void
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * setApellidos
     *
     * @param  mixed $apellidos
     * @return void
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
}
