<?php

/**
 * Administrador
 */
class Administrador extends Usuario
{
    protected $idadmin;
    /**
     * __construct
     *
     * @param  mixed $row
     * @return void
     */
    function __construct($row)
    {
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
}
