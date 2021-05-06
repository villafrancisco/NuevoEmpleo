<?php


class Empresa extends Usuario
{
    protected $idempresa;
    protected $direccion;
    protected $nif;
    protected $logo;



    protected $lista_ofertas = [];

    function __construct($row)
    {
        $this->idempresa = isset($row['idempresa']) ? $row['idempresa'] : false;
        $this->direccion = isset($row['direccion']) ? $row['direccion'] : false;
        $this->nif = isset($row['nif']) ? $row['nif'] : false;
        $this->lista_ofertas = isset($row['lista_ofertas']) ? $row['lista_ofertas'] : false;
        $this->logo = isset($row['logo']) ? $row['logo'] : false;
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
     * Set the value of direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of nif
     */
    public function getNif()
    {
        return $this->nif;
    }
    /**
     * Set the value of nif
     *
     * @return  self
     */
    public function setNif($nif)
    {
        $this->nif = $nif;
        return $this;
    }

    public function getLista_ofertas()
    {
        return $this->lista_ofertas;
    }

    public function setLista_ofertas($lista_ofertas)
    {
        $this->lista_ofertas = $lista_ofertas;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }
}
