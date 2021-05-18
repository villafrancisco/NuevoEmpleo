<?php


class Empresa extends Usuario
{
    protected $idempresa;
    protected $direccion;
    protected $telefono;
   
    protected $logo;
    protected $listaEmpleos;

    function __construct($row)
    {
        $this->idempresa = isset($row['idempresa']) ? $row['idempresa'] : false;
        $this->telefono = isset($row['telefono']) ? $row['telefono'] : false;
        $this->direccion = isset($row['direccion']) ? $row['direccion'] : false;
        $this->lista_ofertas = isset($row['lista_ofertas']) ? $row['lista_ofertas'] : false;
        $this->logo = isset($row['logo']) ? $row['logo'] : false;
        $this->listaEmpleos = isset($row['listaEmpleos']) ? $row['listaEmpleos'] : false;
        parent::__construct($row);
    }

    /**
     * Get the value of idempresa
     * 
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
     * Set the value of telefono
     *
     * @return  self
     */
    public function getTelefono()
    {
        return $this->telefono;

        
    }
    /**
     * Set the value of telefono
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
/**
     * Set the value of direccion
     *
     * @return  self
     */
    public function getDireccion()
    {
        return $this->direccion;

        
    }
    /**
     * Set the value of direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }


    public function getLogo(){
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }
    public function getListaEmpleos()
    {
        return $this->listaEmpleos;
    }

    public function setListaEmpleos($listaEmpleos)
    {
        $this->listaEmpleos = $listaEmpleos;
    }
}
